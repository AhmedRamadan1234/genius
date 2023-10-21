<?php
/**
 * Template Name: Split Homepage
 *
 */
get_header( 'split' );
?>

<section id="multiscroll" class="fullpage_main_area ms-section">
    <div class="ms-left">
        <?php
        if ( have_rows('left_slide_contents') ) {
            $left_i = 1;
            while ( have_rows('left_slide_contents') ) { the_row();
            $loop_number_l = $left_i++;
                ?>
                <div class="ms-section section<?php echo esc_attr( $loop_number_l ); ?>" id="left<?php echo esc_attr( $loop_number_l ); ?>">
                    <?php
                    // Dual Images
                    if ( get_row_layout() == 'dual_images_with_background_shapes' ) {
                        get_template_part( 'template-parts/spilt_page_items/dual_images_with_background_shapes' );
                    }
                    // Single Image
                    elseif ( get_row_layout() == 'single_image_with_background_shapes' ) {
                        get_template_part( 'template-parts/spilt_page_items/single_image_with_background_shapes' );
                    }
                    // Featured Images
                    elseif ( get_row_layout() == 'featured_images_with_shapes' ) {
                        get_template_part( 'template-parts/spilt_page_items/featured_images_with_shapes' );
                    }
                    // Case Study
                    elseif ( get_row_layout() == 'case_study' ) {
                        get_template_part( 'template-parts/spilt_page_items/case_study' );
                    }
                    else {
                        get_template_part( 'template-parts/spilt_page_items/dual_images_with_background_shapes' );
                    }
                    ?>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <div class="ms-right">
        <?php
        if( have_rows('right_slide_contents') ) {
            $right_i = 1;
            while ( have_rows('right_slide_contents') ) { the_row();
            $loop_number_r = $right_i++;
                ?>
                <div class="ms-section section<?php echo esc_attr( $loop_number_r ); ?>" id="right<?php echo esc_attr( $loop_number_r ); ?>">
                    <?php
                    // Dual Images
                    if ( get_row_layout() == 'dual_images_with_background_shapes' ) {
                        get_template_part( 'template-parts/spilt_page_items/dual_images_with_background_shapes' );
                    }
                    // Single Image
                    elseif ( get_row_layout() == 'single_image_with_background_shapes' ) {
                        get_template_part( 'template-parts/spilt_page_items/single_image_with_background_shapes' );
                    }
                    // Featured Images
                    elseif ( get_row_layout() == 'featured_images_with_shapes' ) {
                        get_template_part( 'template-parts/spilt_page_items/featured_images_with_shapes' );
                    }
                    // Case Study
                    elseif ( get_row_layout() == 'case_study' ) {
                        get_template_part( 'template-parts/spilt_page_items/case_study' );
                    }
                    else {
                        get_template_part( 'template-parts/spilt_page_items/dual_images_with_background_shapes' );
                    }
                    ?>
                </div>
                <?php
            }
        }
        ?>
    </div>

</section>


<?php
get_footer('slide');