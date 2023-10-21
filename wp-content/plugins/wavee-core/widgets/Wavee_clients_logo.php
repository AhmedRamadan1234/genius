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
class Wavee_clients_logo extends Widget_Base {

    public function get_name() {
        return 'wavee_clients_logo';
    }

    public function get_title() {
        return __( 'Clients Logo', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-logo';
    }

    public function get_categories() {
        return [ 'wavee-elements' ];
    }


    protected function _register_controls() {


        // ----------------------------------------  Select Style  --------------------------------------//
        $this->start_controls_section(
            'select_style',
            [
                'label' => __( 'Select Style', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'style', [
                'label' => esc_html__( 'Style', 'wavee-core' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'style_01' => esc_html__('Style One', 'wavee-core'),
                    'style_02' => esc_html__('Style Two ( With Background Animation )', 'wavee-core'),
                ],
                'default' => 'style_01'
            ]
        );

        $this->end_controls_section(); // End Style


        //--------------------------------------- Logos -------------------------------------//
        $this->start_controls_section(
            'title_sec',
            [
                'label' => __( 'Title', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_02'
                ]
            ]
        );

        $this->add_control(
            'title', [
                'label' => __( 'Title Text', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Our Clients'
            ]
        );

        $this->end_controls_section();


        //--------------------------------------- Logos -------------------------------------//
        $this->start_controls_section(
            'logos_sec',
            [
                'label' => __( 'Clients Logo', 'wavee-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'alt', [
                'label' => __( 'Alt Text', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Company Name'
            ]
        );

        $repeater->add_control(
            'client_logo', [
                'label' => __( 'Title', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'logo_url', [
                'label' => esc_html__( 'Logo URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ]
            ]
        );

        $this->add_control(
            'logos',
            [
                'label' => __( 'Logo', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ alt }}}',
            ]
        );

        $this->end_controls_section(); // End Client Logos


        //---------------------------------------- Style Title -----------------------------------------------//
        $this->start_controls_section(
            'style_title_sec', [
                'label' => __( 'Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_02'
                ]
            ]
        );

        $this->add_control(
            'color_title', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .s_section_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .s_section_title
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style

        // -------------------------------------  Floating Images  -----------------------------------------//
        $this->start_controls_section(
            'floating_img_sec', [
                'label' => __( 'Floating Images', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_02'
                ]
            ]
        );

        $this->add_control(
            'floating_img1', [
                'label' => esc_html__( 'Image One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/clients_plan_bottom.png', __FILE__)
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

        $this->end_controls_section(); //End Floating Images


        // -------------------------------------  Logo Shape Images  -----------------------------------------//
        $this->start_controls_section(
            'logo_shape_img_sec', [
                'label' => __( 'Logo Shape Images', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_02'
                ]
            ]
        );

        $this->add_control(
            'logo_shape1', [
                'label' => esc_html__( 'Shape One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'logo_shape2', [
                'label' => esc_html__( 'Shape Two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();


        //------------------------------  Section Background Style  --------------------------------//
        $this->start_controls_section(
            'sec_bg_style',
            [
                'label' => esc_html__( 'Section Background', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => __( 'Padding', 'wavee-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sec_pad' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();

        if ( $settings['style'] == 'style_01' ) {
            ?>
            <section class="clients_logo_area sec_pad">
                <div class="container custom_container">
                    <div class="sc_clients_logo_info">
                        <?php
                        if ( !empty( $settings['logos'] ) ) {
                            foreach ( $settings['logos'] as $logo ) {
                                ?>
                                <a href="<?php echo esc_url( $logo['logo_url']['url'] ) ?>" class="c_logo_item elementor-repeater-item-<?php echo $logo['_id'] ?>"
                                    <?php wavee_is_external( $logo['logo_url'] ); wavee_is_nofollow( $logo['logo_url'] ) ?>>
                                    <img src="<?php echo esc_url( $logo['client_logo']['url'] ) ?>" alt="<?php echo esc_attr( $logo['alt'] ) ?>">
                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
            <?php
        }

        elseif ( $settings['style'] == 'style_02' ) {

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
                    <img class="layer layer2" data-depth="0.20"
                         src="<?php echo esc_url( $settings['floating_img2']['url'] ) ?>"
                         alt="<?php echo esc_attr( $settings['title'] ) ?>">
                </div>
                <?php
            } ?>
            <div class="intro">
                <div class="container custom_container">
                    <?php
                    if ( !empty( $settings['title'] ) ) {
                        echo '<h2 class="s_section_title">' . esc_html( $settings['title'] ). '</h2>';
                    }
                    ?>
                    <div class="sc_clients_logo_info">
                        <?php
                        if ( !empty( $settings['logo_shape1']['url'] ) ) {
                            ?>
                            <style>
                                .sc_clients_logo_info:before {
                                    background: url( <?php echo esc_url( $settings['logo_shape1']['url'] ) ?>);
                                }
                            </style>
                            <?php
                        }
                        // Clients logo repeater
                        if ( !empty( $settings['logos'] ) ) {
                            foreach ( $settings['logos'] as $logo ) {
                                ?>
                                <a href="<?php echo esc_url( $logo['logo_url']['url'] ) ?>" class="c_logo_item elementor-repeater-item-<?php echo $logo['_id'] ?>"
                                    <?php wavee_is_external( $logo['logo_url'] ); wavee_is_nofollow( $logo['logo_url'] ) ?>>
                                    <img src="<?php echo esc_url( $logo['client_logo']['url'] ) ?>" alt="<?php echo esc_attr( $logo['alt'] ) ?>">
                                </a>
                                <?php
                            }
                        }
                        if ( !empty( $settings['logo_shape2']['url'] ) ) { ?>
                            <style>
                                .sc_clients_logo_info:after {
                                    background: url( <?php echo esc_url( $settings['logo_shape2']['url'] ) ?> );
                                }
                            </style>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
