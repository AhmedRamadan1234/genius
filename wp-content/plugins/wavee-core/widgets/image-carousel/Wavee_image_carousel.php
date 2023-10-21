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
class Wavee_image_carousel extends Widget_Base {

    public function get_name() {
        return 'wavee_image_carousel';
    }

    public function get_title() {
        return __( 'Wavee Image Carousel', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_style_depends() {
        return [ 'owl-carousel', 'owl-theme', 'wavee-demo' ];
    }

    public function get_script_depends() {
        return [ 'owl-carousel' ];
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
                    'style_02' => esc_html__('Style Two', 'wavee-core'),
                ],
                'default' => 'style_01'
            ]
        );

        $this->end_controls_section(); // End Style


        // ----------------------------------------  Title   --------------------------------------//
        $this->start_controls_section(
            'title_sec', [
                'label' => __( 'Title', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'wavee-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Creative & versatile portfolio'
            ]
        );

        $this->end_controls_section(); // End Title


        // ----------------------------------------  Title   --------------------------------------//
        $this->start_controls_section(
            'subtitle_sec', [
                'label' => __( 'Contents', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $this->add_control(
            'subtitle', [
                'label' => esc_html__( 'Contents', 'wavee-core' ),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section(); // End Title


        //-------------------------- Featured Images ------------------------------//
        $this->start_controls_section(
            'image_carousels_sec', [
                'label' => __( 'Image Carousel', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $image_carousels = new \Elementor\Repeater();

        $image_carousels->add_control(
            'image_item',
            [
                'label' => __( 'Hidden', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::HIDDEN,
            ]
        );

        $image_carousels->add_control(
            'image_carousel', [
                'label' => __( 'Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $image_carousels->add_control(
            'link', [
                'label' => __( 'Link', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'wavee-core' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'image_carousels',
            [
                'label' => __( 'Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $image_carousels->get_controls(),
                'title_field' => '{{{ image_item }}}',
            ]
        );

        $this->end_controls_section(); // End Featured Images


        /**
         * Style Tab
         * @@@@
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'style_title_sec', [
                'label' => __( 'Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $this->add_control(
            'color_title', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .title-text' => 'color: {{VALUE}} !important;',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_prefix',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .section-title .title-text
                ',
            ]
        );

        $this->end_controls_section();


        //--------------------------------- Subtitle  ---------------------------------------//
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $this->add_control(
            'color_subtitle', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .section-title p',
            ]
        );

        $this->end_controls_section();


        //------------------------------  Section Background --------------------------------//
        $this->start_controls_section(
            'section_bg_style',
            [
                'label' => esc_html__( 'Section Background', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
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
                    '{{WRAPPER}} .sec-ptb-110' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->add_control(
            'is_line',
            [
                'label' => __( 'Is Line Up to Bottom', 'rogan-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'rogan-core' ),
                'label_off' => __( 'Hide', 'rogan-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();

        $image_carousels = !empty( $settings['image_carousels'] ) ? $settings['image_carousels'] : '';

        if ( $settings['style'] == 'style_01' ) {
            include 'image-carousel-1.php';
        }

        if ( $settings['style'] == 'style_02' ) {
            include 'image-carousel-2.php';
        }

    }
}
