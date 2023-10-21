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
$copyright_text = !empty($opt['copyright_txt']) ? $opt['copyright_txt'] : esc_html__( '© 2020 DroitThemes. All rights reserved', 'wavee' );
if ( is_home() ) {
    $is_footer_visibility = 1;
    $footer_style = 'style_01';
} else {
    $is_footer_visibility = function_exists('get_field') ? get_field('footer_visibility') : '1';
}

if ( !isset($is_footer_visibility) ) {
    $is_footer_visibility = '1';
}


if ( is_404() ) {
	echo '';
} else {
	if ( $is_footer_visibility ) {
        ?>
<!--         <footer class="footer_area" style="background: #4336D1;">
            <div class="container">
                <div class="footer_top">
					
	
                    
                </div>
                
            </div>
        </footer> -->
<footer class="footer_area" style="background: #0c1227;">
            <div class="container">
				<div class="footer_bottom">
					<?php if ( wavee_is_not_empty_social_links() == true ) : ?>
                        <ul class="list-unstyled social_link">
                            <?php wavee_social_links(); ?>
                        </ul>
                    <?php endif; ?>
					
                    <?php echo wp_kses_post( wpautop( $copyright_text ) ); ?>
                </div>
</div>
        </footer>
        <?php

	}
}

wp_footer();
?>
<style>
@media only screen and (max-width: 768px)
{
	.leadinModal.leadinModal-theme-default.leadinModal-v3 .leadin-content-body {
		padding: 0px !important;
	}
}
</style>
</body>
</html>