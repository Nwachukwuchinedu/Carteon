<?php

/**
 * Initialization file for Carteon website
 * This file should be included at the top of all PHP files
 */

// Include configuration
require_once 'config/config.php';

// Set default timezone
date_default_timezone_set('UTC');

// Set default character set
header('Content-Type: text/html; charset=utf-8');
