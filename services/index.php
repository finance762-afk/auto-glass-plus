<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Services Main
 * ------------------------------------------------------------------ */
$currentPage = 'services';
$cssVersion  = '1';

$pageTitle       = 'Auto Glass Services in Ocala, FL | Auto Glass Plus';
$metaDescription = 'Auto Glass Plus offers mobile windshield repair, windshield replacement, side window replacement, and rear window replacement throughout Ocala, FL. Same-day service available.';
$canonicalUrl    = $siteUrl . '/services/';
$ogType          = 'website';
$ogImage         = $siteUrl . '/assets/images/shop-bay-professional-install.jpg';

/* Icon map per service slug */
$serviceIcons = [
    'windshield-repair'        => 'wrench',
    'windshield-replacement'   => 'car',
    'side-window-replacement'  => 'truck',
    'rear-window-replacement'  => 'hammer',
];

/* Photo map per service slug (real client photos on disk) */
$servicePhotos = [
    'windshield-repair'       => ['file' => 'windshield-repair.jpg',      'alt' => 'Glossy sports car with a clear, undamaged windshield after chip repair at Auto Glass Plus in Ocala, FL'],
    'windshield-replacement'  => ['file' => 'windshield-replacement.jpg', 'alt' => 'Vehicle with the windshield removed and cowl exposed during a windshield replacement at Auto Glass Plus in Ocala, FL'],
    'side-window-replacement' => ['file' => 'side-window-replacement.jpg','alt' => 'SUV with the rear side door glass removed for a side window replacement by Auto Glass Plus in Ocala, FL'],
    'rear-window-replacement' => ['file' => 'rear-window-replacement.jpg','alt' => 'Rear window back glass ready for installation during a rear window replacement at Auto Glass Plus in Ocala, FL'],
];

/* Service card bullet points (benefit-driven, 3 each) */
$serviceBullets = [
    'windshield-repair'       => ['Stops cracks from spreading', 'Often less than your deductible', 'Restores factory strength'],
    'windshield-replacement'  => ['OEM-quality glass installed', 'Done in about an hour', 'Lifetime workmanship warranty'],
    'side-window-replacement' => ['Door and quarter glass', 'Vacuumed clean of debris', 'Keeps your vehicle secure'],
    'rear-window-replacement' => ['Defroster-line back glass', 'Precise factory-fit seal', 'Insurance billing handled'],
];

$tints = ['card-tint-1', 'card-tint-2', 'card-tint-3'];

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
        ]
    ]
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<script type="application/ld+json">
<?php echo json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>


<style>
/* ============================================================
   Services Main — page-specific design system
   ============================================================ */
:root {
  --color-text: var(--color-gray-dark);
  --color-accent-rgb: 245, 166, 35;
  --color-card-tint-1: rgba(var(--color-primary-rgb), 0.08);
  --color-card-tint-2: rgba(var(--color-secondary-rgb), 0.06);
  --color-card-tint-3: rgba(var(--color-accent-rgb), 0.10);
  --color-card-tint-neutral: var(--color-light);
}

/* ---------- Hero ---------- */
.hero--services {
  min-height: 50vh;
  background: linear-gradient(135deg,
    var(--color-secondary) 0%,
    var(--color-primary) 100%);
  color: var(--color-white);
  text-align: center;
  display: flex; align-items: center; justify-content: center;
  padding: clamp(4rem, 12vh, 8rem) clamp(1rem, 4vw, 2rem) clamp(3rem, 8vh, 5rem);
  position: relative; overflow: hidden;
}
.hero--services::after {
  content: '';
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E");
  mix-blend-mode: overlay;
}
.hero--services .hero-inner {
  position: relative; z-index: 2;
  max-width: 800px; margin: 0 auto;
}
.hero--services h1 {
  font-size: var(--fs-h1); line-height: 1.1; margin-bottom: var(--space-4);
}
.hero--services .hero-answer {
  font-size: var(--font-size-lg); line-height: 1.7;
  max-width: 60ch; margin: 0 auto var(--space-8);
  color: rgba(255, 255, 255, 0.92);
}
.hero--services .btn { margin: 0 var(--space-2); }

/* ---------- Services Grid ---------- */
.services-section { padding: var(--space-16) 0; background: var(--color-white); }
.section-header { text-align: center; margin-bottom: var(--space-12); }
.section-header .eyebrow {
  display: block; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 700;
  font-size: var(--font-size-sm); color: var(--color-primary); margin-bottom: var(--space-2);
}
.section-header h2 {
  font-size: var(--fs-h2); line-height: 1.2; margin-bottom: var(--space-4);
}
.section-header h2 .text-accent { color: var(--color-accent); }
.answer-block {
  max-width: 60ch; margin: var(--space-4) auto 0;
  font-size: var(--font-size-lg); line-height: 1.7; color: var(--color-gray-dark);
}

/* Services Grid (required-components.md pattern) */
.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(min(100%, 320px), 1fr));
  gap: var(--space-8);
  max-width: var(--bp-wide, 1200px);
  margin: 0 auto;
}

.service-card-with-image {
  background: var(--color-white);
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-md);
  transition: transform var(--transition), box-shadow var(--transition);
  display: flex; flex-direction: column;
  border: 1px solid var(--color-border);
}
.service-card-with-image:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}

.service-card__image {
  position: relative;
  height: 220px;
  overflow: hidden;
}
.service-card__image img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform 0.4s var(--ease-out);
}
.service-card-with-image:hover .service-card__image img {
  transform: scale(1.08);
}

.service-card__body {
  padding: var(--space-6);
  flex: 1;
  display: flex; flex-direction: column;
}

.service-card__icon {
  width: 48px; height: 48px;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  color: var(--color-white);
  display: inline-flex; align-items: center; justify-content: center;
  margin-bottom: var(--space-4);
}
.service-card__icon svg { width: 24px; height: 24px; }

.service-card__body h3 {
  font-size: var(--font-size-xl);
  margin-bottom: var(--space-3);
  color: var(--color-dark);
}

.service-card__desc {
  color: var(--color-gray-dark);
  font-size: var(--font-size-base);
  line-height: 1.6;
  margin-bottom: var(--space-4);
}

.service-card__body ul {
  list-style: none; padding: 0; margin: 0 0 var(--space-5);
  flex: 1;
}
.service-card__body ul li {
  padding-left: var(--space-6);
  margin-bottom: var(--space-2);
  position: relative;
  color: var(--color-gray-dark);
  font-size: var(--font-size-sm);
}
.service-card__body ul li::before {
  content: '';
  position: absolute; left: 0; top: 0.5em;
  width: 16px; height: 16px;
  background: var(--color-accent);
  mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E") center / contain no-repeat;
  -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E") center / contain no-repeat;
}

.service-card__cta {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  padding: var(--space-3) var(--space-5);
  background: var(--color-primary);
  color: var(--color-white);
  border-radius: var(--radius-md);
  text-decoration: none;
  font-weight: 600;
  font-size: var(--font-size-sm);
  transition: background var(--transition), transform var(--transition);
}
.service-card__cta:hover {
  background: var(--color-primary-dark);
  transform: translateX(4px);
}
.service-card__cta svg { width: 16px; height: 16px; }

/* Tinted backgrounds */
.card-tint-1 { background: var(--color-card-tint-1) !important; }
.card-tint-2 { background: var(--color-card-tint-2) !important; }
.card-tint-3 { background: var(--color-card-tint-3) !important; }

/* Responsive adjustments */
@media (max-width: 768px) {
  .services-grid { grid-template-columns: 1fr; gap: var(--space-6); }
}
</style>
