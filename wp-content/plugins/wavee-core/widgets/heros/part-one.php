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
                    if ( !empty( $settings['circle_image2']['id'] ) ) {
                        echo wp_get_attachment_image($settings['circle_image2']['id'], 'full', false, array('class' => 't_three p_absoulte wow'));
                    }
                    if ( !empty( $settings['title'] ) ) {
                        echo '<h2>' . esc_html($settings['title']) . '</h2>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="w_img_one">
                    <?php
                    if( !empty( $settings['f_image']['id'] ) ) {
                        echo wp_get_attachment_image( $settings['f_image']['id'], 'full');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>