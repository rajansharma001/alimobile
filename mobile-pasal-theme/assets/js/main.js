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
  var homePaginationWrapper = document.getElementById("homePaginationWrapper");
  var homePaginationControls = document.getElementById("homePaginationControls");
  var homePaginationInfo = document.getElementById("homePaginationInfo");
  var isShopPage = !!document.getElementById("shopProductsGrid");
  var homeCatalogPage = 1;
  var HOME_CATALOG_PAGE_SIZE = 9; // 9 handsets per page (3 rows of 3 on desktop)

  function renderHomeCatalogPagination(totalMatches, totalPages, allFilteredItems) {
    if (!homePaginationControls || !homePaginationWrapper) return;

    if (totalMatches <= HOME_CATALOG_PAGE_SIZE) {
      homePaginationControls.innerHTML = "";
      if (homePaginationInfo) {
        homePaginationInfo.textContent = totalMatches > 0 ? "Showing all " + totalMatches + " models" : "";
      }
      homePaginationWrapper.style.display = totalMatches > 0 ? "flex" : "none";
      return;
    }

    homePaginationWrapper.style.display = "flex";
    homePaginationControls.innerHTML = "";

    // Prev Button
    var pBtn = document.createElement("button");
    pBtn.type = "button";
    pBtn.className = "page-btn" + (homeCatalogPage === 1 ? " disabled" : "");
    pBtn.innerHTML = "‹ Prev";
    pBtn.disabled = (homeCatalogPage === 1);
    pBtn.addEventListener("click", function () {
      if (homeCatalogPage > 1) {
        homeCatalogPage--;
        renderCatalog(allFilteredItems, false);
        var catalogSec = document.getElementById("catalog");
        if (catalogSec) catalogSec.scrollIntoView({ behavior: "smooth" });
      }
    });
    homePaginationControls.appendChild(pBtn);

    // Number Buttons
    for (var p = 1; p <= totalPages; p++) {
      var numBtn = document.createElement("button");
      numBtn.type = "button";
      numBtn.className = "page-btn" + (p === homeCatalogPage ? " active" : "");
      numBtn.textContent = p;
      (function (pageIndex) {
        numBtn.addEventListener("click", function () {
          if (homeCatalogPage !== pageIndex) {
            homeCatalogPage = pageIndex;
            renderCatalog(allFilteredItems, false);
            var catalogSec = document.getElementById("catalog");
            if (catalogSec) catalogSec.scrollIntoView({ behavior: "smooth" });
          }
        });
      })(p);
      homePaginationControls.appendChild(numBtn);
    }

    // Next Button
    var nBtn = document.createElement("button");
    nBtn.type = "button";
    nBtn.className = "page-btn" + (homeCatalogPage === totalPages ? " disabled" : "");
    nBtn.innerHTML = "Next ›";
    nBtn.disabled = (homeCatalogPage === totalPages);
    nBtn.addEventListener("click", function () {
      if (homeCatalogPage < totalPages) {
        homeCatalogPage++;
        renderCatalog(allFilteredItems, false);
        var catalogSec = document.getElementById("catalog");
        if (catalogSec) catalogSec.scrollIntoView({ behavior: "smooth" });
      }
    });
    homePaginationControls.appendChild(nBtn);

    // Info Label
    if (homePaginationInfo) {
      var sIdx = (homeCatalogPage - 1) * HOME_CATALOG_PAGE_SIZE + 1;
      var eIdx = Math.min(homeCatalogPage * HOME_CATALOG_PAGE_SIZE, totalMatches);
      homePaginationInfo.textContent = "Showing " + sIdx + "–" + eIdx + " of " + totalMatches + " models (Page " + homeCatalogPage + " of " + totalPages + ")";
    }
  }

  function renderCatalog(items, resetPage) {
    if (!productsGrid || isShopPage) return;

    if (resetPage !== false) {
      homeCatalogPage = 1;
    }

    if (!items || items.length === 0) {
      productsGrid.innerHTML = 
        '<div class="catalog-empty">' +
          '<h3 style="font-size:18px; margin:0 0 8px 0; color:var(--navy);">No matching models found</h3>' +
          '<p style="font-size:13.5px; color:var(--muted); margin:0 0 16px 0;">Try adjusting your brand radio or clearing the search text.</p>' +
          '<button class="view-all-pill" onclick="resetCatalogFilters()" type="button">Reset All Filters</button>' +
        '</div>';
      if (catalogCount) catalogCount.textContent = "0 Models Found";
      if (homePaginationWrapper) homePaginationWrapper.style.display = "none";
      return;
    }

    var totalMatches = items.length;
    if (catalogCount) {
      catalogCount.textContent = totalMatches + " " + (totalMatches === 1 ? "Model" : "Models") + " Found";
    }

    var totalPages = Math.ceil(totalMatches / HOME_CATALOG_PAGE_SIZE) || 1;
    if (homeCatalogPage > totalPages) homeCatalogPage = 1;
    if (homeCatalogPage < 1) homeCatalogPage = 1;

    var startIndex = (homeCatalogPage - 1) * HOME_CATALOG_PAGE_SIZE;
    var pagedItems = items.slice(startIndex, startIndex + HOME_CATALOG_PAGE_SIZE);

    function escHtml(str) {
      if (str === null || str === undefined) return '';
      return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
    }

    productsGrid.innerHTML = pagedItems.map(function (item) {
      var specsHtml = (item.specs || []).map(function (spec) {
        return '<div class="spec-item"><span class="spec-item-bullet"></span><span>' + escHtml(spec) + '</span></div>';
      }).join("");

      var itemUrl = item.url || '#';
      var waLink = item.waUrl || ("https://wa.me/" + SHOP_PHONE + "?text=Hello%20Ali%20Mobile%20Center,%20I%20am%20interested%20in%20buying%20" + encodeURIComponent(item.name) + ".%20Please%20share%20today's%20counter%20price%20and%20availability.");

      var pricingHtml = '';
      if (item.isPriceVisible !== false && item.priceFmt) {
        pricingHtml =
          '<div class="product-pricing-row">' +
            '<div class="price-wrap">' +
              '<span class="current-price">' + escHtml(item.priceFmt) + '</span>' +
              (item.oldPriceFmt ? '<span class="old-price">' + escHtml(item.oldPriceFmt) + '</span>' : '') +
            '</div>' +
            '<span class="vat-tag">VAT Included</span>' +
          '</div>';
      } else if (item.isPriceVisible !== false && item.price && !item.priceFmt) {
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
              escHtml(item.hiddenPriceText || 'Contact for Counter Price') +
            '</span>' +
          '</div>';
      }

      var comparePayload = JSON.stringify({
        id: item.id || item.name,
        title: item.name || 'Handset',
        brand: item.brand || 'Handset',
        img: item.img || '',
        url: itemUrl,
        priceFmt: (item.isPriceVisible !== false && item.priceFmt) ? item.priceFmt : (item.hiddenPriceText || 'Contact for Counter Price'),
        screen: item.screen || (item.specs && item.specs[0]) || '—',
        chip: item.chip || (item.specs && item.specs[1]) || '—',
        camera: item.camera || '—',
        battery: item.battery || '—',
        storage: item.storage || (item.specs && item.specs[2]) || '—',
        warranty: item.warranty || '1 Year Official Warranty'
      });

      return (
        '<article class="product-card">' +
          '<div class="product-card-topbar">' +
            '<span class="product-tag">' + escHtml(item.tag || 'Official VAT Bill') + '</span>' +
            '<span class="product-cat-tag">' + escHtml(item.categoryTag || item.brand || 'Handset') + '</span>' +
          '</div>' +
          '<a class="product-img-box" href="' + escHtml(itemUrl) + '" aria-label="' + escHtml(item.name) + '">' +
            '<img src="' + escHtml(item.img) + '" alt="' + escHtml(item.name) + '" loading="lazy" />' +
          '</a>' +
          '<div class="product-brand-row">' +
            '<span>' + escHtml(item.brand || 'Handset') + '</span>' +
            '<span class="product-mdms-tag">' +
              '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align:-1px;margin-right:3px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>' +
              'MDMS &amp; VAT' +
            '</span>' +
          '</div>' +
          '<h3 class="product-name">' +
            '<a href="' + escHtml(itemUrl) + '">' + escHtml(item.name) + '</a>' +
          '</h3>' +
          pricingHtml +
          '<div class="product-specs-list">' + specsHtml + '</div>' +
          '<div class="product-actions">' +
            '<a class="card-wa-btn" href="' + escHtml(waLink) + '" target="_blank" rel="noopener noreferrer">' +
              '<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" aria-hidden="true"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>' +
              '<span>' + (item.isPriceVisible !== false ? 'WhatsApp Rate' : 'Inquire Rate') + '</span>' +
            '</a>' +
            '<button type="button" class="card-compare-btn" data-id="' + escHtml(item.id || item.name) + '" data-compare="' + escHtml(comparePayload) + '" title="Compare Handset Specs">' +
              '<span>+ Compare</span>' +
            '</button>' +
            '<a class="card-specs-btn" href="' + escHtml(itemUrl) + '#specs-matrix" title="View Full Specifications">' +
              '<span>Specs ›</span>' +
            '</a>' +
          '</div>' +
        '</article>'
      );
    }).join("");

    if (typeof syncCompareButtonsState === "function") {
      syncCompareButtonsState();
    }

    renderHomeCatalogPagination(totalMatches, totalPages, items);
  }

  function filterCatalog(resetPage) {
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

    renderCatalog(filtered, resetPage !== false);
  }

  function sortCatalog() {
    filterCatalog(true);
  }

  function filterCatalogByBrand(brandName) {
    var targetRadio = document.querySelector('input[name="brandFilter"][value="' + brandName + '"]');
    if (targetRadio) {
      targetRadio.checked = true;
      filterCatalog(true);
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
    filterCatalog(true);
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
  // 11. SIDE-BY-SIDE HANDSET COMPARISON ENGINE (Up to 3 Phones)
  // -------------------------------------------------------------
  var COMPARE_STORAGE_KEY = "mp_compare_handsets_v1";
  var compareList = [];

  try {
    var savedCompare = sessionStorage.getItem(COMPARE_STORAGE_KEY);
    if (savedCompare) {
      var parsedCompare = JSON.parse(savedCompare);
      if (Array.isArray(parsedCompare)) {
        compareList = parsedCompare.slice(0, 3);
      }
    }
  } catch (err) {
    compareList = [];
  }

  function saveCompareList() {
    try {
      sessionStorage.setItem(COMPARE_STORAGE_KEY, JSON.stringify(compareList));
    } catch (err) {}
  }

  function escSafe(str) {
    if (str === null || str === undefined) return "";
    return String(str)
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#39;");
  }

  function syncCompareButtonsState() {
    var selectedIds = compareList.map(function (c) { return String(c.id); });
    document.querySelectorAll(".card-compare-btn").forEach(function (btn) {
      var cid = String(btn.getAttribute("data-id") || "");
      var isSelected = selectedIds.indexOf(cid) !== -1;
      btn.classList.toggle("active", isSelected);
      var lbl = btn.querySelector(".compare-btn-label") || btn.querySelector("span");
      if (lbl) {
        if (btn.classList.contains("btn-flagship-compare")) {
          lbl.textContent = isSelected ? "✓ In Compare" : "+ Compare Specs";
        } else {
          lbl.textContent = isSelected ? "✓ Added" : "+ Compare";
        }
      }
    });
  }

  function renderCompareBarAndModal() {
    var bar = document.getElementById("mpCompareBar");
    var slotsWrap = document.getElementById("mpCompareSlots");
    var countText = document.getElementById("mpCompareCountText");
    var tableWrap = document.getElementById("mpCompareTableWrap");

    syncCompareButtonsState();

    if (!bar || !slotsWrap) return;

    if (compareList.length === 0) {
      bar.classList.remove("visible");
      bar.setAttribute("aria-hidden", "true");
      var modal = document.getElementById("mpCompareModal");
      if (modal) modal.classList.remove("open");
      return;
    }

    bar.classList.add("visible");
    bar.setAttribute("aria-hidden", "false");
    if (countText) {
      countText.textContent = compareList.length + " / 3 Selected";
    }

    var slotsHtml = "";
    for (var i = 0; i < 3; i++) {
      var item = compareList[i];
      if (item) {
        slotsHtml +=
          '<div class="mp-compare-slot filled">' +
            '<img src="' + escSafe(item.img) + '" alt="" />' +
            '<div class="mp-compare-slot-meta">' +
              '<strong>' + escSafe(item.title) + '</strong>' +
              '<span>' + escSafe(item.priceFmt) + '</span>' +
            '</div>' +
            '<button type="button" class="mp-compare-remove" data-remove-id="' + escSafe(item.id) + '" aria-label="Remove">&times;</button>' +
          '</div>';
      } else {
        slotsHtml +=
          '<div class="mp-compare-slot empty">' +
            '<span>+ Select Phone ' + (i + 1) + '</span>' +
          '</div>';
      }
    }
    slotsWrap.innerHTML = slotsHtml;

    if (tableWrap) {
      var rows = [
        { label: "Counter Price / Quote", key: "priceFmt", bold: true },
        { label: "Brand & Ecosystem", key: "brand" },
        { label: "Display Architecture", key: "screen" },
        { label: "Processor / Silicon", key: "chip" },
        { label: "Camera & Optics", key: "camera" },
        { label: "Battery & Charging", key: "battery" },
        { label: "RAM & Storage", key: "storage" },
        { label: "Warranty & MDMS", key: "warranty" }
      ];

      var theadCols = compareList.map(function (c) {
        var waHref = "https://wa.me/" + SHOP_PHONE + "?text=" + encodeURIComponent("Namaste Ali Mobile, ma " + c.title + " (" + c.priceFmt + ") compare garera herdaichhu. Availability confirm gardinus na.");
        return (
          '<th>' +
            '<div class="mp-comp-th-card">' +
              '<button type="button" class="mp-comp-th-remove" data-remove-id="' + escSafe(c.id) + '" title="Remove">&times;</button>' +
              '<a href="' + escSafe(c.url) + '" class="mp-comp-th-img"><img src="' + escSafe(c.img) + '" alt="' + escSafe(c.title) + '" /></a>' +
              '<a href="' + escSafe(c.url) + '" class="mp-comp-th-title">' + escSafe(c.title) + '</a>' +
              '<div class="mp-comp-th-actions">' +
                '<a href="' + escSafe(waHref) + '" target="_blank" rel="noopener noreferrer" class="mp-comp-wa-btn">WhatsApp</a>' +
                '<a href="' + escSafe(c.url) + '" class="mp-comp-view-btn">Details ›</a>' +
              '</div>' +
            '</div>' +
          '</th>'
        );
      }).join("");

      var tbodyRows = rows.map(function (r) {
        var tds = compareList.map(function (c) {
          var val = c[r.key] || "—";
          return '<td class="' + (r.bold ? 'mp-comp-price-cell' : '') + '">' + escSafe(val) + '</td>';
        }).join("");
        return '<tr><th scope="row">' + escSafe(r.label) + '</th>' + tds + '</tr>';
      }).join("");

      tableWrap.innerHTML =
        '<table class="mp-compare-table">' +
          '<thead><tr><th>Specification</th>' + theadCols + '</tr></thead>' +
          '<tbody>' + tbodyRows + '</tbody>' +
        '</table>';
    }
  }

  document.addEventListener("click", function (e) {
    var compBtn = e.target.closest(".card-compare-btn");
    if (compBtn) {
      e.preventDefault();
      var raw = compBtn.getAttribute("data-compare");
      if (!raw) return;
      try {
        var data = JSON.parse(raw);
        var existingIdx = -1;
        for (var i = 0; i < compareList.length; i++) {
          if (String(compareList[i].id) === String(data.id)) {
            existingIdx = i;
            break;
          }
        }
        if (existingIdx !== -1) {
          compareList.splice(existingIdx, 1);
          triggerToast("Removed from comparison: " + data.title);
        } else {
          if (compareList.length >= 3) {
            triggerToast("Maximum 3 phones can be compared at once.");
            var cModal = document.getElementById("mpCompareModal");
            if (cModal) cModal.classList.add("open");
            return;
          }
          compareList.push(data);
          triggerToast("Added to compare: " + data.title);
        }
        saveCompareList();
        renderCompareBarAndModal();
      } catch (err) {}
      return;
    }

    var remBtn = e.target.closest("[data-remove-id]");
    if (remBtn) {
      e.preventDefault();
      var remId = String(remBtn.getAttribute("data-remove-id"));
      compareList = compareList.filter(function (c) { return String(c.id) !== remId; });
      saveCompareList();
      renderCompareBarAndModal();
      return;
    }
  });

  var compClearBtn = document.getElementById("mpCompareClearBtn");
  if (compClearBtn) {
    compClearBtn.addEventListener("click", function () {
      compareList = [];
      saveCompareList();
      renderCompareBarAndModal();
    });
  }

  var compOpenBtn = document.getElementById("mpCompareOpenBtn");
  var compModal = document.getElementById("mpCompareModal");
  var compCloseBtn = document.getElementById("mpCompareModalClose");

  if (compOpenBtn && compModal) {
    compOpenBtn.addEventListener("click", function () {
      renderCompareBarAndModal();
      compModal.classList.add("open");
      compModal.setAttribute("aria-hidden", "false");
    });
  }
  if (compCloseBtn && compModal) {
    compCloseBtn.addEventListener("click", function () {
      compModal.classList.remove("open");
      compModal.setAttribute("aria-hidden", "true");
    });
  }
  if (compModal) {
    compModal.addEventListener("click", function (e) {
      if (e.target === compModal) {
        compModal.classList.remove("open");
        compModal.setAttribute("aria-hidden", "true");
      }
    });
  }

  // -------------------------------------------------------------
  // 12. LIVE AJAX QUICK SEARCH & AUTOCOMPLETE MODAL (Ctrl+K)
  // -------------------------------------------------------------
  var qsModal = document.getElementById("mpQuickSearchModal");
  var qsOpenBtn = document.getElementById("mpQuickSearchOpen");
  var qsCloseBtn = document.getElementById("mpQuickSearchClose");
  var qsInput = document.getElementById("mpQuickSearchInput");
  var qsResults = document.getElementById("mpQuickSearchResults");
  var qsTimer = null;
  var qsDefaultHtml = qsResults ? qsResults.innerHTML : "";

  function openQuickSearch() {
    if (!qsModal) return;
    qsModal.classList.add("open");
    qsModal.setAttribute("aria-hidden", "false");
    if (qsInput) {
      setTimeout(function () { qsInput.focus(); }, 60);
    }
  }

  function closeQuickSearch() {
    if (!qsModal) return;
    qsModal.classList.remove("open");
    qsModal.setAttribute("aria-hidden", "true");
  }

  if (qsOpenBtn) {
    qsOpenBtn.addEventListener("click", function (e) {
      e.preventDefault();
      openQuickSearch();
    });
  }
  if (qsCloseBtn) {
    qsCloseBtn.addEventListener("click", closeQuickSearch);
  }
  if (qsModal) {
    qsModal.addEventListener("click", function (e) {
      if (e.target === qsModal) closeQuickSearch();
    });
  }

  document.addEventListener("keydown", function (e) {
    if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === "k") {
      e.preventDefault();
      openQuickSearch();
    }
    if (e.key === "Escape") {
      closeQuickSearch();
      if (compModal && compModal.classList.contains("open")) {
        compModal.classList.remove("open");
      }
    }
  });

  function runLiveSearch(query) {
    if (!qsResults) return;
    var q = (query || "").trim();
    if (q.length < 2) {
      qsResults.innerHTML = qsDefaultHtml;
      return;
    }

    qsResults.innerHTML = '<div class="mp-qsearch-loading">Searching Gulariya Showroom &amp; Repair Lab...</div>';

    var ajaxEndpoint = (window.mpAjax && window.mpAjax.ajaxurl)
      ? window.mpAjax.ajaxurl
      : ((window.mp_ajax && window.mp_ajax.ajax_url) ? window.mp_ajax.ajax_url : "/wp-admin/admin-ajax.php");

    fetch(ajaxEndpoint + "?action=mp_live_search&q=" + encodeURIComponent(q))
      .then(function (r) { return r.json(); })
      .then(function (res) {
        if (!res || !res.success || !res.data) {
          qsResults.innerHTML = '<div class="mp-qsearch-loading">No matching results found.</div>';
          return;
        }
        var d = res.data;
        var html = "";

        if (d.docket) {
          html +=
            '<div class="mp-qsearch-group">' +
              '<div class="mp-qsearch-group-label">LIVE REPAIR DOCKET TRACKER</div>' +
              '<a href="' + escSafe(d.docket.url) + '" class="mp-qsearch-docket-item">' +
                '<strong>' + escSafe(d.docket.label) + '</strong>' +
                '<span>Open Live Status →</span>' +
              '</a>' +
            '</div>';
        }

        if (d.handsets && d.handsets.length > 0) {
          html += '<div class="mp-qsearch-group"><div class="mp-qsearch-group-label">VERIFIED HANDSETS (' + d.handsets.length + ')</div>';
          d.handsets.forEach(function (h) {
            html +=
              '<a href="' + escSafe(h.url) + '" class="mp-qsearch-item">' +
                '<img src="' + escSafe(h.img) + '" alt="" class="mp-qsearch-thumb" />' +
                '<div class="mp-qsearch-meta">' +
                  '<strong>' + escSafe(h.title) + '</strong>' +
                  '<span>' + escSafe(h.brand) + (h.specs ? ' • ' + escSafe(h.specs) : '') + '</span>' +
                '</div>' +
                '<div class="mp-qsearch-price">' + escSafe(h.priceFmt) + '</div>' +
              '</a>';
          });
          html += '</div>';
        }

        if (d.repairs && d.repairs.length > 0) {
          html += '<div class="mp-qsearch-group"><div class="mp-qsearch-group-label">APPLE FIX REPAIR SERVICES (' + d.repairs.length + ')</div>';
          d.repairs.forEach(function (rp) {
            html +=
              '<a href="' + escSafe(rp.url) + '" class="mp-qsearch-item">' +
                '<div class="mp-qsearch-repair-icon">🔧</div>' +
                '<div class="mp-qsearch-meta">' +
                  '<strong>' + escSafe(rp.title) + '</strong>' +
                  '<span>Turnaround: ' + escSafe(rp.turnaround) + '</span>' +
                '</div>' +
                '<div class="mp-qsearch-price">' + escSafe(rp.rate) + '</div>' +
              '</a>';
          });
          html += '</div>';
        }

        if (!html) {
          html =
            '<div class="mp-qsearch-empty-hint">' +
              '<p>No exact matches for "<strong>' + escSafe(q) + '</strong>". Inquire directly on WhatsApp for custom stock or repair quotes.</p>' +
            '</div>';
        }

        qsResults.innerHTML = html;
      })
      .catch(function () {
        qsResults.innerHTML = '<div class="mp-qsearch-loading">Unable to reach search service right now.</div>';
      });
  }

  if (qsInput) {
    qsInput.addEventListener("input", function () {
      var val = this.value;
      if (qsTimer) clearTimeout(qsTimer);
      qsTimer = setTimeout(function () {
        runLiveSearch(val);
      }, 220);
    });
  }

  document.addEventListener("click", function (e) {
    var qTag = e.target.closest(".mp-qsearch-tag");
    if (qTag && qsInput) {
      var qVal = qTag.getAttribute("data-query") || "";
      qsInput.value = qVal;
      runLiveSearch(qVal);
    }
  });

  // -------------------------------------------------------------
  // 13. PROMO BAR DISMISS, CUSTOMER REVIEW MODAL & EN/NEPALI TOGGLE
  // -------------------------------------------------------------
  var promoBar = document.getElementById("mpPromoTopbar");
  var promoDismiss = document.getElementById("mpPromoDismissBtn");
  if (promoBar && promoDismiss) {
    try {
      if (sessionStorage.getItem("mp_promo_dismissed") === "1") {
        promoBar.style.display = "none";
      }
    } catch (e) {}
    promoDismiss.addEventListener("click", function () {
      promoBar.style.display = "none";
      try { sessionStorage.setItem("mp_promo_dismissed", "1"); } catch (e) {}
    });
  }

  // Verified Customer Review Modal
  var revModal = document.getElementById("mpReviewModal");
  var revForm = document.getElementById("mpReviewSubmitForm");
  var starPicker = document.getElementById("mpStarPicker");
  var revRatingInput = document.getElementById("mpRevRating");
  var starLabel = document.getElementById("mpStarRatingLabel");

  function openReviewModal() {
    if (!revModal) return;
    revModal.classList.add("open");
    revModal.setAttribute("aria-hidden", "false");
  }

  function closeReviewModal() {
    if (!revModal) return;
    revModal.classList.remove("open");
    revModal.setAttribute("aria-hidden", "true");
  }

  if (revModal) {
    revModal.addEventListener("click", function (e) {
      if (e.target === revModal) closeReviewModal();
    });
  }

  if (starPicker) {
    var starBtns = starPicker.querySelectorAll(".mp-star-btn");
    starBtns.forEach(function (btn) {
      btn.addEventListener("click", function () {
        var val = parseInt(this.getAttribute("data-val"), 10) || 5;
        if (revRatingInput) revRatingInput.value = val;
        if (starLabel) starLabel.textContent = val + " / 5 Stars";
        starBtns.forEach(function (b) {
          var bVal = parseInt(b.getAttribute("data-val"), 10) || 0;
          b.classList.toggle("active", bVal <= val);
        });
      });
    });
  }

  if (revForm) {
    revForm.addEventListener("submit", function (e) {
      e.preventDefault();
      var submitBtn = document.getElementById("mpRevSubmitBtn");
      var msgBox = document.getElementById("mpRevMsgBox");
      var name = (document.getElementById("mpRevName") || {}).value || "";
      var loc = (document.getElementById("mpRevLocation") || {}).value || "Gulariya, Bardiya";
      var prod = (document.getElementById("mpRevProduct") || {}).value || "";
      var content = (document.getElementById("mpRevContent") || {}).value || "";
      var rating = (revRatingInput && revRatingInput.value) ? revRatingInput.value : "5";

      if (!name.trim() || !content.trim()) return;
      if (submitBtn) submitBtn.disabled = true;

      var fd = new FormData();
      fd.append("action", "mp_submit_customer_review");
      fd.append("nonce", (window.mpAjax && window.mpAjax.nonce) ? window.mpAjax.nonce : "");
      fd.append("name", name.trim());
      fd.append("location", loc.trim());
      fd.append("product", prod.trim());
      fd.append("content", content.trim());
      fd.append("rating", rating);

      var ajaxEndpoint = (window.mpAjax && window.mpAjax.ajaxurl)
        ? window.mpAjax.ajaxurl
        : "/wp-admin/admin-ajax.php";

      fetch(ajaxEndpoint, { method: "POST", body: fd })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          if (submitBtn) submitBtn.disabled = false;
          if (msgBox) {
            msgBox.style.display = "block";
            if (res && res.success) {
              msgBox.style.background = "#ecfdf5";
              msgBox.style.color = "#065f46";
              msgBox.style.border = "1px solid #a7f3d0";
              msgBox.textContent = (res.data && res.data.message) ? res.data.message : "Thank you! Your review was submitted.";
              revForm.reset();
              setTimeout(function () {
                closeReviewModal();
                msgBox.style.display = "none";
              }, 2400);
            } else {
              msgBox.style.background = "#fef2f2";
              msgBox.style.color = "#991b1b";
              msgBox.style.border = "1px solid #fecaca";
              msgBox.textContent = (res && res.data && res.data.message) ? res.data.message : "Submission failed.";
            }
          }
        })
        .catch(function () {
          if (submitBtn) submitBtn.disabled = false;
        });
    });
  }

  // Instant EN | नेपाली (Nepali) UI Switcher
  var langToggle = document.getElementById("mpLangToggle");
  var currentLang = "en";
  try {
    currentLang = localStorage.getItem("mp_site_lang") || "en";
  } catch (e) {}

  var npPhraseMap = {
    "Home": "गृहपृष्ठ",
    "Services": "मर्मत सेवा",
    "Shop": "मोबाइल पसल",
    "Shop Handsets": "मोबाइल किन्नुहोस्",
    "About": "हाम्रो बारेमा",
    "Contact": "सम्पर्क",
    "WhatsApp Rate": "व्हाट्सएप दर",
    "Inquire Rate": "दर सोध्नुहोस्",
    "Specs ›": "विवरण ›",
    "+ Compare": "+ तुलना",
    "✓ Added": "✓ छानियो",
    "Direct WhatsApp Order": "व्हाट्सएप अर्डर",
    "Inquire Rate on WhatsApp": "व्हाट्सएपमा दर सोध्नुहोस्",
    "Write a Review": "समीक्षा लेख्नुहोस्",
    "Track Repair": "मर्मत स्थिति",
    "Reset Filters": "फिल्टर रिसेट",
    "VAT Included": "भ्याट सहित"
  };

  function applySiteLanguage(lang) {
    currentLang = (lang === "np") ? "np" : "en";
    try { localStorage.setItem("mp_site_lang", currentLang); } catch (e) {}

    if (langToggle) {
      var enOpt = langToggle.querySelector(".lang-en");
      var npOpt = langToggle.querySelector(".lang-np");
      if (enOpt) enOpt.classList.toggle("active", currentLang === "en");
      if (npOpt) npOpt.classList.toggle("active", currentLang === "np");
    }

    // 1. Elements with explicit data-i18n-np attribute
    document.querySelectorAll("[data-i18n-np]").forEach(function (el) {
      if (!el.hasAttribute("data-i18n-en")) {
        el.setAttribute("data-i18n-en", el.textContent);
      }
      el.textContent = (currentLang === "np") ? el.getAttribute("data-i18n-np") : el.getAttribute("data-i18n-en");
    });

    // 2. Navigation & Action Button Labels
    var selectors = ".nav a, .card-wa-btn span, .card-specs-btn span, .card-compare-btn span, .btn-flagship-wa span:first-of-type, .vat-tag";
    document.querySelectorAll(selectors).forEach(function (el) {
      if (el.children.length > 0) return; // only leaf text nodes
      var orig = el.getAttribute("data-orig-en");
      if (!orig) {
        orig = el.textContent.trim();
        if (npPhraseMap[orig]) {
          el.setAttribute("data-orig-en", orig);
        }
      }
      if (orig && npPhraseMap[orig]) {
        el.textContent = (currentLang === "np") ? npPhraseMap[orig] : orig;
      }
    });
  }

  if (langToggle) {
    langToggle.addEventListener("click", function () {
      var nextLang = (currentLang === "en") ? "np" : "en";
      applySiteLanguage(nextLang);
      triggerToast(nextLang === "np" ? "नेपाली भाषा सक्रिय गरियो" : "Switched to English");
    });
  }

  // -------------------------------------------------------------
  // 14. EXPOSE GLOBAL HANDLERS ON WINDOW
  // -------------------------------------------------------------
  window.setFinish = setFinish;
  window.openQuoteModal = openQuoteModal;
  window.closeQuoteModal = closeQuoteModal;
  window.openReviewModal = openReviewModal;
  window.closeReviewModal = closeReviewModal;
  window.handleQuoteSubmit = handleQuoteSubmit;
  window.triggerToast = triggerToast;
  window.filterCatalogByBrand = filterCatalogByBrand;
  window.resetCatalogFilters = resetCatalogFilters;
  window.filterCatalog = filterCatalog;
  window.sortCatalog = sortCatalog;
  window.openQuickSearch = openQuickSearch;

  // Initialize
  if (productsGrid && !isShopPage) {
    filterCatalog();
  }
  renderCompareBarAndModal();
  if (currentLang === "np") {
    applySiteLanguage("np");
  }
  startAutoPlay();
  initAllCarousels();

})();
