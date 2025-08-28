<?php
/*
Plugin Name: Calculators
Description: Create calculators and use shortcodes to display them on the frontend. Built with Alpine.js and Bootstrap.
Version: 1.0
Author: Shakeel Ahmad
*/

if (!defined('ABSPATH')) exit;

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('calculators-plugin', plugins_url('assets/calculators.css', __FILE__));
    wp_enqueue_script('alpinejs', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', [], null, true);
});

// Register calculator shortcode
add_shortcode('calculator', function($atts) {
    $atts = shortcode_atts([
        'type' => 'bmi',
    ], $atts);
    ob_start();
    switch ($atts['type']) {
        case 'bmi':
            include __DIR__ . '/templates/bmi-calculator.php';
            break;
        case 'ideal-weight':
            include __DIR__ . '/templates/ideal-weight-calculator.php';
            break;
        case 'pace':
            include __DIR__ . '/templates/pace-calculator.php';
            break;
        case 'army-body-fat':
            include __DIR__ . '/templates/army-body-fat-calculator.php';
            break;
        case 'lean-body-mass':
            include __DIR__ . '/templates/lean-body-mass-calculator.php';
            break;
        case 'healthy-weight':
            include __DIR__ . '/templates/healthy-weight-calculator.php';
            break;
        case 'calories-burned':
            include __DIR__ . '/templates/calories-burned-calculator.php';
            break;
        case 'one-rep-max':
            include __DIR__ . '/templates/one-rep-max-calculator.php';
            break;
        case 'target-heart-rate':
            include __DIR__ . '/templates/target-heart-rate-calculator.php';
            break;
        default:
            echo '<div class="alert alert-warning">Unknown calculator type.</div>';
    }
    return ob_get_clean();
});

// Create plugin template directory if not exists
register_activation_hook(__FILE__, function() {
    $template_dir = plugin_dir_path(__FILE__) . 'templates';
    if (!file_exists($template_dir)) {
        mkdir($template_dir);
    }
});
