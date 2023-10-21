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
class Wavee_c2a extends Widget_Base {

    public function get_name() {
        return 'Wavee_c2a';
    }

    public function get_title() {
        return __( 'Call to Action', 'wavee-core' );
    }

    public function get_icon() {
        return ' eicon-call-to-action';
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
                    'style_03' => esc_html__('Style Three', 'wavee-core'),
                    'style_04' => esc_html__('Style Four', 'wavee-core'),
                    'style_05' => esc_html__('Style Five (With Background Title)', 'wavee-core'),
                    'style_06' => esc_html__('Style Six', 'wavee-core'),
                ],
                'default' => 'style_01'
            ]
        );

        $this->end_controls_section(); // End Style


        // ------------------------------------------- Section Title  -----------------------------------------//
        $this->start_controls_section(
            'logo_sec',
            [
                'label' => __( 'Logo', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_06'
                ]
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => esc_html__( 'Upload Logo', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();


        // ------------------------------------------- Section Title  -----------------------------------------//
        $this->start_controls_section(
            'title_sec',
            [
                'label' => __( 'Title', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'title_shape_latter',
            [
                'label' => esc_html__( 'Title Shape Latter', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'style' => 'style_04'
                ]
            ]
        );

        $this->add_control(
            'bg_title',
            [
                'label' => esc_html__( 'Background Title', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'style' => 'style_05'
                ]
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


        // ----------------------------------------  Subtitle  --------------------------------------//
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


        // -------------------------------------------------- Featured Image  ------------------------------
        $this->start_controls_section(
            'f_image_sec', [
                'label' => __( 'Featured Images', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_04' ]
                ]
            ]
        );

        $this->add_control(
            'f_image1', [
                'label' => esc_html__( 'Upload the featured image one', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_04' ]
                ]
            ]
        );

        $this->add_control(
            'f_image2', [
                'label' => esc_html__( 'Upload the featured image two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' =>  'style_02'
                ]
            ]
        );

        $this->add_control(
            'f_image3', [
                'label' => esc_html__( 'Upload the featured image three', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' =>  'style_02'
                ]
            ]
        );

        $this->add_control(
            'f_image4', [
                'label' => esc_html__( 'Upload the featured image four', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' =>  'style_02'
                ]
            ]
        );

        $this->end_controls_section(); // End Featured Image


        // ------------------------------------  Images --------------------------------------//
        $this->start_controls_section(
            'image_sec_style3',
            [
                'label' => __( 'Images', 'wavee-core' ),
                'condition' => [
                    'style' =>  [ 'style_03', 'style_05' ]
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image_item',
            [
                'label' => __( 'Hidden', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::HIDDEN,
            ]
        );

        $repeater->add_control(
            'image', [
                'label' => __( 'Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'images',
            [
                'label' => __( 'Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ image_item }}}',
            ]
        );

        $this->add_control(
            'circle_img', [
                'label' => esc_html__( 'Shape Image', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url( 'images/shape/shape_circle.png', __FILE__)
                ]
            ]
        );

        $this->end_controls_section(); // End Images section


        /// --------------------------------------- Buttons ----------------------------------///
        $this->start_controls_section(
            'buttons_sec', [
                'label' => esc_html__( 'Buttons', 'wavee-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'btn_label', [
                'label' => esc_html__( 'Button Label', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Case Study'
            ]
        );

        $repeater->add_control(
            'btn_url', [
                'label' => esc_html__( 'Button URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ]
            ]
        );

        $repeater->start_controls_tabs(
            'style_btn_tabs'
        );

        // Normal Button Style
        $repeater->start_controls_tab(
            'style_normal_btn',
            [
                'label' => esc_html__( 'Normal', 'wavee-core' ),
            ]
        );

        $repeater->add_control(
            'normal_font_color', [
                'label' => esc_html__( 'Font Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}',
                ],

            ]
        );

        $repeater->add_control(
            'normal_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background: {{VALUE}}',
                ],
            ]
        );

        $repeater->add_control(
            'normal_border_color',
            [
                'label' => esc_html__( 'Border Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $repeater->end_controls_tab();

        // Hover Button Style
        $repeater->start_controls_tab(
            'style_hover_btn',
            [
                'label' => esc_html__( 'Hover', 'wavee-core' ),
            ]
        );

        $repeater->add_control(
            'hover_font_color', [
                'label' => esc_html__( 'Font Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}}',
                )
            ]
        );

        $repeater->add_control(
            'hover_bg_color', [
                'label' => esc_html__( 'Background Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'background: {{VALUE}}',
                )
            ]
        );

        $repeater->add_control(
            'hover_border_color', [
                'label' => esc_html__( 'Border Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'border-color: {{VALUE}}',
                )
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        // Buttons repeater field
        $this->add_control(
            'buttons', [
                'label' => esc_html__( 'Create buttons', 'wavee-core' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ btn_label }}}',
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section(); // End Buttons


        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'style_title_sec', [
                'label' => __( 'Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .w_content_two h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title .title-text' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .w_content_two h2,
                    {{WRAPPER}} .section-title .title-text
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style


        //---------------------------------------- Start Subtitle -------------------------------------------------//
        $this->start_controls_section(
            'style_subtitle_sec', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_subtitle', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .w_content_two p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .w_content_two p,
                    {{WRAPPER}} .section-title p
                ',
            ]
        );

        $this->end_controls_section(); // End subtitle Style


        // -------------------------------------  Floating Images  -----------------------------------------//
        $this->start_controls_section(
            'floating_img_sec', [
                'label' => __( 'Floating Images', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' =>  [ 'style_01', 'style_02', 'style_03', 'style_04', 'style_05' ]
                ]
            ]
        );

        $this->add_control(
            'floating_img1', [
                'label' => esc_html__( 'Image One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/t_angle.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img2', [
                'label' => esc_html__( 'Image Two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/triangle_shap_two.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img3', [
                'label' => esc_html__( 'Image Three', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/triangle_shap_three.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img4', [
                'label' => esc_html__( 'Image Four', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/triangle_shap_four.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img5', [
                'label' => esc_html__( 'Image Five', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/dot-1.png', __FILE__)
                ],
                'condition' => [
                    'style' =>  'style_04',
                ]
            ]
        );

        $this->end_controls_section(); // End Floating Images


        // -------------------------------------  shape Images -----------------------------------------//
        $this->start_controls_section(
            'shape_images_sec', [
                'label' => __( 'Shape Images', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_06'
                ]
            ]
        );

        $this->add_control(
            'shape1', [
                'label' => esc_html__( 'Shape One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'shape2', [
                'label' => esc_html__( 'Shape Two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section(); // End Floating Images


        //-------------------------------------------- Section Background ---------------------------------//
        $this->start_controls_section(
            'sec_bg_style',
            [
                'label' => esc_html__( 'Section Background', 'rogan-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' =>  'style_06'
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
            ]
        );

        $this->add_control(
            'sec_bg_overlay_color', [
                'label' => __( 'Background Overlay', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_img', [
                'label' => esc_html__( 'Background Image', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
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

        if ( $settings['style'] == 'style_01' ) {
            include 'call-to-action/c2a-1.php';
        }

        if ( $settings['style'] == 'style_02' ) {
            include 'call-to-action/c2a-2.php';
        }

        if ( $settings['style'] == 'style_03' ) {
            include 'call-to-action/c2a-3.php';
        }

        if ( $settings['style'] == 'style_04' ) {
            include 'call-to-action/c2a-4.php';
        }

        if ( $settings['style'] == 'style_05' ) {
            include 'call-to-action/c2a-5.php';
        }

        if ( $settings['style'] == 'style_06' ) {
            include 'call-to-action/c2a-6.php';
        }

    }
}
