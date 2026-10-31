/**
 * ALI MOBILE CENTER & APPLE FIX — OFFICIAL JAVASCRIPT ENGINE
 * Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Nepal
 * Direct Counter Helpline & WhatsApp: +977 9804530786
 * Complete Store & Certified Repair Lab Interactive Architecture
 */

(function () {
  'use strict';

  var SHOP_PHONE = '9779804530786';
  var WA_BASE = 'https://wa.me/' + SHOP_PHONE + '?text=';

  // -------------------------------------------------------------
  // 1. CATALOG DATA (Handsets & Genuine Accessories)
  // -------------------------------------------------------------
  var catalogData = [
    {
      id: "c1",
      tag: "CERTIFIED TURBO",
      categoryTag: "Accessories",
      brand: "Accessories & Gear",
      name: "Anker 735 65W GaNPrime Fast Charger",
      img: "https://images.unsplash.com/photo-1583863788434-e58a36330cf0?auto=format&fit=crop&w=500&q=80",
      specs: ["Compact GaN III Semiconductor", "PowerIQ 4.0 Dynamic Allocation", "2x USB-C Ports + 1x USB-A Fast Port"],
      price: 6499,
      oldPrice: 7200,
      vat: true,
      featured: 1
    },
    {
      id: "c2",
      tag: "SMART HEALTH",
      categoryTag: "Wearable",
      brand: "Samsung Galaxy",
      name: "Samsung Galaxy Watch 6 Classic (47mm)",
      img: "https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=500&q=80",
      specs: ["1.5\" Super AMOLED Sapphire", "Exynos W930 Dual Core", "2GB RAM + 16GB Storage (Wear OS)"],
      price: 44999,
      oldPrice: 48000,
      vat: true,
      featured: 2
    },
    {
      id: "c3",
      tag: "ORIGINAL AUDIO",
      categoryTag: "Audio",
      brand: "Apple iPhone",
      name: "Apple AirPods Pro 2 (USB-C MagSafe)",
      img: "https://images.unsplash.com/photo-1600294037681-c80b4cb5b434?auto=format&fit=crop&w=500&q=80",
      specs: ["H2 Headphone Chip + Apple H2 Audio", "Adaptive Noise Cancellation 2x", "USB-C MagSafe with Precision Finding"],
      price: 38999,
      oldPrice: 42000,
      vat: true,
      featured: 3
    },
    {
      id: "c4",
      tag: "PERISCOPE TELEPHOTO",
      categoryTag: "Flagship Phone",
      brand: "OnePlus",
      name: "OnePlus 12 5G (16GB / 512GB)",
      img: "https://images.unsplash.com/photo-1598327105666-5b89351aff97?auto=format&fit=crop&w=500&q=80",
      specs: ["Snapdragon 8 Gen 3 (4nm)", "64MP 3x Periscope Telephoto Hasselblad", "5400mAh Battery + 100W SUPERVOOC"],
      price: 129999,
      oldPrice: 135000,
      vat: true,
      featured: 4
    },
    {
      id: "c5",
      tag: "LEICA OPTICS",
      categoryTag: "Flagship Phone",
      brand: "Xiaomi / Redmi",
      name: "Xiaomi 14 Leica Flagship (512GB)",
      img: "https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=500&q=80",
      specs: ["Leica Summilux 75mm Floating Lens", "Snapdragon 8 Gen 3 Flagship", "90W HyperCharge + 50W Wireless"],
      price: 69999,
      oldPrice: 74999,
      vat: true,
      featured: 5
    },
    {
      id: "c6",
      tag: "120W TURBO",
      categoryTag: "Mid-Range Phone",
      brand: "Xiaomi / Redmi",
      name: "Redmi Note 13 Pro+ 5G (256GB)",
      img: "https://images.unsplash.com/photo-1574944985070-8f3ebc6b79d2?auto=format&fit=crop&w=500&q=80",
      specs: ["200MP OIS Camera with 4x In-Sensor", "Curved 1.5K AMOLED 120Hz", "IP68 Dust & Water Resistance"],
      price: 42999,
      oldPrice: 46000,
      vat: true,
      featured: 6
    }
  ];

  // -------------------------------------------------------------
  // 2. HERO SLIDER LOGIC
  // -------------------------------------------------------------
  var slides = Array.prototype.slice.call(document.querySelectorAll(".slide"));
  var prevBtn = document.querySelector(".slider-arrow.prev");
  var nextBtn = document.querySelector(".slider-arrow.next");
  var currentSlide = 0;
  var autoPlayInterval;

  function showSlide(index) {
    if (!slides.length) return;
    currentSlide = (index + slides.length) % slides.length;
    slides.forEach(function (slide, i) {
      slide.classList.toggle("active", i === currentSlide);
      slide.querySelectorAll(".dot").forEach(function (dot, dotIndex) {
        dot.classList.toggle("active", dotIndex === currentSlide);
      });
    });
  }

  function startAutoPlay() {
    clearInterval(autoPlayInterval);
    if (slides.length > 1) {
      autoPlayInterval = setInterval(function () {
        showSlide(currentSlide + 1);
      }, 6500);
    }
  }

  if (prevBtn && nextBtn) {
    prevBtn.addEventListener("click", function () {
      showSlide(currentSlide - 1);
      startAutoPlay();
    });
    nextBtn.addEventListener("click", function () {
      showSlide(currentSlide + 1);
      startAutoPlay();
    });
  }

  document.querySelectorAll(".dot").forEach(function (dot) {
    dot.addEventListener("click", function () {
      var label = dot.getAttribute("aria-label") || "Slide 1";
      var index = Number(label.replace("Slide ", "")) - 1;
      if (!isNaN(index)) {
        showSlide(index);
        startAutoPlay();
      }
    });
  });

  // Touch swipe for Hero
  var heroSliderElem = document.getElementById("heroSlider");
  var touchStartX = 0;
  var touchEndX = 0;

  if (heroSliderElem) {
    heroSliderElem.addEventListener("touchstart", function (e) {
      if (e.changedTouches && e.changedTouches[0]) {
        touchStartX = e.changedTouches[0].screenX;
      }
    }, { passive: true });

    heroSliderElem.addEventListener("touchend", function (e) {
      if (e.changedTouches && e.changedTouches[0]) {
        touchEndX = e.changedTouches[0].screenX;
        var diff = touchStartX - touchEndX;
        if (Math.abs(diff) > 40) {
          if (diff > 0) showSlide(currentSlide + 1);
          else showSlide(currentSlide - 1);
          startAutoPlay();
        }
      }
    }, { passive: true });
  }

  // -------------------------------------------------------------
  // 3. NAVIGATION & SCROLL OBSERVER
  // -------------------------------------------------------------
  var menuToggle = document.getElementById("menuToggle");
  var nav = document.getElementById("nav");
  var headerBar = document.getElementById("topHeader");
  var scrollTopBtn = document.getElementById("scrollTopBtn");

  function closeNav() {
    if (nav) nav.classList.remove("open");
    if (menuToggle) {
      menuToggle.setAttribute("aria-expanded", "false");
      var burgerIcon = menuToggle.querySelector(".hamburger-icon");
      var closeIcon = menuToggle.querySelector(".close-icon");
      if (burgerIcon) burgerIcon.style.display = "";
      if (closeIcon) closeIcon.style.display = "none";
    }
  }

  if (menuToggle && nav) {
    menuToggle.addEventListener("click", function (e) {
      e.stopPropagation();
      var isOpen = nav.classList.toggle("open");
      menuToggle.setAttribute("aria-expanded", String(isOpen));
      var burgerIcon = menuToggle.querySelector(".hamburger-icon");
      var closeIcon = menuToggle.querySelector(".close-icon");
      if (burgerIcon) burgerIcon.style.display = isOpen ? "none" : "";
      if (closeIcon) closeIcon.style.display = isOpen ? "" : "none";
    });

    nav.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", closeNav);
    });

    document.addEventListener("click", function (e) {
      if (nav.classList.contains("open") && !nav.contains(e.target) && e.target !== menuToggle) {
        closeNav();
      }
    });
  }

  window.addEventListener("scroll", function () {
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;
    if (headerBar) {
      if (scrollY > 30) {
        headerBar.classList.add("scrolled");
      } else {
        headerBar.classList.remove("scrolled");
      }
    }

    if (scrollTopBtn) {
      if (scrollY > 350) {
        scrollTopBtn.classList.add("visible");
      } else {
        scrollTopBtn.classList.remove("visible");
      }
    }
  }, { passive: true });

  if (scrollTopBtn) {
    scrollTopBtn.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  // Global key bindings (Escape, Left, Right)
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      closeNav();
      closeQuoteModal();
    }
    if (e.key === "ArrowLeft" && slides.length) {
      showSlide(currentSlide - 1);
      startAutoPlay();
    }
    if (e.key === "ArrowRight" && slides.length) {
      showSlide(currentSlide + 1);
      startAutoPlay();
    }
  });

  // -------------------------------------------------------------
  // 4. iPHONE 16 PRO FINISH SELECTOR
  // -------------------------------------------------------------
  var finishImages = {
    "Desert Titanium": "https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=900&q=85",
    "Natural Titanium": "https://images.unsplash.com/photo-1592750475338-74b7b21085ab?auto=format&fit=crop&w=900&q=85",
    "White Titanium": "https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?auto=format&fit=crop&w=900&q=85",
    "Black Titanium": "https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=85"
  };

  function setFinish(finishName, colorHex) {
    document.querySelectorAll("#finishSelector .finish-chip, #finishSelector .finish-btn").forEach(function (btn) {
      btn.classList.toggle("active", btn.getAttribute("data-finish") === finishName);
    });
    var img = document.getElementById("flagshipDisplayImg");
    if (img && finishImages[finishName]) {
      img.src = finishImages[finishName];
    }
    var waBtn = document.getElementById("flagshipWaBtn");
    if (waBtn) {
      waBtn.href = "https://wa.me/" + SHOP_PHONE + "?text=Hello%20Ali%20Mobile%20Center,%20please%20quote%20today's%20best%20price%20for%20iPhone%2016%20Pro%20(" + encodeURIComponent(finishName) + ")%20with%20Nepal%20VAT%20Bill.";
    }
    triggerToast("Finish selected: " + finishName);
  }

  // -------------------------------------------------------------
  // 5. CATALOG FILTER & SORT LOGIC (Homepage Section)
  // -------------------------------------------------------------
  var productsGrid = document.getElementById("productsGrid");
  var catalogCount = document.getElementById("catalogCount");
  var catalogSearch = document.getElementById("catalogSearch");
  var catalogSort = document.getElementById("catalogSort");

  function renderCatalog(items) {
    if (!productsGrid) return;
    if (items.length === 0) {
      productsGrid.innerHTML = 
        '<div class="catalog-empty">' +
          '<h3 style="font-size:18px; margin:0 0 8px 0; color:var(--navy);">No matching models found</h3>' +
          '<p style="font-size:13.5px; color:var(--muted); margin:0 0 16px 0;">Try adjusting your brand radio or clearing the search text.</p>' +
          '<button class="view-all-pill" onclick="resetCatalogFilters()" type="button">Reset All Filters</button>' +
        '</div>';
      if (catalogCount) catalogCount.textContent = "0 Models Found";
      return;
    }

    if (catalogCount) {
      catalogCount.textContent = items.length + " " + (items.length === 1 ? "Model" : "Models") + " Found";
    }

    productsGrid.innerHTML = items.map(function (item) {
      var formattedPrice = item.price.toLocaleString("en-IN");
      var oldPriceHtml = item.oldPrice ? '<span class="old-price">Rs. ' + item.oldPrice.toLocaleString("en-IN") + '</span>' : '';
      var specsHtml = item.specs.map(function (spec) {
        return '<div class="spec-item"><span class="spec-item-bullet"></span><span>' + spec + '</span></div>';
      }).join("");

      var waLink = "https://wa.me/" + SHOP_PHONE + "?text=Hello%20Ali%20Mobile%20Center,%20I%20am%20interested%20in%20buying%20" + encodeURIComponent(item.name) + "%20priced%20at%20Rs.%20" + formattedPrice + ".";

      return (
        '<article class="product-card">' +
          '<div class="product-card-topbar">' +
            '<span class="product-tag">' + item.tag + '</span>' +
            '<span class="product-cat-tag">' + item.categoryTag + '</span>' +
          '</div>' +
          '<div class="product-img-box">' +
            '<img src="' + item.img + '" alt="' + item.name + '" loading="lazy" />' +
          '</div>' +
          '<div class="product-brand-row">' +
            '<span>' + item.brand + '</span>' +
            '<span class="product-mdms-tag">' +
              '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align:-1px;margin-right:3px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>' +
              'MDMS &amp; VAT' +
            '</span>' +
          '</div>' +
          '<h3 class="product-name">' + item.name + '</h3>' +
          '<div class="product-specs-list">' + specsHtml + '</div>' +
          '<div class="product-pricing-row">' +
            '<div class="price-wrap">' +
              '<span class="current-price">Rs. ' + formattedPrice + '</span>' +
              oldPriceHtml +
            '</div>' +
            '<span class="vat-tag">NEPAL VAT BILL</span>' +
          '</div>' +
          '<div class="product-actions">' +
            '<a class="card-wa-btn" href="' + waLink + '" target="_blank" rel="noopener noreferrer">' +
              '<span>WhatsApp Rate</span>' +
            '</a>' +
            '<button class="card-specs-btn" onclick="openQuoteModal(\'' + item.name.replace(/'/g, "\\'") + '\')" type="button">Specs ›</button>' +
          '</div>' +
        '</article>'
      );
    }).join("");
  }

  function filterCatalog() {
    if (!productsGrid) return;
    var query = (catalogSearch ? catalogSearch.value : '').trim().toLowerCase();
    var checkedBrand = document.querySelector('input[name="brandFilter"]:checked');
    var selectedBrand = checkedBrand ? checkedBrand.value : "all";
    var checkedPrice = document.querySelector('input[name="priceFilter"]:checked');
    var selectedPrice = checkedPrice ? checkedPrice.value : "all";

    // Update active label styles
    document.querySelectorAll('input[name="brandFilter"]').forEach(function (radio) {
      if (radio.parentElement) radio.parentElement.classList.toggle("active", radio.checked);
    });
    document.querySelectorAll('input[name="priceFilter"]').forEach(function (radio) {
      if (radio.parentElement) radio.parentElement.classList.toggle("active", radio.checked);
    });

    var filtered = catalogData.filter(function (item) {
      var matchesQuery = !query || 
        item.name.toLowerCase().includes(query) || 
        item.brand.toLowerCase().includes(query) || 
        item.tag.toLowerCase().includes(query) ||
        item.specs.some(function (s) { return s.toLowerCase().includes(query); });

      var matchesBrand = (selectedBrand === "all") || (item.brand === selectedBrand);

      var matchesPrice = true;
      if (selectedPrice === "under-30k") matchesPrice = item.price < 30000;
      else if (selectedPrice === "30k-75k") matchesPrice = item.price >= 30000 && item.price <= 75000;
      else if (selectedPrice === "75k-150k") matchesPrice = item.price > 75000 && item.price <= 150000;
      else if (selectedPrice === "above-150k") matchesPrice = item.price > 150000;

      return matchesQuery && matchesBrand && matchesPrice;
    });

    // Sort
    var sortMode = catalogSort ? catalogSort.value : "featured";
    if (sortMode === "low-high") {
      filtered.sort(function (a, b) { return a.price - b.price; });
    } else if (sortMode === "high-low") {
      filtered.sort(function (a, b) { return b.price - a.price; });
    } else {
      filtered.sort(function (a, b) { return a.featured - b.featured; });
    }

    renderCatalog(filtered);
  }

  function sortCatalog() {
    filterCatalog();
  }

  function filterCatalogByBrand(brandName) {
    var targetRadio = document.querySelector('input[name="brandFilter"][value="' + brandName + '"]');
    if (targetRadio) {
      targetRadio.checked = true;
      filterCatalog();
      var catalogSec = document.getElementById("catalog");
      if (catalogSec) catalogSec.scrollIntoView({ behavior: "smooth" });
      triggerToast("Filtering showroom: " + brandName);
    }
  }

  function resetCatalogFilters() {
    if (catalogSearch) catalogSearch.value = "";
    var allBrandRadio = document.querySelector('input[name="brandFilter"][value="all"]');
    var allPriceRadio = document.querySelector('input[name="priceFilter"][value="all"]');
    if (allBrandRadio) allBrandRadio.checked = true;
    if (allPriceRadio) allPriceRadio.checked = true;
    if (catalogSort) catalogSort.value = "featured";
    filterCatalog();
    triggerToast("All filters reset");
  }

  // -------------------------------------------------------------
  // 6. MODAL & TOAST NOTIFICATION
  // -------------------------------------------------------------
  var quoteModal = document.getElementById("quoteModal");
  var modalDevice = document.getElementById("modalDevice");
  var modalIssue = document.getElementById("modalIssue");
  var toastNotice = document.getElementById("toastNotice");
  var toastMsg = document.getElementById("toastMsg");
  var toastTimer;

  function openQuoteModal(defaultDevice) {
    if (modalDevice && defaultDevice) {
      modalDevice.value = defaultDevice;
    }
    if (quoteModal) {
      quoteModal.classList.add("open");
    }
  }

  function closeQuoteModal() {
    if (quoteModal) {
      quoteModal.classList.remove("open");
    }
  }

  function handleQuoteSubmit(e) {
    if (e && e.preventDefault) e.preventDefault();
    var dev = modalDevice ? modalDevice.value.trim() : "";
    var issue = modalIssue ? modalIssue.value : "";
    var phoneInput = document.getElementById("modalPhone");
    var phone = phoneInput ? phoneInput.value.trim() : "";

    var text = "Hello Ali Mobile Center Gulariya, I would like to request counter service for my device:%0A• Device: " + encodeURIComponent(dev) + "%0A• Problem/Service: " + encodeURIComponent(issue) + "%0A• My Phone: " + encodeURIComponent(phone);
    window.open("https://wa.me/" + SHOP_PHONE + "?text=" + text, "_blank", "noopener,noreferrer");
    closeQuoteModal();
    triggerToast("Opening WhatsApp with your request...");
  }

  function triggerToast(message) {
    if (!toastNotice || !toastMsg) return;
    clearTimeout(toastTimer);
    toastMsg.textContent = message;
    toastNotice.classList.add("show");
    toastTimer = setTimeout(function () {
      toastNotice.classList.remove("show");
    }, 2600);
  }

  // -------------------------------------------------------------
  // 7. PRELOADER HANDLING (Exact 1s duration)
  // -------------------------------------------------------------
  var preloader = document.getElementById('preloader');
  function hidePreloader() {
    if (preloader && !preloader.classList.contains('loaded')) {
      preloader.classList.add('loaded');
      setTimeout(function () {
        if (preloader) preloader.style.display = 'none';
      }, 500);
    }
  }
  setTimeout(hidePreloader, 1000);

  
  // -------------------------------------------------------------
  // SERVICES PAGE: INTERACTIVE REPAIR COUNTER STATION
  // -------------------------------------------------------------
  var repairBuilder = document.getElementById('repair-builder');
  if (repairBuilder) {
    var repairDevice = 'Apple iPhone';
    var repairIssue = 'Screen & Display (Cracked glass / black spots / touch dead)';
    var repairTime = '30–45 Mins';
    var repairWarranty = '90 Days Testing Warranty';

    var repairModelInput = document.getElementById('builder-model-input') || document.querySelector('.model-text-field');
    var repairPreviewText = document.getElementById('builder-preview-text');
    var repairSendBtn = document.getElementById('builder-send-whatsapp-btn');

    var ticketDeviceVal = document.getElementById('ticket-device-val');
    var ticketModelVal = document.getElementById('ticket-model-val');
    var ticketFaultVal = document.getElementById('ticket-fault-val');
    var ticketTimeVal = document.getElementById('ticket-time-val');
    var ticketWarrantyVal = document.getElementById('ticket-warranty-val');

    var devicePills = document.querySelectorAll('.device-pills-grid .dev-pill-btn');
    var faultCards = document.querySelectorAll('.fault-cards-grid .fault-select-card');

    function updateRepairTicket() {
      var rawModel = (repairModelInput ? repairModelInput.value : '').trim();
      var displayModel = rawModel ? rawModel : 'Specified at Counter';
      var modelDesc = rawModel ? ' (Model: ' + rawModel + ')' : '';

      if (ticketDeviceVal) ticketDeviceVal.textContent = repairDevice;
      if (ticketModelVal) ticketModelVal.textContent = displayModel;
      if (ticketFaultVal) {
        var shortFault = repairIssue.split('(')[0].trim();
        ticketFaultVal.textContent = shortFault;
      }
      if (ticketTimeVal) ticketTimeVal.textContent = repairTime;
      if (ticketWarrantyVal) ticketWarrantyVal.textContent = repairWarranty;

      var message = 'Namaste Ali Mobile & Apple Fix, mero ' + repairDevice + modelDesc +
                    ' ma problem chha: ' + repairIssue + '. Gulariya counter ma check ra repair cost barema jankari dinus.';

      if (repairPreviewText) {
        repairPreviewText.textContent = '"' + message + '"';
      }

      if (repairSendBtn) {
        repairSendBtn.href = WA_BASE + encodeURIComponent(message);
      }
    }

    devicePills.forEach(function (pill) {
      pill.addEventListener('click', function () {
        devicePills.forEach(function (p) { p.classList.remove('active'); });
        this.classList.add('active');
        repairDevice = this.getAttribute('data-device') || 'Smartphone';
        updateRepairTicket();
      });
    });

    faultCards.forEach(function (card) {
      card.addEventListener('click', function () {
        faultCards.forEach(function (c) { c.classList.remove('active'); });
        this.classList.add('active');
        repairIssue = this.getAttribute('data-issue') || 'Hardware Fault';
        repairTime = this.getAttribute('data-time') || 'Same-Day';
        repairWarranty = this.getAttribute('data-warranty') || 'Testing Warranty';
        updateRepairTicket();
      });
    });

    var quickChips = document.querySelectorAll('.quick-chip-btn');
    quickChips.forEach(function (chip) {
      chip.addEventListener('click', function () {
        var model = this.getAttribute('data-model') || '';
        if (repairModelInput) {
          repairModelInput.value = model;
          quickChips.forEach(function (c) { c.classList.remove('active'); });
          this.classList.add('active');
          updateRepairTicket();
        }
      });
    });

    if (repairModelInput) {
      repairModelInput.addEventListener('input', function () {
        updateRepairTicket();
      });
    }

    updateRepairTicket();
  }

  // -------------------------------------------------------------
  // 8. SERVICES PAGE: FAQ ACCORDION HANDLER
  // -------------------------------------------------------------
  var faqButtons = document.querySelectorAll('.faq-question-btn');
  faqButtons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.closest('.faq-item');
      if (item) {
        var isOpen = item.classList.contains('active');
        var parentGrid = item.closest('.faq-grid');
        if (parentGrid) {
          parentGrid.querySelectorAll('.faq-item').forEach(function (other) {
            other.classList.remove('active');
            var b = other.querySelector('.faq-question-btn');
            if (b) b.setAttribute('aria-expanded', 'false');
          });
        }
        if (!isOpen) {
          item.classList.add('active');
          btn.setAttribute('aria-expanded', 'true');
        }
      }
    });
  });

  // -------------------------------------------------------------
  // 9. CONTACT FORM: WHATSAPP DISPATCH & LOG
  // -------------------------------------------------------------
  var contactForm = document.getElementById('contact-enquiry-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var name = (document.getElementById('cf-name') || {}).value || 'Customer';
      var phone = (document.getElementById('cf-phone') || {}).value || '';
      var device = (document.getElementById('cf-device') || {}).value || 'Phone';
      var service = (document.getElementById('cf-service') || {}).value || 'Repair';
      var notes = (document.getElementById('cf-notes') || {}).value || '';

      if (window.mpAjax && window.mpAjax.ajaxurl) {
        var formData = new FormData();
        formData.append('action', 'mp_submit_contact_form');
        formData.append('nonce', window.mpAjax.nonce || '');
        formData.append('name', name);
        formData.append('phone', phone);
        formData.append('device', device);
        formData.append('service', service);
        formData.append('notes', notes);
        try {
          fetch(window.mpAjax.ajaxurl, {
            method: 'POST',
            body: formData,
            keepalive: true
          });
        } catch (err) {}
      }

      var msg = 'Namaste Ali Mobile Center, ma ' + name + (phone ? ' (Phone: ' + phone + ')' : '') + '. ' +
                'Mero ' + device + ' ma ' + service + ' service barema enquiry chha. ' +
                (notes ? 'Notes: ' + notes + '. ' : '') +
                'Gulariya counter ma check ra cost barema jankari dinus.';

      var waUrl = WA_BASE + encodeURIComponent(msg);
      window.open(waUrl, '_blank', 'noopener,noreferrer');
    });
  }

  // -------------------------------------------------------------
  // 10. DEDICATED SHOP PAGE FILTRATION & PAGINATION (page-shop.php)
  // -------------------------------------------------------------
  var shopFilterTabs = document.querySelectorAll('.filter-tab-btn');
  var shopCards = document.querySelectorAll('.shop-products-main .product-card, .catalog-section .product-card');
  var shopSearchInput = document.getElementById('site-search');
  var shopPaginationControls = document.getElementById('shop-pagination-controls');
  var shopPaginationInfo = document.getElementById('shop-pagination-info');

  if (shopFilterTabs.length > 0 && shopCards.length > 0) {
    var shopCategory = 'all';
    var shopPage = 1;
    var SHOP_PAGE_SIZE = 9;

    function renderShopPagination(totalMatches) {
      if (!shopPaginationControls) return;
      var totalPages = Math.ceil(totalMatches / SHOP_PAGE_SIZE) || 1;
      if (shopPage > totalPages) shopPage = 1;
      shopPaginationControls.innerHTML = '';

      if (totalMatches <= SHOP_PAGE_SIZE) {
        if (shopPaginationInfo) {
          shopPaginationInfo.textContent = totalMatches > 0 ? 'Showing all ' + totalMatches + ' handsets' : '';
        }
        return;
      }

      var pBtn = document.createElement('button');
      pBtn.type = 'button';
      pBtn.className = 'page-btn' + (shopPage === 1 ? ' disabled' : '');
      pBtn.innerHTML = '‹ Prev';
      pBtn.disabled = (shopPage === 1);
      pBtn.addEventListener('click', function () {
        if (shopPage > 1) { shopPage--; filterShopProducts(false); }
      });
      shopPaginationControls.appendChild(pBtn);

      for (var p = 1; p <= totalPages; p++) {
        var numBtn = document.createElement('button');
        numBtn.type = 'button';
        numBtn.className = 'page-btn' + (p === shopPage ? ' active' : '');
        numBtn.textContent = p;
        (function (pageIndex) {
          numBtn.addEventListener('click', function () {
            if (shopPage !== pageIndex) { shopPage = pageIndex; filterShopProducts(false); }
          });
        })(p);
        shopPaginationControls.appendChild(numBtn);
      }

      var nBtn = document.createElement('button');
      nBtn.type = 'button';
      nBtn.className = 'page-btn' + (shopPage === totalPages ? ' disabled' : '');
      nBtn.innerHTML = 'Next ›';
      nBtn.disabled = (shopPage === totalPages);
      nBtn.addEventListener('click', function () {
        if (shopPage < totalPages) { shopPage++; filterShopProducts(false); }
      });
      shopPaginationControls.appendChild(nBtn);

      if (shopPaginationInfo) {
        var sIdx = (shopPage - 1) * SHOP_PAGE_SIZE + 1;
        var eIdx = Math.min(shopPage * SHOP_PAGE_SIZE, totalMatches);
        shopPaginationInfo.textContent = 'Showing ' + sIdx + '–' + eIdx + ' of ' + totalMatches + ' handsets (Page ' + shopPage + ' of ' + totalPages + ')';
      }
    }

    function filterShopProducts(resetPage) {
      if (resetPage !== false) shopPage = 1;
      var q = (shopSearchInput ? shopSearchInput.value : '').trim().toLowerCase();
      var matched = [];

      shopCards.forEach(function (card) {
        var cardCat = (card.getAttribute('data-brand') || card.getAttribute('data-category') || '').toLowerCase();
        var title = (card.querySelector('.product-title, .product-name, h3') || {}).textContent || '';
        title = title.toLowerCase();

        var matchCategory = (shopCategory === 'all') || (cardCat.indexOf(shopCategory) !== -1);
        var matchQ = !q || title.indexOf(q) !== -1;

        if (matchCategory && matchQ) {
          matched.push(card);
        }
      });

      var start = (shopPage - 1) * SHOP_PAGE_SIZE;
      var end = start + SHOP_PAGE_SIZE;

      shopCards.forEach(function (card) {
        var pos = matched.indexOf(card);
        card.style.display = (pos >= start && pos < end) ? '' : 'none';
      });

      var catalogCountEl = document.getElementById('catalog-count-num');
      if (catalogCountEl) {
        catalogCountEl.textContent = matched.length;
      }

      var emptyNotice = document.getElementById('catalog-empty-notice');
      if (emptyNotice) {
        emptyNotice.style.display = (matched.length === 0) ? 'block' : 'none';
      }

      var mobileFilterCount = document.getElementById('mobile-filter-count');
      if (mobileFilterCount) {
        mobileFilterCount.textContent = (shopCategory !== 'all' || q) ? '1+' : '0';
      }

      renderShopPagination(matched.length);
    }

    shopFilterTabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        shopFilterTabs.forEach(function (t) { t.classList.remove('active'); });
        this.classList.add('active');
        shopCategory = this.getAttribute('data-filter') || 'all';
        filterShopProducts(true);
      });
    });

    if (shopSearchInput) {
      shopSearchInput.addEventListener('input', function () {
        filterShopProducts(true);
      });
    }

    
    var searchClearBtn = document.getElementById('search-clear-btn');
    if (searchClearBtn && shopSearchInput) {
      searchClearBtn.addEventListener('click', function () {
        shopSearchInput.value = '';
        searchClearBtn.style.display = 'none';
        filterShopProducts(true);
      });
      shopSearchInput.addEventListener('input', function () {
        searchClearBtn.style.display = shopSearchInput.value.length > 0 ? 'block' : 'none';
      });
    }

    var shopResetBtn = document.getElementById('sidebar-reset-btn');
    if (shopResetBtn) {
      shopResetBtn.addEventListener('click', function () {
        if (shopSearchInput) shopSearchInput.value = '';
        if (searchClearBtn) searchClearBtn.style.display = 'none';
        shopCategory = 'all';
        shopFilterTabs.forEach(function (t) {
          if ((t.getAttribute('data-filter') || '') === 'all') {
            t.classList.add('active');
          } else {
            t.classList.remove('active');
          }
        });
        filterShopProducts(true);
      });
    }

    var mobileFilterDrawerBtn = document.getElementById('mobile-filter-drawer-btn');
    var shopSidebarFilters = document.getElementById('shop-sidebar-filters');
    if (mobileFilterDrawerBtn && shopSidebarFilters) {
      mobileFilterDrawerBtn.addEventListener('click', function () {
        shopSidebarFilters.classList.toggle('drawer-open');
      });
    }
  
    filterShopProducts(true);
  }

  // -------------------------------------------------------------
  // 10. REVIEWS CAROUSEL SLIDER
  // -------------------------------------------------------------
  function initReviewsCarousel() {
    var viewport = document.getElementById("reviewsViewport");
    var track = document.getElementById("reviewsTrack");
    var prevBtn = document.getElementById("reviewsPrev");
    var nextBtn = document.getElementById("reviewsNext");
    var dotsContainer = document.getElementById("reviewsDots");

    if (!viewport || !track) return;

    var cards = track.querySelectorAll(".review-card");
    if (!cards || cards.length === 0) return;

    var currentIndex = 0;
    var autoPlayTimer = null;
    var isHovered = false;

    function getItemsPerView() {
      var w = window.innerWidth;
      if (w <= 640) return 1;
      if (w <= 960) return 2;
      return 3;
    }

    function getMaxIndex() {
      var perView = getItemsPerView();
      return Math.max(0, cards.length - perView);
    }

    function updateDots() {
      if (!dotsContainer) return;
      var maxIdx = getMaxIndex();
      var totalSteps = maxIdx + 1;

      var existingDots = dotsContainer.querySelectorAll(".carousel-dot");
      if (existingDots.length !== totalSteps) {
        dotsContainer.innerHTML = "";
        for (var i = 0; i < totalSteps; i++) {
          (function (index) {
            var dot = document.createElement("button");
            dot.className = "carousel-dot" + (index === currentIndex ? " active" : "");
            dot.setAttribute("type", "button");
            dot.setAttribute("aria-label", "Go to review slide " + (index + 1));
            dot.addEventListener("click", function () {
              goToSlide(index);
            });
            dotsContainer.appendChild(dot);
          })(i);
        }
      } else {
        existingDots.forEach(function (dot, i) {
          if (i === currentIndex) {
            dot.classList.add("active");
          } else {
            dot.classList.remove("active");
          }
        });
      }
    }

    function goToSlide(index) {
      var maxIdx = getMaxIndex();
      if (index < 0) index = 0;
      if (index > maxIdx) index = maxIdx;
      currentIndex = index;

      var card = cards[0];
      if (!card) return;

      var cardWidth = card.getBoundingClientRect().width;
      var gap = 24;
      var offset = currentIndex * (cardWidth + gap);

      track.style.transform = "translateX(-" + offset + "px)";

      if (prevBtn) {
        prevBtn.disabled = currentIndex === 0;
        prevBtn.style.opacity = currentIndex === 0 ? "0.45" : "1";
      }
      if (nextBtn) {
        nextBtn.disabled = currentIndex === maxIdx;
        nextBtn.style.opacity = currentIndex === maxIdx ? "0.45" : "1";
      }

      updateDots();
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", function () {
        goToSlide(currentIndex - 1);
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", function () {
        goToSlide(currentIndex + 1);
      });
    }

    // Touch & Swipe Support
    var touchStartX = 0;
    var touchEndX = 0;

    viewport.addEventListener("touchstart", function (e) {
      isHovered = true;
      touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    viewport.addEventListener("touchend", function (e) {
      isHovered = false;
      touchEndX = e.changedTouches[0].screenX;
      var diff = touchStartX - touchEndX;
      if (Math.abs(diff) > 40) {
        var maxIdx = getMaxIndex();
        if (diff > 0) {
          // Swiped left -> next
          if (currentIndex < maxIdx) {
            goToSlide(currentIndex + 1);
          } else {
            goToSlide(0);
          }
        } else {
          // Swiped right -> prev
          if (currentIndex > 0) {
            goToSlide(currentIndex - 1);
          } else {
            goToSlide(maxIdx);
          }
        }
      }
    }, { passive: true });

    // Mouse Pause AutoPlay
    viewport.addEventListener("mouseenter", function () {
      isHovered = true;
    });
    viewport.addEventListener("mouseleave", function () {
      isHovered = false;
    });

    // Auto Play Interval
    function startReviewAutoPlay() {
      if (autoPlayTimer) clearInterval(autoPlayTimer);
      autoPlayTimer = setInterval(function () {
        if (!isHovered) {
          var maxIdx = getMaxIndex();
          if (currentIndex >= maxIdx) {
            goToSlide(0);
          } else {
            goToSlide(currentIndex + 1);
          }
        }
      }, 5000);
    }

    // Resize handler
    window.addEventListener("resize", function () {
      goToSlide(currentIndex);
    });

    goToSlide(0);
    startReviewAutoPlay();
  }

  // -------------------------------------------------------------
  // 11. EXPOSE GLOBAL HANDLERS ON WINDOW
  // -------------------------------------------------------------
  window.setFinish = setFinish;
  window.openQuoteModal = openQuoteModal;
  window.closeQuoteModal = closeQuoteModal;
  window.handleQuoteSubmit = handleQuoteSubmit;
  window.triggerToast = triggerToast;
  window.filterCatalogByBrand = filterCatalogByBrand;
  window.resetCatalogFilters = resetCatalogFilters;
  window.filterCatalog = filterCatalog;
  window.sortCatalog = sortCatalog;

  // Initialize
  filterCatalog();
  startAutoPlay();
  initReviewsCarousel();

})();
