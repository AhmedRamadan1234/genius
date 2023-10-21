<section id="about-section" class="about-section position-relative clearfix">
    <div class="decoration-wrapper sec-ptb-110 position-relative clearfix">
        <div class="container">
            <?php
            if ( $features2 ) {
                $i = 0;
                foreach ( $features2 as $feature ) {
                    ++$i;
                    $strip_class = ($i % 2 == 1) ? 'order-last' : '';
                    $motion_effect = ($i % 2 == 1) ? 'fade-right' : 'fade-left';
                    $delay_time = ($i % 2 == 1) ? '700' : '500';
                    ?>
                    <div class="about-item clearfix elementor-repeater-item-<?php echo $feature['_id'] ?>">
                        <div class="row d-flex align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
                            <div class="col-lg-6 col-md-7 col-sm-10 col-xs-12 <?php echo esc_attr( $strip_class ) ?>">
                                <div class="item-decoration">
                                    <?php
                                    if ( !empty( $feature['fimage']['id'] )) { ?>
                                        <div class="item-image" data-aos="zoom-out" data-aos-delay="400">
                                            <?php echo wp_get_attachment_image( $feature['fimage']['id'], 'full' ) ?>
                                        </div>
                                        <?php
                                    }

                                    if( $i % 2 == 1 ){
                                        if ( !empty( $feature['f_shape1']['url'] )) { ?>
                                            <span class="deco-img shape-img-1" data-aos="zoom-out" data-aos-delay="200">
											    <img src="<?php echo esc_url($feature['f_shape1']['url']) ?>" alt="<?php echo esc_attr($feature['title']) ?>">
										    </span>
                                            <?php
                                        }
                                    } else {
                                        if ( !empty( $feature['f_shape1']['url'] )) { ?>
                                            <span class="deco-img shape-img-3">
                                                <img src="<?php echo esc_url($feature['f_shape1']['url']) ?>" alt="<?php echo esc_attr($feature['title']) ?>" data-aos="fade-right" data-aos-delay="200">
                                            </span>
                                            <?php
                                        }
                                    }

                                    if( $i % 2 == 1 ){
                                        if ( !empty( $feature['f_shape2']['url'] )) { ?>
                                            <span class="deco-img shape-img-2" data-aos="zoom-out" data-aos-delay="250">
											    <img src="<?php echo esc_url($feature['f_shape2']['url']) ?>" alt="<?php echo esc_attr($feature['title']) ?>">
										    </span>
                                            <?php
                                        }
                                    } else {
                                        if ( !empty( $feature['f_shape2']['url'] )) { ?>
                                            <span class="deco-img shape-img-4" data-parallax='{"rotateZ":80}'>
											    <img src="<?php echo esc_url($feature['f_shape2']['url']) ?>" alt="<?php echo esc_attr($feature['title']) ?>" data-aos="zoom-out" data-aos-delay="250">
										    </span>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12" data-aos="<?php echo esc_attr( $motion_effect ) ?>" data-aos-delay="<?php echo esc_attr( $delay_time ) ?>">
                                <div class="item-content">
                                    <?php
                                    if( $i % 2 == 1 ){
                                        if ( !empty( $feature['img_icon']['url'] )) { ?>
                                            <span class="icon">
                                                <?php echo wp_get_attachment_image( $feature['img_icon']['id'], 'full' ) ?>
                                            </span>
                                            <?php
                                        }
                                    } else {
                                        echo '';
                                    }
                                    if ( !empty( $feature['title'] ) ) {
                                        echo '<h3 class="item-title">' . wp_kses_post( $feature['title'] ) . '</h3>';
                                    }
                                    if ( !empty( $feature['contents'] ) ) {
                                        echo '<p class="mb-0">' . esc_html( $feature['contents'] ) . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="deco-group deco-group-1">
            <?php
            if ( !empty( $settings['floating_img1']['id'] )) { ?>
                <span class="deco-img shape-img-1" data-parallax='{"y" : 120}'>
                    <small data-aos="fade-up" data-aos-delay="100">
                        <?php echo wp_get_attachment_image( $settings['floating_img1']['id'], 'full' ) ?>
                    </small>
                </span>
                <?php
            }
            if ( !empty( $settings['floating_img2']['id'] )) { ?>
                <span class="deco-img shape-img-2" data-parallax='{"y" : 40}'>
                    <small data-aos="fade-up" data-aos-delay="300">
                        <?php echo wp_get_attachment_image( $settings['floating_img2']['id'], 'full' ) ?>
                    </small>
                </span>
                <?php
            }
            ?>
        </div>
        <div class="deco-group deco-group-2">
            <?php
            if ( !empty( $settings['floating_img3']['id'] )) { ?>
                <span class="deco-img shape-img-1" data-parallax='{"y" : 120}'>
                    <small data-aos="fade-up" data-aos-delay="100">
                        <?php echo wp_get_attachment_image( $settings['floating_img3']['id'], 'full' ) ?>
                    </small>
                </span>
                <?php
            }
            if ( !empty( $settings['floating_img4']['id'] )) { ?>
                <span class="deco-img shape-img-2" data-parallax='{"y" : 40}'>
                    <small data-aos="fade-up" data-aos-delay="300">
                        <?php echo wp_get_attachment_image( $settings['floating_img4']['id'], 'full' ) ?>
                    </small>
                </span>
                <?php
            }
            ?>
        </div>
        <?php if ( $settings['is_line'] == 'yes' ) : ?>
            <div class="line-wrap line-black">
                <div class="line-item"></div>
                <div class="line-item"></div>
                <div class="line-item"></div>
                <div class="line-item"></div>
                <div class="line-item"></div>
            </div>
        <?php endif; ?>
    </div>
</section>