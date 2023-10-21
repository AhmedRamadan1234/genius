<section id="feature-section" class="feature-section sec-ptb-110 position-relative clearfix">
    <div class="container">
        <div class="row justify-content-center text-center mb-30" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6 col-md-7">
                <div class="section-title">
                    <?php
                    if ( !empty( $settings['title'] ) ) {
                        echo '<h2 class="title-text mb-15">' . esc_html( $settings['title'] ) . '</h2>';
                    }
                    if ( !empty( $settings['subtitle'] ) ) {
                        echo '<p class="mb-0">' . esc_html( $settings['subtitle'] ) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-lg-between">
            <?php
            $delay_time = 200;
            if ( !empty( $settings['features4'] ) ) {
                foreach ( $settings['features4'] as $feature ) {
                    ?>
                    <div class="col-lg-<?php echo esc_attr( $settings['column'] ) ?> col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay_time) ?>">
                        <div class="feature-item ml-0 clearfix">
                            <?php
                            if ( !empty( $feature['icon_img']['id'] )) { ?>
                                <span class="item-icon">
                                    <?php echo wp_get_attachment_image( $feature['icon_img']['id'], 'full' ) ?>
                                </span>
                                <?php
                            }
                            if ( !empty( $feature['title'] ) ) {
                                echo '<h3 class="item-title mb-15">' . esc_html( $feature['title'] ) . '</h3>';
                            }
                            if ( !empty( $feature['contents'] ) ) {
                                echo '<p class="mb-0">' . esc_html( $feature['contents'] ) . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    $delay_time = $delay_time + 200;
                }
            }
            ?>
        </div>
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
</section>