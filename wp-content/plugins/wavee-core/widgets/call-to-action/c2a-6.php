<footer id="footer-section" class="footer-section text-white text-center clearfix">
    <div class="decoration-wrapper sec-ptb-110 clearfix" data-background="<?php echo esc_url( $settings['bg_img']['url'] ) ?>">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-7 col-sm-7 col-xs-12">
                    <div class="section-title">
                        <?php
                        if ( !empty( $settings['logo']['id'] )) { ?>
                            <span class="logo" data-aos="fade-up" data-aos-delay="100">
                                <?php echo wp_get_attachment_image( $settings['logo']['id'], 'full' ) ?>
                            </span>
                            <?php
                        }
                        if ( !empty( $settings['title'] ) ) {
                            echo '<h2 class="title-text text-white mb-30" data-aos="fade-up" data-aos-delay="200">' . esc_html( $settings['title'] ) . '</h2>';
                        }
                        if ( !empty( $settings['subtitle'] ) ) {
                            echo '<p class="mb-60" data-aos="fade-up" data-aos-delay="300">' . esc_html( $settings['subtitle'] ) . '</p>';
                        }
                        ?>
                        <div class="btn-wrap clearfix" data-aos="fade-up" data-aos-delay="500">
                            <?php
                            if ( !empty( $settings['buttons'] ) ) {
                                foreach ( $settings['buttons'] as $button ) {
                                    if ( !empty( $button['btn_label'] )) { ?>
                                        <a href="<?php echo esc_url( $button['btn_url']['url'] ) ?>" class="btn btn-border elementor-repeater-item-<?php echo $button['_id'] ?>"
                                            <?php wavee_is_external( $button['btn_url'] ); wavee_is_nofollow( $button['btn_url'] ) ?>>
                                            <?php echo esc_html( $button['btn_label'] ) ?>
                                            <i class="fal fa-shopping-cart ml-2"></i>
                                        </a>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ( !empty( $settings['shape1']['id'] )) { ?>
                <span class="deco-img shape-img-1" data-aos="fade-down" data-aos-delay="800">
                    <?php echo wp_get_attachment_image( $settings['shape1']['id'], 'full' ) ?>
                </span>
                <?php
            }
            if ( !empty( $settings['shape2']['id'] )) { ?>
                <span class="deco-img shape-img-2" data-aos="fade-down" data-aos-delay="1000">
                    <?php echo wp_get_attachment_image( $settings['shape2']['id'], 'full' ) ?>
                </span>
                <?php
            }
            ?>
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
</footer>

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