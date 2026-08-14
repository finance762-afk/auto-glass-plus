<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Accessibility Statement
 * ------------------------------------------------------------------ */
$currentPage = 'accessibility';

$pageTitle       = 'Accessibility Statement | Auto Glass Plus';
$pageDescription = 'Auto Glass Plus is committed to digital accessibility. Learn about our WCAG 2.1 conformance and how to report accessibility issues.';
$canonicalUrl    = $siteUrl . '/accessibility/';
$ogImage         = $siteUrl . '/assets/images/logo.png';

$companyName       = $siteName;
$companyState      = $address['state'];
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
          "name" => "Accessibility",
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
      <li aria-current="page">Accessibility</li>
    </ol>
  </div>
</nav>

<!-- Hero -->
<section class="hero--legal" aria-label="Accessibility Statement">
  <div class="hero__copy">
    <span class="eyebrow-label">Accessibility</span>
    <h1>Accessibility Statement</h1>
    <span class="section-subtitle">our commitment to digital inclusion</span>
    <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
  </div>
</section>

<!-- Content -->
<article class="legal-prose">

  <h2>1. Our Commitment</h2>
  <p><?php echo $companyName; ?> is committed to ensuring digital accessibility for people with disabilities. We continually improve the user experience for everyone and apply relevant accessibility standards to <?php echo $domain; ?>.</p>

  <h2>2. Conformance Status</h2>
  <p>This site is designed to conform with <strong>Web Content Accessibility Guidelines (WCAG) 2.1 Level AA</strong>. WCAG defines requirements for designers and developers to improve accessibility for people with disabilities.</p>
  <p>Our site <strong>partially conforms</strong> with WCAG 2.1 Level AA, meaning some content does not yet fully meet the standard. We are working to address all known issues.</p>

  <h2>3. Accessibility Features</h2>
  <p>Our website includes the following accessibility features:</p>
  <ul>
    <li><strong>Semantic HTML5 markup</strong> with proper landmark regions (header, nav, main, footer)</li>
    <li><strong>Skip-to-content link</strong> at the top of every page (press Tab on keyboard to reveal)</li>
    <li><strong>Visible keyboard focus indicators</strong> on all interactive elements (links, buttons, form fields)</li>
    <li><strong>Alt text</strong> on all meaningful images (decorative images marked with empty alt)</li>
    <li><strong>Sufficient color contrast</strong> for body text and interactive elements (WCAG AA minimum 4.5:1 for body text, 3:1 for large text)</li>
    <li><strong>Responsive design</strong> that works across screen sizes and zoom levels up to 200%</li>
    <li><strong>prefers-reduced-motion support</strong> — animations disabled for users who request reduced motion in their OS settings</li>
    <li><strong>ARIA labels</strong> on navigation and form elements for screen reader users</li>
    <li><strong>Form field labels</strong> associated with inputs (clicking the label focuses the input)</li>
    <li><strong>Logical heading structure</strong> (H1 → H2 → H3) for screen reader navigation</li>
  </ul>

  <h2>4. Known Issues</h2>
  <p>We are aware of these areas needing improvement:</p>
  <ul>
    <li><strong>Third-party embeds</strong> (Google Maps) may not fully meet WCAG standards. We provide alternative ways to access this information — call us at <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a> or email <a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a> for directions or location information.</li>
    <li><strong>Some animation effects</strong> may not fully respect prefers-reduced-motion in all contexts. We are auditing and refining these.</li>
  </ul>

  <h2>5. Feedback and Reporting Issues</h2>
  <p>If you encounter an accessibility barrier on this site, please tell us. We aim to respond to accessibility feedback within <strong>5 business days</strong>.</p>
  <p><strong>How to report an issue:</strong></p>
  <ul>
    <li>Email: <a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a></li>
    <li>Phone: <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a></li>
    <li>Mail: <?php echo $companyAddress; ?></li>
  </ul>
  <p>When reporting, please include:</p>
  <ul>
    <li>The page URL where you encountered the issue</li>
    <li>A description of the problem</li>
    <li>The assistive technology you were using (if applicable)</li>
  </ul>

  <h2>6. Alternative Contact Methods</h2>
  <p>If our website is not accessible to you, you can reach us by phone or mail. We will provide service information in alternative formats on request (large print, plain-text email, etc.).</p>

  <h2>7. Compatibility with Browsers and Assistive Technology</h2>
  <p>This site is designed to be compatible with the following assistive technologies and browsers:</p>
  <ul>
    <li>Recent versions of JAWS, NVDA, and VoiceOver screen readers</li>
    <li>Recent versions of Chrome, Firefox, Safari, and Edge browsers</li>
    <li>Browser zoom up to 200%</li>
    <li>Keyboard-only navigation (no mouse required)</li>
  </ul>

  <h2>8. Technical Specifications</h2>
  <p>Accessibility of this site relies on the following technologies:</p>
  <ul>
    <li>HTML5</li>
    <li>WAI-ARIA (Accessible Rich Internet Applications)</li>
    <li>CSS3</li>
    <li>JavaScript (progressively enhanced — core content accessible without JS)</li>
  </ul>

  <h2>9. Limitations and Alternatives</h2>
  <p>Despite our best efforts to ensure accessibility, there may be some limitations. If you encounter difficulty using any part of this site:</p>
  <ul>
    <li><strong>Contact us directly:</strong> We'll provide the information or service in an accessible format.</li>
    <li><strong>Phone service:</strong> All information on this site is also available via phone at <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a>.</li>
  </ul>

  <h2>10. Changes to This Statement</h2>
  <p>We may update this Accessibility Statement from time to time. The "Last Updated" date at the top will reflect the most recent change.</p>

  <h2>11. Contact Us</h2>
  <p>For accessibility questions or assistance:</p>
  <p>
    <strong><?php echo $companyName; ?></strong><br>
    Email: <a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a><br>
    Phone: <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a><br>
    Address: <?php echo $companyAddress; ?>
  </p>

  <div class="legal-disclaimer">
    This Accessibility Statement is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney and an accessibility consultant before publication.
  </div>

</article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
