<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Digital Magnetic Agency
 */

if ( ! is_active_sidebar( 'sidebar_widgets' ) ) {
    return;
}
?>

<div class="col-lg-4 col-md-12">
	<div class="blog_sidebar">
        <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
	</div>
</div>