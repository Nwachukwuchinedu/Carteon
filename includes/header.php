<?php
// Header include file
$theme = get_theme();
?>
<header id="page-header">
    <div class="container">
        <div class="logo">
            <a href="index.php">
                <img src="images/logo.png" alt="<?php echo COMPANY_NAME; ?> Logo" class="logo-image">
                <span class="logo-text"><?php echo COMPANY_NAME; ?></span>
            </a>
        </div>
        <nav class="nav-menu">
            <ul>
                <li><a href="#how-it-works">How It Works</a></li>
                <li><a href="#why-choose-us">Why Choose Us</a></li>
                <li><a href="#cta">Order Card</a></li>
                <li><a href="login.php" class="btn secondary nav-login">Login</a></li>
            </ul>
        </nav>
        <div class="theme-toggle">
            <button id="theme-toggle" aria-label="Toggle theme">
                <span class="sun-icon"><i class="fas fa-sun"></i></span>
                <span class="moon-icon"><i class="fas fa-moon"></i></span>
            </button>
        </div>
        <div class="mobile-menu-toggle" id="mobile-menu-button" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="mobile-menu" id="mobile-menu">
        <ul>
            <li><a href="#how-it-works">How It Works</a></li>
            <li><a href="#why-choose-us">Why Choose Us</a></li>
            <li><a href="#cta">Order Card</a></li>
            <li><a href="login.php">Login</a></li>
            <li class="theme-toggle-mobile">
                <button id="theme-toggle-mobile" aria-label="Toggle theme">
                    <span class="sun-icon"><i class="fas fa-sun"></i> Light Mode</span>
                    <span class="moon-icon"><i class="fas fa-moon"></i> Dark Mode</span>
                </button>
            </li>
        </ul>
    </div>
    <div class="mobile-menu-backdrop" id="mobile-menu-backdrop"></div>
</header>