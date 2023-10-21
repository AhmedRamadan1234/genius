<?php

$opt = get_option('wavee_opt');
$blog_column = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$is_post_meta_cats = isset( $opt['is_post_meta_cat'] ) ? $opt['is_post_meta_cat'] : '1';
$is_post_meta_author = isset( $opt['is_post_meta_author_name'] ) ? $opt['is_post_meta_author_name'] : '1';
$is_post_meta_date = isset( $opt['is_post_meta_date'] ) ? $opt['is_post_meta_date'] : '1';
$is_single_post_tag = isset( $opt['is_single_post_tag'] ) ? $opt['is_single_post_tag'] : '1';
$is_single_social_share = isset( $opt['is_single_social_share'] ) ? $opt['is_single_social_share'] : '';

?>


<section <?php post_class( 'blog_details_area_two' ) ?>>
    <div class="container">
        
        <div class="row">
            <div class="col-lg-<?php echo esc_attr($blog_column) ?> col-md-12">
                <div class="blog_inner">
                    <?php
        if ( has_post_thumbnail() ) { ?>
            <div class="blog_details_img">
                <?php the_post_thumbnail('wavee_1110x505') ?>
            </div>
            <?php
        }
        ?>
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        ?>
                        <div class="blog_details">
                            <div class="b_post_info d-flex">
                                <?php
                                if ( $is_post_meta_cats == '1' ) {  ?>
                                    <div class="p_tag">
                                        <?php the_category( ' ' ); ?>
                                    </div>
                                    <?php
                                } ?>
                                <div class="post_details d-flex">
                                    <?php
                                    if ( $is_post_meta_author == '1' ) { ?>
                                        <div class="p_date" onclick="window.location='<?php wavee_day_link() ?>';">
                                            <img src="<?php echo WAVEE_DIR_IMG ?>/blog/user-gray.svg" alt="<?php esc_attr_e( 'user image icon', 'wavee' ); ?>">
                                            <?php the_author() ?>
                                        </div>
                                        <?php
                                    }
                                    if ( $is_post_meta_date == '1' ) { ?>
                                        <div class="p_date" onclick="window.location='<?php wavee_day_link() ?>';">
                                            <img src="<?php echo WAVEE_DIR_IMG ?>/blog/calendar.svg" alt="<?php esc_attr_e( 'date image icon', 'wavee'); ?>">
                                            <?php echo get_the_date() ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php the_content() ?>
                            <?php if ( $is_single_post_tag == '1' && get_the_tags() ) : ?>
                                <div class="post_social_info">
                                    <?php
                                    if ( $is_single_post_tag == '1' ) {
                                        echo wavee_post_tags();
                                    }
                                    if ( $is_single_social_share == '1' && function_exists('wavee_social_share') ) {
                                        wavee_social_share();
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php
                    endwhile;

                    $user_desc = get_the_author_meta('user_description');
                    if ( !empty($user_desc)) {
                        ?>
                        <div class="media author_post comment_post">
                            <div class="author_img">
                                <?php echo get_avatar(get_the_author_meta('ID'), 100, get_the_author_meta('display_name')); ?>
                            </div>
                            <div class="media-body">
                                <h4><?php echo get_the_author_meta('display_name') ?></h4>
                                <p><?php echo get_the_author_meta('description') ?></p>
                            </div>
                        </div>
                        <?php
                    }

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
                </div>
            </div>
            <?php
            get_sidebar();
            ?>
        </div>
    </div>
</section>