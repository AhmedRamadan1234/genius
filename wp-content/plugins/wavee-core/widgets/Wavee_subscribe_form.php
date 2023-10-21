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
class Wavee_subscribe_form extends Widget_Base {

    public function get_name() {
        return 'wavee_subscribe_form';
    }

    public function get_title() {
        return __( 'Subscribe Form', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-mailchimp';
    }

    public function get_categories() {
        return [ 'wavee-elements' ];
    }

    public function get_script_depends() {
        return [ 'ajax-chimp', 'fullpage', 'wavee-core-custom' ];
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
        

        // ------------------------------ MailChimp form ------------------------------
        $this->start_controls_section(
            'form_settings', [
                'label' => __( 'Form settings', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'email_placeholder', [
                'label' => esc_html__( 'Email Filed Placeholder', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Type your email...',
            ]
        );

        $this->add_control(
            'action_url', [
                'label' => esc_html__( 'Action URL', 'wavee-core' ),
                'description' => __( 'Enter here your MailChimp action URL. <a href="https://goo.gl/k5a2tA" target="_blank"> How to </a>', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $this->end_controls_section(); // End Mail-chimp Form


        // ------------------------------------------- Start Social links -----------------------------------------//
        $this->start_controls_section(
            'social_link_sec',
            [
                'label' => __( 'Social Links', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_control(
            'dribbble',
            [
                'label' => esc_html__( 'Dribbble URL', 'wavee-core' ),
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
            'googleplus',
            [
                'label' => esc_html__( 'Google plus URL', 'wavee-core' ),
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
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $this->add_control(
            'linkedin',
            [
                'label' => esc_html__( 'Linkedin URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $this->add_control(
            'youtube',
            [
                'label' => esc_html__( 'Youtube URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $this->add_control(
            'pinterest',
            [
                'label' => esc_html__( 'Pinterest URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );


        $this->end_controls_section(); // End Social links

        //------------------------------------------ Bottom Text ----------------------------------//
        $this->start_controls_section(
            'copyright_text_sec',
            [
                'label' => esc_html__( 'Bottom Text', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'copyright_text',
            [
                'label' => esc_html__( 'Copyright Text', 'wavee-core' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'Copyright © 2020 <a href="#">DroitThemes</a> | All rights reserved'
            ]
        );

        $this->end_controls_section();
        
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
                    '{{WRAPPER}} .footer_text h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .footer_text h3
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
                    'url' => plugins_url('images/shape/pijom_2.png', __FILE__)
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

        $this->add_responsive_control(
            'padding',
            [
                'label' => __( 'Padding', 'wavee-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .w_footer_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();

        if ( $settings['style'] == 'style_01' ) {
            ?>
            <div class="inro">
                <div class="container custom_container">
                    <div class="footer_text">
                        <?php
                        if ( !empty( $settings['title'] ) ) {
                            echo '<h3>' . esc_html( $settings['title'] ) . '</h3>';
                        }
                        ?>
                        <form action="#" class="mailchimp subscribe_info" method="post">
                            <input type="text" name="EMAIL" class="form-control memail"
                                   placeholder="<?php echo esc_attr($settings['email_placeholder']) ?>">
                            <button class="btn" type="submit">
                                <?php
                                if ( is_rtl() ) {
                                    echo '<i class="arrow_left"></i>';
                                } else {
                                    echo '<i class="arrow_right"></i>';
                                }
                                ?>
                            </button>
                            <p class="mchimp-errmessage" style="display: none;"></p>
                            <p class="mchimp-sucmessage" style="display: none;"></p>
                        </form>
                        <ul class="list-unstyled social_link">
                            <?php
                            if ( !empty($settings['dribbble']['url'] ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url($settings['dribbble']['url']) ?>" <?php wavee_is_external($settings['dribbble']);
                                    wavee_is_nofollow($settings['dribbble']) ?>>
                                        <i class="social_dribbble"></i><i class="social_dribbble"></i>
                                    </a>
                                </li>
                                <?php
                            }
                            if ( !empty($settings['facebook']['url'] ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url($settings['facebook']['url']) ?>" <?php wavee_is_external($settings['facebook']);
                                    wavee_is_nofollow($settings['facebook']) ?>>
                                        <i class="social_facebook"></i><i class="social_facebook"></i>
                                    </a>
                                </li>
                                <?php
                            }
                            if ( !empty($settings['twitter']['url'] ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url($settings['twitter']['url']) ?>" <?php wavee_is_external($settings['twitter']);
                                    wavee_is_nofollow($settings['twitter']) ?>>
                                        <i class="social_twitter"></i><i class="social_twitter"></i>
                                    </a>
                                </li>
                                <?php
                            }
                            if ( !empty( $settings['googleplus']['url'] ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url($settings['googleplus']['url']) ?>" <?php wavee_is_external($settings['googleplus']);
                                    wavee_is_nofollow($settings['googleplus']) ?>>
                                        <i class="social_googleplus"></i><i class="social_googleplus"></i>
                                    </a>
                                </li>
                                <?php
                            }
                            if ( !empty( $settings['instagram']['url'] ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url($settings['instagram']['url']) ?>" <?php wavee_is_external($settings['instagram']);
                                    wavee_is_nofollow($settings['instagram']) ?>>
                                        <i class="social_instagram"></i><i class="social_instagram"></i>
                                    </a>
                                </li>
                                <?php
                            }
                            if ( !empty( $settings['linkedin']['url'] ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url($settings['linkedin']['url']) ?>" <?php wavee_is_external($settings['linkedin']);
                                    wavee_is_nofollow($settings['linkedin']) ?>>
                                        <i class="social_linkedin"></i><i class="social_linkedin"></i>
                                    </a>
                                </li>
                                <?php
                            }
                            if ( !empty( $settings['youtube']['url'] ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url($settings['youtube']['url']) ?>" <?php wavee_is_external($settings['youtube']);
                                    wavee_is_nofollow($settings['youtube']) ?>>
                                        <i class="social_youtube"></i><i class="social_youtube"></i>
                                    </a>
                                </li>
                                <?php
                            }
                            if ( !empty( $settings['pinterest']['url'] ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url($settings['pinterest']['url']) ?>" <?php wavee_is_external($settings['pinterest']);
                                    wavee_is_nofollow($settings['pinterest']) ?>>
                                        <i class="social_pinterest"></i><i class="social_pinterest"></i>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                        if ( !empty( $settings['copyright_text'] ) ) {
                            echo wp_kses_post( $settings['copyright_text'] );
                        }
                        ?>
                    </div>

                </div>
            </div>
            <?php

        } elseif ( $settings['style'] == 'style_02' ) {

            // Style 02
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
            }
            ?>
            <div class="intro">
                <div class="container custom_container">
                    <div class="footer_text">
                        <?php
                        if (!empty($settings['title'])) {
                            echo '<h3>' . esc_html($settings['title']) . '</h3>';
                        }
                        ?>

                        <form action="#" class="mailchimp subscribe_info" method="post">
                            <input type="text" name="EMAIL" class="form-control memail"
                                   placeholder="<?php echo esc_attr($settings['email_placeholder']) ?>">
                            <button class="btn" type="submit">
                                <?php
                                if ( is_rtl() ) {
                                    echo '<i class="arrow_left"></i>';
                                } else {
                                    echo '<i class="arrow_right"></i>';
                                }
                                ?>
                            </button>
                            <p class="mchimp-errmessage" style="display: none;"></p>
                            <p class="mchimp-sucmessage" style="display: none;"></p>
                        </form>

                        <?php
                        if ( !empty( $settings['copyright_text'])) {
                            echo wp_kses_post( $settings['copyright_text'] );
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <script>
            ;(function($){
                "use strict";
                $(document).ready(function () {
                    // MAILCHIMP
                    if ($(".mailchimp").length > 0) {
                        $(".mailchimp").ajaxChimp({
                            callback: mailchimpCallback,
                            url: "<?php echo esc_js($settings['action_url']) ?>"
                        });
                    }
                    $(".memail").on("focus", function () {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("keydown", function () {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("click", function () {
                        $(".memail").val("");
                    });

                    function mailchimpCallback(resp) {
                        if (resp.result === "success") {
                            $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                            $(".mchimp-sucmessage").fadeOut(500);
                        } else if (resp.result === "error") {
                            $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                        }
                    }
                });
            })(jQuery);
        </script>
        <?php
    }
}
