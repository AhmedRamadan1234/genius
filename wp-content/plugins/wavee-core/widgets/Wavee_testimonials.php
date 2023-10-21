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
class Wavee_testimonials extends Widget_Base {

    public function get_name() {
        return 'wavee_testimonials';
    }

    public function get_title() {
        return __( 'Testimonial with Clients Logo', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
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

        $this->add_control(
            'quote_img',
            [
                'label' => esc_html__( 'Quote Image', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
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
                'type' => Controls_Manager::WYSIWYG,
            ]
        );

        $this->end_controls_section(); // End Subtitle


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


        //--------------------------------------- Testimonials -------------------------------------//
        $this->start_controls_section(
            'testimonials_sec',
            [
                'label' => __( 'Testimonials', 'wavee-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'author_name', [
                'label' => __( 'Author Name', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Zuttow Rold'
            ]
        );

        $repeater->add_control(
            'contents', [
                'label' => __( 'Contents', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $repeater->add_control(
            'author_img', [
                'label' => __( 'Author Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'quote_img', [
                'label' => __( 'Quote Image', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => __( 'Testimonial', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ author_name }}}',
            ]
        );

        $this->end_controls_section(); // End Testimonials


        // ------------------------------------------- Button -------------------------------------- //
        $this->start_controls_section(
            'btn_sec', [
                'label' => __( 'Button', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'btn_label', [
                'label' => esc_html__( 'Button Label', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Contact Us'
            ]
        );

        $this->add_control(
            'btn_url', [
                'label' => esc_html__( 'Button URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $this->start_controls_tabs(
            'btn_style_tabs'
        );

        //----------------- Normal-----------------------//
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => __( 'Normal', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'btn_text_color', [
                'label' => esc_html__( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p_btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color', [
                'label' => esc_html__( 'Background Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p_btn' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_border_color', [
                'label' => esc_html__( 'Border Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p_btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // ------------------ Hover ------------------------//
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => __( 'Hover', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'btn_text_color_hover', [
                'label' => esc_html__( 'Text Color Hover', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color_hover', [
                'label' => esc_html__( 'Text Color Hover', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p_btn:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_border_color_hover', [
                'label' => esc_html__( 'Text Color Hover', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p_btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section(); // End Button



        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------//
         */
        $this->start_controls_section(
            'style_title_sec', [
                'label' => __( 'Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .s_section_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .s_section_title
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style


        //------------------------------ Style Subtitle ------------------------------//
        $this->start_controls_section(
            'style_sub_title_sec', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clients_inner p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'subtitle_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .clients_inner p
                ',
            ]
        );

        $this->end_controls_section(); // End Subtitle Style


        //------------------------------ Style Item Title ------------------------------//
        $this->start_controls_section(
            'style_item_title_sec', [
                'label' => __( 'Item Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_title_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item .media-body h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'item_title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .item .media-body h5
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style


        // ------------------------------ Style Item Subtitle ------------------------------//
        $this->start_controls_section(
            'style_item_subtitle_sec', [
                'label' => __( 'Item Subtitle', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_subtitle_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item .media-body p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'item_subtitle_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .item .media-body p',
            ]
        );

        $this->end_controls_section(); // End Title Style


        //------------------------------  Section Background  --------------------------------//
        $this->start_controls_section(
            'sec_bg_style',
            [
                'label' => esc_html__( 'Section Background', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        ///// Background Gradient Color
        $this->add_control(
            'bg_color', [
                'label' => esc_html__( 'Background Color One', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'bg_color2', [
                'label' => esc_html__( 'Background Color Two', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_area' => 'background-image: -webkit-linear-gradient(-42deg,  {{bg_color.VALUE}} 0%, {{VALUE}} 100%)',
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
                    '{{WRAPPER}} .testimonial_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();

        ?>
        <section class="testimonial_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="clients_inner">
                            <?php
                            if( !empty( $settings['quote_img']['id'] ) ) {
                                echo wp_get_attachment_image( $settings['quote_img']['id'], 'full', false, array( 'class' => 'quote_img' ) );
                            }
                            if ( !empty( $settings['title'] ) ) {
                                echo '<h2 class="s_section_title">' . esc_html( $settings['title'] ) . '</h2>';
                            }
                            if ( !empty( $settings['subtitle'] ) ) {
                                echo wp_kses_post( wpautop( $settings['subtitle'] ) );
                            }
                            ?>
                            <div class="ab_clients_logo">
                                <?php
                                if ( !empty( $settings['logos'] ) ) {
                                    foreach ( $settings['logos'] as $logo ) {
                                        ?>
                                        <div class="ab_clients_logo_item elementor-repeater-item-<?php echo $logo['_id'] ?>">
                                            <a href="<?php echo esc_url( $logo['logo_url']['url'] ) ?>"
                                                <?php wavee_is_external( $logo['logo_url'] ); wavee_is_nofollow( $logo['logo_url'] ) ?>>
                                                <img src="<?php echo esc_url( $logo['client_logo']['url'] ) ?>" alt="<?php echo esc_attr( $logo['alt'] ) ?>">
                                            </a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <?php
                            if ( !empty( $settings['btn_label'] ) ) { ?>
                                <a href="<?php echo esc_url($settings['btn_url']['url']) ?>" class="p_btn p_btn_w"
                                    <?php wavee_is_external($settings['btn_url']); wavee_is_nofollow($settings['btn_url']) ?>>
                                    <?php echo esc_html($settings['btn_label']) ?>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial_slider">
                            <?php
                                if ( !empty( $settings['testimonials'] ) ) {
                                    foreach ( $settings['testimonials'] as $testimonial ) {
                                        ?>
                                        <div class="item elementor-repeater-item-<?php echo $testimonial['_id'] ?>">
                                            <div class="media">
                                                <div class="img">
                                                    <?php
                                                    if( !empty( $testimonial['author_img']['id'] ) ) {
                                                        echo wp_get_attachment_image( $testimonial['author_img']['id'], 'full' );
                                                    }
                                                    ?>
                                                </div>
                                                <div class="media-body">
                                                    <?php
                                                    if( !empty( $testimonial['quote_img']['id'] ) ) {
                                                        echo wp_get_attachment_image( $testimonial['quote_img']['id'], 'full', false, array( 'class' => 'quote_img p_absoulte' ) );
                                                    }
                                                    if ( !empty( $testimonial['author_name'] ) ) {
                                                        echo '<h5>' . esc_html( $testimonial['author_name'] ) . '</h5>';
                                                    }
                                                    if ( !empty( $testimonial['contents'] ) ) {
                                                        echo wp_kses_post( wpautop( $testimonial['contents'] ) );
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            ;(function($) {
                "use strict";

                $(document).ready( function () {
                    if ($('.testimonial_slider').length) {
                        $('.testimonial_slider').slick({
                            autoplay: true,
                            centerPadding: '0px',
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            autoplaySpeed: 1000,
                            speed: 1000,
                            dots: false,
                            centerMode: true,
                            vertical: true,
                            arrows: false,
                            responsive: [
                                {
                                    breakpoint: 767,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 1,
                                    }
                                }
                            ]
                        });
                    }
                })

            })(jQuery);
        </script>
        <?php
    }
}
