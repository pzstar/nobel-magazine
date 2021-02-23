<?php
    /** Blog Action Hooks */

        /** Blog Posts Start Wrapper */
        add_action( 'nobel_magazine_blog_post', 'nobel_magazine_blog_post_start_cb', 10 );
        if( !function_exists( 'nobel_magazine_blog_post_start_cb' ) ) {
            function nobel_magazine_blog_post_start_cb( $wp_query ) {
                $blog_layout = get_theme_mod( 'nobel_magazine_blog_layout', 'blog-layout1' );
                if( 'blog-layout2' == $blog_layout && $wp_query->current_post == 1 ) {
                    ?>
                    <div class="nm-post-in-wrap">
                    <?php
                }

                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php
            }
        }

        /** Blog Post Header */
        add_action( 'nobel_magazine_blog_post', 'nobel_magazine_post_header_cb', 20 );
        if( !function_exists( 'nobel_magazine_post_header_cb' ) ) {
            function nobel_magazine_post_header_cb() {
                ?>
                <header class="entry-header">
                    <?php
                        if( has_post_thumbnail() ) {
                            $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                            ?>
                            <div class="post-image">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $img[0] ); ?>" alt="" /></a>
                            </div>
                            <?php
                        }
                    ?>
                </header><!-- .entry-header -->
                <?php
            }
        }

        /** Blog Post Content */
        add_action( 'nobel_magazine_blog_post', 'nobel_magazine_post_content_cb', 30 );
        if( !function_exists( 'nobel_magazine_post_content_cb' ) ) {
            function nobel_magazine_post_content_cb() {
                $display_category = get_theme_mod( 'nobel_magazine_blog_category', '1' );
                $display_date = get_theme_mod( 'nobel_magazine_blog_date', '1' );
                $display_author = get_theme_mod( 'nobel_magazine_blog_author', '1' );
                $display_comment = get_theme_mod( 'nobel_magazine_blog_comment', '1' );
                $excerpt_length = get_theme_mod( 'nobel_magazine_blog_excerpt_length', 250 );
                $read_more = get_theme_mod( 'nobel_magazine_archive_readmore', esc_html__( 'Read More', 'nobel-magazine' ) );
                ?>
                <div class="post-content">
                    <?php
                        /** Get Category List */
                        if( $display_category ) {
                            nobel_magazine_post_categories_list( get_the_id() );
                        }
                    ?>

                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <?php
                        if( $display_author || $display_date  ) {
                            ?>
                            <div class="post-metas">
                                <?php
                                    if( $display_author ) {
                                        nobel_magazine_posted_by();
                                    }

                                    if( $display_date ) {
                                        nobel_magazine_posted_on();
                                    }
                                ?>
                            </div>

                            <div class="post-excerpt">
                                <?php echo esc_html( nobel_magazine_blog_post_excerpt( get_the_content(), $excerpt_length ) ); ?>
                            </div>
                            <?php
                        }
                    ?>

                    <?php if( $read_more ) : ?>
                        <a href="<?php the_permalink(); ?>" class="post-readmore-btn"><?php echo esc_html( $read_more ); ?></a>
                    <?php endif; ?>
                </div>
                <?php
            }
        }

        /** Blog Post Footer */
        add_action( 'nobel_magazine_blog_post', 'nobel_magazine_post_footer_cb', 40 );
        if( !function_exists( 'nobel_magazine_post_footer_cb' ) ) {
            function nobel_magazine_post_footer_cb() {
                $display_comments = get_theme_mod( 'nobel_magazine_blog_comment', 1 );
                $display_tag = get_theme_mod( 'nobel_magazine_blog_tag', '1' );
                ?>
                <div class="post-footer">
                    <span class="comments">
                        <?php
                            if( $display_comments ) {
                                comments_number(
                                    esc_html__( 'No Comments', 'nobel-magazine' ),
                                    esc_html__( '1 Comment', 'nobel-magazine' ),
                                    esc_html__( '% Comments', 'nobel-magazine' )
                                );
                            }
                        ?>
                    </span>

                    <?php
                        if( $display_tag ) {
                            nobel_magazine_post_tags_list( get_the_id() );
                        }
                    ?>
                </div>
                <?php
            }
        }

        /** Blog Post End Wrapper */
        add_action( 'nobel_magazine_blog_post', 'nobel_magazine_blog_post_end_cb', 50 );
        if( !function_exists( 'nobel_magazine_blog_post_end_cb' ) ) {
            function nobel_magazine_blog_post_end_cb( $wp_query ) {
                $blog_layout = get_theme_mod( 'nobel_magazine_blog_layout', 'blog-layout1' );

                ?>
                    </article><!-- #post-<?php the_ID(); ?> -->
                <?php

                if ( 'blog-layout2' == $blog_layout && $wp_query->post_count != 1 && $wp_query->post_count == ( $wp_query->current_post + 1 ) ) {
                    ?>
                    </div> <!-- nm-post-in-wrap -->
                    <?php
                }
            }
        }

    /** Single Post Hooks */

        /** Single Post Start */
        add_action( 'nobel_magazine_blog_post_single', 'nobel_magazine_single_post_start_cb', 10 );
        if( !function_exists( 'nobel_magazine_single_post_start_cb' ) ) {
            function nobel_magazine_single_post_start_cb() {
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php
            }
        }

        /** Single Post Content */
        add_action( 'nobel_magazine_blog_post_single', 'nobel_magazine_single_post_content', 20 );
        if( !function_exists( 'nobel_magazine_single_post_content' ) ) {
            function nobel_magazine_single_post_content() {
                $post_layout = get_theme_mod( 'nobel_magazine_single_layout', 'single-layout1' );
                if( 'single-layout1' == $post_layout ) {
                    nobel_magazine_single_post_layout1();
                } else {
                    nobel_magazine_single_post_layout2();
                }
            }
        }

        /** Single Post End */
        add_action( 'nobel_magazine_blog_post_single', 'nobel_magazine_single_post_end_cb', 30 );
        if( !function_exists( 'nobel_magazine_single_post_end_cb' ) ) {
            function nobel_magazine_single_post_end_cb( $p ) {
                ?>
                </article>
                <?php
            }
        }

        /** Single Post Layout 1 */
        if( !function_exists( 'nobel_magazine_single_post_layout1' ) ) {
            function nobel_magazine_single_post_layout1() {
                $display_category = get_theme_mod( 'nobel_magazine_single_categories', 1 );
                $display_date = get_theme_mod( 'nobel_magazine_single_date', 1 );
                $display_comment = get_theme_mod( 'nobel_magazine_single_comment_count', 1 );
                ?>
                <header class="spost-header">
                    <?php
                        /** Post Category */
                        if( $display_category ) {
                            $categories = get_the_category();
                            if( !empty( $categories ) ) {
                                ?>
                                <span class="category">
                                    <?php echo printf( '%s %s', esc_html__( 'in', 'nobel-magazine' ), esc_html( $categories[0]->name ) ); ?>
                                </span>
                                <?php
                            }
                        }
                    ?>

                    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                    <?php
                        /** Post Date & Comment */
                        if( $display_date || $display_comment ) {
                            ?>
                            <div class="date-comments">
                                <?php if( $display_date ) : ?>
                                    <span class="date"><?php echo esc_attr( get_the_date( 'l j, Y' ) ); ?></span>
                                <?php endif; ?>

                                <?php if( $display_comment ) : ?>
                                    <span class="comment">
                                        <?php
                                            comments_number(
                                                esc_html__( 'No Comments', 'nobel-magazine' ),
                                                esc_html__( '1 Comment', 'nobel-magazine' ),
                                                esc_html__( '% Comments', 'nobel-magazine' )
                                            );
                                        ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                    ?>

                    <?php
                        /** Post Image */
                        if( has_post_thumbnail() ) {
                            $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                            ?>
                                <img src="<?php echo esc_url( $img[0] ); ?>" alt="<?php echo esc_attr( nobel_magazine_get_altofimage( absint( get_post_thumbnail_id() ) ) ); ?>" />
                            <?php
                        }
                    ?>
                </header>

                <div class="single-post-content">
                    <?php the_content(); ?>
                </div>

                <?php
                $display_author = get_theme_mod( 'nobel_magazine_single_author', 1 );
                $display_tags = get_theme_mod( 'nobel_magazine_single_tags', 1 );
                if( $display_author || $display_tags ) {
                    ?>
                        <footer class="post-footer">
                            <?php
                                /** Display Tags */
                                if( $display_tags ) {
                                    nobel_magazine_post_tags_list( get_the_id() );
                                }
                            ?>
    
                            <?php
                                /** Display Author */
                                if( $display_author ) {
                                    ?>
                                    <div class="post-author">
                                        <img class="author-image" src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?>" alt="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>" />
                                        <span class="author-name"><?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?></span>
                                        <p class="author-description"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
                                    </div>
                                    <?php
                                }
                            ?>
                        </footer>
                    <?php
                }
            }
        }

        /** Single Post Layout 2 */
        if( !function_exists( 'nobel_magazine_single_post_layout2' ) ) {
            function nobel_magazine_single_post_layout2() {
                ?>
                <div class="single-post-content">
                    <?php the_content(); ?>
                </div>
                <?php
                $display_author = get_theme_mod( 'nobel_magazine_single_author', 1 );
                $display_tags = get_theme_mod( 'nobel_magazine_single_tags', 1 );
                if( $display_author || $display_tags ) {
                    ?>
                        <footer class="post-footer">
                            <?php
                                /** Display Tags */
                                if( $display_tags ) {
                                    nobel_magazine_post_tags_list( get_the_id() );
                                }
                            ?>
    
                            <?php
                                /** Display Author */
                                if( $display_author ) {
                                    ?>
                                    <div class="post-author">
                                        <img class="author-image" src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?>" alt="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>" />
                                        <span class="author-name"><?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?></span>
                                        <p class="author-description"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
                                    </div>
                                    <?php
                                }
                            ?>
                        </footer>
                    <?php
                }
            }
        }