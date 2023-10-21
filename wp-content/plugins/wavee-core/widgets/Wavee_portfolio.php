<?php
namespace WaveeCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use WP_Query;



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
class Wavee_portfolio extends Widget_Base {

    public function get_name() {
        return 'wavee_portfolio';
    }

    public function get_title() {
        return __( 'Filterable Portfolio', 'wavee-hero' );
    }

    public function get_icon() {
        return ' eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'wavee-elements' ];
    }

    public function get_script_depends() {
        return [ 'imagesloaded', 'isotope' ];
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
                    'style_01' => esc_html__('Vertical Tabs', 'wavee-core'),
                    'style_02' => esc_html__('Horizontal Tabs', 'wavee-core'),
                ],
                'default' => 'style_01'
            ]
        );

        $this->end_controls_section(); // End Style


        // -------------------------------------------- Title -------------------------------------------//
        $this->start_controls_section(
            'title_sec', [
                'label' => __( 'Title', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_control(
            'title', [
                'label' => esc_html__( 'Title Text', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Our Projects'
            ]
        );

        $this->end_controls_section(); // End Title


        // -------------------------------------------- Filtering ----------------------------------------- //
        $this->start_controls_section(
            'portfolio_filter', [
                'label' => __( 'Filter', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'all_label', [
                'label' => esc_html__( 'All filter label', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'All Projects'
            ]
        );

        $this->add_control(
            'show_count', [
                'label' => esc_html__( 'Posts Per Page', 'wavee-core' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => 9
            ]
        );

        $this->add_control(
            'order', [
                'label' => esc_html__( 'Order', 'wavee-core' ),
                'description' => esc_html__( '‘ASC‘ – ascending order from lowest to highest values (1, 2, 3; a, b, c). ‘DESC‘ – descending order from highest to lowest values (3, 2, 1; c, b, a).', 'wavee-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => 'ASC',
                    'DESC' => 'DESC'
                ],
                'default' => 'ASC'
            ]
        );

        $this->add_control(
            'orderby', [
                'label' => esc_html__( 'Order By', 'makro-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => 'None',
                    'ID' => 'ID',
                    'author' => 'Author',
                    'title' => 'Title',
                    'name' => 'Name (by post slug)',
                    'date' => 'Date',
                    'rand' => 'Random',
                    'comment_count' => 'Comment Count',
                ],
                'default' => 'none'
            ]
        );

        $this->add_control(
            'exclude', [
                'label' => esc_html__( 'Exclude Portfolio', 'makro-core' ),
                'description' => esc_html__( 'Enter the portfolio post ID to hide. Input the multiple ID with comma separated', 'makro-core' ),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();


        // -------------------------------------------- Style Tabs ------------------------------------------------- //
        $this->start_controls_section(
            'portfolio_layout', [
                'label' => __( 'Layout', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_02'
                ]
            ]
        );

        $this->add_control(
            'horizontal_style', [
                'label' => esc_html__( 'Style', 'wavee-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'normal' => esc_html__('Normal Contents', 'wavee-core'),
                    'hover_masonry' => esc_html__('Masonry', 'wavee-core'),
                    'hover' => esc_html__('Hover Contents 01', 'wavee-core'),
                    'hover2' => esc_html__('Hover Contents 02', 'wavee-core'),
                ],
                'default' => 'normal'
            ]
        );

        $this->add_control(
            'is_full_width', [
                'label' => __( 'Full Width', 'wavee-core' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __( 'Yes', 'wavee-core' ),
                'label_off' => __( 'No', 'wavee-core' ),
                'return_value' => 'yes',
            ]
        );

        $this->end_controls_section(); // end layout


        // -------------------------------------------- Tabs Color Settings ------------------------------------------------- //
        $this->start_controls_section(
            'tab_color_sec', [
                'label' => __( 'Tabs Color', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'hover_img_color', [
                'label'     => esc_html__('Item Hover Color 01', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'horizontal_style' => [ 'hover_masonry', 'hover', 'hover2' ]
                ]
            ]
        );

        $this->add_control(
            'hover_img_color2', [
                'label'     => esc_html__('Item Hover Color 02', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '.gallery_post_two .img:before' => 'background-image: -webkit-linear-gradient(140deg,  {{hover_img_color.VALUE}} 0%, {{VALUE}} 100%)',
                ],
                'condition' => [
                    'horizontal_style' => [ 'hover_masonry', 'hover', 'hover2' ]
                ]
            ]
        );

        $this->start_controls_tabs(
            'portfolio_tabs_style'
        );

        // Normal Button Style
        $this->start_controls_tab(
            'style_normal_tabs',
            [
                'label' => esc_html__( 'Normal', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'normal_font_color', [
                'label' => esc_html__( 'Font Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_filter li' => 'color: {{VALUE}}',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_tabs',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .gallery_filter li',
            ]
        );

        $this->end_controls_tab();

        // Hover Button Style
        $this->start_controls_tab(
            'style_hover_tabs',
            [
                'label' => esc_html__( 'Hover', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'hover_font_color', [
                'label' => esc_html__( 'Font Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .gallery_filter li:hover' => 'color: {{VALUE}}',
                )
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        // -------------------------------------------- Section Background ------------------------------------------------- //
        $this->start_controls_section(
            'section_background', [
                'label' => __( 'Background', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'column', [
                'label' => __( 'Grid column', 'wavee-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '6' => __( 'Two column', 'wavee-core' ),
                    '4' => __( 'Three column', 'wavee-core' ),
                    '3' => __( 'Four column', 'wavee-core' ),
                ],
                'default' => '4'
            ]
        );

        $this->add_responsive_control(
            'sec_padding', [
                'label' => __( 'Section padding', 'wavee-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sec_pad' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .portfolio_fluid_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',

                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings();

        $portfolios = new WP_Query (array(
            'post_type' => 'portfolio',
            'posts_per_page' => !empty( $settings['show_count']) ? $settings['show_count'] : -1,
            'order' => $settings['order'],
            'orderby' => $settings['orderby'],
            'post__not_in' => !empty($settings['exclude']) ? explode( ',', $settings['exclude']) : ''
        ));

        $portfolio_cats = get_terms( array(
            'taxonomy' => 'portfolio_cat',
            'hide_empty' => true
        ));

        if ( $settings['style'] == 'style_01' ) {
            include 'portfolio/portfolio-vertical.php';
        }
        if ( $settings['style'] == 'style_02' ) {
            include 'portfolio/portfolio-horizontal.php';
        }
        ?>
        <script>
            ;(function($){
                "use strict";
                    $(document).ready(function () {
                        if ($('.portfolio_info_slider,.pr_details_slider_two').length) {
                            $('.portfolio_info_slider,.pr_details_slider_two').slick({
                                autoplay: true,
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                autoplaySpeed: 2000,
                                speed: 1000,
                                dots: false,
                                arrows: true,
                                prevArrow: ('.prev'),
                                nextArrow: ('.next'),
                            });
                        }
                });
            })(jQuery)
        </script>
        <?php
    }

}