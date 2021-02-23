<?php
/** Footer Action Hooks */
/** Footer Wrapper Start */
add_action('nobel_magazine_footer', 'nobel_magazine_footer_wrapper_start_cb', 10);
if (!function_exists('nobel_magazine_footer_wrapper_start_cb')) {

    function nobel_magazine_footer_wrapper_start_cb() {
        ?>
        <footer id="nm-colophon" <?php nobel_magazine_foooter_class(); ?>>
            <div class="nm-container">
                <?php
            }

        }

        /** Top Footer */
        add_action('nobel_magazine_footer', 'nobel_magazine_top_footer_cb', 20);
        if (!function_exists('nobel_magazine_top_footer_cb')) {

            function nobel_magazine_top_footer_cb() {
                $col = 4;
                $column_layout = get_theme_mod('nobel_magazine_footer_col', 'col-4');
                if ($column_layout) {
                    $col_arr = explode('-', $column_layout);
                    $col = $col_arr[1];
                }
                ?>
                <?php if( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
                    <div class="nm-top-footer">
                        <?php
                        for ($i = 1; $i <= $col; $i++) {
                            ?>
                            <div class="nm-foooter-col nm-footer-col<?php echo esc_attr($i); ?>">
                                <?php
                                $widget_area = 'footer-' . $i;
                                if (is_active_sidebar($widget_area)) {
                                    dynamic_sidebar($widget_area);
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                <?php endif; ?>
                <?php
            }

        }

        /** Mid Footer */
        add_action('nobel_magazine_footer', 'nobel_magazine_mid_footer_cb', 30);
        if (!function_exists('nobel_magazine_mid_footer_cb')) {

            function nobel_magazine_mid_footer_cb() {
                $footer_logo = get_theme_mod('nobel_magazine_footer_logo', '');
                $enable_socialicons = get_theme_mod('nobel_magazine_footer_enable_socialicons', 'off');
                ?>
                <?php if( $footer_logo || $enable_socialicons ) : ?> 
                    <div class="nm-mid-footer">
                        <?php if ($footer_logo) : ?>
                            <div class="footer-logo">
                                <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr(nobel_magazine_get_altofimage($footer_logo)); ?>">
                            </div>

                            <?php
                            if ($enable_socialicons == 'on') {
                                do_action('nobel_magazine_socialicons');
                            }
                            ?>

                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php
            }

        }

        /** Bottom Footer */
        add_action('nobel_magazine_footer', 'nobel_magazine_bottom_footer_cb', 40);
        if (!function_exists('nobel_magazine_bottom_footer_cb')) {

            function nobel_magazine_bottom_footer_cb() {
                $copyright_text = get_theme_mod('nobel_magazine_footer_copyright', '&copy; 2020 Magazine WordPress Theme - Nobel Magazine');
                ?>
                <?php if( $copyright_text ) : ?>
                    <div class="nm-site-info">
                        <?php
                        if ($copyright_text) {
                            echo esc_html($copyright_text);
                        }
                        ?>
                        <span class="sep"> | </span>
                        <?php echo esc_html__('by ', 'nobel-magazine'); ?>
                        <a href="https://mysticalthemes.com/"><?php echo esc_html__('Mystical Themes', 'nobel-magazine'); ?></a>
                    </div><!-- .site-info -->
                <?php endif; ?>
                <?php
            }

        }

        /** Footer Wrapper End */
        add_action('nobel_magazine_footer', 'nobel_magazine_footer_wrapper_end_cb', 50);
        if (!function_exists('nobel_magazine_footer_wrapper_end_cb')) {

            function nobel_magazine_footer_wrapper_end_cb() {
                ?>
            </div>
        </footer">
        <?php
    }

}