<section id="innerpage-section" class="innerpage-section position-relative clearfix">
    <div class="container mb-60" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
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
    </div>
    <div id="innerpage-carousel" class="innerpage-carousel arrow-top-right owl-carousel owl-theme" data-aos="fade-up" data-aos-delay="300">
        <?php
        if ( $image_carousels ) {
            foreach ( $image_carousels as $carousel ) {
                ?>
                <div class="item">
                    <a href="<?php echo esc_url( $carousel['link']['url'] ) ?>" class="portfolio-fullimage" <?php  wavee_is_external( $carousel['link'] ); wavee_is_nofollow( $carousel['link'] ); ?>>
                        <?php echo wp_get_attachment_image( $carousel['image_carousel']['id'], 'full' ) ?>
                    </a>
                </div>
                <?php
            }
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
</section>

<script>
    ;(function($) {
        "use strict";
        $(document).ready( function () {
            $('#innerpage-carousel').owlCarousel({
                loop:true,
                nav:true,
                margin:0,
                dots:false,
                center:true,
                autoplay:true,
                smartSpeed:1000,
                autoplayTimeout:6000,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:1
                    },
                    580:{
                        items:2
                    },
                    680:{
                        items:2
                    },
                    1199:{
                        items:3
                    },
                    1200:{
                        items:4
                    },
                    1920:{
                        items:4
                    }
                }
            });
        })
    })(jQuery);
</script>