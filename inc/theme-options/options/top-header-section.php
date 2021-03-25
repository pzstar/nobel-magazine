<?php

$wp_customize->add_section('nobel_magazine_top_header_options', array(
    'title' => __('Top Header', 'nobel-magazine'),
    'panel' => 'nobel_magazine_header_options',
));

$wp_customize->add_setting('nobel_magazine_top_header_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Nobel_Magazine_Tab($wp_customize, 'nobel_magazine_top_header_nav', array(
    'section' => 'nobel_magazine_top_header_options',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'nobel-magazine'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'nobel_magazine_top_header_display',
                'nobel_magazine_th_left_display',
                'nobel_magazine_th_center_display',
                'nobel_magazine_th_right_display',
                'nobel_magazine_top_header_seperator',
                'nobel_magazine_th_left_header',
                'nobel_magazine_th_left_social',
                'nobel_magazine_th_left_menu',
                'nobel_magazine_th_left_widget',
                'nobel_magazine_th_left_text',
                'nobel_magazine_th_left_date',
                'nobel_magazine_th_center_header',
                'nobel_magazine_th_center_social',
                'nobel_magazine_th_center_menu',
                'nobel_magazine_th_center_widget',
                'nobel_magazine_th_center_text',
                'nobel_magazine_th_center_date',
                'nobel_magazine_th_right_header',
                'nobel_magazine_th_right_social',
                'nobel_magazine_th_right_menu',
                'nobel_magazine_th_right_widget',
                'nobel_magazine_th_right_text',
                'nobel_magazine_th_right_date',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'nobel-magazine'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'nobel_magazine_th_spacing',
                'nobel_magazine_th_bg_color',
                'nobel_magazine_th_enable_bottom_border',
                'nobel_magazine_th_bottom_border_color',
                'nobel_magazine_th_text_color',
                'nobel_magazine_th_link_color',
                'nobel_magazine_th_link_hover_color'
            ),
        ),
    ),
)));

$wp_customize->add_setting('nobel_magazine_top_header_display', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'none'
));

$wp_customize->add_control('nobel_magazine_top_header_display', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Header Display', 'meta-store'),
    'choices' => array(
        'none' => esc_html__('None', 'meta-store'),
        'center' => esc_html__('Center', 'meta-store'),
        'left' => esc_html__('Left', 'meta-store'),
        'right' => esc_html__('Right', 'meta-store'),
        'left-right' => esc_html__('Left & Right', 'meta-store'),
    )
));

$wp_customize->add_setting('nobel_magazine_th_left_display', array(
    'default' => 'date',
    'sanitize_callback' => 'nobel_magazine_sanitize_choices',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_left_display', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Left Header', 'nobel-magazine'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'nobel-magazine'),
        'menu' => esc_html__('Menu', 'nobel-magazine'),
        'widget' => esc_html__('Widget', 'nobel-magazine'),
        'text' => esc_html__('HTML Text', 'nobel-magazine'),
        'date' => esc_html__('Date & Time', 'nobel-magazine'),
    )
));

$wp_customize->add_setting('nobel_magazine_th_center_display', array(
    'default' => 'date',
    'sanitize_callback' => 'nobel_magazine_sanitize_choices',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_center_display', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Center Header', 'nobel-magazine'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'nobel-magazine'),
        'menu' => esc_html__('Menu', 'nobel-magazine'),
        'widget' => esc_html__('Widget', 'nobel-magazine'),
        'text' => esc_html__('HTML Text', 'nobel-magazine'),
        'date' => esc_html__('Date & Time', 'nobel-magazine'),
    )
));

$wp_customize->add_setting('nobel_magazine_th_right_display', array(
    'default' => 'date',
    'sanitize_callback' => 'nobel_magazine_sanitize_choices',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_right_display', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Display in Right Header', 'nobel-magazine'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'nobel-magazine'),
        'menu' => esc_html__('Menu', 'nobel-magazine'),
        'widget' => esc_html__('Widget', 'nobel-magazine'),
        'text' => esc_html__('HTML Text', 'nobel-magazine'),
        'date' => esc_html__('Date & Time', 'nobel-magazine'),
    )
));

$wp_customize->add_setting('nobel_magazine_top_header_seperator', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Separator($wp_customize, 'nobel_magazine_top_header_seperator', array(
    'section' => 'nobel_magazine_top_header_options'
)));

$wp_customize->add_setting('nobel_magazine_th_left_header', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Heading($wp_customize, 'nobel_magazine_th_left_header', array(
    'label' => esc_html__('Top Left Header', 'nobel-magazine'),
    'section' => 'nobel_magazine_top_header_options',
)));

$wp_customize->add_setting('nobel_magazine_th_left_social', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Text_Info($wp_customize, 'nobel_magazine_th_left_social', array(
    'label' => esc_html__('Social Icons', 'nobel-magazine'),
    'section' => 'nobel_magazine_top_header_options',
    'description' => sprintf(esc_html__('Add your %s here', 'nobel-magazine'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('nobel_magazine_th_left_menu', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_left_menu', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Menu', 'nobel-magazine'),
    'choices' => nobel_magazine_get_menulist()
));

$wp_customize->add_setting('nobel_magazine_th_left_widget', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_left_widget', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Widget', 'nobel-magazine'),
    'choices' => nobel_magazine_widget_lists()
));

$wp_customize->add_setting('nobel_magazine_th_left_text', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'California, TX 70240 | (1800) 456 7890',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Page_Editor($wp_customize, 'nobel_magazine_th_left_text', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Html Text', 'nobel-magazine'),
    'include_admin_print_footer' => true
)));

$wp_customize->add_setting('nobel_magazine_th_left_date', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'F j, Y',
));

$wp_customize->add_control('nobel_magazine_th_left_date', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Date Format', 'nobel-magazine'),
    'choices' => array(
        'F j, Y' => 'March 10, 2001',
        'F j, Y' => 'March 10, 2001',
        'F j, Y' => 'March 10, 2001',
        'F j, Y' => 'March 10, 2001'
    )
));

$wp_customize->add_setting('nobel_magazine_th_center_header', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Heading($wp_customize, 'nobel_magazine_th_center_header', array(
    'label' => esc_html__('Top Center Header', 'nobel-magazine'),
    'section' => 'nobel_magazine_top_header_options',
)));

$wp_customize->add_setting('nobel_magazine_th_center_social', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Text_Info($wp_customize, 'nobel_magazine_th_center_social', array(
    'label' => esc_html__('Social Icons', 'nobel-magazine'),
    'section' => 'nobel_magazine_top_header_options',
    'description' => sprintf(esc_html__('Add your %s here', 'nobel-magazine'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('nobel_magazine_th_center_menu', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_center_menu', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Menu', 'nobel-magazine'),
    'choices' => nobel_magazine_get_menulist()
));

$wp_customize->add_setting('nobel_magazine_th_center_widget', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_center_widget', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Widget', 'nobel-magazine'),
    'choices' => nobel_magazine_widget_lists()
));

$wp_customize->add_setting('nobel_magazine_th_center_text', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'California, TX 70240 | (1800) 456 7890',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Page_Editor($wp_customize, 'nobel_magazine_th_center_text', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Html Text', 'nobel-magazine'),
    'include_admin_print_footer' => true
)));

$wp_customize->add_setting('nobel_magazine_th_center_date', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'F j, Y',
));

$wp_customize->add_control('nobel_magazine_th_center_date', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Date Format', 'nobel-magazine'),
    'choices' => array(
        'F j, Y' => 'March 10, 2001',
        'F j, Y' => 'March 10, 2001',
        'F j, Y' => 'March 10, 2001',
        'F j, Y' => 'March 10, 2001'
    )
));

$wp_customize->add_setting('nobel_magazine_th_right_header', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Heading($wp_customize, 'nobel_magazine_th_right_header', array(
    'label' => esc_html__('Top Right Header', 'nobel-magazine'),
    'section' => 'nobel_magazine_top_header_options',
)));

$wp_customize->add_setting('nobel_magazine_th_right_social', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Text_Info($wp_customize, 'nobel_magazine_th_right_social', array(
    'label' => esc_html__('Social Icons', 'nobel-magazine'),
    'section' => 'nobel_magazine_top_header_options',
    'description' => sprintf(esc_html__('Add your %s here', 'nobel-magazine'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('nobel_magazine_th_right_menu', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_right_menu', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Menu', 'nobel-magazine'),
    'choices' => nobel_magazine_get_menulist()
));

$wp_customize->add_setting('nobel_magazine_th_right_widget', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_right_widget', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Widget', 'nobel-magazine'),
    'choices' => nobel_magazine_widget_lists()
));

$wp_customize->add_setting('nobel_magazine_th_right_text', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'California, TX 70240 | (1800) 456 7890',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Page_Editor($wp_customize, 'nobel_magazine_th_right_text', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Html Text', 'nobel-magazine'),
    'include_admin_print_footer' => true
)));

$wp_customize->add_setting('nobel_magazine_th_right_date', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'F j, Y',
));

$wp_customize->add_control('nobel_magazine_th_right_date', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Date Format', 'nobel-magazine'),
    'choices' => array(
        'F j, Y' => 'March 10, 2001',
        'F j, Y' => 'March 10, 2001',
        'F j, Y' => 'March 10, 2001',
        'F j, Y' => 'March 10, 2001'
    )
));

$wp_customize->add_setting('nobel_magazine_th_spacing_top', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'default' => 10,
    'transport' => 'postMessage'
));

$wp_customize->add_setting('nobel_magazine_th_spacing_bottom', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'default' => 10,
    'transport' => 'postMessage'
));

$wp_customize->add_setting('nobel_magazine_th_spacing_top_tablet', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('nobel_magazine_th_spacing_bottom_tablet', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('nobel_magazine_th_spacing_top_mobile', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('nobel_magazine_th_spacing_bottom_mobile', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Nobel_Magazine_Dimensions($wp_customize, 'nobel_magazine_th_spacing', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Top & Bottom Paddings (px)', 'total-plus'),
    'settings' => array(
        'desktop_top' => 'nobel_magazine_th_spacing_top',
        'desktop_bottom' => 'nobel_magazine_th_spacing_bottom',
        'tablet_top' => 'nobel_magazine_th_spacing_top_tablet',
        'tablet_bottom' => 'nobel_magazine_th_spacing_bottom_tablet',
        'mobile_top' => 'nobel_magazine_th_spacing_top_mobile',
        'mobile_bottom' => 'nobel_magazine_th_spacing_bottom_mobile',
    ),
    'input_attrs' => array(
        'min' => 0,
        'max' => 400,
        'step' => 1,
    ),
)));

$wp_customize->add_setting('nobel_magazine_th_bg_color', array(
    'default' => '#0078af',
    'sanitize_callback' => 'nobel_magazine_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Alpha_Color($wp_customize, 'nobel_magazine_th_bg_color', array(
    'label' => esc_html__('Header Background', 'nobel-magazine'),
    'section' => 'nobel_magazine_top_header_options',
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

$wp_customize->add_setting('nobel_magazine_th_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_th_text_color', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Text Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_th_link_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_th_link_color', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Link Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_th_link_hover_color', array(
    'default' => '#CCCCCC',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_th_link_hover_color', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Link Hover Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_th_enable_bottom_border', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
    'default' => false
));

$wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_th_enable_bottom_border', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Enable Bottom Border', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_th_bottom_border_color', array(
    'default' => '',
    'sanitize_callback' => 'nobel_magazine_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Alpha_Color($wp_customize, 'nobel_magazine_th_bottom_border_color', array(
    'label' => esc_html__('Bottom Border Color', 'nobel-magazine'),
    'section' => 'nobel_magazine_top_header_options'
)));
