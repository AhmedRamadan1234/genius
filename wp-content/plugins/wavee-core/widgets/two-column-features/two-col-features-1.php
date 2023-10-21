<section id="demo-section" class="demo-section clearfix">
    <div class="decoration-wrapper sec-ptb-110 clearfix">
        <?php
        if ( $watermark_text ) {
            echo '<h3 class="big-title" data-aos="fade-up" data-aos-delay="100">' . esc_html( $watermark_text ) . '</h3>';
        }
        ?>
        <div class="container mb-30" data-aos="fade-up" data-aos-delay="200">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                    <div class="section-title text-center">
                        <?php
                        if ( $title ) {
                            echo '<h2 class="title-text mb-15 text-white">' . esc_html( $title ) . '</h2>';
                        }
                        if ( $subtitle ) {
                            echo '<p class="mb-0">' . esc_html( $subtitle ) . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php
            $i = 0;
            $delay_time = 300;
            if ( $features ) {
                foreach ( $features as $feature ) {
                    ++$i;
                    $strip_class = ($i % 2 == 1) ? '' : 'order-last';
                    $motion_effect = ($i % 2 == 1) ? 'fade-right' : 'fade-left';
                    $motion_effect2 = ($i % 2 == 1) ? 'fade-left' : 'fade-right';
                    ?>
                    <div class="demo-item clearfix elementor-repeater-item-<?php echo $feature['_id'] ?>">
                        <div class="row d-flex align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 <?php echo esc_attr( $strip_class ) ?>" data-aos="<?php echo esc_attr( $motion_effect ) ?>" data-aos-delay="<?php echo esc_attr( $delay_time ) ?>">
                                <?php if ( !empty( $feature['fimage']['id'] ) ) : ?>
                                    <a href="<?php echo esc_url( $feature['link']['url'] ) ?>" class="item-image" <?php wavee_is_external( $feature['link'] ); wavee_is_nofollow( $feature['link'] ); ?>>
                                        <?php echo wp_get_attachment_image( $feature['fimage']['id'], 'full' ) ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-6 d-flex" data-aos="<?php echo esc_attr( $motion_effect2 ) ?>" data-aos-delay="<?php echo esc_attr( $delay_time ) ?>">
                                <div class="item-content ml-0">
                                    <?php
                                    if ( !empty( $feature['title'] ) ) {
                                        echo '<h3 class="item-title text-white">' . esc_html( $feature['title'] ) . '</h3>';
                                    }
                                    if ( !empty( $feature['contents'] ) ) {
                                        echo '<div class="info-list ul-li-block clearfix">' . wp_kses_post( $feature['contents'] ) . '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $delay_time = $delay_time + 100;
                }
            }
            ?>
        </div>
        <?php
        if ( !empty( $settings['floating_img1']['id'] )) { ?>
            <span class="deco-img layer-img-1">
                <?php echo wp_get_attachment_image( $settings['floating_img1']['id'], 'full' ) ?>
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img2']['url'] )) { ?>
            <span class="deco-img shape-img-2" data-parallax='{"y" : 80}'>
                <img src="<?php echo esc_url($settings['floating_img2']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="fade-up" data-aos-delay="300">
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img3']['url'] )) { ?>
            <span class="deco-img shape-img-3" data-parallax='{"y" : 120}'>
                <img src="<?php echo esc_url($settings['floating_img3']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="fade-up" data-aos-delay="200">
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img4']['url'] )) { ?>
            <span class="deco-img shape-img-4" data-parallax='{"y" : 100, "rotateY":800}'>
                <img src="<?php echo esc_url($settings['floating_img4']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="fade-up" data-aos-delay="300">
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img5']['url'] )) { ?>
            <span class="deco-img shape-img-5" data-parallax='{"y" : 100, "rotateY":800}'>
                <img src="<?php echo esc_url($settings['floating_img5']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="fade-up" data-aos-delay="400">
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img6']['url'] )) { ?>
            <span class="deco-img shape-img-6" data-parallax='{"y" : 100}'>
                <img src="<?php echo esc_url($settings['floating_img6']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="fade-up" data-aos-delay="500">
            </span>
            <?php
        }
        if ( !empty( $settings['floating_img7']['url'] )) { ?>
            <span class="deco-img flow-image-1">
                <img src="<?php echo esc_url($settings['floating_img7']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="fade-right" data-aos-delay="600">
            </span>
            <?php
        }
        if ( $settings['is_line'] == 'yes' ) : ?>
            <div class="line-wrap">
                <div class="line-item"></div>
                <div class="line-item"></div>
                <div class="line-item"></div>
                <div class="line-item"></div>
                <div class="line-item"></div>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>