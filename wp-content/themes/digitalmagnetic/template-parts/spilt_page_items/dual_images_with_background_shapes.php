<?php

$f_img1 = function_exists('get_sub_field') ? get_sub_field('f_image_one') : '';
$f_img2 = function_exists('get_sub_field') ? get_sub_field('f_image_two') : '';
$shape1 = function_exists('get_sub_field') ? get_sub_field('shape_one') : '';
$shape2 = function_exists('get_sub_field') ? get_sub_field('shape_two') : '';
$shape3 = function_exists('get_sub_field') ? get_sub_field('shape_three') : '';
$colors = function_exists('get_sub_field') ? get_sub_field('colors') : '';
$bg_color_left = "background-image: -webkit-radial-gradient(50% 50%, circle closest-side, {$colors['background_color_01']} 0, {$colors['background_color_02']} 100%);";
?>
<div class="left_bg1 multi_bg"></div>
<style>
    .left_bg1 {
        <?php echo esc_attr($bg_color_left) ?>
    }
</style>
<?php
if ( $shape1['url'] ) { ?>
    <img class="p_absoulte left_round layer" data-depth="0.1" src="<?php echo esc_url($shape1['url']); ?>"
         alt="<?php echo esc_attr($shape1['alt']) ?>">
    <?php
}
if ( $shape2['url'] ) { ?>
    <img class="p_absoulte left_triangle" src="<?php echo esc_url($shape2['url']); ?>" alt="<?php echo esc_attr($shape2['alt']) ?>">
    <?php
} ?>
<div class="big_rounds"></div>
<div class="dot_left small_round"></div>
<div class="dot_left big_round"></div>
<div class="multi_left_img">
    <?php
        if ( $shape3 ) { ?>
            <img class="p_absoulte left_dot" src="<?php echo esc_url( $shape3['url'] ); ?>" alt="<?php echo esc_attr( $shape3['alt'] ); ?>">
            <?php
        } ?>
    <div class="w_phone_img">
        <?php
            if ( $f_img1 ) { ?>
                <img class="p_one layer" data-depth="0.1" src="<?php echo esc_url( $f_img1['url'] ); ?>" alt="<?php echo esc_attr( $f_img1['alt'] ); ?>">
                <?php
            }
            if ( $f_img2 ) { ?>
                <img class="p_two p_absoulte" src="<?php echo esc_url( $f_img2['url'] ); ?>" alt="<?php echo esc_attr( $f_img2['alt'] ); ?>">
                <?php
            } ?>
    </div>
</div>

