<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Windshield Replacement
 * ------------------------------------------------------------------ */
$currentPage = 'services';

$pageTitle       = 'Windshield Replacement in Ocala, FL | Auto Glass Plus';
$pageDescription = 'Auto Glass Plus provides mobile windshield replacement in Ocala with OEM-quality glass and lifetime workmanship warranty. Completed in about an hour. Call (352) 816-7221.';
$canonicalUrl    = $siteUrl . '/services/windshield-replacement/';
$ogType          = 'website';
$ogImage         = $siteUrl . '/assets/images/windshield-replacement-ocala.jpg';

/* Current service from config */
$currentService = $services[1]; // windshield-replacement

/* FAQs for this service */
$faqs = [
    [
        'question' => 'Is it safe to drive immediately after windshield replacement?',
        'answer' => 'You should wait at least one hour before driving to allow the adhesive to set. We use fast-cure urethane that reaches minimum drive-away strength in about 60 minutes, but the bond continues to strengthen over the next 24 hours. Avoid car washes for the first day.'
    ],
    [
        'question' => 'What\'s the difference between OEM and aftermarket windshield glass?',
        'answer' => 'OEM glass is made by the same manufacturer that supplied your vehicle\'s original windshield, ensuring identical fit, thickness, and optical clarity. Aftermarket glass meets federal safety standards but may vary slightly in tint or features. We install OEM-quality glass that matches factory specifications.'
    ],
    [
        'question' => 'Does your windshield replacement warranty cover the glass and the installation?',
        'answer' => 'Yes. Our lifetime workmanship warranty covers any installation defects like leaks or adhesive failure for as long as you own the vehicle. The glass itself carries a manufacturer warranty against defects. We stand behind both the parts and the labor.'
    ],
    [
        'question' => 'Can you bill my insurance for windshield replacement in Florida?',
        'answer' => 'Absolutely. We handle all insurance paperwork and billing for customers with comprehensive coverage. In Florida, many policies cover windshield replacement with zero deductible or a reduced deductible. We verify your coverage before starting work and can often waive your out-of-pocket cost entirely.'
    ]
];

/* Service schema */
$serviceSchema = [
    "@context" => "https://schema.org",
    "@type" => "Service",
    "serviceType" => "Auto Windshield Replacement",
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
            "name" => "Windshield Replacement",
            "item" => $siteUrl . '/services/windshield-replacement/'
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
   Windshield Replacement — page-specific design system
   ============================================================ */
:root {
  --hero-gradient-start: rgba(11, 95, 165, 0.90);
  --hero-gradient-end: rgba(10, 37, 64, 0.85);
  --section-bg-tint: rgba(var(--color-secondary-rgb), 0.05);
}

/* ---------- Hero ---------- */
.hero--service {
  min-height: 40vh;
  background: linear-gradient(135deg, var(--hero-gradient-start), var(--hero-gradient-end)),
              url('/assets/images/windshield-replacement-ocala.jpg') center / cover no-repeat;
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
  padding: clamp(3rem, 10vh, 6rem) clamp(1rem, 4vw, 2rem);
  position: relative; overflow: hidden;
  text-align: center;
}
.hero--service::before {
  content: '';
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background: radial-gradient(circle at 70% 30%, rgba(245, 166, 35, 0.12), transparent 55%);
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
  color: rgba(255, 255, 255, 0.95);
}
.hero--service .hero-actions {
  display: flex; gap: var(--space-3); justify-content: center; flex-wrap: wrap;
}

/* ---------- Split Layouts ---------- */
.split-section {
  padding: var(--space-16) 0;
  background: var(--color-white);
}
.split-section.tint-bg {
  background: var(--section-bg-tint);
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
  background: rgba(var(--color-primary-rgb), 0.06);
  padding: var(--space-4);
  border-left: 4px solid var(--color-primary);
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
.benefit-card {
  background: var(--color-white);
  padding: var(--space-6);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md);
  text-align: center;
  transition: transform var(--transition), box-shadow var(--transition);
  border-top: 4px solid var(--color-accent);
}
.benefit-card:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-lg);
}
.benefit-card .icon-circle {
  width: 64px; height: 64px; margin: 0 auto var(--space-4);
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-secondary), var(--color-primary));
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
}
.benefit-card .icon-circle svg { width: 28px; height: 28px; }
.benefit-card h3 {
  font-size: var(--font-size-xl); margin-bottom: var(--space-3);
  color: var(--color-dark);
}
.benefit-card p {
  font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6;
  margin: 0;
}

/* ---------- Process Timeline ---------- */
.process-timeline {
  max-width: 900px; margin: var(--space-10) auto 0;
  display: flex; flex-direction: column; gap: var(--space-6);
}
.timeline-step {
  display: flex; gap: var(--space-5);
  padding: var(--space-5);
  background: var(--color-white);
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-sm);
  border-left: 4px solid var(--color-accent);
}
.step-number {
  width: 48px; height: 48px; flex-shrink: 0;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
  font-size: var(--font-size-xl); font-weight: 700;
}
.step-content h3 {
  font-size: var(--font-size-lg); margin-bottom: var(--space-2);
}
.step-content p {
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
.faq-grid {
  max-width: 900px; margin: 0 auto;
  display: grid; grid-template-columns: 1fr; gap: var(--space-4);
}
.faq-item {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  padding: var(--space-5);
  box-shadow: var(--shadow-sm);
  transition: box-shadow var(--transition);
}
.faq-item:hover {
  box-shadow: var(--shadow-md);
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
  background: linear-gradient(135deg, var(--color-secondary), var(--color-primary));
  color: var(--color-white);
  text-align: center;
  position: relative; overflow: hidden;
}
.cta-banner::after {
  content: '';
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.7' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.05'/%3E%3C/svg%3E");
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
  .benefits-grid {
    grid-template-columns: 1fr;
  }
  .timeline-step {
    flex-direction: column;
    text-align: center;
  }
  .step-number {
    margin: 0 auto;
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

<!-- Hero -->
<section class="hero--service">
  <div class="hero-inner">
    <h1>Windshield Replacement in Ocala, Florida</h1>
    <p class="hero-answer">Auto Glass Plus replaces damaged windshields with OEM-quality glass at your home or workplace in Ocala. We complete most replacements in about an hour and back every installation with a lifetime workmanship warranty.</p>
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
        <h2>When do you need full windshield replacement instead of just a repair?</h2>
        <p class="answer-block">Windshield replacement becomes necessary when the damage is larger than a quarter, located in the driver's direct sightline, or has penetrated both layers of glass. Cracks longer than six inches also require replacement, as repair won't restore structural integrity or safety.</p>
        <p>Your windshield is a critical safety component. It supports the roof during a rollover and helps airbags deploy correctly. A compromised windshield puts you and your passengers at risk. Auto Glass Plus uses OEM-quality glass that matches your vehicle's original specifications for fit, clarity, and safety features like rain sensors or heads-up display compatibility.</p>
        <p>Bring your vehicle to our Ocala shop for the fastest turnaround, or have our mobile unit meet you anywhere in Marion County. Either way, we complete most replacements in about an hour.</p>
      </div>
      <div class="split-image">
        <img
          src="/assets/images/windshield-replacement-480.webp"
          srcset="/assets/images/windshield-replacement-480.webp 480w,
                  /assets/images/windshield-replacement-960.webp 960w"
          sizes="(max-width: 768px) 100vw, 50vw"
          alt="Vehicle with the windshield removed and cowl exposed during a windshield replacement at Auto Glass Plus in Ocala, FL"
          width="600"
          height="400"
          loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Section -->
<section class="split-section tint-bg">
  <div class="container">
    <h2 style="text-align: center; margin-bottom: var(--space-4);">Why should Ocala drivers choose Auto Glass Plus for windshield replacement?</h2>
    <p class="answer-block" style="max-width: 60ch; margin: 0 auto var(--space-8); text-align: center;">We install OEM-quality windshields at your location in about an hour, back every installation with a lifetime workmanship warranty, and handle all insurance billing and paperwork for Florida drivers with comprehensive coverage.</p>
    
    <div class="benefits-grid">
      <div class="benefit-card">
        <div class="icon-circle">
          <?php echo icon('shield-check', 28); ?>
        </div>
        <h3>OEM-Quality Glass</h3>
        <p>Factory-specification windshields that match your original glass in fit, clarity, and advanced features.</p>
      </div>
      
      <div class="benefit-card">
        <div class="icon-circle">
          <?php echo icon('clock', 28); ?>
        </div>
        <h3>Done in One Hour</h3>
        <p>Most windshield replacements are completed in about 60 minutes at your location in Ocala.</p>
      </div>
      
      <div class="benefit-card">
        <div class="icon-circle">
          <?php echo icon('award', 28); ?>
        </div>
        <h3>Lifetime Warranty</h3>
        <p>We guarantee our workmanship for as long as you own the vehicle—no leaks, no adhesive failures.</p>
      </div>
      
      <div class="benefit-card">
        <div class="icon-circle">
          <?php echo icon('file-text', 28); ?>
        </div>
        <h3>Insurance Handled</h3>
        <p>We bill your insurance directly and often waive your deductible under Florida comprehensive coverage.</p>
      </div>
    </div>
  </div>
</section>

<!-- Additional Split Section -->
<section class="split-section">
  <div class="container">
    <div class="split-reverse">
      <div class="split-content">
        <h2>What makes a professional windshield replacement safer than a quick install?</h2>
        <p class="answer-block">Professional windshield replacement uses factory-grade adhesive, precise placement, and proper cure time to ensure the windshield bonds securely to the frame and maintains the vehicle's structural safety in a collision or rollover.</p>
        <p>A rushed installation with substandard urethane can leave gaps that allow the windshield to pop out during impact. Auto Glass Plus technicians clean and prime the bonding surfaces, apply the correct adhesive bead pattern, and give the urethane a full cure window before releasing the vehicle.</p>
        <p>We've been serving Ocala since <?php echo $yearEstablished; ?>, and we treat every windshield replacement as a critical safety job—not just a piece of glass.</p>
      </div>
      <div class="split-image">
        <img
          src="/assets/images/shop-bay-professional-install-480.webp"
          srcset="/assets/images/shop-bay-professional-install-480.webp 480w,
                  /assets/images/shop-bay-professional-install-960.webp 960w"
          sizes="(max-width: 768px) 100vw, 50vw"
          alt="Professional mobile auto glass installation bay showing tools and equipment at Auto Glass Plus in Ocala, FL"
          width="600"
          height="400"
          loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- Process Section -->
<section class="split-section tint-bg">
  <div class="container">
    <h2 style="text-align: center; margin-bottom: var(--space-4);">How does the windshield replacement process work at your location?</h2>
    <p class="answer-block" style="max-width: 60ch; margin: 0 auto; text-align: center;">We remove your damaged windshield, clean and prime the frame, install new OEM-quality glass with factory-grade adhesive, and allow proper cure time before releasing the vehicle—all at your home or workplace in Ocala.</p>
    
    <div class="process-timeline">
      <div class="timeline-step">
        <div class="step-number">1</div>
        <div class="step-content">
          <h3>Remove Damaged Glass</h3>
          <p>We carefully remove the old windshield and any remaining adhesive, inspecting the frame for rust or damage that needs attention before installation.</p>
        </div>
      </div>
      
      <div class="timeline-step">
        <div class="step-number">2</div>
        <div class="step-content">
          <h3>Prep the Frame</h3>
          <p>The bonding surface is cleaned and primed to ensure maximum adhesion. We apply a urethane bead in the factory-specified pattern for your vehicle.</p>
        </div>
      </div>
      
      <div class="timeline-step">
        <div class="step-number">3</div>
        <div class="step-content">
          <h3>Install New Windshield</h3>
          <p>The OEM-quality windshield is carefully positioned and seated into the adhesive, aligned perfectly for proper fit and seal.</p>
        </div>
      </div>
      
      <div class="timeline-step">
        <div class="step-number">4</div>
        <div class="step-content">
          <h3>Cure & Inspect</h3>
          <p>We allow the urethane to cure for at least one hour, then inspect the installation for proper seal and alignment before releasing the vehicle.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
  <div class="container">
    <h2>Windshield replacement questions Ocala drivers ask</h2>
    <p class="answer-block">Marion County drivers often ask about drive-away time after installation, the difference between OEM and aftermarket glass, what our warranty covers, and how insurance billing works in Florida. Here's what you need to know.</p>
    
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

<!-- CTA Banner -->
<section class="cta-banner">
  <div class="container">
    <h2>Need a new windshield in Ocala? We'll replace it today.</h2>
    <p>Call Auto Glass Plus for mobile windshield replacement at your home or workplace. We install OEM-quality glass in about an hour and back every job with a lifetime workmanship warranty.</p>
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
