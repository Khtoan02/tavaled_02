<?php
/**
 * Main Template File
 */
use App\Controllers\HomeController;

// Fallback just in case functions.php wasn't loaded (not typical, but safe)
if (!class_exists('App\Controllers\HomeController')) {
    require_once get_template_directory() . '/functions.php';
}

$controller = new HomeController();
$controller->index();
