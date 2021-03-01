<?php

$wp_customize->add_section('nobel_magazine_header_layouts', array(
    'title' => __('Header Layouts', 'nobel-magazine'),
    'panel' => 'nobel_magazine_header_options',
));

$wp_customize->add_setting('nobel_magazine_header_layout', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'nm-header-style1'
));

$wp_customize->add_control(new Nobel_Magazine_Selector($wp_customize, 'nobel_magazine_header_layout', array(
    'section' => 'nobel_magazine_header_layouts',
    'label' => esc_html__('Header Layouts', 'nobel-magazine'),
    'class' => 'ht-full-width',
    'options' => array(
        'nm-header-style1' => get_template_directory_uri() . '/inc/theme-options/images/headers/header-1.png',
        'nm-header-style2' => get_template_directory_uri() . '/inc/theme-options/images/headers/header-2.png',
    )
)));

$wp_customize->add_setting('nobel_magazine_sticky_header', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_sticky_header', array(
    'section' => 'nobel_magazine_header_layouts',
    'label' => esc_html__('Enable Sticky Header', 'nobel-magazine'),
    'description' => esc_html__('Either the Main Header or Menu will be sticky depending on the header type selected.', 'nobel-magazine'),
)));