<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Nobel Magazine
 */
if (!function_exists('nobel_magazine_posted_on')) :

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function nobel_magazine_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string, esc_attr(get_the_date(DATE_W3C)), esc_html(get_the_date()), esc_attr(get_the_modified_date(DATE_W3C)), esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
                /* translators: %s: post date. */
                esc_html_x('Posted on %s', 'post date', 'nobel-magazine'), '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
    }

endif;

if (!function_exists('nobel_magazine_posted_by')) :

    /**
     * Prints HTML with meta information for the current author.
     */
    function nobel_magazine_posted_by() {
        $byline = sprintf(
                /* translators: %s: post author. */
                esc_html_x('by %s', 'post author', 'nobel-magazine'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }

endif;

if (!function_exists('nobel_magazine_entry_footer')) :

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function nobel_magazine_entry_footer() {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'nobel-magazine'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'nobel-magazine') . '</span>', $categories_list); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'nobel-magazine'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'nobel-magazine') . '</span>', $tags_list); // WPCS: XSS OK.
            }
        }

        if (!is_single() && !post_password_required() && ( comments_open() || get_comments_number() )) {
            echo '<span class="comments-link">';
            comments_popup_link(
                    sprintf(
                            wp_kses(
                                    /* translators: %s: post title */
                                    __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'nobel-magazine'), array(
                'span' => array(
                    'class' => array(),
                ),
                                    )
                            ), get_the_title()
                    )
            );
            echo '</span>';
        }

        edit_post_link(
                sprintf(
                        wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Edit <span class="screen-reader-text">%s</span>', 'nobel-magazine'), array(
            'span' => array(
                'class' => array(),
            ),
                                )
                        ), get_the_title()
                ), '<span class="edit-link">', '</span>'
        );
    }

endif;

if (!function_exists('nobel_magazine_post_thumbnail')) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function nobel_magazine_post_thumbnail() {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail('post-thumbnail', array(
                    'alt' => the_title_attribute(array(
                        'echo' => false,
                    )),
                ));
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }

endif;

/** Displays Categories in list format */
if (!function_exists('nobel_magazine_post_categories_list')) {

    function nobel_magazine_post_categories_list($post_id = 0) {
        if (!$post_id) {
            return;
        }

        $categories = get_the_category($post_id);

        if (empty($categories)) {
            return;
        }
        ?>
        <ul class="post-categories-list">
            <?php
            foreach ($categories as $category) {
                ?>
                <li><a href="<?php echo esc_url(get_category_link($category)); ?>"><?php echo esc_html($category->name); ?></a></li>
                <?php
            }
            ?>
        </ul>
        <?php
    }

}

/** Displays Tags in list format */
if (!function_exists('nobel_magazine_post_tags_list')) {

    function nobel_magazine_post_tags_list($post_id) {
        if (!$post_id) {
            return;
        }

        $tags = get_the_tags($post_id);

        if (empty($tags)) {
            return;
        }
        ?>
        <ul class="post-tags-list">
            <?php
            foreach ($tags as $tag) {
                ?>
                <li><a href="<?php echo esc_url(get_tag_link($tag)); ?>"><?php echo esc_html($tag->name); ?></a></li>
                <?php
            }
            ?>
        </ul>
        <?php
    }

}

/** Blog Post Excerpt */
if (!function_exists('nobel_magazine_blog_post_excerpt')) {

    function nobel_magazine_blog_post_excerpt($content = '', $excerpt_length = 250) {
        if (!$content) {
            return '';
        }
        return substr(strip_tags(strip_shortcodes($content)), 0, $excerpt_length);
    }

}

/** Top Header Menu */
if (!function_exists('nobel_magazine_top_menu')) {

    function nobel_magazine_top_menu() {
        $menu = get_theme_mod('nobel_magazine_th_menu', 'none');

        if ($menu == 'none') {
            return;
        }

        wp_nav_menu(array(
            'menu' => $menu,
            'container' => false,
            'menu_class' => 'nm-top-header-menu'
        ));
    }

}

/** Top Header Widget */
if (!function_exists('nobel_magazine_top_widget')) {

    function nobel_magazine_top_widget() {
        $widget = get_theme_mod('nobel_magazine_th_widget', 'none');

        if ($widget == 'none') {
            return;
        }

        if (!is_active_sidebar($widget)) {
            return;
        }

        dynamic_sidebar($widget);
    }

}

/** Top Header Text Block */
if (!function_exists('nobel_magazine_top_txtblock')) {

    function nobel_magazine_top_txtblock() {
        $txtblock = get_theme_mod('nobel_magazine_th_text', '');

        if (!$txtblock) {
            return;
        }
        ?>
        <div class="nm-top-txtblock">
            <?php echo wp_kses_post($txtblock); ?>
        </div>
        <?php
    }

}

/** Top Header News Ticker */
if (!function_exists('nobel_magazine_top_newsticker')) {

    function nobel_magazine_top_newsticker() {
        $news_ticker_title = get_theme_mod('nobel_magazine_th_ticker_title', '');
        $news_ticker_category = get_theme_mod('nobel_magazine_th_ticker_category', -1);

        $ticker_args = array('post_type' => 'post');

        if ($news_ticker_category != '-1') {
            $ticker_args['cat'] = $news_ticker_category;
        }

        $ticker_query = new WP_Query($ticker_args);
        ?>
        <div class="nm-news-ticker">
            <?php if ($news_ticker_title) : ?>
                <span class="title"><?php echo esc_html($news_ticker_title); ?></span>
            <?php endif; ?>

            <?php
            if ($ticker_query->have_posts()) {
                ?>
                <ul class="ticker-lists owl-carousel">
                    <?php
                    while ($ticker_query->have_posts()) {
                        $ticker_query->the_post();
                        ?>
                        <li><?php the_title(); ?></li>
                        <?php
                    }
                    ?>
                </ul>
                <?php
                wp_reset_postdata();
            }
            ?>
        </div>
        <?php
    }

}

/** Top Header Date */
if (!function_exists('nobel_magazine_top_date')) {

    function nobel_magazine_top_date() {
        ?>
        <div class="nm-top-date"><?php echo esc_html(date('l jS F Y')); ?></div>
        <?php
    }

}

/** Social Icons */
if (!function_exists('nobel_magazine_socialicons')) {

    function nobel_magazine_socialicons() {
        $social_icons = get_theme_mod('nobel_magazine_social_icons', '[{"icon":"icofont-facebook","link":"#","enable":"on"},{"icon":"icofont-twitter","link":"#","enable":"on"},{"icon":"icofont-instagram","link":"#","enable":"on"},{"icon":"icofont-youtube","link":"#","enable":"on"}]');
        if ($social_icons == '') {
            return;
        }

        $social_icon_lists = json_decode($social_icons, true);

        if (!empty($social_icon_lists)) {
            ?>
            <ul class="nm-top-social-icons">
                <?php
                foreach ($social_icon_lists as $social_icon) {
                    if ($social_icon['enable']) {
                        ?>
                        <li><a href="<?php echo esc_url($social_icon['link']); ?>"><span class="<?php echo esc_attr($social_icon['icon']); ?>"></span></a></li>
                        <?php
                    }
                }
                ?>
            </ul>
            <?php
        }
    }

}

/** Get Attachment Alt Tag using attachment url or attachment id */
if (!function_exists('nobel_magazine_get_altofimage')) {

    function nobel_magazine_get_altofimage($attachment) {
        $alt_text = '';
        $attachment_id = '';
        if ($attachment) {
            if (is_string($attachment)) {
                $attachment_id = attachment_url_to_postid($attachment);
            } elseif (is_int($attachment)) {
                $attachment_id = $attachment;
            }
            return get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
        }
    }

}

/** Get array of category list array( cat_id => cat_name ) */
if (!function_exists('nobel_magazine_categorieslist')) {

    function nobel_magazine_categorieslist() {
        $categories = get_categories(array('hide_empty' => 0));
        $category_list = array();
        if ($categories) {
            foreach ($categories as $category) {
                $category_list[$category->term_id] = $category->cat_name;
            }
        }
        return $category_list;
    }

}