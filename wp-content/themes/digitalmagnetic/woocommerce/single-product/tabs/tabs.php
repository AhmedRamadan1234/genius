<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

    <section class="product_description_area">
        <div class="woocommerce-tabs wc-tabs-wrapper">

            <ul class="tabs wc-tabs nav nav-tabs pr_tab" id="myTab" role="tablist">
                <?php foreach ( $product_tabs as $key => $tab ) : ?>
                    <li class="nav-item">
                        <a href="#tab-<?php echo esc_attr( $key ); ?>" class="<?php echo esc_attr( $key ); ?>_tab nav-link" id="tab-title-<?php echo esc_attr( $key ); ?>" data-toggle="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>" role="tab">
                            <?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <?php foreach ( $product_tabs as $key => $tab ) : ?>
                        <div class="tab-pane fade woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $key ); ?>-tab">
                            <?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <?php do_action( 'woocommerce_product_after_tabs' ); ?>

        </div>
    </section>

<?php endif; ?>
