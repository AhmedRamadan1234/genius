<section class="fullscreen_area" id="fullscreenslider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            if ( !empty( $settings['sliders2'] ) ) {
                foreach ( $settings['sliders2'] as $index => $slider ) {
                    switch ( $index ) {
                        case 0:
                            $align_class = 'tilt';
                            break;
                        case 1:
                            $align_class = 'tilt';
                            break;
                        case 2:
                            $align_class = 'bg_1 tilt';
                            break;
                        case 3:
                            $align_class = 'bg_1 tilt';
                            break;
                        default:
                            $align_class = 'tilt';
                    }
                    ?>
                    <div class="swiper-slide single_portfolio_slider">
                        <?php
                        if ( !empty( $slider['image']['id'] ) ) { ?>
                            <a href="<?php echo esc_url( $slider['link']['url'] ) ?>" class="swiper_slide_inner <?php echo esc_attr( $align_class ) ?>">
                                <?php echo wp_get_attachment_image( $slider['image']['id'], 'full' ); ?>
                            </a>
                            <?php
                        }
                        if ( !empty( $slider['title'] ) ) {
                            echo '<h2 data-splitting>
                                    <a href="'.esc_url( $slider['link']['url'] ).'">
                                        '.esc_html( $slider['title'] ).'
                                    </a>
                                  </h2>';
                        }
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="swiper_next"></div>
    <div class="swiper_prev"></div>
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
            var center_portfolio_tittle = document.getElementById("fullscreenslider");
            if (center_portfolio_tittle) {
                var swiper = new Swiper('.swiper-container', {
                    slidesPerView: 2,
                    centeredSlides: true,
                    loop: <?php echo esc_js($settings['is_loop']) ?>,
                    speed: <?php echo esc_js($settings['autoplay_speed']) ?>,
                    mousewheel: true,
                    autoplay: <?php echo esc_js($settings['is_auto_play']) ?>,
                    freeModeSticky: true,
                    navigation: {
                        nextEl: '.swiper_next',
                        prevEl: '.swiper_prev',
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 1,
                            freeMode: false
                        }
                    }
                });
                $('.swiper-slide').on('mouseover', function () {
                    swiper.autoplay.stop();
                });

                $('.swiper-slide').on('mouseout', function () {
                    swiper.autoplay.start();
                });
                /*---------  SPLITTING TEXT -----------*/
                Splitting();
            }
        });
    })(jQuery);
</script>




