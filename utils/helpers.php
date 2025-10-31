<?php

/**
 * Helper functions for the Carteon website
 */

/**
 * Redirect to a specific page
 */
function redirect($url)
{
    header("Location: $url");
    exit();
}

/**
 * Sanitize user input
 */
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Generate a CSRF token
 */
function generate_csrf_token()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function verify_csrf_token($token)
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Get the current page name
 */
function get_current_page()
{
    $page = basename($_SERVER['PHP_SELF']);
    return str_replace('.php', '', $page);
}

/**
 * Check if the current page is active
 */
function is_active_page($page)
{
    return get_current_page() === $page;
}

/**
 * Format currency
 */
function format_currency($amount, $currency = '₦')
{
    return $currency . number_format($amount, 2);
}

/**
 * Get product details by product key
 */
function get_product_details($product_key)
{
    $products = [
        'pvc-classic' => [
            'title' => 'PVC Classic Card',
            'description' => 'Durable PVC with reliable NFC',
            'price' => 8500,
            'image' => 'assets/img/cards/card1.jpg',
            'features' => [
                'NFC Technology',
                'QR Code Backup',
                'Digital Profile'
            ]
        ],
        'metal-elite' => [
            'title' => 'Metal Elite Card',
            'description' => 'Premium metal finish with advanced NFC',
            'price' => 12000,
            'image' => 'assets/img/cards/card2.jpg',
            'features' => [
                'Premium Metal Finish',
                'Advanced NFC Chip',
                'QR Code Backup',
                'Digital Profile',
                'Lifetime Warranty'
            ]
        ],
        'wood-craft' => [
            'title' => 'Wood Craft Card',
            'description' => 'Natural wood finish with NFC technology',
            'price' => 10500,
            'image' => 'assets/img/cards/card3.jpg',
            'features' => [
                'Natural Wood Finish',
                'NFC Chip Technology',
                'QR Code Backup',
                'Digital Profile',
                'Eco-Friendly'
            ]
        ]
    ];

    return isset($products[$product_key]) ? $products[$product_key] : null;
}
