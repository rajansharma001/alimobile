/**
 * ALI MOBILE CENTER & APPLE FIX — "STUDIO COUNTER" HOMEPAGE INTERACTIONS (v3.0)
 * Complements assets/js/main.js (which handles the repair ticket data,
 * showroom search/filter, brand filter jump, header drawer, and scroll reveal).
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    /* ----------------------------------------------------------------------
       1. Hero: Editorial Copy + 3D Flip-Through Photo Deck
       -------------------------------------------------------------------- */
    var hero = document.querySelector('[data-hx-hero]');
    if (hero) {
      var copies = hero.querySelectorAll('[data-hx-copy]');
      var tabs = hero.querySelectorAll('[data-hx-go]');
      var cards = hero.querySelectorAll('[data-hx-card]');
      var total = copies.length;
      var activeIdx = 0;
      var heroTimer = null;

      function setHeroSlide(idx) {
        if (!total) return;
        activeIdx = ((idx % total) + total) % total;

        copies.forEach(function (el, i) {
          var isAct = i === activeIdx;
          el.classList.toggle('is-active', isAct);
          el.setAttribute('aria-hidden', isAct ? 'false' : 'true');
        });

        tabs.forEach(function (btn, i) {
          var isAct = i === activeIdx;
          btn.classList.toggle('is-active', isAct);
          btn.setAttribute('aria-selected', isAct ? 'true' : 'false');
        });

        cards.forEach(function (card, i) {
          var relPos = ((i - activeIdx) % total + total) % total;
          card.setAttribute('data-pos', String(relPos));
        });
      }

      function startHeroTimer() {
        stopHeroTimer();
        heroTimer = setInterval(function () {
          setHeroSlide(activeIdx + 1);
        }, 6000);
      }

      function stopHeroTimer() {
        if (heroTimer) {
          clearInterval(heroTimer);
          heroTimer = null;
        }
      }

      tabs.forEach(function (btn) {
        btn.addEventListener('click', function () {
          var target = parseInt(btn.getAttribute('data-hx-go'), 10);
          if (!isNaN(target)) {
            setHeroSlide(target);
            startHeroTimer();
          }
        });
      });

      cards.forEach(function (card) {
        card.addEventListener('click', function () {
          var pos = card.getAttribute('data-pos');
          var cardIdx = parseInt(card.getAttribute('data-hx-card'), 10);
          if (pos === '0') {
            setHeroSlide(activeIdx + 1);
          } else if (!isNaN(cardIdx)) {
            setHeroSlide(cardIdx);
          }
          startHeroTimer();
        });
      });

      hero.addEventListener('mouseenter', stopHeroTimer);
      hero.addEventListener('mouseleave', startHeroTimer);
      startHeroTimer();
    }

    /* ----------------------------------------------------------------------
       2. Expanding Department Panels (#categories)
       -------------------------------------------------------------------- */
    var panelWrap = document.querySelector('[data-hx-panels]');
    if (panelWrap) {
      var panels = panelWrap.querySelectorAll('.hx-panel');
      function openPanel(target) {
        panels.forEach(function (p) {
          p.classList.toggle('is-open', p === target);
        });
      }
      panels.forEach(function (panel) {
        panel.addEventListener('mouseenter', function () {
          openPanel(panel);
        });
        panel.addEventListener('focus', function () {
          openPanel(panel);
        });
        panel.addEventListener('click', function (e) {
          if (!panel.classList.contains('is-open')) {
            e.preventDefault();
            openPanel(panel);
          }
        });
      });
    }

    /* ----------------------------------------------------------------------
       3. Printed Thermal Receipt Paper-Feed Pulse (#repair-builder)
       -------------------------------------------------------------------- */
    var receipt = document.querySelector('[data-hx-receipt]');
    var repairSection = document.getElementById('repair-builder');
    if (receipt && repairSection) {
      var pulseTimer = null;
      function pulseReceipt() {
        receipt.classList.add('is-printing');
        if (pulseTimer) clearTimeout(pulseTimer);
        pulseTimer = setTimeout(function () {
          receipt.classList.remove('is-printing');
        }, 240);
      }

      repairSection.addEventListener('click', function (e) {
        if (
          e.target.closest('.dev-pill-btn') ||
          e.target.closest('.fault-select-card') ||
          e.target.closest('.quick-chip-btn')
        ) {
          pulseReceipt();
        }
      });

      var modelInput = document.getElementById('builder-model-input');
      if (modelInput) {
        modelInput.addEventListener('input', pulseReceipt);
      }
    }

    /* ----------------------------------------------------------------------
       4. Flagship Stage Filter Jump ([data-hx-filter-jump])
       -------------------------------------------------------------------- */
    var filterJumps = document.querySelectorAll('[data-hx-filter-jump]');
    filterJumps.forEach(function (link) {
      link.addEventListener('click', function (e) {
        var brand = link.getAttribute('data-hx-filter-jump');
        var tab = brand ? document.querySelector('.filter-tab-btn[data-filter="' + brand + '"]') : null;
        if (tab) {
          e.preventDefault();
          tab.click();
          var catalog = document.getElementById('catalog');
          if (catalog) {
            catalog.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }
        }
      });
    });

    /* ----------------------------------------------------------------------
       5. Apple Fix Lab Count-Up Stats ([data-hx-count])
       -------------------------------------------------------------------- */
    var countEls = document.querySelectorAll('[data-hx-count]');
    function animateCount(el) {
      if (el.getAttribute('data-counted') === '1') return;
      el.setAttribute('data-counted', '1');

      var raw = el.getAttribute('data-hx-count') || el.textContent || '';
      var match = raw.match(/^([^0-9]*)([0-9][0-9,\.]*)(.*)$/);
      if (!match) return;

      var prefix = match[1];
      var numPart = match[2];
      var suffix = match[3];
      var hasComma = numPart.indexOf(',') !== -1;
      var decimals = (numPart.split('.')[1] || '').length;
      var target = parseFloat(numPart.replace(/,/g, ''));
      if (isNaN(target)) return;

      var duration = 1300;
      var start = performance.now();

      function tick(now) {
        var progress = Math.min(1, (now - start) / duration);
        var eased = 1 - Math.pow(1 - progress, 3);
        var current = target * eased;
        var formatted = decimals > 0 ? current.toFixed(decimals) : String(Math.round(current));
        if (hasComma) {
          formatted = formatted.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }
        el.textContent = prefix + formatted + suffix;
        if (progress < 1) {
          requestAnimationFrame(tick);
        } else {
          el.textContent = raw;
        }
      }
      requestAnimationFrame(tick);
    }

    if (countEls.length) {
      if ('IntersectionObserver' in window) {
        var countObs = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              animateCount(entry.target);
              countObs.unobserve(entry.target);
            }
          });
        }, { threshold: 0.35 });
        countEls.forEach(function (el) { countObs.observe(el); });
      } else {
        countEls.forEach(animateCount);
      }
    }

    /* ----------------------------------------------------------------------
       6. Interactive Repair Menu Board ([data-hx-tabs])
       -------------------------------------------------------------------- */
    var menuBoard = document.querySelector('[data-hx-tabs]');
    if (menuBoard) {
      var menuBtns = menuBoard.querySelectorAll('[data-hx-tab]');
      var menuPanels = menuBoard.querySelectorAll('[data-hx-panel]');

      function activateMenu(idx) {
        menuBtns.forEach(function (btn, i) {
          var isAct = i === idx;
          btn.classList.toggle('is-active', isAct);
          btn.setAttribute('aria-selected', isAct ? 'true' : 'false');
        });
        menuPanels.forEach(function (panel, i) {
          var isAct = i === idx;
          panel.classList.toggle('is-active', isAct);
          if (isAct) {
            panel.removeAttribute('hidden');
          } else {
            panel.setAttribute('hidden', 'hidden');
          }
        });
      }

      menuBtns.forEach(function (btn, i) {
        btn.addEventListener('click', function () {
          activateMenu(i);
        });
        btn.addEventListener('keydown', function (e) {
          if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
            e.preventDefault();
            var next = (i + 1) % menuBtns.length;
            activateMenu(next);
            menuBtns[next].focus();
          } else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
            e.preventDefault();
            var prev = (i - 1 + menuBtns.length) % menuBtns.length;
            activateMenu(prev);
            menuBtns[prev].focus();
          }
        });
      });
    }

    /* ----------------------------------------------------------------------
       7. Reviews Big-Quote Switcher ([data-hx-quotes])
       -------------------------------------------------------------------- */
    var quoteBox = document.querySelector('[data-hx-quotes]');
    if (quoteBox) {
      var quotes = quoteBox.querySelectorAll('[data-hx-quote]');
      var avatars = quoteBox.querySelectorAll('[data-hx-quote-go]');
      var stepBtns = quoteBox.querySelectorAll('[data-hx-quote-step]');
      var qTotal = quotes.length;
      var qIdx = 0;

      function showQuote(idx) {
        if (!qTotal) return;
        qIdx = ((idx % qTotal) + qTotal) % qTotal;
        quotes.forEach(function (q, i) {
          var isAct = i === qIdx;
          q.classList.toggle('is-active', isAct);
          q.setAttribute('aria-hidden', isAct ? 'false' : 'true');
        });
        avatars.forEach(function (av, i) {
          av.classList.toggle('is-active', i === qIdx);
        });
      }

      avatars.forEach(function (av) {
        av.addEventListener('click', function () {
          var target = parseInt(av.getAttribute('data-hx-quote-go'), 10);
          if (!isNaN(target)) showQuote(target);
        });
      });

      stepBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          var delta = parseInt(btn.getAttribute('data-hx-quote-step'), 10) || 1;
          showQuote(qIdx + delta);
        });
      });
    }

    /* ----------------------------------------------------------------------
       8. Live Nepal Time Counter Status ([data-hx-open-status])
       -------------------------------------------------------------------- */
    var statusBadges = document.querySelectorAll('[data-hx-open-status]');
    if (statusBadges.length) {
      var now = new Date();
      // Nepal Time is UTC + 5h 45m (345 minutes)
      var utcMs = now.getTime() + now.getTimezoneOffset() * 60000;
      var npt = new Date(utcMs + 345 * 60000);
      var hr = npt.getHours() + npt.getMinutes() / 60;

      statusBadges.forEach(function (badge) {
        var openHr = parseFloat(badge.getAttribute('data-open') || '9');
        var closeHr = parseFloat(badge.getAttribute('data-close') || '20');
        var isOpen = hr >= openHr && hr < closeHr;
        var textEl = badge.querySelector('.hx-status-text');
        badge.classList.toggle('is-closed', !isOpen);
        if (textEl) {
          textEl.textContent = isOpen
            ? 'Open now · 9 AM – 8 PM'
            : 'Counter opens 9:00 AM';
        }
      });
    }
  });
})();
