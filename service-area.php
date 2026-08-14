<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Service Area Page
 * ------------------------------------------------------------------ */
$currentPage = 'service-area';
$cssVersion  = '2';

$pageTitle       = 'Service Areas | Auto Glass Plus | Mobile Service in Ocala & Surrounding Communities';
$metaDescription = 'Auto Glass Plus serves Ocala, FL and surrounding Marion County communities with same-day mobile windshield repair and replacement. We come to you within a 25-mile radius. Call (352) 816-7221.';
$canonicalUrl    = $siteUrl . '/service-area/';
$ogType          = 'website';

$heroImagePreload = '/assets/images/hero-mobile-glass-ocala.jpg';
$ogImage          = $siteUrl . '/assets/images/hero-mobile-glass-ocala.jpg';

/* Service Area FAQs */
$faqs = [
    [
        'question' => 'Which areas around Ocala do you serve?',
        'answer'   => 'Auto Glass Plus serves drivers throughout Ocala and communities within roughly a 25-mile radius, including Marion Oaks, Silver Springs Shores, Belleview, Dunnellon, and the surrounding Marion County area. If you\'re not sure if we serve your location, give us a call and we\'ll let you know.',
    ],
    [
        'question' => 'Do you charge extra for mobile service outside Ocala city limits?',
        'answer'   => 'There is no additional charge for mobile service within our standard service area. We bring the same professional service and pricing to you whether you\'re in downtown Ocala or in the surrounding communities we serve.',
    ],
    [
        'question' => 'How quickly can you respond to a service call in my area?',
        'answer'   => 'Most customers in Ocala and the immediate surrounding area can schedule same-day service. Response times may vary slightly based on your specific location and our current schedule, but we always work to accommodate your timeline and get you back on the road quickly.',
    ],
];

/* BreadcrumbList Schema */
$breadcrumbSchema = [
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => "Home",
            "item" => $siteUrl . "/"
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "name" => "Service Area",
            "item" => $siteUrl . "/service-area/"
        ]
    ]
];

/* Include head and header */
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
<?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>

<style>
/* Service Area Page Styles */
.hero--service-area {
  position: relative;
  min-height: 50vh;
  display: flex;
  align-items: center;
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  color: white;
  overflow: hidden;
}

.hero--service-area::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url('/assets/images/hero-mobile-glass-ocala.jpg') center/cover no-repeat;
  opacity: 0.15;
  z-index: 0;
}

.hero--service-area::after {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at 30% 50%, rgba(245, 166, 35, 0.1) 0%, transparent 60%);
  z-index: 1;
}

.hero__content {
  position: relative;
  z-index: 2;
  max-width: 800px;
}

.hero__eyebrow {
  font-size: 0.95rem;
  font-weight: 600;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  color: var(--color-accent);
  margin-bottom: 1rem;
  display: inline-block;
}

.hero__title {
  font-size: clamp(2rem, 5vw, 3rem);
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 1.5rem;
  text-wrap: balance;
}

.hero__subtitle {
  font-size: clamp(1.1rem, 2.5vw, 1.3rem);
  line-height: 1.6;
  margin-bottom: 2rem;
  opacity: 0.95;
  text-wrap: balance;
}

.section--service-areas {
  padding: var(--space-4xl) 0;
  background: var(--color-bg);
}

.section__header {
  max-width: 700px;
  margin: 0 auto 3rem;
  text-align: center;
}

.section__title {
  font-size: clamp(2rem, 4vw, 2.75rem);
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 1rem;
  color: var(--color-secondary);
  text-wrap: balance;
}

.section__subtitle {
  font-size: clamp(1rem, 2vw, 1.15rem);
  color: var(--color-text-light);
  line-height: 1.6;
  text-wrap: balance;
}

.service-areas-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
  margin-bottom: 3rem;
}

.area-card {
  background: white;
  border-radius: var(--radius);
  padding: 2rem;
  box-shadow: var(--shadow);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 1px solid var(--color-border);
}

.area-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}

.area-card__icon {
  width: 48px;
  height: 48px;
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  margin-bottom: 1.5rem;
}

.area-card__title {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--color-secondary);
  margin-bottom: 0.75rem;
}

.area-card__description {
  color: var(--color-text-light);
  line-height: 1.6;
  margin-bottom: 1rem;
}

.area-card__list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.area-card__list li {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--color-text);
  margin-bottom: 0.5rem;
  font-size: 0.95rem;
}

.area-card__list li svg {
  color: var(--color-primary);
  flex-shrink: 0;
}

.map-section {
  padding: var(--space-3xl) 0;
  background: var(--color-bg-alt);
}

.map-wrapper {
  max-width: 1000px;
  margin: 0 auto;
  background: white;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
}

.map-header {
  padding: 2rem;
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  color: white;
  text-align: center;
}

.map-header h2 {
  font-size: 1.75rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.map-header p {
  font-size: 1rem;
  opacity: 0.95;
}

.map-embed {
  position: relative;
  width: 100%;
  height: 0;
  padding-bottom: 56.25%; /* 16:9 aspect ratio */
}

.map-embed iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}

.map-actions {
  padding: 2rem;
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  justify-content: center;
  background: white;
}

.section--coverage {
  padding: var(--space-4xl) 0;
  background: white;
}

.coverage-content {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
}

.coverage-content p {
  font-size: 1.1rem;
  line-height: 1.8;
  color: var(--color-text);
  margin-bottom: 1.5rem;
}

.coverage-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1rem;
  margin: 2rem 0;
}

.coverage-badge {
  background: var(--color-bg-alt);
  padding: 0.75rem 1.5rem;
  border-radius: 50px;
  font-weight: 600;
  color: var(--color-secondary);
  border: 2px solid var(--color-border);
  transition: all 0.3s ease;
}

.coverage-badge:hover {
  background: var(--color-primary);
  color: white;
  border-color: var(--color-primary);
}

.faq-section {
  padding: var(--space-4xl) 0;
  background: var(--color-bg-alt);
}

.faq-grid {
  max-width: 900px;
  margin: 0 auto;
  display: grid;
  gap: 1.5rem;
}

.faq-item {
  background: white;
  border-radius: var(--radius);
  padding: 2rem;
  box-shadow: var(--shadow);
  border-left: 4px solid var(--color-primary);
}

.faq-item h3 {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--color-secondary);
  margin-bottom: 1rem;
}

.faq-item p {
  color: var(--color-text);
  line-height: 1.7;
  margin: 0;
}

.cta-section {
  padding: var(--space-4xl) 0;
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  color: white;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.cta-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at 70% 30%, rgba(245, 166, 35, 0.15) 0%, transparent 60%);
  z-index: 0;
}

.cta-content {
  position: relative;
  z-index: 1;
  max-width: 700px;
  margin: 0 auto;
}

.cta-content h2 {
  font-size: clamp(1.75rem, 4vw, 2.5rem);
  font-weight: 700;
  margin-bottom: 1rem;
  text-wrap: balance;
}

.cta-content p {
  font-size: 1.15rem;
  margin-bottom: 2rem;
  opacity: 0.95;
  text-wrap: balance;
}

.cta-buttons {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  justify-content: center;
}

@media (max-width: 768px) {
  .hero--service-area {
    min-height: 60vh;
  }

  .service-areas-grid {
    grid-template-columns: 1fr;
  }

  .map-actions {
    flex-direction: column;
  }

  .coverage-list {
    gap: 0.75rem;
  }

  .coverage-badge {
    font-size: 0.9rem;
    padding: 0.6rem 1.2rem;
  }
}
</style>

<!-- Hero Section -->
<section class="hero--service-area">
  <div class="container">
    <div class="hero__content">
      <span class="hero__eyebrow">Where We Serve</span>
      <h1 class="hero__title">Mobile Auto Glass Service in Ocala & Surrounding Communities</h1>
      <p class="hero__subtitle">Auto Glass Plus brings same-day windshield repair and replacement to you throughout Marion County. We come to your location—no need to drive to a shop.</p>
      <div class="cta-buttons">
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg">
          <?php echo icon('phone', 20); ?>
          Call <?php echo escHtml($phone); ?>
        </a>
        <a href="/contact/" class="btn btn-secondary btn-lg">
          Get Free Estimate
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Service Areas Section -->
<section class="section--service-areas">
  <div class="container">
    <div class="section__header">
      <h2 class="section__title">Serving Ocala, FL & Marion County</h2>
      <p class="section__subtitle">Auto Glass Plus is a licensed Florida auto glass specialist based in Ocala, serving drivers throughout Marion County and the surrounding areas within a 25-mile radius.</p>
    </div>

    <div class="service-areas-grid">
      <!-- Primary Service Area: Ocala -->
      <div class="area-card">
        <div class="area-card__icon">
          <?php echo icon('map-pin', 24); ?>
        </div>
        <h3 class="area-card__title">Ocala, FL</h3>
        <p class="area-card__description">Our home base. Auto Glass Plus has served Ocala drivers since <?php echo $yearEstablished; ?>, providing mobile windshield repair and replacement throughout the city and surrounding neighborhoods.</p>
        <ul class="area-card__list">
          <li><?php echo icon('check', 18); ?> Downtown Ocala</li>
          <li><?php echo icon('check', 18); ?> West Ocala</li>
          <li><?php echo icon('check', 18); ?> Southeast Ocala</li>
          <li><?php echo icon('check', 18); ?> Northeast neighborhoods</li>
        </ul>
      </div>

      <!-- Surrounding Communities -->
      <div class="area-card">
        <div class="area-card__icon">
          <?php echo icon('navigation', 24); ?>
        </div>
        <h3 class="area-card__title">Marion County Communities</h3>
        <p class="area-card__description">We extend our mobile service throughout Marion County, bringing the same professional windshield repair and replacement to residential and commercial customers across the region.</p>
        <ul class="area-card__list">
          <li><?php echo icon('check', 18); ?> Marion Oaks</li>
          <li><?php echo icon('check', 18); ?> Silver Springs Shores</li>
          <li><?php echo icon('check', 18); ?> Belleview</li>
          <li><?php echo icon('check', 18); ?> Dunnellon</li>
        </ul>
      </div>

      <!-- Extended Service Radius -->
      <div class="area-card">
        <div class="area-card__icon">
          <?php echo icon('globe', 24); ?>
        </div>
        <h3 class="area-card__title">Extended Service Area</h3>
        <p class="area-card__description">Not sure if we serve your location? We work with customers throughout central Florida within approximately 25 miles of Ocala. Call us to confirm coverage in your area.</p>
        <ul class="area-card__list">
          <li><?php echo icon('check', 18); ?> 25-mile service radius</li>
          <li><?php echo icon('check', 18); ?> Same-day availability</li>
          <li><?php echo icon('check', 18); ?> No extra charge for mobile service</li>
          <li><?php echo icon('check', 18); ?> Serving residential & commercial</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Map Section -->
<section class="map-section">
  <div class="container">
    <div class="map-wrapper">
      <div class="map-header">
        <h2>Visit Our Ocala Location</h2>
        <p><?php echo escHtml($address['street']); ?>, <?php echo escHtml($address['city']); ?>, <?php echo escHtml($address['state']); ?> <?php echo escHtml($address['zip']); ?></p>
      </div>
      <div class="map-embed">
        <?php echo $gbpMapEmbed; ?>
      </div>
      <div class="map-actions">
        <a href="<?php echo escAttr($directionsUrl); ?>" class="btn btn-primary" target="_blank" rel="noopener">
          <?php echo icon('navigation', 18); ?>
          Get Directions
        </a>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent">
          <?php echo icon('phone', 18); ?>
          Call <?php echo escHtml($phone); ?>
        </a>
        <a href="/contact/" class="btn btn-secondary">
          Request Free Estimate
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Coverage Details Section -->
<section class="section--coverage">
  <div class="container">
    <div class="coverage-content">
      <h2 class="section__title">Communities We Proudly Serve</h2>
      <p>Auto Glass Plus is a locally owned auto glass repair specialist based in <?php echo escHtml($address['city']); ?>, <?php echo escHtml($address['state']); ?>. We bring professional mobile windshield repair, windshield replacement, and auto glass services to drivers throughout Marion County and the surrounding areas. Our mobile technicians operate within approximately a 25-mile radius of our Ocala shop, delivering the same quality workmanship and customer service whether you're downtown or in the surrounding communities.</p>

      <div class="coverage-list">
        <span class="coverage-badge">Ocala</span>
        <span class="coverage-badge">Marion Oaks</span>
        <span class="coverage-badge">Silver Springs Shores</span>
        <span class="coverage-badge">Belleview</span>
        <span class="coverage-badge">Dunnellon</span>
        <span class="coverage-badge">Marion County</span>
        <span class="coverage-badge">Central Florida</span>
      </div>

      <p>Not listed here? Give us a call at <a href="tel:+<?php echo $phoneRaw; ?>" style="color: var(--color-primary); font-weight: 600;"><?php echo escHtml($phone); ?></a> and we'll let you know if we can serve your location. Most areas within 25 miles of Ocala qualify for same-day mobile service at no additional charge.</p>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
  <div class="container">
    <div class="section__header">
      <h2 class="section__title">Common Questions About Our Service Area</h2>
    </div>
    <div class="faq-grid">
      <?php foreach ($faqs as $faq): ?>
      <div class="faq-item">
        <h3><?php echo escHtml($faq['question']); ?></h3>
        <p><?php echo escHtml($faq['answer']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
  <div class="cta-content">
    <h2>Ready to Schedule Your Auto Glass Service?</h2>
    <p>Auto Glass Plus comes to you anywhere in our service area. Same-day appointments available. Call now or request a free estimate online.</p>
    <div class="cta-buttons">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg">
        <?php echo icon('phone', 20); ?>
        Call <?php echo escHtml($phone); ?>
      </a>
      <a href="/contact/" class="btn btn-secondary btn-lg">
        Get Free Estimate
      </a>
    </div>
  </div>
</section>

<?php
/* FAQPage Schema */
echo generateFAQSchema($faqs);

/* Include footer */
include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
?>
