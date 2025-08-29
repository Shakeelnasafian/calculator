<?php

/**
 * Plugin Name: Netvio-Calculators
 * Plugin URI:  https://github.com/Shakeelnasafian/netvio-calculators
 * Description: Create calculators and use shortcodes to display them on the frontend. Built with Alpine.js and Bootstrap.
 * Version:     1.0
 * Author:      Shakeel Ahmad
 * Author URI:  https://github.com/Shakeelnasafian
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: netvio-calculators-plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

// Activation & Uninstall Hooks 
function plugin_netvio_activate()
{
    // Flush rewrite rules on activation
    flush_rewrite_rules();

    $template_dir = plugin_dir_path(__FILE__) . 'templates';
    if (!file_exists($template_dir)) {
        mkdir($template_dir);
    }
}
register_activation_hook(__FILE__, 'plugin_netvio_activate');

function plugin_netvio_uninstall()
{
    // Remove plugin options, transients, or custom tables if any were created (none in this version)
    flush_rewrite_rules();
}
register_uninstall_hook(__FILE__, 'plugin_netvio_uninstall');

// Load plugin configuration (enqueue scripts, register shortcodes, etc.)
require_once __DIR__ . '/calculator-config.php';
