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
class Wavee_full_screen_slider extends Widget_Base {

    public function get_name() {
        return 'wavee_full_screen_slider';
    }

    public function get_title() {
        return __( 'Full Screen Slider', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-slider-full-screen';
    }

    public function get_categories() {
        return [ 'wavee-elements' ];
    }

    protected function _register_controls() {


        // ----------------------------------------  Select Hero Style  --------------------------------------//
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
                    'style_01' => esc_html__('Creative Agency', 'wavee-core'),
                    'style_02' => esc_html__('Creative Carousel', 'wavee-core'),
                    'style_03' => esc_html__('Fullscreen Carousel', 'wavee-core'),
                    'style_04' => esc_html__('Horizontal Carousel', 'wavee-core'),
                ],
                'default' => 'style_01'
            ]
        );

        $this->end_controls_section(); // End Style


        // ------------------------------------  Slider 01 --------------------------------------//
        $this->start_controls_section(
            'slider_sec', [
                'label' => __( 'Sliders', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_01', 'style_03' ]
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title_01', [
                'label' => __( 'Title 01', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'title_02', [
                'label' => __( 'Title 02', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'image', [
                'label' => __( 'Featured Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'shape_img', [
                'label' => __( 'Shape', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'btn_label', [
                'label' => esc_html__( 'Button Label', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View Project'
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

        $this->add_control(
            'sliders',
            [
                'label' => __( 'Slider', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title_01 }}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section(); // End Images section


        // ------------------------------------  Slider 02 --------------------------------------//
        $this->start_controls_section(
            'slider2_sec', [
                'label' => __( 'Sliders', 'wavee-core' ),
                'condition' => [
                    'style' =>  'style_02'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title', [
                'label' => __( 'Title', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Camera Task'
            ]
        );

        $repeater->add_control(
            'image', [
                'label' => __( 'Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'link', [
                'label' => esc_html__( 'Link', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ]
            ]
        );

        $this->add_control(
            'sliders2',
            [
                'label' => __( 'Slider', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section(); // End Images section


        // ------------------------------------  Slider 04 --------------------------------------//
        $this->start_controls_section(
            'slider3_sec', [
                'label' => __( 'Sliders', 'wavee-core' ),
                'condition' => [
                    'style' =>  'style_04'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'select_img', [
                'label' => esc_html__( 'Featured Images', 'wavee-core' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'single_img' => esc_html__('Single Image', 'wavee-core'),
                    'double_img' => esc_html__('Double Images', 'wavee-core'),
                    'multiple_img' => esc_html__('Multiple Images', 'wavee-core'),
                ],
                'default' => 'single_img'
            ]
        );

        $repeater->add_control(
            'f_image1', [
                'label' => __( 'Image One', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'select_img' =>  [ 'single_img', 'double_img', 'multiple_img' ]
                ]
            ]
        );

        $repeater->add_control(
            'f_image2', [
                'label' => __( 'Image Two', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'select_img' =>  [ 'double_img', 'multiple_img' ]
                ]
            ]
        );

        $repeater->add_control(
            'f_image3', [
                'label' => __( 'Image Three', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'select_img' => 'multiple_img'
                ]
            ]
        );

        $repeater->add_control(
            'f_image4', [
                'label' => __( 'Image Four', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'select_img' => 'multiple_img'
                ]
            ]
        );

        $repeater->add_control(
            'title', [
                'label' => __( 'Title', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Social Profile Banner'
            ]
        );

        $repeater->add_control(
            'content', [
                'label' => __( 'Content', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $repeater->add_control(
            'btn_label', [
                'label' => __( 'Button Label', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Read More'
            ]
        );

        $repeater->add_control(
            'btn_url', [
                'label' => __( 'Button URL', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ]
            ]
        );

        $repeater->add_control(
            'item_bg_color_01', [
                'label'     => esc_html__('Background Color 01', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
            ]
        );

        $repeater->add_control(
            'item_bg_color_02', [
                'label'     => esc_html__('Background Color 02', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .bg_1' => 'background-image: -webkit-radial-gradient(50% 50%, circle closest-side, {{item_bg_color_01.VALUE}} 0%, {{VALUE}} 100%);',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .bg_2' => 'background-image: -webkit-radial-gradient(50% 50%, circle closest-side, {{item_bg_color_01.VALUE}} 0%, {{VALUE}} 100%);',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .bg_3' => 'background-image: -webkit-radial-gradient(50% 50%, circle closest-side, {{item_bg_color_01.VALUE}} 0%, {{VALUE}} 100%);',
                ],
            ]
        );

        $this->add_control(
            'sliders3',
            [
                'label' => __( 'Slider', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section(); // End Slider Three


        //------------------------------ Social Icons ------------------------------//
        $this->start_controls_section(
            'footer_content_sec', [
                'label' => __( 'Footer Content', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->add_control(
            'footer_content',
            [
                'label' => esc_html__( 'Footer Content', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Scroll to discover',
            ]
        );

        $this->end_controls_section();


        //------------------------------ Social Icons ------------------------------//
        $this->start_controls_section(
            'social_icons_sec', [
                'label' => __( 'Social Icons', 'wavee-core' ),
                'condition' => [
                    'style' => [ 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->add_control(
            'twitter',
            [
                'label' => esc_html__( 'Twitter URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $this->add_control(
            'facebook',
            [
                'label' => esc_html__( 'Facebook URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $this->add_control(
            'dribbble',
            [
                'label' => esc_html__( 'Dribbbble URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $this->add_control(
            'instagram',
            [
                'label' => esc_html__( 'Instagram URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'linkedin',
            [
                'label' => esc_html__( 'Linkedin URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'youtube',
            [
                'label' => esc_html__( 'Youtube URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'pinterest',
            [
                'label' => esc_html__( 'Pinterest URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->end_controls_section();


        // --------------------------------- Carousel Settings --------------------------------------------//
        $this->start_controls_section(
            'carousel_settings', [
                'label' => __( 'Carousel Settings', 'saasland-core' ),
                'condition' => [
                    'style' => [ 'style_02', 'style_03', 'style_04' ]
                ]
            ]
        );

        $this->add_control(
            'is_auto_play',
            [
                'label' => __( 'Autoplay', 'saasland-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'true' => esc_html__( 'True', 'saasland-core' ),
                    'false' => esc_html__( 'False', 'saasland-core' ),
                ],
                'default' => 'true'
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __( 'Autoplay Speed', 'saasland-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 1000,
                'condition' => [
                    'is_auto_play' => 'true'
                ]
            ]
        );

        $this->add_control(
            'is_loop',
            [
                'label' => __( 'Infinite Loop', 'saasland-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'true' => esc_html__( 'True', 'saasland-core' ),
                    'false' => esc_html__( 'False', 'saasland-core' ),
                ],
                'default' => 'true'
            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'style_title_01', [
                'label' => __( 'Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->add_control(
            'author_color_title', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullpage_slider_content .text_f' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .fullscreen_area .single_portfolio_slider h2 a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner_content_iner h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_author_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .fullpage_slider_content .text_f,
                    {{WRAPPER}} .fullscreen_area .single_portfolio_slider h2 a,
                    {{WRAPPER}} .banner_content_iner h2
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style


        //------------------------------ Style Title ------------------------------//
        $this->start_controls_section(
            'style_title_02', [
                'label' => __( 'Title 02', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_control(
            'designation_color_title', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullpage_slider_content .text_s' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_designation_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .fullpage_slider_content .text_s
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style


        // -------------------------------------  Button  -----------------------------------------//
        $this->start_controls_section(
            'btn_style_sec', [
                'label' => __( 'Button', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_03' ]
                ]
            ]
        );

        $this->start_controls_tabs(
            'style_btn_tabs'
        );

        // Normal Button Style
        $this->start_controls_tab(
            'style_normal_btn',
            [
                'label' => esc_html__( 'Normal', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'normal_font_color', [
                'label' => esc_html__( 'Font Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullpage_slider_btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .full_height_dark_slider .banner_content_iner a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'normal_bg_color', [
                'label'     => esc_html__('Background Color 01', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->add_control(
            'normal_bg_color2', [
                'label'     => esc_html__('Background Color 02', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '.fullpage_slider_content .fullpage_slider_btn:after' => 'background-image: -webkit-linear-gradient(0deg,  {{normal_bg_color.VALUE}} 0%, {{VALUE}} 100%)',
                ],
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->add_control(
            'normal_btn_border_color', [
                'label' => esc_html__( 'Border Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn_border_effect:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .btn_border_effect:before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .btn_border_effect:hover:before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .btn_border_effect:hover a:before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .btn_border_effect:hover a:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .btn_border_effect a:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .btn_border_effect a:before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'style' => 'style_03',
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover Button Style
        $this->start_controls_tab(
            'style_hover_btn',
            [
                'label' => esc_html__( 'Hover', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'hover_font_color', [
                'label' => esc_html__( 'Font Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullpage_slider_btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .fullpage_slider_content .fullpage_slider_btn:before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .btn_border_effect:hover a' => 'color: {{VALUE}} !important',
                ],

            ]
        );

        $this->add_control(
            'hover_bg_color', [
                'label'     => esc_html__('Background Color 01', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->add_control(
            'hover_bg_color2', [
                'label'     => esc_html__('Background Color 02', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '.fullpage_slider_content .fullpage_slider_btn:after:hover' => 'background-image: -webkit-linear-gradient(0deg,  {{normal_bg_color.VALUE}} 0%, {{VALUE}} 100%)',
                ],
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        // -------------------------------------  Floating Images  -----------------------------------------//
        $this->start_controls_section(
            'memphis_img_sec', [
                'label' => __( 'Memphis Images', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->add_control(
            'round_animation', [
                'label' => esc_html__( 'Round Animation Image', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'memphis_img1', [
                'label' => esc_html__( 'Image One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'memphis_img2', [
                'label' => esc_html__( 'Image Two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'memphis_img3', [
                'label' => esc_html__( 'Image Three', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'memphis_img4', [
                'label' => esc_html__( 'Image Four', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'memphis_img5', [
                'label' => esc_html__( 'Image Five', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'memphis_img6', [
                'label' => esc_html__( 'Image Six', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'memphis_img7', [
                'label' => esc_html__( 'Image Seven', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'memphis_img8', [
                'label' => esc_html__( 'Image Eight', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section(); // End Floating Images


        //------------------------------  Gradient Background --------------------------------//
        $this->start_controls_section(
            'bg_gradient_color_sec', [
                'label' => esc_html__( 'Section Background', 'rogan-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => [ 'style_01', 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->add_control(
            'round_border_color', [
                'label' => __( 'Round Border Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullpage_round.one' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->add_control(
            'bg_color_01', [
                'label'     => esc_html__('Background Color 01', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->add_control(
            'bg_color_02', [
                'label'     => esc_html__('Background Color 02', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullpage_slider_bg' => 'background-image: -webkit-radial-gradient(50% 50%, circle closest-side, {{bg_color_01.VALUE}} 0%, {{VALUE}} 100%)',
                    '{{WRAPPER}} .fullpage_round' => 'background-image: -webkit-radial-gradient(50% 50%, circle closest-side, {{bg_color_01.VALUE}} 0%, {{VALUE}} 100%)',
                    '{{WRAPPER}} .fullpage_slider_img:after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'style' => 'style_01',
                ]
            ]
        );

        $this->add_control(
            'sec_bg_color', [
                'label' => __( 'Background Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullscreen_area' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .full_height_dark_slider' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'style' => [ 'style_02', 'style_03' ]
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();

        if ( $settings['style'] == 'style_01' ) {
            include 'full-screen-slider/1-creative-agency.php';
        }

        if ( $settings['style'] == 'style_02' ) {
            wp_enqueue_style( 'splitting' );
            wp_enqueue_style( 'swiper' );
            wp_enqueue_script( 'splitting' );
            wp_deregister_script( 'swiper' );
            wp_enqueue_script( 'wavee-swiper' );
            include 'full-screen-slider/2-creative-carousel.php';
        }

        if ( $settings['style'] == 'style_03' ) {
            wp_enqueue_style( 'splitting' );
            wp_enqueue_style( 'swiper' );
            wp_enqueue_script( 'splitting' );
            wp_deregister_script( 'swiper' );
            wp_enqueue_script( 'wavee-swiper' );
            include 'full-screen-slider/3-fullscreen-carousel.php';
        }

        if ( $settings['style'] == 'style_04' ) {
            wp_enqueue_style( 'swiper' );
            wp_deregister_script( 'swiper' );
            wp_enqueue_script( 'wavee-swiper' );
            include 'full-screen-slider/4-horizontal-carousel.php';
        }

    }
}
