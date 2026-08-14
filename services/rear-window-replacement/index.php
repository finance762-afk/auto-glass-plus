<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Auto Rear Window Replacement Service Page
 * ------------------------------------------------------------------ */
$currentPage = 'services';
$cssVersion  = '2';

$serviceName = 'Auto Rear Window Replacement';
$serviceSlug = 'rear-window-replacement';

$pageTitle       = 'Rear Window Replacement in Ocala, FL | Back Glass Repair | Auto Glass Plus';
$metaDescription = 'Auto Glass Plus replaces broken rear windows and back glass across Ocala, FL with same-day mobile service. Defroster-line glass, lifetime warranty, insurance billing handled. Call (352) 816-7221.';
$canonicalUrl    = $siteUrl . '/services/rear-window-replacement/';
$ogImage         = $siteUrl . '/assets/images/rear-window-replacement-ocala.jpg';

$heroImagePreload = '/assets/images/rear-window-replacement-ocala.jpg';

/* Service-specific FAQs */
$faqs = [
    [
        'question' => 'How long does rear window replacement take?',
        'answer'   => 'Most rear window replacements are completed in one to two hours depending on whether the back glass has embedded defroster lines or antennas. We install the glass with proper adhesive cure time to ensure a watertight, secure seal.',
    ],
    [
        'question' => 'Do you replace rear windows with defroster lines?',
        'answer'   => 'Yes. Auto Glass Plus replaces rear windows with embedded defroster lines, antennas, and third brake lights. We make sure all electrical connections are tested and working after installation.',
    ],
    [
        'question' => 'Will my insurance cover rear window replacement in Ocala?',
        'answer'   => 'Most comprehensive auto insurance policies cover rear window replacement. Auto Glass Plus handles direct billing with major insurers so you don\'t need to pay out of pocket or file the claim yourself.',
    ],
    [
        'question' => 'Can you replace the back glass on trucks and SUVs?',
        'answer'   => 'Yes. Auto Glass Plus replaces rear glass on sedans, trucks, SUVs, hatchbacks, and vans. We handle sliding rear windows, hinged liftgate glass, and fixed back glass across all vehicle types.',
    ],
];

/* Service schema */
$serviceSchema = [
    "@context" => "https://schema.org",
    "@type" => "Service",
    "@id" => $canonicalUrl . "#service",
    "name" => $serviceName,
    "description" => "Professional rear window and back glass replacement in Ocala, FL. Same-day mobile service, defroster-line glass, lifetime workmanship warranty. Licensed and insured.",
    "provider" => [
        "@id" => $siteUrl . "/#organization"
    ],
    "areaServed" => [
        "@type" => "City",
        "name" => $address['city'] . ", " . $address['state']
    ],
    "hasOfferCatalog" => [
        "@type" => "OfferCatalog",
        "name" => "Rear Window Replacement Services",
        "itemListElement" => [
            [
                "@type" => "Offer",
                "itemOffered" => [
                    "@type" => "Service",
                    "name" => "Back Glass Replacement"
                ]
            ],
            [
                "@type" => "Offer",
                "itemOffered" => [
                    "@type" => "Service",
                    "name" => "Defroster-Line Rear Window Replacement"
                ]
            ],
            [
                "@type" => "Offer",
                "itemOffered" => [
                    "@type" => "Service",
                    "name" => "Truck/SUV Rear Glass Replacement"
                ]
            ]
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
            "item" => $siteUrl . "/"
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "name" => "Services",
            "item" => $siteUrl . "/services/"
        ],
        [
            "@type" => "ListItem",
            "position" => 3,
            "name" => $serviceName,
            "item" => $canonicalUrl
        ]
    ]
];

$schemaMarkup = '<script type="application/ld+json">' . json_encode($serviceSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
$schemaMarkup .= "\n" . '<script type="application/ld+json">' . json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
$schemaMarkup .= "\n" . generateFAQSchema($faqs);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================
   Rear Window Replacement Service Page — Standard Tier Layout
   ============================================================ */
:root {
  --color-accent-rgb: 245, 166, 35;
}

/* Hero — service page */
.hero--service {
  min-height: 60vh;
  background-size: cover;
  background-position: center;
  position: relative;
  display: flex;
  align-items: center;
}
.hero--service::before {
  content: '';
  position: absolute; inset: 0; z-index: 1;
  background: linear-gradient(115deg,
      rgba(var(--color-secondary-rgb), 0.88) 0%,
      rgba(var(--color-primary-rgb), 0.72) 100%);
}
.hero--service::after {
  content: '';
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.05'/%3E%3C/svg%3E");
  mix-blend-mode: overlay;
}
.hero--service .container { position: relative; z-index: 2; max-width: 56rem; text-align: center; }
.hero--service .eyebrow {
  display: inline-block;
  color: var(--color-accent);
  font-family: var(--font-heading);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: var(--font-size-xs);
  margin-bottom: var(--space-3);
}
.hero--service h1 {
  color: var(--color-white);
  font-size: var(--fs-h1);
  line-height: 1.1;
  margin-bottom: var(--space-4);
}
.hero--service .hero-answer {
  color: rgba(255, 255, 255, 0.92);
  font-size: var(--font-size-lg);
  line-height: 1.65;
  margin: 0 auto var(--space-6);
}
.hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-4);
  justify-content: center;
  margin-bottom: var(--space-6);
}
.hero-trust {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-3) var(--space-6);
  justify-content: center;
}
.hero-trust-item {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  color: rgba(255, 255, 255, 0.90);
  font-size: var(--font-size-sm);
  font-weight: 500;
}
.hero-trust-item svg { width: 18px; height: 18px; color: var(--color-accent); flex-shrink: 0; }

/* Service detail section */
.service-detail {
  background: var(--color-white);
}
.service-detail h2 {
  color: var(--color-primary);
  margin-bottom: var(--space-4);
}
.service-detail .answer-block {
  background: rgba(var(--color-accent-rgb), 0.08);
  border-left: 4px solid var(--color-accent);
  padding: var(--space-5);
  margin: var(--space-4) 0 var(--space-6);
  font-size: var(--font-size-lg);
  line-height: 1.7;
  color: var(--color-gray-dark);
}
.service-detail p {
  color: var(--color-gray-dark);
  line-height: 1.7;
  margin-bottom: var(--space-5);
}

/* Split layout */
.split {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: clamp(2rem, 5vw, 4rem);
  align-items: center;
}
@media (max-width: 768px) { .split { grid-template-columns: 1fr; } }
.split-reverse {
  display: grid;
  grid-template-columns: 0.9fr 1.1fr;
  gap: clamp(2rem, 5vw, 4rem);
  align-items: center;
}
@media (max-width: 768px) { .split-reverse { grid-template-columns: 1fr; } }
.split img, .split-reverse img {
  border-radius: var(--radius-lg);
  width: 100%;
  height: auto;
  box-shadow: var(--shadow-lg);
}

/* Benefits list */
.benefits-list {
  list-style: none;
  padding: 0;
  margin: var(--space-6) 0;
  display: grid;
  gap: var(--space-4);
}
.benefits-list li {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: var(--space-3);
  align-items: start;
}
.benefits-list li svg {
  width: 24px;
  height: 24px;
  color: var(--color-accent);
  flex-shrink: 0;
  margin-top: 2px;
}
.benefits-list li strong {
  color: var(--color-primary);
  display: block;
  margin-bottom: var(--space-1);
}

/* Process steps */
.process-steps {
  display: grid;
  gap: var(--space-6);
  margin-top: var(--space-6);
}
.process-step {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: var(--space-4);
  align-items: start;
}
.process-step .step-num {
  width: 48px;
  height: 48px;
  border-radius: var(--radius-full);
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  color: var(--color-white);
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: var(--font-size-xl);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  box-shadow: var(--shadow-md);
}
.process-step h3 {
  color: var(--color-primary);
  font-size: var(--font-size-xl);
  margin-bottom: var(--space-2);
}
.process-step p {
  color: var(--color-gray);
  margin: 0;
}

/* FAQ section */
.faq-section {
  background: var(--color-light);
}
.faq-grid {
  display: grid;
  gap: var(--space-6);
  margin-top: var(--space-6);
}
.faq-item {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: var(--space-4);
  align-items: start;
}
.faq-icon {
  width: 32px;
  height: 32px;
  border-radius: var(--radius-md);
  background: rgba(var(--color-accent-rgb), 0.15);
  color: var(--color-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.faq-item h3 {
  color: var(--color-primary);
  font-size: var(--font-size-lg);
  margin-bottom: var(--space-2);
}
.faq-item p {
  color: var(--color-gray-dark);
  margin: 0;
  line-height: 1.7;
}

/* CTA banner */
.cta-banner {
  background: linear-gradient(135deg, var(--color-secondary), var(--color-primary));
  text-align: center;
}
.cta-banner h2 {
  color: var(--color-white);
  margin-bottom: var(--space-4);
}
.cta-banner p {
  color: rgba(255, 255, 255, 0.88);
  max-width: 48rem;
  margin: 0 auto var(--space-6);
  font-size: var(--font-size-lg);
}
</style>

<?php
echo $schemaMarkup;
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Hero -->
<section class="hero hero--service" style="background-image: url('/assets/images/rear-window-replacement-ocala.jpg');">
  <div class="container">
    <span class="eyebrow">Mobile Back Glass Service</span>
    <h1>Rear Window Replacement in Ocala, FL</h1>
    <p class="hero-answer">
      Auto Glass Plus is a licensed Florida auto glass shop based in Ocala, serving drivers across Marion County with same-day mobile rear window and back glass replacement. We handle defroster-line rear glass, truck sliding windows, and liftgate glass at your location, with insurance billing handled and a lifetime workmanship warranty on every install.
    </p>
    <div class="hero-actions">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg">
        <?php echo icon('phone', 18); ?>
        Call <?php echo escHtml($phone); ?>
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">Request Free Estimate</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><?php echo icon('shield-check', 18); ?> Licensed & Insured</span>
      <span class="hero-trust-item"><?php echo icon('truck', 18); ?> Mobile Service to You</span>
      <span class="hero-trust-item"><?php echo icon('badge-check', 18); ?> Defroster Lines Tested</span>
    </div>
  </div>
</section>

<!-- Service Detail -->
<section class="section service-detail">
  <div class="container">
    <h2>What Types of Rear Windows Can Auto Glass Plus Replace in Ocala?</h2>
    <p class="answer-block">
      Auto Glass Plus replaces all types of rear windows across Ocala &mdash; fixed back glass on sedans, sliding rear windows on trucks, liftgate glass on SUVs and hatchbacks, and stationary rear glass on vans. We handle defroster-line glass, embedded antennas, and third brake lights, testing all electrical connections after installation to ensure they work correctly.
    </p>

    <div class="split">
      <div>
        <p>
          A shattered rear window leaves your vehicle exposed to weather and theft. Whether the back glass was broken in a collision, smashed during a break-in attempt, or cracked from road debris kicked up on I-75, Auto Glass Plus brings mobile rear window replacement service directly to you across Ocala, Marion Oaks, Silver Springs Shores, Belleview, and the surrounding Marion County area.
        </p>
        <p>
          Most rear window replacements are completed in one to two hours at your home, workplace, or wherever your vehicle is parked. We remove the damaged glass, clean the frame and prep it for adhesive, install the new OEM-quality rear window with proper cure time, and test all electrical connections including defroster lines, antennas, and brake lights.
        </p>
        <p>
          Auto Glass Plus handles rear glass on cars, trucks, SUVs, vans, and hatchbacks. We install sliding rear windows on pickup trucks, hinged liftgate glass on SUVs and wagons, and fixed back glass on sedans. Every installation is backed by our lifetime workmanship warranty.
        </p>
      </div>
      <img src="/assets/images/rear-window-replacement.jpg"
           alt="Replacement auto glass panels staged on stands before a rear window installation at Auto Glass Plus in Ocala, FL"
           width="600" height="750" loading="lazy"
           srcset="/assets/images/rear-window-replacement-480.webp 480w,
                   /assets/images/rear-window-replacement-960.webp 960w"
           sizes="(max-width: 768px) 100vw, 45vw">
    </div>
  </div>
</section>

<!-- Why Choose Section -->
<section class="section" style="background: var(--color-light);">
  <div class="container">
    <h2>Why Do Ocala Drivers Choose Auto Glass Plus for Rear Window Replacement?</h2>
    <p class="answer-block">
      Auto Glass Plus has served Ocala drivers since 1985 with honest pricing, mobile service across Marion County, and a commitment to testing every electrical connection on defroster-line rear glass. We're a locally owned shop that stands behind our work &mdash; not a national chain routing you through a call center.
    </p>

    <ul class="benefits-list">
      <li>
        <?php echo icon('truck', 24); ?>
        <div>
          <strong>Mobile Service Across Ocala</strong>
          We bring rear window replacement service directly to you anywhere in Ocala and the surrounding 25-mile area. Pick a location and we'll meet you there with the glass and tools needed.
        </div>
      </li>
      <li>
        <?php echo icon('zap', 24); ?>
        <div>
          <strong>Defroster Lines Tested</strong>
          We test all defroster lines, embedded antennas, and third brake lights after installation to ensure they work correctly before we leave.
        </div>
      </li>
      <li>
        <?php echo icon('shield-check', 24); ?>
        <div>
          <strong>Precise Factory-Fit Seal</strong>
          We install OEM-quality rear glass with the proper adhesive cure time to ensure a watertight seal that matches the factory installation.
        </div>
      </li>
      <li>
        <?php echo icon('credit-card', 24); ?>
        <div>
          <strong>Insurance Billing Handled</strong>
          Most comprehensive policies cover rear window replacement. Auto Glass Plus handles direct billing with major insurers so you don't pay upfront or file the claim yourself.
        </div>
      </li>
    </ul>
  </div>
</section>

<!-- Process Section -->
<section class="section">
  <div class="container">
    <h2>How Does the Rear Window Replacement Process Work at Auto Glass Plus?</h2>
    <p class="answer-block">
      Auto Glass Plus follows a proven four-step rear window replacement process: we remove the damaged glass and clean the frame, prep the new defroster-line glass and apply adhesive, install and align the rear window to factory specifications, then test all electrical connections and allow proper cure time. The process takes one to two hours.
    </p>

    <div class="process-steps">
      <div class="process-step">
        <div class="step-num">1</div>
        <div>
          <h3>Glass Removal & Frame Prep</h3>
          <p>
            We carefully remove the damaged rear window, disconnect any electrical connections, clean the frame, and prep the pinch weld for the new adhesive.
          </p>
        </div>
      </div>
      <div class="process-step">
        <div class="step-num">2</div>
        <div>
          <h3>New Glass Prep & Adhesive</h3>
          <p>
            We prep the new OEM-quality rear window, apply urethane adhesive to the perimeter, and reconnect any defroster lines, antennas, or brake light connections.
          </p>
        </div>
      </div>
      <div class="process-step">
        <div class="step-num">3</div>
        <div>
          <h3>Install & Align to Factory Specs</h3>
          <p>
            We position the new rear window in the frame, align it to match factory gap and fit specifications, and set it firmly into the adhesive bed.
          </p>
        </div>
      </div>
      <div class="process-step">
        <div class="step-num">4</div>
        <div>
          <h3>Test Electrical & Cure Time</h3>
          <p>
            We test the defroster lines, antenna, and third brake light to ensure they work correctly, then allow the adhesive to cure before releasing the vehicle.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="section faq-section">
  <div class="container">
    <h2>Common Questions About Rear Window Replacement in Ocala</h2>
    <div class="faq-grid">
      <?php foreach ($faqs as $faq): ?>
      <div class="faq-item">
        <div class="faq-icon"><?php echo icon('help-circle', 20); ?></div>
        <div>
          <h3><?php echo escHtml($faq['question']); ?></h3>
          <p><?php echo escHtml($faq['answer']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Final CTA -->
<section class="section cta-banner">
  <div class="container">
    <h2>Need a Broken Rear Window Replaced in Ocala?</h2>
    <p>
      Auto Glass Plus brings same-day mobile rear window replacement to you across Ocala and Marion County. Defroster-line glass installed and tested, lifetime workmanship warranty, insurance billing handled. Get a free estimate now.
    </p>
    <div class="hero-actions">
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg">
        <?php echo icon('phone', 18); ?>
        Call <?php echo escHtml($phone); ?>
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">Request Free Estimate</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
