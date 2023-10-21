<section id="blog-section" class="blog-section text-center text-white clearfix">
    <div class="decoration-wrapper sec-ptb-110 pb-0 clearfix" data-background="<?php echo esc_url( $settings['bg_img']['url'] ) ?>">
        <div class="container">
            <div class="row justify-content-center mb-60" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12">
                    <div class="section-title">
                        <?php
                        if ( !empty( $settings['title'] ) ) {
                            echo '<h2 class="title-text text-white mb-30">' . esc_html( $settings['title'] ) . '</h2>';
                        }
                        if ( !empty( $settings['subtitle'] ) ) {
                            echo '<p class="mb-0">' . esc_html( $settings['subtitle'] ) . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <?php
                if ( !empty( $settings['features2'] ) ) {
                    $i = 1;
                    foreach ( $settings['features2'] as $feature ) {
                        ++$i;
                        $delay_time = ($i % 2 == 1) ? '500' : '300';
                        ?>
                        <div class="d-flex align-items-end col-4" data-aos="fade-up" data-aos-delay="500">
                            <div class="feature-wrap">
                                <?php
                                if ( !empty( $feature['f_image']['id'] )) { ?>
                                    <div class="image-wrap">
                                        <?php echo wp_get_attachment_image( $feature['f_image']['id'], 'full' ) ?>
                                    </div>
                                     <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
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
    </div>
</section>

<script>
    ;(function($) {
        "use strict";
        $(document).ready( function () {
            $('[data-background]').each(function() {
                $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
            });
        })
    })(jQuery);
</script>