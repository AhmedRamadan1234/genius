<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

global $product;

if ( ! comments_open() ) {
    return;
}
?>
    <div class="review_comment_info">

        <ul class="p_comment_list list-unstyled">
            <?php
            wp_list_comments(
                apply_filters(
                    'woocommerce_product_review_list_args',
                    array( 'callback' => 'wavee_woocommerce_comments' )
                ),
                get_comments(array(
                    'post_id' => get_the_ID(),
                ))
            );
            ?>
        </ul>


        <?php
        if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
            <div class="comment_box">
                <?php
                $commenter = wp_get_current_commenter();

                $comment_form = array(
                    'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'wavee' ),
                    'title_reply'          => have_comments() ? __( 'Add your Review:', 'wavee' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'wavee' ), get_the_title() ),
                    'title_reply_before'   => '<h2 class="c_title">',
                    'title_reply_after'    => '</h2>',
                    'comment_notes_after'  => '',
                    'fields'               => array(
                        'author' => '<div class="col-lg-6">
                                <div class="form-group text_box">
                                    <input type="text" name="author" placeholder="'.esc_attr__( 'Name *', 'wavee' ).'" value="'.esc_attr( $commenter['comment_author'] ).'" aria-required="true" required>
                                </div>
                             </div>',
                        'email'  => '<div class="col-lg-6">
                                <div class="form-group text_box">
                                    <input name="email" type="text" placeholder="'.esc_attr__( 'Email *', 'wavee' ).'" value="'.esc_attr( $commenter['comment_author_email'] ).'" aria-required="true" required>
                                </div>
                             </div>',
                    ),
                    'label_submit'  => esc_html__( 'Add Review', 'wavee' ),
                    'logged_in_as'  => '',
                    'comment_field' => '',
                    'class_form'    => 'row contact_form_box',
                    'class_submit'  => 'p_btn',
                );



                if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
                    $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'wavee' ), esc_url( $account_page_url ) ) . '</p>';
                }

                $comment_form['comment_field'] .= '
                <div class="col-lg-12">
                    <div class="form-group text_box">
                        <textarea id="comment-field" placeholder="'.esc_attr__( 'Your Review', 'wavee' ).'" rows="5" name="comment" aria-required="true" required></textarea>
                    </div>
                </div>';

                if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
                    $comment_form['comment_field'] .= '
                <div class="col-lg-12">
                    <div class="comment-form-rating">
                        <span>' . esc_html__( 'Your rating:', 'wavee' ) . '</span>
                        <select name="rating" id="rating" aria-required="true" required>
                            <option value="">' . esc_html__( 'Rate&hellip;', 'wavee' ) . '</option>
                            <option value="5">' . esc_html__( 'Perfect', 'wavee' ) . '</option>
                            <option value="4">' . esc_html__( 'Good', 'wavee' ) . '</option>
                            <option value="3">' . esc_html__( 'Average', 'wavee' ) . '</option>
                            <option value="2">' . esc_html__( 'Not that bad', 'wavee' ) . '</option>
                            <option value="1">' . esc_html__( 'Very poor', 'wavee' ) . '</option>
                        </select>
                    </div>
                </div>';
                }

                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                ?>
            </div>
        <?php else : ?>

            <p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'wavee' ); ?></p>

        <?php endif; ?>

    </div>

