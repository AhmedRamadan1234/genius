<section id="plugin-section" class="plugin-section sec-ptb-110 position-relative clearfix">
    <div class="container">
        <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-7 col-md-8">
                <?php if ( !empty( $settings['title'] ) ) : ?>
                    <div class="section-title mb-60">
                        <h2 class="title-text mb-0">
                            <?php echo esc_html( $settings['title'] ) ?>
                        </h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <?php
            $delay_time = 300;
            if ( !empty( $settings['features4'] ) ) {
                foreach ( $settings['features4'] as $feature ) {
                    ?>
                    <div class="col-lg-<?php echo esc_attr( $settings['column'] ) ?> col-md-4 col-sm-6 col-6 elementor-repeater-item-<?php echo $feature['_id'] ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay_time ) ?>">
                        <div class="plugin-item bg-white clearfix">
                            <?php
                            if ( !empty( $feature['icon_img']['id'] )) { ?>
                                <span class="item-icon">
                                    <?php echo wp_get_attachment_image( $feature['icon_img']['id'], 'full' ) ?>
                                </span>
                                <?php
                            }
                            if ( !empty( $feature['title'] ) ) {
                                echo '<h3 class="item-title mb-1">' . esc_html( $feature['title'] ) . '</h3>';
                            }
                            if ( !empty( $feature['contents'] ) ) {
                                echo '<p class="mb-0">' . wp_kses_post( $feature['contents'] ) . '</p>';
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