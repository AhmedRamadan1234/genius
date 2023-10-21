<?php
global $wc_loop_i;
$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

$opt = get_option( 'wavee_opt' );
global $product;
?>

<div <?php wc_product_class( 'row pr_list_item' ); ?>>
    <div class="col-md-4">
        <div class="shop_list_img">
            <?php the_post_thumbnail( 'wavee_255x275', array( 'class' => 'img-fluid' )) ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="pr_list_content">
            <a href="<?php the_permalink() ?>">
                <h3><?php the_title(); ?></h3>
            </a>

            <?php woocommerce_template_single_rating() ?>

            <?php woocommerce_template_loop_price(); ?>

            <?php echo wp_kses_post($short_description); // WPCS: XSS ok. ?>

            <div class="pr_button wavee_pr_btn">
                <a href="?add-to-cart=<?php echo get_the_ID() ?>" value="<?php echo esc_attr( $product->get_id() ); ?>" title="<?php echo esc_attr($product->single_add_to_cart_text()) ?>" class="cart_btn">
                    <?php esc_html_e( 'Add to cart', 'wavee' ) ?>
                </a>
	            <?php
	            if ( function_exists('tinv_get_option') ) {
		            echo do_shortcode('[ti_wishlists_addtowishlist ]');
	            }
	            ?>
            </div>
        </div>
    </div>
</div>












