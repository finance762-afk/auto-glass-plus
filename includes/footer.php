<?php
/**
 * footer.php — Site footer with entity block, legal links, and navigation
 */
?>
</main>

<!-- Site Footer -->
<footer class="site-footer">
  <div class="container">

    <!-- Footer Grid -->
    <div class="footer-grid">

      <!-- Column 1: About & Trust Badges -->
      <div class="footer-col">
        <img src="/assets/images/logo.png" alt="<?php echo escAttr($siteName); ?>" class="footer-logo" width="150" height="38" style="margin-bottom: 1rem;">
        <p><?php echo escHtml($tagline); ?></p>
        <p>Professional auto glass repair and replacement services in <?php echo escHtml($address['city']); ?>, <?php echo escHtml($address['state']); ?>.</p>

        <!-- Trust Badges -->
        <div class="footer-trust">
          <span class="trust-badge">
            <?php echo icon('shield-check', 16); ?>
            Licensed & Insured
          </span>
          <span class="trust-badge">
            <?php echo icon('star', 16); ?>
            5-Star Rated
          </span>
          <span class="trust-badge">
            <?php echo icon('check-circle', 16); ?>
            Free Estimates
          </span>
        </div>

        <!-- AEO Entity Block -->
        <div class="aeo-entity" itemscope itemtype="https://schema.org/AutoRepair">
          <meta itemprop="name" content="<?php echo escAttr($siteName); ?>">
          <meta itemprop="url" content="<?php echo escAttr($siteUrl); ?>">
          <meta itemprop="telephone" content="+<?php echo $phoneRaw; ?>">
          <p><strong><?php echo escHtml($siteName); ?></strong> is a licensed auto glass repair specialist based in <?php echo escHtml($address['city']); ?>, <?php echo escHtml($address['state']); ?>, serving the greater <?php echo escHtml($address['city']); ?> area. We provide windshield repair, windshield replacement, side window replacement, and rear window replacement with same-day mobile service.</p>
        </div>
      </div>

      <!-- Column 2: Services -->
      <div class="footer-col">
        <h4>Our Services</h4>
        <ul>
          <?php
          $halfServices = ceil(count($services) / 2);
          for ($i = 0; $i < $halfServices; $i++):
            $service = $services[$i];
          ?>
          <li><a href="/services/<?php echo escAttr($service['slug']); ?>/"><?php echo escHtml($service['name']); ?></a></li>
          <?php endfor; ?>
        </ul>
      </div>

      <!-- Column 3: More Services -->
      <div class="footer-col">
        <h4>More Services</h4>
        <ul>
          <?php
          for ($i = $halfServices; $i < count($services); $i++):
            $service = $services[$i];
          ?>
          <li><a href="/services/<?php echo escAttr($service['slug']); ?>/"><?php echo escHtml($service['name']); ?></a></li>
          <?php endfor; ?>
          <li><a href="/services/">View All Services</a></li>
        </ul>
      </div>

      <!-- Column 4: Contact Info -->
      <div class="footer-col">
        <h4>Get In Touch</h4>

        <div class="contact-item">
          <?php echo icon('phone', 18); ?>
          <a href="tel:+<?php echo $phoneRaw; ?>"><?php echo escHtml($phone); ?></a>
        </div>

        <div class="contact-item">
          <?php echo icon('mail', 18); ?>
          <a href="mailto:<?php echo escAttr($email); ?>"><?php echo escHtml($email); ?></a>
        </div>

        <div class="contact-item">
          <?php echo icon('map-pin', 18); ?>
          <span><?php echo escHtml($address['street']); ?><br><?php echo escHtml($address['city']); ?>, <?php echo escHtml($address['state']); ?> <?php echo escHtml($address['zip']); ?></span>
        </div>

        <div class="contact-item">
          <?php echo icon('clock', 18); ?>
          <span><?php echo escHtml($businessHours); ?></span>
        </div>

        <a href="/contact/" class="btn btn-accent" style="margin-top: 1rem;">
          Request Free Estimate
        </a>
      </div>

    </div>

    <!-- Footer Legal Row -->
    <nav class="footer-legal-links" aria-label="Legal">
      <a href="/privacy-policy/">Privacy Policy</a>
      <span class="footer-legal-divider">|</span>
      <a href="/terms/">Terms of Service</a>
      <span class="footer-legal-divider">|</span>
      <a href="/cookie-policy/">Cookie Policy</a>
      <span class="footer-legal-divider">|</span>
      <a href="/accessibility/">Accessibility</a>
      <span class="footer-legal-divider">|</span>
      <a href="/sitemap.xml">Sitemap</a>
    </nav>

    <!-- Footer Bottom Bar -->
    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> <?php echo escHtml($siteName); ?>. All rights reserved.</p>
      <p class="footer-credit">
        <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">Web Design &amp; Hosting by Page One Insights, LLC</a>
      </p>
    </div>

  </div>
</footer>

<!-- Back to Top Button -->
<button class="back-to-top" aria-label="Back to top" data-back-to-top>
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <polyline points="18 15 12 9 6 15"></polyline>
  </svg>
</button>

<!-- Mobile Floating CTA Bar -->
<div class="mobile-cta-bar">
  <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary">
    <?php echo icon('phone', 18); ?>
    Call Now
  </a>
  <a href="/contact/" class="btn btn-accent">
    Get Free Estimate
  </a>
</div>

<!-- Cookie Banner (v6.1 MANDATORY) -->
<div class="cookie-banner" id="cookie-banner">
  <div class="container">
    <p>We use cookies to improve your experience on our site. By continuing to use this site, you accept our use of cookies. <a href="/cookie-policy/">Learn more</a>.</p>
    <button class="cookie-banner__dismiss" id="cookie-dismiss">Got it</button>
  </div>
</div>

<!-- JavaScript (NO third-party CDN scripts — v6.2 bans Lucide/Swiper/VanillaTilt CDN) -->
<script src="/assets/js/main.js" defer></script>
<script src="/assets/js/animations.js" defer></script>
<script src="/assets/js/effects.js" defer></script>

<!-- Core Scripts (inline — no CDN per v6.2) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Back to Top Button
  const backToTop = document.querySelector('[data-back-to-top]');
  if (backToTop) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 300) {
        backToTop.classList.add('visible');
      } else {
        backToTop.classList.remove('visible');
      }
    });
    backToTop.addEventListener('click', function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // Mobile Nav Toggle
  const navToggle = document.querySelector('[data-nav-toggle]');
  const mobileNav = document.querySelector('[data-mobile-nav]');
  if (navToggle && mobileNav) {
    navToggle.addEventListener('click', function() {
      const expanded = navToggle.getAttribute('aria-expanded') === 'true';
      navToggle.setAttribute('aria-expanded', !expanded);
      navToggle.classList.toggle('active');
      mobileNav.classList.toggle('active');
      document.body.style.overflow = expanded ? '' : 'hidden';
    });

    // Close on link click
    mobileNav.querySelectorAll('a').forEach(function(link) {
      link.addEventListener('click', function() {
        navToggle.setAttribute('aria-expanded', 'false');
        navToggle.classList.remove('active');
        mobileNav.classList.remove('active');
        document.body.style.overflow = '';
      });
    });
  }

  // Navbar Scroll Effect
  const header = document.querySelector('[data-header]');
  if (header) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 100) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  }

  // Services Dropdown (desktop only)
  if (window.matchMedia('(min-width: 769px)').matches) {
    const dropdowns = document.querySelectorAll('.nav-dropdown');
    dropdowns.forEach(function(dropdown) {
      const menu = dropdown.querySelector('.nav-dropdown-menu');
      dropdown.addEventListener('mouseenter', function() {
        if (menu) menu.style.display = 'block';
      });
      dropdown.addEventListener('mouseleave', function() {
        if (menu) menu.style.display = 'none';
      });
    });
  }

  // Cookie Banner (v6.1 MANDATORY)
  const cookieBanner = document.getElementById('cookie-banner');
  const cookieDismiss = document.getElementById('cookie-dismiss');
  if (cookieBanner && cookieDismiss) {
    // Check if cookie consent already given
    if (!localStorage.getItem('cookieConsent')) {
      cookieBanner.classList.add('visible');
    }

    cookieDismiss.addEventListener('click', function() {
      localStorage.setItem('cookieConsent', 'true');
      cookieBanner.classList.remove('visible');
    });
  }
});
</script>

</body>
</html>
