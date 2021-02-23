<?php

define('GOOD_MAGAZINE_OPT_DIR', get_template_directory() . '/inc/theme-options/');
define('GOOD_MAGAZINE_OPT_DIR_URI_IMAGES', get_template_directory_uri() . '/inc/theme-options/images/');
define('GOOD_MAGAZINE_OPT_DIR_URI_JS', get_template_directory_uri() . '/inc/theme-options/js/');
define('GOOD_MAGAZINE_OPT_DIR_URI_CSS', get_template_directory_uri() . '/inc/theme-options/css/');

/** Necessary Styles & Scripts for customizer controls */
function nobel_magazine_customizer_script() {
    wp_enqueue_script('nobel-magazine-customizer-chosen-script', GOOD_MAGAZINE_OPT_DIR_URI_JS . 'chosen.jquery.js', array("jquery"), '1.4.1', true);
    wp_enqueue_script('select2', GOOD_MAGAZINE_OPT_DIR_URI_JS . 'select2.min.js', array("jquery"), '4.0.13', true);
    wp_enqueue_script('wp-color-picker-alpha', GOOD_MAGAZINE_OPT_DIR_URI_JS . 'wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), '1.0.2', true);
    wp_enqueue_script('nobel-magazine-customizer-script', GOOD_MAGAZINE_OPT_DIR_URI_JS . 'customizer-controls.js', array('jquery', 'jquery-ui-datepicker'), '1.0.0', true);

    wp_enqueue_style('elementor-icons', GOOD_MAGAZINE_OPT_DIR_URI_CSS . 'elementor-icons/css/elementor-icons.min.css', array(), '5.6.2');
    wp_enqueue_style('materialdesignicons', GOOD_MAGAZINE_OPT_DIR_URI_CSS . 'materialdesignicons.css', array(), '4.4.0');
    wp_enqueue_style('icofont', GOOD_MAGAZINE_OPT_DIR_URI_CSS . 'icofont.css', array(), '1.0.0');
    wp_enqueue_style('eleganticons', GOOD_MAGAZINE_OPT_DIR_URI_CSS . 'eleganticons.css', array(), '1.00');
    wp_enqueue_style('nobel-magazine-customizer-chosen-style', GOOD_MAGAZINE_OPT_DIR_URI_CSS . 'chosen.css');
    wp_enqueue_style('select2', GOOD_MAGAZINE_OPT_DIR_URI_CSS . 'select2.min.css');
    wp_enqueue_style('nobel-magazine-customizer-style', GOOD_MAGAZINE_OPT_DIR_URI_CSS . 'customizer-controls.css', array('wp-color-picker'), '1.0.0');
}

add_action('customize_controls_enqueue_scripts', 'nobel_magazine_customizer_script');

/** Helper Functions */
require GOOD_MAGAZINE_OPT_DIR . 'includes/helpers.php';
require GOOD_MAGAZINE_OPT_DIR . 'includes/fonts.php';

/** Customizer Theme Options */
function nobel_magazine_theme_options($wp_customize) {
    /** Custom Controls */
    require GOOD_MAGAZINE_OPT_DIR . 'custom-controls/custom-controls.php';

    /** Register Control Type */
    $wp_customize->register_control_type('Nobel_Magazine_Background_Image');
    $wp_customize->register_control_type('Nobel_Magazine_Tab');
    $wp_customize->register_control_type('Nobel_Magazine_Dimensions_Control');
    $wp_customize->register_control_type('Nobel_Magazine_Responsive_Range_Slider');
    $wp_customize->register_control_type('Nobel_Magazine_Sortable');
    $wp_customize->register_control_type('Nobel_Magazine_Tab');
    $wp_customize->register_section_type('Nobel_Magazine_Toggle_Section');

    /** Theme Options Sanitizations */
    require GOOD_MAGAZINE_OPT_DIR . 'includes/sanitization.php';

    /** Theme Options */
    require GOOD_MAGAZINE_OPT_DIR . 'options/general-options.php'; // General Options
    require GOOD_MAGAZINE_OPT_DIR . 'options/header-options.php'; // Header Options
    require GOOD_MAGAZINE_OPT_DIR . 'options/footer-options.php'; // Footer Options
    require GOOD_MAGAZINE_OPT_DIR . 'options/blog-options.php'; // Blog Options
    require GOOD_MAGAZINE_OPT_DIR . 'options/color-options.php'; // Color Options
    require GOOD_MAGAZINE_OPT_DIR . 'options/sidebar-options.php'; // Sidebar Options
    require GOOD_MAGAZINE_OPT_DIR . 'options/socialicon-options.php'; // Sidebar Options
    
    do_action('nobel_magazine_new_options', $wp_customize);
}

add_action('customize_register', 'nobel_magazine_theme_options');
