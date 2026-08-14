<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Primary SEO -->
  <title><?php echo isset($pageTitle) ? $pageTitle : $siteName . ' | ' . $primaryKeyword . ' in ' . $address['city'] . ', ' . $address['state']; ?></title>
  <meta name="description" content="<?php echo isset($metaDescription) ? $metaDescription : $siteName . ' provides professional ' . strtolower($primaryKeyword) . ' services in ' . $address['city'] . ', ' . $address['state'] . '. Same-day mobile service. Call ' . $phone . ' for a free estimate.'; ?>">
  <link rel="canonical" href="<?php echo isset($canonicalUrl) ? $canonicalUrl : $siteUrl . '/'; ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="<?php echo isset($ogType) ? $ogType : 'website'; ?>">
  <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : $siteName . ' | ' . $primaryKeyword . ' in ' . $address['city']; ?>">
  <meta property="og:description" content="<?php echo isset($metaDescription) ? $metaDescription : $siteName . ' provides professional auto glass repair and replacement in ' . $address['city'] . ', ' . $address['state'] . '.'; ?>">
  <meta property="og:url" content="<?php echo isset($canonicalUrl) ? $canonicalUrl : $siteUrl . '/'; ?>">
  <meta property="og:image" content="<?php echo isset($ogImage) ? $ogImage : $siteUrl . '/assets/images/og-image.jpg'; ?>">
  <meta property="og:site_name" content="<?php echo $siteName; ?>">
  <meta property="og:locale" content="en_US">

  <!-- NO meta keywords tag (deprecated, harmful SEO) -->
  <!-- NO Twitter/X Card tags (no discovery value for local home service) -->

  <!-- Self-hosted fonts (v6.2 — NO Google Fonts CDN) -->
  <link rel="preload" href="/assets/fonts/bricolage-grotesque.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo isset($cssVersion) ? $cssVersion : '1'; ?>">

  <!-- Hero image preload (if provided) -->
  <?php if (isset($heroImagePreload) && $heroImagePreload): ?>
  <link rel="preload" as="image" href="<?php echo escAttr($heroImagePreload); ?>" fetchpriority="high">
  <?php endif; ?>

  <!-- Google Analytics (replace with actual ID post-launch) -->
  <?php if (isset($googleAnalyticsId) && $googleAnalyticsId !== 'G-XXXXXXXXXX'): ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalyticsId; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?php echo $googleAnalyticsId; ?>');
  </script>
  <?php endif; ?>

  <!-- Noindex directive (for thank-you, legal pages, etc.) -->
  <?php if (isset($noindex) && $noindex === true): ?>
  <meta name="robots" content="noindex, follow">
  <?php endif; ?>

  <!-- LocalBusiness Schema (homepage only) -->
  <?php if (!isset($currentPage) || $currentPage === 'home'): ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "AutoRepair",
    "@id": "<?php echo $siteUrl; ?>/#organization",
    "name": "<?php echo $siteName; ?>",
    "url": "<?php echo $siteUrl; ?>",
    "telephone": "+<?php echo $phoneRaw; ?>",
    "email": "<?php echo $email; ?>",
    "description": "<?php echo $siteName; ?> provides professional auto glass repair and replacement services in <?php echo $address['city']; ?>, <?php echo $address['state']; ?>. Same-day mobile service available. Windshield repair, windshield replacement, side window replacement, and rear window replacement.",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $address['street']; ?>",
      "addressLocality": "<?php echo $address['city']; ?>",
      "addressRegion": "<?php echo $address['state']; ?>",
      "postalCode": "<?php echo $address['zip']; ?>",
      "addressCountry": "US"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": <?php echo $geo['lat']; ?>,
      "longitude": <?php echo $geo['lng']; ?>
    },
    "hasMap": "<?php echo $googleBusinessProfileUrl; ?>",
    "openingHours": "Mo-Fr 08:00-18:00",
    "image": "<?php echo $siteUrl; ?>/assets/images/og-image.jpg",
    "priceRange": "$$",
    "areaServed": [
      <?php foreach ($serviceAreas as $index => $area): ?>
      {
        "@type": "City",
        "name": "<?php echo trim(explode(',', $area)[0]); ?>",
        "addressRegion": "<?php echo $address['state']; ?>"
      }<?php echo ($index < count($serviceAreas) - 1) ? ',' : ''; ?>
      <?php endforeach; ?>
    ],
    "makesOffer": [
      <?php foreach ($services as $index => $service): ?>
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "<?php echo $service['name']; ?>",
          "description": "<?php echo $service['description']; ?>"
        }
      }<?php echo ($index < count($services) - 1) ? ',' : ''; ?>
      <?php endforeach; ?>
    ]
  }
  </script>
  <?php endif; ?>
</head>
<body>
