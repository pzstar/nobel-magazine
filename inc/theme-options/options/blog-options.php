<?php
    /** Blog Page Options */
    $wp_customize->add_section('nobel_magazine_blog_options_section', array(
        'title' => __('Blog/Single Post Settings', 'nobel-magazine'),
        'priority' => 30
    ));

    $wp_customize->add_setting('nobel_magazine_blog_sec_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control(new Nobel_Magazine_Tab($wp_customize, 'nobel_magazine_blog_sec_nav', array(
        'section' => 'nobel_magazine_blog_options_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('BLog Page', 'nobel-magazine'),
                'fields' => array(
                    'nobel_magazine_display_frontpage_sections',
                    'nobel_magazine_blog_layout',
                    'nobel_magazine_blog_cat',
                    'nobel_magazine_archive_content',
                    'nobel_magazine_archive_excerpt_length',
                    'nobel_magazine_archive_readmore',
                    'nobel_magazine_blog_date',
                    'nobel_magazine_blog_excerpt_length',
                    'nobel_magazine_blog_author',
                    'nobel_magazine_blog_comment',
                    'nobel_magazine_blog_category',
                    'nobel_magazine_blog_tag',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Single Post', 'nobel-magazine'),
                'fields' => array(
                    'nobel_magazine_single_layout',
                    'nobel_magazine_single_categories',
                    'nobel_magazine_single_seperator1',
                    'nobel_magazine_single_author',
                    'nobel_magazine_single_date',
                    'nobel_magazine_single_comment_count',
                    'nobel_magazine_single_views',
                    'nobel_magazine_single_reading_time',
                    'nobel_magazine_single_seperator2',
                    'nobel_magazine_single_tags',
                    'nobel_magazine_single_social_share',
                    'nobel_magazine_single_author_box',
                    'nobel_magazine_single_seperator3',
                    'nobel_magazine_single_prev_next_post',
                    'nobel_magazine_single_comments',
                    'nobel_magazine_single_related_posts',
                    'nobel_magazine_single_related_heading',
                    'nobel_magazine_single_related_post_title',
                    'nobel_magazine_single_related_post_style',
                    'nobel_magazine_single_related_post_count'
                ),
            ),
        ),
    )));

    $wp_customize->add_setting('nobel_magazine_display_frontpage_sections', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'off'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Switch($wp_customize, 'nobel_magazine_display_frontpage_sections', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Front Page Sections', 'nobel-magazine'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'nobel-magazine'),
            'off' => esc_html__('No', 'nobel-magazine')
        ),
        'description' => sprintf(esc_html__('Display Front Page sections before the blog. Customize Front Page sections %s', 'nobel-magazine'), '<a href="javascript:wp.customize.panel( \'nobel_magazine_front_page_panel\' ).focus()">' . esc_html__('here', 'nobel-magazine') . '</a>'),
    )));

    $wp_customize->add_setting('nobel_magazine_blog_layout', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'blog-layout1'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Image_Selector($wp_customize, 'nobel_magazine_blog_layout', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Blog & Archive Layout', 'nobel-magazine'),
        'image_path' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'blog-layouts/',
        'choices' => array(
            'blog-layout1' => esc_html__('Layout 1', 'nobel-magazine'),
            'blog-layout2' => esc_html__('Layout 2', 'nobel-magazine'),
        )
    )));

    $wp_customize->add_setting('nobel_magazine_blog_cat', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Select2_Control($wp_customize, 'nobel_magazine_blog_cat', array(
        'label' => esc_html__('Exclude Category', 'nobel-magazine'),
        'section' => 'nobel_magazine_blog_options_section',
        'choices' => nobel_magazine_categories_list(),
        'description' => esc_html__('Post with selected category will not display in the blog page', 'nobel-magazine')
    )));

    // $wp_customize->add_setting('nobel_magazine_blog_cat', array(
    //     'sanitize_callback' => 'nobel_magazine_sanitize_text'
    // ));

    // $wp_customize->add_control(new Nobel_Magazine_Customize_Checkbox_Multiple($wp_customize, 'nobel_magazine_blog_cat', array(
    //     'label' => esc_html__('Exclude Category', 'nobel-magazine'),
    //     'section' => 'nobel_magazine_blog_options_section',
    //     'choices' => nobel_magazine_categories_list(),
    //     'description' => esc_html__('Post with selected category will not display in the blog page', 'nobel-magazine')
    // )));

    $wp_customize->add_setting('nobel_magazine_archive_content', array(
        'default' => 'excerpt',
        'sanitize_callback' => 'nobel_magazine_sanitize_choices'
    ));

    $wp_customize->add_control('nobel_magazine_archive_content', array(
        'section' => 'nobel_magazine_blog_options_section',
        'type' => 'radio',
        'label' => esc_html__('Archive Content', 'nobel-magazine'),
        'choices' => array(
            'full-content' => esc_html__('Full Content', 'nobel-magazine'),
            'excerpt' => esc_html__('Excerpt', 'nobel-magazine')
        )
    ));

    $wp_customize->add_setting('nobel_magazine_archive_excerpt_length', array(
        'sanitize_callback' => 'absint',
        'default' => 100
    ));

    $wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_archive_excerpt_length', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Excerpt Length (words)', 'nobel-magazine'),
        'input_attrs' => array(
            'min' => 50,
            'max' => 200,
            'step' => 1
        )
    )));

    $wp_customize->add_setting('nobel_magazine_archive_readmore', array(
        'default' => esc_html__('Read More', 'nobel-magazine'),
        'sanitize_callback' => 'nobel_magazine_sanitize_text'
    ));

    $wp_customize->add_control('nobel_magazine_archive_readmore', array(
        'section' => 'nobel_magazine_blog_options_section',
        'type' => 'text',
        'label' => esc_html__('Read More Text', 'nobel-magazine')
    ));

    $wp_customize->add_setting('nobel_magazine_blog_excerpt_length', array(
        'default' => 250,
        'sanitize_callback' => 'absint',
        'transport' => 'refresh'
    ));
    
    $wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_blog_excerpt_length', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Excerpt Length', 'nobel-magazine'),
        'description' => esc_html__('(in Chars)', 'nobel-magazine'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 500,
            'step' => 1
        )
    )));

    $wp_customize->add_setting('nobel_magazine_blog_date', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_blog_date', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Posted Date', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_blog_author', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_blog_author', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Author', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_blog_comment', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_blog_comment', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Comment', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_blog_category', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_blog_category', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Category', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_blog_tag', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_blog_tag', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Tag', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_single_layout', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => 'single-layout1'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Image_Selector($wp_customize, 'nobel_magazine_single_layout', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Single Post Layout', 'nobel-magazine'),
        'description' => esc_html__('This option can be overwritten in single page settings.', 'nobel-magazine'),
        'image_path' => GOOD_MAGAZINE_OPT_DIR_URI_IMAGES . 'single-layouts/',
        'choices' => array(
            'single-layout1' => esc_html__('Layout 1', 'nobel-magazine'),
            'single-layout2' => esc_html__('Layout 2', 'nobel-magazine'),
        )
    )));

    $wp_customize->add_setting('nobel_magazine_single_categories', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_single_categories', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Categories', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_single_author', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_single_author', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Author', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_single_date', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_single_date', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Posted Date', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_single_comment_count', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_single_comment_count', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Comment Count', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_single_tags', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_boolean',
        'default' => true
    ));

    $wp_customize->add_control(new Nobel_Magazine_Toggle($wp_customize, 'nobel_magazine_single_tags', array(
        'section' => 'nobel_magazine_blog_options_section',
        'label' => esc_html__('Display Tags', 'nobel-magazine')
    )));

    $wp_customize->add_setting('nobel_magazine_single_author_box', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'default' => true
    ));

    $wp_customize->add_setting('nobel_magazine_single_seperator3', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text',
        'transport' => 'refresh'
    ));