<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Terms of Service
 * ------------------------------------------------------------------ */
$currentPage = 'terms';
$cssVersion  = '3';

$pageTitle       = 'Terms of Service | Auto Glass Plus';
$pageDescription = 'Terms of Service for Auto Glass Plus. Policies governing use of our website and auto glass repair services in Ocala, FL.';
$canonicalUrl    = $siteUrl . '/terms/';
$ogImage         = $siteUrl . '/assets/images/logo.png';

$companyName       = $siteName;
$companyEntityType = 'Limited Liability Company';
$companyState      = $address['state'];
$companyCounty     = 'Marion';
$companyEmail      = $email;
$companyPhone      = $phone;
$companyPhoneE164  = '+' . $phoneRaw;
$companyAddress    = $address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip'];
$lastUpdated       = date('F j, Y');

/* Schema — WebPage + BreadcrumbList */
$schemaGraph = [
  "@context" => "https://schema.org",
  "@graph" => [
    [
      "@type" => "WebPage",
      "@id" => $canonicalUrl . "#webpage",
      "url" => $canonicalUrl,
      "name" => $pageTitle,
      "description" => $pageDescription
    ],
    [
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
          "name" => "Terms of Service",
          "item" => $canonicalUrl
        ]
      ]
    ]
  ]
];

$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<?php echo $schemaMarkup; ?>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li class="breadcrumb-sep" aria-hidden="true">›</li>
      <li aria-current="page">Terms of Service</li>
    </ol>
  </div>
</nav>

<!-- Hero -->
<section class="hero--legal" aria-label="Terms of Service">
  <div class="hero__copy">
    <span class="eyebrow-label">Legal</span>
    <h1>Terms of Service</h1>
    <span class="section-subtitle">our policies and your responsibilities</span>
    <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
  </div>
</section>

<!-- Content -->
<article class="legal-prose">

  <h2>1. Agreement to Terms</h2>
  <p>By accessing or using <?php echo $domain; ?> or engaging <?php echo $companyName; ?> for services, you agree to these Terms of Service. If you do not agree, do not use this site or our services.</p>

  <h2>2. Use of This Website</h2>
  <ul>
    <li>You may use this Site for personal, non-commercial purposes to learn about our services and contact us.</li>
    <li>You may not use the Site for unlawful purposes, attempt to access non-public systems, scrape or copy content without written permission, submit false information through our contact form, or use automated systems to extract data.</li>
  </ul>

  <h2>3. Service Estimates and Quotes</h2>
  <p>All estimates are based on information provided and conditions visible at the time of inspection. Final pricing may differ if:</p>
  <ul>
    <li>Project scope changes (e.g., additional damage discovered during windshield removal)</li>
    <li>Hidden damage is discovered (structural issues, rust, or frame damage)</li>
    <li>Glass or material costs change between estimate and service date</li>
    <li>Vehicle-specific requirements differ from initial assumptions (OEM vs. aftermarket glass, recalibration needs)</li>
  </ul>
  <p>Verbal quotes are non-binding. Only written, signed contracts or invoices constitute a final agreement.</p>

  <h2>4. Auto Glass Services</h2>
  <ul>
    <li>Work is performed by <?php echo $companyName; ?> technicians and qualified contractors.</li>
    <li>We comply with applicable <?php echo $companyState; ?> state and federal motor vehicle safety standards.</li>
    <li>All technicians carry appropriate insurance as required by <?php echo $companyState; ?> law.</li>
    <li>We are licensed and insured to operate in the state of <?php echo $companyState; ?>.</li>
  </ul>

  <h2>5. Warranties</h2>
  <p>Workmanship warranties are detailed in your service invoice or contract. Manufacturer warranties on glass and materials are provided by those manufacturers and pass through to you upon service completion.</p>
  <p>Warranties exclude:</p>
  <ul>
    <li>Acts of God, vandalism, theft, or accidents beyond manufacturer ratings</li>
    <li>Damage from neglect, improper use, or alteration by others</li>
    <li>Pre-existing conditions disclosed prior to work</li>
    <li>Failure to follow post-installation care instructions (e.g., driving before adhesive cure time)</li>
  </ul>

  <h2>6. Payment Terms</h2>
  <p>Payment terms are specified in your service invoice or contract. Standard terms include:</p>
  <ul>
    <li>Payment due upon service completion for cash/check/card customers</li>
    <li>Direct billing to insurance carrier where coverage is confirmed in advance</li>
    <li>Customer responsible for any deductible or non-covered portions</li>
  </ul>
  <p>We accept check, cash, credit/debit card, and direct insurance billing. Past-due balances may accrue interest as permitted by <?php echo $companyState; ?> law.</p>

  <h2>7. Cancellation</h2>
  <p>Cancellation terms:</p>
  <ul>
    <li>Cancellation with 24+ hours' notice: no charge</li>
    <li>Cancellation within 24 hours of scheduled appointment: may incur service call fee</li>
    <li>Cancellation after technician en route: service call fee applies</li>
    <li>Cancellation after glass ordered: customer responsible for glass cost unless returnable</li>
  </ul>

  <h2>8. Insurance Claim Work</h2>
  <p>For insurance-covered windshield replacement, payment terms are typically structured around your insurance carrier's payment schedule. We do NOT serve as a public adjuster or legal representative. We provide repair estimates and complete approved repairs only. Negotiation of claim values and policy interpretation is the policyholder's responsibility.</p>
  <p>We bill insurance directly as a courtesy when coverage is verified in advance. The customer remains responsible for any amounts not covered by insurance (deductible, non-covered services, upgraded materials).</p>

  <h2>9. Limitation of Liability</h2>
  <p>To the maximum extent permitted by <?php echo $companyState; ?> law, <?php echo $companyName; ?>'s total liability for any claim related to the Site or our services shall not exceed the amount you paid for the specific service giving rise to the claim. We are not liable for indirect, incidental, special, or consequential damages.</p>

  <h2>10. Intellectual Property</h2>
  <p>All content on this Site — text, graphics, photographs, logos — is owned by <?php echo $companyName; ?> or used with permission, and is protected by copyright. You may not reproduce, distribute, or create derivative works without written permission.</p>

  <h2>11. Governing Law and Disputes</h2>
  <p>These Terms are governed by the laws of the State of <?php echo $companyState; ?> without regard to conflict-of-laws principles. Any disputes shall be resolved in the state or federal courts located in <?php echo $companyCounty; ?> County, <?php echo $companyState; ?>.</p>

  <h2>12. Changes to These Terms</h2>
  <p>We may update these Terms at any time. The "Last Updated" date will reflect the most recent version. Continued use of the Site after updates constitutes acceptance of revised Terms.</p>

  <h2>13. Contact Us</h2>
  <p>For questions about these Terms of Service:</p>
  <p>
    <strong><?php echo $companyName; ?></strong><br>
    Email: <a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a><br>
    Phone: <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a><br>
    Address: <?php echo $companyAddress; ?>
  </p>

  <div class="legal-disclaimer">
    This document is provided as a general template. We recommend reviewing with a licensed <?php echo $companyState; ?> attorney before publication.
  </div>

</article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
