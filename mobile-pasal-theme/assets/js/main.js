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
  // 2. HERO SLIDER LOGIC (Directional Slide, Staggered Flow & Progress Timer)
  // -------------------------------------------------------------
  var slides = Array.prototype.slice.call(document.querySelectorAll("#heroSlider .slide"));
  var prevBtn = document.querySelector("#heroSlider .slider-arrow.prev");
  var nextBtn = document.querySelector("#heroSlider .slider-arrow.next");
  var heroSliderElem = document.getElementById("heroSlider");
  var heroProgress = document.getElementById("heroProgress");
  var currentSlide = 0;
  var isHeroPaused = false;
  var heroProgressTimer = null;
  var heroProgressMs = 0;
  var SLIDE_DURATION_MS = 6000;
  var TICK_INTERVAL_MS = 50;

  function showSlide(index, direction) {
    if (!slides.length) return;
    var nextSlide = (index + slides.length) % slides.length;
    var dir = direction || (nextSlide > currentSlide ? "next" : "prev");

    // Remove active and directional classes from all slides
    slides.forEach(function (slide) {
      slide.classList.remove("active", "slide-from-right", "slide-from-left");
    });

    // Activate the target slide with the proper directional glide
    var target = slides[nextSlide];
    if (target) {
      // Force DOM reflow so animations retrigger cleanly on every slide change
      void target.offsetWidth;
      target.classList.add("active");
      if (dir === "next") {
        target.classList.add("slide-from-right");
      } else {
        target.classList.add("slide-from-left");
      }
    }

    currentSlide = nextSlide;

    // Reset progress bar on manual or automatic slide change
    heroProgressMs = 0;
    if (heroProgress) {
      heroProgress.style.width = "0%";
    }

    // Synchronize dot indicators across all slides
    document.querySelectorAll("#heroSlider .dots").forEach(function (dotsContainer) {
      dotsContainer.querySelectorAll(".dot").forEach(function (dot, dotIndex) {
        dot.classList.toggle("active", dotIndex === currentSlide);
      });
    });
  }

  function startAutoPlay() {
    if (heroProgressTimer) clearInterval(heroProgressTimer);
    heroProgressMs = 0;
    if (slides.length <= 1) return;

    heroProgressTimer = setInterval(function () {
      if (!isHeroPaused) {
        heroProgressMs += TICK_INTERVAL_MS;
        var pct = Math.min(100, (heroProgressMs / SLIDE_DURATION_MS) * 100);
        if (heroProgress) {
          heroProgress.style.width = pct + "%";
        }
        if (heroProgressMs >= SLIDE_DURATION_MS) {
          heroProgressMs = 0;
          showSlide(currentSlide + 1, "next");
        }
      }
    }, TICK_INTERVAL_MS);
  }

  // Bind click handlers to all Prev buttons across slides
  document.querySelectorAll("#heroSlider .slider-arrow.prev").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      showSlide(currentSlide - 1, "prev");
    });
  });

  // Bind click handlers to all Next buttons across slides
  document.querySelectorAll("#heroSlider .slider-arrow.next").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      showSlide(currentSlide + 1, "next");
    });
  });

  // Keyboard navigation for Hero slider
  document.addEventListener("keydown", function (e) {
    var hero = document.getElementById("heroSlider");
    if (!hero) return;
    var rect = hero.getBoundingClientRect();
    if (rect.top < window.innerHeight && rect.bottom > 0) {
      if (e.key === "ArrowLeft") {
        showSlide(currentSlide - 1, "prev");
      } else if (e.key === "ArrowRight") {
        showSlide(currentSlide + 1, "next");
      }
    }
  });

  // Bind click handlers to dot indicators across all slides
  document.querySelectorAll("#heroSlider .dot").forEach(function (dot) {
    dot.addEventListener("click", function () {
      var label = dot.getAttribute("aria-label") || "";
      var match = label.match(/\d+/);
      var targetIndex = match ? parseInt(match[0], 10) - 1 : 0;
      if (!isNaN(targetIndex) && targetIndex !== currentSlide) {
        var dir = targetIndex > currentSlide ? "next" : "prev";
        showSlide(targetIndex, dir);
      }
    });
  });

  // Touch swipe & hover pause for Hero
  var touchStartX = 0;
  var touchEndX = 0;

  if (heroSliderElem) {
    heroSliderElem.addEventListener("mouseenter", function () {
      isHeroPaused = true;
    });

    heroSliderElem.addEventListener("mouseleave", function () {
      isHeroPaused = false;
    });

    heroSliderElem.addEventListener("touchstart", function (e) {
      isHeroPaused = true;
      if (e.changedTouches && e.changedTouches[0]) {
        touchStartX = e.changedTouches[0].screenX;
      }
    }, { passive: true });

    heroSliderElem.addEventListener("touchend", function (e) {
      isHeroPaused = false;
      if (e.changedTouches && e.changedTouches[0]) {
        touchEndX = e.changedTouches[0].screenX;
        var diff = touchStartX - touchEndX;
        if (Math.abs(diff) > 40) {
          if (diff > 0) {
            showSlide(currentSlide + 1, "next");
          } else {
            showSlide(currentSlide - 1, "prev");
          }
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

    // Mobile submenu toggle buttons
    nav.querySelectorAll(".mobile-dropdown-btn").forEach(function (btn) {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var parentLi = btn.closest(".menu-item-has-children");
        if (parentLi) {
          var isExpanded = parentLi.classList.toggle("open-sub");
          btn.setAttribute("aria-expanded", String(isExpanded));
        }
      });
    });

    nav.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", function (e) {
        var href = a.getAttribute("href");
        var parentLi = a.closest(".menu-item-has-children");
        // If it's a mobile dummy parent link, toggle submenu instead of closing
        if (window.innerWidth <= 1140 && parentLi && (!href || href === "#" || href === "javascript:void(0)")) {
          e.preventDefault();
          e.stopPropagation();
          var isExpanded = parentLi.classList.toggle("open-sub");
          var btn = parentLi.querySelector(".mobile-dropdown-btn");
          if (btn) btn.setAttribute("aria-expanded", String(isExpanded));
          return;
        }
        closeNav();
      });
    });

    document.addEventListener("click", function (e) {
      if (nav.classList.contains("open") && !nav.contains(e.target) && e.target !== menuToggle) {
        closeNav();
      }
    });
  }

  function handleStickyHeader() {
    var scrollY = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
    if (headerBar) {
      if (scrollY > 20) {
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
  }

  window.addEventListener("scroll", handleStickyHeader, { passive: true });
  handleStickyHeader();

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
      showSlide(currentSlide - 1, "prev");
    }
    if (e.key === "ArrowRight" && slides.length) {
      showSlide(currentSlide + 1, "next");
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
      img.style.transition = "opacity 0.22s cubic-bezier(0.16, 1, 0.3, 1), transform 0.22s cubic-bezier(0.16, 1, 0.3, 1)";
      img.style.opacity = "0.2";
      img.style.transform = "scale(0.96) translateY(4px)";
      setTimeout(function () {
        img.src = finishImages[finishName];
        img.style.opacity = "1";
        img.style.transform = "scale(1) translateY(0)";
      }, 160);
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
  var isShopPage = !!document.getElementById("shopProductsGrid");

  function renderCatalog(items) {
    if (!productsGrid || isShopPage) return;
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

    var activeData = (window.mpCatalogData && Array.isArray(window.mpCatalogData) && window.mpCatalogData.length > 0)
      ? window.mpCatalogData
      : catalogData;

    productsGrid.innerHTML = items.map(function (item) {
      var specsHtml = (item.specs || []).map(function (spec) {
        return '<div class="spec-item"><span class="spec-item-bullet"></span><span>' + spec + '</span></div>';
      }).join("");

      var itemUrl = item.url || '#';
      var waLink = item.waUrl || ("https://wa.me/" + SHOP_PHONE + "?text=Hello%20Ali%20Mobile%20Center,%20I%20am%20interested%20in%20buying%20" + encodeURIComponent(item.name) + ".%20Please%20share%20today's%20counter%20price%20and%20availability.");

      var pricingHtml = '';
      if (item.isPriceVisible !== false && item.priceFmt) {
        pricingHtml =
          '<div class="product-pricing-row">' +
            '<div class="price-wrap">' +
              '<span class="current-price">' + item.priceFmt + '</span>' +
              (item.oldPriceFmt ? '<span class="old-price">' + item.oldPriceFmt + '</span>' : '') +
            '</div>' +
            '<span class="vat-tag">VAT Included</span>' +
          '</div>';
      } else if (item.price && !item.priceFmt) {
        pricingHtml =
          '<div class="product-pricing-row">' +
            '<div class="price-wrap">' +
              '<span class="current-price">Rs. ' + Number(item.price).toLocaleString() + '</span>' +
              (item.oldPrice ? '<span class="old-price">Rs. ' + Number(item.oldPrice).toLocaleString() + '</span>' : '') +
            '</div>' +
            '<span class="vat-tag">VAT Included</span>' +
          '</div>';
      } else {
        pricingHtml =
          '<div class="product-pricing-row">' +
            '<span class="product-card-quote-pill" style="display:inline-flex;align-items:center;gap:5px;font-size:11.5px;font-weight:750;color:#1d4ed8;background:#eff6ff;padding:4px 9px;border-radius:6px;border:1px solid #bfdbfe;">' +
              '<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>' +
              'Contact for Price' +
            '</span>' +
          '</div>';
      }

      return (
        '<article class="product-card">' +
          '<div class="product-card-topbar">' +
            '<span class="product-tag">' + (item.tag || 'Official VAT Bill') + '</span>' +
            '<span class="product-cat-tag">' + (item.categoryTag || item.brand || 'Handset') + '</span>' +
          '</div>' +
          '<a class="product-img-box" href="' + itemUrl + '" aria-label="' + item.name + '">' +
            '<img src="' + item.img + '" alt="' + item.name + '" loading="lazy" />' +
          '</a>' +
          '<div class="product-brand-row">' +
            '<span>' + (item.brand || 'Handset') + '</span>' +
            '<span class="product-mdms-tag">' +
              '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align:-1px;margin-right:3px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>' +
              'MDMS &amp; VAT' +
            '</span>' +
          '</div>' +
          '<h3 class="product-name">' +
            '<a href="' + itemUrl + '">' + item.name + '</a>' +
          '</h3>' +
          pricingHtml +
          '<div class="product-specs-list">' + specsHtml + '</div>' +
          '<div class="product-actions">' +
            '<a class="card-wa-btn" href="' + waLink + '" target="_blank" rel="noopener noreferrer">' +
              '<span>WhatsApp Rate</span>' +
            '</a>' +
            '<a class="card-specs-btn" href="' + itemUrl + '#specs-matrix" title="View Full Specifications">' +
              '<span>Specs ›</span>' +
            '</a>' +
          '</div>' +
        '</article>'
      );
    }).join("");
  }

  function filterCatalog() {
    if (!productsGrid || isShopPage) return;
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

    var activeData = (window.mpCatalogData && Array.isArray(window.mpCatalogData) && window.mpCatalogData.length > 0)
      ? window.mpCatalogData
      : catalogData;

    var filtered = activeData.filter(function (item) {
      var matchesQuery = !query || 
        item.name.toLowerCase().includes(query) || 
        (item.brand && item.brand.toLowerCase().includes(query)) || 
        (item.tag && item.tag.toLowerCase().includes(query)) ||
        (item.specs && item.specs.some(function (s) { return s.toLowerCase().includes(query); }));

      var matchesBrand = (selectedBrand === "all") || 
        (item.brand && item.brand.toLowerCase() === selectedBrand.toLowerCase()) ||
        (item.brandSlug && item.brandSlug.toLowerCase() === selectedBrand.toLowerCase());

      var matchesPrice = true;
      var numPrice = typeof item.price === 'number' ? item.price : Number(item.price) || 0;
      if (selectedPrice === "under-30k") matchesPrice = numPrice < 30000;
      else if (selectedPrice === "30k-75k") matchesPrice = numPrice >= 30000 && numPrice <= 75000;
      else if (selectedPrice === "75k-150k") matchesPrice = numPrice > 75000 && numPrice <= 150000;
      else if (selectedPrice === "above-150k") matchesPrice = numPrice > 150000;

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
  // 7. PRELOADER HANDLING (Exact duration from Theme Options with failsafe)
  // -------------------------------------------------------------
  var preloader = document.getElementById('preloader');
  if (preloader) {
    var rawDur = parseInt(preloader.getAttribute('data-duration'), 10);
    var preloaderDuration = (!isNaN(rawDur) && rawDur >= 200) ? rawDur : 1000;
    var preloaderDismissed = false;

    function hidePreloader() {
      if (preloaderDismissed || !preloader) return;
      preloaderDismissed = true;
      preloader.classList.add('loaded');
      setTimeout(function () {
        if (preloader && preloader.parentNode) {
          preloader.style.display = 'none';
        }
      }, 500);
    }

    // Dismiss cleanly after configured duration
    setTimeout(hidePreloader, preloaderDuration);

    // Fallback failsafe so preloader never hangs
    if (document.readyState === 'complete') {
      setTimeout(hidePreloader, Math.min(preloaderDuration, 400));
    } else {
      window.addEventListener('load', function () {
        setTimeout(hidePreloader, Math.min(preloaderDuration, 500));
      });
      setTimeout(hidePreloader, Math.max(preloaderDuration + 1500, 3000));
    }
  }

  
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
  var shopGrid = document.getElementById('shopProductsGrid');
  var shopCards = shopGrid ? Array.from(shopGrid.querySelectorAll('.product-card')) : [];
  var shopSearchInput = document.getElementById('site-search');
  var shopPaginationControls = document.getElementById('shop-pagination-controls');
  var shopPaginationInfo = document.getElementById('shop-pagination-info');
  var shopSortSelect = document.getElementById('filter-sort-by');

  if (shopCards.length > 0 && shopGrid) {
    var shopCategory = 'all';
    var shopBudget = 'all';
    var shopPage = 1;
    var SHOP_PAGE_SIZE = 9;

    function renderShopPagination(totalMatches) {
      if (!shopPaginationControls) return;
      var totalPages = Math.ceil(totalMatches / SHOP_PAGE_SIZE) || 1;
      if (shopPage > totalPages) shopPage = 1;
      shopPaginationControls.innerHTML = '';

      if (totalMatches <= SHOP_PAGE_SIZE) {
        if (shopPaginationInfo) {
          shopPaginationInfo.textContent = totalMatches > 0 ? 'Showing all ' + totalMatches + ' models' : '';
        }
        return;
      }

      var pBtn = document.createElement('button');
      pBtn.type = 'button';
      pBtn.className = 'page-btn' + (shopPage === 1 ? ' disabled' : '');
      pBtn.innerHTML = '‹ Prev';
      pBtn.disabled = (shopPage === 1);
      pBtn.addEventListener('click', function () {
        if (shopPage > 1) {
          shopPage--;
          filterShopProducts(false);
          var catalogSec = document.getElementById('catalog');
          if (catalogSec) catalogSec.scrollIntoView({ behavior: 'smooth' });
        }
      });
      shopPaginationControls.appendChild(pBtn);

      for (var p = 1; p <= totalPages; p++) {
        var numBtn = document.createElement('button');
        numBtn.type = 'button';
        numBtn.className = 'page-btn' + (p === shopPage ? ' active' : '');
        numBtn.textContent = p;
        (function (pageIndex) {
          numBtn.addEventListener('click', function () {
            if (shopPage !== pageIndex) {
              shopPage = pageIndex;
              filterShopProducts(false);
              var catalogSec = document.getElementById('catalog');
              if (catalogSec) catalogSec.scrollIntoView({ behavior: 'smooth' });
            }
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
        if (shopPage < totalPages) {
          shopPage++;
          filterShopProducts(false);
          var catalogSec = document.getElementById('catalog');
          if (catalogSec) catalogSec.scrollIntoView({ behavior: 'smooth' });
        }
      });
      shopPaginationControls.appendChild(nBtn);

      if (shopPaginationInfo) {
        var sIdx = (shopPage - 1) * SHOP_PAGE_SIZE + 1;
        var eIdx = Math.min(shopPage * SHOP_PAGE_SIZE, totalMatches);
        shopPaginationInfo.textContent = 'Showing ' + sIdx + '–' + eIdx + ' of ' + totalMatches + ' models (Page ' + shopPage + ' of ' + totalPages + ')';
      }
    }

    function sortShopCards(cardList) {
      if (!shopSortSelect) return cardList;
      var sortVal = shopSortSelect.value;
      return cardList.sort(function (a, b) {
        var priceA = parseInt(a.getAttribute('data-price-numeric') || '0', 10);
        var priceB = parseInt(b.getAttribute('data-price-numeric') || '0', 10);
        var titleA = (a.getAttribute('data-title') || '').toLowerCase();
        var titleB = (b.getAttribute('data-title') || '').toLowerCase();
        var idxA = parseInt(a.getAttribute('data-index') || '0', 10);
        var idxB = parseInt(b.getAttribute('data-index') || '0', 10);

        if (sortVal === 'price-asc' || sortVal === 'low-high') {
          return priceA - priceB;
        } else if (sortVal === 'price-desc' || sortVal === 'high-low') {
          return priceB - priceA;
        } else if (sortVal === 'name-asc') {
          return titleA.localeCompare(titleB);
        } else {
          return idxA - idxB;
        }
      });
    }

    function filterShopProducts(resetPage) {
      if (resetPage !== false) shopPage = 1;
      var q = (shopSearchInput ? shopSearchInput.value : '').trim().toLowerCase();
      var matched = [];

      shopCards.forEach(function (card) {
        var cardBrand = (card.getAttribute('data-brand') || '').toLowerCase();
        var cardCat = (card.getAttribute('data-category') || '').toLowerCase();
        var title = (card.getAttribute('data-title') || (card.querySelector('.product-name, .product-title') || {}).textContent || '').toLowerCase();
        var priceNum = parseInt(card.getAttribute('data-price-numeric') || '0', 10);

        var matchBrand = (shopCategory === 'all') || (cardBrand === shopCategory) || (cardCat === shopCategory) || (cardBrand.indexOf(shopCategory) !== -1);
        var matchQ = !q || (title.indexOf(q) !== -1) || (cardBrand.indexOf(q) !== -1);

        var matchBudget = true;
        if (shopBudget === 'under-30k') matchBudget = (priceNum > 0 && priceNum < 30000);
        else if (shopBudget === '30k-75k') matchBudget = (priceNum >= 30000 && priceNum <= 75000);
        else if (shopBudget === '75k-150k') matchBudget = (priceNum >= 75000 && priceNum <= 150000);
        else if (shopBudget === 'above-150k') matchBudget = (priceNum > 150000);

        if (matchBrand && matchQ && matchBudget) {
          matched.push(card);
        }
      });

      // Sort matched items
      matched = sortShopCards(matched);

      // Re-append sorted cards in order
      matched.forEach(function (card) {
        shopGrid.appendChild(card);
      });

      var start = (shopPage - 1) * SHOP_PAGE_SIZE;
      var end = start + SHOP_PAGE_SIZE;

      shopCards.forEach(function (card) {
        var pos = matched.indexOf(card);
        card.style.display = (pos >= start && pos < end) ? '' : 'none';
      });

      var catalogCountEl = document.getElementById('catalog-count-num');
      if (catalogCountEl) {
        catalogCountEl.textContent = matched.length + ' ' + (matched.length === 1 ? 'Model' : 'Models') + ' Found';
      }

      var emptyNotice = document.getElementById('catalog-empty-notice');
      if (emptyNotice) {
        emptyNotice.style.display = (matched.length === 0) ? 'block' : 'none';
      }

      var mobileFilterCount = document.getElementById('mobile-filter-count');
      if (mobileFilterCount) {
        var activeCount = 0;
        if (shopCategory !== 'all') activeCount++;
        if (shopBudget !== 'all') activeCount++;
        if (q) activeCount++;
        mobileFilterCount.textContent = activeCount;
      }

      renderShopPagination(matched.length);
    }

    // Brand Radios / Tabs
    document.querySelectorAll('input[name="brandFilter"]').forEach(function (radio) {
      radio.addEventListener('change', function () {
        shopCategory = this.value;
        document.querySelectorAll('input[name="brandFilter"]').forEach(function (r) {
          var label = r.closest('.filter-radio-label');
          if (label) label.classList.toggle('active', r.checked);
        });
        filterShopProducts(true);
      });
    });

    // Budget Radios
    document.querySelectorAll('input[name="priceFilter"]').forEach(function (radio) {
      radio.addEventListener('change', function () {
        shopBudget = this.value;
        document.querySelectorAll('input[name="priceFilter"]').forEach(function (r) {
          var label = r.closest('.filter-radio-label');
          if (label) label.classList.toggle('active', r.checked);
        });
        filterShopProducts(true);
      });
    });

    // Sort select
    if (shopSortSelect) {
      shopSortSelect.addEventListener('change', function () {
        filterShopProducts(false);
      });
    }

    // Search input
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
        shopBudget = 'all';
        if (shopSortSelect) shopSortSelect.value = 'featured';

        var allBrand = document.querySelector('input[name="brandFilter"][value="all"]');
        if (allBrand) {
          allBrand.checked = true;
          document.querySelectorAll('input[name="brandFilter"]').forEach(function (r) {
            var label = r.closest('.filter-radio-label');
            if (label) label.classList.toggle('active', r.checked);
          });
        }

        var allPrice = document.querySelector('input[name="priceFilter"][value="all"]');
        if (allPrice) {
          allPrice.checked = true;
          document.querySelectorAll('input[name="priceFilter"]').forEach(function (r) {
            var label = r.closest('.filter-radio-label');
            if (label) label.classList.toggle('active', r.checked);
          });
        }

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
  // 10. UNIVERSAL TOUCH-FIRST RESPONSIVE CAROUSEL ENGINE
  // -------------------------------------------------------------
  function setupGenericCarousel(config) {
    var viewport = document.getElementById(config.viewportId);
    var track = document.getElementById(config.trackId);
    var prevBtn = document.getElementById(config.prevId);
    var nextBtn = document.getElementById(config.nextId);
    var dotsContainer = document.getElementById(config.dotsId);

    if (!viewport || !track) return;

    var cards = track.children;
    if (!cards || cards.length === 0) return;

    var currentIndex = 0;
    var autoPlayTimer = null;
    var isHovered = false;

    function getItemsPerView() {
      var w = window.innerWidth;
      if (w <= 640) return 1;
      if (w <= 960) return 2;
      return config.itemsPerViewDesktop || 3;
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
            dot.setAttribute("aria-label", "Go to slide " + (index + 1));
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
      var gap = config.gap || 24;
      var offset = currentIndex * (cardWidth + gap);

      track.style.transform = "translateX(-" + offset + "px)";

      if (prevBtn) {
        prevBtn.disabled = currentIndex === 0;
        prevBtn.style.opacity = currentIndex === 0 ? "0.4" : "1";
      }
      if (nextBtn) {
        nextBtn.disabled = currentIndex === maxIdx;
        nextBtn.style.opacity = currentIndex === maxIdx ? "0.4" : "1";
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

    // Touch & Swipe Support (Mobile First)
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
          if (currentIndex < maxIdx) {
            goToSlide(currentIndex + 1);
          } else {
            goToSlide(0);
          }
        } else {
          if (currentIndex > 0) {
            goToSlide(currentIndex - 1);
          } else {
            goToSlide(maxIdx);
          }
        }
      }
    }, { passive: true });

    viewport.addEventListener("mouseenter", function () {
      isHovered = true;
    });
    viewport.addEventListener("mouseleave", function () {
      isHovered = false;
    });

    function startAutoPlay() {
      if (autoPlayTimer) clearInterval(autoPlayTimer);
      if (config.autoPlay === false) return;
      autoPlayTimer = setInterval(function () {
        if (!isHovered) {
          var maxIdx = getMaxIndex();
          if (currentIndex >= maxIdx) {
            goToSlide(0);
          } else {
            goToSlide(currentIndex + 1);
          }
        }
      }, config.interval || 4500);
    }

    window.addEventListener("resize", function () {
      goToSlide(currentIndex);
    });

    goToSlide(0);
    startAutoPlay();
  }

  function initAllCarousels() {
    // 1. Homepage Reviews
    setupGenericCarousel({
      viewportId: "reviewsViewport",
      trackId: "reviewsTrack",
      prevId: "reviewsPrev",
      nextId: "reviewsNext",
      dotsId: "reviewsDots",
      autoPlay: true,
      gap: 24,
      itemsPerViewDesktop: 3
    });

    // 2. About Page Reviews
    setupGenericCarousel({
      viewportId: "aboutReviewsViewport",
      trackId: "aboutReviewsTrack",
      prevId: "aboutReviewsPrev",
      nextId: "aboutReviewsNext",
      dotsId: "aboutReviewsDots",
      autoPlay: true,
      gap: 24,
      itemsPerViewDesktop: 3
    });

    // 3. Single Handset Similar Smartphone Models
    setupGenericCarousel({
      viewportId: "relatedViewport",
      trackId: "relatedTrack",
      prevId: "relatedPrev",
      nextId: "relatedNext",
      dotsId: "relatedDots",
      autoPlay: true,
      gap: 24,
      itemsPerViewDesktop: 3
    });
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
  if (productsGrid && !isShopPage) {
    filterCatalog();
  }
  startAutoPlay();
  initAllCarousels();

})();
