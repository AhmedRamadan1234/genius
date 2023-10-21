<?php
$featured_images = function_exists('get_sub_field') ? get_sub_field('featured_images') : '';
$shape1 = function_exists('get_sub_field') ? get_sub_field('shape_one') : '';
$shape2 = function_exists('get_sub_field') ? get_sub_field('shape_two') : '';
$colors = function_exists('get_sub_field') ? get_sub_field('colors') : '';
$bg_color_left = "background-image: -webkit-radial-gradient(50% 50%, circle closest-side, {$colors['background_color_01']} 0, {$colors['background_color_02']} 100%);";

?>
<div class="left_bg3 multi_bg"></div>

<style>
    .left_bg3 {
    <?php echo esc_attr($bg_color_left) ?>
    }
</style>
<?php
    if ( $shape1 ) { ?>
        <img class="p_absoulte left_round" src="<?php echo esc_url( $shape1['url'] ); ?>" alt="<?php echo esc_attr( $shape1['alt'] ); ?>">
        <?php
    }

    if ( $shape2 ) { ?>
        <img class="p_absoulte left_triangle" src="<?php echo esc_url( $shape2['url'] ); ?>" alt="<?php echo esc_attr( $shape2['alt'] ); ?>">
        <?php
    }
?>
<div class="big_rounds"></div>
<div class="dot_left small_round"></div>
<div class="dot_left big_round"></div>
<div class="multi_left_img">
    <div class="w_mockup_img">
        <?php
            foreach ( $featured_images as $index=> $image ) {
                switch($index) {
                    case 0:
                        $align_class = 'img_screen one';
                        break;
                    case 1:
                        $align_class = 'img_screen two';
                        break;
                    case 2:
                        $align_class = 'img_screen three';
                        break;
                    case 3:
                        $align_class = 'img_four';
                        break;
                } ?>
                <div class="<?php echo esc_attr( $align_class ); ?>">
                    <?php echo wp_get_attachment_image( $image['image']['id'], 'full' ) ?>
                </div>
                <?php
            } ?>
    </div>
</div>
