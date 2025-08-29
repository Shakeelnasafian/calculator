<?php
// calculator-config.php

if (!defined('ABSPATH')) {
    exit;
}

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('calculators-plugin', plugins_url('assets/calculators.css', __FILE__));
    wp_enqueue_script('alpinejs', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', [], null, true);
});

// Register calculator shortcode logic from separate file
require_once __DIR__ . '/calculator-shortcode.php';
