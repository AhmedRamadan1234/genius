<?php
namespace WaveeCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
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
class Wavee_Portfolio_masonry extends Widget_Base {

    public function get_name() {
        return 'wavee_Portfolio_masonry';
    }

    public function get_title() {
        return __( 'Portfolio Masonry', 'wavee-core' );
    }

    public function get_icon() {
        return ' eicon-gallery-masonry';
    }

    public function get_categories() {
        return [ 'wavee-elements' ];
    }


    public function get_script_depends() {
        return [ 'imagesloaded', 'isotope' ];
    }

    protected function _register_controls() {


        /**
         * ====== Repeater ======
         * Slides
         */
        $this->start_controls_section(
            'portfolio_filters', [
                'label' => __( 'Filters', 'wavee-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'post_title', [
                'label' => __( 'Choose Portfolio', 'wavee-core' ),
                'description' => __( 'Choose portfolio item to display.', 'shopi-core' ),
                'separator' => 'before',
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => wavee_get_portfolio_title(),

            ]
        );

        $repeater->add_control(
            'column', [
                'label' => esc_html__( 'Column Grid', 'wavee-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '6'  => __( 'Two Column', 'wavee-core' ),
                    '4'  => __( 'Three Column', 'wavee-core' ),
                    '3'  => __( 'Four Column', 'wavee-core' ),
                ],
            ]
        );

        $this->add_control(
            'portfolio_title', [
                'label' => __( 'Title', 'wavee-core' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ post_title }}}',
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();


        /**
         * @@
         * Style Tab
         * @@
         */

        // -------------------------------------------- Tabs Color Settings ------------------------------------------------- //
        $this->start_controls_section(
            'tab_color_sec', [
                'label' => __( 'Tabs Color', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .portfolio_filter.gallery_filter li' => 'color: {{VALUE}}',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_tabs',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .portfolio_filter.gallery_filter li',
            ]
        );

        $this->end_controls_tab();

        // Hover Button Style
        $this->start_controls_tab(
            'style_hover_tabs',
            [
                'label' => esc_html__( 'Active', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'hover_font_color', [
                'label' => esc_html__( 'Font Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .portfolio_filter.gallery_filter li.active' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .portfolio_filter.gallery_filter li:hover' => 'color: {{VALUE}}',
                )
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        // -------------------------------------------- Tabs Color Settings ------------------------------------------------- //
        $this->start_controls_section(
            'image_box_style', [
                'label' => __( 'Image Box', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'hover_img_color', [
                'label'     => esc_html__('Hover Color 01', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'hover_img_color2', [
                'label'     => esc_html__('Hover Color 02', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_post_two .img:before' => 'background-image: -webkit-linear-gradient(140deg,  {{hover_img_color.VALUE}} 0%, {{VALUE}} 100%)',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {

        $settings = $this->get_settings();

        ?>
        <section class="masonry_portfolio_area">
            <div id="gallery" class="row gallery_inner_three">
                <?php
                $portfolios = is_array( $settings['portfolio_title'] ) ? $settings['portfolio_title'] : '';
                foreach ( $portfolios as $portfolio_title ) {
                    $column = !empty( $portfolio_title['column'] ) ? $portfolio_title['column'] : '';
                    $portfolio_id = $portfolio_title['post_title'];
                    $portfolio_category = get_the_terms( $portfolio_id, 'portfolio_cat' );
                    $cat_slug = '';
                    if (is_array($portfolio_category)) {
                        foreach ( $portfolio_category as $cat ) {
                            $cat_slug .= $cat->slug.' ';
                        }
                    }
                    switch ($column) {
                        case '6':
                            $image_size = 'wavee_960x484';
                            break;
                        case '4':
                            $image_size = 'full';
                            break;
                        case '3':
                            $image_size = 'full';
                            break;
                    }
                    ?>
                    <div class="col-lg-<?php echo esc_attr($column) ?> col-sm-6 gallery_item <?php echo esc_attr( $cat_slug ); ?>">
                        <div class="gallery_post_two">
                            <a href="<?php echo get_permalink( $portfolio_id ); ?>" class="img">
                                <?php echo get_the_post_thumbnail( $portfolio_id, $image_size ) ?>
                            </a>
                            <div class="hover_text">
                                <a href="<?php echo get_permalink( $portfolio_id ); ?>">
                                    <h3><?php echo get_the_title( $portfolio_id ); ?></h3>
                                </a>
                                <?php
                                if ( is_array( $portfolio_category ) ) {
                                    foreach( $portfolio_category as $port_cat ){ ?>
                                        <a href="<?php echo esc_url( get_term_link( $port_cat ) ) ?>">
                                            <div class="g_tag"><?php echo esc_html( $port_cat->name ) ?></div>
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>

        <script>
            ;(function($){
                "use strict";
                $(document).ready(function () {

                    /*---------gallery isotope js-----------*/
                    function galleryMasonry() {
                        if ($('#gallery').length) {
                            $('#gallery').imagesLoaded(function () {
                                // images have loaded
                                // Activate isotope in container
                                $("#gallery").isotope({
                                    itemSelector: ".gallery_item",
                                    layoutMode: 'masonry',
                                    percentPosition: true,
                                    animationOptions: {
                                        duration: 750,
                                        easing: 'linear'
                                    }
                                });

                                // Add isotope click function
                                $(".gallery_filter li").on('click', function () {
                                    $(".gallery_filter li").removeClass("active");
                                    $(this).addClass("active");

                                    var selector = $(this).attr("data-filter");
                                    $("#gallery").isotope({
                                        filter: selector,
                                        animationOptions: {
                                            animationDuration: 750,
                                            easing: 'linear',
                                            queue: false
                                        }
                                    })
                                    return false;
                                })
                            })
                        }
                    }
                    galleryMasonry();
                });
            })(jQuery);
        </script>
        <?php
    }
}