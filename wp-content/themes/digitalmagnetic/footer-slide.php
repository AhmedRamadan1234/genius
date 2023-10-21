<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Digital Magnetic Agency
 */

$opt = get_option('wavee_opt');
$is_footer_visibility = function_exists('get_field') ? get_field('footer_visibility') : '1';
?>

<?php if ( $is_footer_visibility == '1') { ?>
    <footer class="full_footer p_absoulte">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-6">
                    <?php if ( wavee_is_not_empty_social_links() == true ) : ?>
                        <ul class="list-unstyled social_icon social_icon_two social_link">
                            <?php wavee_social_links(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6 col-6">
                    <div class="pr_details_nav h_slider_nav align-items-center">
                        <span class="prev" id="moveUp"> <?php esc_html_e( 'Prev', 'wavee' ) ?> </span>
                        <span class="next moveUp" id="moveDown"> <?php esc_html_e( 'Next', 'wavee' ) ?> </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php
} ?>


<?php
wp_footer();
?>
</body>
</html>