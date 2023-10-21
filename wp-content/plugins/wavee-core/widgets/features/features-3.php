<section id="layout-section" class="layout-section text-center sec-ptb-110 pt-0 position-relative clearfix">
    <div class="container">
        <?php if ( !empty( $settings['title'] ) ) : ?>
            <div class="section-title mb-30" data-aos="fade-up" data-aos-delay="100">
                <h2 class="title-text mb-0"><?php echo esc_html( $settings['title'] ) ?></h2>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php
            $delay_time = 300;
            if ( !empty( $settings['features3'] ) ) {
                foreach ( $settings['features3'] as $feature ) {
                    ?>
                    <div class="col-lg-<?php echo esc_attr( $settings['column']) ?> col-md-4 col-sm-4 col-6" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay_time ) ?>">
                        <div class="layout-item clearfix">
                            <?php
                            if ( !empty( $feature['layout_img']['id'] )) { ?>
                                <div class="item-image">
                                    <?php echo wp_get_attachment_image( $feature['layout_img']['id'], 'full' ) ?>
                                </div>
                                <?php
                            }
                            if ( !empty( $feature['layout_title'] ) ) {
                                echo '<h3 class="item-title mb-0">' . esc_html( $feature['layout_title'] ) . '</h3>';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    $delay_time = $delay_time + 100;
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