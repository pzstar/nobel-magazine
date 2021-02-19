<?php
    /** Footer Settings */
    $wp_customize->add_section('nobel_magazine_footer_section', array(
        'title' => esc_html__('Footer Settings', 'nobel-magazine'),
        'priority' => 50
    ));

    $wp_customize->add_setting('nobel_magazine_footer_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control(new Nobel_Magazine_Control_Tab($wp_customize, 'nobel_magazine_footer_nav', array(
        'type' => 'tab',
        'section' => 'nobel_magazine_footer_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'nobel-magazine'),
                'fields' => array(
                    'nobel_magazine_top_footer_heading',
                    'nobel_magazine_footer_col',
                    'nobel_magazine_mid_footer_heading',
                    'nobel_magazine_footer_logo',
                    'nobel_magazine_footer_enable_socialicons',
                    'nobel_magazine_bottom_footer_heading',
                    'nobel_magazine_footer_copyright'
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'nobel-magazine'),
                'fields' => array(
                    'nobel_magazine_footer_bg',
                    'nobel_magazine_footer_primary_color_heading',
                    'nobel_magazine_footer_bg_color',
                    'nobel_magazine_footer_border_color',
                    'nobel_magazine_footer_title_color',
                    'nobel_magazine_footer_text_color',
                    'nobel_magazine_footer_anchor_color'
                ),
            )
        ),
    )));

    $wp_customize->add_setting('nobel_magazine_top_footer_heading', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text'
    ));
    
    $wp_customize->add_control(new Nobel_Magazine_Heading_Custom_Control($wp_customize, 'nobel_magazine_top_footer_heading', array(
        'section' => 'nobel_magazine_footer_section',
        'label' => esc_html__('Top Footer', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_footer_col', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'col-1'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Selector($wp_customize, 'nobel_magazine_footer_col', array(
        'section' => 'nobel_magazine_footer_section',
        'label' => esc_html__('Footer Column', 'nobel-magazine'),
        'class' => 'ht-one-third-width',
        'options' => array(
            'col-1' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'footer-columns/col-1.jpg',
            'col-2' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'footer-columns/col-2.jpg',
            'col-3' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'footer-columns/col-3.jpg',
            'col-3' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'footer-columns/col-3.jpg',
            'col-4' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'footer-columns/col-4.jpg',
        )
    )));

    $wp_customize->add_setting('nobel_magazine_footer_bg_url', array(
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh'
    ));

    $wp_customize->add_setting('nobel_magazine_footer_bg_id', array(
        'sanitize_callback' => 'absint',
        'transport' => 'refresh'
    ));

    $wp_customize->add_setting('nobel_magazine_footer_bg_repeat', array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));

    $wp_customize->add_setting('nobel_magazine_footer_bg_size', array(
        'default' => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));

    $wp_customize->add_setting('nobel_magazine_footer_bg_position', array(
        'default' => 'center-center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));

    $wp_customize->add_setting('nobel_magazine_footer_bg_attach', array(
        'default' => 'scroll',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    ));

    // Registers example_background control
    $wp_customize->add_control(new Nobel_Magazine_Background_Control($wp_customize, 'nobel_magazine_footer_bg', array(
        'label' => esc_html__('Footer Background', 'nobel-magazine'),
        'section' => 'nobel_magazine_footer_section',
        'settings' => array(
            'image_url' => 'nobel_magazine_footer_bg_url',
            'image_id' => 'nobel_magazine_footer_bg_id',
            'repeat' => 'nobel_magazine_footer_bg_repeat', // Use false to hide the field
            'size' => 'nobel_magazine_footer_bg_size',
            'position' => 'nobel_magazine_footer_bg_position',
            'attach' => 'nobel_magazine_footer_bg_attach'
        )
    )));

    $wp_customize->add_setting('nobel_magazine_footer_bg_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'nobel_magazine_sanitize_color_alpha',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Alpha_Color_Control($wp_customize, 'nobel_magazine_footer_bg_color', array(
        'label' => esc_html__('Footer Background/Overlay Color', 'nobel-magazine'),
        'description' => esc_html__('To use background image, set the opacity of background color to 0', 'nobel-magazine'),
        'section' => 'nobel_magazine_footer_section'
    )));

    $wp_customize->add_setting('nobel_magazine_footer_title_color', array(
        'default' => '#EEEEEE',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh'
    ));

    $wp_customize->add_setting('nobel_magazine_footer_border_color', array(
        'default' => '#444444',
        'sanitize_callback' => 'nobel_magazine_sanitize_color_alpha',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Alpha_Color_Control($wp_customize, 'nobel_magazine_footer_border_color', array(
        'label' => esc_html__('Footer Border Color', 'nobel-magazine'),
        'section' => 'nobel_magazine_footer_section'
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_footer_title_color', array(
        'section' => 'nobel_magazine_footer_section',
        'label' => esc_html__('Footer Title Color', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_footer_text_color', array(
        'default' => '#EEEEEE',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_footer_text_color', array(
        'section' => 'nobel_magazine_footer_section',
        'label' => esc_html__('Footer Text Color', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_footer_anchor_color', array(
        'default' => '#EEEEEE',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nobel_magazine_footer_anchor_color', array(
        'section' => 'nobel_magazine_footer_section',
        'label' => esc_html__('Footer Anchor Color', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_mid_footer_heading', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text'
    ));
    
    $wp_customize->add_control(new Nobel_Magazine_Heading_Custom_Control($wp_customize, 'nobel_magazine_mid_footer_heading', array(
        'section' => 'nobel_magazine_footer_section',
        'label' => esc_html__('Mid Footer', 'nobel-magazine')
    )));

    $wp_customize->add_setting( 'nobel_magazine_footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'nobel_magazine_sanitize_url'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nobel_magazine_footer_logo', array(
        'label'   => esc_html__( 'Footer Logo', 'nobel-magazine' ),
        'section' => 'nobel_magazine_footer_section',
        'settings'   => 'nobel_magazine_footer_logo',
    ) ) );

    $wp_customize->add_setting('nobel_magazine_footer_enable_socialicons', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'off'
    ));
    
    $wp_customize->add_control(new Nobel_Magazine_Switch_Control($wp_customize, 'nobel_magazine_footer_enable_socialicons', array(
        'section' => 'nobel_magazine_footer_section',
        'label' => esc_html__('Enable Sticky Header', 'nobel-magazine'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'nobel-magazine'),
            'off' => esc_html__('No', 'nobel-magazine')
        )
    )));

    $wp_customize->add_setting('nobel_magazine_bottom_footer_heading', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text'
    ));
    
    $wp_customize->add_control(new Nobel_Magazine_Heading_Custom_Control($wp_customize, 'nobel_magazine_bottom_footer_heading', array(
        'section' => 'nobel_magazine_footer_section',
        'label' => esc_html__('Bottom Footer', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_footer_copyright', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => esc_html__('&copy; 2020 Viral News. All Right Reserved.', 'nobel-magazine'),
        'transport' => 'refresh'
    ));

    $wp_customize->add_control('nobel_magazine_footer_copyright', array(
        'section' => 'nobel_magazine_footer_section',
        'type' => 'textarea',
        'label' => esc_html__('Copyright Text', 'nobel-magazine'),
        'description' => esc_html__('Custom HTMl and Shortcodes Supported', 'nobel-magazine')
    ));
