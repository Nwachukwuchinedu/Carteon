<?php
// Site configuration file

// Site settings
define('SITE_NAME', 'Carteon');
define('SITE_TITLE', 'Carteon Digital | Smart Business Cards');
define('SITE_DESCRIPTION', 'Connect smarter. Share instantly. Redefining networking with NFC-powered digital business cards.');

// Company information
define('COMPANY_NAME', 'CARTEON');
define('COMPANY_TAGLINE', 'Luxury NFC business cards—crafted in metal, PVC (black & white), and wood—for professionals who demand elegance, innovation, and seamless connectivity.');

// Contact information
define('CONTACT_EMAIL', 'info@carteon.com');
define('CONTACT_PHONE', '+234 801 234 5678');

// Social media links (placeholders)
define('SOCIAL_FACEBOOK', '#');
define('SOCIAL_TWITTER', '#');
define('SOCIAL_LINKEDIN', '#');
define('SOCIAL_INSTAGRAM', '#');

// Colors (for reference in case we need to use them in PHP)
define('PRIMARY_COLOR', '#d4a574');
define('ACCENT_COLOR', '#3b2f27');

// Current year (for footer)
define('CURRENT_YEAR', date('Y'));

// Theme settings
define('DEFAULT_THEME', 'light');

// Include functions file
require_once 'utils/functions.php';
