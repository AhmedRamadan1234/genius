<section id="variation-section" class="variation-section sec-ptb-110 position-relative clearfix">
    <div class="container mb-30 text-center">
        <div class="row justify-content-center justify-content-md-center justify-content-sm-center">
            <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12" data-aos="fade-up" data-aos-delay="100">
                <div class="section-title">
                    <?php
                    if ( $title ) {
                        echo '<h2 class="title-text mb-15">' . esc_html($title) . '</h2>';
                    }
                    if ( $subtitle ) {
                        echo '<p class="mb-0">' . esc_html($subtitle) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
            <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12">
                <?php
                $delay_time = 300;
                if ( $left_column_features ) {
                    foreach ( $left_column_features as $image ) {
                        ?>
                        <div class="variation-fullimage clearfix" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay_time ) ?>">
                            <?php echo wp_get_attachment_image( $image['f_image']['id'], 'full' ) ?>
                        </div>
                        <?php
                        $delay_time = $delay_time + 200;
                    }
                }
                ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12">
                <?php
                $delay_time = 300;
                if ( $right_column_features ) {
                    foreach ( $right_column_features as $image ) {
                        ?>
                        <div class="variation-fullimage clearfix" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay_time ) ?>">
                            <?php echo wp_get_attachment_image( $image['f_image']['id'], 'full' ) ?>
                        </div>
                        <?php
                        $delay_time = $delay_time + 200;
                    }
                }
                ?>
            </div>
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