<?php
    /** Add Classes to footer */
    add_filter( 'nobel_magazine_foooter_class', 'nobel_magazine_foooter_class_cb' );
    if( !function_exists( 'nobel_magazine_foooter_class_cb' ) ) {
        function nobel_magazine_foooter_class_cb( $classes ) {
            /** Footer Column Layout */
            $footer_column = get_theme_mod( 'nobel_magazine_footer_col', 'col-4' );
            $classes[] = 'gm-'.$footer_column;

            return $classes;
        }
    }

    if( !function_exists( 'nobel_magazine_foooter_class' ) ) {
        function nobel_magazine_foooter_class() {
            $classes = array(
                'gm-site-footer',
            );
            $classes_html = 'class="';
        
            if( has_filter( 'nobel_magazine_foooter_class' ) ) {
                $classes = apply_filters( 'nobel_magazine_foooter_class', $classes );
            }
        
            foreach( $classes as $class ) {
                $classes_html .= $class . ' ';
            }

            $classes_html = rtrim( $classes_html );
        
            $classes_html .= '"';
        
            echo $classes_html;
        }
    }