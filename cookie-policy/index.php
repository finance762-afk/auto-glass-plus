<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Cookie Policy
 * ------------------------------------------------------------------ */
$currentPage = 'cookie-policy';

$pageTitle       = 'Cookie Policy | Auto Glass Plus';
$pageDescription = 'How Auto Glass Plus uses cookies and similar technologies on our website. Browser cookie settings and opt-out options.';
$canonicalUrl    = $siteUrl . '/cookie-policy/';
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
          "name" => "Cookie Policy",
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
      <li aria-current="page">Cookie Policy</li>
    </ol>
  </div>
</nav>

<!-- Hero -->
<section class="hero--legal" aria-label="Cookie Policy">
  <div class="hero__copy">
    <span class="eyebrow-label">Legal</span>
    <h1>Cookie Policy</h1>
    <span class="section-subtitle">how we use cookies and tracking</span>
    <p class="hero__phone">Last Updated: <?php echo $lastUpdated; ?></p>
  </div>
</section>

<!-- Content -->
<article class="legal-prose">

  <h2>1. What Are Cookies?</h2>
  <p>Cookies are small text files stored on your device when you visit a website. They are used to make websites work more efficiently and provide information to site owners about how visitors use the site.</p>

  <h2>2. Cookies We Use</h2>

  <h3>Strictly Necessary</h3>
  <p>Essential for site functionality (form submission, security). These cannot be disabled without breaking core site features.</p>
  <p><strong>Examples:</strong></p>
  <ul>
    <li>Session cookies during form submission</li>
    <li>Cookie banner dismissal preference (localStorage)</li>
    <li>Security tokens for form spam protection</li>
  </ul>

  <h3>Analytics (Google Analytics 4)</h3>
  <p>We use Google Analytics 4 to understand how visitors use our site. GA4 sets cookies prefixed with <code>_ga</code> and <code>_gid</code>. Data collected includes:</p>
  <ul>
    <li>Pages visited and time spent on each page</li>
    <li>How you arrived at our site (referral source)</li>
    <li>Device type, browser, and screen resolution</li>
    <li>Geographic location (city/region level, not precise address)</li>
  </ul>
  <p>All GA4 data is anonymized via IP truncation. We do not combine GA4 data with personally identifiable information from contact forms.</p>

  <h3>Third-Party Embeds</h3>
  <p>Our site may embed tools and content from third parties (Google Maps for location, review widgets, manufacturer sites, etc.). These services may set their own cookies subject to their own privacy policies:</p>
  <ul>
    <li><strong>Google Maps:</strong> cookies for map rendering and user preferences</li>
    <li><strong>Formsubmit.co:</strong> contact form processing (does not set persistent cookies)</li>
  </ul>

  <h2>3. How to Control Cookies</h2>
  <p>Most browsers allow you to view, delete, or block cookies through browser settings. You can:</p>
  <ul>
    <li><strong>Block all cookies:</strong> Note that site functionality may break (forms may not work, preferences not saved)</li>
    <li><strong>Block third-party cookies:</strong> Allows first-party site cookies but blocks external trackers</li>
    <li><strong>Delete cookies:</strong> Clear all stored cookies (you'll see the cookie banner again on your next visit)</li>
  </ul>

  <p><strong>Browser-specific instructions:</strong></p>
  <ul>
    <li><strong>Google Chrome:</strong> Settings → Privacy and security → Cookies and other site data</li>
    <li><strong>Mozilla Firefox:</strong> Settings → Privacy & Security → Cookies and Site Data</li>
    <li><strong>Safari (macOS):</strong> Preferences → Privacy → Manage Website Data</li>
    <li><strong>Microsoft Edge:</strong> Settings → Cookies and site permissions → Manage and delete cookies</li>
  </ul>

  <h2>4. Opt Out of Google Analytics</h2>
  <p>You can opt out of GA4 tracking site-wide by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics Opt-out Browser Add-on</a>.</p>

  <h2>5. Our Cookie Notice</h2>
  <p>We display a brief banner notifying visitors of our cookie use. Once dismissed, the banner is suppressed for future visits via localStorage (a browser storage mechanism similar to cookies but local to your device).</p>
  <p>You can re-enable the banner by clearing your browser's site data for <?php echo $domain; ?>.</p>

  <h2>6. Changes to This Policy</h2>
  <p>We may update this Cookie Policy from time to time. The "Last Updated" date at the top will reflect the most recent change. Material changes will be prominently posted on the site.</p>

  <h2>7. Contact Us</h2>
  <p>For questions about cookies or this policy:</p>
  <p>
    <strong><?php echo $companyName; ?></strong><br>
    Email: <a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a><br>
    Phone: <a href="tel:<?php echo $companyPhoneE164; ?>"><?php echo $companyPhone; ?></a><br>
    Address: <?php echo $companyAddress; ?>
  </p>

  <div class="legal-disclaimer">
    This Cookie Policy is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication.
  </div>

</article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
