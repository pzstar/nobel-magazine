<?php

/** Necessary Styles & Scripts for customizer controls */
function nobel_magazine_customizer_script() {
    wp_enqueue_script('nobel-magazine-customizer-chosen-script', get_template_directory_uri() . '/inc/theme-options/js/chosen.jquery.js', array("jquery"), '1.4.1', true);
    wp_enqueue_script('select2', get_template_directory_uri() . '/inc/theme-options/js/select2.min.js', array("jquery"), '4.0.13', true);
    wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . '/inc/theme-options/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), '1.0.2', true);
    wp_enqueue_script('nobel-magazine-customizer-script', get_template_directory_uri() . '/inc/theme-options/js/customizer-controls.js', array('jquery', 'jquery-ui-datepicker'), '1.0.0', true);

    wp_enqueue_style('elementor-icons', get_template_directory_uri() . '/inc/theme-options/css/elementor-icons/css/elementor-icons.min.css', array(), '5.6.2');
    wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/inc/theme-options/css/materialdesignicons.css', array(), '4.4.0');
    wp_enqueue_style('icofont', get_template_directory_uri() . '/inc/theme-options/css/icofont.css', array(), '1.0.0');
    wp_enqueue_style('eleganticons', get_template_directory_uri() . '/inc/theme-options/css/eleganticons.css', array(), '1.00');
    wp_enqueue_style('nobel-magazine-customizer-chosen-style', get_template_directory_uri() . '/inc/theme-options/css/chosen.css');
    wp_enqueue_style('select2', get_template_directory_uri() . '/inc/theme-options/css/select2.min.css');
    wp_enqueue_style('nobel-magazine-customizer-style', get_template_directory_uri() . '/inc/theme-options/css/customizer-controls.css', array('wp-color-picker'), '1.0.0');
}

add_action('customize_controls_enqueue_scripts', 'nobel_magazine_customizer_script');

/** Helper Functions */
require get_template_directory() . '/inc/theme-options/includes/helpers.php';
require get_template_directory() . '/inc/theme-options/includes/fonts.php';

/** Customizer Theme Options */
function nobel_magazine_theme_options($wp_customize) {
    /** Custom Controls */
    require get_template_directory() . '/inc/theme-options/custom-controls/custom-controls.php';

    /** Register Control Type */
    $wp_customize->register_control_type('Nobel_Magazine_Background_Image');
    $wp_customize->register_control_type('Nobel_Magazine_Tab');
    $wp_customize->register_control_type('Nobel_Magazine_Dimensions_Control');
    $wp_customize->register_control_type('Nobel_Magazine_Responsive_Range_Slider');
    $wp_customize->register_control_type('Nobel_Magazine_Sortable');
    $wp_customize->register_control_type('Nobel_Magazine_Tab');
    $wp_customize->register_section_type('Nobel_Magazine_Toggle_Section');

    /** Theme Options */
    require get_template_directory() . '/inc/theme-options/options/general-options.php'; // General Options
    require get_template_directory() . '/inc/theme-options/options/header-options.php'; // Header Options
    require get_template_directory() . '/inc/theme-options/options/footer-options.php'; // Footer Options
    require get_template_directory() . '/inc/theme-options/options/blog-options.php'; // Blog Options
    require get_template_directory() . '/inc/theme-options/options/color-options.php'; // Color Options
    require get_template_directory() . '/inc/theme-options/options/sidebar-options.php'; // Sidebar Options
    require get_template_directory() . '/inc/theme-options/options/socialicon-options.php'; // Sidebar Options

    /** Theme Options Sanitizations */
    require get_template_directory() . '/inc/theme-options/includes/sanitization.php';

    do_action('nobel_magazine_new_options', $wp_customize);
}

add_action('customize_register', 'nobel_magazine_theme_options');
