<?php

/**
 * Register customizer panels, sections, settings, and controls.
 *
 * @since  1.0.0
 * @access public
 * @param  object  $wp_customize
 * @return void
 */
# Register our customizer panels, sections, settings, and controls.
require get_template_directory() . '/inc/typography/google-fonts-list.php';

add_action('customize_register', 'nobel_magazine_typography_customize_register', 15);

function nobel_magazine_typography_customize_register($wp_customize) {

    require get_template_directory() . '/inc/typography/customizer-typography-control-class.php';

    // Register typography control JS template.
    $wp_customize->register_control_type('Nobel_Magazine_Typography_Control');

    // Add the typography panel.
    $wp_customize->add_panel('nobel_magazine_typography', array(
        'priority' => 50,
        'title' => esc_html__('Typography Settings', 'nobel-magazine')
    ));

    // Add the body typography section.
    $wp_customize->add_section('nobel_magazine_body_typography', array(
        'panel' => 'nobel_magazine_typography',
        'title' => esc_html__('Body', 'nobel-magazine')
    ));

    $wp_customize->add_setting('nobel_magazine_body_font_family', array(
        'default' => 'Roboto',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('nobel_magazine_body_font_size', array(
        'default' => '15',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Typography_Control($wp_customize, 'nobel_magazine_body_typography', array(
        'label' => esc_html__('Body Typography', 'nobel-magazine'),
        'description' => __('Select how you want your body to appear.', 'nobel-magazine'),
        'section' => 'nobel_magazine_body_typography',
        'settings' => array(
            'family' => 'nobel_magazine_body_font_family',
            'size' => 'nobel_magazine_body_font_size',
        ),
        'input_attrs' => array(
            'min' => 10,
            'max' => 40,
            'step' => 1
        )
    )));

    // Add H1 typography section.
    $wp_customize->add_section('nobel_magazine_header_typography', array(
        'panel' => 'nobel_magazine_typography',
        'title' => esc_html__('Headers(H1, H2, H3, H4, H5, H6)', 'nobel-magazine')
    ));

    // Add H typography section.
    $wp_customize->add_setting('nobel_magazine_h_font_family', array(
        'default' => 'Roboto',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Typography_Control($wp_customize, 'nobel_magazine_h_typography', array(
        'label' => esc_html__('Header Typography', 'nobel-magazine'),
        'description' => __('Select how you want your Header to appear.', 'nobel-magazine'),
        'section' => 'nobel_magazine_header_typography',
        'settings' => array(
            'family' => 'nobel_magazine_h_font_family',
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    $wp_customize->add_setting('nobel_magazine_h_typography_seperator', array(
        'sanitize_callback' => 'nobel_magazine_sanitize_text'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Separator($wp_customize, 'nobel_magazine_h_typography_seperator', array(
        'section' => 'nobel_magazine_header_typography'
    )));

    $wp_customize->add_setting('nobel_magazine_hh1_font_size', array(
        'sanitize_callback' => 'absint',
        'default' => 38,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_hh1_font_size', array(
        'section' => 'nobel_magazine_header_typography',
        'label' => esc_html__('H1 Font Size', 'nobel-magazine'),
        'input_attrs' => array(
            'min' => 14,
            'max' => 100,
            'step' => 1
        ),
        'unit' => 'px'
    )));

    $wp_customize->add_setting('nobel_magazine_hh2_font_size', array(
        'sanitize_callback' => 'absint',
        'default' => 34,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_hh2_font_size', array(
        'section' => 'nobel_magazine_header_typography',
        'label' => esc_html__('H2 Font Size', 'nobel-magazine'),
        'input_attrs' => array(
            'min' => 14,
            'max' => 100,
            'step' => 1
        ),
        'unit' => 'px'
    )));

    $wp_customize->add_setting('nobel_magazine_hh3_font_size', array(
        'sanitize_callback' => 'absint',
        'default' => 30,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_hh3_font_size', array(
        'section' => 'nobel_magazine_header_typography',
        'label' => esc_html__('H3 Font Size', 'nobel-magazine'),
        'input_attrs' => array(
            'min' => 14,
            'max' => 100,
            'step' => 1
        ),
        'unit' => 'px'
    )));

    $wp_customize->add_setting('nobel_magazine_hh4_font_size', array(
        'sanitize_callback' => 'absint',
        'default' => 26,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_hh4_font_size', array(
        'section' => 'nobel_magazine_header_typography',
        'label' => esc_html__('H4 Font Size', 'nobel-magazine'),
        'input_attrs' => array(
            'min' => 14,
            'max' => 100,
            'step' => 1
        ),
        'unit' => 'px'
    )));

    $wp_customize->add_setting('nobel_magazine_hh5_font_size', array(
        'sanitize_callback' => 'absint',
        'default' => 22,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_hh5_font_size', array(
        'section' => 'nobel_magazine_header_typography',
        'label' => esc_html__('H5 Font Size', 'nobel-magazine'),
        'input_attrs' => array(
            'min' => 14,
            'max' => 100,
            'step' => 1
        ),
        'unit' => 'px'
    )));

    $wp_customize->add_setting('nobel_magazine_hh6_font_size', array(
        'sanitize_callback' => 'absint',
        'default' => 18,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Nobel_Magazine_Range_Slider($wp_customize, 'nobel_magazine_hh6_font_size', array(
        'section' => 'nobel_magazine_header_typography',
        'label' => esc_html__('H6 Font Size', 'nobel-magazine'),
        'input_attrs' => array(
            'min' => 14,
            'max' => 100,
            'step' => 1
        ),
        'unit' => 'px'
    )));
}

/**
 * Register control scripts/styles.
 *
 */
add_action('customize_controls_enqueue_scripts', 'nobel_magazine_typography_customizer_script');

function nobel_magazine_typography_customizer_script() {
    wp_enqueue_script('nobel-magazine-customize-controls', get_template_directory_uri() . '/inc/typography/js/customize-controls.js', array('jquery'), '1.0.0', true);
    wp_enqueue_style('nobel-magazine-customize-controls', get_template_directory_uri() . '/inc/typography/css/customize-controls.css');
}

/**
 * Load preview scripts/styles.
 *
 */
add_action('customize_preview_init', 'nobel_magazine_typography_customize_preview_script');

function nobel_magazine_typography_customize_preview_script() {
    wp_enqueue_script('webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', array('jquery'));
    wp_enqueue_script('nobel-magazine-customize-preview', get_template_directory_uri() . '/inc/typography/js/customize-previews.js', array('jquery', 'customize-preview', 'webfont'));
}

function nobel_magazine_get_google_font_variants() {

    $font_list = array_merge(nobel_magazine_standard_font_array(), nobel_magazine_google_font_array());

    $font_family = $_REQUEST['font_family'];
    $font_array = nobel_magazine_search_key($font_list, 'family', $font_family);

    $variants_array = $font_array['0']['variants'];
    $options_array = "";
    foreach ($variants_array as $key => $variants) {
        $selected = $key == '400' ? 'selected="selected"' : '';
        $options_array .= '<option ' . $selected . ' value="' . $key . '">' . $variants . '</option>';
    }

    if (!empty($options_array)) {
        echo $options_array;
    } else {
        echo $options_array = '';
    }
    die();
}

add_action("wp_ajax_get_google_font_variants", "nobel_magazine_get_google_font_variants");

function nobel_magazine_search_key($array, $key, $value) {
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }
        foreach ($array as $subarray) {
            $results = array_merge($results, nobel_magazine_search_key($subarray, $key, $value));
        }
    }
    return $results;
}
