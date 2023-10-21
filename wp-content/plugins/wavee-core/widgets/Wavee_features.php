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
class Wavee_features extends Widget_Base {

    public function get_name() {
        return 'wavee_features';
    }

    public function get_title() {
        return __( 'Features', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-number-field';
    }

    public function get_categories() {
        return [ 'wavee-elements' ];
    }

    protected function _register_controls() {


        // ----------------------------------------  Select Style  --------------------------------------//
        $this->start_controls_section(
            'select_hero_style',
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
                    'style_01' => esc_html__('01', 'wavee-core'),
                    'style_02' => esc_html__('02 (Featured Images)', 'wavee-core'),
                    'style_03' => esc_html__('03 (Layout Images)', 'wavee-core'),
                    'style_04' => esc_html__('04 (App Screenshots)', 'wavee-core'),
                    'style_05' => esc_html__('05 (Features box with icon)', 'wavee-core'),
                    'style_06' => esc_html__('06 (Features box with icon)', 'wavee-core'),
                ],
                'default' => 'style_01'
            ]
        );

        $this->end_controls_section(); // End Style


        // ----------------------------------------  Title  --------------------------------------//
        $this->start_controls_section(
            'title_sec', [
                'label' => __( 'Title', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_02', 'style_03', 'style_04', 'style_05', 'style_06' ]
                ]
            ]
        );

        $this->add_control(
            'title', [
                'label' => __( 'Title', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Awesome Blogging',
            ]
        );

        $this->end_controls_section(); // End Title


        // ---------------------------------------- Contents --------------------------------------//
        $this->start_controls_section(
            'subtitle_sec', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_02', 'style_04', 'style_06' ]
                ]
            ]
        );

        $this->add_control(
            'subtitle', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA
            ]
        );

        $this->end_controls_section(); // End Style


        //--------------------------------------- features 01  -------------------------------------//
        $this->start_controls_section(
            'features_sec', [
                'label' => __( 'Features', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'serial_num', [
                'label' => __( 'Item Serial Number', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'title', [
                'label' => __( 'Title', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icon_img', [
                'label' => __( 'Icon', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'contents', [
                'label' => __( 'Contents', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => __( 'Feature List', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section(); // End features


        //--------------------------------------- features 02 List -------------------------------------//
        $this->start_controls_section(
            'features2_sec', [
                'label' => __( 'Featured Images', 'wavee-core' ),
                'condition' => [
                    'style' => ['style_02', 'style_04' ]
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'align_item',
            [
                'label' => __( 'View', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::HIDDEN,
            ]
        );

        $repeater->add_control(
            'f_image', [
                'label' => __( 'Featured Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'features2',
            [
                'label' => __( 'Add Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ align_item }}}',
            ]
        );

        $this->end_controls_section(); // End features


        //--------------------------------------- features 03 List -------------------------------------//
        $this->start_controls_section(
            'features3_sec', [
                'label' => __( 'Featured Layout', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_03'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'layout_title',
            [
                'label' => __( 'Title', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Grid View'
            ]
        );

        $repeater->add_control(
            'layout_img', [
                'label' => __( 'Layout Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'features3',
            [
                'label' => __( 'Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ layout_title }}}',
            ]
        );

        $this->end_controls_section(); // End features
        

        //--------------------------------------- features 05 & 06 Style  -------------------------------------//
        $this->start_controls_section(
            'features4_sec', [
                'label' => __( 'Features', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_05', 'style_06' ]
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon_img', [
                'label' => __( 'Icon', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'title', [
                'label' => __( 'Title', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'contents', [
                'label' => __( 'Contents', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'features4',
            [
                'label' => __( 'Feature List', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section(); // End features


        /**
         * Style Tab
         */
        // ------------------------------ Title ------------------------------//
        $this->start_controls_section(
            'style_title_sec', [
                'label' => __( 'Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_02', 'style_03', 'style_04', 'style_05', 'style_06' ]
                ]
            ]
        );

        $this->add_control(
            'title_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .title-text' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .section-title .title-text',
            ]
        );

        $this->end_controls_section(); // End Title Style


        // ------------------------------  Subtitle ------------------------------//
        $this->start_controls_section(
            'style_subtitle_sec', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_02', 'style_04', 'style_06' ]
                ]
            ]
        );

        $this->add_control(
            'subtitle_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'subtitle_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .section-title p',
            ]
        );

        $this->end_controls_section(); // End Title Style


        // ------------------------------ Style Item Title ------------------------------//
        $this->start_controls_section(
            'style_item_title_sec', [
                'label' => __( 'Item Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_05', 'style_06' ]
                ]
            ]
        );

        $this->add_control(
            'item_title_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_item h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .plugin-item .item-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .feature-item .item-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'item_title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .process_item h4,
                    {{WRAPPER}} .plugin-item .item-title,
                    {{WRAPPER}} .feature-item .item-title
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style


         // ------------------------------ Style Item Subtitle ------------------------------//
        $this->start_controls_section(
            'style_item_content', [
                'label' => __( 'Item Content', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_05', 'style_06' ]
                ]
            ]
        );

        $this->add_control(
            'item_content_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_item p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .plugin-item p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .feature-item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'item_content_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .process_item p,
                    {{WRAPPER}} .plugin-item p,
                    {{WRAPPER}} .feature-item p
                    ',
            ]
        );

        $this->end_controls_section(); // End Item Subtitle Style


        //------------------------------  Shape Images  --------------------------------//
        $this->start_controls_section(
            'shape_img_sec',
            [
                'label' => esc_html__( 'Shape Images', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_04' ]
                ]
            ]
        );

        $this->add_control(
            'shape1', [
                'label' => __( 'Shape One', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'shape2', [
                'label' => __( 'Shape Two', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section(); // End shape images


        //------------------------------  Section Background  --------------------------------//
        $this->start_controls_section(
            'sec_bg_style',
            [
                'label' => esc_html__( 'Section Background', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => __( 'Padding', 'wavee-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_03', 'style_05', 'style_06' ]
                ],
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sec_pad' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .blog-section .decoration-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sec-ptb-110' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'item_border_color', [
                'label' => __( 'Item Top Border Hover', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .plugin-item:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'style' => 'style_05'
                ]
            ]
        );

        $this->add_control(
            'sec_bg_color', [
                'label' => __( 'Background Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .plugin-section' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'style' => 'style_05'
                ]
            ]
        );

        ///// Background Gradient Color
        $this->add_control(
            'bg_color', [
                'label' => esc_html__( 'Background Color One', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_04' ]
                ]
            ]
        );

        $this->add_control(
            'bg_color2', [
                'label' => esc_html__( 'Background Color Two', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .process_area' => 'background-image: -webkit-linear-gradient(-42deg,  {{bg_color.VALUE}} 0%, {{VALUE}} 100%)',
                    '{{WRAPPER}} .blog-section' => 'background-image: -webkit-radial-gradient(50% 50%, circle,  {{bg_color.VALUE}} 0%, {{VALUE}} 100%)',
                    '{{WRAPPER}} .responsive-section' => 'background-image: -webkit-radial-gradient(50% 50%, circle,  {{bg_color.VALUE}} 0%, {{VALUE}} 100%)',
                ],
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_04' ]
                ]
            ]
        );

        $this->add_control(
            'bg_img', [
                'label' => esc_html__( 'Background Image', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => 'style_02'
                ]
            ]
        );

        // Column Settings
        $this->add_control(
            'column', [
                'label' => __( 'Grid column', 'saasland-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '6' => __( 'Two column', 'wavee-core' ),
                    '4' => __( 'Three column', 'wavee-core' ),
                    '3' => __( 'Four column', 'wavee-core' ),
                ],
                'default' => '3',
                'condition' => [
                    'style' => [ 'style_01', 'style_03', 'style_05', 'style_06' ]
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
                'condition' => [
                    'style' => [ 'style_02', 'style_03', 'style_04', 'style_05', 'style_06' ]
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();

        if ( $settings['style'] == 'style_01' ) {
            include 'features/features-1.php';
        }

        if ( $settings['style'] == 'style_02' ) {
            include 'features/features-2.php';
        }

        if ( $settings['style'] == 'style_03' ) {
            include 'features/features-3.php';
        }

        if ( $settings['style'] == 'style_04' ) {
            wp_enqueue_script('parallax-min' );
            wp_enqueue_script('parallax-scroll' );
            include 'features/features-4.php';
        }

        if ( $settings['style'] == 'style_05' ) {
            include 'features/features-5.php';
        }

        if ( $settings['style'] == 'style_06' ) {
            include 'features/features-6.php';
        }
    }
}
