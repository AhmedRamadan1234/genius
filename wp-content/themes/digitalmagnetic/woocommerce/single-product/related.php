<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$opt = get_option( 'wavee_opt' );

if ( $related_products ) : ?>
    <section class="related_pr_area sec_pad">
        <div class="container">
            <?php if (!empty($opt['related_products_title'])) : ?>
                <div class="sec_title text-center">
                    <h2 class="s_section_title">
                        <?php echo wp_kses_post($opt['related_products_title']) ?>
                    </h2>
                </div>
            <?php endif; ?>
            <div class="related_pr_slider">

                <?php woocommerce_product_loop_start(); ?>

                <?php foreach ( $related_products as $related_product ) : ?>

                    <?php
                    $post_object = get_post( $related_product->get_id() );

                    setup_postdata( $GLOBALS['post'] =& $post_object );

                    wc_get_template_part( 'content', 'product' );
                    ?>

                <?php endforeach; ?>

                <?php woocommerce_product_loop_end(); ?>

            </div>
        </div>
    </section>
<?php endif;

wp_reset_postdata();
