<?php

global $wc_loop_i;
global $product;
$opt = get_option( 'wavee_opt' );
$column = wc_get_loop_prop( 'columns' );
$is_add_to_cart = isset($opt['is_add_to_cart']) ? $opt['is_add_to_cart'] : '1';

switch ($column) {
    case '3':
        $col = '4';
        $image_size = 'wavee_255x320';
        break;
    case '4':
        $col = '3';
        $image_size = 'wavee_300x320';
        break;
    case '2':
        $col = '6';
        $image_size = 'full';
        break;
    default:
        $col = '4';
        $image_size = 'wavee_255x320';
        break;
}
?>

<div <?php wc_product_class( 'col-md-'.$col.' col-6' ); ?>>
    <div class="single_product_item">
        <div class="product_img">
            <?php the_post_thumbnail($image_size, array( 'class' => 'img-fluid' )) ?>
            <div class="hover_content">
	            <?php
	            if ( function_exists('tinv_get_option') ) {
		            echo do_shortcode('[ti_wishlists_addtowishlist ]');
	            }

                if ( $is_add_to_cart == '1' ) { ?>
                    <a href="?add-to-cart=<?php echo get_the_ID() ?>" title="<?php echo esc_attr($product->single_add_to_cart_text()) ?>">
                        <i class="ti-bag"></i>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
        <a href="<?php the_permalink() ?>">
            <h4><?php the_title() ?></h4>
        </a>

        <?php woocommerce_template_loop_price(); ?>
        <?php woocommerce_template_single_rating() ?>

    </div>
</div>