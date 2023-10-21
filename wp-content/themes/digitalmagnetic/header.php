<?php
$opt = get_option('wavee_opt');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Required meta tags -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php wp_head() ?>
		<!-- Hotjar Tracking Code for https://geniusventuresinc.com -->
		<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:2325369,hjsv:6};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script>
		<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/5868ea4d9a290a6b341a37f5c/cb96c7d669de826aac20fb0a0.js");</script>

		
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-169004678-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-169004678-1');
</script>
		
    </head>
<body <?php body_class(); ?>>
    <?php
    if ( function_exists('wp_body_open') ) {
        wp_body_open();
    }

    /**
     * Pre-loader
     */
    get_template_part('template-parts/header_elements/preloader');

    /**
     * Header Style
     */
    $page_header_layout = function_exists('get_field') ? get_field('header_layout_style') : '';
    if ( !empty($page_header_layout) && $page_header_layout != 'default' ) {
        $header_layout = $page_header_layout;
    } else {
        $header_layout = !empty($opt['header_layout_style']) ? $opt['header_layout_style'] : 'classic';
    }
    get_template_part( 'template-parts/header_elements/header', $header_layout );


    // Title-bar Banner Area
    $page_banner_style = function_exists('get_field') ? get_field('page_banner_style') : '';
    if ( !empty($page_banner_style) && $page_banner_style != 'default' ) {
        $banner_style = $page_banner_style;
    }
    else {
        $banner_style = !empty($opt['banner_style']) ? $opt['banner_style'] : '1';
    }


    // Blog Post Banner Area
    $blog_banner_post = function_exists('get_field') ? get_field('blog_single_banner_style') : '';
    if ( !empty($blog_banner_post) && $blog_banner_post != 'default' ) {
        $banner_post = $blog_banner_post;
    }
    else {
        $banner_post = !empty($opt['blog_banner_style']) ? $opt['blog_banner_style'] : '1';
    }

    // Is Banner
    $is_banner = '1';
    if ( is_home() ) {
        $is_banner = '1';
    } elseif ( is_page() || is_single() ) {
        $is_banner = function_exists( 'get_field' ) ? get_field( 'is_banner' ) : '1';
        $is_banner = isset( $is_banner ) ? $is_banner : '1';
    }


    // 404 Page
    if ( is_404() || is_page_template('elementor_canvas') ) {
        $is_banner = '';
    }


    if ( !isset($_GET['elementor_library']) ) {
        if ( $is_banner == '1' ) {
            if ( !is_singular( 'post' ) && !is_singular( 'portfolio' ) ) {
                get_template_part( 'template-parts/header_elements/banner', $banner_style );
            }
            elseif ( is_singular( 'post' ) ) {
                get_template_part('template-parts/header_elements/banner-post', $banner_post );
            }
            elseif ( is_singular( 'portfolio' ) ) {
                get_template_part('template-parts/header_elements/banner-portfolio');
            }
        }
    }

