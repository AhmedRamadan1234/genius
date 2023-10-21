<section class="portfolio_slider_style style_3 overflow-hidden" id="portfolio_slider">
    <div class="container-fluid p-0 no-gutters">
        <div class="swiper-container">
            <div class="portfolio_slider_full_hight swiper-wrapper">
                <?php
                if ( !empty( $settings['sliders3'] ) ) {
                    foreach ( $settings['sliders3'] as $slider ) {
                        ?>
                        <div class="single_portfolio_item swiper-slide elementor-repeater-item- <?php echo $slider['_id'] ?>">
                            <?php
                            if ( $slider['select_img'] == 'single_img' ) {
                                if ( !empty( $slider['f_image1']['id'] ) ) { ?>
                                    <a href="<?php echo esc_url( $slider['btn_url']['url']) ?>" class="portfolio_item_bg bg_1">
                                        <span class="image">
                                            <?php echo wp_get_attachment_image( $slider['f_image1']['id'], 'full' ); ?>
                                        </span>
                                    </a>
                                    <?php
                                }
                            }
                            elseif ( $slider['select_img'] == 'double_img' ) { ?>
                                <a href="<?php echo esc_url( $slider['btn_url']['url'] ) ?>" class="portfolio_item_bg bg_3">
                                    <div class="w_phone_img image">
                                        <?php
                                        if ( !empty( $slider['f_image1']['id'] ) ) {
                                            echo wp_get_attachment_image($slider['f_image1']['id'], 'full', false, array( 'class' => 'p_one'));
                                        }
                                        if ( !empty( $slider['f_image2']['id'] ) ) {
                                            echo wp_get_attachment_image($slider['f_image2']['id'], 'full', false, array( 'class' => 'p_two p_absoulte'));
                                        }
                                        ?>
                                    </div>
                                </a>
                                <?php
                            }
                            elseif ( $slider['select_img'] == 'multiple_img' ) { ?>
                                <a href="<?php echo esc_url( $slider['btn_url']['url'] ) ?>" class="portfolio_item_bg bg_2">
                                    <div class="w_mockup_img">
                                        <?php
                                        if ( !empty( $slider['f_image1']['id'] ) ) { ?>
                                            <div class="img_screen one">
                                                <?php echo wp_get_attachment_image( $slider['f_image1']['id'], 'full' ); ?>
                                            </div>
                                            <?php
                                        }

                                        if ( !empty( $slider['f_image2']['id'] ) ) { ?>
                                            <div class="img_screen two">
                                                <?php echo wp_get_attachment_image( $slider['f_image2']['id'], 'full' ); ?>
                                            </div>
                                            <?php
                                        }

                                        if ( !empty( $slider['f_image3']['id'] ) ) { ?>
                                            <div class="img_screen three">
                                                <?php echo wp_get_attachment_image( $slider['f_image3']['id'], 'full' ); ?>
                                            </div>
                                            <?php
                                        }

                                        if ( !empty( $slider['f_image4']['id'] ) ) {
                                            echo wp_get_attachment_image($slider['f_image4']['id'], 'full', false, array('class' => 'img_four'));
                                        }
                                        ?>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                            <div class="single_portfolio_content">
                                <?php if ( !empty( $slider['title'] ) ) :  ?>
                                    <h4 class="horizontal_effect">
                                        <a class="tittle_animation" href="<?php echo esc_url( $slider['btn_url']['url'] ) ?>" data-hover="Social Profile Banner">
                                            <?php echo esc_html( $slider['title'] ) ?>
                                        </a>
                                    </h4>
                                <?php endif; ?>
                                <div class="portfolio_content_iner">
                                    <?php echo !empty( $slider['content'] ) ?  wpautop( $slider['content'] ) : ''; ?>
                                    <?php if ( !empty( $slider['btn_label'] )) : ?>
                                        <a href="<?php echo esc_url( $slider['btn_url']['url'] ) ?>" class="read_more_btn btn_arrow" <?php wavee_is_external( $slider['btn_url'] ); ?>>
                                            <?php echo esc_html( $slider['btn_label'] ) ?>
                                            <i class="arrow_right"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>


<script>
    ;(function($) {
        "use strict";
        $(document).ready(function () {

            //home page 5 slider
            var slider_full_hight = document.getElementById("portfolio_slider");
            if (slider_full_hight) {
                var swiper = new Swiper('.swiper-container', {
                    slidesPerView: 3,
                    loop: <?php echo esc_js($settings['is_loop']) ?>,
                    centeredSlides: true,
                    autoplay: <?php echo esc_js($settings['is_auto_play']) ?>,
                    mousewheel: true,
                    speed: <?php echo esc_js($settings['autoplay_speed']) ?>,
                    breakpoints: {
                        576: {
                            slidesPerView: 1
                        },
                        768: {
                            slidesPerView: 1
                        },
                        1199: {
                            slidesPerView: 2,
                        }
                    }
                });
                $('.swiper-slide').on('mouseover', function() {
                    swiper.autoplay.stop();
                });

                $('.swiper-slide').on('mouseout', function() {
                    swiper.autoplay.start();
                });
            }

        });

    })(jQuery);
</script>