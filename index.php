<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Homepage
 * ------------------------------------------------------------------ */
$currentPage = 'home';

$pageTitle       = 'Auto Glass Plus | Mobile Windshield Repair & Replacement in Ocala, FL';
$pageDescription = 'Auto Glass Plus brings same-day mobile windshield repair and replacement to you across Ocala, FL. Insurance billing handled, lifetime workmanship warranty. Call (352) 816-7221.';
$canonicalUrl    = $siteUrl . '/';
$ogType          = 'website';

$heroImagePreload = '/assets/images/hero-mobile-glass-ocala.jpg';
$ogImage          = $siteUrl . '/assets/images/hero-mobile-glass-ocala.jpg';

/* Homepage FAQs — sourced verbatim from research_brief.brief.faqs */
$faqs = [
    [
        'question' => 'Do you offer mobile service to fix my windshield at my home or workplace?',
        'answer'   => 'Yes. Auto Glass Plus brings our mobile service directly to you throughout Ocala and the surrounding areas. We can typically complete most windshield replacements in under an hour at your home, office, or wherever your vehicle is parked.',
    ],
    [
        'question' => 'Will my insurance cover auto glass repair or replacement?',
        'answer'   => 'Most comprehensive auto insurance policies cover glass damage with little to no deductible. Auto Glass Plus handles direct billing with major insurers, so you don\'t need to pay out of pocket or file the claim yourself.',
    ],
    [
        'question' => 'What warranty do you offer on your work?',
        'answer'   => 'Auto Glass Plus provides a lifetime warranty on our installation workmanship plus the manufacturer\'s warranty on all glass. If there is ever an issue with the install, we make it right.',
    ],
    [
        'question' => 'How long does a windshield replacement typically take?',
        'answer'   => 'Most replacements take 45 minutes to an hour. After installation, we recommend waiting at least one hour before driving and several hours before exposing the vehicle to water or a car wash so the adhesive fully cures.',
    ],
    [
        'question' => 'Do you repair chips and cracks or only do full replacements?',
        'answer'   => 'Auto Glass Plus repairs chips and small cracks when they fall outside the driver\'s line of sight and meet safety standards. Many repairs cost less than your deductible, and we\'ll walk you through the options when you call.',
    ],
    [
        'question' => 'Which areas around Ocala do you serve?',
        'answer'   => 'We serve drivers throughout Ocala and communities within roughly a 25-mile radius, from Marion Oaks and Silver Springs Shores to Belleview, Dunnellon, and the surrounding Marion County area.',
    ],
];

/* Icon map per service slug (icons that exist in references/lucide-icons/) */
$serviceIcons = [
    'windshield-repair'        => 'wrench',
    'windshield-replacement'   => 'car',
    'side-window-replacement'  => 'truck',
    'rear-window-replacement'  => 'hammer',
];

/* Photo map per service slug (real client photos on disk) */
$servicePhotos = [
    'windshield-repair'       => ['file' => 'windshield-repair.jpg',      'alt' => 'Black pickup truck with a clear, undamaged windshield after chip repair at Auto Glass Plus in Ocala, FL'],
    'windshield-replacement'  => ['file' => 'windshield-replacement.jpg', 'alt' => 'Vehicle with the windshield removed and cowl exposed during a windshield replacement at Auto Glass Plus in Ocala, FL'],
    'side-window-replacement' => ['file' => 'side-window-replacement.jpg','alt' => 'Side profile of an SUV with clean, intact door and side windows after a side window replacement by Auto Glass Plus in Ocala, FL'],
    'rear-window-replacement' => ['file' => 'rear-window-replacement.jpg','alt' => 'Replacement auto glass panels staged on stands before a rear window installation at Auto Glass Plus in Ocala, FL'],
];

/* Service card bullet points (benefit-driven, 3 each) */
$serviceBullets = [
    'windshield-repair'       => ['Stops cracks from spreading', 'Often less than your deductible', 'Restores factory strength'],
    'windshield-replacement'  => ['OEM-quality glass installed', 'Done in about an hour', 'Lifetime workmanship warranty'],
    'side-window-replacement' => ['Door and quarter glass', 'Vacuumed clean of debris', 'Keeps your vehicle secure'],
    'rear-window-replacement' => ['Defroster-line back glass', 'Precise factory-fit seal', 'Insurance billing handled'],
];

$tints = ['card-tint-1', 'card-tint-2', 'card-tint-3'];

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
<?php echo json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>

<style>
/* ============================================================
   Homepage — page-specific design system (Standard tier)
   Token aliases + component styling. Uses var() tokens.
   ============================================================ */
:root {
  /* spacing aliases used by required-components pattern */
  --space-xs: var(--space-2);
  --space-sm: var(--space-3);
  --space-md: var(--space-6);
  --space-lg: var(--space-8);
  --space-xl: var(--space-12);
  --color-text: var(--color-gray-dark);
  --color-accent-rgb: 245, 166, 35;
  /* tinted card backgrounds — brand colors at low alpha */
  --color-card-tint-1: rgba(var(--color-primary-rgb), 0.08);
  --color-card-tint-2: rgba(var(--color-secondary-rgb), 0.06);
  --color-card-tint-3: rgba(var(--color-accent-rgb), 0.10);
  --color-card-tint-neutral: var(--color-light);
  /* glass surface tokens for the hero form + chips */
  --glass-surface: rgba(var(--color-secondary-rgb), 0.55);
  --glass-border: rgba(255, 255, 255, 0.18);
  --chip-surface: rgba(255, 255, 255, 0.10);
}

/* ---------- Hero (layered: photo + gradient ::before + noise ::after) ---------- */
.hero--home {
  min-height: 100vh;
  align-items: stretch;
  background-image: url('/assets/images/hero-mobile-glass-ocala.jpg');
}
.hero--home::before {
  content: '';
  position: absolute; inset: 0; z-index: 1;
  background: linear-gradient(115deg,
      rgba(var(--color-secondary-rgb), 0.94) 0%,
      rgba(var(--color-secondary-rgb), 0.82) 42%,
      rgba(var(--color-primary-rgb), 0.55) 100%);
}
.hero--home::after {
  content: '';
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E");
  mix-blend-mode: overlay;
}
.hero--home .hero-inner {
  position: relative; z-index: 2;
  width: 100%; max-width: var(--bp-wide, 1200px);
  margin: 0 auto; padding: 7rem clamp(1rem, 4vw, 2rem) 4rem;
  display: grid; grid-template-columns: 1.4fr 1fr;
  gap: clamp(2rem, 5vw, 4rem); align-items: center;
}
.hero-text { text-align: left; max-width: none; padding: 0; }
.hero-text .hero-eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-2);
}
.hero-text .hero-eyebrow svg { width: 16px; height: 16px; }
.hero-text h1 {
  color: var(--color-white);
  font-size: var(--fs-h1); line-height: 1.05; margin-bottom: var(--space-5);
}
.hero-text .hero-highlight { color: var(--color-accent); }
.hero-text .hero-subtitle {
  color: rgba(255, 255, 255, 0.90);
  font-size: var(--font-size-lg); max-width: 34rem;
  margin: 0 0 var(--space-8); line-height: 1.6;
}
.hero-actions { display: flex; flex-wrap: wrap; gap: var(--space-4); margin-bottom: var(--space-8); }
.hero-trust { display: flex; flex-wrap: wrap; gap: var(--space-3) var(--space-6); justify-content: flex-start; }
.hero-trust-item {
  display: inline-flex; align-items: center; gap: var(--space-2);
  color: rgba(255, 255, 255, 0.92); font-size: var(--font-size-sm); font-weight: 500;
}
.hero-trust-item svg { width: 18px; height: 18px; color: var(--color-accent); flex-shrink: 0; }

/* ---------- Hero lead form (glassmorphism) ---------- */
.hero-form-card {
  background: var(--glass-surface);
  backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
  border: 1px solid var(--glass-border);
  border-radius: var(--radius-xl);
  padding: clamp(1.5rem, 3vw, 2rem);
  box-shadow: var(--shadow-xl);
}
.hero-form-card h2 { color: var(--color-white); font-size: var(--font-size-2xl); margin-bottom: var(--space-1); }
.hero-form-tagline { color: var(--color-accent); font-size: var(--font-size-sm); font-weight: 600; margin-bottom: var(--space-5); }
.hero-form .form-row { margin-bottom: var(--space-3); }
.hero-form input,
.hero-form select {
  width: 100%; padding: var(--space-4);
  border: 1px solid var(--glass-border);
  background: rgba(255, 255, 255, 0.94);
  border-radius: var(--radius-md);
  font-family: var(--font-body); font-size: var(--font-size-base); color: var(--color-dark);
  transition: border-color var(--transition-fast), box-shadow var(--transition-fast);
}
.hero-form input:focus,
.hero-form select:focus {
  outline: none; border-color: var(--color-accent);
  box-shadow: 0 0 0 3px rgba(var(--color-accent-rgb), 0.25);
}
.hero-form .btn-block { width: 100%; margin-top: var(--space-2); }
.form-footnote { color: rgba(255, 255, 255, 0.72); font-size: var(--font-size-xs); margin: var(--space-3) 0 0; line-height: 1.5; }
.form-footnote a { color: var(--color-accent); text-decoration: underline; }

/* ---------- Ticker items ---------- */
.ticker-track span { display: inline-flex; align-items: center; gap: var(--space-2); }
.ticker-track svg { width: 16px; height: 16px; }

/* ---------- Numbered section eyebrow ---------- */
.numbered-section .section-header .eyebrow { position: relative; }
.numbered-section[data-num]::before {
  content: attr(data-num);
  position: absolute; top: clamp(1rem, 4vh, 3rem); right: clamp(1rem, 5vw, 4rem);
  font-family: var(--font-heading); font-weight: 800;
  font-size: clamp(4rem, 12vw, 9rem); line-height: 1;
  color: rgba(var(--color-primary-rgb), 0.05); z-index: 0; pointer-events: none;
}
.numbered-section .container { position: relative; z-index: 1; }
.section-header h2 .text-accent { color: var(--color-accent); }
.hero-answer {
  max-width: 60ch; margin: var(--space-4) auto 0;
  color: var(--color-gray-dark); font-size: var(--font-size-lg); line-height: 1.7;
}

/* ---------- Section dividers (two distinct styles, rendered inside section top) ---------- */
/* Style 1: slanted band painting the PREVIOUS (white) section down into this one */
.divider-slant-white::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: clamp(2rem, 5vw, 4.5rem);
  background: var(--color-white); z-index: 1;
  clip-path: polygon(0 0, 100% 0, 100% 0, 0 100%);
}
/* Style 2: SVG wave sitting at the top edge, flowing the prior section's color in */
.divider-wave-top .divider-svg {
  position: absolute; top: 0; left: 0; width: 100%; height: clamp(2rem, 5vw, 4.5rem);
  display: block; z-index: 1;
}
.divider-wave-top > .container { position: relative; z-index: 2; }

/* ---------- Required-components: tinted image service cards ---------- */
.card-tint-1 { background: var(--color-card-tint-1); }
.card-tint-2 { background: var(--color-card-tint-2); }
.card-tint-3 { background: var(--color-card-tint-3); }
.services-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-6); }
@media (max-width: 1199px) { .services-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px)  { .services-grid { grid-template-columns: 1fr; } }
.service-card-with-image {
  border-radius: var(--radius-lg); overflow: hidden;
  display: flex; flex-direction: column;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.service-card-with-image:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
.service-card__image { position: relative; aspect-ratio: 5 / 3; overflow: hidden; }
.service-card__image img { width: 100%; height: 100%; object-fit: cover; transition: transform var(--transition-slow); }
.service-card-with-image:hover .service-card__image img { transform: scale(1.06); }
.service-card__body {
  padding: var(--space-8) var(--space-6) var(--space-6);
  text-align: center; display: flex; flex-direction: column; align-items: center; gap: var(--space-3);
}
.service-card__icon {
  width: 56px; height: 56px; border-radius: var(--radius-full);
  background: var(--color-white); box-shadow: var(--shadow-md);
  display: flex; align-items: center; justify-content: center;
  margin-top: -44px; margin-bottom: var(--space-1); color: var(--color-primary);
}
.service-card__icon svg { width: 26px; height: 26px; }
.service-card-with-image h3 { color: var(--color-primary); margin: 0; font-size: var(--font-size-xl); }
.service-card__desc { color: var(--color-text); margin: 0; font-size: var(--font-size-sm); line-height: 1.55; }
.service-card-with-image ul {
  list-style: none; padding: var(--space-4) 0 0; margin: var(--space-1) 0 0; width: 100%;
  text-align: left; display: flex; flex-direction: column; gap: var(--space-2);
  border-top: 1px solid rgba(var(--color-secondary-rgb), 0.10);
}
.service-card-with-image ul li { font-size: var(--font-size-sm); color: var(--color-text); padding-left: var(--space-5); position: relative; }
.service-card-with-image ul li::before { content: "✓"; color: var(--color-accent); font-weight: 700; position: absolute; left: 0; top: 0; }
.service-card__cta {
  margin-top: auto; color: var(--color-accent); font-weight: 600; font-size: var(--font-size-sm);
  border-top: 1px solid rgba(var(--color-secondary-rgb), 0.10);
  width: 100%; text-align: center; padding: var(--space-4) 0 0; transition: color var(--transition-base);
}
.service-card__cta::after { content: " →"; display: inline-block; transition: transform var(--transition-base); }
.service-card__cta:hover { color: var(--color-primary); }
.service-card__cta:hover::after { transform: translateX(4px); }
.services-cta { text-align: center; margin-top: var(--space-10); }

/* ---------- Facts / stats row (real, non-fabricated figures) ---------- */
.facts-section { background: var(--color-primary); }
.facts-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-8); text-align: center; }
.fact-item { position: relative; }
.fact-item .fact-number { font-family: var(--font-heading); font-weight: 800; font-size: var(--font-size-5xl); color: var(--color-white); line-height: 1; }
.fact-item .fact-number span { color: var(--color-accent); }
.fact-item .fact-label { color: rgba(255, 255, 255, 0.85); font-size: var(--font-size-sm); text-transform: uppercase; letter-spacing: 1px; margin-top: var(--space-2); }
@media (max-width: 768px) { .facts-grid { grid-template-columns: 1fr 1fr; gap: var(--space-6); } }

/* ---------- About / process (asymmetric split + overlapping stat card) ---------- */
.about-section { background: var(--color-light); }
.about-split { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: clamp(2rem, 5vw, 4.5rem); align-items: center; }
.about-content .eyebrow { display: inline-block; color: var(--color-primary); font-family: var(--font-heading); font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-size: var(--font-size-xs); margin-bottom: var(--space-3); }
.about-content h2 { margin-bottom: var(--space-4); }
.about-content > p { color: var(--color-gray-dark); max-width: 52ch; }
.process-steps { margin-top: var(--space-8); display: grid; gap: var(--space-5); }
.process-step { display: grid; grid-template-columns: auto 1fr; gap: var(--space-4); align-items: start; }
.process-step .step-num {
  width: 44px; height: 44px; border-radius: var(--radius-full);
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  color: var(--color-white); font-family: var(--font-heading); font-weight: 800;
  display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: var(--shadow-md);
}
.process-step h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-1); }
.process-step p { color: var(--color-gray); font-size: var(--font-size-sm); margin: 0; }
.about-media { position: relative; }
.about-media img { border-radius: var(--radius-lg); width: 100%; aspect-ratio: 4 / 5; object-fit: cover; box-shadow: var(--shadow-lg); }
.about-media .about-badge {
  position: absolute; bottom: calc(-1 * var(--space-6)); left: calc(-1 * var(--space-5));
  background: var(--color-accent); color: var(--color-white);
  padding: var(--space-6); border-radius: var(--radius-lg); box-shadow: var(--shadow-xl); text-align: center; max-width: 12rem;
}
.about-media .about-badge .badge-big { font-family: var(--font-heading); font-weight: 800; font-size: var(--font-size-3xl); line-height: 1; }
.about-media .about-badge .badge-small { font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1px; margin-top: var(--space-1); }
.about-media .float-accent {
  position: absolute; top: calc(-1 * var(--space-6)); right: calc(-1 * var(--space-4)); z-index: -1;
  width: 120px; height: 120px; border-radius: var(--radius-full);
  background: rgba(var(--color-primary-rgb), 0.12);
}
@media (max-width: 768px) {
  .about-split { grid-template-columns: 1fr; gap: var(--space-12); }
  .about-media .about-badge { left: var(--space-4); bottom: calc(-1 * var(--space-4)); }
}

/* ---------- Trust / Google reviews (dark, honest social proof) ---------- */
.trust-section { background: var(--color-dark); }
.trust-section .section-header h2 { color: var(--color-white); }
.trust-section .section-header p { color: rgba(255, 255, 255, 0.72); }
.trust-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); margin-bottom: var(--space-10); }
@media (max-width: 768px) { .trust-grid { grid-template-columns: 1fr; } }
.trust-card {
  background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.10);
  border-radius: var(--radius-lg); padding: var(--space-8); text-align: left;
}
.trust-card .trust-icon {
  width: 48px; height: 48px; border-radius: var(--radius-md);
  background: rgba(var(--color-accent-rgb), 0.15); color: var(--color-accent);
  display: flex; align-items: center; justify-content: center; margin-bottom: var(--space-4);
}
.trust-card h3 { color: var(--color-white); font-size: var(--font-size-lg); margin-bottom: var(--space-2); }
.trust-card p { color: rgba(255, 255, 255, 0.75); font-size: var(--font-size-sm); margin: 0; line-height: 1.6; }
.trust-cta { text-align: center; display: flex; flex-wrap: wrap; gap: var(--space-4); justify-content: center; align-items: center; }
.trust-cta .google-note { color: rgba(255, 255, 255, 0.6); font-size: var(--font-size-sm); }

/* ---------- FAQ ---------- */
.faq-section .faq-grid { margin-top: var(--space-4); }
.faq-item { align-items: flex-start; }
.faq-icon svg { width: 20px; height: 20px; }

/* ---------- Closing CTA ---------- */
.closing-cta { background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-primary) 100%); text-align: center; }
.closing-cta h2 { color: var(--color-white); margin-bottom: var(--space-4); }
.closing-cta p { color: rgba(255, 255, 255, 0.88); max-width: 44rem; margin: 0 auto var(--space-8); font-size: var(--font-size-lg); }
.closing-cta .hero-actions { justify-content: center; }

/* ---------- Reveal delays (opacity handled by [data-animate]; safe additive delays) ---------- */
.reveal-delay-1 { transition-delay: 0.05s; }
.reveal-delay-2 { transition-delay: 0.15s; }
.reveal-delay-3 { transition-delay: 0.25s; }

/* ---------- Responsive hero ---------- */
@media (max-width: 900px) {
  .hero--home .hero-inner { grid-template-columns: 1fr; padding-top: 6rem; }
  .hero-text { text-align: center; }
  .hero-text .hero-subtitle { margin-left: auto; margin-right: auto; }
  .hero-actions, .hero-trust { justify-content: center; }
  .hero-form-card { max-width: 30rem; margin: 0 auto; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================ HERO ============================ -->
<section class="hero hero--home" aria-label="Auto Glass Plus — mobile auto glass in Ocala">
  <div class="hero-inner">

    <div class="hero-text">
      <span class="hero-eyebrow">
        <?php echo icon('shield-check', 16); ?>
        Serving Ocala, FL &amp; Marion County
      </span>
      <h1>Cracked Windshield? <span class="hero-highlight">We Come To You.</span></h1>
      <p class="hero-subtitle">
        Auto Glass Plus delivers same-day mobile windshield repair and replacement across Ocala &mdash;
        with insurance billing handled for you and a lifetime workmanship warranty on every install.
        No shop visit, no runaround, no hidden fees.
      </p>
      <div class="hero-actions">
        <a href="#estimate-form" class="btn btn-accent btn-lg">Get a Free Estimate</a>
        <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-outline-white btn-lg">
          <?php echo icon('phone', 18); ?>
          Call <?php echo escHtml($phone); ?>
        </a>
      </div>
      <div class="hero-trust">
        <span class="hero-trust-item"><?php echo icon('shield-check', 18); ?> Licensed &amp; Insured</span>
        <span class="hero-trust-item"><?php echo icon('truck', 18); ?> Same-Day Mobile Service</span>
        <span class="hero-trust-item"><?php echo icon('badge-check', 18); ?> Lifetime Workmanship Warranty</span>
        <span class="hero-trust-item"><?php echo icon('check-circle', 18); ?> Insurance Billing Handled</span>
      </div>
    </div>

    <aside class="hero-form-card" id="estimate-form" aria-label="Request a free estimate">
      <h2>Get Your Free Estimate</h2>
      <p class="hero-form-tagline">No obligation. Same-day response.</p>
      <form action="<?php echo escAttr($formAction); ?>" method="POST" class="hero-form">
        <input type="hidden" name="_next" value="<?php echo escAttr($siteUrl); ?>/thank-you">
        <input type="hidden" name="_captcha" value="false">
        <input type="hidden" name="_template" value="table">
        <input type="hidden" name="_subject" value="New estimate request — Auto Glass Plus website">
        <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">
        <input type="text" name="_honey" style="display:none" tabindex="-1" autocomplete="off">
        <input type="hidden" name="form_location" value="hero">
        <input type="hidden" name="consent_version" value="v2.1">
        <input type="hidden" name="consent_page" value="<?php echo escAttr($_SERVER['REQUEST_URI'] ?? '/'); ?>">

        <div class="form-row">
          <label class="skip-link" for="hero-name">Full name</label>
          <input type="text" id="hero-name" name="name" placeholder="Full name" required>
        </div>
        <div class="form-row">
          <label class="skip-link" for="hero-phone">Phone number</label>
          <input type="tel" id="hero-phone" name="phone" placeholder="Phone number" required>
        </div>
        <div class="form-row">
          <label class="skip-link" for="hero-zip">ZIP code</label>
          <input type="text" id="hero-zip" name="zip" placeholder="ZIP code" pattern="[0-9]{5}" inputmode="numeric" required>
        </div>
        <div class="form-row">
          <label class="skip-link" for="hero-service">What do you need?</label>
          <select id="hero-service" name="service_requested">
            <option value="">What do you need?</option>
            <?php foreach ($services as $service): ?>
            <option value="<?php echo escAttr($service['name']); ?>"><?php echo escHtml($service['name']); ?></option>
            <?php endforeach; ?>
            <option value="Not sure — need advice">Not sure — need advice</option>
          </select>
        </div>
        <button type="submit" class="btn btn-accent btn-block">Get My Free Estimate</button>
        <p class="form-footnote">By submitting, you agree to our <a href="/terms/">Terms</a> and <a href="/privacy-policy/">Privacy Policy</a>.</p>
      </form>
    </aside>

  </div>
</section>

<!-- ============================ TICKER ============================ -->
<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <span><?php echo icon('truck', 16); ?> Same-Day Mobile Service</span>
    <span><?php echo icon('shield-check', 16); ?> Licensed &amp; Insured</span>
    <span><?php echo icon('badge-check', 16); ?> Lifetime Workmanship Warranty</span>
    <span><?php echo icon('check-circle', 16); ?> Direct Insurance Billing</span>
    <span><?php echo icon('car', 16); ?> OEM-Quality Glass</span>
    <span><?php echo icon('map-pin', 16); ?> Ocala &amp; Marion County</span>
    <span><?php echo icon('clock', 16); ?> Most Installs Under an Hour</span>
    <span><?php echo icon('star', 16); ?> Local, Not a National Chain</span>
    <!-- duplicate for seamless loop -->
    <span><?php echo icon('truck', 16); ?> Same-Day Mobile Service</span>
    <span><?php echo icon('shield-check', 16); ?> Licensed &amp; Insured</span>
    <span><?php echo icon('badge-check', 16); ?> Lifetime Workmanship Warranty</span>
    <span><?php echo icon('check-circle', 16); ?> Direct Insurance Billing</span>
    <span><?php echo icon('car', 16); ?> OEM-Quality Glass</span>
    <span><?php echo icon('map-pin', 16); ?> Ocala &amp; Marion County</span>
    <span><?php echo icon('clock', 16); ?> Most Installs Under an Hour</span>
    <span><?php echo icon('star', 16); ?> Local, Not a National Chain</span>
  </div>
</div>

<!-- ============================ SERVICES ============================ -->
<section class="section numbered-section" data-num="01" aria-label="Auto glass services in Ocala">
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">What We Do</span>
      <h2>Which <span class="text-accent">auto glass services</span> does Auto Glass Plus offer in Ocala?</h2>
      <p class="hero-answer">
        Auto Glass Plus handles the full range of vehicle glass work for Ocala drivers &mdash; chip and
        crack repair, full windshield replacement, and side and rear window replacement &mdash; all with
        OEM-quality glass, mobile service to your location, and direct insurance billing.
      </p>
    </div>

    <div class="services-grid">
      <?php foreach ($services as $i => $service):
        $slug   = $service['slug'];
        $tint   = $tints[$i % 3];
        $delay  = ($i % 3) + 1;
        $iconNm = $serviceIcons[$slug] ?? 'wrench';
        $photo  = $servicePhotos[$slug];
        $bullets = $serviceBullets[$slug];
        $photoBase = preg_replace('/\.jpg$/', '', $photo['file']);
      ?>
      <article class="service-card-with-image <?php echo $tint; ?> reveal-delay-<?php echo $delay; ?>" data-animate>
        <div class="service-card__image">
          <img src="/assets/images/<?php echo escAttr($photo['file']); ?>"
               srcset="/assets/images/<?php echo escAttr($photoBase); ?>-480.webp 480w, /assets/images/<?php echo escAttr($photoBase); ?>-960.webp 960w"
               sizes="(max-width: 600px) 100vw, (max-width: 1199px) 50vw, 25vw"
               alt="<?php echo escAttr($photo['alt']); ?>"
               width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo icon($iconNm, 26); ?></div>
          <h3><?php echo escHtml($service['name']); ?></h3>
          <p class="service-card__desc"><?php echo escHtml($service['description']); ?></p>
          <ul>
            <?php foreach ($bullets as $b): ?>
            <li><?php echo escHtml($b); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/services/<?php echo escAttr($slug); ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <div class="services-cta" data-animate>
      <a href="/services/" class="btn btn-primary btn-lg">View All Services</a>
    </div>
  </div>
</section>

<!-- ============================ FACTS ============================ -->
<section class="facts-section divider-slant-white" aria-label="Why Ocala drivers choose Auto Glass Plus">
  <div class="container">
    <div class="facts-grid">
      <div class="fact-item" data-animate>
        <div class="fact-number"><span data-counter="45">45</span></div>
        <div class="fact-label">Minute Average Install</div>
      </div>
      <div class="fact-item" data-animate>
        <div class="fact-number"><span data-counter="25">25</span><span>mi</span></div>
        <div class="fact-label">Mobile Service Radius</div>
      </div>
      <div class="fact-item" data-animate>
        <div class="fact-number"><span>Lifetime</span></div>
        <div class="fact-label">Workmanship Warranty</div>
      </div>
      <div class="fact-item" data-animate>
        <div class="fact-number"><span>Same-Day</span></div>
        <div class="fact-label">Mobile Appointments</div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ MID-PAGE CTA ============================ -->
<section class="cta-banner" aria-label="Book your mobile auto glass appointment">
  <div class="container">
    <h2 data-animate>Don't Let a Small Chip Become a Full Replacement</h2>
    <p data-animate>
      A chip the size of a quarter can spread across your whole windshield after one hot Ocala afternoon or
      a bump down I-75. Catch it early and most repairs cost less than your deductible. Call Auto Glass Plus
      and we'll come to you today.
    </p>
    <div class="hero-actions" style="justify-content:center;" data-animate>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg">
        <?php echo icon('phone', 18); ?> Call <?php echo escHtml($phone); ?>
      </a>
      <a href="#estimate-form" class="btn btn-outline-white btn-lg">Request a Free Quote</a>
    </div>
  </div>
</section>

<!-- ============================ ABOUT / PROCESS ============================ -->
<section class="section about-section numbered-section" data-num="02" aria-label="How Auto Glass Plus works">
  <div class="container">
    <div class="about-split">

      <div class="about-content" data-animate>
        <span class="eyebrow">The Auto Glass Plus Way</span>
        <h2>Your Neighbors in Ocala &mdash; Not a National Call Center</h2>
        <p>
          Auto Glass Plus is a locally owned auto glass shop run by Frank Catalanotto, serving drivers right
          here in Ocala and across Marion County. When you call, you reach people who know these roads &mdash;
          not a national chain routing you through a phone tree. We stand behind every windshield we set.
        </p>
        <p>
          We built the business around one idea: getting you back on the road safely without the hassle.
          That means mobile service at your home or job site, OEM-quality glass, honest pricing with no
          pressure, and insurance claims handled for you from start to finish.
        </p>

        <div class="process-steps">
          <div class="process-step">
            <div class="step-num">1</div>
            <div><h3>Call for a Free Quote</h3><p>Tell us the vehicle and the damage. We'll confirm the glass and give you a straight price &mdash; often less than your deductible.</p></div>
          </div>
          <div class="process-step">
            <div class="step-num">2</div>
            <div><h3>We Come To You</h3><p>Pick a time and place. Our mobile tech meets you at home, work, or wherever your vehicle is parked in the Ocala area.</p></div>
          </div>
          <div class="process-step">
            <div class="step-num">3</div>
            <div><h3>Expert Installation</h3><p>We set OEM-quality glass with proper prep and adhesive &mdash; most jobs done in about an hour, cleaned up when we leave.</p></div>
          </div>
          <div class="process-step">
            <div class="step-num">4</div>
            <div><h3>Insurance &amp; Warranty Handled</h3><p>We bill your insurer directly and back the work with a lifetime workmanship warranty. Then you drive away.</p></div>
          </div>
        </div>
      </div>

      <div class="about-media" data-animate>
        <span class="float-accent" aria-hidden="true"></span>
        <img src="/assets/images/shop-bay-professional-install.jpg"
             srcset="/assets/images/shop-bay-professional-install-480.webp 480w, /assets/images/shop-bay-professional-install-960.webp 960w"
             sizes="(max-width: 768px) 100vw, 45vw"
             alt="Auto Glass Plus vehicle inside a clean, professional Ocala service bay ready for glass installation"
             width="600" height="750" loading="lazy">
        <div class="about-badge">
          <div class="badge-big">Local</div>
          <div class="badge-small">Ocala Owned &amp; Operated</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================ TRUST / REVIEWS ============================ -->
<section class="section trust-section numbered-section" data-num="03" aria-label="Trusted by Ocala drivers">
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow" style="color:var(--color-accent);">Why Drivers Trust Us</span>
      <h2>Ocala Drivers Count on Auto Glass Plus</h2>
      <p>We've built our reputation one windshield at a time. Here's what sets our work apart &mdash; and where to read and leave real reviews.</p>
    </div>

    <div class="trust-grid">
      <div class="trust-card" data-animate>
        <div class="trust-icon"><?php echo icon('truck', 24); ?></div>
        <h3>Mobile Convenience</h3>
        <p>Same-day service that comes to your driveway or workplace anywhere in Ocala and the surrounding 25-mile area &mdash; no waiting room, no lost afternoon.</p>
      </div>
      <div class="trust-card" data-animate>
        <div class="trust-icon"><?php echo icon('shield-check', 24); ?></div>
        <h3>Insurance Made Easy</h3>
        <p>Most comprehensive policies cover glass with little to no deductible. We bill your insurer directly, so you skip the paperwork and out-of-pocket cost.</p>
      </div>
      <div class="trust-card" data-animate>
        <div class="trust-icon"><?php echo icon('badge-check', 24); ?></div>
        <h3>Warranty You Can Rely On</h3>
        <p>OEM-quality glass installed by experienced local techs, backed by a lifetime workmanship warranty plus the manufacturer's warranty on the glass.</p>
      </div>
    </div>

    <div class="trust-cta" data-animate>
      <a href="<?php echo escAttr($googleBusinessProfileUrl); ?>" class="btn btn-outline-white btn-lg" target="_blank" rel="noopener">
        <?php echo icon('star', 18); ?> Read Our Google Reviews
      </a>
      <a href="<?php echo escAttr($reviewRequestUrl); ?>" class="btn btn-accent btn-lg" target="_blank" rel="noopener">
        Leave Us a Review
      </a>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section faq-section numbered-section" data-num="04" aria-label="Auto glass FAQs">
  <div class="container">
    <div class="section-header" data-animate>
      <span class="eyebrow">Good Questions</span>
      <h2>Auto Glass Questions Ocala Drivers Ask</h2>
      <p>Straight answers on mobile service, insurance, timing, and warranties from the Auto Glass Plus team.</p>
    </div>

    <div class="faq-grid">
      <?php foreach ($faqs as $faq): ?>
      <div class="faq-item" data-animate>
        <div class="faq-icon"><?php echo icon('info', 20); ?></div>
        <div>
          <h3><?php echo escHtml($faq['question']); ?></h3>
          <p><?php echo escHtml($faq['answer']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ CLOSING CTA ============================ -->
<section class="section closing-cta divider-wave-top" aria-label="Get your auto glass fixed today">
  <svg class="divider-svg" viewBox="0 0 1440 100" preserveAspectRatio="none" aria-hidden="true">
    <path d="M0,40 C240,100 480,0 720,40 C960,80 1200,10 1440,50 L1440,0 L0,0 Z" style="fill:var(--color-white)"></path>
  </svg>
  <div class="container">
    <h2 data-animate>Ready to Get Back on the Road?</h2>
    <p data-animate>
      Chipped, cracked, or shattered &mdash; Auto Glass Plus brings the shop to you in Ocala with OEM-quality
      glass, direct insurance billing, and a lifetime workmanship warranty. Get a free estimate today.
    </p>
    <div class="hero-actions" data-animate>
      <a href="tel:+<?php echo $phoneRaw; ?>" class="btn btn-accent btn-lg">
        <?php echo icon('phone', 18); ?> Call <?php echo escHtml($phone); ?>
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">Request Free Estimate</a>
    </div>
  </div>
</section>

<!-- FAQPage schema (AI comprehension aid) -->
<?php echo generateFAQSchema($faqs); ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
