<?php

/**
 * Configuration file for Carteon website
 */

// Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Define base path
define('BASE_PATH', dirname(__DIR__));

// Include helper functions
require_once BASE_PATH . '/utils/helpers.php';

// Database configuration (if needed in the future)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'saasty');

// Site configuration
define('SITE_NAME', 'Carteon');
define('SITE_URL', 'http://localhost/saasty');

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
