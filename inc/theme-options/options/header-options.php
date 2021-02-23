<?php

/** Header Options Panel */
$wp_customize->add_panel('nobel_magazine_header_options', array(
    'title' => __('Header Options', 'nobel-magazine'),
    'description' => __('Configure header settings', 'nobel-magazine'),
    'priority' => 2,
));

/** Title & Tagline */
$wp_customize->remove_section('title_tagline');
$wp_customize->add_section('title_tagline', array(
    'title' => __('Title & Logo', 'nobel-magazine'),
    'panel' => 'nobel_magazine_header_options',
));

/** Top Header Options */
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
            'fields' => array(
                'square_plus_caption_width_mobile',
                'nobel_magazine_top_header_display',
                'nobel_magazine_th_left_display',
                'nobel_magazine_th_center_display',
                'nobel_magazine_th_right_display',
                'nobel_magazine_social_link',
                'nobel_magazine_th_menu',
                'nobel_magazine_th_widget',
                'nobel_magazine_th_text',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'nobel-magazine'),
            'fields' => array(
                'nobel_magazine_th_height',
                'nobel_magazine_th_bg_color',
                'nobel_magazine_th_bottom_border_color',
                'nobel_magazine_th_text_color',
                'nobel_magazine_th_anchor_color',
            ),
        ),
    ),
)));

$wp_customize->add_setting('square_plus_caption_width', array(
    'default' => '50',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('square_plus_caption_width_tablet', array(
    'default' => '70',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('square_plus_caption_width_mobile', array(
    'default' => '90',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Nobel_Magazine_Responsive_Range_Slider($wp_customize, 'square_plus_caption_width', array(
    'section' => 'nobel_magazine_top_header_options',
    'settings' => array(
        'desktop' => 'square_plus_caption_width',
        'tablet' => 'square_plus_caption_width_tablet',
        'mobile' => 'square_plus_caption_width_mobile',
    ),
    'label' => esc_html__('Caption Width(%)', 'square-plus'),
    'input_attrs' => array(
        'min' => 30,
        'max' => 100,
        'step' => 1,
    ),
    'unit' => '%'
)));

$wp_customize->add_setting('nobel_magazine_top_header_display', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'none'
));

$wp_customize->add_control('nobel_magazine_top_header_display', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Top Header Display', 'meta-store'),
    'choices' => array(
        'none' => esc_html__('None', 'meta-store'),
        'center' => esc_html__('Center', 'meta-store'),
        'left' => esc_html__('Left', 'meta-store'),
        'right' => esc_html__('Right', 'meta-store'),
        'left-right' => esc_html__('Left & Right', 'meta-store'),
    )
));

$wp_customize->add_setting('nobel_magazine_th_height', array(
    'sanitize_callback' => 'absint',
    'default' => 45,
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_th_height', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Top Header Height', 'nobel-magazine'),
    'input_attrs' => array(
        'min' => 5,
        'max' => 100,
        'step' => 1
    ),
    'unit' => 'px'
)));

$wp_customize->add_setting('nobel_magazine_th_bg_color', array(
    'default' => '#0078af',
    'sanitize_callback' => 'nobel_magazine_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Alpha_Color($wp_customize, 'nobel_magazine_th_bg_color', array(
    'label' => esc_html__('Top Header Background', 'nobel-magazine'),
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

$wp_customize->add_setting('nobel_magazine_th_bottom_border_color', array(
    'default' => '',
    'sanitize_callback' => 'nobel_magazine_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Alpha_Color($wp_customize, 'nobel_magazine_th_bottom_border_color', array(
    'label' => esc_html__('Top Header Bottom Border Color', 'nobel-magazine'),
    'description' => esc_html__('Leave Empty to Hide Border', 'nobel-magazine'),
    'section' => 'nobel_magazine_top_header_options'
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

$wp_customize->add_setting('nobel_magazine_th_anchor_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_th_anchor_color', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Anchor(Link) Color', 'nobel-magazine')
)));

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
        'ticker' => esc_html__('News Ticker', 'nobel-magazine'),
    )
));

$wp_customize->add_setting('nobel_magazine_top_header_seperator', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Separator($wp_customize, 'nobel_magazine_top_header_seperator', array(
    'section' => 'nobel_magazine_top_header_options'
)));

$wp_customize->add_setting('nobel_magazine_social_link', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Text_Info($wp_customize, 'nobel_magazine_social_link', array(
    'label' => esc_html__('Social Icons', 'nobel-magazine'),
    'section' => 'nobel_magazine_top_header_options',
    'description' => sprintf(esc_html__('Add your %s here', 'nobel-magazine'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('nobel_magazine_th_menu', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_menu', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Menu', 'nobel-magazine'),
    'choices' => nobel_magazine_get_menulist()
));

$wp_customize->add_setting('nobel_magazine_th_widget', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'none',
    'transport' => 'refresh'
));

$wp_customize->add_control('nobel_magazine_th_widget', array(
    'section' => 'nobel_magazine_top_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Widget', 'nobel-magazine'),
    'choices' => nobel_magazine_widget_lists()
));

$wp_customize->add_setting('nobel_magazine_th_text', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'California, TX 70240 | (1800) 456 7890',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Page_Editor($wp_customize, 'nobel_magazine_th_text', array(
    'section' => 'nobel_magazine_top_header_options',
    'label' => esc_html__('Html Text', 'nobel-magazine'),
    'include_admin_print_footer' => true
)));


/** Main Header Options */
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
            'name' => esc_html__('Content', 'nobel-magazine'),
            'fields' => array(
                'nobel_magazine_sticky_header',
                'nobel_magazine_mh_height',
                'nobel_magazine_mh_layout',
                'nobel_magazine_mh_show_search',
                'nobel_magazine_mh_show_socialicons'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'nobel-magazine'),
            'fields' => array(
                'nobel_magazine_mh_bg_color',
                'nobel_magazine_mh_border_sep_start',
                'nobel_magazine_mh_border',
                'nobel_magazine_mh_border_color',
                'nobel_magazine_mh_border_sep_end',
                'nobel_magazine_mh_menu_color',
                'nobel_magazine_mh_menu_hover_color',
                'nobel_magazine_mh_menu_hover_bg_color',
                'nobel_magazine_submenu_seperator',
                'nobel_magazine_mh_submenu_bg_color',
                'nobel_magazine_mh_submenu_color',
                'nobel_magazine_mh_submenu_hover_color',
                'nobel_magazine_menuhover_seperator',
                'nobel_magazine_menu_dropdown_padding',
            ),
        ),
    ),
)));

$wp_customize->add_setting('nobel_magazine_sticky_header', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
    'default' => true
));

$wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_sticky_header', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('Enable Sticky Header', 'nobel-magazine'),
)));

$wp_customize->add_setting('nobel_magazine_mh_layout', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text',
    'default' => 'nm-header-style1'
));

$wp_customize->add_control(new Nobel_Magazine_Selector($wp_customize, 'nobel_magazine_mh_layout', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('Header Layout', 'nobel-magazine'),
    'class' => 'ht-full-width',
    'options' => array(
        'nm-header-style1' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'headers/header-1.png',
        'nm-header-style2' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'headers/header-2.png',
    )
)));

$wp_customize->add_setting('nobel_magazine_mh_height', array(
    'sanitize_callback' => 'absint',
    'default' => 65,
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_mh_height', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('Header Height', 'nobel-magazine'),
    'input_attrs' => array(
        'min' => 50,
        'max' => 200,
        'step' => 1
    ),
    'unit' => 'px'
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
    'label' => esc_html__('Header Background Color', 'nobel-magazine'),
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
    'label' => esc_html__('Top and Bottom Border Settings', 'nobel-magazine'),
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

$wp_customize->add_setting('nobel_magazine_mh_border_sep_end', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Separator($wp_customize, 'nobel_magazine_mh_border_sep_end', array(
    'section' => 'nobel_magazine_main_header_options'
)));

$wp_customize->add_setting('nobel_magazine_mh_menu_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_mh_menu_color', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('Menu Link Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_mh_menu_hover_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_mh_menu_hover_color', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('Menu Link Hover Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_mh_menu_hover_bg_color', array(
    'default' => '#0078af',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_mh_menu_hover_bg_color', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('Menu Link Background Color on Hover', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_submenu_seperator', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Separator($wp_customize, 'nobel_magazine_submenu_seperator', array(
    'section' => 'nobel_magazine_main_header_options'
)));

$wp_customize->add_setting('nobel_magazine_mh_submenu_bg_color', array(
    'default' => '#F2F2F2',
    'sanitize_callback' => 'nobel_magazine_sanitize_color_alpha',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Alpha_Color($wp_customize, 'nobel_magazine_mh_submenu_bg_color', array(
    'label' => esc_html__('SubMenu Background Color', 'nobel-magazine'),
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

$wp_customize->add_setting('nobel_magazine_mh_submenu_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_mh_submenu_color', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('SubMenu Text/Link Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_mh_submenu_hover_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_mh_submenu_hover_color', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('SubMenu Link Hover Color', 'nobel-magazine')
)));

$wp_customize->add_setting('nobel_magazine_menuhover_seperator', array(
    'sanitize_callback' => 'nobel_magazine_sanitize_text'
));

$wp_customize->add_control(new Nobel_Magazine_Separator($wp_customize, 'nobel_magazine_menuhover_seperator', array(
    'section' => 'nobel_magazine_main_header_options'
)));

$wp_customize->add_setting('nobel_magazine_menu_dropdown_padding', array(
    'default' => 0,
    'sanitize_callback' => 'absint',
    'transport' => 'refresh'
));

$wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_menu_dropdown_padding', array(
    'section' => 'nobel_magazine_main_header_options',
    'label' => esc_html__('Menu item Top/Bottom Padding', 'nobel-magazine'),
    'description' => esc_html__('(in px) Select appropriate number so that the submenu on hover appears just below the header bar.', 'nobel-magazine'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1
    ),
    'unit' => 'px'
)));
