<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Digital Magnetic Agency
 */

get_header();
$padding = "";

$wrap_class = 'page_wrapper';

if ( class_exists('WooCommerce') ) {
    if ( is_cart() ) {
        $wrap_class = 'shopping_cart_area ';
    }
    elseif ( is_checkout() ) {
        $wrap_class = 'checkout_area';
    }
    else {
        $wrap_class = 'page_wrapper';
    }
    if ( function_exists('is_wishlist') ) {
        if ( is_wishlist() ) {
            $wrap_class = 'shopping_cart_area';
        }
    }
} else {
    $wrap_class = 'page_wrapper';
}

while ( have_posts() ) : the_post();
    ?>
    <section class="<?php echo esc_attr($wrap_class) ?> sec_pad">
        <div class="container">
          <?php
            the_content();
            wp_link_pages(array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wavee' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'wavee' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ));
            ?>
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
        </div>
    </section>
<?php
endwhile; // End of the loop.


get_footer();
