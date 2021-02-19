<?php
    /** Nobel Magazine Dynamic Styles **/
	function nobel_magazine_dynamic_styles() {

        $custom_css = "";

        /** Typography Options */
        $body_font = get_theme_mod( 'nobel_magazine_body_font_family', '' );
        if( $body_font ) {
            $custom_css .= "
                body{
                    font-family: {$body_font};
                }
            ";
        }

        $body_fontsize = get_theme_mod( 'nobel_magazine_body_font_size', '15' );
        if( $body_fontsize ) {
            $custom_css .= "
                body {
                    font-size: {$body_fontsize}px;
                }
            ";
        }

        $heading_font = get_theme_mod( 'nobel_magazine_h_font_family', '' );
        if( $heading_font ) {
            $custom_css .= "
                h1, h2, h3, h4, h5, h6 {
                    font-family: {$heading_font};
                }
            ";
        }

        $heading_fontsize = array();
        $heading_fontsize['h1'] = get_theme_mod( 'nobel_magazine_hh1_font_size', '38' );
        $heading_fontsize['h2'] = get_theme_mod( 'nobel_magazine_hh2_font_size', '34' );
        $heading_fontsize['h3'] = get_theme_mod( 'nobel_magazine_hh3_font_size', '30' );
        $heading_fontsize['h4'] = get_theme_mod( 'nobel_magazine_hh4_font_size', '26' );
        $heading_fontsize['h5'] = get_theme_mod( 'nobel_magazine_hh5_font_size', '22' );
        $heading_fontsize['h6'] = get_theme_mod( 'nobel_magazine_hh6_font_size', '18' );

        if( $body_fontsize ) {
            $custom_css .= "
                body {
                    font-size: {$body_fontsize}px;
                }
            ";
        }

        for( $i = 1; $i <= 6; $i++ ) {
            $index = 'h' . $i;
            if( isset( $heading_fontsize[$index] ) ) {
                $custom_css .= "
                    {$index} {
                        font-size: $heading_fontsize[$index]px;
                    }
                ";
            }
        }

        wp_add_inline_style( 'nobel-magazine-style', $custom_css );
	}
	add_action( 'wp_enqueue_scripts', 'nobel_magazine_dynamic_styles' );