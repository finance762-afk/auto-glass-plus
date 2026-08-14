<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// Set 404 HTTP response code
http_response_code(404);
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — 404 Error Page
 * ------------------------------------------------------------------ */
$currentPage = '404';
$cssVersion  = '2';

$pageTitle       = 'Page Not Found | Auto Glass Plus';
$pageDescription = 'The page you\'re looking for doesn\'t exist. Browse our auto glass services in Ocala or contact us for help.';
$canonicalUrl    = $siteUrl . '/404/';
$ogType          = 'website';
$ogImage         = $siteUrl . '/assets/images/logo.png';
$noindex         = true; // Don't index 404 pages

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================
   404 Error Page
   ============================================================ */
.hero--404 {
  min-height: 80vh;
  background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-primary) 100%);
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}
.hero--404 .container {
  position: relative;
  z-index: 2;
  max-width: 42rem;
}
.error-code {
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: clamp(6rem, 18vw, 12rem);
  line-height: 1;
  color: rgba(255, 255, 255, 0.15);
  margin-bottom: var(--space-4);
}
.hero--404 h1 {
  color: var(--color-white);
  font-size: var(--fs-h1);
  margin-bottom: var(--space-4);
}
.hero--404 p {
  color: rgba(255, 255, 255, 0.88);
  font-size: var(--font-size-lg);
  line-height: 1.6;
  margin-bottom: var(--space-8);
}
.error-actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-4);
  justify-content: center;
  margin-bottom: var(--space-10);
}
.popular-links {
  background: var(--color-light);
  padding: var(--space-12) 0;
}
.popular-links h2 {
  text-align: center;
  margin-bottom: var(--space-8);
}
.links-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: var(--space-6);
  max-width: var(--bp-wide, 1200px);
  margin: 0 auto;
}
.link-card {
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-8);
  text-align: center;
  box-shadow: var(--shadow-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.link-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}
.link-card-icon {
  width: 56px;
  height: 56px;
  border-radius: var(--radius-full);
  background: rgba(var(--color-primary-rgb), 0.10);
  color: var(--color-primary);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-4);
}
.link-card h3 {
  font-size: var(--font-size-xl);
  margin-bottom: var(--space-2);
  color: var(--color-primary);
}
.link-card p {
  color: var(--color-gray);
  font-size: var(--font-size-sm);
  margin-bottom: var(--space-4);
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================ 404 HERO ============================ -->
<section class="hero hero--404" aria-label="Page not found">
  <div class="container">
    <div class="error-code">404</div>
    <h1>Page Not Found</h1>
    <p>
      The page you\'re looking for doesn\'t exist or has been moved.
      Let\'s get you back on track — explore our services below or call us at
      <a href="tel:+<?php echo $phoneRaw; ?>" style="color:var(--color-accent); text-decoration:underline;"><?php echo escHtml($phone); ?></a>.
    </p>
    <div class="error-actions">
      <a href="/" class="btn btn-accent btn-lg">Go to Homepage</a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">Contact Us</a>
    </div>
  </div>
</section>

<!-- ============================ POPULAR LINKS ============================ -->
<section class="popular-links" aria-label="Popular pages">
  <div class="container">
    <h2>Looking for Something Specific?</h2>
    <div class="links-grid">

      <a href="/services/" class="link-card">
        <div class="link-card-icon"><?php echo icon('wrench', 28); ?></div>
        <h3>Our Services</h3>
        <p>Browse our full range of auto glass repair and replacement services for Ocala drivers.</p>
      </a>

      <a href="/service-area/" class="link-card">
        <div class="link-card-icon"><?php echo icon('map-pin', 28); ?></div>
        <h3>Service Area</h3>
        <p>See if we serve your area. We bring mobile auto glass service to you across Ocala and Marion County.</p>
      </a>

      <a href="/about/" class="link-card">
        <div class="link-card-icon"><?php echo icon('users', 28); ?></div>
        <h3>About Us</h3>
        <p>Learn about Auto Glass Plus, our team, and why Ocala drivers trust us with their windshield work.</p>
      </a>

      <a href="/contact/" class="link-card">
        <div class="link-card-icon"><?php echo icon('phone', 28); ?></div>
        <h3>Get a Free Estimate</h3>
        <p>Request a free quote or call us for same-day mobile auto glass service.</p>
      </a>

    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
