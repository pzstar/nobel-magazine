<?php
    /** Helper Functions */
    function nobel_magazine_load_helper_functions() {
        function nobel_magazine_widget_lists() {
            global $wp_registered_sidebars;

            $widget_list['none'] = esc_html__('-- Choose Widget --', 'nobel-magazine');
            
            foreach( $wp_registered_sidebars as $sidebar ) {
                $widget_list[$sidebar['id']] = $sidebar['name'];
            }

            return $widget_list;
        }
    }
    add_action('init', 'nobel_magazine_load_helper_functions');

    /** Get List of Menus */
    function nobel_magazine_get_menulist() {
        $menus = wp_get_nav_menus();

        $menu_list['none'] = esc_html__( ' -- Choose Menu -- ', 'nobel-magazine' );
        foreach( $menus as $menu ) {
            $menu_list[$menu->slug] = $menu->name;
        }
        
        return $menu_list;
    }

    /** Categories List */
    function nobel_magazine_categories_list() {
        
        $categories = get_categories( array( 'hide_empty' => true ) );
        $categories_list = array();
        if( !empty( $categories ) ) {
            foreach( $categories as $category ) {
                $categories_list[$category->term_id] = $category->name;
            }
        }

        return $categories_list;
    }