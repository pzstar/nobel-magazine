<?php
    /** Sidebar Options */
    $wp_customize->add_section('nobel_magazine_layout_options_section', array(
        'title' => esc_html__('Sidebar Settings', 'nobel-magazine'),
        'priority' => 16
    ));

    $wp_customize->add_setting('nobel_magazine_page_layout', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'right-sidebar'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Selector($wp_customize, 'nobel_magazine_page_layout', array(
        'section' => 'nobel_magazine_layout_options_section',
        'label' => esc_html__('Page Layout', 'nobel-magazine'),
        'class' => 'ht-one-forth-width',
        'description' => esc_html__('Applies to all the General Pages and Portfolio Pages.', 'nobel-magazine'),
        'options' => array(
            'right-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.png',
            'left-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.png',
            'no-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.png',
            'no-sidebar-narrow' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.png'
        )
    )));

    $wp_customize->add_setting('nobel_magazine_post_layout', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'right-sidebar'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Selector($wp_customize, 'nobel_magazine_post_layout', array(
        'section' => 'nobel_magazine_layout_options_section',
        'label' => esc_html__('Post Layout', 'nobel-magazine'),
        'class' => 'ht-one-forth-width',
        'description' => esc_html__('Applies to all the Posts.', 'nobel-magazine'),
        'options' => array(
            'right-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.png',
            'left-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.png',
            'no-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.png',
            'no-sidebar-narrow' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.png'
        )
    )));

    $wp_customize->add_setting('nobel_magazine_archive_layout', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'right-sidebar'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Selector($wp_customize, 'nobel_magazine_archive_layout', array(
        'section' => 'nobel_magazine_layout_options_section',
        'label' => esc_html__('Archive Page Layout', 'nobel-magazine'),
        'class' => 'ht-one-forth-width',
        'description' => esc_html__('Applies to all Archive Pages.', 'nobel-magazine'),
        'options' => array(
            'right-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.png',
            'left-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.png',
            'no-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.png',
            'no-sidebar-narrow' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.png'
        )
    )));

    $wp_customize->add_setting('nobel_magazine_home_blog_layout', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'right-sidebar'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Selector($wp_customize, 'nobel_magazine_home_blog_layout', array(
        'section' => 'nobel_magazine_layout_options_section',
        'label' => esc_html__('Blog Page Layout', 'nobel-magazine'),
        'class' => 'ht-one-forth-width',
        'description' => esc_html__('Applies to Blog Page.', 'nobel-magazine'),
        'options' => array(
            'right-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.png',
            'left-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.png',
            'no-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.png',
            'no-sidebar-narrow' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.png'
        )
    )));

    $wp_customize->add_setting('nobel_magazine_search_layout', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'right-sidebar'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Selector($wp_customize, 'nobel_magazine_search_layout', array(
        'section' => 'nobel_magazine_layout_options_section',
        'label' => esc_html__('Search Page Layout', 'nobel-magazine'),
        'class' => 'ht-one-forth-width',
        'description' => esc_html__('Applies to Search Page.', 'nobel-magazine'),
        'options' => array(
            'right-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.png',
            'left-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.png',
            'no-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.png',
            'no-sidebar-narrow' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.png'
        )
    )));

    $wp_customize->add_setting('nobel_magazine_shop_layout', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'right-sidebar'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Selector($wp_customize, 'nobel_magazine_shop_layout', array(
        'section' => 'nobel_magazine_layout_options_section',
        'label' => esc_html__('Shop Page Layout(WooCommerce)', 'nobel-magazine'),
        'class' => 'ht-one-forth-width',
        'description' => esc_html__('Applies to Shop Page, Product Category, Product Tag and all Single Products Pages.', 'nobel-magazine'),
        'options' => array(
            'right-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/right-sidebar.png',
            'left-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/left-sidebar.png',
            'no-sidebar' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar.png',
            'no-sidebar-narrow' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'sidebar-layouts/no-sidebar-narrow.png'
        ),
    )));

    $wp_customize->add_setting('nobel_magazine_content_widget_title_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_content_widget_title_color', array(
        'section' => 'nobel_magazine_layout_options_section',
        'label' => esc_html__('Sidebar Widget Title Color', 'nobel-magazine')
    )));