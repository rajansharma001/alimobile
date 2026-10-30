/**
 * Ali Mobile Center & Apple Fix — "Studio Counter" Homepage Interactions (v3.5)
 *
 * Powers all 11 bespoke section widgets:
 *  01. Hero 3D photo deck + shuffle button + 3D mouse-tilt stage
 *  02. Expanding department panels + Interactive Trade-In Value Calculator
 *  03. Live SVG Phone X-Ray fault zone scanner + Thermal receipt paper-feed
 *  04. Brand Authenticity Passport inspector + Showroom filter jump
 *  05. Flagship Titanium finish & storage configurator
 *  06. Showroom Gallery/Spec-Table view toggle, live sort & 3-device Compare Tray
 *  07. Apple Fix 10x / 45x / Thermal IR microscope controller + count-up stats
 *  08. Repair menu board + Original vs AAA part-grade switcher
 *  09. Water-damage survival probability meter + Battery health diagnostic slider
 *  10. Customer review dossier switcher
 *  11. Live Nepal Time (UTC+5:45) digital counter clock + Copyable VIP Voucher
 *
 * @package Mobile_Pasal
 * @version 3.5.0
 */
(function () {
	'use strict';

	var waNumber = (window.mpAjax && window.mpAjax.wa_number) ? window.mpAjax.wa_number : '9779804530786';
	function buildWaUrl(text) {
		return 'https://wa.me/' + waNumber + '?text=' + encodeURIComponent(text);
	}

	/* -------------------------------------------------------------------------
	 * 01. HERO: 3D Photo Deck + Shuffle + 3D Tilt Stage
	 * ---------------------------------------------------------------------- */
	function initHeroDeck() {
		var hero = document.querySelector('[data-hx-hero]');
		if (!hero) return;

		var copies = Array.prototype.slice.call(hero.querySelectorAll('[data-hx-copy]'));
		var tabs   = Array.prototype.slice.call(hero.querySelectorAll('[data-hx-go]'));
		var cards  = Array.prototype.slice.call(hero.querySelectorAll('[data-hx-card]'));
		var countEl = hero.querySelector('[data-hx-deck-count]');
		var shuffleBtn = hero.querySelector('[data-hx-shuffle]');
		var total  = cards.length;
		if (!total) return;

		var current = 0;
		var timer   = null;
		var DELAY   = 6500;

		function pad2(n) { return n < 10 ? '0' + n : '' + n; }

		function activate(index) {
			current = ((index % total) + total) % total;

			copies.forEach(function (el, i) {
				var active = i === current;
				el.classList.toggle('is-active', active);
				if (active) {
					el.removeAttribute('aria-hidden');
				} else {
					el.setAttribute('aria-hidden', 'true');
				}
			});

			tabs.forEach(function (btn, i) {
				var active = i === current;
				btn.classList.toggle('is-active', active);
				btn.setAttribute('aria-selected', active ? 'true' : 'false');
			});

			cards.forEach(function (card, i) {
				var relPos = ((i - current) % total + total) % total;
				card.setAttribute('data-pos', String(relPos));
			});

			if (countEl) {
				countEl.textContent = pad2(current + 1) + ' / ' + pad2(total);
			}
		}

		function startTimer() {
			stopTimer();
			timer = window.setInterval(function () {
				activate(current + 1);
			}, DELAY);
		}

		function stopTimer() {
			if (timer) {
				window.clearInterval(timer);
				timer = null;
			}
		}

		tabs.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var idx = parseInt(btn.getAttribute('data-hx-go'), 10);
				if (!isNaN(idx)) {
					activate(idx);
					startTimer();
				}
			});
		});

		cards.forEach(function (card) {
			card.addEventListener('click', function () {
				var pos = card.getAttribute('data-pos');
				if (pos === '0') {
					activate(current + 1);
				} else {
					var idx = parseInt(card.getAttribute('data-hx-card'), 10);
					if (!isNaN(idx)) activate(idx);
				}
				startTimer();
			});
		});

		if (shuffleBtn) {
			shuffleBtn.addEventListener('click', function () {
				activate(current + 1);
				startTimer();
			});
		}

		var tiltStage = hero.querySelector('[data-hx-tilt]');
		if (tiltStage && window.matchMedia('(pointer: fine)').matches) {
			tiltStage.addEventListener('mousemove', function (e) {
				var rect = tiltStage.getBoundingClientRect();
				var nx = ((e.clientX - rect.left) / rect.width) - 0.5;
				var ny = ((e.clientY - rect.top) / rect.height) - 0.5;
				tiltStage.style.setProperty('--tilt-x', (nx * 10).toFixed(2) + 'deg');
				tiltStage.style.setProperty('--tilt-y', (-ny * 10).toFixed(2) + 'deg');
			});
			tiltStage.addEventListener('mouseleave', function () {
				tiltStage.style.setProperty('--tilt-x', '0deg');
				tiltStage.style.setProperty('--tilt-y', '0deg');
			});
		}

		hero.addEventListener('mouseenter', stopTimer);
		hero.addEventListener('mouseleave', startTimer);
		startTimer();
	}

	/* -------------------------------------------------------------------------
	 * 02. DEPARTMENTS: Expanding Panels + Interactive Trade-In Calculator
	 * ---------------------------------------------------------------------- */
	function initDeptPanels() {
		var container = document.querySelector('[data-hx-panels]');
		if (container) {
			var panels = Array.prototype.slice.call(container.querySelectorAll('.hx-panel'));
			function openPanel(target) {
				panels.forEach(function (p) {
					p.classList.toggle('is-open', p === target);
				});
			}
			panels.forEach(function (panel) {
				panel.addEventListener('mouseenter', function () {
					if (window.innerWidth > 960) openPanel(panel);
				});
				panel.addEventListener('focusin', function () {
					openPanel(panel);
				});
				panel.addEventListener('click', function (e) {
					if (e.target.closest('a')) return;
					openPanel(panel);
				});
			});
		}

		var tradeBox = document.querySelector('[data-hx-tradein]');
		if (!tradeBox) return;

		var tierBtns = Array.prototype.slice.call(tradeBox.querySelectorAll('[data-trade-tier] button'));
		var condBtns = Array.prototype.slice.call(tradeBox.querySelectorAll('[data-trade-cond] button'));
		var outEl    = tradeBox.querySelector('[data-trade-output]');
		var sumEl    = tradeBox.querySelector('[data-trade-summary]');
		var waBtn    = tradeBox.querySelector('[data-trade-wa]');

		function formatNpr(n) {
			return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
		}

		function updateTradeIn() {
			var activeTier = tradeBox.querySelector('[data-trade-tier] button.is-active') || tierBtns[0];
			var activeCond = tradeBox.querySelector('[data-trade-cond] button.is-active') || condBtns[0];
			if (!activeTier || !activeCond) return;

			var minBase = parseInt(activeTier.getAttribute('data-min'), 10) || 20000;
			var maxBase = parseInt(activeTier.getAttribute('data-max'), 10) || 45000;
			var mult    = parseFloat(activeCond.getAttribute('data-mult')) || 1;

			var minVal  = Math.round((minBase * mult) / 500) * 500;
			var maxVal  = Math.round((maxBase * mult) / 500) * 500;
			var tierTxt = activeTier.getAttribute('data-tier') || activeTier.textContent;
			var condTxt = activeCond.getAttribute('data-cond') || activeCond.textContent;

			if (outEl) {
				outEl.textContent = 'NPR ' + formatNpr(minVal) + ' – ' + formatNpr(maxVal);
			}
			if (sumEl) {
				sumEl.textContent = tierTxt + ' • ' + condTxt + ' • Deducted from your new phone bill';
			}
			if (waBtn) {
				waBtn.setAttribute('href', buildWaUrl(
					'Namaste Ali Mobile, ma sanga ' + tierTxt + ' (' + condTxt + ') chha. Estimated trade-in credit NPR ' + formatNpr(minVal) + '-' + formatNpr(maxVal) + ' dekhiyo, exchange garna chahanchhu.'
				));
			}
		}

		tierBtns.forEach(function (btn) {
			btn.addEventListener('click', function () {
				tierBtns.forEach(function (b) { b.classList.toggle('is-active', b === btn); });
				updateTradeIn();
			});
		});

		condBtns.forEach(function (btn) {
			btn.addEventListener('click', function () {
				condBtns.forEach(function (b) { b.classList.toggle('is-active', b === btn); });
				updateTradeIn();
			});
		});
	}

	/* -------------------------------------------------------------------------
	 * 03. REPAIR DESK: SVG Phone X-Ray Scanner + Thermal Receipt Paper-Feed
	 * ---------------------------------------------------------------------- */
	function initRepairWorkbench() {
		var receipt = document.querySelector('[data-hx-receipt]');
		var builder = document.getElementById('repair-builder');
		if (!builder) return;

		var xrayBox   = builder.querySelector('[data-hx-xray]');
		var xrayTitle = builder.querySelector('[data-hx-xray-title]');

		function pulseReceipt() {
			if (!receipt) return;
			receipt.classList.remove('is-printing');
			void receipt.offsetWidth;
			receipt.classList.add('is-printing');
		}

		builder.addEventListener('click', function (e) {
			var faultBtn = e.target.closest('.fault-select-card[data-hx-zone]');
			if (faultBtn && xrayBox) {
				var zone = faultBtn.getAttribute('data-hx-zone');
				var lbl  = faultBtn.getAttribute('data-hx-zone-label');
				if (zone) xrayBox.setAttribute('data-active-zone', zone);
				if (lbl && xrayTitle) xrayTitle.textContent = lbl;
			}
			if (e.target.closest('.dev-pill-btn, .fault-select-card, .quick-chip-btn')) {
				pulseReceipt();
			}
		});
	}

	/* -------------------------------------------------------------------------
	 * 04. BRANDS: Interactive Brand Authenticity Passport + Filter Jump
	 * ---------------------------------------------------------------------- */
	function initBrandsPassport() {
		var sec = document.querySelector('[data-hx-brands]');
		if (sec) {
			var nameEl = sec.querySelector('[data-passport-name]');
			var descEl = sec.querySelector('[data-passport-desc]');
			var jumpEl = sec.querySelector('[data-passport-jump]');
			var pills  = Array.prototype.slice.call(sec.querySelectorAll('.hx-brand[data-filter-brand]'));

			pills.forEach(function (pill) {
				function inspectBrand() {
					var bKey   = pill.getAttribute('data-filter-brand');
					var bTitle = pill.getAttribute('data-brand-title');
					var bDesc  = pill.getAttribute('data-brand-passport');
					if (nameEl && bTitle) nameEl.textContent = bTitle;
					if (descEl && bDesc)  descEl.textContent = bDesc;
					if (jumpEl && bKey)   jumpEl.setAttribute('data-passport-jump', bKey);
				}
				pill.addEventListener('mouseenter', inspectBrand);
				pill.addEventListener('focus', inspectBrand);
			});

			if (jumpEl) {
				jumpEl.addEventListener('click', function (e) {
					var bKey = jumpEl.getAttribute('data-passport-jump');
					var filterBtn = document.querySelector('.filter-tab-btn[data-filter="' + bKey + '"]');
					if (filterBtn) {
						e.preventDefault();
						filterBtn.click();
						var cat = document.getElementById('catalog');
						if (cat) cat.scrollIntoView({ behavior: 'smooth', block: 'start' });
					}
				});
			}
		}

		var triggers = document.querySelectorAll('[data-hx-filter-jump]');
		triggers.forEach(function (link) {
			link.addEventListener('click', function (e) {
				var brand = link.getAttribute('data-hx-filter-jump');
				var filterBtn = document.querySelector('.filter-tab-btn[data-filter="' + brand + '"]');
				var catalog   = document.getElementById('catalog');
				if (filterBtn && catalog) {
					e.preventDefault();
					filterBtn.click();
					catalog.scrollIntoView({ behavior: 'smooth', block: 'start' });
				}
			});
		});
	}

	/* -------------------------------------------------------------------------
	 * 05. FLAGSHIP STAGE: Titanium Finish & Storage Configurator
	 * ---------------------------------------------------------------------- */
	function initFlagshipStage() {
		var stage = document.querySelector('[data-hx-spot]');
		if (!stage) return;

		var swatches   = Array.prototype.slice.call(stage.querySelectorAll('.hx-swatch'));
		var storages   = Array.prototype.slice.call(stage.querySelectorAll('.hx-storage'));
		var summaryEl  = stage.querySelector('[data-spot-summary]');
		var finishText = stage.querySelector('[data-spot-finish-text]');
		var ctaLabel   = stage.querySelector('[data-spot-cta-label]');
		var waBtn      = stage.querySelector('[data-spot-wa]');

		function syncSpotlight() {
			var activeSw = stage.querySelector('.hx-swatch.is-active') || swatches[0];
			var activeSt = stage.querySelector('.hx-storage.is-active') || storages[0];
			if (!activeSw || !activeSt) return;

			var fKey  = activeSw.getAttribute('data-finish-key') || 'desert';
			var fName = activeSw.getAttribute('data-finish-name') || 'Desert Titanium';
			var cap   = activeSt.getAttribute('data-storage') || '256GB';

			stage.setAttribute('data-finish', fKey);
			if (summaryEl)  summaryEl.textContent  = fName + ' · ' + cap + ' · Sealed Box';
			if (finishText) finishText.textContent = fName + ' Finish';
			if (ctaLabel)   ctaLabel.textContent   = 'Ask price for ' + fName + ' (' + cap + ')';
			if (waBtn) {
				waBtn.setAttribute('href', buildWaUrl(
					'Namaste Ali Mobile, iPhone 16 Pro / Pro Max (' + fName + ', ' + cap + ') ko aaja ko price ra stock availability dinus'
				));
			}
		}

		swatches.forEach(function (sw) {
			sw.addEventListener('click', function () {
				swatches.forEach(function (b) { b.classList.toggle('is-active', b === sw); });
				syncSpotlight();
			});
		});

		storages.forEach(function (st) {
			st.addEventListener('click', function () {
				storages.forEach(function (b) { b.classList.toggle('is-active', b === st); });
				syncSpotlight();
			});
		});
	}

	/* -------------------------------------------------------------------------
	 * 06. SHOWROOM: View Switcher, Price/Rating Sort & 3-Device Compare Tray
	 * ---------------------------------------------------------------------- */
	function initShowroomEnhancements() {
		var sec = document.querySelector('[data-hx-catalog]');
		if (!sec) return;

		var grid       = sec.querySelector('[data-hx-products-grid]');
		var viewBtns   = Array.prototype.slice.call(sec.querySelectorAll('[data-hx-view]'));
		var sortSelect = sec.querySelector('[data-hx-sort]');
		var tray       = sec.querySelector('[data-hx-compare-tray]');
		var slotsEl    = sec.querySelector('[data-compare-slots]');
		var countEl    = sec.querySelector('[data-compare-count]');
		var clearBtn   = sec.querySelector('[data-compare-clear]');
		var compareWa  = sec.querySelector('[data-compare-wa]');

		viewBtns.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var mode = btn.getAttribute('data-hx-view');
				viewBtns.forEach(function (b) { b.classList.toggle('is-active', b === btn); });
				if (grid) {
					grid.classList.toggle('is-table-view', mode === 'table');
				}
			});
		});

		if (sortSelect && grid) {
			sortSelect.addEventListener('change', function () {
				var val   = sortSelect.value;
				var cards = Array.prototype.slice.call(grid.querySelectorAll('.hx-product'));
				cards.sort(function (a, b) {
					if (val === 'price-asc') {
						return (parseInt(a.getAttribute('data-price-num'), 10) || 0) - (parseInt(b.getAttribute('data-price-num'), 10) || 0);
					}
					if (val === 'price-desc') {
						return (parseInt(b.getAttribute('data-price-num'), 10) || 0) - (parseInt(a.getAttribute('data-price-num'), 10) || 0);
					}
					if (val === 'rating') {
						return (parseFloat(b.getAttribute('data-rating-num')) || 0) - (parseFloat(a.getAttribute('data-rating-num')) || 0);
					}
					return (parseInt(a.getAttribute('data-order'), 10) || 0) - (parseInt(b.getAttribute('data-order'), 10) || 0);
				});
				cards.forEach(function (c) { grid.appendChild(c); });
			});
		}

		var compared = [];
		function renderCompareTray() {
			if (!tray || !slotsEl) return;
			if (!compared.length) {
				tray.hidden = true;
				return;
			}
			tray.hidden = false;
			if (countEl) countEl.textContent = String(compared.length);
			slotsEl.innerHTML = '';
			var names = [];
			compared.forEach(function (item) {
				names.push(item.title + ' (' + item.price + ')');
				var chip = document.createElement('span');
				chip.className = 'hx-compare-chip';
				chip.innerHTML = '<span>' + item.title + '</span> <em>' + item.price + '</em>';
				slotsEl.appendChild(chip);
			});
			if (compareWa) {
				compareWa.setAttribute('href', buildWaUrl(
					'Namaste Ali Mobile, ma yo phones compare gardai chhu: ' + names.join(' vs ') + '. Best counter price ra suggestion dinus.'
				));
			}
		}

		sec.addEventListener('click', function (e) {
			var cBtn = e.target.closest('[data-compare-toggle]');
			if (!cBtn) return;
			var card  = cBtn.closest('.hx-product');
			var title = cBtn.getAttribute('data-compare-toggle');
			var price = card ? card.getAttribute('data-price-str') : '';
			var idx   = compared.findIndex(function (x) { return x.title === title; });

			if (idx > -1) {
				compared.splice(idx, 1);
				cBtn.classList.remove('is-selected');
			} else {
				if (compared.length >= 3) {
					var removed = compared.shift();
					var oldBtn = sec.querySelector('[data-compare-toggle="' + removed.title.replace(/"/g, '\\"') + '"]');
					if (oldBtn) oldBtn.classList.remove('is-selected');
				}
				compared.push({ title: title, price: price });
				cBtn.classList.add('is-selected');
			}
			renderCompareTray();
		});

		if (clearBtn) {
			clearBtn.addEventListener('click', function () {
				compared = [];
				Array.prototype.slice.call(sec.querySelectorAll('.hx-compare-btn.is-selected')).forEach(function (b) {
					b.classList.remove('is-selected');
				});
				renderCompareTray();
			});
		}
	}

	/* -------------------------------------------------------------------------
	 * 07. APPLE FIX LAB: Microscope Optics Switcher + Count-Up Metrics
	 * ---------------------------------------------------------------------- */
	function initLabControls() {
		var lab = document.querySelector('[data-hx-lab]');
		if (lab) {
			var lens    = lab.querySelector('[data-hx-lens]');
			var hudEl   = lab.querySelector('[data-scope-hud]');
			var optBtns = Array.prototype.slice.call(lab.querySelectorAll('[data-scope-btn]'));

			optBtns.forEach(function (btn) {
				btn.addEventListener('click', function () {
					var mode = btn.getAttribute('data-scope-btn');
					var hud  = btn.getAttribute('data-hud');
					optBtns.forEach(function (b) { b.classList.toggle('is-active', b === btn); });
					if (lens && mode) lens.setAttribute('data-scope-mode', mode);
					if (hudEl && hud) hudEl.textContent = hud;
				});
			});
		}

		var items = document.querySelectorAll('[data-hx-count]');
		if (!items.length || !('IntersectionObserver' in window)) return;

		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (!entry.isIntersecting) return;
				var el  = entry.target;
				var raw = el.getAttribute('data-hx-count') || '';
				observer.unobserve(el);

				var match = raw.match(/^([\d,]+(?:\.\d+)?)(.*)$/);
				if (!match) return;

				var numStr   = match[1].replace(/,/g, '');
				var suffix   = match[2] || '';
				var target   = parseFloat(numStr);
				var decimals = numStr.indexOf('.') > -1 ? numStr.split('.')[1].length : 0;
				var hasComma = match[1].indexOf(',') > -1;
				if (isNaN(target)) return;

				var start    = performance.now();
				var duration = 1300;

				function tick(now) {
					var p = Math.min(1, (now - start) / duration);
					var eased = 1 - Math.pow(1 - p, 3);
					var val = (target * eased).toFixed(decimals);
					if (hasComma) {
						var parts = val.split('.');
						parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						val = parts.join('.');
					}
					el.textContent = val + suffix;
					if (p < 1) requestAnimationFrame(tick);
				}
				requestAnimationFrame(tick);
			});
		}, { threshold: 0.35 });

		items.forEach(function (el) { observer.observe(el); });
	}

	/* -------------------------------------------------------------------------
	 * 08. REPAIR MENU: Split Board Tabs + Part-Grade Switcher
	 * ---------------------------------------------------------------------- */
	function initRepairMenuBoard() {
		var menu = document.querySelector('[data-hx-tabs]');
		if (!menu) return;

		var tabs   = Array.prototype.slice.call(menu.querySelectorAll('[data-hx-tab]'));
		var panels = Array.prototype.slice.call(menu.querySelectorAll('[data-hx-panel]'));

		function selectTab(index) {
			tabs.forEach(function (btn, i) {
				var active = i === index;
				btn.classList.toggle('is-active', active);
				btn.setAttribute('aria-selected', active ? 'true' : 'false');
			});
			panels.forEach(function (panel, i) {
				var active = i === index;
				panel.classList.toggle('is-active', active);
				panel.hidden = !active;
			});
		}

		tabs.forEach(function (btn, idx) {
			btn.addEventListener('click', function () {
				selectTab(idx);
			});
			btn.addEventListener('keydown', function (e) {
				if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
					e.preventDefault();
					var next = (idx + 1) % tabs.length;
					selectTab(next);
					tabs[next].focus();
				} else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
					e.preventDefault();
					var prev = (idx - 1 + tabs.length) % tabs.length;
					selectTab(prev);
					tabs[prev].focus();
				}
			});
		});

		menu.addEventListener('click', function (e) {
			var gBtn = e.target.closest('[data-hx-grade] button');
			if (!gBtn) return;
			var panel = gBtn.closest('.hx-menu-panel');
			if (!panel) return;
			Array.prototype.slice.call(panel.querySelectorAll('[data-hx-grade] button')).forEach(function (b) {
				b.classList.toggle('is-active', b === gBtn);
			});
			var wEl = panel.querySelector('[data-grade-warranty]');
			var bEl = panel.querySelector('[data-grade-badge]');
			if (wEl) wEl.textContent = gBtn.getAttribute('data-warranty') || '';
			if (bEl) bEl.textContent = gBtn.getAttribute('data-badge') || '';
		});
	}

	/* -------------------------------------------------------------------------
	 * 09. CARE GUIDES: Water Damage Survival Meter + Battery Health Slider
	 * ---------------------------------------------------------------------- */
	function initCareGuides() {
		var triage = document.querySelector('[data-hx-triage]');
		if (triage) {
			var checks  = Array.prototype.slice.call(triage.querySelectorAll('[data-triage-check]'));
			var scoreEl = triage.querySelector('[data-triage-score]');
			var barEl   = triage.querySelector('[data-triage-bar]');

			function updateTriage() {
				var checkedCount = checks.filter(function (c) { return c.checked; }).length;
				var pct = 25 + (checkedCount * 18);
				if (scoreEl) scoreEl.textContent = pct + '%';
				if (barEl)   barEl.style.width   = pct + '%';
			}
			checks.forEach(function (c) {
				c.addEventListener('change', updateTriage);
			});
			updateTriage();
		}

		var batCard = document.querySelector('[data-hx-battery]');
		if (batCard) {
			var slider  = batCard.querySelector('[data-bat-slider]');
			var valEl   = batCard.querySelector('[data-bat-val]');
			var badgeEl = batCard.querySelector('[data-bat-badge]');
			var noteEl  = batCard.querySelector('[data-bat-note]');

			if (slider) {
				slider.addEventListener('input', function () {
					var v = parseInt(slider.value, 10) || 80;
					if (valEl) valEl.textContent = v + '%';
					if (v >= 85) {
						if (badgeEl) {
							badgeEl.textContent = 'Healthy Cell';
							badgeEl.classList.remove('is-warn');
						}
						if (noteEl) noteEl.textContent = v + '% is healthy! Keep using an original 20W–45W PD charger to preserve cycle life.';
					} else if (v >= 78) {
						if (badgeEl) {
							badgeEl.textContent = 'Service Soon';
							badgeEl.classList.add('is-warn');
						}
						if (noteEl) noteEl.textContent = 'Around ' + v + '%: Peak CPU performance throttles. 25-min BMS cell swap restores 100% health.';
					} else {
						if (badgeEl) {
							badgeEl.textContent = 'Critical Drain';
							badgeEl.classList.add('is-warn');
						}
						if (noteEl) noteEl.textContent = 'At ' + v + '%: High risk of sudden shutdowns or swelling. Replace immediately at our counter.';
					}
				});
			}
		}
	}

	/* -------------------------------------------------------------------------
	 * 10. REVIEWS: Big-Quote Switcher
	 * ---------------------------------------------------------------------- */
	function initQuoteSwitcher() {
		var wrap = document.querySelector('[data-hx-quotes]');
		if (!wrap) return;

		var quotes  = Array.prototype.slice.call(wrap.querySelectorAll('[data-hx-quote]'));
		var avatars = Array.prototype.slice.call(wrap.querySelectorAll('[data-hx-quote-go]'));
		var steps   = Array.prototype.slice.call(wrap.querySelectorAll('[data-hx-quote-step]'));
		var total   = quotes.length;
		if (!total) return;

		var idx = 0;

		function showQuote(nextIdx) {
			idx = ((nextIdx % total) + total) % total;
			quotes.forEach(function (q, i) {
				var active = i === idx;
				q.classList.toggle('is-active', active);
				if (active) {
					q.removeAttribute('aria-hidden');
				} else {
					q.setAttribute('aria-hidden', 'true');
				}
			});
			avatars.forEach(function (a, i) {
				a.classList.toggle('is-active', i === idx);
			});
		}

		avatars.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var target = parseInt(btn.getAttribute('data-hx-quote-go'), 10);
				if (!isNaN(target)) showQuote(target);
			});
		});

		steps.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var delta = parseInt(btn.getAttribute('data-hx-quote-step'), 10) || 1;
				showQuote(idx + delta);
			});
		});
	}

	/* -------------------------------------------------------------------------
	 * 11. VISIT & FINAL: Live Nepal Time Clock + Copyable VIP Counter Pass
	 * ---------------------------------------------------------------------- */
	function initOpenStatusAndVoucher() {
		var badges = document.querySelectorAll('[data-hx-open-status]');
		var clockEl = document.querySelector('[data-hx-clock]');

		function updateNepalTime() {
			var now = new Date();
			var utcMs = now.getTime() + (now.getTimezoneOffset() * 60000);
			var nptDate = new Date(utcMs + (345 * 60000)); // UTC+5:45
			var hour = nptDate.getHours();
			var min  = nptDate.getMinutes();
			var sec  = nptDate.getSeconds();

			if (clockEl) {
				var h12 = hour % 12 || 12;
				var ampm = hour >= 12 ? 'PM' : 'AM';
				var mStr = min < 10 ? '0' + min : String(min);
				var sStr = sec < 10 ? '0' + sec : String(sec);
				clockEl.textContent = 'NPT ' + h12 + ':' + mStr + ':' + sStr + ' ' + ampm;
			}

			badges.forEach(function (badge) {
				var openHr  = parseInt(badge.getAttribute('data-open'), 10) || 9;
				var closeHr = parseInt(badge.getAttribute('data-close'), 10) || 20;
				var isOpen  = hour >= openHr && hour < closeHr;
				var textEl  = badge.querySelector('.hx-status-text');

				badge.classList.toggle('is-closed', !isOpen);
				if (textEl) {
					textEl.textContent = isOpen ? 'Open now · Gulariya' : 'Counter opens 9 AM';
				}
			});
		}

		updateNepalTime();
		window.setInterval(updateNepalTime, 1000);

		var voucher = document.querySelector('[data-hx-voucher]');
		if (voucher) {
			var copyBtn  = voucher.querySelector('[data-voucher-copy]');
			var statusEl = voucher.querySelector('[data-voucher-status]');
			var code     = voucher.getAttribute('data-hx-voucher') || 'GULARIYA-VIP';

			if (copyBtn) {
				copyBtn.addEventListener('click', function () {
					if (navigator.clipboard && navigator.clipboard.writeText) {
						navigator.clipboard.writeText(code);
					}
					if (statusEl) {
						statusEl.textContent = 'Copied! Show at Counter ✓';
						window.setTimeout(function () {
							statusEl.innerHTML = '<i class="fa-regular fa-copy" aria-hidden="true"></i> Tap to copy';
						}, 3000);
					}
				});
			}
		}

		var dock = document.querySelector('[data-hx-dock]');
		if (dock && 'IntersectionObserver' in window) {
			var links = Array.prototype.slice.call(dock.querySelectorAll('.hx-dock-link'));
			var map = {};
			links.forEach(function (l) {
				var href = l.getAttribute('href');
				if (href && href.charAt(0) === '#') map[href.slice(1)] = l;
			});
			var spy = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting && entry.target.id && map[entry.target.id]) {
						links.forEach(function (l) { l.classList.remove('is-active'); });
						map[entry.target.id].classList.add('is-active');
					}
				});
			}, { rootMargin: '-35% 0px -50% 0px' });

			Object.keys(map).forEach(function (id) {
				var sec = document.getElementById(id);
				if (sec) spy.observe(sec);
			});
		}
	}

	/* -------------------------------------------------------------------------
	 * Initialize all homepage modules on DOMContentLoaded
	 * ---------------------------------------------------------------------- */
	function initAll() {
		initHeroDeck();
		initDeptPanels();
		initRepairWorkbench();
		initBrandsPassport();
		initFlagshipStage();
		initShowroomEnhancements();
		initLabControls();
		initRepairMenuBoard();
		initCareGuides();
		initQuoteSwitcher();
		initOpenStatusAndVoucher();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initAll);
	} else {
		initAll();
	}
})();
