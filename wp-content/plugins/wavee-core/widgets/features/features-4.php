<section id="responsive-section" class="responsive-section text-white clearfix">
    <div class="decoration-wrapper d-flex align-items-center clearfix">
        <div class="container">
            <div class="row justify-content-lg-start">
                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                    <div class="section-title">
                        <?php
                        if ( !empty( $settings['title'] ) ) {
                            echo '<h2 class="title-text text-white mb-15">' . esc_html( $settings['title'] ) . '</h2>';
                        }
                        if ( !empty( $settings['subtitle'] ) ) {
                            echo '<p class="mb-0">' . esc_html( $settings['subtitle'] ) . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="phone-images ul-li clearfix">
            <ul class="clearfix">
                <?php
                $delay_time = 100;
                if ( !empty( $settings['features2'] ) ) {
                    foreach ( $settings['features2'] as $feature ) {
                        ?>
                        <li>
                            <img src="<?php echo esc_url( $feature['f_image']['url'] ) ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>" data-aos="fade-down-left" data-aos-delay="<?php echo esc_attr( $delay_time ) ?>s">
                        </li>
                        <?php
                        $delay_time = $delay_time + 200;
                    }
                }
                ?>
            </ul>
        </div>
        <?php
        if ( !empty( $settings['shape1']['url'] )) { ?>
            <span class="deco-img shape-img-1" data-parallax='{"y" : 100}'>
                <img src="<?php echo esc_url( $settings['shape1']['url'] ) ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>" data-aos="fade-up" data-aos-delay="100">
            </span>
            <?php
        }
        if ( !empty( $settings['shape2']['url'] )) { ?>
            <span class="deco-img shape-img-2">
                <img src="<?php echo esc_url( $settings['shape2']['url'] ) ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>" data-aos="fade-right" data-aos-delay="300">
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