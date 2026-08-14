<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Side Window Replacement
 * ------------------------------------------------------------------ */
$currentPage = 'services';

$pageTitle       = 'Side Window Replacement in Ocala, FL | Auto Glass Plus';
$pageDescription = 'Auto Glass Plus replaces door and side window glass in Ocala with mobile service. Keeps your vehicle secure and weather-tight. Call (352) 816-7221 for same-day service.';
$canonicalUrl    = $siteUrl . '/services/side-window-replacement/';
$ogType          = 'website';
$ogImage         = $siteUrl . '/assets/images/side-window-replacement-ocala.jpg';

/* Current service from config */
$currentService = $services[2]; // side-window-replacement

/* FAQs for this service */
$faqs = [
    [
        'question' => 'What types of side glass can you replace?',
        'answer' => 'We replace all types of side window glass including driver and passenger door windows, rear door windows on sedans and SUVs, and stationary quarter glass (vent windows). Each uses different installation methods—some are held by regulators, others are bonded in place—but we handle them all.'
    ],
    [
        'question' => 'How long does side window replacement take?',
        'answer' => 'Most side window replacements take 30 to 45 minutes per window. Door glass that slides up and down on a regulator takes a bit longer because we need to remove the door panel and reconnect the mechanism. Fixed quarter glass is faster since it just bonds into the frame.'
    ],
    [
        'question' => 'What does side window replacement typically cost in Ocala?',
        'answer' => 'Side window replacement in Ocala generally ranges from $150 to $350 per window, depending on the vehicle make and model. Luxury and specialty vehicles with heated glass or laminated windows cost more. We provide upfront pricing before starting work and bill insurance directly if you have comprehensive coverage.'
    ],
    [
        'question' => 'Do you offer mobile side window replacement in Marion County?',
        'answer' => 'Yes. We bring all the tools and replacement glass to your location anywhere in Marion County. You don\'t need to drive with a broken window or plastic taped over the opening. We come to your home, workplace, or wherever the vehicle is parked and complete the replacement on-site.'
    ]
];

/* Service schema */
$serviceSchema = [
    "@context" => "https://schema.org",
    "@type" => "Service",
    "serviceType" => "Auto Side Window Replacement",
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
            "name" => "Side Window Replacement",
            "item" => $siteUrl . '/services/side-window-replacement/'
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
   Side Window Replacement — page-specific design system
   ============================================================ */
:root {
  --hero-overlay-start: rgba(10, 37, 64, 0.86);
  --hero-overlay-end: rgba(11, 95, 165, 0.82);
  --highlight-tint: rgba(var(--color-accent-rgb, 245, 166, 35), 0.09);
}

/* ---------- Hero ---------- */
.hero--service {
  min-height: 40vh;
  background: linear-gradient(135deg, var(--hero-overlay-start), var(--hero-overlay-end)),
              url('/assets/images/side-window-replacement-ocala.jpg') center / cover no-repeat;
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
  padding: clamp(3rem, 10vh, 6rem) clamp(1rem, 4vw, 2rem);
  position: relative; overflow: hidden;
  text-align: center;
}
.hero--service::before {
  content: '';
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background: radial-gradient(circle at 50% 50%, rgba(245, 166, 35, 0.14), transparent 60%);
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
  color: rgba(255, 255, 255, 0.93);
}
.hero--service .hero-actions {
  display: flex; gap: var(--space-3); justify-content: center; flex-wrap: wrap;
}

/* ---------- Split Layouts ---------- */
.split-section {
  padding: var(--space-16) 0;
  background: var(--color-white);
}
.split-section.highlight-bg {
  background: var(--highlight-tint);
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
  background: rgba(var(--color-secondary-rgb), 0.07);
  padding: var(--space-4);
  border-left: 4px solid var(--color-secondary);
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

/* ---------- Reasons Grid ---------- */
.reasons-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--space-6);
  margin-top: var(--space-8);
}
.reason-card {
  display: flex; gap: var(--space-4);
  padding: var(--space-6);
  background: var(--color-white);
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-sm);
  border: 1px solid var(--color-border);
  transition: transform var(--transition), box-shadow var(--transition);
}
.reason-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
}
.reason-icon {
  width: 52px; height: 52px; flex-shrink: 0;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, var(--color-accent), var(--color-primary));
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
}
.reason-icon svg { width: 26px; height: 26px; }
.reason-text h3 {
  font-size: var(--font-size-lg); margin-bottom: var(--space-2);
}
.reason-text p {
  font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6;
  margin: 0;
}

/* ---------- Process Section ---------- */
.process-list {
  max-width: 900px; margin: var(--space-8) auto 0;
  display: flex; flex-direction: column; gap: var(--space-5);
}
.process-item {
  display: flex; gap: var(--space-4);
  padding: var(--space-5);
  background: var(--color-white);
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-sm);
  border-left: 4px solid var(--color-primary);
}
.process-badge {
  width: 44px; height: 44px; flex-shrink: 0;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
  font-size: var(--font-size-lg); font-weight: 700;
}
.process-detail h3 {
  font-size: var(--font-size-lg); margin-bottom: var(--space-2);
}
.process-detail p {
  font-size: var(--font-size-base); color: var(--color-gray-dark); line-height: 1.6;
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
  max-width: 900px; margin: 0 auto;
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
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  color: var(--color-white);
  text-align: center;
  position: relative;
}
.cta-banner::before {
  content: '';
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background: radial-gradient(circle at 30% 50%, rgba(255, 255, 255, 0.08), transparent 50%);
}
.cta-banner > * { position: relative; z-index: 2; }
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
  .reasons-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

<!-- Hero -->
<section class="hero--service">
  <div class="hero-inner">
    <h1>Side Window Replacement in Ocala, Florida</h1>
    <p class="hero-answer">Auto Glass Plus replaces broken door windows and side glass for vehicles in Ocala with mobile service that comes to your location. We install factory-fit replacement glass in 30 to 45 minutes, keeping your vehicle secure and weather-tight.</p>
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
        <h2>What kinds of side window damage require replacement in Ocala?</h2>
        <p class="answer-block">Side window replacement is necessary when the glass is shattered, cracked through, or has a chip that compromises the window's ability to roll up and down. Unlike windshields, side windows are made of tempered glass that completely shatters on impact and cannot be repaired.</p>
        <p>Broken side windows are usually caused by break-ins, accidents, road debris, or vandalism. Tempered glass is designed to shatter into small, relatively harmless pieces for passenger safety, but that means even a small impact can destroy the entire window. Once it's gone, your vehicle is exposed to weather, theft, and road noise.</p>
        <p>Auto Glass Plus offers same-day mobile side window replacement throughout Marion County. We bring the replacement glass and tools to your home, workplace, or wherever your vehicle is parked. You don't have to drive with plastic taped over the opening or worry about leaving your car vulnerable overnight.</p>
      </div>
      <div class="split-image">
        <img
          src="/assets/images/side-window-replacement-480.webp"
          srcset="/assets/images/side-window-replacement-480.webp 480w,
                  /assets/images/side-window-replacement-960.webp 960w"
          sizes="(max-width: 768px) 100vw, 50vw"
          alt="SUV with the rear side door glass removed for a side window replacement by Auto Glass Plus in Ocala, FL"
          width="600"
          height="400"
          loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Section -->
<section class="split-section highlight-bg">
  <div class="container">
    <h2 style="text-align: center; margin-bottom: var(--space-4);">Why should you call Auto Glass Plus for side window replacement in Ocala?</h2>
    <p class="answer-block" style="max-width: 60ch; margin: 0 auto var(--space-8); text-align: center;">We replace all types of side window glass—door windows, quarter glass, and vent windows—with mobile service anywhere in Marion County. Same-day appointments available, and we handle insurance billing directly for comprehensive claims.</p>
    
    <div class="reasons-grid">
      <div class="reason-card">
        <div class="reason-icon">
          <?php echo icon('truck', 26); ?>
        </div>
        <div class="reason-text">
          <h3>Mobile Service</h3>
          <p>Stop by our Ocala shop or have us come to your location — we complete the replacement either way.</p>
        </div>
      </div>
      
      <div class="reason-card">
        <div class="reason-icon">
          <?php echo icon('zap', 26); ?>
        </div>
        <div class="reason-text">
          <h3>Same-Day Available</h3>
          <p>Most side window replacements can be scheduled and completed the same day you call.</p>
        </div>
      </div>
      
      <div class="reason-card">
        <div class="reason-icon">
          <?php echo icon('settings', 26); ?>
        </div>
        <div class="reason-text">
          <h3>All Glass Types</h3>
          <p>We replace door windows, stationary quarter glass, and vent windows on all makes and models.</p>
        </div>
      </div>
      
      <div class="reason-card">
        <div class="reason-icon">
          <?php echo icon('file-check', 26); ?>
        </div>
        <div class="reason-text">
          <h3>Insurance Handled</h3>
          <p>We bill your comprehensive insurance directly and help minimize your out-of-pocket expense.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Process Section -->
<section class="split-section">
  <div class="container">
    <h2 style="text-align: center; margin-bottom: var(--space-4);">How does mobile side window replacement work in Ocala?</h2>
    <p class="answer-block" style="max-width: 60ch; margin: 0 auto; text-align: center;">We arrive at your location with the correct replacement glass, remove the broken window, vacuum all glass debris from the door cavity and interior, install the new window, and test the operation—all in 30 to 45 minutes.</p>
    
    <div class="process-list">
      <div class="process-item">
        <div class="process-badge">1</div>
        <div class="process-detail">
          <h3>Remove Broken Glass</h3>
          <p>We carefully remove any remaining pieces of the shattered window and protect the interior from debris. Door panels may need to be removed for door glass replacement.</p>
        </div>
      </div>
      
      <div class="process-item">
        <div class="process-badge">2</div>
        <div class="process-detail">
          <h3>Clean & Prep</h3>
          <p>The door cavity, channels, and seals are vacuumed clean and inspected. We check the window regulator mechanism to ensure it works properly.</p>
        </div>
      </div>
      
      <div class="process-item">
        <div class="process-badge">3</div>
        <div class="process-detail">
          <h3>Install New Glass</h3>
          <p>The replacement window is installed into the regulator track or bonded into the frame, depending on the type of glass. All seals are checked for fit.</p>
        </div>
      </div>
      
      <div class="process-item">
        <div class="process-badge">4</div>
        <div class="process-detail">
          <h3>Test & Reassemble</h3>
          <p>We test the window operation to confirm smooth rolling and tight seal, reassemble the door panel if removed, and clean up all debris.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
  <div class="container">
    <h2>Questions Ocala drivers ask about side window replacement</h2>
    <p class="answer-block">Marion County drivers want to know which types of side glass we replace, how long the job takes, what it typically costs, and whether we offer mobile service. Here's what you need to know about side window replacement near you.</p>
    
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
    <h2>Broken side window in Ocala? We'll replace it today.</h2>
    <p>Call Auto Glass Plus for same-day mobile side window replacement at your home or workplace. We replace all types of door and side glass and handle insurance billing directly.</p>
    <div class="cta-actions">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-white btn-lg">
        <?php echo icon('phone', 20); ?>
        Call <?php echo $phone; ?>
      </a>
      <a href="/contact/" class="btn btn-secondary btn-lg">Request Free Estimate</a>
    </div>
  </div>
</section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
