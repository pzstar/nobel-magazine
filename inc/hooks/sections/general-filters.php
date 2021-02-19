<?php
    /** General Filter Hooks */

        /**
         * Add a pingback url auto-discovery header for single posts, pages, or attachments.
         */
        function nobel_magazine_pingback_header() {
            if ( is_singular() && pings_open() ) {
                printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
            }
        }
        add_action( 'wp_head', 'nobel_magazine_pingback_header' );

        /** Add Custom Classes to Body */
        add_filter( 'body_class', 'nobel_magazine_body_classes' );
        if( !function_exists( 'nobel_magazine_body_classes' ) ) {
            function nobel_magazine_body_classes( $classes ) {
                // Adds a class of hfeed to non-singular pages.
                if ( ! is_singular() ) {
                    $classes[] = 'hfeed';
                }

                /** Website Layout */
                $website_layout = get_theme_mod( 'nobel_magazine_website_layout', '' );
                if( $website_layout ) {
                    $classes[] = $website_layout;
                }

                /** Sidebar Class */
                if ( ! is_active_sidebar( 'sidebar-1' ) ) {
                    $classes[] = 'no-sidebar';
                }
                
                $page_layout = '';
                $blog_layout = '';
                $post_layout = '';

                if( !is_front_page() ) {
                    if( is_page() ) {
                        $page_layout = get_theme_mod( 'nobel_magazine_page_layout', 'right-sidebar' );
                    } elseif( is_single() ) {
                        $page_layout = get_theme_mod( 'nobel_magazine_post_layout', 'right-sidebar' );
                        $post_layout = get_theme_mod( 'nobel_magazine_single_layout', 'single-layout1' );
                    } elseif( is_archive() ) {
                        $page_layout = get_theme_mod( 'nobel_magazine_archive_layout', 'right-sidebar' );
                        $blog_layout = get_theme_mod( 'nobel_magazine_blog_layout', 'blog-layout1' );
                    } elseif( is_home() ) {
                        $page_layout = get_theme_mod( 'nobel_magazine_home_blog_layout', 'right-sidebar' );
                        $blog_layout = get_theme_mod( 'nobel_magazine_blog_layout', 'blog-layout1' );
                    } elseif( is_search() ) {
                        $page_layout = get_theme_mod( 'nobel_magazine_search_layout', 'right-sidebar' );
                    } elseif( class_exists( 'woocommerce' ) ) {
                        if( is_woocommerce() ) {
                            $page_layout = get_theme_mod( 'nobel_magazine_shop_layout', 'right-sidebar' );
                        }
                    }
                }
                $classes[] = $page_layout;
                $classes[] = $blog_layout;
                $classes[] = $post_layout;

                return $classes;
            }
        }
        
        /** Exclude Categories */
        add_filter('pre_get_posts', 'nobel_magazine_exclude_categories');
        if( !function_exists( 'nobel_magazine_exclude_categories' ) ) {
            function nobel_magazine_exclude_categories( $query ) {
                $exclude_cat = get_theme_mod( 'nobel_magazine_blog_cat', 0 );

                if( !$exclude_cat ) {
                    return;
                }

                $exclude_cat_array = explode( ',', $exclude_cat );

                if( is_array( $exclude_cat_array ) ) {
                    if ( $query->is_home() || is_archive() ) {
                        $query->set('category__not_in', $exclude_cat_array);
                    }
                    return $query;
                }
            }
        }