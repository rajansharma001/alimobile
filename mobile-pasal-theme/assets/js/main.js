/**
 * ALI MOBILE CENTER & APPLE FIX — OFFICIAL JAVASCRIPT
 * Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya, Nepal
 * Direct Counter Helpline & WhatsApp: +977 9804530786
 */

document.addEventListener('DOMContentLoaded', function () {
  'use strict';

  var SHOP_PHONE = '9779804530786';
  var WA_BASE = 'https://wa.me/' + SHOP_PHONE + '?text=';

  /* ------------------------------------------------------------------------
     1. Preloader Handling (Icon-Only, Exactly 1 Second Display)
     ------------------------------------------------------------------------ */
  var preloader = document.getElementById('preloader');
  function hidePreloader() {
    if (preloader && !preloader.classList.contains('loaded')) {
      preloader.classList.add('loaded');
      setTimeout(function () {
        if (preloader) preloader.style.display = 'none';
      }, 500);
    }
  }
  // Hold preloader for exactly 1 second (1000ms) as requested
  setTimeout(hidePreloader, 1000);

  /* ------------------------------------------------------------------------
     2. Sticky Header & Scroll Spy
     ------------------------------------------------------------------------ */
  var header = document.querySelector('header.site-header');
  var navLinks = document.querySelectorAll('nav.nav-links a, .mobile-nav-list a');
  var sections = document.querySelectorAll('main section[id], .hero-slider-section');

  window.addEventListener('scroll', function () {
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;
    if (header) {
      if (scrollY > 25) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    }

    // Scroll spy for navigation
    var currentSection = '';
    sections.forEach(function (sec) {
      var top = sec.offsetTop - 120;
      var height = sec.offsetHeight;
      if (scrollY >= top && scrollY < top + height) {
        currentSection = sec.getAttribute('id') || '';
      }
    });

    navLinks.forEach(function (link) {
      link.classList.remove('active');
      var href = link.getAttribute('href') || '';
      if (currentSection && href === '#' + currentSection) {
        link.classList.add('active');
      } else if (!currentSection && (href === '#top' || href === '#')) {
        link.classList.add('active');
      }
    });
  }, { passive: true });

  /* ------------------------------------------------------------------------
     3. Mobile Navigation Drawer
     ------------------------------------------------------------------------ */
  var mobileToggleBtn = document.getElementById('btn-mobile-toggle');
  var mobileDrawer = document.getElementById('mobile-drawer');
  var mobileDrawerClose = document.getElementById('btn-drawer-close');
  var mobileDrawerOverlay = document.getElementById('mobile-drawer-overlay');
  var mobileLinks = document.querySelectorAll('.mobile-nav-list a');

  function openDrawer() {
    if (mobileDrawer) {
      mobileDrawer.classList.add('open');
      mobileDrawer.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }
  }

  function closeDrawer() {
    if (mobileDrawer) {
      mobileDrawer.classList.remove('open');
      mobileDrawer.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }
  }

  if (mobileToggleBtn) mobileToggleBtn.addEventListener('click', openDrawer);
  if (mobileDrawerClose) mobileDrawerClose.addEventListener('click', closeDrawer);
  if (mobileDrawerOverlay) mobileDrawerOverlay.addEventListener('click', closeDrawer);
  
  mobileLinks.forEach(function (link) {
    link.addEventListener('click', closeDrawer);
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && mobileDrawer && mobileDrawer.classList.contains('open')) {
      closeDrawer();
    }
  });

  /* ------------------------------------------------------------------------
     4. Hero Slider (Creative Studio, Live Progress, 3D Tilt, Touch & Keys)
     ------------------------------------------------------------------------ */
  var heroSlides = document.querySelectorAll('.hero-slide');
  var sliderDots = document.querySelectorAll('.slider-dot');
  var sliderTabs = document.querySelectorAll('.slider-dock-tab');
  var prevSlideBtn = document.getElementById('slider-prev-btn');
  var nextSlideBtn = document.getElementById('slider-next-btn');
  var heroContainer = document.querySelector('.hero-slider-section');
  var counterCurrentEl = document.querySelector('.slider-counter .current-slide');
  var progressBars = document.querySelectorAll('.dock-tab-progress-fill');
  var currentSlideIdx = 0;
  var slideTimer = null;
  var progressRaf = null;
  var progressStartTime = null;
  var SLIDE_DURATION = 5500;

  function animateProgress(timestamp) {
    if (!progressStartTime) progressStartTime = timestamp;
    var elapsed = timestamp - progressStartTime;
    var pct = Math.min(100, (elapsed / SLIDE_DURATION) * 100);
    var activeTab = document.querySelector('.slider-dock-tab.active');
    if (activeTab) {
      var fill = activeTab.querySelector('.dock-tab-progress-fill');
      if (fill) fill.style.width = pct + '%';
    }
    if (pct < 100 && slideTimer) {
      progressRaf = requestAnimationFrame(animateProgress);
    }
  }

  function resetProgress() {
    if (progressRaf) {
      cancelAnimationFrame(progressRaf);
      progressRaf = null;
    }
    progressStartTime = null;
    progressBars.forEach(function (bar) {
      bar.style.width = '0%';
    });
  }

  function startProgress() {
    resetProgress();
    progressRaf = requestAnimationFrame(animateProgress);
  }

  function showSlide(idx) {
    if (!heroSlides.length) return;
    if (idx >= heroSlides.length) idx = 0;
    if (idx < 0) idx = heroSlides.length - 1;

    heroSlides.forEach(function (s, i) {
      s.classList.toggle('active', i === idx);
    });

    sliderDots.forEach(function (dot, i) {
      dot.classList.toggle('active', i === idx);
      dot.setAttribute('aria-selected', i === idx ? 'true' : 'false');
    });

    sliderTabs.forEach(function (tab, i) {
      tab.classList.toggle('active', i === idx);
      tab.setAttribute('aria-selected', i === idx ? 'true' : 'false');
    });

    if (counterCurrentEl) {
      counterCurrentEl.textContent = (idx + 1 < 10 ? '0' : '') + (idx + 1);
    }

    currentSlideIdx = idx;
    startProgress();
  }

  function nextSlide() {
    showSlide(currentSlideIdx + 1);
  }

  function prevSlide() {
    showSlide(currentSlideIdx - 1);
  }

  function startSlideShow() {
    stopSlideShow();
    slideTimer = setInterval(nextSlide, SLIDE_DURATION);
    startProgress();
  }

  function stopSlideShow() {
    if (slideTimer) {
      clearInterval(slideTimer);
      slideTimer = null;
    }
    if (progressRaf) {
      cancelAnimationFrame(progressRaf);
      progressRaf = null;
    }
  }

  if (nextSlideBtn) {
    nextSlideBtn.addEventListener('click', function () {
      nextSlide();
      startSlideShow();
    });
  }

  if (prevSlideBtn) {
    prevSlideBtn.addEventListener('click', function () {
      prevSlide();
      startSlideShow();
    });
  }

  sliderDots.forEach(function (dot) {
    dot.addEventListener('click', function () {
      var slideNum = parseInt(this.getAttribute('data-slide-to'), 10);
      if (!isNaN(slideNum)) {
        showSlide(slideNum);
        startSlideShow();
      }
    });
  });

  sliderTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      var slideNum = parseInt(this.getAttribute('data-slide-to'), 10);
      if (!isNaN(slideNum)) {
        showSlide(slideNum);
        startSlideShow();
      }
    });
  });

  // 3D Perspective Mouse Tilt Stage
  var mediaStages = document.querySelectorAll('.hero-media-stage');
  mediaStages.forEach(function (stage) {
    var viewport = stage.querySelector('.hero-media-viewport');
    if (!viewport || !window.matchMedia('(pointer: fine)').matches) return;
    stage.addEventListener('mousemove', function (e) {
      var rect = stage.getBoundingClientRect();
      var nx = ((e.clientX - rect.left) / rect.width) - 0.5;
      var ny = ((e.clientY - rect.top) / rect.height) - 0.5;
      var rotX = -ny * 10;
      var rotY = nx * 10;
      viewport.style.transform = 'perspective(900px) rotateX(' + rotX.toFixed(2) + 'deg) rotateY(' + rotY.toFixed(2) + 'deg) scale3d(1.02, 1.02, 1.02)';
    });
    stage.addEventListener('mouseleave', function () {
      viewport.style.transform = '';
    });
  });

  if (heroContainer) {
    heroContainer.addEventListener('mouseenter', stopSlideShow);
    heroContainer.addEventListener('mouseleave', startSlideShow);

    // Keyboard Arrow navigation
    heroContainer.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowLeft') {
        prevSlide();
        startSlideShow();
      } else if (e.key === 'ArrowRight') {
        nextSlide();
        startSlideShow();
      }
    });

    // Touch swipe support for mobile
    var touchStartX = 0;
    var touchEndX = 0;

    heroContainer.addEventListener('touchstart', function (e) {
      touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    heroContainer.addEventListener('touchend', function (e) {
      touchEndX = e.changedTouches[0].screenX;
      var diffX = touchEndX - touchStartX;
      if (Math.abs(diffX) > 40) {
        if (diffX < 0) {
          nextSlide();
        } else {
          prevSlide();
        }
        startSlideShow();
      }
    }, { passive: true });
  }

  startSlideShow();

  /* ------------------------------------------------------------------------
     5. Interactive Repair Counter Station (Live Diagnostic Docket)
     ------------------------------------------------------------------------ */
  if (document.getElementById('repair-builder')) {
    var repairDevice = 'Apple iPhone';
    var repairIssue = 'Screen & Display (Cracked glass / black spots / touch dead)';
    var repairTime = '30–45 Mins';
    var repairWarranty = '90 Days Testing Warranty';
    
    var repairModelInput = document.getElementById('builder-model-input');
    var repairPreviewText = document.getElementById('builder-preview-text');
    var repairSendBtn = document.getElementById('builder-send-whatsapp-btn');
    
    // Ticket Display Elements
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

      // Update Ticket Card
      if (ticketDeviceVal) ticketDeviceVal.textContent = repairDevice;
      if (ticketModelVal) ticketModelVal.textContent = displayModel;
      if (ticketFaultVal) {
        // Short fault title (before first paren)
        var shortFault = repairIssue.split('(')[0].trim();
        ticketFaultVal.textContent = shortFault;
      }
      if (ticketTimeVal) ticketTimeVal.textContent = repairTime;
      if (ticketWarrantyVal) ticketWarrantyVal.textContent = repairWarranty;

      // Build Formatted WhatsApp Message
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
        var curVal = repairModelInput.value.trim().toLowerCase();
        quickChips.forEach(function (c) {
          if (curVal && (c.getAttribute('data-model') || '').toLowerCase() === curVal) {
            c.classList.add('active');
          } else {
            c.classList.remove('active');
          }
        });
        updateRepairTicket();
      });
    }

    // Initialize ticket with defaults
    updateRepairTicket();
  }

  /* ------------------------------------------------------------------------
     6. Product Catalog: Comprehensive Search, Category, Price & Sort Filters
     ------------------------------------------------------------------------ */
  var filterTabs = document.querySelectorAll('.filter-tab-btn');
  var categoryCards = document.querySelectorAll('.shop-cat-card');
  var productCards = document.querySelectorAll('.products-grid .product-card');
  var productsGrid = document.getElementById('products-grid');
  var searchInput = document.getElementById('site-search');
  var searchClearBtn = document.getElementById('search-clear-btn');
  var priceFilter = document.getElementById('filter-price-range');
  var sortFilter = document.getElementById('filter-sort-by');
  var resetBtn = document.getElementById('catalog-reset-btn');
  var countBadge = document.getElementById('catalog-count-num');
  var emptyNotice = document.getElementById('catalog-empty-notice');
  var currentCategory = 'all';

  function filterCatalog() {
    var query = (searchInput ? searchInput.value : '').trim().toLowerCase();
    var priceRange = (priceFilter ? priceFilter.value : 'all');
    var sortBy = (sortFilter ? sortFilter.value : 'featured');
    var matchCount = 0;
    var cardsArray = Array.prototype.slice.call(document.querySelectorAll('.products-grid .product-card'));

    // Sorting
    if (sortBy === 'price-asc') {
      cardsArray.sort(function (a, b) {
        return (parseInt(a.getAttribute('data-price-numeric'), 10) || 0) - (parseInt(b.getAttribute('data-price-numeric'), 10) || 0);
      });
    } else if (sortBy === 'price-desc') {
      cardsArray.sort(function (a, b) {
        return (parseInt(b.getAttribute('data-price-numeric'), 10) || 0) - (parseInt(a.getAttribute('data-price-numeric'), 10) || 0);
      });
    } else if (sortBy === 'name-asc') {
      cardsArray.sort(function (a, b) {
        var tA = (a.getAttribute('data-title') || '').toLowerCase();
        var tB = (b.getAttribute('data-title') || '').toLowerCase();
        return tA.localeCompare(tB);
      });
    } else {
      // Natural order (by data-index)
      cardsArray.sort(function (a, b) {
        return (parseInt(a.getAttribute('data-index'), 10) || 0) - (parseInt(b.getAttribute('data-index'), 10) || 0);
      });
    }

    // Reorder in DOM
    if (productsGrid) {
      cardsArray.forEach(function (card) {
        productsGrid.appendChild(card);
      });
    }

    cardsArray.forEach(function (card) {
      var brand = (card.getAttribute('data-brand') || '').toLowerCase();
      var category = (card.getAttribute('data-category') || '').toLowerCase();
      var priceNum = parseInt(card.getAttribute('data-price-numeric'), 10) || 0;
      var title = (card.getAttribute('data-title') || '').toLowerCase();
      var specs = (card.querySelector('.product-specs') ? card.querySelector('.product-specs').textContent : '').toLowerCase();

      // Brand / Category filter
      var matchFilter = (currentCategory === 'all') ||
                        (brand.indexOf(currentCategory) !== -1) ||
                        (category.indexOf(currentCategory) !== -1) ||
                        (currentCategory === 'apple' && (brand.indexOf('apple') !== -1 || title.indexOf('iphone') !== -1)) ||
                        (currentCategory === 'samsung' && (brand.indexOf('samsung') !== -1 || title.indexOf('galaxy') !== -1)) ||
                        (currentCategory === 'xiaomi' && (brand.indexOf('xiaomi') !== -1 || brand.indexOf('redmi') !== -1 || title.indexOf('redmi') !== -1)) ||
                        (currentCategory === 'oneplus' && (brand.indexOf('oneplus') !== -1 || title.indexOf('oneplus') !== -1)) ||
                        (currentCategory === 'google' && (brand.indexOf('google') !== -1 || brand.indexOf('pixel') !== -1 || title.indexOf('pixel') !== -1)) ||
                        (currentCategory === 'accessories' && (category.indexOf('accessories') !== -1 || brand.indexOf('accessories') !== -1 || title.indexOf('charger') !== -1 || title.indexOf('airpods') !== -1 || title.indexOf('watch') !== -1 || title.indexOf('buds') !== -1));

      // Query filter
      var matchQuery = !query ||
                       title.indexOf(query) !== -1 ||
                       specs.indexOf(query) !== -1 ||
                       brand.indexOf(query) !== -1;

      // Price range filter
      var matchPrice = true;
      if (priceRange === 'under-30k') {
        matchPrice = priceNum > 0 && priceNum < 30000;
      } else if (priceRange === '30k-75k') {
        matchPrice = priceNum >= 30000 && priceNum <= 75000;
      } else if (priceRange === '75k-150k') {
        matchPrice = priceNum > 75000 && priceNum <= 150000;
      } else if (priceRange === 'above-150k') {
        matchPrice = priceNum > 150000;
      }

      if (matchFilter && matchQuery && matchPrice) {
        card.style.display = '';
        matchCount++;
      } else {
        card.style.display = 'none';
      }
    });

    // Update counter
    if (countBadge) {
      countBadge.textContent = matchCount;
    }

    // Toggle empty notice
    if (emptyNotice) {
      if (matchCount === 0) {
        emptyNotice.classList.add('visible');
      } else {
        emptyNotice.classList.remove('visible');
      }
    }

    // Show/hide search clear button
    if (searchClearBtn) {
      searchClearBtn.style.display = query ? 'block' : 'none';
    }

    // Show/hide reset button
    var isFiltered = (currentCategory !== 'all') || (query !== '') || (priceRange !== 'all') || (sortBy !== 'featured');
    if (resetBtn) {
      resetBtn.style.display = isFiltered ? 'inline-flex' : 'none';
    }
  }

  filterTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      filterTabs.forEach(function (t) { t.classList.remove('active'); });
      this.classList.add('active');
      currentCategory = this.getAttribute('data-filter') || 'all';

      // Sync category cards if any
      categoryCards.forEach(function (c) {
        c.classList.toggle('active', c.getAttribute('data-category-target') === currentCategory);
      });

      filterCatalog();
    });
  });

  categoryCards.forEach(function (card) {
    card.addEventListener('click', function (e) {
      e.preventDefault();
      var targetCat = this.getAttribute('data-category-target') || 'all';
      currentCategory = targetCat;

      // Sync active tab
      filterTabs.forEach(function (t) {
        if (t.getAttribute('data-filter') === targetCat) {
          t.classList.add('active');
        } else {
          t.classList.remove('active');
        }
      });

      // Highlight active category card
      categoryCards.forEach(function (c) {
        c.classList.toggle('active', c.getAttribute('data-category-target') === targetCat);
      });

      filterCatalog();

      var catalogEl = document.getElementById('catalog');
      if (catalogEl) {
        catalogEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  if (priceFilter) {
    priceFilter.addEventListener('change', function () {
      filterCatalog();
    });
  }

  if (sortFilter) {
    sortFilter.addEventListener('change', function () {
      filterCatalog();
    });
  }

  if (resetBtn) {
    resetBtn.addEventListener('click', function () {
      if (searchInput) searchInput.value = '';
      if (priceFilter) priceFilter.value = 'all';
      if (sortFilter) sortFilter.value = 'featured';
      currentCategory = 'all';
      filterTabs.forEach(function (t) {
        t.classList.toggle('active', t.getAttribute('data-filter') === 'all');
      });
      categoryCards.forEach(function (c) {
        c.classList.remove('active');
      });
      filterCatalog();
    });
  }

  if (searchInput) {
    searchInput.addEventListener('input', function () {
      filterCatalog();
    });
  }

  if (searchClearBtn && searchInput) {
    searchClearBtn.addEventListener('click', function () {
      searchInput.value = '';
      filterCatalog();
      searchInput.focus();
    });
  }

  // Initial calculation of count
  filterCatalog();

  /* ------------------------------------------------------------------------
     7. Shop by Brand — Click to Filter Catalog & Smooth Scroll
     ------------------------------------------------------------------------ */
  var brandCards = document.querySelectorAll('.brands-grid .brand-card-link');
  brandCards.forEach(function (card) {
    card.addEventListener('click', function (e) {
      var brandTarget = this.getAttribute('data-filter-brand');
      if (brandTarget) {
        e.preventDefault();
        var matchingTab = document.querySelector('.filter-tab-btn[data-filter="' + brandTarget + '"]');
        if (matchingTab) {
          filterTabs.forEach(function (t) { t.classList.remove('active'); });
          matchingTab.classList.add('active');
          currentCategory = brandTarget;
          filterCatalog();

          var catalogSection = document.getElementById('catalog');
          if (catalogSection) {
            catalogSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }
        }
      }
    });
  });

  /* ------------------------------------------------------------------------
     8. Floating WhatsApp Direct Chat Widget
     ------------------------------------------------------------------------ */
  var waFloatingBtn = document.getElementById('floating-whatsapp-btn');
  var waChatPopup = document.getElementById('whatsapp-chat-popup');
  var waCloseBtn = document.getElementById('chat-popup-close-btn');
  var waQuickBtns = document.querySelectorAll('.chat-quick-btn');
  var waCustomInput = document.getElementById('chat-custom-input');
  var waCustomSendBtn = document.getElementById('chat-custom-send-btn');

  function toggleWhatsAppPopup() {
    if (waChatPopup) {
      waChatPopup.classList.toggle('active');
      if (waChatPopup.classList.contains('active') && waCustomInput) {
        waCustomInput.focus();
      }
    }
  }

  if (waFloatingBtn) waFloatingBtn.addEventListener('click', toggleWhatsAppPopup);
  if (waCloseBtn) waCloseBtn.addEventListener('click', function () {
    if (waChatPopup) waChatPopup.classList.remove('active');
  });

  // Handle Quick Pre-set Buttons
  waQuickBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var preset = this.getAttribute('data-msg') || 'Namaste Ali Mobile, malai jankari chahiyo';
      window.open(WA_BASE + encodeURIComponent(preset), '_blank');
      if (waChatPopup) waChatPopup.classList.remove('active');
    });
  });

  // Handle Custom Message Input
  function sendCustomWhatsApp() {
    if (!waCustomInput) return;
    var customMsg = waCustomInput.value.trim();
    if (!customMsg) {
      customMsg = 'Namaste Ali Mobile, malai phone / repair barema jankari chahiyo.';
    }
    window.open(WA_BASE + encodeURIComponent(customMsg), '_blank');
    waCustomInput.value = '';
    if (waChatPopup) waChatPopup.classList.remove('active');
  }

  if (waCustomSendBtn) waCustomSendBtn.addEventListener('click', sendCustomWhatsApp);
  if (waCustomInput) {
    waCustomInput.addEventListener('keydown', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        sendCustomWhatsApp();
      }
    });
  }

  /* ------------------------------------------------------------------------
     9. Back-to-Top Button
     ------------------------------------------------------------------------ */
  var backToTopBtn = document.getElementById('back-to-top-btn');
  window.addEventListener('scroll', function () {
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;
    if (backToTopBtn) {
      if (scrollY > 350) {
        backToTopBtn.classList.add('visible');
      } else {
        backToTopBtn.classList.remove('visible');
      }
    }
  }, { passive: true });

  if (backToTopBtn) {
    backToTopBtn.addEventListener('click', function () {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  /* ------------------------------------------------------------------------
     10. Scroll-Reveal Animations (IntersectionObserver & Fallback)
     ------------------------------------------------------------------------ */
  var fadeElements = document.querySelectorAll('.fade-up');
  function checkFadeIn() {
    var winHeight = window.innerHeight || document.documentElement.clientHeight;
    fadeElements.forEach(function (el) {
      if (!el.classList.contains('in-view')) {
        var rect = el.getBoundingClientRect();
        if (rect.top <= winHeight + 100) {
          el.classList.add('in-view');
        }
      }
    });
  }

  if ('IntersectionObserver' in window) {
    var appearObserver = new IntersectionObserver(function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          observer.unobserve(entry.target);
        }
      });
    }, {
      rootMargin: '100px 0px 100px 0px',
      threshold: 0.01
    });

    fadeElements.forEach(function (el) {
      appearObserver.observe(el);
    });
  }

  window.addEventListener('scroll', checkFadeIn, { passive: true });
  window.addEventListener('resize', checkFadeIn, { passive: true });
  checkFadeIn();
  setTimeout(checkFadeIn, 250);

  /* ------------------------------------------------------------------------
     11. Dynamic Year Update
     ------------------------------------------------------------------------ */
  var yearNode = document.getElementById('current-year');
  if (yearNode) {
    yearNode.textContent = new Date().getFullYear();
  }

  /* ------------------------------------------------------------------------
     12. FAQ Accordion Handler (Services Page)
     ------------------------------------------------------------------------ */
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

  /* ------------------------------------------------------------------------
     13. Contact & Consultation Form (Direct WhatsApp Dispatch & Database Log)
     ------------------------------------------------------------------------ */
  var contactForm = document.getElementById('contact-enquiry-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var name = (document.getElementById('cf-name') || {}).value || 'Customer';
      var phone = (document.getElementById('cf-phone') || {}).value || '';
      var device = (document.getElementById('cf-device') || {}).value || 'Phone';
      var service = (document.getElementById('cf-service') || {}).value || 'Repair';
      var notes = (document.getElementById('cf-notes') || {}).value || '';

      // Save to WordPress database asynchronously
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

  /* ------------------------------------------------------------------------
     14. Smooth Scrolling for Anchor Links (with Sticky Header Offset)
     ------------------------------------------------------------------------ */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var href = this.getAttribute('href');
      if (!href || href === '#' || href === '#!') return;
      var target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
        var drawer = document.getElementById('mobile-drawer');
        if (drawer && drawer.classList.contains('open')) {
          drawer.classList.remove('open');
          document.body.classList.remove('drawer-open');
        }
      }
    });
  });

});
