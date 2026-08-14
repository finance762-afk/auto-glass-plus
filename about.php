<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — About
 * ------------------------------------------------------------------ */
$currentPage = 'about';
$cssVersion  = '2';

$pageTitle       = 'About Auto Glass Plus | Mobile Auto Glass Service in Ocala, FL Since 1985';
$pageDescription = 'Auto Glass Plus has served Ocala with professional mobile auto glass repair and replacement since 1985. Family-owned, licensed, and insured with lifetime workmanship warranties.';
$canonicalUrl    = $siteUrl . '/about/';
$ogImage          = $siteUrl . '/assets/images/shop-bay-professional-install.jpg';

$heroImagePreload = '/assets/images/shop-bay-professional-install.jpg';

/* BreadcrumbList Schema */
$schemaGraph = [
  "@context" => "https://schema.org",
  "@graph" => [
    ["@type" => "WebPage", "@id" => $canonicalUrl . "#webpage", "url" => $canonicalUrl, "name" => $pageTitle, "description" => $pageDescription],
    ["@type" => "BreadcrumbList", "itemListElement" => [
      ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => $siteUrl . '/'],
      ["@type" => "ListItem", "position" => 2, "name" => "About", "item" => $canonicalUrl],
    ]],
  ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================
   About Page — page-specific design system
   ============================================================ */
:root {
  --space-xs: var(--space-2);
  --space-sm: var(--space-3);
  --space-md: var(--space-6);
  --space-lg: var(--space-8);
  --space-xl: var(--space-12);
  --space-2xl: var(--space-16);
  --color-text: var(--color-gray-dark);
  --color-accent-rgb: 245, 166, 35;
}

.about-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  padding-top: calc(var(--nav-height, 80px) + var(--space-2xl));
  padding-bottom: var(--space-2xl);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  color: white;
  overflow: hidden;
}
.about-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url('/assets/images/shop-bay-professional-install.jpg');
  background-size: cover;
  background-position: center;
  opacity: 0.15;
  z-index: 0;
}
.about-hero__content {
  position: relative;
  z-index: 1;
  max-width: var(--max-width, 1200px);
  margin: 0 auto;
  padding: 0 var(--space-lg);
}
.about-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.5rem, 5vw, 3.5rem);
  line-height: 1.1;
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.about-hero__accent {
  font-family: var(--font-accent);
  font-size: clamp(1.3rem, 2.5vw, 1.8rem);
  color: var(--color-accent);
  display: block;
  margin-bottom: var(--space-sm);
}
.about-hero__lead {
  font-size: 1.25rem;
  line-height: 1.6;
  max-width: 60ch;
  margin-bottom: var(--space-md);
  opacity: 0.95;
}
.about-hero__stats {
  display: flex;
  gap: var(--space-xl);
  flex-wrap: wrap;
  margin-top: var(--space-lg);
}
.stat-block {
  text-align: left;
}
.stat-number {
  font-family: var(--font-heading);
  font-size: 3rem;
  font-weight: 700;
  color: var(--color-accent);
  display: block;
  line-height: 1;
}
.stat-label {
  font-size: 0.95rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  opacity: 0.9;
  margin-top: 0.5rem;
}

.story-section {
  padding: var(--space-2xl) var(--space-lg);
  background: var(--color-light);
}
.story-grid {
  max-width: var(--max-width, 1200px);
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-xl);
  align-items: center;
}
@media (max-width: 768px) {
  .story-grid {
    grid-template-columns: 1fr;
    gap: var(--space-lg);
  }
}
.story-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(2rem, 4vw, 2.75rem);
  color: var(--color-primary);
  margin-bottom: var(--space-md);
  line-height: 1.2;
  text-wrap: balance;
}
.story-content p {
  font-size: 1.05rem;
  line-height: 1.7;
  color: var(--color-text);
  margin-bottom: var(--space-md);
}
.story-image {
  position: relative;
  border-radius: var(--radius, 8px);
  overflow: hidden;
  box-shadow: var(--shadow-lg, 0 10px 40px rgba(0,0,0,0.15));
}
.story-image img {
  width: 100%;
  height: auto;
  display: block;
}

.values-section {
  padding: var(--space-2xl) var(--space-lg);
  background: white;
}
.values-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(2rem, 4vw, 2.75rem);
  color: var(--color-primary);
  text-align: center;
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.values-section .section-subtitle {
  font-family: var(--font-accent);
  font-size: 1.5rem;
  color: var(--color-accent);
  text-align: center;
  display: block;
  margin-bottom: var(--space-xl);
}
.values-grid {
  max-width: var(--max-width, 1200px);
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--space-lg);
}
.value-card {
  background: var(--color-light);
  padding: var(--space-lg);
  border-radius: var(--radius, 8px);
  border-left: 4px solid var(--color-accent);
  transition: transform var(--transition), box-shadow var(--transition);
}
.value-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg, 0 10px 40px rgba(0,0,0,0.1));
}
.value-card svg {
  color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.value-card h3 {
  font-family: var(--font-heading);
  font-size: 1.4rem;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
}
.value-card p {
  line-height: 1.6;
  color: var(--color-text);
}

.cta-section {
  padding: var(--space-2xl) var(--space-lg);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  color: white;
  text-align: center;
}
.cta-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(2rem, 4vw, 2.75rem);
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.cta-section p {
  font-size: 1.15rem;
  margin-bottom: var(--space-lg);
  max-width: 60ch;
  margin-left: auto;
  margin-right: auto;
  opacity: 0.95;
}
.cta-buttons {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}
.btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 1rem 2rem;
  border-radius: var(--radius, 8px);
  font-family: var(--font-body);
  font-weight: 700;
  font-size: 1rem;
  text-decoration: none;
  transition: all var(--transition);
  cursor: pointer;
  border: none;
}
.btn-light {
  background: white;
  color: var(--color-primary);
}
.btn-light:hover {
  background: var(--color-light);
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}
.btn-outline {
  background: transparent;
  color: white;
  border: 2px solid white;
}
.btn-outline:hover {
  background: white;
  color: var(--color-primary);
  transform: translateY(-2px);
}
</style>

<?php echo $schemaMarkup; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- About Hero -->
<section class="about-hero">
  <div class="about-hero__content">
    <span class="about-hero__accent">Since 1985</span>
    <h1>Ocala's Trusted Mobile Auto Glass Experts</h1>
    <p class="about-hero__lead">
      Auto Glass Plus is a family-owned business serving central Florida for nearly four decades. We bring professional windshield repair and replacement directly to you — no waiting in shop lobbies, no tow trucks, just same-day mobile service done right the first time.
    </p>
    <div class="about-hero__stats">
      <div class="stat-block">
        <span class="stat-number"><?php echo $yearsInBusiness; ?>+</span>
        <span class="stat-label">Years Serving Ocala</span>
      </div>
      <div class="stat-block">
        <span class="stat-number">100%</span>
        <span class="stat-label">Mobile Service</span>
      </div>
      <div class="stat-block">
        <span class="stat-number">Lifetime</span>
        <span class="stat-label">Workmanship Warranty</span>
      </div>
    </div>
  </div>
</section>

<!-- Our Story -->
<section class="story-section">
  <div class="story-grid">
    <div class="story-content">
      <h2>Built on Quality Work and Honest Service</h2>
      <p>
        Auto Glass Plus was founded in 1985 by Frank Catalanotto with a simple philosophy: treat every customer's vehicle like it's your own. What started as a one-truck operation in Ocala has grown into one of Marion County's most trusted names in mobile auto glass service.
      </p>
      <p>
        We've installed tens of thousands of windshields across central Florida, and our reputation is built on doing the job right — using OEM-quality glass, proper adhesive cure times, and precision installation that meets or exceeds federal safety standards.
      </p>
      <p>
        When you call Auto Glass Plus, you're working with technicians who've been doing this for years, not hourly workers who learned last week. We know the difference between a windshield that passes inspection and one that keeps you safe on I-75.
      </p>
    </div>
    <div class="story-image">
      <img
        src="/assets/images/shop-bay-professional-install.jpg"
        srcset="/assets/images/shop-bay-professional-install-480.webp 480w,
                /assets/images/shop-bay-professional-install-960.webp 960w"
        sizes="(max-width: 768px) 100vw, 50vw"
        alt="Professional auto glass installation bay at Auto Glass Plus in Ocala, FL"
        width="600"
        height="400"
        loading="lazy">
    </div>
  </div>
</section>

<!-- Our Values -->
<section class="values-section">
  <h2>What We Stand For</h2>
  <span class="section-subtitle">principles that drive every job</span>

  <div class="values-grid">

    <div class="value-card">
      <?php echo icon('shield-check', 48); ?>
      <h3>Safety First</h3>
      <p>Your windshield is a structural component of your vehicle. We don't cut corners on adhesive cure times or installation procedures — your family's safety depends on it.</p>
    </div>

    <div class="value-card">
      <?php echo icon('truck', 48); ?>
      <h3>True Mobile Service</h3>
      <p>We come to you — home, office, jobsite, wherever your vehicle is parked. No tow trucks, no rental cars, no wasted time sitting in a waiting room.</p>
    </div>

    <div class="value-card">
      <?php echo icon('clock', 48); ?>
      <h3>Same-Day Availability</h3>
      <p>Most jobs are scheduled and completed the same day you call. We keep inventory stocked for the most common makes and models across Ocala.</p>
    </div>

    <div class="value-card">
      <?php echo icon('award', 48); ?>
      <h3>Licensed & Insured</h3>
      <p>Fully licensed Florida contractor with general liability and workers' compensation coverage. You're protected, and so are we.</p>
    </div>

    <div class="value-card">
      <?php echo icon('dollar-sign', 48); ?>
      <h3>Insurance Billing</h3>
      <p>We handle direct billing with most major insurers. Comprehensive coverage typically covers glass damage with little or no deductible — we'll verify your coverage before we start.</p>
    </div>

    <div class="value-card">
      <?php echo icon('check-circle', 48); ?>
      <h3>Lifetime Warranty</h3>
      <p>Every installation is backed by our lifetime workmanship warranty plus the manufacturer's warranty on the glass. If there's ever an issue with our work, we make it right.</p>
    </div>

  </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
  <h2>Ready to Get Your Auto Glass Fixed?</h2>
  <p>Call us now for same-day mobile service across Ocala and Marion County. Free estimates, insurance billing handled, and lifetime workmanship warranty on every job.</p>
  <div class="cta-buttons">
    <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-light">
      <?php echo icon('phone', 20); ?>
      Call <?php echo escHtml($phone); ?>
    </a>
    <a href="/contact/" class="btn btn-outline">
      Request Free Estimate
    </a>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
