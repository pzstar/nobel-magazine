<?php

$wp_customize->add_section('nobel_magazine_main_menu_options', array(
    'title' => __('Main Menu', 'nobel-magazine'),
    'panel' => 'nobel_magazine_header_options',
));

$wp_customize->add_setting('nobel_magazine_main_menu_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Nobel_Magazine_Tab($wp_customize, 'nobel_magazine_main_menu_nav', array(
    'type' => 'nm-tab',
    'section' => 'nobel_magazine_main_menu_options',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'nobel-magazine'),
            'fields' => array(
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'nobel-magazine'),
            'fields' => array(
            ),
        ),
    ),
)));

$wp_customize->add_setting('nobel_magazine_mh_border_sep_end', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Separator($wp_customize, 'nobel_magazine_mh_border_sep_end', array(
    'section' => 'nobel_magazine_main_menu_options'
)));

$wp_customize->add_setting('nobel_magazine_mh_menu_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_mh_menu_color', array(
    'section' => 'nobel_magazine_main_menu_options',
    'label' => esc_html__('Menu Link Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_mh_menu_hover_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_mh_menu_hover_color', array(
    'section' => 'nobel_magazine_main_menu_options',
    'label' => esc_html__('Menu Link Hover Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_mh_menu_hover_bg_color', array(
    'default' => '#0078af',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_mh_menu_hover_bg_color', array(
    'section' => 'nobel_magazine_main_menu_options',
    'label' => esc_html__('Menu Link Background Color on Hover', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_submenu_seperator', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Separator($wp_customize, 'nobel_magazine_submenu_seperator', array(
    'section' => 'nobel_magazine_main_menu_options'
)));

$wp_customize->add_setting('nobel_magazine_mh_submenu_bg_color', array(
    'default' => '#F2F2F2',
    'sanitize_callback' => 'nobel_magazine_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Alpha_Color($wp_customize, 'nobel_magazine_mh_submenu_bg_color', array(
    'label' => esc_html__('SubMenu Background Color', 'nobel-magazine'),
    'section' => 'nobel_magazine_main_menu_options',
    'palette' => array(
        '#FFFFFF',
        '#000000',
        '#f5245f',
        '#1267b3',
        '#feb600',
        '#00C569',
        'rgba( 255, 255, 255, 0.2 )',
        'rgba( 0, 0, 0, 0.2 )'
    )
)));

$wp_customize->add_setting('nobel_magazine_mh_submenu_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_mh_submenu_color', array(
    'section' => 'nobel_magazine_main_menu_options',
    'label' => esc_html__('SubMenu Text/Link Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_mh_submenu_hover_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_mh_submenu_hover_color', array(
    'section' => 'nobel_magazine_main_menu_options',
    'label' => esc_html__('SubMenu Link Hover Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_menuhover_seperator', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Separator($wp_customize, 'nobel_magazine_menuhover_seperator', array(
    'section' => 'nobel_magazine_main_menu_options'
)));

$wp_customize->add_setting('nobel_magazine_menu_dropdown_padding', array(
    'default' => 0,
    'sanitize_callback' => 'absint',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_menu_dropdown_padding', array(
    'section' => 'nobel_magazine_main_menu_options',
    'label' => esc_html__('Menu item Top/Bottom Padding', 'nobel-magazine'),
    'description' => esc_html__('(in px) Select appropriate number so that the submenu on hover appears just below the header bar.', 'nobel-magazine'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1
    ),
    'unit' => 'px'
)));
