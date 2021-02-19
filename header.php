<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nobel Magazine
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <?php
    /**
     * nobel_magazine_preloader_cb( 10 )
     * nobel_magazine_gotop_cb( 20 )
     */
    do_action('nobel_magazine_extra_elements');
    ?>

    <body <?php body_class(); ?>>
        <div id="gm-page">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'nobel-magazine'); ?></a>

            <?php do_action('nobel_magazine_header'); ?>

            <div id="gm-content" class="gm-site-content">
                <div class="gm-container">