<?php

/**
 * Nobel Magazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nobel Magazine
 */
if (!function_exists('nobel_magazine_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function nobel_magazine_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Nobel Magazine, use a find and replace
         * to change 'nobel-magazine' to the name of your theme in all the template files.
         */
        load_theme_textdomain('nobel-magazine', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'nobel-magazine-primary-menu' => esc_html__('Primary Menu', 'nobel-magazine'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('nobel_magazine_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }

endif;
add_action('after_setup_theme', 'nobel_magazine_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nobel_magazine_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('nobel_magazine_content_width', 640);
}

add_action('after_setup_theme', 'nobel_magazine_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nobel_magazine_widgets_init() {

    /** Sidebar */
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'nobel-magazine'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'nobel-magazine'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    /** Footer 1 */
    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'nobel-magazine'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets for footer widget', 'nobel-magazine'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    /** Footer 2 */
    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'nobel-magazine'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets for footer widget.', 'nobel-magazine'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    /** Footer 3 */
    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'nobel-magazine'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets for footer widget.', 'nobel-magazine'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    /** Footer 4 */
    register_sidebar(array(
        'name' => esc_html__('Footer 4', 'nobel-magazine'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets for footer widget.', 'nobel-magazine'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'nobel_magazine_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function nobel_magazine_scripts() {
    nobel_magazine_enqueue_google_fonts();

    $theme = wp_get_theme();
    $ver = $theme->get('version');

    wp_enqueue_style('nobel-magazine-style', get_stylesheet_uri());

    /** Preloaders */
    wp_enqueue_style('nobel-magazine-preloaders', get_template_directory_uri() . '/css/preloaders.css', array(), $ver);

    /** Parallax */
    wp_enqueue_script('parallax', get_template_directory_uri() . '/vendors/parallax/parallax.min.js', array('jquery'), $ver, true);

    /** Elegant Icons */
    wp_enqueue_style('icofont', get_template_directory_uri() . '/vendors/icofont/icofont.min.css', array(), $ver);

    /** Elegant Icons */
    wp_enqueue_style('elegant-icons', get_template_directory_uri() . '/vendors/elegant-icons/elegant-icons.css', array(), $ver);

    /** Owl Carousel */
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/vendors/owl-carousel/css/owl.carousel.min.css', array(), $ver);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/vendors/owl-carousel/js/owl.carousel.min.js', array('jquery'), $ver, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    /** Custom Scripts */
    wp_enqueue_script('nobel-magazine-custom-scripts', get_template_directory_uri() . '/js/custom.js', array(), $ver, true);
}

add_action('wp_enqueue_scripts', 'nobel_magazine_scripts');

/** Enqueue Google Fonts * */
function nobel_magazine_enqueue_google_fonts() {
    $google_fonts = array(
        'Montserrat' => array(
            'weights' => array('400', '500', '600', '700', '800', '900'),
        ),
        'Poppins' => array(
            'weights' => array('400', '500', '600', '700', '800', '900'),
        ),
    );

    $google_fonts = apply_filters('nobel_magazine_google_fonts', $google_fonts);

    foreach ($google_fonts as $family => $font) {
        $font_query[] = $family . ':' . implode(',', $font['weights']);
    }

    $query_args = array(
        'family' => urlencode(implode('|', $font_query)),
        'subset' => urlencode('latin,latin-ext'),
    );

    $fontsURL = add_query_arg($query_args, 'https://fonts.googleapis.com/css');

    /** Google Fonts * */
    wp_enqueue_style('nobel-magazine-googlefonts', $fontsURL, array(), null);
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Theme Customizer Options
 */
require get_template_directory() . '/inc/theme-options/theme-options.php';

/**
 * Theme Typography
 */
require get_template_directory() . '/inc/typography/typography.php';

/**
 * Nobel Magazine Site Builder
 */
require get_template_directory() . '/inc/hooks/hooks.php';

/** 
 * Nobel Magazine Dynamic Styles
 */
require get_template_directory() . '/css/dynamic-styles.php';