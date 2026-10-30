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
     4. Hero Slider (Multi-Slide, Auto-Play, Pause-on-Hover, Touch Swipe)
     ------------------------------------------------------------------------ */
  var heroSlides = document.querySelectorAll('.hero-slide');
  var sliderDots = document.querySelectorAll('.slider-dot');
  var sliderTabs = document.querySelectorAll('.slider-dock-tab');
  var sliderPills = document.querySelectorAll('.slider-progress-pill');
  var prevSlideBtn = document.getElementById('slider-prev-btn');
  var nextSlideBtn = document.getElementById('slider-next-btn');
  var heroContainer = document.querySelector('.hero-slider-section');
  var currentSlideIdx = 0;
  var slideTimer = null;
  var SLIDE_DURATION = 5500;

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

    sliderPills.forEach(function (pill, i) {
      pill.classList.toggle('active', i === idx);
      pill.setAttribute('aria-selected', i === idx ? 'true' : 'false');
    });

    currentSlideIdx = idx;
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
  }

  function stopSlideShow() {
    if (slideTimer) {
      clearInterval(slideTimer);
      slideTimer = null;
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

  sliderPills.forEach(function (pill) {
    pill.addEventListener('click', function () {
      var slideNum = parseInt(this.getAttribute('data-slide-to'), 10);
      if (!isNaN(slideNum)) {
        showSlide(slideNum);
        startSlideShow();
      }
    });
  });

  if (heroContainer) {
    heroContainer.addEventListener('mouseenter', stopSlideShow);
    heroContainer.addEventListener('mouseleave', startSlideShow);

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

  /* ------------------------------------------------------------------------
     6. Product Catalog: Search & Filter Tabs
     ------------------------------------------------------------------------ */
  var filterTabs = document.querySelectorAll('.filter-tab-btn');
  var productCards = document.querySelectorAll('.products-grid .product-card');
  var searchInput = document.getElementById('site-search');
  var searchClearBtn = document.getElementById('search-clear-btn');
  var emptyNotice = document.getElementById('catalog-empty-notice');
  var currentCategory = 'all';

  function filterCatalog() {
    var query = (searchInput ? searchInput.value : '').trim().toLowerCase();
    var matchCount = 0;

    productCards.forEach(function (card) {
      var brand = (card.getAttribute('data-brand') || '').toLowerCase();
      var category = (card.getAttribute('data-category') || '').toLowerCase();
      var titleEl = card.querySelector('.product-title') || card.querySelector('.product-name');
      var specsEl = card.querySelector('.product-specs') || card.querySelector('.product-short-spec');
      var title = (titleEl ? titleEl.textContent : '').toLowerCase();
      var specs = (specsEl ? specsEl.textContent : '').toLowerCase();

      var matchFilter = (currentCategory === 'all') ||
                        (currentCategory === brand) ||
                        (currentCategory === category);

      var matchQuery = !query ||
                       title.indexOf(query) !== -1 ||
                       specs.indexOf(query) !== -1 ||
                       brand.indexOf(query) !== -1;

      if (matchFilter && matchQuery) {
        card.style.display = '';
        matchCount++;
      } else {
        card.style.display = 'none';
      }
    });

    if (emptyNotice) {
      if (matchCount === 0) {
        emptyNotice.classList.add('visible');
      } else {
        emptyNotice.classList.remove('visible');
      }
    }

    if (searchClearBtn) {
      searchClearBtn.style.display = query ? 'block' : 'none';
    }
  }

  filterTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      filterTabs.forEach(function (t) { t.classList.remove('active'); });
      this.classList.add('active');
      currentCategory = this.getAttribute('data-filter') || 'all';
      filterCatalog();
    });
  });

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
