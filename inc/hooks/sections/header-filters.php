<?php

/** Add Classes to header */
add_filter('nobel_magazine_header_class', 'nobel_magazine_header_class_cb');
if (!function_exists('nobel_magazine_header_class_cb')) {

    function nobel_magazine_header_class_cb($classes) {
        /** Header Layout */
        $header_layout = get_theme_mod('nobel_magazine_mh_layout', 'nm-header-style1');
        $classes[] = $header_layout;

        /** Sticky Header */
        $sticky_header = get_theme_mod('nobel_magazine_sticky_header', '');
        if ($sticky_header == 'on') {
            $classes[] = 'nm-sticky';
        }

        return $classes;
    }

}

if (!function_exists('nobel_magazine_header_class')) {

    function nobel_magazine_header_class() {
        $classes = array(
            'nm-site-header',
        );
        $classes_html = 'class="';

        if (has_filter('nobel_magazine_header_class')) {
            $classes = apply_filters('nobel_magazine_header_class', $classes);
        }

        foreach ($classes as $class) :
            $classes_html .= $class . ' ';
        endforeach;

        $classes_html = rtrim($classes_html);

        $classes_html .= '"';

        echo $classes_html;
    }

}