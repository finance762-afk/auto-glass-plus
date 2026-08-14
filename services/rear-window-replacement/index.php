<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Rear Window Replacement
 * ------------------------------------------------------------------ */
$currentPage = 'services';
$cssVersion  = '1';

$pageTitle       = 'Rear Window Replacement in Ocala, FL | Auto Glass Plus';
$pageDescription = 'Auto Glass Plus replaces rear windshields and back glass in Ocala, including defroster-equipped glass. Mobile service brings the shop to you. Call (352) 816-7221.';
$canonicalUrl    = $siteUrl . '/services/rear-window-replacement/';
$ogType          = 'website';
$ogImage         = $siteUrl . '/assets/images/rear-window-replacement-ocala.jpg';

/* Current service from config */
$currentService = $services[3]; // rear-window-replacement

/* FAQs for this service */
$faqs = [
    [
        'question' => 'Can you replace rear windows with defroster lines?',
        'answer' => 'Yes. Most rear windows include embedded defroster lines, and we install replacement glass with fully functional heating elements. The defroster grid is built into the glass and connects to your vehicle\'s electrical system through tabs that we attach during installation.'
    ],
    [
        'question' => 'How is a rear window installed differently than a front windshield?',
        'answer' => 'Both use urethane adhesive and require precise placement, but rear windows often have a steeper angle and may include a third brake light, spoiler mounts, or wiper assemblies. We remove those components carefully, bond the new glass with the same adhesive process, and reinstall all hardware.'
    ],
    [
        'question' => 'What does rear window replacement cost in Ocala?',
        'answer' => 'Rear window replacement in Ocala typically ranges from $250 to $500, depending on your vehicle make and model. Luxury vehicles, SUVs with large curved glass, and models requiring heated or privacy-tinted glass cost more. We provide upfront pricing and handle insurance billing for comprehensive claims.'
    ],
    [
        'question' => 'Does insurance cover rear window replacement in Florida?',
        'answer' => 'Yes, if you have comprehensive coverage. Rear window damage from accidents, vandalism, or falling debris is typically covered. While Florida waives the deductible for windshield repair, rear window replacement usually requires you to pay your comprehensive deductible. We bill insurance directly and explain your out-of-pocket cost before starting.'
    ]
];

/* Service schema */
$serviceSchema = [
    "@context" => "https://schema.org",
    "@type" => "Service",
    "serviceType" => "Auto Rear Window Replacement",
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
            "name" => "Rear Window Replacement",
            "item" => $siteUrl . '/services/rear-window-replacement/'
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
   Rear Window Replacement — page-specific design system
   ============================================================ */
:root {
  --hero-dark: rgba(10, 37, 64, 0.89);
  --hero-light: rgba(11, 95, 165, 0.84);
  --section-tint: rgba(var(--color-primary-rgb), 0.05);
}

/* ---------- Hero ---------- */
.hero--service {
  min-height: 40vh;
  background: linear-gradient(135deg, var(--hero-dark), var(--hero-light)),
              url('/assets/images/rear-window-replacement-ocala.jpg') center / cover no-repeat;
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
  padding: clamp(3rem, 10vh, 6rem) clamp(1rem, 4vw, 2rem);
  position: relative; overflow: hidden;
  text-align: center;
}
.hero--service::before {
  content: '';
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background: radial-gradient(circle at 60% 40%, rgba(245, 166, 35, 0.13), transparent 58%);
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
.split-section.section-tint {
  background: var(--section-tint);
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
  background: rgba(var(--color-accent-rgb, 245, 166, 35), 0.10);
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

/* ---------- Feature Cards ---------- */
.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
  gap: var(--space-6);
  margin-top: var(--space-8);
}
.feature-card {
  background: var(--color-white);
  padding: var(--space-6);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-sm);
  text-align: center;
  border: 1px solid var(--color-border);
  transition: transform var(--transition), box-shadow var(--transition);
}
.feature-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-md);
}
.feature-icon {
  width: 60px; height: 60px; margin: 0 auto var(--space-4);
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
}
.feature-icon svg { width: 28px; height: 28px; }
.feature-card h3 {
  font-size: var(--font-size-xl); margin-bottom: var(--space-3);
  color: var(--color-dark);
}
.feature-card p {
  font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.6;
  margin: 0;
}

/* ---------- Process Steps ---------- */
.process-steps {
  max-width: 900px; margin: var(--space-8) auto 0;
  display: grid; gap: var(--space-5);
}
.step-card {
  display: flex; gap: var(--space-4);
  padding: var(--space-5);
  background: var(--color-white);
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-sm);
  border-left: 4px solid var(--color-secondary);
}
.step-num {
  width: 48px; height: 48px; flex-shrink: 0;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-secondary), var(--color-primary));
  color: var(--color-white);
  display: flex; align-items: center; justify-content: center;
  font-size: var(--font-size-xl); font-weight: 700;
}
.step-text h3 {
  font-size: var(--font-size-lg); margin-bottom: var(--space-2);
}
.step-text p {
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
.faq-container {
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
  background: linear-gradient(135deg, var(--color-secondary), var(--color-primary));
  color: var(--color-white);
  text-align: center;
  position: relative; overflow: hidden;
}
.cta-banner::before {
  content: '';
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background: radial-gradient(circle at 70% 30%, rgba(245, 166, 35, 0.14), transparent 55%);
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
  .features-grid {
    grid-template-columns: 1fr;
  }
  .step-card {
    flex-direction: column;
    text-align: center;
  }
  .step-num {
    margin: 0 auto;
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<main id="main-content">

<!-- Hero -->
<section class="hero--service">
  <div class="hero-inner">
    <h1>Rear Window Replacement in Ocala, Florida</h1>
    <p class="hero-answer">Auto Glass Plus replaces rear windshields and back glass for cars, trucks, and SUVs in Ocala with mobile service. We install defroster-equipped glass at your location and handle all insurance billing for comprehensive claims.</p>
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
        <h2>When does a rear window need replacement in Ocala?</h2>
        <p class="answer-block">Rear window replacement is required when the back glass is shattered by an accident, broken during a break-in, or cracked by falling debris. Unlike windshields, rear windows are made of tempered glass that cannot be repaired—once damaged, the entire window must be replaced.</p>
        <p>Rear windows serve a critical function beyond visibility. They help maintain your vehicle's structural integrity, keep out weather and road noise, and support mounted components like third brake lights, rear wipers, and spoilers. A damaged rear window leaves your car vulnerable to theft, water intrusion, and additional interior damage from Florida's frequent rainstorms.</p>
        <p>Auto Glass Plus brings rear window replacement service to you anywhere in Marion County. We stock replacement glass for most makes and models, including heated defroster glass, and complete the installation at your home or workplace in about an hour.</p>
      </div>
      <div class="split-image">
        <img
          src="/assets/images/rear-window-replacement-480.webp"
          srcset="/assets/images/rear-window-replacement-480.webp 480w,
                  /assets/images/rear-window-replacement-960.webp 960w"
          sizes="(max-width: 768px) 100vw, 50vw"
          alt="Rear window back glass ready for installation during a rear window replacement at Auto Glass Plus in Ocala, FL"
          width="600"
          height="400"
          loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Section -->
<section class="split-section section-tint">
  <div class="container">
    <h2 style="text-align: center; margin-bottom: var(--space-4);">Why choose Auto Glass Plus for rear window replacement in Ocala?</h2>
    <p class="answer-block" style="max-width: 60ch; margin: 0 auto var(--space-8); text-align: center;">We install defroster-equipped rear glass with factory-grade adhesive at your location, complete most replacements in about an hour, and handle all insurance paperwork and billing for Florida comprehensive claims.</p>
    
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon">
          <?php echo icon('thermometer', 28); ?>
        </div>
        <h3>Defroster Glass</h3>
        <p>We install heated rear windows with fully functional defroster grids connected to your vehicle's electrical system.</p>
      </div>
      
      <div class="feature-card">
        <div class="feature-icon">
          <?php echo icon('truck', 28); ?>
        </div>
        <h3>Mobile Service</h3>
        <p>We bring the replacement glass and tools to your home or workplace anywhere in Marion County.</p>
      </div>
      
      <div class="feature-card">
        <div class="feature-icon">
          <?php echo icon('clock', 28); ?>
        </div>
        <h3>One-Hour Install</h3>
        <p>Most rear window replacements are completed in about 60 minutes, including cleanup and testing.</p>
      </div>
      
      <div class="feature-card">
        <div class="feature-icon">
          <?php echo icon('clipboard-check', 28); ?>
        </div>
        <h3>Insurance Handled</h3>
        <p>We verify your coverage, bill your comprehensive insurance directly, and explain your out-of-pocket cost upfront.</p>
      </div>
    </div>
  </div>
</section>

<!-- Process Section -->
<section class="split-section">
  <div class="container">
    <h2 style="text-align: center; margin-bottom: var(--space-4);">How does mobile rear window replacement work in Ocala?</h2>
    <p class="answer-block" style="max-width: 60ch; margin: 0 auto; text-align: center;">We arrive at your location with the correct replacement glass, remove the damaged rear window and attached hardware, bond the new glass with urethane adhesive, reconnect all components, and allow proper cure time before releasing the vehicle.</p>
    
    <div class="process-steps">
      <div class="step-card">
        <div class="step-num">1</div>
        <div class="step-text">
          <h3>Remove Damaged Glass</h3>
          <p>We carefully remove the broken rear window, including any attached hardware like third brake lights, wipers, or spoiler mounts. Interior trim is protected during removal.</p>
        </div>
      </div>
      
      <div class="step-card">
        <div class="step-num">2</div>
        <div class="step-text">
          <h3>Clean & Prime Frame</h3>
          <p>The bonding surface is cleaned of old adhesive and debris, then primed to ensure maximum adhesion for the new urethane seal.</p>
        </div>
      </div>
      
      <div class="step-card">
        <div class="step-num">3</div>
        <div class="step-text">
          <h3>Install New Rear Glass</h3>
          <p>The replacement glass—including heated defroster elements if equipped—is positioned precisely and bonded into place with factory-grade urethane adhesive.</p>
        </div>
      </div>
      
      <div class="step-card">
        <div class="step-num">4</div>
        <div class="step-text">
          <h3>Reconnect & Test</h3>
          <p>We reinstall all hardware, connect defroster tabs, test the heating elements and wiper operation, and allow the adhesive to cure before you drive.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
  <div class="container">
    <h2>Rear window replacement questions from Ocala drivers</h2>
    <p class="answer-block">Marion County drivers ask about defroster grid replacement, how rear windows are installed differently than front windshields, typical costs in Ocala, and whether insurance covers back glass damage. Here's what you need to know.</p>
    
    <div class="faq-container">
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
    <h2>Broken rear window in Ocala? We'll replace it at your location.</h2>
    <p>Call Auto Glass Plus for mobile rear window replacement anywhere in Marion County. We install defroster-equipped glass in about an hour and handle all insurance billing for comprehensive claims.</p>
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
