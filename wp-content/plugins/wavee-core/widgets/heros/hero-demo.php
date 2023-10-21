<section id="banner-section" class="banner-section clearfix">
    <div class="decoration-wrapper d-flex align-items-center clearfix" data-background="<?php echo esc_url( $settings['sec_bg_img']['url'] ) ?>">
        <div class="container">
            <div class="row justify-content-lg-start">
                <div class="col-lg-6 col-md-6 col-sm-7">
                    <div class="banner-content clearfix">
                        <?php
                        if ( !empty( $settings['title'] ) ) {
                            echo '<h1 class="title-text">' . wp_kses_post($settings['title']) . '</h1>';
                        }
                        ?>
                        <div class="counterup-wrap ul-li clearfix">
                            <ul class="clearfix">
                                <?php
                                if ( !empty( $settings['counters'] ) ) {
                                    foreach ( $settings['counters'] as $counter ) {
                                        ?>
                                        <li class="elementor-repeater-item-<?php echo $counter['_id'] ?>">
                                            <?php
                                            if ( !empty( $counter['count_value'] ) ) {
                                                echo '<h3><span class="counter-text">'.esc_html($counter['count_value']) .'</span><sup>'.esc_html($counter['count_attribute']) .'</sup></h3>';
                                            }
                                            if ( !empty( $counter['count_label'] ) ) {
                                                echo '<p>' . wp_kses_post($counter['count_label']) . '</p>';
                                            }
                                            ?>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <?php if ( !empty($settings['scroll_down_link']) ) : ?>
                            <a href="<?php echo esc_html( $settings['scroll_down_link'] ) ?>" class="scroll-down nav-link scrollspy-btn">
                                <i class="fal fa-long-arrow-down"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ( !empty( $settings['floating_img1']['url'] )) { ?>
            <span class="deco-img box-image-1" data-parallax='{"y" : 80}'>
                <img src="<?php echo esc_url($settings['floating_img1']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="fade-up" data-aos-delay="900">
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img2']['url'] )) { ?>
            <span class="deco-img box-image-2" data-parallax='{"y" : 80}'>
                <img src="<?php echo esc_url($settings['floating_img2']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="fade-up" data-aos-delay="950">
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img3']['url'] )) { ?>
            <span class="deco-img shape-img-1" data-parallax='{"y" : 180}'>
                <img src="<?php echo esc_url($settings['floating_img3']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="zoom-in" data-aos-delay="850">
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img4']['url'] )) { ?>
            <span class="deco-img shape-img-2">
                <img src="<?php echo esc_url($settings['floating_img4']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="zoom-in" data-aos-delay="700">
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img5']['url'] )) { ?>
            <span class="deco-img shape-img-3">
                <img src="<?php echo esc_url($settings['floating_img5']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="zoom-in" data-aos-delay="1000">
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img6']['url'] )) { ?>
            <span class="deco-img flow-image-1">
                <img src="<?php echo esc_url($settings['floating_img6']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="fade-left" data-aos-delay="1050">
            </span>
            <?php
        }
        ?>
    </div>
    <div class="banner-images ul-li clearfix">
        <ul class="scene clearfix">
            <?php
            $delay_time = 100;
            $data_depth = 0.1;
            if ( !empty( $settings['images'] ) ) {
                foreach ( $settings['images'] as $image ) {
                    ?>
                    <li data-depth="<?php echo esc_attr( $data_depth ) ?>">
                        <img src="<?php echo esc_url( $image['f_images']['url'] ) ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay_time ) ?>">
                    </li>
                    <?php
                    $delay_time = $delay_time + 100;
                    $data_depth = $data_depth + 0.1;
                }
            }
            ?>
        </ul>
    </div>

    <?php if ( $settings['is_line'] == 'yes' ) : ?>
        <div class="line-wrap">
            <div class="line-item"></div>
            <div class="line-item"></div>
            <div class="line-item"></div>
            <div class="line-item"></div>
            <div class="line-item"></div>
        </div>
    <?php endif; ?>
</section>

<script>
    ;(function($) {
        "use strict";
        $(document).ready( function () {
            $('.counter-text').counterUp({
                delay: 10,
                time: 2000
            });
            $('[data-background]').each(function() {
                $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
            });
        })
    })(jQuery);
</script>