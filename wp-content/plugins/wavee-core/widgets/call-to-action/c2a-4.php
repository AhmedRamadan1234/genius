<?php
    if ( !empty( $settings['floating_img1']['url'] ) ) { ?>
        <div class="t_two p_absoulte">
            <img class="layer layer2" data-depth="-0.20"
                 src="<?php echo esc_url( $settings['floating_img1']['url'] ) ?>"
                 alt="<?php echo esc_attr( $settings['title'] ) ?>">
        </div>
        <?php
    }
    if ( !empty( $settings['floating_img2']['url'] )) { ?>
        <img class="t_shap p_absoulte" src="<?php echo esc_url( $settings['floating_img2']['url'] ) ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>">
        <?php
    }
    if ( !empty( $settings['floating_img3']['url'] )) { ?>
        <img class="b_shap p_absoulte" src="<?php echo esc_url( $settings['floating_img3']['url'] ) ?>" alt="<?php echo esc_attr( $settings['title'] ) ?>">
        <?php
    }
    if ( !empty( $settings['floating_img4']['url'] )) { ?>
        <img class="dot_one p_absoulte" src="<?php echo esc_url( $settings['floating_img4']['url'] ) ?>"
             alt="<?php echo esc_attr( $settings['title'] ) ?>">
        <?php
    }
    if ( !empty( $settings['floating_img5']['url'] )) { ?>
        <img class="dot_two p_absoulte" src="<?php echo esc_url( $settings['floating_img5']['url'] ) ?>"
             alt="<?php echo esc_attr( $settings['title'] ) ?>">
        <?php
    }
    if ( !empty( $settings['title_shape_latter'] ) ) {
        echo '<div class="text">' . esc_html($settings['title_shape_latter']) . '</div>';
    }
    ?>
    <div class="intro">
        <div class="container custom_container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="w_portfolio_img">
                        <div class="round p_absoulte"></div>
                        <?php
                        if ( !empty( $settings['f_image1']['id'] ) ) {
                            echo wp_get_attachment_image( $settings['f_image1']['id'], 'full');
                        }
                        ?>
                    </div>
                </div>
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
            </div>
        </div>
    </div>

