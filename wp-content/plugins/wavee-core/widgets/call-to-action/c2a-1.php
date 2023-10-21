<?php
    if ( !empty( $settings['floating_img1']['url'] )) { ?>
        <div class="t_first p_absoulte">
            <img class="layer layer2" data-depth="-0.20" src="<?php echo esc_url( $settings['floating_img1']['url'] ) ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>">
        </div>
        <?php
    }
    if ( !empty( $settings['floating_img2']['url'] )) { ?>
        <div class="t_two p_absoulte">
            <img class="layer layer2" data-depth="0.50" src="<?php echo esc_url( $settings['floating_img2']['url'] ) ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>">
        </div>
        <?php
    }
    if ( !empty( $settings['floating_img3']['url'] )) { ?>
        <div class="t_four p_absoulte">
            <img class="layer layer2" data-depth="0.30" src="<?php echo esc_url( $settings['floating_img3']['url'] ) ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>">
        </div>
        <?php
    }
    if ( !empty( $settings['floating_img4']['url'] )) {  ?>
        <div class="t_five p_absoulte">
            <img class="layer layer2" data-depth="0.10" src="<?php echo esc_url( $settings['floating_img4']['url'] ) ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>">
        </div>
        <?php
    }
    ?>
    <div class="s_round r_one p_absoulte"></div>
    <div class="s_round r_two p_absoulte"></div>
    <div class="s_round r_three p_absoulte"></div>
    <div class="intro">
        <div class="container custom_container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="w_content_two">
                        <?php
                        echo !empty( $settings['title'] ) ? '<h2>' . esc_html($settings['title']) . '</h2>' : '';
                        echo !empty( $settings ['subtitle'] ) ? wpautop( $settings['subtitle'] ) : '';

                        if ( !empty( $settings['buttons'] ) ) {
                            foreach ( $settings['buttons'] as $button ) {
                                if ( !empty( $button['btn_label'] ) ) { ?>
                                    <a href="<?php echo esc_url( $button['btn_url']['url'] ) ?>" class="p_btn elementor-repeater-item-<?php echo $button['_id'] ?>"
                                        <?php wavee_is_external( $button['btn_url'] ); wavee_is_nofollow( $button['btn_url'] ) ?>>
                                        <?php echo esc_html( $button['btn_label'] ) ?>
                                    </a>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="w_img_one">
                        <div class="round p_absoulte"></div>
                        <?php
                        if( !empty( $settings['f_image1']['id'] ) ) {
                            echo wp_get_attachment_image( $settings['f_image1']['id'], 'full');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
