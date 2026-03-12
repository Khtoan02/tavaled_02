<?php
/**
 * The Template for displaying all single posts
 */

if (!class_exists('App\Controllers\SingleController')) {
    require_once get_template_directory() . '/functions.php';
}

$controller = new \App\Controllers\SingleController();
$controller->index();
