<section class="process_area sec_pad">
    <?php
    if( !empty( $settings['shape1']['id'] ) ) {
        echo wp_get_attachment_image( $settings['shape1']['id'], 'full', false, array( 'class' => 'dot_one p_absoulte' ) );
    }
    if( !empty( $settings['shape2']['id'] ) ) {
        echo wp_get_attachment_image( $settings['shape2']['id'], 'full', false, array( 'class' => 'dot_two p_absoulte' ) );
    }
    ?>
    <div class="container">
        <div class="row">
            <?php
            if ( !empty( $settings['features'] ) ) {
                foreach ( $settings['features'] as $feature ) {
                    ?>
                    <div class="col-lg-<?php echo esc_attr( $settings['column'] ) ?> col-sm-6 elementor-repeater-item-<?php echo $feature['_id'] ?>">
                        <div class="process_item">
                            <?php
                            if( !empty( $feature['icon_img']['id'] ) ) {
                                echo wp_get_attachment_image( $feature['icon_img']['id'], 'full');
                            }
                            if ( !empty( $feature['title'] ) ) {
                                echo '<h4 data-text="'.esc_attr($feature['serial_num']).'">' . esc_html( $feature['title'] ) . '</h4>';
                            }
                            if ( !empty( $feature['contents'] ) ) {
                                echo '<p>' . wp_kses_post( $feature['contents'] ) . '</p>';
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
</section>