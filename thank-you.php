<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ------------------------------------------------------------------ *
 * Page-level setup — Thank You Page
 * ------------------------------------------------------------------ */
$currentPage = 'thank-you';
$cssVersion  = '2';

$pageTitle       = 'Thank You | Auto Glass Plus';
$pageDescription = 'Thank you for contacting Auto Glass Plus. We\'ll be in touch soon with your auto glass estimate.';
$canonicalUrl    = $siteUrl . '/thank-you/';
$ogType          = 'website';
$ogImage         = $siteUrl . '/assets/images/logo.png';
$noindex         = true; // Don't index thank-you pages

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>

<style>
/* ============================================================
   Thank You Page
   ============================================================ */
.hero--thank-you {
  min-height: 80vh;
  background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-primary) 100%);
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}
.hero--thank-you .container {
  position: relative;
  z-index: 2;
  max-width: 42rem;
}
.hero--thank-you .checkmark {
  width: 80px;
  height: 80px;
  border-radius: var(--radius-full);
  background: rgba(var(--color-accent-rgb, 245, 166, 35), 0.20);
  color: var(--color-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-6);
  animation: scaleIn 0.4s ease;
}
@keyframes scaleIn {
  from { transform: scale(0.5); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}
.hero--thank-you h1 {
  color: var(--color-white);
  font-size: var(--fs-h1);
  margin-bottom: var(--space-4);
}
.hero--thank-you p {
  color: rgba(255, 255, 255, 0.88);
  font-size: var(--font-size-lg);
  line-height: 1.6;
  margin-bottom: var(--space-6);
}
.next-steps {
  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: var(--radius-lg);
  padding: var(--space-8);
  text-align: left;
  margin-bottom: var(--space-8);
}
.next-steps h2 {
  color: var(--color-white);
  font-size: var(--font-size-xl);
  margin-bottom: var(--space-4);
}
.next-steps ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-3);
}
.next-steps li {
  color: rgba(255, 255, 255, 0.90);
  font-size: var(--font-size-base);
  padding-left: var(--space-6);
  position: relative;
}
.next-steps li::before {
  content: "✓";
  color: var(--color-accent);
  font-weight: 700;
  position: absolute;
  left: 0;
  top: 0;
}
.thank-you-actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-4);
  justify-content: center;
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================ THANK YOU HERO ============================ -->
<section class="hero hero--thank-you" aria-label="Thank you for contacting us">
  <div class="container">
    <div class="checkmark">
      <?php echo icon('check-circle', 48); ?>
    </div>
    <h1>We Got Your Message!</h1>
    <p>
      Thank you for reaching out to Auto Glass Plus. We've received your request and will
      be in touch within one business day — usually much sooner.
    </p>

    <div class="next-steps">
      <h2>What Happens Next?</h2>
      <ul>
        <li>We'll review your auto glass repair or replacement request</li>
        <li>A member of our team will call or email you with a free estimate</li>
        <li>We'll schedule a convenient time to bring our mobile service to you</li>
        <li>Most windshield replacements are completed in about an hour</li>
      </ul>
    </div>

    <p style="font-size:var(--font-size-base); margin-bottom:var(--space-6);">
      <strong>Need immediate help?</strong> Call us now at
      <a href="tel:+<?php echo $phoneRaw; ?>" style="color:var(--color-accent); text-decoration:underline; font-weight:600;"><?php echo escHtml($phone); ?></a>.
    </p>

    <div class="thank-you-actions">
      <a href="/" class="btn btn-accent btn-lg">Return to Homepage</a>
      <a href="/services/" class="btn btn-outline-white btn-lg">Browse Services</a>
      <a href="<?php echo escAttr($reviewRequestUrl); ?>" class="btn btn-outline-white btn-lg" target="_blank" rel="noopener">
        <?php echo icon('star', 18); ?> Leave Us a Review
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
