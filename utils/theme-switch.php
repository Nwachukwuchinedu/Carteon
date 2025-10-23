<?php
// Theme switch handler

// Include configuration
require_once 'utils/config.php';

// Check if theme parameter is set
if (isset($_GET['theme'])) {
    $theme = $_GET['theme'];

    // Validate theme
    if ($theme == 'light' || $theme == 'dark') {
        // Set theme cookie
        set_theme($theme);
    }
}

// Redirect back to the referring page or homepage
$redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
header('Location: ' . $redirect_url);
exit();
