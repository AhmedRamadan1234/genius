<?php
get_header();

$opt = get_option('wavee_opt');
$portfolio_layout = !empty($opt['portfolio_layout']) ? $opt['portfolio_layout'] : 'top_img_bottom_contents';
$layout = (get_field( 'layout' ) != 'default' || get_field( 'layout' ) == '') ? get_field( 'layout' ) : $portfolio_layout;

    // Portfolio Select Single Style
    if ( $layout == 'top_img_bottom_contents' ) {
        get_template_part('template-parts/portfolio/top-img-bottom-contents');
    }

    elseif( $layout == 'left_img_right_contents' ) {
        get_template_part('template-parts/portfolio/left-img-right-contents');
    }

    elseif ( $layout == 'top_img_bottom_contents2' ) {
        get_template_part('template-parts/portfolio/top-img-bottom-contents2');
    }

    else {
        get_template_part('template-parts/portfolio/top-img-bottom-contents');
    }

get_footer();