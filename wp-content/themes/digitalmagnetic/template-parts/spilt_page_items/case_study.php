<?php

$upper_title = function_exists('get_sub_field') ? get_sub_field('upper_title') : '';
$main_title = function_exists('get_sub_field') ? get_sub_field('main_title') : '';
$img_underscore = function_exists('get_sub_field') ? get_sub_field('image_underscore') : '';
$subtitle = function_exists('get_sub_field') ? get_sub_field('subtitle') : '';
$btn = function_exists('get_sub_field') ? get_sub_field('button') : '';
$shape1 = function_exists('get_sub_field') ? get_sub_field('shape_one') : '';
$shape2 = function_exists('get_sub_field') ? get_sub_field('shape_two') : '';
$colors = function_exists('get_sub_field') ? get_sub_field('colors') : '';
$button_colors = function_exists('get_sub_field') ? get_sub_field('button_colors') : '';
?>
<div class="home_split_right_bg_color">
    <?php
    if ( $shape1 ) { ?>
        <div class="sp_leaf">
            <img src="<?php echo esc_url( $shape1['url'] ); ?>" alt="<?php echo esc_attr( $shape1['alt'] ); ?>" />
        </div>
        <?php
    }
    ?>
    <div class="split_content">
        <?php
            if ( $shape2 ) { ?>
                <img class="sp_arrow" src="<?php echo esc_url( $shape2['url'] ); ?>" alt="<?php echo esc_attr( $shape2['alt'] ); ?>" />
                <?php
            } ?>
        <div class="w_content_two multi_content">
            <?php
                if ( $upper_title ) {
                    echo '<h6>' . esc_html( $upper_title ). '</h6>';
                    ?>
                    <style>
                        .multi_content h6 {
                            color: <?php echo esc_attr( $colors['upper_title_color'] ) ?>
                        }
                    </style>
                    <?php
                }
                if ( $main_title ) {
                    echo '<h2>' . esc_html( $main_title ). '</h2>';
                    ?>
                    <style>
                        .multi_content h2 {
                            color: <?php echo esc_attr( $colors['title_color'] ) ?>
                        }
                    </style>
                    <?php
                }
                if ( $img_underscore ) { ?>
                    <span class="line">
                        <style>
                            .multi_content .line {
                                background: url( <?php echo esc_url( $img_underscore['url'] ) ?>)
                                no-repeat scroll center 0;
                            }
                        </style>
                    </span>
                    <?php
                }
                if ( $subtitle ) {
                    echo  wpautop( wp_kses_post( $subtitle ) );
                    ?>
                    <style>
                        .multi_content p {
                            color: <?php echo esc_attr( $colors['contents_color'] ) ?>
                        }
                    </style>
                    <?php
                }
                $link_target = $btn['target'] ? $btn['target'] : '_self';
                if ( $btn ) {
                    echo '<a href="'. esc_url( $btn['url'] ) .'" class="p_btn" target="'
                        . esc_attr( $link_target ) .'">'
                        . esc_html( $btn ['title'] ) . '</a>';
                    ?>
                    <style>
                        .multi_content .p_btn {
                            color: <?php echo esc_attr($button_colors['button_normal_title']) ?>;
                            background-color: <?php echo esc_attr($button_colors['button_normal_background']) ?>;
                            border-color: <?php echo esc_attr($button_colors['button_normal_border']) ?>;
                        }
                        .multi_content .p_btn:hover {
                            color: <?php echo esc_attr($button_colors['button_hover_title']) ?>;
                            background-color: <?php echo esc_attr($button_colors['button_hover_background']) ?>;
                            border-color: <?php echo esc_attr($button_colors['button_hover_border']) ?>;
                        }
                    </style>
                    <?php
                }
                ?>
        </div>
    </div>
</div>
