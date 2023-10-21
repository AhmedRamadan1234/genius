<?php
$opt = get_option('wavee_opt');
$is_post_meta_cats = isset( $opt['is_post_meta_cat'] ) ? $opt['is_post_meta_cat'] : '1';
$is_post_meta_author = isset( $opt['is_post_meta_author_name'] ) ? $opt['is_post_meta_author_name'] : '1';
$is_post_meta_date = isset( $opt['is_post_meta_date'] ) ? $opt['is_post_meta_date'] : '1';


/* Start the Loop */
while (have_posts()) : the_post(); ?>
    <section class="breadcrumb_area_two parallaxie" data-background="img/bg.jpg">
        <div class="overlay"></div>
        <div class="container">
            <div class="blog_details_br_content">
                <h2><?php the_title() ?></h2>
                <?php
                $dflex = count( get_the_category() ) < 9 ? 'd-flex' : 'single_banner_cats'; ?>
                <div class="b_post_info <?php echo esc_attr( $dflex ); ?>">
                    <?php
                    if ( $is_post_meta_cats == '1' ) { ?>
                        <div class="p_tag">
                            <?php the_category(' '); ?>
                        </div>
                        <?php
                    } ?>
                    <div class="post_details d-flex">
                        <?php
                        if ( $is_post_meta_author == '1' ) { ?>
                            <div class="p_date" onclick="window.location='<?php wavee_day_link() ?>';">
                                <img src="<?php echo WAVEE_DIR_IMG ?>/blog/user.svg" alt="<?php esc_attr_e( 'user image icon', 'wavee'); ?>">
                                <?php echo get_the_author(); ?>
                            </div>
                            <?php
                        }

                        if ( $is_post_meta_date == '1' ) { ?>
                            <div class="p_date" onclick="window.location='<?php wavee_day_link() ?>';">
                                <img src="<?php echo WAVEE_DIR_IMG ?>/blog/calendar-white.svg" alt="<?php esc_attr_e( 'date image icon', 'wavee'); ?>">
                                <?php echo get_the_date() ?>
                            </div>
                            <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
endwhile;

