<?php
/**
 * config.php — Central site configuration for Auto Glass Plus
 * All site-wide variables live here. Included by head.php / nav.php / footer.php
 * and available to every page. Values sourced from build-plan.json.
 */

/* ------------------------------------------------------------------ *
 * Identity
 * ------------------------------------------------------------------ */
$slug     = 'auto-glass-plus';                 // exact build directory name
$cssVersion = '5';                             // bump on every framework.css change
$siteName = 'Auto Glass Plus';
$tagline  = 'Same-Day Mobile Auto Glass in Ocala';
$industry = 'Auto glass shop';

$phone          = '(352) 816-7221';            // display format
$phoneRaw       = '13528167221';               // tel: / sms: format (E.164 without +)
$phoneSecondary = '';
$email          = 'glashole@aol.com';

/* ------------------------------------------------------------------ *
 * Address / NAP
 * ------------------------------------------------------------------ */
$address = [
    'street' => '2528 NW 6th St',
    'city'   => 'Ocala',
    'state'  => 'FL',
    'zip'    => '34475',
];

/* Geo (from GBP map embed) */
$geo = [
    'lat' => 29.1920757,
    'lng' => -82.1667796,
];

/* ------------------------------------------------------------------ *
 * Domain / URLs
 * No production_domain in build-plan.json -> default to preview host.
 * ------------------------------------------------------------------ */
$domain  = 'auto-glass-plus.pageone.cloud';
$siteUrl = 'https://' . $domain;               // always a valid absolute URL
// NOTE: $canonicalUrl is set per-page before including head.php.

/* ------------------------------------------------------------------ *
 * SEO
 * ------------------------------------------------------------------ */
$primaryKeyword    = 'Glass Repair';
$secondaryKeywords = [];

/* ------------------------------------------------------------------ *
 * Services (derived from content description; services[] empty in plan)
 * ------------------------------------------------------------------ */
$services = [
    [
        'name'        => 'Auto Windshield Repair',
        'slug'        => 'windshield-repair',
        'description' => 'Fast chip and crack repair that restores your windshield’s strength and clarity before small damage spreads.',
        'keywords'    => ['windshield repair', 'chip repair', 'crack repair'],
    ],
    [
        'name'        => 'Auto Windshield Replacement',
        'slug'        => 'windshield-replacement',
        'description' => 'Full windshield replacement using OEM-quality glass, completed on-site with a lifetime workmanship warranty.',
        'keywords'    => ['windshield replacement', 'auto glass replacement'],
    ],
    [
        'name'        => 'Auto Side Window Replacement',
        'slug'        => 'side-window-replacement',
        'description' => 'Replacement of broken door and side windows with proper fit and finish to keep your vehicle secure.',
        'keywords'    => ['side window replacement', 'door glass replacement'],
    ],
    [
        'name'        => 'Auto Rear Window Replacement',
        'slug'        => 'rear-window-replacement',
        'description' => 'Rear windshield and back glass replacement, including defroster-line glass, handled by experienced technicians.',
        'keywords'    => ['rear window replacement', 'back glass replacement'],
    ],
];

/* ------------------------------------------------------------------ *
 * Service Areas
 * ------------------------------------------------------------------ */
$serviceAreas = [
    'Ocala, FL',
];

/* ------------------------------------------------------------------ *
 * Social / Integrations
 * ------------------------------------------------------------------ */
$socialLinks = [];

$googleBusinessProfileUrl = 'https://maps.google.com/?cid=7011998992634926838';
$gbpPlaceId       = 'ChIJQ3uImysr5ogR9tZmwe6fT2E';
$gbpMapEmbed      = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4349.3018402654525!2d-82.1667796!3d29.1920757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e62b2b9b887b43%3A0x614f9feec166d6f6!2sAuto%20Glass%20Plus!5e1!3m2!1sen!2sus!4v1786731268632!5m2!1sen!2sus" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>';
$directionsUrl    = 'https://www.google.com/maps/dir/?api=1&destination=place_id:ChIJQ3uImysr5ogR9tZmwe6fT2E';
$reviewRequestUrl = 'https://search.google.com/local/writereview?placeid=ChIJQ3uImysr5ogR9tZmwe6fT2E';

$acceptsSms = false;

/* ------------------------------------------------------------------ *
 * Analytics (placeholder — replace post-launch)
 * ------------------------------------------------------------------ */
$googleAnalyticsId = 'G-XXXXXXXXXX';

/* ------------------------------------------------------------------ *
 * Brand Colors
 * design.colors.extracted_from_logo = true but no values supplied in the
 * plan; these defaults are finalized during Phase 0/2 logo analysis.
 * ------------------------------------------------------------------ */
$colors = [
    'primary'   => '#0B5FA5',
    'secondary' => '#0A2540',
    'accent'    => '#F5A623',
];

/* ------------------------------------------------------------------ *
 * Company History
 * ------------------------------------------------------------------ */
$ownerName       = 'Frank Catalanotto';
$yearEstablished = 1985;   // sourced from client's branded apparel ("AUTO Glass Plus — Since 1985")
$yearsInBusiness = (int) date('Y') - $yearEstablished;

$businessHours = 'Monday–Friday: 8:00 AM – 6:00 PM';

/* ------------------------------------------------------------------ *
 * Forms
 * ------------------------------------------------------------------ */
$formAction = 'https://formsubmit.co/glashole@aol.com';

/* ------------------------------------------------------------------ *
 * Tier
 * ------------------------------------------------------------------ */
$tier = 'standard';
