<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Digital Magnetic Agency
 */

get_header();
?>
    <div class="services_details_area sec_pad">
        <div class="intro">
            <div class="container custom_container">
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </div>
<?php
get_footer();