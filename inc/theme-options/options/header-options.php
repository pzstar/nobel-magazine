<?php

$wp_customize->remove_control('display_header_text');

/** Header Options Panel */
$wp_customize->add_panel('nobel_magazine_header_options', array(
    'title' => __('Header Options', 'nobel-magazine'),
    'priority' => 2,
));

require get_template_directory() . '/inc/theme-options/options/header-layout-section.php';
require get_template_directory() . '/inc/theme-options/options/title-tagline-section.php';
require get_template_directory() . '/inc/theme-options/options/top-header-section.php';
require get_template_directory() . '/inc/theme-options/options/main-header-section.php';
require get_template_directory() . '/inc/theme-options/options/main-menu-section.php';
