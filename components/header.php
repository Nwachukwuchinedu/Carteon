<?php
// components/header.php - Modern Header
$theme = get_theme();
?>
<header id="page-header" class="header">
    <div class="container">
        <div class="logo">
            <a href="/" class="logo-link">
                <div class="logo-mark">
                    <img src="assets/images/logo-light.png" alt="<?php echo COMPANY_NAME; ?> Logo" class="logo-image logo-image-light">
                    <img src="assets/images/logo-dark.png" alt="<?php echo COMPANY_NAME; ?> Logo" class="logo-image logo-image-dark">
                </div>
                <span class="logo-text"><?php echo COMPANY_NAME; ?></span>
            </a>
        </div>

        <nav class="nav-menu">
            <ul class="nav-list">
                <li><a href="#features" class="nav-link">Features</a></li>
                <li><a href="#how-it-works" class="nav-link">How It Works</a></li>
                <li><a href="#pricing" class="nav-link">Pricing</a></li>
                <li><a href="#faq" class="nav-link">FAQ</a></li>
                <li><a href="login" class="nav-link login-btn">Sign In</a></li>
            </ul>
        </nav>

        <div class="header-actions">
            <button id="theme-toggle" class="theme-toggle" aria-label="Toggle theme">
                <div class="theme-icon">
                    <div class="sun">
                        <i class="fas fa-sun"></i>
                    </div>
                    <div class="moon">
                        <i class="fas fa-moon"></i>
                    </div>
                </div>
            </button>

            <button class="mobile-menu-toggle" id="mobile-menu-button" aria-label="Toggle menu">
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-content">
            <nav class="mobile-nav">
                <a href="#features" class="mobile-nav-link">Features</a>
                <a href="#how-it-works" class="mobile-nav-link">How It Works</a>
                <a href="#pricing" class="mobile-nav-link">Pricing</a>
                <a href="#faq" class="mobile-nav-link">FAQ</a>
                <a href="login" class="mobile-nav-link">Sign In</a>
            </nav>
        </div>
    </div>
</header>