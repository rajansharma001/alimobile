<?php
/**
 * Template Name: Contact Page
 * Description: Store directions, direct helpline, Google Maps embed, and inquiry booking docket.
 *
 * @package MobilePasal
 */

get_header();

$store_address   = mp_opt( 'store_address', 'Gulariya-06, Ji. Pra. Ka. Chowk, Bardiya' );
$store_hours     = mp_opt( 'store_hours', 'Sun–Fri: 9:00 AM – 8:00 PM | Sat: Open' );
$store_phone     = mp_opt( 'store_phone', '+977 9804530786' );
$store_phone_raw = preg_replace( '/[^0-9]/', '', $store_phone );
$wa_number       = mp_opt( 'whatsapp_number', '9779804530786' );
$map_embed       = mp_opt( 'store_map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14088.751310111166!2d81.332356!3d28.239327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399859f1e16f391f%3A0xb35a0fec1d7e2507!2sGulariya%2C%20Bardiya!5e0!3m2!1sen!2snp!4v1700000000000!5m2!1sen!2snp' );
?>

<main>

  <!-- ====================================================================
       PAGE HERO BANNER (Elevated Creative Light Studio Theme)
       ==================================================================== -->
  <section class="page-hero-banner">
    <div class="wrap">
      <div class="page-hero-grid fade-up in-view">
        
        <!-- Left: Hero Text Column -->
        <div class="page-hero-content">
          <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a class="crumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
              <span>Home</span>
            </a>
            <span class="crumb-divider">/</span>
            <span class="crumb-active">Contact</span>
          </nav>

          <h1 class="page-hero-title">Visit Our Counter or <span class="text-gradient">Send a Direct Inquiry.</span></h1>
          <p class="page-hero-desc">Centrally located at Ji. Pra. Ka. Chowk in Gulariya-06. Walk in anytime from 9:00 AM to 8:00 PM for on-the-spot bench diagnostics, smartphone sales, or eSewa services. Or submit your enquiry below for instant WhatsApp dispatch.</p>

          <div class="page-hero-actions">
            <a class="btn btn-primary btn-lg" href="tel:+<?php echo esc_attr( $store_phone_raw ); ?>">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
              <span>Call Helpline: <?php echo esc_html( $store_phone ); ?></span>
            </a>
            <a class="btn btn-whatsapp btn-lg" href="https://wa.me/<?php echo esc_attr( $wa_number ); ?>?text=<?php echo rawurlencode( 'Namaste Ali Mobile, ma Gulariya counter ma aauna chahanchhu' ); ?>" target="_blank" rel="noopener">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
              <span>Chat on WhatsApp</span>
            </a>
          </div>
        </div>

        <!-- Right: Hero Spotlight Card -->
        <div class="page-hero-spotlight">
          <div class="hero-spotlight-card">
            <div class="spotlight-top-bar">
              <div class="spotlight-title-row">
                <span class="spotlight-badge">Gulariya Counter Desk</span>
              </div>
              <small style="color: var(--text-muted); font-weight: 700;">9 AM &ndash; 8 PM</small>
            </div>

            <div class="spotlight-metric-list">
              <div class="spotlight-metric-item">
                <span>
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                  Direct Hotline
                </span>
                <strong><?php echo esc_html( $store_phone ); ?></strong>
              </div>
              <div class="spotlight-metric-item">
                <span>
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                  Exact Landmark
                </span>
                <strong>Ji. Pra. Ka. Chowk</strong>
              </div>
              <div class="spotlight-metric-item">
                <span>
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  Walk-in Diagnosis
                </span>
                <strong>5-Minute Free Check</strong>
              </div>
              <div class="spotlight-metric-item">
                <span>
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                  Customer Parking
                </span>
                <strong>Easy Front Access</strong>
              </div>
            </div>

            <a class="btn btn-outline btn-sm btn-block" href="#contact-enquiry-form">
              <span>Fill Instant Inquiry Docket &darr;</span>
            </a>
          </div>
        </div>

      </div>

      <!-- Micro-Ribbon -->
      <div class="page-hero-ribbon fade-up">
        <div class="hero-ribbon-item">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          <span>Direct WhatsApp &amp; Call Line</span>
        </div>
        <div class="hero-ribbon-item">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
          <span>Quick 5-Minute WhatsApp Quotes</span>
        </div>
        <div class="hero-ribbon-item">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
          <span>Opposite District Admin Office</span>
        </div>
        <div class="hero-ribbon-item">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
          <span>Saturday Open &bull; 9 AM &ndash; 8 PM</span>
        </div>
      </div>

    </div>
  </section>

  <!-- ====================================================================
       CONTACT GRID: INTERACTIVE FORM + DIRECT INFO CARD
       ==================================================================== -->
  <section class="contact-page-section">
    <div class="wrap">
      <div class="contact-page-grid fade-up">
        
        <!-- Interactive Consultation & Repair Booking Form -->
        <div class="contact-form-card">
          <h2>Direct Consultation &amp; Repair Inquiry</h2>
          <p>Fill out your device and symptom details below. Your request will automatically compile and dispatch directly to our technician on WhatsApp.</p>
          
          <form id="contact-enquiry-form">
            <div class="form-group-grid">
              <div class="form-field">
                <label for="cf-name">Your Full Name *</label>
                <input type="text" id="cf-name" name="name" placeholder="e.g. Ramesh KC" required autocomplete="name">
              </div>
              <div class="form-field">
                <label for="cf-phone">Phone / WhatsApp Number *</label>
                <input type="tel" id="cf-phone" name="phone" placeholder="e.g. 9804530786" required autocomplete="tel">
              </div>
            </div>

            <div class="form-group-grid">
              <div class="form-field">
                <label for="cf-device">Phone Brand &amp; Exact Model *</label>
                <input type="text" id="cf-device" name="device" placeholder="e.g. iPhone 13 Pro, Galaxy A54..." required>
              </div>
              <div class="form-field">
                <label for="cf-service">Service or Query Needed *</label>
                <select id="cf-service" name="service" required>
                  <option value="Display / Screen Replacement">Display / Screen Replacement</option>
                  <option value="Battery Health &amp; Swap">Battery Health &amp; Swap</option>
                  <option value="Charging Port Fault">Charging Port Fault</option>
                  <option value="Water Ingress Ultrasonic Bath">Water Ingress Ultrasonic Bath</option>
                  <option value="Logic Board Micro-Soldering">Logic Board Micro-Soldering</option>
                  <option value="New Smartphone Purchase">New Smartphone Purchase</option>
                  <option value="Original Accessory Inquiry">Original Accessory Inquiry</option>
                  <option value="eSewa / Fonepay Merchant Service">eSewa / Fonepay Merchant Service</option>
                </select>
              </div>
            </div>

            <div class="form-field">
              <label for="cf-notes">Fault Description or Specific Questions</label>
              <textarea id="cf-notes" name="notes" placeholder="Describe what happened (e.g. phone fell, screen is flickering, battery draining fast, quotes needed)..."></textarea>
            </div>

            <button type="submit" class="btn btn-whatsapp btn-block btn-lg" style="margin-top: 8px;">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.13-.56-1.34-.76-1.84-.2-.49-.4-.42-.56-.43h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.9 2.41 1.02 2.58.13.17 1.76 2.69 4.27 3.77.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29z"/></svg>
              <span class="btn-text-full">Dispatch Inquiry to WhatsApp (+<?php echo esc_html( $store_phone_raw ); ?>)</span>
              <span class="btn-text-mob">Dispatch Inquiry to WhatsApp</span>
            </button>
          </form>
        </div>

        <!-- Direct Counter Contact & Hours Card -->
        <div class="contact-info-card">
          <h2>Showroom &amp; Lab Counter</h2>
          <p style="color: var(--text-muted); font-size: 0.94rem; margin-bottom: 24px; line-height: 1.6;">
            Walk-in customer counter with on-site technician workbench. Free diagnostic checks in 5 minutes.
          </p>

          <div class="visit-details-list">
            <!-- Item 1: Address -->
            <div class="visit-detail-item">
              <div class="visit-detail-icon">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
              </div>
              <div>
                <strong>Store Location</strong>
                <p><?php echo esc_html( $store_address ); ?></p>
              </div>
            </div>

            <!-- Item 2: Hours -->
            <div class="visit-detail-item">
              <div class="visit-detail-icon">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
              </div>
              <div>
                <strong>Opening Hours</strong>
                <p><?php echo nl2br( esc_html( $store_hours ) ); ?></p>
              </div>
            </div>

            <!-- Item 3: Direct Phone -->
            <div class="visit-detail-item">
              <div class="visit-detail-icon">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
              </div>
              <div>
                <strong>Phone / Hotline</strong>
                <p><a href="tel:+<?php echo esc_attr( $store_phone_raw ); ?>" style="color: var(--primary); font-weight: 800;"><?php echo esc_html( $store_phone ); ?></a></p>
              </div>
            </div>

            <!-- Item 4: WhatsApp -->
            <div class="visit-detail-item">
              <div class="visit-detail-icon">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2"/></svg>
              </div>
              <div>
                <strong>WhatsApp Helpline</strong>
                <p><a href="https://wa.me/<?php echo esc_attr( $wa_number ); ?>" target="_blank" rel="noopener" style="color: var(--primary); font-weight: 800;">+<?php echo esc_html( $store_phone_raw ); ?> (Active Daily)</a></p>
              </div>
            </div>
          </div>

          <div style="margin-top: 24px; display: flex; flex-direction: column; gap: 10px;">
            <a class="btn btn-primary btn-block" href="https://www.google.com/maps/search/?api=1&query=Ali+Mobile+Center+Gulariya+Bardiya" target="_blank" rel="noopener">
              <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
              <span>Open in Google Maps</span>
            </a>
            <a class="btn btn-secondary btn-block" href="tel:+<?php echo esc_attr( $store_phone_raw ); ?>">
              <span>Call Technician Directly</span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ====================================================================
       LIVE GOOGLE MAPS EMBED
       ==================================================================== -->
  <section class="map-embed-section">
    <div class="wrap">
      <div class="sec-head sec-head-center fade-up">
        <span class="sec-kicker">Navigation &amp; Map</span>
        <h2>Locate Us at Ji. Pra. Ka. Chowk</h2>
        <p>Easily accessible from all major junctions in Gulariya and surrounding Bardiya municipal areas.</p>
      </div>

      <div class="map-card fade-up">
        <iframe 
          src="<?php echo esc_url( $map_embed ); ?>" 
          width="100%" 
          height="100%" 
          style="border:0; display:block;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade"
          title="Ali Mobile Center Google Maps Location">
        </iframe>
      </div>
    </div>
  </section>

  <!-- ====================================================================
       LANDMARK & PARKING GUIDANCE
       ==================================================================== -->
  <section class="landmarks-section">
    <div class="wrap">
      <div class="sec-head sec-head-center fade-up" style="margin-bottom: 32px;">
        <span class="sec-kicker">Arrival &amp; Transit</span>
        <h2>Finding Our Store Counter</h2>
        <p>Key landmarks and convenient parking tips for your visit to Ji. Pra. Ka. Chowk.</p>
      </div>
      <div class="steps-flow-grid landmarks-flow-grid fade-up">
        <div class="flow-step-card">
          <div class="flow-step-num">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
          </div>
          <h3>Prominent Landmark</h3>
          <p>Situated directly at Ji. Pra. Ka. Chowk (District Administration Office junction), opposite the main arterial road in Gulariya Bazar.</p>
        </div>

        <div class="flow-step-card">
          <div class="flow-step-num">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
          </div>
          <h3>Easy Front Parking</h3>
          <p>Ample dedicated front space for motorcycle and scooter parking, as well as easy pull-up access for cars while dropping off devices.</p>
        </div>

        <div class="flow-step-card">
          <div class="flow-step-num">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
          </div>
          <h3>2 Mins from Bus Stand</h3>
          <p>Only a 2-minute walk from Gulariya Main Bus Stand &amp; Birendra Chowk. Direct local autos available from Badhaiyatal, Madhuwan, and Rajapur.</p>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
