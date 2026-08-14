<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Windshield Repair
 * ------------------------------------------------------------------ */
$currentPage = 'services';
$cssVersion  = '1';

$pageTitle       = 'Windshield Repair in Ocala, FL | Auto Glass Plus';
$metaDescription = 'Auto Glass Plus repairs windshield chips and cracks in Ocala with mobile service. Most repairs completed in 30 minutes, often less than your deductible. Call (352) 816-7221.';
$canonicalUrl    = $siteUrl . '/services/windshield-repair/';
$ogType          = 'website';
$ogImage         = $siteUrl . '/assets/images/windshield-repair-ocala.jpg';

/* Current service from config */
$currentService = $services[0]; // windshield-repair

/* FAQs for this service */
$faqs = [
    [
        'question' => 'How large of a chip can you repair?',
        'answer' => 'We can typically repair chips up to the size of a quarter and cracks up to about six inches long. The damage must be outside the driver\'s direct line of sight. Anything larger or in the driver\'s view usually requires full windshield replacement for safety.'
    ],
    [
        'question' => 'How do you decide whether to repair or replace a windshield?',
        'answer' => 'We look at the size, location, and depth of the damage. If the chip is smaller than a quarter, outside the driver\'s sightline, and hasn\'t penetrated both layers of glass, repair is usually the right choice. Cracks longer than six inches or damage directly in front of the driver typically require replacement.'
    ],
    [
        'question' => 'Does insurance cover windshield repair in Florida?',
        'answer' => 'Yes. Florida law requires insurance companies to waive the deductible for windshield repair. That means repair is completely free for most Florida drivers with comprehensive coverage. We handle the insurance paperwork and billing directly.'
    ],
    [
        'question' => 'How long does a windshield repair take?',
        'answer' => 'Most windshield repairs take 20 to 30 minutes from start to finish. We clean the damaged area, inject a clear resin under pressure, cure it with UV light, and polish the surface. You can drive immediately after, though we recommend waiting an hour before running through a car wash.'
    ]
];

/* Service schema */
$serviceSchema = [
    "@context" => "https://schema.org",
    "@type" => "Service",
    "serviceType" => "Auto Windshield Repair",
    "name" => $currentService['name'],
    "description" => $currentService['description'],
    "provider" => [
        "@id" => $siteUrl . '/#organization'
    ],
    "areaServed" => [
        "@type" => "City",
        "name" => "Ocala",
        "containedInPlace" => [
            "@type" => "State",
            "name" => "Florida"
        ]
    ]
];

/* BreadcrumbList schema */
$breadcrumbSchema = [
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => "Home",
            "item" => $siteUrl . '/'
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "name" => "Services",
            "item" => $siteUrl . '/services/'
        ],
        [
            "@type" => "ListItem",
            "position" => 3,
            "name" => "Windshield Repair",
            "item" => $siteUrl . '/services/windshield-repair/'
        ]
    ]
];

/* FAQPage schema */
$faqMainEntity = [];
foreach ($faqs as $faq) {
    $faqMainEntity[] = [
        "@type" => "Question",
        "name" => $faq['question'],
        "acceptedAnswer" => [
            "@type" => "Answer",
            "text" => $faq['answer']
        ]
    ];
}
$faqSchema = [
    "@context" => "https://schema.org",
    "@type" => "FAQPage",
    "mainEntity" => $faqMainEntity
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<script type="application/ld+json">
<?php echo json_encode($serviceSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<script type="application/ld+json">
<?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<script type="application/ld+json">
<?php echo json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>

<style>
/* ============================================================
   Windshield Repair — page-specific design system
   ============================================================ */
:root {
  --hero-bg-start: var(--color-secondary);
  --hero-bg-end: var(--color-primary);
  --section-bg-alt: rgba(var(--color-primary-rgb), 0.04);
}

/* ---------- Hero ---------- */
.hero--service {
  min-height: 40vh;
  background: linear-gradient(135deg, rgba(10, 37, 64, 0.88), rgba(11, 95, 165, 0.85)),
              url('/assets/images/windshield-repair-ocala.jpg') center / cover no-repeat;
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
  padding: clamp(3rem, 10vh, 6rem) clamp(1rem, 4vw, 2rem);
  position: relative; overflow: hidden;
  text-align: center;
}
.hero--service::before {
  content: '';
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background: radial-gradient(circle at 30% 40%, rgba(245, 166, 35, 0.15), transparent 60%);
}
.hero--service .hero-inner {
  position: relative; z-index: 2;
  max-width: 800px; margin: 0 auto;
}
.hero--service h1 {
  font-size: clamp(2rem, 5vw, 3rem); line-height: 1.1; margin-bottom: var(--space-4);
}
.hero--service .hero-answer {
  font-size: var(--font-size-lg); line-height: 1.7;
  max-width: 60ch; margin: 0 auto var(--space-6);
  color: rgba(255, 255, 255, 0.94);
}
.hero--service .hero-actions {
  display: flex; gap: var(--space-3); justify-content: center; flex-wrap: wrap;
}

/* ---------- Split Layouts ---------- */
.split-section {
  padding: var(--space-16) 0;
  background: var(--color-white);
}
.split-section.alt-bg {
  background: var(--section-bg-alt);
}
.split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-10);
  align-items: center;
  max-width: var(--bp-wide, 1200px);
  margin: 0 auto;
}
.split-reverse {
  grid-template-columns: 1fr 1fr;
}
.split-reverse .split-content { order: 2; }
.split-reverse .split-image { order: 1; }

.split-content h2 {
  font-size: var(--fs-h2); line-height: 1.2; margin-bottom: var(--space-4);
}
.split-content .answer-block {
  font-size: var(--font-size-lg); line-height: 1.7;
  color: var(--color-gray-dark); margin-bottom: var(--space-5);
  background: rgba(var(--color-accent-rgb, 245, 166, 35), 0.08);
  padding: var(--space-4);
  border-left: 4px solid var(--color-accent);
  border-radius: var(--radius-sm);
}
.split-content p {
  font-size: var(--font-size-base); line-height: 1.7; color: var(--color-gray-dark);
  margin-bottom: var(--space-4);
}

.split-image {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
}
.split-image img {
  width: 100%; height: auto; display: block;
  transition: transform 0.4s ease;
}
.split-image:hover img {
  transform: scale(1.05);
}

/* ---------- Benefits Grid ---------- */
.benefits-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: var(--space-6);
  margin-top: var(--space-8);
}
.benefit-item {
  display: flex; gap: var(--space-4);
  padding: var(--space-5);
  background: var(--color-white);
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-sm);
  transition: transform var(--transition), box-shadow var(--transition);
}
.benefit-item:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
}
.benefit-icon {
  width: 48px; height: 48px; flex-shrink: 0;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
}
.benefit-icon svg { width: 24px; height: 24px; }
.benefit-text h3 {
  font-size: var(--font-size-lg); margin-bottom: var(--space-2);
}
.benefit-text p {
  font-size: var(--font-size-sm); color: var(--color-gray-dark);
  margin: 0;
}

/* ---------- Process Steps ---------- */
.process-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: var(--space-8);
  margin-top: var(--space-8);
}
.process-step {
  position: relative;
  padding: var(--space-6);
  background: var(--color-white);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-sm);
  text-align: center;
}
.process-number {
  width: 56px; height: 56px;
  margin: 0 auto var(--space-4);
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
  font-size: var(--font-size-2xl); font-weight: 700;
}
.process-step h3 {
  font-size: var(--font-size-lg); margin-bottom: var(--space-3);
}
.process-step p {
  font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6;
  margin: 0;
}

/* ---------- FAQ Section ---------- */
.faq-section {
  padding: var(--space-16) 0;
  background: var(--color-white);
}
.faq-section h2 {
  font-size: var(--fs-h2); text-align: center; margin-bottom: var(--space-4);
}
.faq-section .answer-block {
  max-width: 60ch; margin: 0 auto var(--space-10);
  font-size: var(--font-size-lg); line-height: 1.7; color: var(--color-gray-dark);
  text-align: center;
}
.faq-list {
  max-width: 800px; margin: 0 auto;
  display: flex; flex-direction: column; gap: var(--space-4);
}
.faq-item {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  padding: var(--space-5);
  box-shadow: var(--shadow-sm);
}
.faq-item h3 {
  font-size: var(--font-size-lg); margin-bottom: var(--space-3);
  color: var(--color-primary);
}
.faq-item p {
  font-size: var(--font-size-base); line-height: 1.7; color: var(--color-gray-dark);
  margin: 0;
}

/* ---------- CTA Banner ---------- */
.cta-banner {
  padding: var(--space-12) 0;
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  color: var(--color-white);
  text-align: center;
}
.cta-banner h2 {
  font-size: var(--fs-h2); margin-bottom: var(--space-4);
}
.cta-banner p {
  font-size: var(--font-size-lg); margin-bottom: var(--space-6);
  max-width: 60ch; margin-left: auto; margin-right: auto;
}
.cta-banner .cta-actions {
  display: flex; gap: var(--space-3); justify-content: center; flex-wrap: wrap;
}

/* ---------- Responsive ---------- */
@media (max-width: 768px) {
  .split,
  .split-reverse {
    grid-template-columns: 1fr;
    gap: var(--space-6);
  }
  .split-reverse .split-content,
  .split-reverse .split-image {
    order: initial;
  }
  .process-grid,
  .benefits-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

<!-- Hero -->
<section class="hero--service">
  <div class="hero-inner">
    <h1>Windshield Repair in Ocala, Florida</h1>
    <p class="hero-answer">Auto Glass Plus repairs windshield chips and small cracks in Ocala with mobile service that comes directly to your location. Most repairs take 20 to 30 minutes and restore your windshield's structural integrity before minor damage spreads into a costly replacement.</p>
    <div class="hero-actions">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-primary btn-lg">
        <?php echo icon('phone', 20); ?>
        Call <?php echo $phone; ?>
      </a>
      <a href="/contact/" class="btn btn-accent btn-lg">Get Free Estimate</a>
    </div>
  </div>
</section>

<!-- Service Overview -->
<section class="split-section">
  <div class="container">
    <div class="split">
      <div class="split-content">
        <h2>When should you repair a windshield chip instead of replacing the whole windshield?</h2>
        <p class="answer-block">Windshield repair is the right choice when the damage is smaller than a quarter, located outside your direct line of sight, and hasn't penetrated both layers of glass. Repairing early prevents the chip from spreading into a long crack that requires full replacement.</p>
        <p>A small chip might seem minor, but temperature changes and road vibration cause it to grow. Once a crack extends beyond six inches, repair is no longer an option. Auto Glass Plus brings the mobile repair shop to your home or workplace in Ocala, injecting a clear resin that bonds the glass layers and stops further damage.</p>
        <p>In Florida, comprehensive insurance covers windshield repair with zero deductible. That means most drivers pay nothing out of pocket. We handle the insurance paperwork and billing, so you get a safer windshield without the hassle.</p>
      </div>
      <div class="split-image">
        <img
          src="/assets/images/windshield-repair-480.webp"
          srcset="/assets/images/windshield-repair-480.webp 480w,
                  /assets/images/windshield-repair-960.webp 960w"
          sizes="(max-width: 768px) 100vw, 50vw"
          alt="Glossy sports car with a clear, undamaged windshield after chip repair at Auto Glass Plus in Ocala, FL"
          width="600"
          height="400"
          loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Section -->
<section class="split-section alt-bg">
  <div class="container">
    <h2 style="text-align: center; margin-bottom: var(--space-4);">Why choose Auto Glass Plus for windshield repair in Ocala?</h2>
    <p class="answer-block" style="max-width: 60ch; margin: 0 auto var(--space-8); text-align: center;">We bring mobile windshield repair directly to your location in Ocala, complete the job in about 30 minutes, and handle all insurance billing so you pay nothing out of pocket under Florida's zero-deductible law for glass repair.</p>
    
    <div class="benefits-grid">
      <div class="benefit-item">
        <div class="benefit-icon">
          <?php echo icon('clock', 24); ?>
        </div>
        <div class="benefit-text">
          <h3>20–30 Minute Repairs</h3>
          <p>Most windshield chip repairs are completed in under half an hour at your home or workplace.</p>
        </div>
      </div>
      
      <div class="benefit-item">
        <div class="benefit-icon">
          <?php echo icon('shield-check', 24); ?>
        </div>
        <div class="benefit-text">
          <h3>Restores Factory Strength</h3>
          <p>Our resin injection process bonds glass layers and prevents chips from spreading into cracks.</p>
        </div>
      </div>
      
      <div class="benefit-item">
        <div class="benefit-icon">
          <?php echo icon('dollar-sign', 24); ?>
        </div>
        <div class="benefit-text">
          <h3>Zero Deductible in Florida</h3>
          <p>Florida law waives your deductible for windshield repair. We handle insurance billing directly.</p>
        </div>
      </div>
      
      <div class="benefit-item">
        <div class="benefit-icon">
          <?php echo icon('map-pin', 24); ?>
        </div>
        <div class="benefit-text">
          <h3>Mobile Service Across Ocala</h3>
          <p>We come to you anywhere in Marion County, saving you the trip to a shop.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Process Section -->
<section class="split-section">
  <div class="container">
    <h2 style="text-align: center; margin-bottom: var(--space-4);">How does the windshield repair process work?</h2>
    <p class="answer-block" style="max-width: 60ch; margin: 0 auto; text-align: center;">We clean the damaged area, inject a specialized resin under pressure to fill the chip or crack, cure it with ultraviolet light, and polish the surface smooth—all in about 30 minutes at your location.</p>
    
    <div class="process-grid">
      <div class="process-step">
        <div class="process-number">1</div>
        <h3>Inspect & Clean</h3>
        <p>We assess the damage to confirm it's repairable, then clean out debris and moisture from the chip.</p>
      </div>
      
      <div class="process-step">
        <div class="process-number">2</div>
        <h3>Inject Resin</h3>
        <p>A clear resin is injected under pressure, filling the damage and bonding the glass layers together.</p>
      </div>
      
      <div class="process-step">
        <div class="process-number">3</div>
        <h3>Cure with UV Light</h3>
        <p>We use ultraviolet light to harden the resin instantly, creating a strong, transparent bond.</p>
      </div>
      
      <div class="process-step">
        <div class="process-number">4</div>
        <h3>Polish & Inspect</h3>
        <p>The surface is polished smooth and checked for clarity. You can drive immediately after completion.</p>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
  <div class="container">
    <h2>Common questions about windshield repair in Ocala</h2>
    <p class="answer-block">Ocala drivers often ask about chip size limits, when to repair versus replace, insurance coverage under Florida law, and how long the repair takes. Here's what you need to know before scheduling mobile windshield repair.</p>
    
    <div class="faq-list">
      <?php foreach ($faqs as $faq): ?>
      <div class="faq-item">
        <h3><?php echo escHtml($faq['question']); ?></h3>
        <p><?php echo escHtml($faq['answer']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner">
  <div class="container">
    <h2>Got a windshield chip in Ocala? We'll fix it today.</h2>
    <p>Call Auto Glass Plus for mobile windshield repair anywhere in Marion County. Most repairs take 30 minutes and are covered by insurance with zero deductible.</p>
    <div class="cta-actions">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-white btn-lg">
        <?php echo icon('phone', 20); ?>
        Call <?php echo $phone; ?>
      </a>
      <a href="/contact/" class="btn btn-accent btn-lg">Request Free Estimate</a>
    </div>
  </div>
</section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
