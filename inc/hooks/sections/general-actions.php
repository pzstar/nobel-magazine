<?php
    /** Displays Preloader */
    add_action( 'nobel_magazine_extra_elements', 'nobel_magazine_preloader_cb', 10 );
    if( !function_exists( 'nobel_magazine_preloader_cb' ) ) {
        function nobel_magazine_preloader_cb() {
            $enable_preloader = get_theme_mod( 'nobel_magazine_enable_preloader', 1 );
            if( $enable_preloader ) {
                ?>
                    <div class="gm-preloader">
                        <svg width="200" height="200" viewBox="0 0 100 100">
                            <polyline class="line-cornered stroke-still" points="0,0 100,0 100,100" stroke-width="10" fill="none"></polyline>
                            <polyline class="line-cornered stroke-still" points="0,0 0,100 100,100" stroke-width="10" fill="none"></polyline>
                            <polyline class="line-cornered stroke-animation" points="0,0 100,0 100,100" stroke-width="10" fill="none"></polyline>
                            <polyline class="line-cornered stroke-animation" points="0,0 0,100 100,100" stroke-width="10" fill="none"></polyline>
                        </svg>
                    </div>
                <?php
            }
        }
    }

    /** Displays go to Top */
    add_action( 'nobel_magazine_extra_elements', 'nobel_magazine_gotop_cb', 20 );
    if( !function_exists( 'nobel_magazine_gotop_cb' ) ) {
        function nobel_magazine_gotop_cb() {
            $enable_gotop = get_theme_mod( 'nobel_magazine_backtotop', '' );

            if( $enable_gotop ) {
                ?>
                <a href="#" id="gotop"><i class="icofont-arrow-up"></i></a>
                <?php
            }
        }
    }

    /** Displays Sidebar */
    add_action( 'nobel_magazine_display_sidebar', 'nobel_magazine_display_sidebar_cb' );
    if( !function_exists( 'nobel_magazine_display_sidebar_cb' ) ) {
        function nobel_magazine_display_sidebar_cb() {
            if ( ! is_active_sidebar( 'sidebar-1' ) ) {
                return;
            }

            $page_layout = 'right-sidebar';
            
            if( !is_front_page() ) {
                if( is_page() ) {
                    $page_layout = get_theme_mod( 'nobel_magazine_page_layout', 'right-sidebar' );
                } elseif( is_single() ) {
                    $page_layout = get_theme_mod( 'nobel_magazine_post_layout', 'right-sidebar' );
                    $post_layout = get_theme_mod( 'nobel_magazine_single_layout', 'single-layout1' );
                } elseif( is_archive() ) {
                    $page_layout = get_theme_mod( 'nobel_magazine_archive_layout', 'right-sidebar' );
                } elseif( is_home() ) {
                    $page_layout = get_theme_mod( 'nobel_magazine_home_blog_layout', 'right-sidebar' );
                } elseif( is_search() ) {
                    $page_layout = get_theme_mod( 'nobel_magazine_search_layout', 'right-sidebar' );
                } elseif( class_exists( 'woocommerce' ) ) {
                    if( is_woocommerce() ) {
                        $page_layout = get_theme_mod( 'nobel_magazine_shop_layout', 'right-sidebar' );
                    }
                }
            }
            
            if( $page_layout == 'no-sidebar-narrow' || $page_layout == 'no-sidebar' ) {
                return;
            }
            ?>
            <aside id="secondary" class="widget-area">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </aside><!-- #secondary -->
            <?php
        }
    }