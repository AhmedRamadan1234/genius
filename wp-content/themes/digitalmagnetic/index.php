<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Digital Magnetic Agency
 */

get_header();
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '12' : '12';
?>

    <section class="blog_area sec_pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-<?php echo esc_attr( $blog_column ) ?> col-md-12">
                    
                        
                            <div class="blog_inner">
                                <div class="row">
                                    <?php
                                    while( have_posts()) : the_post();
                                        get_template_part( 'template-parts/contents/content', get_post_format() );
                                    endwhile;
                                    //Blog Pagination
                                    wavee_pagination();
                                    ?>
                                </div>
                            </div>
                        
                    
                </div>
                <?php
                //get_sidebar();
                ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
