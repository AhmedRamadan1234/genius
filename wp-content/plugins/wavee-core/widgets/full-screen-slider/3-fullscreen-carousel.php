<section class="full_height_dark_slider swiper-container zoom_effect" id="full_height_dark_slider">
    <div class="swiper-wrapper">
        <?php
        if ( !empty( $settings['sliders'] ) ) {
            foreach ( $settings['sliders'] as $slider ) {
                ?>
                <div class="swiper-slide elementor-repeater-item- <?php echo $slider['_id'] ?>">
                    <div class="vartical_slider_banner_iner">
                        <div class="container">
                            <div class="banner_content">
                                <div class="row justify-content-end align-items-center">
                                    <div class="col-lg-10 col-sm-10">
                                        <?php
                                        if ( !empty( $slider['shape_img']['url'] ) ) { ?>
                                            <style>
                                                .fullpage_slider_img:before {
                                                    background: url(<?php echo esc_url( $slider['shape_img']['url'] ) ?>) no-repeat scroll top left;
                                                }
                                            </style>
                                            <?php
                                        }
                                        if ( !empty( $slider['image']['id'] ) ) { ?>
                                            <a href="<?php echo esc_url( $slider['btn_url']['url'] ) ?>" class="banner_img_content fullpage_slider_img">
                                                <?php echo wp_get_attachment_image( $slider['image']['id'], 'full', false, array( 'class' => 'banner_img img-fluid' ) ); ?>
                                                <span class="overlay_img p_absoulte"></span>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="banner_content_iner">
                                        <?php
                                        if ( !empty( $slider['title_01'] ) ) {
                                            echo '<h2><span>' . esc_html( $slider['title_01'] ) . '</span></h2>';
                                        }
                                        if ( !empty( $slider['title_02'] ) ) {
                                            echo '<h2><span>' . esc_html( $slider['title_02'] ) . '</span></h2>';
                                        }
                                        if ( !empty( $slider['btn_label'] ) ) {
                                            echo '<div class="text_fadeup mt-4">
                                                    <div class="btn_border_effect">
                                                        <a href="'.esc_url( $slider['btn_url']['url'] ).'">
                                                         '.esc_html( $slider['btn_label'] ).'
                                                        </a>
                                                    </div>
                                                 </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="swiperPagination">
        <div class="swiper-pagination custom_pagination"></div>
    </div>
    <div class="section_line">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</section>


<footer class="full_footer p_absoulte new_color">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-6">
                <?php
                if ( !empty( $settings['footer_content'] ) ) {
                    echo '<p>' .esc_html($settings['footer_content']). '</p>';
                }
                ?>
            </div>
            <div class="col-sm-6 col-6 text-right">
                <ul class="list-unstyled social_icon social_icon_two">

                    <?php
                    if ( !empty( $settings['twitter']['url'] ) ) { ?>
                        <li>
                            <a href="<?php echo esc_url( $settings['twitter']['url'] ) ?>" <?php wavee_is_external( $settings['twitter'] ); wavee_is_nofollow( $settings['twitter'] ) ?>>
                                <i class="social_twitter"></i>
                            </a>
                        </li>
                        <?php
                    }

                    if ( !empty( $settings['facebook']['url'] ) ) { ?>
                        <li>
                            <a href="<?php echo esc_url( $settings['facebook']['url'] ) ?>" <?php wavee_is_external( $settings['facebook'] ); wavee_is_nofollow( $settings['facebook'] ) ?>>
                                <i class="social_facebook"></i>
                            </a>
                        </li>
                        <?php
                    }
                    if ( !empty( $settings['dribbble']['url'] ) ) { ?>
                        <li>
                            <a href="<?php echo esc_url( $settings['dribbble']['url'] ) ?>" <?php wavee_is_external( $settings['dribbble'] ); wavee_is_nofollow( $settings['dribbble'] ) ?>>
                                <i class="social_dribbble"></i>
                            </a>
                        </li>
                        <?php
                    }
                    if ( !empty( $settings['instagram']['url'] ) ) { ?>
                        <li>
                            <a href="<?php echo esc_url( $settings['instagram']['url'] ) ?>" <?php wavee_is_external( $settings['instagram'] ); wavee_is_nofollow( $settings['instagram'] ) ?>>
                                <i class="social_instagram"></i>
                            </a>
                        </li>
                        <?php
                    }
                    if ( !empty( $settings['linkedin']['url'] ) ) { ?>
                        <li>
                            <a href="<?php echo esc_url( $settings['linkedin']['url'] ) ?>" <?php wavee_is_external( $settings['linkedin'] ); wavee_is_nofollow( $settings['linkedin'] ) ?>>
                                <i class="social_linkedin"></i>
                            </a>
                        </li>
                        <?php
                    }
                    if ( !empty( $settings['youtube']['url'] ) ) { ?>
                        <li>
                            <a href="<?php echo esc_url( $settings['youtube']['url'] ) ?>" <?php wavee_is_external( $settings['youtube'] ); wavee_is_nofollow( $settings['youtube'] ) ?>>
                                <i class="social_youtube"></i>
                            </a>
                        </li>
                        <?php
                    }
                    if ( !empty( $settings['pinterest']['url'] ) ) { ?>
                        <li>
                            <a href="<?php echo esc_url( $settings['pinterest']['url'] ) ?>" <?php wavee_is_external( $settings['pinterest'] ); wavee_is_nofollow( $settings['pinterest'] ) ?>>
                                <i class="social_pinterest"></i>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</footer>


<script>
    ;(function($) {
        "use strict";
        $(document).ready(function () {
            var full_height_dark_slider = document.getElementById("full_height_dark_slider");
            if (full_height_dark_slider) {
                var swiper = new Swiper('.full_height_dark_slider', {
                    direction: 'vertical',
                    slidesPerView: 1,
                    mousewheel: true,
                    loop: <?php echo esc_js($settings['is_loop']) ?>,
                    speed: <?php echo esc_js($settings['autoplay_speed']) ?>,
                    autoplay: <?php echo esc_js($settings['is_auto_play']) ?>,
                    pagination: {
                        el: '.swiper-pagination',
                        type: 'fraction',
                    },
                });
                $('.swiper-slide').on('mouseover', function () {
                    swiper.autoplay.stop();
                });

                $('.swiper-slide').on('mouseout', function () {
                    swiper.autoplay.start();
                });
            }
        });

    })(jQuery);
</script>