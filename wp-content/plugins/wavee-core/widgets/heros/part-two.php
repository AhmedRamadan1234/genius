<?php
if ( !empty( $settings['floating_img1']['url'] )) { ?>
    <div class="t_first p_absoulte">
        <img class="layer layer2" data-depth="-0.20" src="<?php echo esc_url($settings['floating_img1']['url']) ?>"
             alt="<?php echo esc_attr($settings['title']) ?>">
    </div>
    <?php
}
if ( !empty( $settings['floating_img2']['url'] )) { ?>
    <div class="t_two p_absoulte">
        <img class="layer layer2" data-depth="0.30" src="<?php echo esc_url($settings['floating_img2']['url']) ?>"
             alt="<?php echo esc_attr($settings['title']) ?>">
    </div>
    <?php
}
if ( !empty( $settings['floating_img3']['url'] )) { ?>
    <div class="t_three p_absoulte"><img class="layer layer2" data-depth="0.30" src="<?php echo esc_url($settings['floating_img3']['url']) ?>"
         alt="<?php echo esc_attr($settings['title']) ?>">
    </div>
    <?php
}
?>
<div class="intro">
    <div class="container custom_container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="w_content">
                    <?php
                    if ( !empty( $settings['circle_image1']['id'] ) ) {
                        echo wp_get_attachment_image($settings['circle_image1']['id'], 'full', false, array('class' => 'circle_line'));
                    }
                    if ( !empty( $settings['title'] ) ) {
                        echo '<h2 class="wow">' . esc_html($settings['title']) . '</h2>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="w_img_table text-center">
                    <?php
                    if ( !empty( $settings['images'] ) ) {
                        foreach ( $settings['images'] as $index => $image ) {
                            switch ( $index ) {
                                case 0:
                                    $align_class = 'first p_absoulte';
                                    break;
                                case 1:
                                    $align_class = 'two p_absoulte';
                                    break;
                                case 2:
                                    $align_class = 'flower p_absoulte';
                                    break;
                                case 3:
                                    $align_class = 'laptop p_absoulte is-animated';
                                    break;
                                case 4:
                                    $align_class = 'table_img wow fadeInLeft';
                                    break;
                            }
                            ?>
                            <img class="<?php echo esc_attr( $align_class ) ?> elementor-repeater-item-<?php echo $image['_id'] ?>"
                                 src="<?php echo esc_url( $image['f_images']['url'] ) ?>"
                                 alt="<?php echo esc_attr( $settings['title'] ) ?>">
                            <?php

                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>