<?php
/** Header Start */
add_action('nobel_magazine_header', 'nobel_magazine_header_start_cb', 10);
if (!function_exists('nobel_magazine_header_start_cb')) {

    function nobel_magazine_header_start_cb() {
        ?>
        <header id="gm-masthead" <?php nobel_magazine_header_class(); ?>>
            <?php
        }

    }

    /** Top Header */
    add_action('nobel_magazine_header', 'nobel_magazine_top_header_cb', 20);
    if (!function_exists('nobel_magazine_top_header_cb')) {

        function nobel_magazine_top_header_cb() {
            $top_header_display = get_theme_mod('nobel_magazine_top_header_display', 'none');
            $top_header_class = '';

            $top_header_left = get_theme_mod('nobel_magazine_th_left_display', 'date');
            $top_header_center = get_theme_mod('nobel_magazine_th_center_display', 'date');
            $top_header_right = get_theme_mod('nobel_magazine_th_right_display', 'date');

            if( $top_header_display == 'center' ) {
                $top_header_class = 'gm-top-header-with-center';
            } else if( $top_header_display == 'left' ) {
                $top_header_class = 'gm-top-header-with-left';
            } else if( $top_header_display == 'right' ) {
                $top_header_class = 'gm-top-header-with-right';
            } else if( $top_header_display == 'left-right' ) {
                $top_header_class = 'gm-top-header-with-left-right';
            }

            if ( $top_header_display !== 'none' ) {
                ?>
                <div class="gm-top-header <?php echo esc_attr( $top_header_class ); ?>">
                    <div class="gm-container">
                        <?php if( $top_header_display == 'left' || $top_header_display == 'left-right' ) : ?>
                            <div class="gm-top-header-left">
                                <?php
                                switch ( $top_header_left ) {
                                    case 'social':
                                        nobel_magazine_socialicons();
                                        break;

                                    case 'menu':
                                        nobel_magazine_top_menu();
                                        break;

                                    case 'widget':
                                        nobel_magazine_top_widget();
                                        break;

                                    case 'text':
                                        nobel_magazine_top_txtblock();
                                        break;

                                    case 'ticker':
                                        nobel_magazine_top_newsticker();
                                        break;

                                    case 'date':
                                        nobel_magazine_top_date();
                                        break;

                                    default:
                                        break;
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if( $top_header_display == 'center' ) : ?>
                            <div class="gm-top-header-center">
                                <?php
                                switch ( $top_header_center ) {
                                    case 'social':
                                        nobel_magazine_socialicons();
                                        break;

                                    case 'menu':
                                        nobel_magazine_top_menu();
                                        break;

                                    case 'widget':
                                        nobel_magazine_top_widget();
                                        break;

                                    case 'text':
                                        nobel_magazine_top_txtblock();
                                        break;

                                    case 'ticker':
                                        nobel_magazine_top_newsticker();
                                        break;

                                    case 'date':
                                        nobel_magazine_top_date();
                                        break;

                                    default:
                                        break;
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if( $top_header_display == 'right' || $top_header_display == 'left-right' ) : ?>
                            <div class="gm-top-header-right">
                                <?php
                                switch ($top_header_right) {
                                    case 'social':
                                        nobel_magazine_socialicons();
                                        break;

                                    case 'menu':
                                        nobel_magazine_top_menu();
                                        break;

                                    case 'widget':
                                        nobel_magazine_top_widget();
                                        break;

                                    case 'text':
                                        nobel_magazine_top_txtblock();
                                        break;

                                    case 'ticker':
                                        nobel_magazine_top_newsticker();
                                        break;

                                    case 'date':
                                        nobel_magazine_top_date();
                                        break;

                                    default:
                                        break;
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            }
        }

    }

    /** Main Header */
    add_action('nobel_magazine_header', 'nobel_magazine_main_header_cb', 30);
    if (!function_exists('nobel_magazine_main_header_cb')) {

        function nobel_magazine_main_header_cb() {
            $header_layout = get_theme_mod('nobel_magazine_mh_layout', 'gm-header-style1');

            /** Displays Main Header Section */
            if ($header_layout == 'gm-header-style1') {
                nobel_magazine_header_layout1();
            } elseif ($header_layout == 'gm-header-style2') {
                nobel_magazine_header_layout2();
            }
        }

    }

    /** Header End */
    add_action('nobel_magazine_header', 'nobel_magazine_header_end_cb', 40);
    if (!function_exists('nobel_magazine_header_end_cb')) {

        function nobel_magazine_header_end_cb() {
            ?>
        </header><!-- #masthead -->
        <?php
    }

}

/** Inner page Banner Section */
add_action('nobel_magazine_header', 'nobel_magazine_inner_page_banner_cb', 50);
if (!function_exists('nobel_magazine_inner_page_banner_cb')) {

    function nobel_magazine_inner_page_banner_cb() {
        $display_breadcrumb = get_theme_mod('nobel_magazine_breadcrumb', 1);
        $post_layout = get_theme_mod('nobel_magazine_single_layout', 'single-layout1');
        
        if( is_front_page() ) {
            return;
        }

        if (is_single('post' && 'single-layout2' != $post_layout)) {
            $display_category = get_theme_mod('nobel_magazine_single_categories', '');
            $display_author = get_theme_mod('nobel_magazine_single_author', 1);
            $display_comments = get_theme_mod('nobel_magazine_blog_comment', 1);

            if (has_post_thumbnail()) {
                $post_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            }
            ?>
            <div class="inner-page-banner post-inner-page-banner" data-image-src="<?php echo esc_url($post_image[0]); ?>">
                <div class="gm-container">
                    <?php
                    if ($display_category) {
                        nobel_magazine_post_categories_list(get_the_id());
                    }
                    ?>

                    <h1 class="post-title"><?php the_title(); ?></h1>

                    <?php
                    if ($display_author || $display_comments) {
                        ?>
                        <div class="author-comments">
                            <?php if ($display_author) : ?>
                                <?php printf('%1$s %2$s - %3$s', esc_html__('By', 'nobel-magazine'), esc_attr(get_the_author_meta('display_name')), esc_attr(get_the_date('F j, Y'))); ?>
                            <?php endif; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        } else {
            $page_title = nobel_magazine_get_title();
            ?>
            <div class="inner-page-banner">
                <div class="gm-container">
                    <h1 class="page-title">
                        <?php
                        echo wp_kses($page_title, array(
                            'span' => array()
                        ));
                        ?>
                    </h1>

                    <?php
                    if (function_exists('nobel_magazine_breadcrumb') && $display_breadcrumb) {
                        nobel_magazine_breadcrumb(array(
                            'show_browse' => false,
                        ));
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }

}

/** Get Inner page titles */
if (!function_exists('nobel_magazine_get_title')) {

    function nobel_magazine_get_title() {
        $page_title = '';

        if (is_singular()) {
            $page_title = get_the_title();
        } elseif (is_home()) {
            $page_title = single_post_title('', false);
        } elseif (is_archive()) {
            $page_title = get_the_archive_title();
        } elseif (is_search()) {
            $page_title = esc_html__('Search Result for: ', 'nobel-magazine') . '<span>' . esc_html(get_search_query()) . '</span>';
        } elseif (is_404()) {
            $page_title = esc_html__('404 Error', 'nobel-magazine');
        }

        return $page_title;
    }

}

/** Displays Main Header (Layout 1) */
if (!function_exists('nobel_magazine_site_branding')) {

    function nobel_magazine_site_branding() {
        ?>
        <div class="gm-site-branding">
            <?php
            the_custom_logo();

            $nobel_magazine_description = get_bloginfo('description', 'display');
            if ($nobel_magazine_description || is_customize_preview()) :
                ?>
                <div class="gm-site-title-description">
                    <?php
                    if (is_front_page() && is_home()) :
                        ?>
                        <h1 class="gm-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <p class="gm-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;
                    ?>
                    <p class="gm-site-description"><?php echo $nobel_magazine_description; /* WPCS: xss ok. */ ?></p>
                </div>
            <?php endif; ?>
        </div><!-- .site-branding -->
        <?php
    }

}

if (!function_exists('nobel_magazine_site_navigation')) {

    function nobel_magazine_site_navigation() {
        ?>
        <nav id="gm-site-navigation" class="gm-main-navigation">
            <button class="gm-menu-toggle"><span></span></button>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'nobel-magazine-primary-menu',
                'container' => false,
                'menu_id' => 'gm-primary-menu',
                'fallback_cb' => false
            ));
            ?>
        </nav><!-- #site-navigation -->
        <?php
    }

}

if (!function_exists('nobel_magazine_site_search')) {

    function nobel_magazine_site_search() {
        $show_search = get_theme_mod('nobel_magazine_mh_show_search', '');
        if ($show_search) :
            ?>
            <div class="gm-search-icon">
                <a href="#" class="gm-search-open"><i class="icon_search"></i></a>
            </div>

            <div class="gm-search-wrap">
                <span class="gm-search-close"><i class="icon_close"></i></span>
                <?php get_search_form(); ?>
            </div>
            <?php
        endif;
    }

}

/** Displays Main Header (Layout 1) */
if (!function_exists('nobel_magazine_header_layout1')) {

    function nobel_magazine_header_layout1() {
        ?>
        <div class="gm-main-header">
            <div class="gm-container">
                <?php
                nobel_magazine_site_branding();
                nobel_magazine_site_navigation();
                nobel_magazine_site_search();
                ?>
            </div>
        </div>
        <?php
    }

}

/** Displays Main Header (Layout 2) */
if (!function_exists('nobel_magazine_header_layout2')) {

    function nobel_magazine_header_layout2() {
        $show_search = get_theme_mod('nobel_magazine_mh_show_search', '');
        $display_socialicons = get_theme_mod('nobel_magazine_mh_show_socialicons', 1);
        ?>
        <div class="gm-main-header">
            <div class="gm-main-header-top">
                <div class="gm-container">
                    <?php
                    nobel_magazine_site_branding();
                    ?>
                </div>
            </div>

            <div class="gm-main-header-nav">
                <div class="gm-container">
                    <?php
                    nobel_magazine_site_navigation();
                    nobel_magazine_site_search();
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

}