<?php
$opt = get_option('wavee_opt');
$is_post_meta_cats = isset( $opt['is_post_meta_cat'] ) ? $opt['is_post_meta_cat'] : '1';
$is_post_meta_author = isset( $opt['is_post_meta_author_name'] ) ? $opt['is_post_meta_author_name'] : '1';
$is_post_meta_date = isset( $opt['is_post_meta_date'] ) ? $opt['is_post_meta_date'] : '1';

/* Start the Loop */
while (have_posts()) : the_post(); ?>
    <section class="breadcrumb_area_two breadcrumb_area_six parallaxie"  data-background="img/bg.jpg">
        <div class="overlay"></div>
        <div class="container">
            <div class="blog_details_br_content text-center">
                <h2><?php the_title() ?></h2>
            </div>
        </div>
    </section>
<?php
endwhile;

