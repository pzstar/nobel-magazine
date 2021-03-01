<?php

$wp_customize->add_section('title_tagline', array(
    'title' => __('Title & Logo', 'nobel-magazine'),
    'panel' => 'nobel_magazine_header_options',
));

$wp_customize->add_setting('nobel_magazine_title_tagline_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Nobel_Magazine_Tab($wp_customize, 'nobel_magazine_title_tagline_nav', array(
    'type' => 'nm-tab',
    'section' => 'title_tagline',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'nobel-magazine'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'custom_logo',
                'blogname',
                'blogdescription',
                'nobel_magazine_hide_title',
                'nobel_magazine_hide_tagline',
                'site_icon'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'nobel-magazine'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'nobel_magazine_title_color',
                'nobel_magazine_tagline_color'
            ),
        )
    ),
)));

$wp_customize->add_setting('nobel_magazine_hide_title', array(
    'default' => false,
    'sanitize_callback' => 'nobel_magazine_sanitize_checkbox',
));

$wp_customize->add_control('nobel_magazine_hide_title', array(
    'label' => __('Hide Site Title', 'nobel-magazine'),
    'section' => 'title_tagline',
    'type' => 'checkbox',
));

$wp_customize->add_setting('nobel_magazine_hide_tagline', array(
    'default' => false,
    'sanitize_callback' => 'nobel_magazine_sanitize_checkbox',
));

$wp_customize->add_control('nobel_magazine_hide_tagline', array(
    'label' => __('Hide Site Tagline', 'nobel-magazine'),
    'section' => 'title_tagline',
    'type' => 'checkbox',
));

$wp_customize->add_setting('nobel_magazine_title_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_title_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Title Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_tagline_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_tagline_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Tagline Color', 'nobel-magazine')
)));
