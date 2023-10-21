<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Digital Magnetic Agency
 */

get_header();
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
?>

<section class="blog_area sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-<?php echo esc_attr($blog_column) ?> col-md-12">
                <div class="blog_inner">
                    <?php
                    if ( have_posts() ) {
                        while( have_posts()) : the_post();
                            get_template_part( 'template-parts/contents/content', get_post_format() );
                        endwhile;

                    } else {
                        get_template_part( 'template-parts/contents/content', 'none' );
                    }
                    //Blog Pagination
                    wavee_pagination();
                    ?>
                </div>
            </div>
            <?php
            //blog sidebar
            get_sidebar();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

