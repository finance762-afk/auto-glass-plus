<?php
/**
 * functions.php — Helper functions for Auto Glass Plus
 * Loaded by every page via config.php
 */

/**
 * Check if current page is active
 * @param string $page Page identifier
 * @return bool
 */
function isActivePage($page) {
    global $currentPage;
    return isset($currentPage) && $currentPage === $page;
}

/**
 * Format phone number for display
 * @param string $phone Phone number string
 * @return string Formatted phone number
 */
function formatPhone($phone) {
    // Remove all non-digit characters
    $cleaned = preg_replace('/[^0-9]/', '', $phone);
    
    // Format as (XXX) XXX-XXXX
    if (strlen($cleaned) === 10) {
        return '(' . substr($cleaned, 0, 3) . ') ' . substr($cleaned, 3, 3) . '-' . substr($cleaned, 6);
    } elseif (strlen($cleaned) === 11 && $cleaned[0] === '1') {
        return '(' . substr($cleaned, 1, 3) . ') ' . substr($cleaned, 4, 3) . '-' . substr($cleaned, 7);
    }
    
    return $phone;
}

/**
 * Generate service slug from service name
 * @param string $name Service name
 * @return string URL-safe slug
 */
function getServiceSlug($name) {
    return strtolower(str_replace([' ', '&'], ['-', 'and'], trim($name)));
}

/**
 * Generate area slug from city name
 * @param string $city City name
 * @return string URL-safe slug
 */
function getAreaSlug($city) {
    // Remove state suffix if present (e.g., "Ocala, FL" -> "Ocala")
    $city = explode(',', $city)[0];
    return strtolower(str_replace([' ', '&'], ['-', 'and'], trim($city)));
}

/**
 * Generate LocalBusiness schema for a service page
 * @param array $service Service data array
 * @return string JSON-LD script tag
 */
function generateServiceSchema($service) {
    global $siteName, $siteUrl, $phone, $address, $geo;
    
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Service",
        "name" => $service['name'],
        "description" => $service['description'],
        "provider" => [
            "@type" => "AutoRepair",
            "name" => $siteName,
            "url" => $siteUrl,
            "telephone" => $phone,
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => $address['street'],
                "addressLocality" => $address['city'],
                "addressRegion" => $address['state'],
                "postalCode" => $address['zip']
            ]
        ],
        "areaServed" => [
            "@type" => "City",
            "name" => $address['city'] . ", " . $address['state']
        ]
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}

/**
 * Generate FAQPage schema from FAQ array
 * @param array $faqs Array of FAQ items (each with 'question' and 'answer')
 * @return string JSON-LD script tag
 */
function generateFAQSchema($faqs) {
    $mainEntity = [];
    
    foreach ($faqs as $faq) {
        $mainEntity[] = [
            "@type" => "Question",
            "name" => $faq['question'],
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => $faq['answer']
            ]
        ];
    }
    
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "FAQPage",
        "mainEntity" => $mainEntity
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}

/**
 * Generate meta tags for a page
 * @param string $title Page title
 * @param string $description Meta description
 * @param string $canonical Canonical URL
 * @return string Meta tags HTML
 */
function generateMetaTags($title, $description, $canonical) {
    global $siteUrl;
    
    $ogImage = $siteUrl . '/assets/images/logo.png';
    
    $html = '';
    $html .= '<title>' . htmlspecialchars($title) . '</title>' . "\n";
    $html .= '<meta name="description" content="' . htmlspecialchars($description) . '">' . "\n";
    $html .= '<link rel="canonical" href="' . htmlspecialchars($canonical) . '">' . "\n";
    $html .= '<meta property="og:title" content="' . htmlspecialchars($title) . '">' . "\n";
    $html .= '<meta property="og:description" content="' . htmlspecialchars($description) . '">' . "\n";
    $html .= '<meta property="og:url" content="' . htmlspecialchars($canonical) . '">' . "\n";
    $html .= '<meta property="og:image" content="' . htmlspecialchars($ogImage) . '">' . "\n";
    
    return $html;
}

/**
 * Load and return inline SVG icon
 * @param string $name Icon name (without .svg extension)
 * @param int $size Icon size in pixels (optional, defaults to 24)
 * @return string SVG markup
 */
function icon($name, $size = 24) {
    $iconPath = $_SERVER['DOCUMENT_ROOT'] . '/references/lucide-icons/' . $name . '.svg';

    if (file_exists($iconPath)) {
        $svg = file_get_contents($iconPath);
        // Add aria-hidden and size attributes
        $svg = str_replace('<svg', '<svg aria-hidden="true" width="' . $size . '" height="' . $size . '"', $svg);
        return $svg;
    }

    // Fallback if icon not found
    return '<svg aria-hidden="true" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/></svg>';
}

/**
 * Escape HTML for safe output
 * @param string $str String to escape
 * @return string Escaped string
 */
function escHtml($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * Escape attribute value for safe output
 * @param string $str String to escape
 * @return string Escaped string
 */
function escAttr($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
