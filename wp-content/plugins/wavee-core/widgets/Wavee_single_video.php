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
class Wavee_single_video extends Widget_Base {

    public function get_name() {
        return 'wavee_single_video';
    }

    public function get_title() {
        return __( 'Single Video', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-play';
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
                    'style_02' => esc_html__('Style Two ( With Background Title )', 'wavee-core'),
                ],
                'default' => 'style_01'
            ]
        );

        $this->end_controls_section(); // End Style

        // ------------------------------------------- Section Title  -----------------------------------------//
        $this->start_controls_section(
            'title_sec',
            [
                'label' => __( 'Title', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'bg_title',
            [
                'label' => esc_html__( 'Background Title', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'style' => 'style_02'
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

        // ------------------------------------------- Section Subtitle  -----------------------------------------//
        $this->start_controls_section(
            'subtitle_sec',
            [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Subtitle Text', 'wavee-core' ),
                'type' => Controls_Manager::TEXTAREA
            ]
        );

        $this->end_controls_section(); // End Subtitle


        //------------------------------------------ Video Poster Images ----------------------------------//
        $this->start_controls_section(
            'video_poster_img_sec',
            [
                'label' => esc_html__( 'Poster Images', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'poster_img',
            [
                'label' => esc_html__( 'Poster Image', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'poster_left_img',
            [
                'label' => esc_html__( 'Poster Left Shape', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'poster_right_img',
            [
                'label' => esc_html__( 'Poster Right Shape', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section(); // End Poster Images


        //------------------------------------------ Video URL  ----------------------------------//
        $this->start_controls_section(
            'video_url_sec',
            [
                'label' => esc_html__( 'Video URL', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => esc_html__( 'Video URL', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
             ]
        );

        $this->add_control(
            'video_icon_img',
            [
                'label' => esc_html__( 'Video Icon Image', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url( 'images/about/video_icon2.png', __FILE__)
                ]
            ]
        );

        $this->end_controls_section(); // End Video URL


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
                    '{{WRAPPER}} .sec_title .s_section_title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .s_section_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .sec_title .s_section_title,
                    {{WRAPPER}} .s_section_title
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style


        /// ------------------------------ Style Subtitle ------------------------------ ///
        $this->start_controls_section(
            'style_subtitle_sec', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_control(
            'color_subtitle', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .sec_title p
                ',
            ]
        );

        $this->end_controls_section(); // End Subtitle Style


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
                    'url' => plugins_url('images/shape/wave.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img2', [
                'label' => esc_html__( 'Image Two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/blue_plan.png', __FILE__)
                ]
            ]
        );

        $this->end_controls_section(); //End Floating Images


        //------------------------------  Section Background --------------------------------//
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

        $this->add_control(
            'bg_color_sec', [
                'label' => __( 'Background Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec_pad' => 'background: {{VALUE}};',
                ],
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
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();

        if ( $settings['style'] == 'style_01' ) {
            ?>
            <section class="video_area sec_pad">
                <div class="container custom_container">
                    <div class="sec_title text-center">
                        <?php
                            if ( !empty( $settings['title'] ) ) {
                                echo '<h2 class="s_section_title">' . esc_html( $settings['title'] ) . '</h2>';
                            }

                            if ( !empty( $settings['subtitle'] ) ) {
                                echo '<p>' . esc_html( $settings['subtitle'] ) . '</p>';
                            } ?>
                    </div>
                    <div class="sc_video_inner">
                        <?php

                        if( !empty( $settings['poster_img']['id'] ) ) {
                            echo wp_get_attachment_image( $settings['poster_img']['id'], 'full', false, array( 'class' => 'p_absoulte video_bg' ) );
                        }

                        if( !empty( $settings['poster_left_img']['id'] ) ) {
                            echo wp_get_attachment_image( $settings['poster_left_img']['id'], 'full', false, array( 'class' => 'dot_l p_absoulte' ) );
                        }

                        if( !empty( $settings['poster_right_img']['id'] ) ) {
                            echo wp_get_attachment_image( $settings['poster_right_img']['id'], 'full', false, array( 'class' => 'dot_r p_absoulte' ) );
                        }

                        if ( !empty( $settings['video_url'] ) ) { ?>
                            <a href="<?php echo esc_url( $settings['video_url'] ) ?>" class="v_icon popup_youtube">
                                <span class="dot_animation"></span>
                                <?php echo wp_get_attachment_image( $settings['video_icon_img']['id'], 'full') ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </section>
            <?php

        } elseif ( $settings['style'] == 'style_02' ) {

            if ( !empty( $settings['bg_title'] ) ) {
                echo '<div class="bg-title"><div class="layer layer2" data-depth="-0.20">' . esc_html($settings['bg_title']) . '</div></div>';
            }

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
                            echo '<h2 class="s_section_title text-center">' . esc_html($settings['title']) . '</h2>';
                        } ?>
                    <div class="sc_video_inner">

                        <?php
                            if( !empty( $settings['poster_img']['id'] ) ) {
                                echo wp_get_attachment_image( $settings['poster_img']['id'], 'full', false, array( 'class' => 'p_absoulte video_bg' ) );
                            }

                            if ( !empty( $settings['poster_left_img']['url'] ) ) { ?>
                                <div class="dot_l p_absoulte">
                                    <img class="layer layer2" data-depth="0.20"
                                         src="<?php echo esc_url( $settings['poster_left_img']['url'] ) ?>"
                                         alt="<?php echo esc_attr( $settings['title'] ) ?>">
                                </div>
                                <?php
                            }

                            if( !empty( $settings['poster_right_img']['id'] ) ) {
                                echo wp_get_attachment_image( $settings['poster_right_img']['id'], 'full', false, array( 'class' => 'dot_r p_absoulte' ) );
                            }

                            if ( !empty( $settings['video_url'] ) ) { ?>
                                <a href="<?php echo esc_url( $settings['video_url'] ) ?>" class="v_icon popup_youtube">
                                    <span class="dot_animation"></span>
                                    <?php echo wp_get_attachment_image( $settings['video_icon_img']['id'], 'full') ?>
                                </a>
                                <?php
                            } ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
