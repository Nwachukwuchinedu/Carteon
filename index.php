<?php
// index.php - Modernized Homepage
require_once 'utils/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = '';
    $page_description = SITE_DESCRIPTION;
    include 'components/head.php';
    ?>
</head>

<body data-theme="<?php echo get_theme(); ?>">
    <?php include 'components/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="hero-content" data-scroll data-stagger>
                <div class="badge" data-stagger-child>
                    <span>Next Generation Business Cards</span>
                </div>

                <h1 class="h1 typewriter" data-stagger-child>
                    Network <span class="text-gradient">Smarter</span><br>
                    Connect <span class="text-gradient">Instantly</span>
                </h1>

                <p class="hero-description" data-stagger-child>
                    Share your contact information with a simple tap. No apps, no typing, just seamless connections that leave a lasting impression.
                </p>

                <div class="hero-actions" data-stagger-child>
                    <a href="#pricing" class="cta-button primary btn-icon">
                        <i class="fas fa-id-card"></i>
                        <span>Get Your Card</span>
                    </a>
                    <a href="#how-it-works" class="cta-button secondary btn-icon">
                        <i class="fas fa-search"></i>
                        <span>See How It Works</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header" data-scroll>
                 <div class="badge" data-stagger-child>
                    <span>Key Benefits</span>
                </div>
                <h2 class="h2">Why Choose Carteon?</h2>
                <p class="section-subtitle">Designed for professionals who value efficiency and style</p>
            </div>

            <div class="features-grid">
                <div class="feature-card" data-scroll>
                    <div class="feature-icon">
                        <i class="fas fa-bolt fa-2x"></i>
                    </div>
                    <h3>One-Tap Sharing</h3>
                    <p>Share your contact information instantly with NFC technology. No typing, no errors.</p>
                </div>

                <div class="feature-card" data-scroll>
                    <div class="feature-icon">
                        <i class="fas fa-sync-alt fa-2x"></i>
                    </div>
                    <h3>Always Updated</h3>
                    <p>Change your details anytime. Your digital card updates automatically, no reprints needed.</p>
                </div>

                <div class="feature-card" data-scroll>
                    <div class="feature-icon">
                        <i class="fas fa-leaf fa-2x"></i>
                    </div>
                    <h3>Eco-Friendly</h3>
                    <p>One card replaces thousands of paper business cards. Sustainable networking for the modern professional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-header" data-scroll>
                 <div class="badge" data-stagger-child>
                    <span>Easy and Seamless</span>
                </div>
                <h2 class="h2">How It Works</h2>
                <p class="section-subtitle">Simple, fast, and incredibly effective</p>
            </div>

            <div class="steps">
                <div class="step" data-scroll>
                    <div class="step-number">1</div>
                    <h3>Tap</h3>
                    <p>Hold your Carteon card near any NFC-enabled smartphone</p>
                </div>

                <div class="step" data-scroll>
                    <div class="step-number">2</div>
                    <h3>Connect</h3>
                    <p>Your digital profile opens instantly in their browser</p>
                </div>

                <div class="step" data-scroll>
                    <div class="step-number">3</div>
                    <h3>Share</h3>
                    <p>They save your contact with one click, no typing required.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="section-header" data-scroll>
                <div class="badge" data-stagger-child>
                    <span>Pricing</span>
                </div>
                <h2 class="h2">Choose Your Card</h2>
                <p class="section-subtitle">Premium materials, exceptional quality</p>
            </div>

            <div class="pricing-grid">
                <div class="pricing-card" data-scroll>
                    <h3>PVC Classic</h3>
                    <div class="price">₦8,500</div>
                    <p class="price-period">one-time payment</p>

                    <ul class="features-list">
                        <li>Premium PVC Material</li>
                        <li>NFC Chip Technology</li>
                        <li>QR Code Backup</li>
                        <li>Digital Profile</li>
                        <li>Free Shipping</li>
                    </ul>

                    <a href="checkout.php?card=2" class="cta-button secondary fullwidth btn-icon">
                        <i class="fas fa-check"></i>
                        <span>Select Card</span>
                    </a>
                </div>

                <div class="pricing-card featured" data-scroll>
                    <h3>Metal Elite</h3>
                    <div class="price">₦12,000</div>
                    <p class="price-period">one-time payment</p>

                    <ul class="features-list">
                        <li>Premium Metal Finish</li>
                        <li>Advanced NFC Chip</li>
                        <li>QR Code Backup</li>
                        <li>Digital Profile</li>
                        <li>Priority Shipping</li>
                        <li>Lifetime Warranty</li>
                    </ul>

                    <a href="checkout.php?card=1" class="cta-button primary fullwidth btn-icon">
                        <i class="fas fa-star"></i>
                        <span>Select Card</span>
                    </a>
                </div>

                <div class="pricing-card" data-scroll>
                    <h3>Wood Craft</h3>
                    <div class="price">₦10,500</div>
                    <p class="price-period">one-time payment</p>

                    <ul class="features-list">
                        <li>Natural Wood Finish</li>
                        <li>NFC Chip Technology</li>
                        <li>QR Code Backup</li>
                        <li>Digital Profile</li>
                        <li>Free Shipping</li>
                        <li>Eco-Friendly</li>
                    </ul>

                    <a href="checkout.php?card=4" class="cta-button secondary fullwidth btn-icon">
                        <i class="fas fa-seedling"></i>
                        <span>Select Card</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq" id="faq">
        <div class="container container-narrow">
            <div class="section-header" data-scroll>
                 <div class="badge" data-stagger-child>
                    <span>FAQs</span>
                </div>
                <h2 class="h2">Frequently Asked Questions</h2>
                <p class="section-subtitle">Everything you need to know about Carteon</p>
            </div>

            <div class="faq-grid">
                <div class="faq-item" data-scroll>
                    <div class="faq-question">
                        <h3>Do CARTEON Cards work with all smartphones?</h3>
                        <div class="faq-toggle"></div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes. They work with all NFC-enabled smartphones, and each card also comes with a QR code at the back so anyone can connect with you, even if their phone doesn't support NFC.</p>
                    </div>
                </div>

                <div class="faq-item" data-scroll>
                    <div class="faq-question">
                        <h3>Can I update my details after I get my card?</h3>
                        <div class="faq-toggle"></div>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! You can edit your profile anytime without reprinting.</p>
                    </div>
                </div>

                <div class="faq-item" data-scroll>
                    <div class="faq-question">
                        <h3>What makes CARTEON better than paper business cards?</h3>
                        <div class="faq-toggle"></div>
                    </div>
                    <div class="faq-answer">
                        <p>Paper cards get lost, forgotten, or require manual typing to save contacts. With Carteon, your info is saved instantly into their phone, ensuring you're never forgotten.</p>
                    </div>
                </div>

                <div class="faq-item" data-scroll>
                    <div class="faq-question">
                        <h3>How do I share my details with someone who doesn't have NFC?</h3>
                        <div class="faq-toggle"></div>
                    </div>
                    <div class="faq-answer">
                        <p>Every Carteon Card has a QR code at the back. They can simply scan it with their camera and instantly access your profile.</p>
                    </div>
                </div>

                <div class="faq-item" data-scroll>
                    <div class="faq-question">
                        <h3>Do I need an app to use CARTEON Cards?</h3>
                        <div class="faq-toggle"></div>
                    </div>
                    <div class="faq-answer">
                        <p>No app is required. Just tap or scan, and your profile opens instantly on their phone browser.</p>
                    </div>
                </div>

                <div class="faq-item" data-scroll>
                    <div class="faq-question">
                        <h3>Can I include more than just my phone number?</h3>
                        <div class="faq-toggle"></div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! You can add your phone number, email, WhatsApp, Instagram, LinkedIn, website, portfolio, or even payment links.</p>
                    </div>
                </div>

                <div class="faq-item" data-scroll>
                    <div class="faq-question">
                        <h3>What if I change jobs or phone numbers?</h3>
                        <div class="faq-toggle"></div>
                    </div>
                    <div class="faq-answer">
                        <p>No problem. You can update your details anytime from your profile dashboard, and it syncs automatically.</p>
                    </div>
                </div>

                <div class="faq-item" data-scroll>
                    <div class="faq-question">
                        <h3>How durable are the cards?</h3>
                        <div class="faq-toggle"></div>
                    </div>
                    <div class="faq-answer">
                        <p>Very durable. Our metal cards are scratch-resistant and long-lasting, PVC cards are strong and flexible, and wooden cards are polished and reinforced.</p>
                    </div>
                </div>

                <div class="faq-item" data-scroll>
                    <div class="faq-question">
                        <h3>Can I order for my entire team or company?</h3>
                        <div class="faq-toggle"></div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We offer bulk orders and corporate packages with branded designs for companies, startups, and events.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="cta">
        <div class="container">
            <div class="section-header" data-scroll>
                 <div class="badge" data-stagger-child>
                    <span>Call to Action</span>
                </div>
                <h2 class="h2">Ready to Elevate Your Networking?</h2>
                <p>Join thousands of professionals who have made the switch to smart business cards.</p>
            </div>

            <div class="cta-actions" data-scroll>
                <a href="#pricing" class="cta-button primary btn-icon">
                    <i class="fas fa-rocket"></i>
                    <span>Get Your Card Now</span>
                </a>
                <a href="#how-it-works" class="cta-button outline btn-icon">
                    <i class="fas fa-book"></i>
                    <span>Learn More</span>
                </a>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="scroll-to-top" aria-label="Scroll to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/three-effects.js"></script>
</body>

</html>