<?php
    /** Color Options */
    $wp_customize->get_section('colors')->title = esc_html__('Color Settings', 'nobel-magazine');
    $wp_customize->get_section('colors')->priority = 10;

    //COLOR SETTINGS
    $wp_customize->add_setting('nobel_magazine_template_color', array(
        'default' => '#0078af',
        'sanitize_callback' => 'sanitize_hex_color',
        'priority' => 1
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_template_color', array(
        'section' => 'colors',
        'label' => esc_html__('Theme Primary Color', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_content_color_heading', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'priority' => 1
    ));
    
    $wp_customize->add_control(new Nobel_Magazine_Heading_Custom_Control($wp_customize, 'nobel_magazine_content_color_heading', array(
        'section' => 'colors',
        'label' => esc_html__('Content Color', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_color_content_info', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Info_Text_Control($wp_customize, 'nobel_magazine_color_content_info', array(
        'section' => 'colors',
        'description' => esc_html__('This settings apply only in the single posts (ie page and post detail pages only)', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_content_header_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_content_header_color', array(
        'section' => 'colors',
        'label' => esc_html__('Heading Color', 'nobel-magazine'),
        'description' => esc_html__( 'Color applies for tags (H1, H2, H3, H4, H5, H6)', 'nobel-magazine' )
    )));

    $wp_customize->add_setting('nobel_magazine_content_text_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_content_text_color', array(
        'section' => 'colors',
        'label' => esc_html__('Content Text Color', 'nobel-magazine'),
        'description' => esc_html__( 'Color applies for text in the content area.', 'nobel-magazine' )
    )));

    $wp_customize->add_setting('nobel_magazine_content_link_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_content_link_color', array(
        'section' => 'colors',
        'label' => esc_html__('Content Link Color', 'nobel-magazine'),
        'description' => esc_html__( 'Color applies for link text in the content area.', 'nobel-magazine' )
    )));

    $wp_customize->add_setting('nobel_magazine_content_link_hov_color', array(
        'default' => '#0078af',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_content_link_hov_color', array(
        'section' => 'colors',
        'label' => esc_html__('Content Link Hover Color', 'nobel-magazine'),
    )));

    $wp_customize->add_setting('nobel_magazine_color_section_seperator2', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Separator_Control($wp_customize, 'nobel_magazine_color_section_seperator2', array(
        'section' => 'colors'
    )));