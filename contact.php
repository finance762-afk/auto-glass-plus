<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Contact
 * ------------------------------------------------------------------ */
$currentPage = 'contact';
$cssVersion  = '2';

$pageTitle       = 'Contact Auto Glass Plus | Free Auto Glass Estimates in Ocala, FL';
$pageDescription = 'Contact Auto Glass Plus for same-day mobile windshield repair and replacement in Ocala, FL. Call (352) 816-7221 or request a free estimate online. Insurance billing handled.';
$canonicalUrl    = $siteUrl . '/contact/';
$ogImage          = $siteUrl . '/assets/images/hero-mobile-glass-ocala.jpg';

/* BreadcrumbList Schema */
$schemaGraph = [
  "@context" => "https://schema.org",
  "@graph" => [
    ["@type" => "WebPage", "@id" => $canonicalUrl . "#webpage", "url" => $canonicalUrl, "name" => $pageTitle, "description" => $pageDescription],
    ["@type" => "BreadcrumbList", "itemListElement" => [
      ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => $siteUrl . '/'],
      ["@type" => "ListItem", "position" => 2, "name" => "Contact", "item" => $canonicalUrl],
    ]],
  ]
];
$schemaMarkup = '<script type="application/ld+json">' . json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================
   Contact Page — page-specific design system
   ============================================================ */
:root {
  --space-xs: var(--space-2);
  --space-sm: var(--space-3);
  --space-md: var(--space-6);
  --space-lg: var(--space-8);
  --space-xl: var(--space-12);
  --space-2xl: var(--space-16);
  --color-text: var(--color-gray-dark);
}

.contact-hero {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
  color: white;
  padding-top: calc(var(--nav-height, 80px) + var(--space-2xl));
  padding-bottom: var(--space-2xl);
  text-align: center;
}
.contact-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.5rem, 5vw, 3.5rem);
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.contact-hero__accent {
  font-family: var(--font-accent);
  font-size: 1.5rem;
  color: var(--color-accent);
  display: block;
  margin-bottom: var(--space-sm);
}
.contact-hero p {
  font-size: 1.15rem;
  max-width: 60ch;
  margin: 0 auto var(--space-lg);
  opacity: 0.95;
}

.contact-content {
  padding: var(--space-2xl) var(--space-lg);
  background: var(--color-light);
}
.contact-grid {
  max-width: var(--max-width, 1200px);
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-xl);
}
@media (max-width: 968px) {
  .contact-grid {
    grid-template-columns: 1fr;
  }
}

.contact-form-card {
  background: white;
  padding: var(--space-xl);
  border-radius: var(--radius, 8px);
  box-shadow: var(--shadow-lg, 0 10px 40px rgba(0,0,0,0.1));
}
.contact-form-card h2 {
  font-family: var(--font-heading);
  font-size: 2rem;
  color: var(--color-primary);
  margin-bottom: var(--space-md);
}

.form-field {
  margin-bottom: var(--space-md);
  position: relative;
}
.form-field input,
.form-field select,
.form-field textarea {
  width: 100%;
  padding: 1rem;
  border: 2px solid var(--color-border, #e0e0e0);
  border-radius: var(--radius, 8px);
  font-family: var(--font-body);
  font-size: 1rem;
  transition: border-color var(--transition);
  background: white;
}
.form-field input:focus,
.form-field select:focus,
.form-field textarea:focus {
  outline: none;
  border-color: var(--color-primary);
}
.form-field label {
  display: block;
  font-weight: 600;
  color: var(--color-text);
  margin-bottom: 0.5rem;
  font-size: 0.95rem;
}
.form-field textarea {
  min-height: 120px;
  resize: vertical;
}
.form-field select {
  cursor: pointer;
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%230B5FA5' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 1rem center;
  background-size: 20px;
  padding-right: 3rem;
}

/* THREE CONSENT CHECKBOXES (v2.1 — Formsubmit.co standard) */
.form-consent-fieldset {
  border: 1px solid var(--color-border, #e0e0e0);
  border-radius: var(--radius, 8px);
  padding: var(--space-md);
  margin-bottom: var(--space-md);
  background: var(--color-light);
}
.form-consent-legend {
  font-family: var(--font-heading);
  font-weight: 700;
  color: var(--color-primary);
  font-size: 1.05rem;
  padding: 0 0.5rem;
}
.form-consent-item {
  display: flex;
  align-items: flex-start;
  gap: var(--space-sm);
  margin-bottom: var(--space-md);
  cursor: pointer;
}
.form-consent-item:last-child {
  margin-bottom: 0;
}
.form-consent-item input[type="checkbox"] {
  width: 20px;
  height: 20px;
  margin-top: 2px;
  flex-shrink: 0;
  accent-color: var(--color-primary);
  cursor: pointer;
}
.form-consent-item .consent-label {
  font-size: 0.9rem;
  line-height: 1.5;
  color: var(--color-text);
}
.form-consent-item .consent-label a {
  color: var(--color-primary);
  text-decoration: underline;
}
.form-consent-item .consent-label strong {
  font-weight: 700;
  color: var(--color-primary);
}
.form-consent-required {
  background: rgba(var(--color-accent-rgb, 245, 166, 35), 0.1);
  padding: var(--space-sm);
  border-radius: var(--radius, 8px);
  border: 1px solid rgba(var(--color-accent-rgb, 245, 166, 35), 0.3);
}
.required-star {
  color: var(--color-accent);
  font-weight: 700;
}

.btn-submit {
  width: 100%;
  background: var(--color-primary);
  color: white;
  padding: 1rem 2rem;
  border: none;
  border-radius: var(--radius, 8px);
  font-family: var(--font-body);
  font-weight: 700;
  font-size: 1.05rem;
  cursor: pointer;
  transition: all var(--transition);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
}
.btn-submit:hover {
  background: var(--color-primary-dark);
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.contact-info-card {
  background: white;
  padding: var(--space-xl);
  border-radius: var(--radius, 8px);
  box-shadow: var(--shadow-lg, 0 10px 40px rgba(0,0,0,0.1));
}
.contact-info-card h2 {
  font-family: var(--font-heading);
  font-size: 2rem;
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
}
.contact-item {
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  margin-bottom: var(--space-lg);
  padding-bottom: var(--space-lg);
  border-bottom: 1px solid var(--color-border, #e0e0e0);
}
.contact-item:last-child {
  border-bottom: none;
  margin-bottom: 0;
  padding-bottom: 0;
}
.contact-item svg {
  color: var(--color-accent);
  flex-shrink: 0;
  margin-top: 4px;
}
.contact-item-content h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  color: var(--color-primary);
  margin-bottom: 0.5rem;
}
.contact-item-content p {
  font-size: 1rem;
  line-height: 1.6;
  color: var(--color-text);
  margin: 0;
}
.contact-item-content a {
  color: var(--color-primary);
  text-decoration: none;
  transition: color var(--transition);
}
.contact-item-content a:hover {
  color: var(--color-accent);
  text-decoration: underline;
}

.map-section {
  padding: var(--space-2xl) var(--space-lg);
  background: white;
}
.map-section h2 {
  font-family: var(--font-heading);
  font-size: 2.5rem;
  color: var(--color-primary);
  text-align: center;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.map-embed {
  max-width: var(--max-width, 1200px);
  margin: 0 auto;
  border-radius: var(--radius, 8px);
  overflow: hidden;
  box-shadow: var(--shadow-lg, 0 10px 40px rgba(0,0,0,0.1));
}
.map-embed iframe {
  width: 100%;
  height: 450px;
  border: none;
  display: block;
}
.map-cta {
  text-align: center;
  margin-top: var(--space-lg);
}
.btn-directions {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 1rem 2rem;
  background: var(--color-primary);
  color: white;
  border-radius: var(--radius, 8px);
  font-family: var(--font-body);
  font-weight: 700;
  text-decoration: none;
  transition: all var(--transition);
}
.btn-directions:hover {
  background: var(--color-primary-dark);
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}
</style>

<?php echo $schemaMarkup; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- Contact Hero -->
<section class="contact-hero">
  <span class="contact-hero__accent">get in touch</span>
  <h1>Contact Auto Glass Plus</h1>
  <p>Ready to schedule same-day mobile auto glass service? Call us now or submit the form below for a free estimate. We handle insurance billing and offer lifetime workmanship warranties.</p>
</section>

<!-- Contact Content -->
<section class="contact-content">
  <div class="contact-grid">

    <!-- Contact Form -->
    <div class="contact-form-card">
      <h2>Request a Free Estimate</h2>

      <form action="<?php echo escAttr($formAction); ?>" method="POST">

        <!-- Honeypot spam protection -->
        <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">

        <!-- Formsubmit.co directives -->
        <input type="hidden" name="_next" value="<?php echo escAttr($siteUrl); ?>/thank-you">
        <input type="hidden" name="_captcha" value="false">
        <input type="hidden" name="_template" value="table">
        <input type="hidden" name="_subject" value="New lead from <?php echo escAttr($siteName); ?>">
        <input type="hidden" name="_cc" value="CustomerService@pageoneinsights.com">

        <!-- Consent tracking -->
        <input type="hidden" name="consent_version" value="v2.1">
        <input type="hidden" name="consent_page" value="<?php echo escAttr($_SERVER['REQUEST_URI']); ?>">

        <div class="form-field">
          <label for="contact-name">Your Name <span class="required-star">*</span></label>
          <input type="text" name="name" id="contact-name" required>
        </div>

        <div class="form-field">
          <label for="contact-email">Email <span class="required-star">*</span></label>
          <input type="email" name="email" id="contact-email" required>
        </div>

        <div class="form-field">
          <label for="contact-phone">Phone <span class="required-star">*</span></label>
          <input type="tel" name="phone" id="contact-phone" required>
        </div>

        <div class="form-field">
          <label for="contact-service">Service Needed</label>
          <select name="service" id="contact-service">
            <option value="">Select a service...</option>
            <?php foreach ($services as $service): ?>
            <option value="<?php echo escAttr($service['name']); ?>"><?php echo escHtml($service['name']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-field">
          <label for="contact-message">Message</label>
          <textarea name="message" id="contact-message" rows="4" placeholder="Tell us about your auto glass needs..."></textarea>
        </div>

        <!-- THREE CONSENT CHECKBOXES (v2.1 standard — REQUIRED) -->
        <fieldset class="form-consent-fieldset">
          <legend class="form-consent-legend">Communication Consent</legend>

          <label class="form-consent-item">
            <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
            <span class="consent-label">
              <strong>Email updates (optional):</strong> I agree to receive emails from
              <?php echo escHtml($siteName); ?> about my inquiry, services, promotions, and news. I understand I can unsubscribe anytime via the link in any email
              or by emailing <?php echo escHtml($email); ?>. Message frequency varies.
            </span>
          </label>

          <label class="form-consent-item">
            <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
            <span class="consent-label">
              <strong>SMS/Text messages (optional):</strong> I agree to receive text messages from
              <?php echo escHtml($siteName); ?> at the phone number I provided. Message types may include appointment reminders, service updates, and promotional
              offers. Message frequency varies. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help.
              <strong>Consent is not a condition of purchase.</strong>
            </span>
          </label>

          <label class="form-consent-item form-consent-required">
            <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
            <span class="consent-label">
              I have read and agree to the
              <a href="/privacy-policy/">Privacy Policy</a>
              and
              <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span>
            </span>
          </label>

        </fieldset>

        <button type="submit" class="btn-submit">
          <?php echo icon('send', 20); ?>
          Send Message
        </button>

      </form>
    </div>

    <!-- Contact Info -->
    <div class="contact-info-card">
      <h2>Get In Touch</h2>

      <div class="contact-item">
        <?php echo icon('phone', 24); ?>
        <div class="contact-item-content">
          <h3>Call Us</h3>
          <p><a href="tel:+<?php echo $phoneRaw; ?>"><?php echo escHtml($phone); ?></a></p>
          <p style="font-size: 0.9rem; opacity: 0.8; margin-top: 0.5rem;">Same-day service available</p>
        </div>
      </div>

      <div class="contact-item">
        <?php echo icon('mail', 24); ?>
        <div class="contact-item-content">
          <h3>Email</h3>
          <p><a href="mailto:<?php echo escAttr($email); ?>"><?php echo escHtml($email); ?></a></p>
          <p style="font-size: 0.9rem; opacity: 0.8; margin-top: 0.5rem;">We typically respond within 1 business day</p>
        </div>
      </div>

      <div class="contact-item">
        <?php echo icon('map-pin', 24); ?>
        <div class="contact-item-content">
          <h3>Location</h3>
          <p>
            <?php echo escHtml($address['street']); ?><br>
            <?php echo escHtml($address['city']); ?>, <?php echo escHtml($address['state']); ?> <?php echo escHtml($address['zip']); ?>
          </p>
        </div>
      </div>

      <div class="contact-item">
        <?php echo icon('clock', 24); ?>
        <div class="contact-item-content">
          <h3>Hours</h3>
          <p><?php echo escHtml($businessHours); ?></p>
          <p style="font-size: 0.9rem; opacity: 0.8; margin-top: 0.5rem;">Emergency service available by appointment</p>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- Map Section -->
<section class="map-section">
  <h2>Find Us in Ocala</h2>
  <div class="map-embed">
    <?php echo $gbpMapEmbed; ?>
  </div>
  <div class="map-cta">
    <a href="<?php echo escAttr($directionsUrl); ?>" class="btn-directions" target="_blank" rel="noopener">
      <?php echo icon('navigation', 20); ?>
      Get Directions
    </a>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
