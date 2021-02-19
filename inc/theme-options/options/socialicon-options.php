<?php
    /** Social Icons */
    $wp_customize->add_section( 'nobel_magazine_social_icons_section', array(
        'title' => esc_html__( 'Social Icons', 'nobel-magazine' ),
        'description' => esc_html__( 'Add social icons for the header', 'nobel-magazine' ),
    ) );

        /** Social Icons */
        $wp_customize->add_setting( 'nobel_magazine_social_icons', array(
            'sanitize_callback' => 'nobel_magazine_sanitize_repeater',
            'default' => json_encode(array(
                array(
                    'icon' => 'icofont-facebook',
                    'link' => '#',
                    'enable' => 'on'
                ),
                array(
                    'icon' => 'icofont-twitter',
                    'link' => '#',
                    'enable' => 'on'
                ),
                array(
                    'icon' => 'icofont-instagram',
                    'link' => '#',
                    'enable' => 'on'
                ),
                array(
                    'icon' => 'icofont-youtube',
                    'link' => '#',
                    'enable' => 'on'
                )
            ))
        ) );
        
        $wp_customize->add_control(new Nobel_Magazine_Repeater_Controler( $wp_customize, 'nobel_magazine_social_icons', array(
            'label' => esc_html__('Add Social Link', 'nobel-magazine'),
            'section' => 'nobel_magazine_social_icons_section',
            'box_label' => esc_html__('Social Links', 'nobel-magazine'),
            'add_label' => esc_html__('Add New', 'nobel-magazine'),
                ), array(
            'icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Select Icon', 'nobel-magazine'),
                'default' => 'icofont-facebook'
            ),
            'link' => array(
                'type' => 'text',
                'label' => esc_html__('Add Link', 'nobel-magazine'),
                'default' => ''
            ),
            'enable' => array(
                'type' => 'switch',
                'label' => esc_html__('Enable', 'nobel-magazine'),
                'switch' => array(
                    'on' => 'Yes',
                    'off' => 'No'
                ),
                'default' => 'on'
            )
        )));