<?php
namespace WaveeCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



/**
 * Text Typing Effect
 *
 * Elementor widget for text typing effect.
 *
 * @since 1.7.0
 */
class Wavee_contact_form extends Widget_Base {

    public function get_name() {
        return 'wavee_contact_form';
    }

    public function get_title() {
        return __( 'Contact form with Info', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return [ 'wavee-elements' ];
    }

    protected function _register_controls() {


        // ------------------------------------------- Section Title  -----------------------------------------//
        $this->start_controls_section(
            'title_sec',
            [
                'label' => __( 'Title', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title Text', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_section(); // End Title


        // ------------------------------------------- Section Subtitle  -----------------------------------------//
        $this->start_controls_section(
            'subtitle_sec',
            [
                'label' => __( 'Subtitle', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Subtitle Text', 'wavee-core' ),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section(); // End Subtitle


        //--------------------------------------- Infos -------------------------------------//
        $this->start_controls_section(
            'infos_sec',
            [
                'label' => __( 'Info', 'wavee-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'info', [
                'label' => __( 'Info Text', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $repeater->add_control(
            'icon', [
                'label' => __( 'Icon', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'options' => wavee_elegant_icons(),
                'include' => wavee_include_elegant_icons(),
            ]
        );

        $this->add_control(
            'infos',
            [
                'label' => __( 'Info', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ info }}}',
            ]
        );

        $this->end_controls_section(); // End Client Logos


        // ------------------------------------------- Contact Form Shortcode -------------------------------------- //
        $this->start_controls_section(
            'cf7_sec', [
                'label' => __( 'Shortcode', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'cf7', [
                'label' => esc_html__( 'Shortcode', 'wavee-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'description' => 'Enter your shortcode'
            ]
        );


        $this->end_controls_section(); // End Button



        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------//
         */
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .w_content_two h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .w_content_two h2
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style


        //------------------------------ Style Subtitle ------------------------------//
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .w_content_two p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'subtitle_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .w_content_two p
                ',
            ]
        );

        $this->end_controls_section(); // End Subtitle Style


        // -------------------------------------  Floating Images  -----------------------------------------//
        $this->start_controls_section(
            'floating_img_sec', [
                'label' => __( 'Floating Images', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'floating_img1', [
                'label' => esc_html__( 'Image One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/round.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img2', [
                'label' => esc_html__( 'Image Two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/clients_plan.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img3', [
                'label' => esc_html__( 'Image Three', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/blue_plan.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img4', [
                'label' => esc_html__( 'Image Four', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/dot.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img5', [
                'label' => esc_html__( 'Image Five', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/dot-1.png', __FILE__)
                ]
            ]
        );

        $this->end_controls_section(); // End Floating Images

    }

    protected function render() {

        $settings = $this->get_settings();

            if ( !empty( $settings['floating_img1']['url'] )) { ?>
                <div class="t_first p_absoulte">
                    <img class="layer layer2" data-depth="-0.20"
                         src="<?php echo esc_url( $settings['floating_img1']['url'] ) ?>"
                         alt="<?php echo esc_attr( $settings['title'] ) ?>">
                </div>
                <?php
            }

            if ( !empty( $settings['floating_img2']['url'] )) { ?>
                <div class="t_two p_absoulte">
                    <img class="layer layer2" data-depth="0.20" src="<?php echo esc_url( $settings['floating_img2']['url'] ) ?>"
                         alt="<?php echo esc_attr( $settings['title'] ) ?>">
                </div>
                <?php
            }

            if ( !empty( $settings['floating_img3']['url'] )) { ?>
                <div class="t_three p_absoulte">
                    <img class="layer layer2" data-depth="-0.20" src="<?php echo esc_url( $settings['floating_img3']['url'] ) ?>"
                         alt="<?php echo esc_attr( $settings['title'] ) ?>">
                </div>
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
            } ?>
            <div class="intro">
                <div class="container custom_container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="w_content_two w_contact_text">
                                <?php
                                    if ( !empty( $settings['title'] ) ) {
                                        echo '<h2>' . esc_html( $settings['title'] ) . '</h2>';
                                    }
                                    if ( !empty( $settings['subtitle'] ) ) {
                                        echo '<p>' . esc_html( $settings['subtitle'] ) . '</p>';
                                    } ?>
                                <ul class="list-unstyled w_contact_info">
                                    <?php
                                        if ( !empty( $settings['infos'] ) ) {
                                            foreach ( $settings['infos'] as $info ) {
                                                if ( !empty( $info['info'] ) ) { ?>
                                                    <li>
                                                        <i class="<?php echo esc_attr( $info['icon'] ) ?>"></i>
                                                        <?php echo wp_kses_post( $info['info']) ?>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                            if ( !empty( $settings['cf7'] ) ) { ?>
                                <div class="col-lg-5">
                                    <?php echo do_shortcode( $settings['cf7'] ) ?>
                                </div>
                                <?php
                            } ?>
                    </div>
                </div>
            </div>
        <?php
    }
}
