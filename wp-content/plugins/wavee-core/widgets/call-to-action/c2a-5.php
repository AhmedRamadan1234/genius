<?php
    if ( !empty( $settings['bg_title'] ) ) {
        echo '<div class="bg-title"><div class="layer layer2" data-depth="-0.20">' . esc_html($settings['bg_title']) . '</div></div>';
    }
    if ( !empty( $settings['floating_img1']['url'] ) ) { ?>
        <div class="t_first p_absoulte">
            <img class="layer layer2" data-depth="-0.20"
                 src="<?php echo esc_url( $settings['floating_img1']['url'] ) ?>"
                 alt="<?php echo esc_attr( $settings['title'] ) ?>">
        </div>
        <?php
    }
    if ( !empty( $settings['floating_img2']['url'] ) ) { ?>
        <div class="t_two p_absoulte">
            <img class="layer layer2" data-depth="0.50"
                 src="<?php echo esc_url( $settings['floating_img2']['url'] ) ?>"
                 alt="<?php echo esc_attr( $settings['title'] ) ?>">
        </div>
        <?php
    }
    if ( !empty( $settings['floating_img3']['url'] ) ) { ?>
        <div class="t_four p_absoulte">
            <img class="layer layer2" data-depth="0.30"
                 src="<?php echo esc_url($settings['floating_img3']['url']) ?>"
                 alt="<?php echo esc_attr( $settings['title'] ) ?>">
        </div>
        <?php
    }
    if ( !empty( $settings['floating_img4']['url'] ) ) { ?>
        <div class="t_five p_absoulte">
            <img class="layer layer2" data-depth="0.10"
                 src="<?php echo esc_url( $settings['floating_img4']['url'] ) ?>"
                 alt="<?php echo esc_attr( $settings['title'] ) ?>">
        </div>
        <?php
    }
    ?>
    <div class="intro">
        <div class="container custom_container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="w_content_two">
                        <?php
                        if ( !empty( $settings['title'] ) ) {
                            echo '<h2>' . esc_html($settings['title']) . '</h2>';
                        }
                        if ( !empty( $settings['subtitle'] ) ) {
                            echo '<p>' . esc_html($settings['subtitle']) . '</p>';
                        }
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

                    <div class="w_mockup_img">
                        <?php
                        if ( !empty( $settings['circle_img']['url'] ) ) { ?>
                            <style>
                                .w_mockup_img:before {
                                    background: url( <?php echo esc_url( $settings['circle_img']['url'] ) ?> )
                                    no-repeat center top;
                                }
                            </style>
                            <?php
                        }

                        if ( !empty( $settings['images'] ) ) {
                            foreach ( $settings['images'] as $index => $image ) {
                                switch ( $index ) {

                                    case 0:
                                        $align_class = 'img_screen one';
                                        break;
                                    case 1:
                                        $align_class = 'img_screen two';
                                        break;
                                    case 2:
                                        $align_class = 'img_screen three';
                                        break;
                                    case 3:
                                        $align_class = 'img_four';
                                        break;
                                }
                                ?>
                                <div class="<?php echo esc_attr( $align_class ) ?>">
                                    <?php echo wp_get_attachment_image( $image['image']['id'], 'full') ?>
                                </div>
                                <?php

                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
