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
class Wavee_hero extends Widget_Base {

    public function get_name() {
        return 'wavee_hero';
    }

    public function get_title() {
        return __( 'Hero Section', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-device-desktop';
    }

    public function get_categories() {
        return [ 'wavee-elements' ];
    }


    protected function _register_controls() {

        // ----------------------------------------  Select Hero Style  --------------------------------------//
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
                    'style_01' => esc_html__('Style One', 'wavee-core'),
                    'style_02' => esc_html__('Style Two', 'wavee-core'),
                    'style_03' => esc_html__('Style Three (Demo)', 'wavee-core'),
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
                    'style' => [ 'style_01', 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title Text', 'wavee-core' ),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section(); // End Title


        // -------------------------------------  Featured Image  ------------------------------------//
        $this->start_controls_section(
            'f_image_sec', [
                'label' => __( 'Featured Image', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_control(
            'f_image', [
                'label' => esc_html__( 'Upload the featured image', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section(); // End Featured Image


        //-------------------------- Featured Images ------------------------------//
        $this->start_controls_section(
            'f_images_sec',
            [
                'label' => __( 'Featured Images', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_02', 'style_03' ]
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
            'f_images', [
                'label' => __( 'Images', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_responsive_control(
            'horizontal',
            [
                'label' => __( 'Horizontal Position', 'saasland-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}}; right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_responsive_control(
            'vertical', [
                'label' => __( 'Vertical Position', 'saasland-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}}; bottom: {{SIZE}}{{UNIT}};',
                ],
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

        $this->end_controls_section(); // End Featured Images


        //-------------------------- Counter Up ------------------------------//
        $this->start_controls_section(
            'counters_sec',
            [
                'label' => __( 'Counters', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_03'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'count_value', [
                'label' => __( 'Count Value', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '4'
            ]
        );

        $repeater->add_control(
            'count_attribute', [
                'label' => __( 'Count Attribute', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+'
            ]
        );

        $repeater->add_control(
            'count_label', [
                'label' => __( 'Count Label', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'home pages'
            ]
        );

        $this->add_control(
            'counters',
            [
                'label' => __( 'Counter Item', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ count_label }}}',
            ]
        );

        $this->end_controls_section(); // End Counter Up


        // ----------------------------------------- Circle Image  ----------------------------------------//
        $this->start_controls_section(
            'circle_image_sec', [
                'label' => __( 'Circle Images', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_01', 'style_02' ]
                ]
            ]
        );

        $this->add_control(
            'circle_image1', [
                'label' => esc_html__( 'Image One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'circle_image2', [
                'label' => esc_html__( 'Image Two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->end_controls_section(); // End Circle Image


        // ----------------------------------------- Scroll Down Link ----------------------------------------//
        $this->start_controls_section(
            'scroll_down_link_sec', [
                'label' => __( 'Scroll Down', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_03'
                ]
            ]
        );
        $this->add_control(
            'scroll_down_link', [
                'label'     => esc_html__('To Link', 'wavee-core'),
                'type'      => Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section(); // End Circle Image


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
                    'style' => [ 'style_01', 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->add_control(
            'color_title', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .w_content h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-section .title-text' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_prefix',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .w_content h2,
                    {{WRAPPER}} .banner-section .title-text
                ',
            ]
        );

        $this->end_controls_section();


        //--------------------------------- Counter Value Color ---------------------------------------//
        $this->start_controls_section(
            'style_counter_value', [
                'label' => __( 'Counter Value', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' =>  'style_03'
                ]
            ]
        );

        $this->add_control(
            'color_counter_value', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section .counterup-wrap h3' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_counter_value',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-section .counterup-wrap h3',
            ]
        );

        $this->end_controls_section();


        //--------------------------------- Counter Label Color ---------------------------------------//
        $this->start_controls_section(
            'style_counter_label', [
                'label' => __( 'Counter Label', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' =>  'style_03'
                ]
            ]
        );

        $this->add_control(
            'color_counter_label', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-section .counterup-wrap p' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_counter_label',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-section .counterup-wrap p',
            ]
        );

        $this->end_controls_section();


        // ----------------------------------------- Floating images -----------------------------------//
        $this->start_controls_section(
            'floating_img_sec', [
                'label' => __( 'Floating Images', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->add_control(
            'floating_img1', [
                'label' => esc_html__( 'Image One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/ctriangle_shap_one.png', __FILE__)
                ],
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->add_control(
            'floating_img2', [
                'label' => esc_html__( 'Image Two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/triangle_shap_two.png', __FILE__)
                ],
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->add_control(
            'floating_img3', [
                'label' => esc_html__( 'Image Three', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/tr_three.png', __FILE__)
                ],
                'condition' => [
                    'style' => [ 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->add_control(
            'floating_img4', [
                'label' => esc_html__( 'Image Four', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => 'style_03'
                ]
            ]
        );

        $this->add_control(
            'floating_img5', [
                'label' => esc_html__( 'Image Five', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => 'style_03'
                ]
            ]
        );

        $this->add_control(
            'floating_img6', [
                'label' => esc_html__( 'Image Six', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => 'style_03'
                ]
            ]
        );

        $this->end_controls_section(); // End Floating Images


        //------------------------------  Section Background --------------------------------//
        $this->start_controls_section(
            'section_bg_style',
            [
                'label' => esc_html__( 'Section Background', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' =>  'style_03'
                ]
            ]
        );

        $this->add_control(
            'bg_color_01', [
                'label'     => esc_html__('Background Color 01', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,

            ]
        );

        $this->add_control(
            'bg_color_02', [
                'label'     => esc_html__('Background Color 02', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '.banner-section' => 'background-image: -webkit-radial-gradient(50% 50%, circle, {{bg_color_01.VALUE}} 0%, {{VALUE}} 100%);',
                ],
            ]
        );

        $this->add_control(
            'sec_bg_img', [
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
            include 'heros/part-one.php';
        }

        if ( $settings['style'] == 'style_02' ) {
            include 'heros/part-two.php';
        }

        if ( $settings['style'] == 'style_03' ) {
            wp_enqueue_style( 'wavee-demo' );
            wp_enqueue_script( 'parallax-min' );
            wp_enqueue_script( 'parallax-scroll' );
            wp_enqueue_script( 'scrollspy' );
            wp_enqueue_script( 'waypoints' );
            wp_enqueue_script( 'counterup' );
            wp_enqueue_script( 'aos' );
            include 'heros/hero-demo.php';
        }
    }
}
