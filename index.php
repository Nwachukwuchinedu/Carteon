<?php
// Include configuration file
require_once 'utils/config.php';

// Define variables for dynamic content
$pageTitle = SITE_TITLE;
$pageDescription = SITE_DESCRIPTION;
$companyName = COMPANY_NAME;
$currentYear = CURRENT_YEAR;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="<?php echo $pageDescription; ?>">
    <link rel="icon" href="assets/images/logo.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body data-theme="<?php echo $theme; ?>">
    <!-- Custom Cursor -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>

    <?php include 'components/header.php'; ?>

    <section id="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Connect Smarter. Share Instantly.</h1>
                <p>With <?php echo $companyName; ?> Cards, one tap is all it takes to share your details, close deals faster, and stay unforgettable.</p>
                <div class="hero-buttons">
                    <a href="#cta" class="btn primary"><i class="fas fa-shopping-cart"></i> Order Your Card</a>
                    <button class="btn secondary"><i class="fas fa-boxes"></i> Place a Bulk Order</button>
                </div>
            </div>
            <div class="hero-visual">
                <div class="smart-card-preview">
                    <div class="phone-mockup">
                        <div class="screen">
                            <div class="card-content">
                                <div class="profile-image">
                                    <div class="placeholder">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <h2>Sarah Chen</h2>
                                <p class="title">Product Manager</p>
                                <div class="contact-info">
                                    <p>Sarah Chen</p>
                                    <p>+234 801 234 5678</p>
                                    <p>sarah@example.com</p>
                                </div>
                                <button class="btn add-contact">Add to Contacts</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works">
        <div class="container">
            <h2>How It Works</h2>
            <p>Share your details instantly with a simple tap. No typing, no stress—just seamless connections.</p>
            <div class="steps-container">
                <div class="step-card">
                    <div class="step-icon">
                        <i class="fas fa-hand-point-up"></i>
                    </div>
                    <h3>1. Tap</h3>
                    <p>Hold your <?php echo $companyName; ?> Card near any NFC-enabled smartphone (mainly around the camera)</p>
                </div>
                <div class="step-card">
                    <div class="step-icon">
                        <i class="fas fa-link"></i>
                    </div>
                    <h3>2. Connect</h3>
                    <p>Your profile, contacts, or social links pop up instantly.</p>
                </div>
                <div class="step-card">
                    <div class="step-icon">
                        <i class="fas fa-save"></i>
                    </div>
                    <h3>3. Save</h3>
                    <p>They can view your website, social media pages and store your details directly in their phone, no typing.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="why-choose-us">
        <div class="container">
            <h2>Why Choose <?php echo $companyName; ?>?</h2>
            <p>Making Networking Effortless</p>
            <div class="features-container">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <h3>One-Time Investment</h3>
                    <p>Save money; no need to keep printing new cards.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <h3>Stress-Free Sharing</h3>
                    <p>No one has to type your number or risk spelling errors.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Works Everywhere</h3>
                    <p>NFC for modern smartphones + QR code for all others.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3>Eco-Friendly</h3>
                    <p>One card replaces thousands of paper cards.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="cta">
        <div class="container">
            <h2>Get Your Card Today</h2>
            <p>Join the future of networking with <?php echo $companyName; ?> Cards. One tap is all it takes to make a lasting impression.</p>
            <div class="cta-buttons">
                <a href="#complimentary-cards" class="btn primary"><i class="fas fa-bolt"></i> Order Now</a>
                <button class="btn secondary light"><i class="fas fa-calendar-check"></i> Book Design Call</button>
            </div>
        </div>
    </section>

    <section id="faq">
        <div class="container">
            <h2>FAQs</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do <?php echo $companyName; ?> Cards work with all smartphones?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes. They work with all NFC-enabled smartphones, and each card also comes with a QR code at the back so anyone can connect with you, even if their phone doesn't support NFC.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can I update my details after I get my card?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! You can edit your profile anytime without reprinting.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What makes <?php echo $companyName; ?> better than paper business cards?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Paper cards get lost, forgotten, or require manual typing to save contacts. With Carteon, your info is saved instantly into their phone, ensuring you're never forgotten.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How do I share my details with someone who doesn't have NFC?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Every Carteon Card has a QR code at the back. They can simply scan it with their camera and instantly access your profile.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do I need an app to use <?php echo $companyName; ?> Cards?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>No app is required. Just tap or scan, and your profile opens instantly on their phone browser.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can I include more than just my phone number?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! You can add your phone number, email, WhatsApp, Instagram, LinkedIn, website, portfolio, or even payment links.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What if I change jobs or phone numbers?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>No problem. You can update your details anytime from your profile dashboard, and it syncs automatically.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How durable are the cards?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Very durable. Our metal cards are scratch-resistant and long-lasting, PVC cards are strong and flexible, and wooden cards are polished and reinforced.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can I order for my entire team or company?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We offer bulk orders and corporate packages with branded designs for companies, startups, and events.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="complimentary-cards">
        <div class="container">
            <h2>Complimentary Cards</h2>
            <p>Choose from our selection of premium complimentary cards</p>
            <div class="cards-grid">
                <div class="card-item" data-card-id="1">
                    <div class="card-image">
                        <img src="assets/images/card1.jpg" alt="Metal Card">
                    </div>
                    <div class="card-content">
                        <h3>Metal Card</h3>
                        <p class="card-price">₦12,000</p>
                        <button class="btn primary card-select-btn">Select Card</button>
                    </div>
                </div>
                <div class="card-item" data-card-id="2">
                    <div class="card-image">
                        <img src="assets/images/card2.jpg" alt="PVC Black Card">
                    </div>
                    <div class="card-content">
                        <h3>PVC Black Card</h3>
                        <p class="card-price">₦8,500</p>
                        <button class="btn primary card-select-btn">Select Card</button>
                    </div>
                </div>
                <div class="card-item" data-card-id="3">
                    <div class="card-image">
                        <img src="assets/images/card3.jpg" alt="PVC White Card">
                    </div>
                    <div class="card-content">
                        <h3>PVC White Card</h3>
                        <p class="card-price">₦8,500</p>
                        <button class="btn primary card-select-btn">Select Card</button>
                    </div>
                </div>
                <div class="card-item" data-card-id="4">
                    <div class="card-image">
                        <img src="assets/images/card4.jpg" alt="Wood Card">
                    </div>
                    <div class="card-content">
                        <h3>Wood Card</h3>
                        <p class="card-price">₦10,500</p>
                        <button class="btn primary card-select-btn">Select Card</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="assets/js/main.js"></script>
</body>

</html>