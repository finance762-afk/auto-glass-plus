<?php
/**
 * header.php — Site header with navigation
 * Requires: $currentPage to be set for active state
 */
?>
<!-- Skip to main content (accessibility) -->
<a href="#main-content" class="skip-link">Skip to main content</a>

<!-- Site Header -->
<header class="site-header" data-header>
  <div class="container">
    <div class="header-inner">

      <!-- Logo -->
      <a href="/" class="site-logo" aria-label="<?php echo escAttr($siteName); ?> home">
        <img src="/assets/images/logo.png" alt="<?php echo escAttr($siteName); ?> logo" width="96" height="64">
      </a>

      <!-- Desktop Navigation -->
      <nav class="nav-links" aria-label="Main navigation">
        <a href="/" <?php if (isActivePage('home')) echo 'aria-current="page"'; ?>>Home</a>

        <div class="nav-dropdown">
          <a href="/services/" <?php if (isActivePage('services')) echo 'aria-current="page"'; ?>>Services</a>
          <div class="nav-dropdown-menu" style="display:none;">
            <?php foreach ($services as $service): ?>
            <a href="/services/<?php echo escAttr($service['slug']); ?>/"><?php echo escHtml($service['name']); ?></a>
            <?php endforeach; ?>
          </div>
        </div>

        <a href="/service-area/" <?php if (isActivePage('service-area')) echo 'aria-current="page"'; ?>>Service Area</a>
        <a href="/about/" <?php if (isActivePage('about')) echo 'aria-current="page"'; ?>>About</a>
        <a href="/contact/" <?php if (isActivePage('contact')) echo 'aria-current="page"'; ?>>Contact</a>
      </nav>

      <!-- Desktop CTA -->
      <div class="header-cta">
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary">
          <?php echo icon('phone', 18); ?>
          <?php echo escHtml($phone); ?>
        </a>
      </div>

      <!-- Mobile Hamburger -->
      <button class="hamburger" aria-label="Toggle navigation" aria-expanded="false" data-nav-toggle>
        <span></span>
        <span></span>
        <span></span>
      </button>

    </div>
  </div>
</header>

<!-- Mobile Full-Screen Menu -->
<div class="mobile-nav-menu" data-mobile-nav>
  <div class="mobile-nav-inner">
    <a href="/" class="mobile-nav-link" <?php if (isActivePage('home')) echo 'aria-current="page"'; ?>>Home</a>

    <div class="mobile-nav-section">
      <a href="/services/" class="mobile-nav-link" <?php if (isActivePage('services')) echo 'aria-current="page"'; ?>>Services</a>
      <div class="mobile-nav-submenu">
        <?php foreach ($services as $service): ?>
        <a href="/services/<?php echo escAttr($service['slug']); ?>/" class="mobile-nav-sublink"><?php echo escHtml($service['name']); ?></a>
        <?php endforeach; ?>
      </div>
    </div>

    <a href="/service-area/" class="mobile-nav-link" <?php if (isActivePage('service-area')) echo 'aria-current="page"'; ?>>Service Area</a>
    <a href="/about/" class="mobile-nav-link" <?php if (isActivePage('about')) echo 'aria-current="page"'; ?>>About</a>
    <a href="/contact/" class="mobile-nav-link" <?php if (isActivePage('contact')) echo 'aria-current="page"'; ?>>Contact</a>

    <div class="mobile-nav-cta">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg">
        <?php echo icon('phone', 20); ?>
        Call <?php echo escHtml($phone); ?>
      </a>
    </div>
  </div>
</div>

<!-- Main Content Area -->
<main id="main-content">
