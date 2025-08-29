<?php
// calculator-shortcode.php

function netvio_calculator_shortcode($atts)
{
    // Define available calculators and their templates
    static $calculators = [
        'bmi' => 'bmi-calculator.php',
        'ideal-weight' => 'ideal-weight-calculator.php',
        'pace' => 'pace-calculator.php',
        'army-body-fat' => 'army-body-fat-calculator.php',
        'lean-body-mass' => 'lean-body-mass-calculator.php',
        'healthy-weight' => 'healthy-weight-calculator.php',
        'calories-burned' => 'calories-burned-calculator.php',
        'one-rep-max' => 'one-rep-max-calculator.php',
        'target-heart-rate' => 'target-heart-rate-calculator.php',
    ];

    $atts = shortcode_atts(['type' => 'bmi'], $atts);
    
    $type = $atts['type'];

    ob_start();

    if (isset($calculators[$type])) {
        include __DIR__ . '/templates/' . $calculators[$type];
    } else {
        echo '<div class="alert alert-warning">Unknown calculator type.</div>';
    }

    return ob_get_clean();
}

add_shortcode('calculator', 'netvio_calculator_shortcode');
