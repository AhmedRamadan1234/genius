<section id="variation-section" class="variation-section sec-ptb-110 position-relative clearfix">
    <div class="header-variation clearfix">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
                <div class="col-lg-7 col-md-7 col-sm-10 col-xs-12">
                    <?php
                    $delay_time = 100;
                    if ( $features3 ) {
                        foreach ( $features3 as $image ) {
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
                <div class="col-lg-4 col-md- col-sm-6 col-xs-12">
                    <div class="section-title" data-aos="fade-left" data-aos-delay="800">
                        <?php
                        if ( $title ) {
                            echo '<h2 class="title-text mb-30">' . wp_kses_post($title) . '</h2>';
                        }
                        if ( $subtitle ) {
                            echo '<p class="mb-30">' . esc_html($subtitle) . '</p>';
                        }
                        if ( $btn_label ) {
                            echo '<a href="'.esc_url($btn_url).'" class="btn btn-border" '
                                    . wavee_is_external($btn_url). wavee_is_nofollow($btn_url).'>'
                                    . wp_kses_post($btn_label) .
                                 '</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ( !empty( $settings['shape']['url'] )) { ?>
        <span class="deco-img shape-img-1">
            <img src="<?php echo esc_url($settings['shape']['url']) ?>" alt="<?php echo esc_attr($settings['title']) ?>" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
        </span>
        <?php
    }
    if ( $settings['is_line'] == 'yes' ) : ?>
        <div class="line-wrap line-black">
            <div class="line-item"></div>
            <div class="line-item"></div>
            <div class="line-item"></div>
            <div class="line-item"></div>
            <div class="line-item"></div>
        </div>
    <?php
    endif;
    ?>
</section>