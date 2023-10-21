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
class Wavee_two_column_features extends Widget_Base {

    public function get_name() {
        return 'wavee_two_column_features';
    }

    public function get_title() {
        return __( 'Two Column features', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-columns';
    }

    public function get_style_depends() {
        return ['aos'];
    }

    public function get_script_depends() {
        return ['aos'];
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
                    'style' => [ 'style_01', 'style_03', 'style_04' ]
                ]
            ]
        );

        $this->add_control(
            'watermark_text',
            [
                'label' => esc_html__( 'Watermark Text', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Stunning Demos',
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Demo websites. Single click install.'
            ]
        );

        $this->end_controls_section(); // End Title


        // ----------------------------------------  Subtitle   --------------------------------------//
        $this->start_controls_section(
            'subtitle_sec', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_01', 'style_03', 'style_04' ]
                ]
            ]
        );

        $this->add_control(
            'subtitle', [
                'label' => esc_html__( 'Subtitle', 'wavee-core' ),
                'type' => Controls_Manager::TEXTAREA
            ]
        );

        $this->end_controls_section(); // End Subtitle


        //-------------------------- features Section ------------------------------//
        $this->start_controls_section(
            'features_sec', [
                'label' => __( 'features', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $features = new \Elementor\Repeater();

        $features->add_control(
            'title', [
                'label' => __( 'Title', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Home One'
            ]
        );

        $features->add_control(
            'contents', [
                'label' => __( 'Contents', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $features->add_control(
            'fimage', [
                'label' => __( 'Featured Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $features->add_control(
            'link', [
                'label' => __( 'Link', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => __( 'features Item', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $features->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section(); // End features


        //----------------------------- features 02 Section ------------------------------//
        $this->start_controls_section(
            'features2_sec', [
                'label' => __( 'features', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_02',
                ]
            ]
        );

        $features2 = new \Elementor\Repeater();

        $features2->add_control(
            'img_icon', [
                'label' => __( 'Icon', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $features2->add_control(
            'title', [
                'label' => __( 'Title', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Elementor Drag-n-Drop Visual Builder'
            ]
        );

        $features2->add_control(
            'contents', [
                'label' => __( 'Contents', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $features2->add_control(
            'fimage', [
                'label' => __( 'Featured Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $features2->add_control(
            'f_shape1', [
                'label' => __( 'Featured Shape 01', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $features2->add_control(
            'f_shape2', [
                'label' => __( 'Featured Shape 02', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'features2',
            [
                'label' => __( 'features Item', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $features2->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section(); // End features


        //----------------------------- features 03 Section ------------------------------//
        $this->start_controls_section(
            'features3_sec', [
                'label' => __( 'Featured Images', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_03',
                ]
            ]
        );

        $features3 = new \Elementor\Repeater();

        $features3->add_control(
            'align_items', [
                'label' => __( 'Item', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::HIDDEN,
            ]
        );

        $features3->add_control(
            'f_image', [
                'label' => __( 'Featured Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'features_image',
            [
                'label' => __( 'Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $features3->get_controls(),
                'title_field' => '{{{ align_items }}}',
            ]
        );

        $this->end_controls_section(); // End features


        //----------------------------- Left Column features 04 Section ------------------------------//
        $this->start_controls_section(
            'left_column_sec', [
                'label' => __( 'Left Column Features', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_04',
                ]
            ]
        );

        $left_column_features = new \Elementor\Repeater();

        $left_column_features->add_control(
            'align_items', [
                'label' => __( 'Item', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::HIDDEN,
            ]
        );

        $left_column_features->add_control(
            'f_image', [
                'label' => __( 'Featured Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'left_column_features',
            [
                'label' => __( 'Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $left_column_features->get_controls(),
                'title_field' => '{{{ align_items }}}',
            ]
        );

        $this->end_controls_section(); // End features


        //----------------------------- Right Column features 04 Section ------------------------------//
        $this->start_controls_section(
            'right_column_sec', [
                'label' => __( 'Right Column Features', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_04',
                ]
            ]
        );

        $right_column_features = new \Elementor\Repeater();

        $right_column_features->add_control(
            'align_items', [
                'label' => __( 'Item', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::HIDDEN,
            ]
        );

        $right_column_features->add_control(
            'f_image', [
                'label' => __( 'Featured Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'right_column_features',
            [
                'label' => __( 'Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $right_column_features->get_controls(),
                'title_field' => '{{{ align_items }}}',
            ]
        );

        $this->end_controls_section(); // End features


        // ----------------------------------------  Button   --------------------------------------//
        $this->start_controls_section(
            'button_sec', [
                'label' => __( 'Button', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_03'
                ]
            ]
        );

        $this->add_control(
            'btn_label', [
                'label' => esc_html__( 'Button Label', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Check Now'
            ]
        );

        $this->add_control(
            'btn_url', [
                'label' => esc_html__( 'Button URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ]
            ]
        );

        //---------------------------- Normal and Hover ---------------------------//
        $this->start_controls_tabs(
            'style_btn_tabs'
        );


        // Normal Color
        $this->start_controls_tab(
            'normal_btn_style',
            [
                'label' => __( 'Normal', 'saasland-core' ),
            ]
        );

        $this->add_control(
            'normal_text_color', [
                'label' => __( 'Text Color', 'saasland-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.btn-border' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'normal_bg_color', [
                'label' => __( 'Background Color', 'saasland-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.btn-border' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'normal_border_color', [
                'label' => __( 'Border Color', 'saasland-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.btn-border' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();


        // Hover Color
        $this->start_controls_tab(
            'hover_btn_style',
            [
                'label' => __( 'Hover', 'saasland-core' ),
            ]
        );

        $this->add_control(
            'hover_text_color', [
                'label' => __( 'Text Color', 'saasland-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.btn-border:hover' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'hover_bg_color', [
                'label' => __( 'Background Color', 'saasland-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.btn-border:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hover_border_color', [
                'label' => __( 'Border Color', 'saasland-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.btn-border:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section(); // End Button

        /**
         * Style Tab
         * @@@@
         * ------------------------------ Style Watermark Text ------------------------------
         */
        $this->start_controls_section(
            'style_watermark_sec', [
                'label' => __( 'Watermark Text', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->add_control(
            'color_watermark', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .big-title' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_watermark',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .big-title',
            ]
        );

        $this->end_controls_section();


        //------------------------------------------ Title --------------------------------------------//
        $this->start_controls_section(
            'style_title_sec', [
                'label' => __( 'Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_03', 'style_04' ]
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
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .section-title .title-text',
            ]
        );

        $this->end_controls_section();


        //------------------------------------------ Subtitle --------------------------------------------//
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_03', 'style_04' ]
                ]
            ]
        );

        $this->add_control(
            'color_subtitle', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}} !important;',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .section-title p',
            ]
        );

        $this->end_controls_section();


        //--------------------------------- Item Title Color ---------------------------------------//
        $this->start_controls_section(
            'style_item_title', [
                'label' => __( 'Item Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ],
                ]
            ]
        );

        $this->add_control(
            'color_item_title', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo-item .item-content .item-title' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .about-item .item-title' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_item_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .demo-item .item-content .item-title,
                    {{WRAPPER}} .about-item .item-title
                    ',
            ]
        );

        $this->end_controls_section();


        //--------------------------------- Item Content Color ---------------------------------------//
        $this->start_controls_section(
            'style_item_contents', [
                'label' => __( 'Item Contents', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_02'
                ]
            ]
        );

        $this->add_control(
            'color_item_contents', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item-content p' => 'color: {{VALUE}} !important;',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_item_contents',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .item-content p',
            ]
        );

        $this->end_controls_section();


        // ----------------------------------------- Floating images -----------------------------------//
        $this->start_controls_section(
            'floating_img_sec', [
                'label' => __( 'Floating Images', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $this->add_control(
            'floating_img1', [
                'label' => esc_html__( 'Image One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $this->add_control(
            'floating_img2', [
                'label' => esc_html__( 'Image Two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $this->add_control(
            'floating_img3', [
                'label' => esc_html__( 'Image Three', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $this->add_control(
            'floating_img4', [
                'label' => esc_html__( 'Image Four', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $this->add_control(
            'floating_img5', [
                'label' => esc_html__( 'Image Five', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_control(
            'floating_img6', [
                'label' => esc_html__( 'Image Six', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_control(
            'floating_img7', [
                'label' => esc_html__( 'Image Seven', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->end_controls_section(); // End Floating Images


        // ----------------------------------------- Floating images -----------------------------------//
        $this->start_controls_section(
            'shape_img_sec', [
                'label' => __( 'Shape Image', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_03'
                ]
            ]
        );

        $this->add_control(
            'shape', [
                'label' => esc_html__( 'Image One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section(); // End Shape Images


        //------------------------------  Section Background --------------------------------//
        $this->start_controls_section(
            'section_bg_style',
            [
                'label' => esc_html__( 'Section Background', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_03', 'style_04' ]
                ]
            ]
        );

        $this->add_control(
            'bg_color_01', [
                'label'     => esc_html__('Background Color 01', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_control(
            'bg_color_02', [
                'label'     => esc_html__('Background Color 02', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .demo-section' => 'background-image: -webkit-radial-gradient(50% 50%, circle closest-side, {{bg_color_01.VALUE}} 0%, {{VALUE}} 100%);',
                ],
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_responsive_control(
            'sec_margin',
            [
                'label' => __( 'Margin', 'plugin-domain' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .variation-section .header-variation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'style' => [ 'style_03', 'style_04' ]
                ]
            ]
        );

        $this->add_responsive_control(
            'sec_padding',
            [
                'label' => __( 'Padding', 'plugin-domain' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sec-ptb-110' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about-section .decoration-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    'style' => [ 'style_01', 'style_02', 'style_03', 'style_04' ]
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();
        $watermark_text = !empty( $settings['watermark_text'] ) ? $settings['watermark_text'] : '';
        $title = !empty( $settings['title'] ) ? $settings['title'] : '';
        $subtitle = !empty( $settings['subtitle'] ) ? $settings['subtitle'] : '';
        $btn_label = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
        $btn_url = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
        $features = is_array( $settings['features'] ) ? $settings['features'] : '';
        $features2 = is_array( $settings['features2'] ) ? $settings['features2'] : '';
        $features3 = is_array( $settings['features_image'] ) ? $settings['features_image'] : '';
        $left_column_features = is_array( $settings['left_column_features'] ) ? $settings['left_column_features'] : '';
        $right_column_features = is_array( $settings['right_column_features'] ) ? $settings['right_column_features'] : '';


        if ( $settings['style'] == 'style_01' ) {
            wp_enqueue_script('parallax-min' );
            wp_enqueue_script('parallax-scroll' );
            include 'two-col-features-1.php';
        }

        if ( $settings['style'] == 'style_02' ) {
            wp_enqueue_script('parallax-min' );
            wp_enqueue_script('parallax-scroll' );
            include 'two-col-features-2.php';
        }

        if ( $settings['style'] == 'style_03' ) {
            include 'two-col-features-3.php';
        }

        if ( $settings['style'] == 'style_04' ) {
            include 'two-col-features-4.php';
        }

    }
}
