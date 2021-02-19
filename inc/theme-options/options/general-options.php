<?php
    /** General Settings */
    $wp_customize->add_section('nobel_magazine_general_options_section', array(
        'title' => esc_html__('General Options', 'nobel-magazine'),
        'priority' => 1
    ));

    $wp_customize->add_setting('nobel_magazine_website_layout', array(
        'default' => 'wide',
        'sanitize_callback' => 'nobel_magazine_sanitize_choices',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control('nobel_magazine_website_layout', array(
        'section' => 'nobel_magazine_general_options_section',
        'type' => 'radio',
        'label' => esc_html__('Website Layout', 'nobel-magazine'),
        'description' => sprintf(esc_html__('If boxed is selected, change background color/image %s', 'nobel-magazine'), '<a href="javascript:wp.customize.section( \'background_image\' ).focus()">' . esc_html__('here', 'nobel-magazine') . '</a>'),
        'choices' => array(
            'wide' => esc_html__('Wide', 'nobel-magazine'),
            'boxed' => esc_html__('Boxed', 'nobel-magazine')
        )
    ));

    $wp_customize->add_setting('nobel_magazine_website_width', array(
        'sanitize_callback' => 'absint',
        'default' => 1170,
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Range_Control($wp_customize, 'nobel_magazine_website_width', array(
        'section' => 'nobel_magazine_general_options_section',
        'label' => esc_html__('Website Container Width', 'nobel-magazine'),
        'input_attrs' => array(
            'min' => 900,
            'max' => 1400,
            'step' => 10
        )
    )));

    $wp_customize->add_setting('nobel_magazine_sidebar_width', array(
        'sanitize_callback' => 'absint',
        'default' => 30,
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Range_Control($wp_customize, 'nobel_magazine_sidebar_width', array(
        'section' => 'nobel_magazine_general_options_section',
        'label' => esc_html__('Sidebar Width (%)', 'nobel-magazine'),
        'input_attrs' => array(
            'min' => 20,
            'max' => 50,
            'step' => 1
        )
    )));

    $wp_customize->add_setting('nobel_magazine_scroll_animation_seperator', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Separator_Control($wp_customize, 'nobel_magazine_scroll_animation_seperator', array(
        'section' => 'nobel_magazine_general_options_section'
    )));

    $wp_customize->add_setting('nobel_magazine_show_title', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_checkbox',
        'default' => true
    ));

    $wp_customize->add_setting('nobel_magazine_breadcrumb', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Checkbox_Control($wp_customize, 'nobel_magazine_breadcrumb', array(
        'section' => 'nobel_magazine_general_options_section',
        'label' => esc_html__('BreadCrumb', 'nobel-magazine'),
        'description' => esc_html__('Breadcrumbs are a great way of letting your visitors find out where they are on your site.', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_enable_preloader', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Checkbox_Control($wp_customize, 'nobel_magazine_enable_preloader', array(
        'section' => 'nobel_magazine_general_options_section',
        'label' => esc_html__('Enable Preloader', 'nobel-magazine'),
        'description' => esc_html__('Is a simple logo animations to keep visitors entertained while site is loading.', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_backtotop', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Checkbox_Control($wp_customize, 'nobel_magazine_backtotop', array(
        'section' => 'nobel_magazine_general_options_section',
        'label' => esc_html__('Back to Top Button', 'nobel-magazine'),
        'description' => esc_html__('A button on click scrolls to the top of the page.', 'nobel-magazine')
    )));