<?php

$wp_customize->add_section('nobel_magazine_main_header_options', array(
    'title' => __('Main Header', 'nobel-magazine'),
    'panel' => 'nobel_magazine_header_options',
));

$wp_customize->add_setting('nobel_magazine_main_header_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Nobel_Magazine_Tab($wp_customize, 'nobel_magazine_main_header_nav', array(
    'type' => 'nm-tab',
    'section' => 'nobel_magazine_main_header_options',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Layouts', 'nobel-magazine'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'nobel_magazine_mh_width',
                'nobel_magazine_mh_show_search',
                'nobel_magazine_mh_show_socialicons'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'nobel-magazine'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'nobel_magazine_mh_spacing',
                'nobel_magazine_mh_bg_color',
                'nobel_magazine_mh_border_sep_start',
                'nobel_magazine_mh_border',
                'nobel_magazine_mh_border_color'
            ),
        ),
    ),
)));

$wp_customize->add_setting('nobel_magazine_mh_width', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_choices',
    'default' => 'full-width'
));

$wp_customize->add_control('nobel_magazine_mh_width', array(
    'section' => 'nobel_magazine_main_header_options',
    'type' => 'select',
    'label' => esc_html__('Header Width', 'meta-store'),
    'choices' => array(
        'full-width' => esc_html__('Full Width', 'meta-store'),
        'container-width' => esc_html__('Container Width', 'meta-store')
    )
));

$wp_customize->add_setting('nobel_magazine_mh_spacing_top', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'default' => 10,
    'transport' => 'postMessage'
));

$wp_customize->add_setting('nobel_magazine_mh_spacing_bottom', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'default' => 10,
    'transport' => 'postMessage'
));

$wp_customize->add_setting('nobel_magazine_mh_spacing_top_tablet', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('nobel_magazine_mh_spacing_bottom_tablet', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('nobel_magazine_mh_spacing_top_mobile', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('nobel_magazine_mh_spacing_bottom_mobile', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Nobel_Magazine_Dimensions($wp_customize, 'nobel_magazine_mh_spacing', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('Top & Bottom Spacing (px)', 'total-plus'),
    'settings' => array(
        'desktop_top' => 'nobel_magazine_mh_spacing_top',
        'desktop_bottom' => 'nobel_magazine_mh_spacing_bottom',
        'tablet_top' => 'nobel_magazine_mh_spacing_top_tablet',
        'tablet_bottom' => 'nobel_magazine_mh_spacing_bottom_tablet',
        'mobile_top' => 'nobel_magazine_mh_spacing_top_mobile',
        'mobile_bottom' => 'nobel_magazine_mh_spacing_bottom_mobile',
    ),
    'input_attrs' => array(
        'min' => 0,
        'max' => 400,
        'step' => 1,
    ),
)));

$wp_customize->add_setting('nobel_magazine_mh_show_search', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_mh_show_search', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('Show Search Button', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_mh_show_socialicons', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_mh_show_socialicons', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('Show Social Icons', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_mh_bg_color', array(
    'default' => '#0078af',
    'sanitize_callback' => 'nobel_magazine_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Alpha_Color($wp_customize, 'nobel_magazine_mh_bg_color', array(
    'label' => esc_html__('Background Color', 'nobel-magazine'),
    'section' => 'nobel_magazine_main_header_options',
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

$wp_customize->add_setting('nobel_magazine_mh_border_sep_start', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Separator($wp_customize, 'nobel_magazine_mh_border_sep_start', array(
    'section' => 'nobel_magazine_main_header_options'
)));

$wp_customize->add_setting('nobel_magazine_mh_border', array(
    'default' => 'ht-no-border',
    'sanitize_callback' => 'nobel_magazine_sanitize_choices',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_mh_border', array(
    'section' => 'nobel_magazine_main_header_options',
    'type' => 'select',
    'label' => esc_html__('Top and Bottom Border', 'nobel-magazine'),
    'choices' => array(
        'ht-no-border' => esc_html__('Disable', 'nobel-magazine'),
        'ht-top-border' => esc_html__('Enable Top Border', 'nobel-magazine'),
        'ht-bottom-border' => esc_html__('Enable Bottom Border', 'nobel-magazine'),
        'ht-top-bottom-border' => esc_html__('Enable Top & Bottom Border', 'nobel-magazine')
    )
));

$wp_customize->add_setting('nobel_magazine_mh_border_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'nobel_magazine_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Alpha_Color($wp_customize, 'nobel_magazine_mh_border_color', array(
    'label' => esc_html__('Border Color', 'nobel-magazine'),
    'section' => 'nobel_magazine_main_header_options'
)));
