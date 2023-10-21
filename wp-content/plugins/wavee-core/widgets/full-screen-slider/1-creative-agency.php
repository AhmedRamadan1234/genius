<div id="wavescroll">
    <?php
    if ( !empty( $settings['sliders'] ) ) {
        foreach ( $settings['sliders'] as $slider ) {
            ?>
            <div class="section fullpage_slider_section">
                <div class="fullpage_slider">
                    <div class="container">
                        <div class="row flex-row-reverse align-items-center">
                            <div class="col-md-9 col-sm-8">
                                <div class="fullpage_slider_img">
                                    <?php
                                    if ( !empty( $slider['shape_img']['url'] ) ) { ?>
                                        <style>
                                            .fullpage_slider_img:before {
                                                background: url(<?php echo esc_url( $slider['shape_img']['url'] ) ?>) no-repeat scroll top left;
                                            }
                                        </style>
                                        <?php
                                    }
                                    if ( !empty( $slider['image']['id'] ) ) {
                                        echo wp_get_attachment_image( $slider['image']['id'], 'full');
                                    }
                                    ?>
                                    <div class="overlay_img p_absoulte"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <div class="fullpage_slider_content">
                                    <?php
                                    if ( !empty( $slider['title_01'] ) ) {
                                        echo '<div class="text_f"><span>' . esc_html( $slider['title_01'] ) . '</span></div>';
                                    }
                                    if ( !empty( $slider['title_02'] ) ) {
                                        echo '<div class="text_s"><span>' . esc_html( $slider['title_02'] ) . '</span></div>';
                                    }
                                    if ( !empty( $slider['btn_label'] ) ) {
                                        echo '<a href="'.esc_url( $slider['btn_url']['url'] ).'" class="fullpage_slider_btn elementor-repeater-item- '. $slider['_id'] .'" 
                                                         '.wavee_is_external( $slider['btn_url'] ) . wavee_is_nofollow($slider['btn_url'] ).'>' . esc_html( $slider['btn_label'] ) .
                                             '</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<div class="fullpage_slider_bg p_absoulte"></div>
<div class="memphis_rounds">
    <div class="f_round layer" data-depth="0.1">
        <div class="fullpage_round one"></div>
        <div class="fullpage_round two"></div>
        <?php
        if ( !empty( $settings['round_animation']['url'] ) ) { ?>
            <style>
                .fullpage_round.two:before {
                    background: url( <?php echo esc_url( $settings['round_animation']['url'] ) ?> )
                    no-repeat scroll center center;
                }
            </style>
            <?php
        }
        ?>
    </div>

    <?php
    if ( !empty( $settings['memphis_img1']['url'] )) { ?>
        <img class="p_absoulte memphis_one" src="<?php echo esc_url( $settings['memphis_img1']['url'] ) ?>"
             alt="<?php echo esc_attr( $slider['name'] ) ?>">
        <?php
    }
    if ( !empty( $settings['memphis_img2']['url'] )) { ?>
        <div class="p_absoulte memphis_two">
            <img class="layer layer2" data-depth="0.30"
                 src="<?php echo esc_url( $settings['memphis_img2']['url'] ) ?>"
                 alt="<?php echo esc_attr( $slider['name'] ) ?>">
        </div>
        <?php
    }
    if ( !empty( $settings['memphis_img3']['url'] )) { ?>
        <div class="p_absoulte memphis_three">
            <img class="layer layer2" data-depth="-0.20"
                 src="<?php echo esc_url( $settings['memphis_img3']['url'] ) ?>"
                 alt="<?php echo esc_attr( $slider['name'] ) ?>">
        </div>
        <?php
    }
    if ( !empty( $settings['memphis_img4']['url'] )) { ?>
        <div class="p_absoulte memphis_four">
            <img class="layer layer2" data-depth="0.20"
                 src="<?php echo esc_url( $settings['memphis_img4']['url'] ) ?>"
                 alt="<?php echo esc_attr( $slider['name'] ) ?>">
        </div>
        <?php
    }
    if ( !empty( $settings['memphis_img5']['url'] )) { ?>
        <img class="p_absoulte memphis_five" src="<?php echo esc_url( $settings['memphis_img5']['url'] ) ?>"
             alt="<?php echo esc_attr( $slider['name'] ) ?>">
        <?php
    }
    ?>
    <div class="memphis_round p_absoulte r_one"></div>
    <div class="memphis_round p_absoulte r_two"></div>
</div>
<?php
if ( !empty( $settings['memphis_img6']['id'] ) ) {
    echo wp_get_attachment_image($settings['memphis_img6']['id'], 'full', false, array( 'class' => 'memphis_top p_absoulte' ) );
}
if ( !empty( $settings['memphis_img7']['id'] ) ) {
    echo wp_get_attachment_image($settings['memphis_img7']['id'], 'full', false, array( 'class' => 'memphis_left p_absoulte' ) );
}
if ( !empty( $settings['memphis_img8']['id'] ) ) {
    echo wp_get_attachment_image($settings['memphis_img8']['id'], 'full', false, array( 'class' => 'memphis_bottom p_absoulte' ) );
}