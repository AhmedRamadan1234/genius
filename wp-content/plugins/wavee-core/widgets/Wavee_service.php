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
class Wavee_service extends Widget_Base {

    public function get_name() {
        return 'wavee_service';
    }

    public function get_title() {
        return __( 'Service', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
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
                ],
                'default' => 'style_01'
            ]
        );

        $this->end_controls_section(); // End Style


        //-------------------------------------- Title ----------------------------------------------//
        $this->start_controls_section(
            'title_sec',
            [
                'label' => __( 'Title', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_section(); // End Title


        //-------------------------------------- Subtitle ----------------------------------------------//
        $this->start_controls_section(
            'subtitle_sec',
            [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'condition' => [
                    'style' => 'style_02'
                ]
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'wavee-core' ),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section(); // End Subtitle


        // ---------------------------------- Filter Options ------------------------
        $this->start_controls_section(
            'filter', [
                'label' => __( 'Filter', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'show_count', [
                'label' => esc_html__( 'Show Posts Count', 'wavee-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 3
            ]
        );

        $this->add_control(
            'order', [
                'label' => esc_html__( 'Order', 'wavee-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => 'ASC',
                    'DESC' => 'DESC'
                ],
                'default' => 'ASC'
            ]
        );

        $this->end_controls_section(); // End Filter Options


        // ------------------------------- Button --------------------------------- // 
        $this->start_controls_section(
            'btn_sec', [
                'label' => __( 'Button', 'wavee-core' ),
            ]
        );


        $this->add_control(
            'btn_title', [
                'label' => esc_html__( 'Button Label', 'wavee-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Case Study'
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
                    '{{WRAPPER}} .scroll_service_item .p_btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color', [
                'label' => esc_html__( 'Background Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll_service_item .p_btn' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_border_color', [
                'label' => esc_html__( 'Border Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll_service_item .p_btn' => 'border-color: {{VALUE}};',
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
                'label' => esc_html__( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll_service_item .p_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color_hover', [
                'label' => esc_html__( 'Background Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll_service_item .p_btn:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_border_color_hover', [
                'label' => esc_html__( 'Border Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll_service_item .p_btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        
        
        // -------------------------------------- Column Grid Section ---------------------------------//
        $this->start_controls_section(
            'column_sec', [
                'label' => __( 'Grid Column', 'wavee-core' ),
            ]
        );

        $this->add_control(
            'column', [
                'label' => __( 'Grid Column', 'wavee-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '6' => __( 'Two column', 'wavee-core' ),
                    '4' => __( 'Three column', 'wavee-core' ),
                    '3' => __( 'Four column', 'wavee-core' ),
                ],
                'default' => '4'
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
                    '{{WRAPPER}} .s_section_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .s_section_title
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style


        // ----------------------------------------- Subtitle --------------------------------------------- //
        $this->start_controls_section(
            'style_subtitle_sec', [
                'label' => __( 'Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
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

        $this->end_controls_section(); // End Title Style


        // -------------------------------------  Item Title ------------------------------------------//
        $this->start_controls_section(
            'item_title_sec_style', [
                'label' => __( 'Item Title', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_color_title', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll_service_item .number' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .scroll_service_item h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'item_typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .scroll_service_item h3
                ',
            ]
        );

        $this->end_controls_section(); // End Item Title


        // -------------------------------------  Item Subtitle ------------------------------------------//
        $this->start_controls_section(
            'item_subtitle_sec_style', [
                'label' => __( 'Item Subtitle', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_color_subtitle', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll_service_item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'item_typography_subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .scroll_service_item p
                ',
            ]
        );

        $this->end_controls_section(); // End Item Title


        // -------------------------------------  Floating Images  -----------------------------------------//
        $this->start_controls_section(
            'floating_img_sec', [
                'label' => __( 'Floating Images', 'wavee-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_01'
                ]
            ]
        );

        $this->add_control(
            'floating_img1', [
                'label' => esc_html__( 'Image One', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/pijom.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img2', [
                'label' => esc_html__( 'Image Two', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/plan.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img3', [
                'label' => esc_html__( 'Image Three', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/triangle.png', __FILE__)
                ]
            ]
        );

        $this->add_control(
            'floating_img4', [
                'label' => esc_html__( 'Image Four', 'wavee-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape/square.png', __FILE__)
                ]
            ]
        );

        $this->end_controls_section(); // End Floating Images


        //----------------------------------------- Section Background --------------------------------------------//
        $this->start_controls_section(
            'sec_bg_sec',
            [
                'label' => __( 'Section Background', 'wavee-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => 'style_02',
                ]
            ]
        );

        $this->add_control(
            'sec_bg_color', [
                'label' => __( 'Background Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services_area' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sec_padding',
            [
                'label' => __( 'Padding', 'wavee-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sec_pad' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();

        $services = new WP_Query(array(
            'post_type' => 'service',
            'posts_per_page' => $settings['show_count'],
            'order' => $settings['order'],
        ));

        if ( $settings['style'] == 'style_01' ) {
            if (!empty($settings['floating_img1']['url'])) { ?>
                <div class="t_first p_absoulte">
                    <img class="layer layer2" data-depth="-0.20"
                         src="<?php echo esc_url($settings['floating_img1']['url']) ?>"
                         alt="<?php echo esc_attr($settings['title']) ?>">
                </div>
                <?php
            }
            if (!empty($settings['floating_img2']['url'])) { ?>
                <div class="t_two p_absoulte">
                    <img class="layer layer2" data-depth="0.50"
                         src="<?php echo esc_url($settings['floating_img2']['url']) ?>"
                         alt="<?php echo esc_attr($settings['title']) ?>">
                </div>
                <?php
            }
            if (!empty($settings['floating_img3']['url'])) { ?>
                <div class="t_four p_absoulte">
                    <img class="layer layer2" data-depth="0.30"
                         src="<?php echo esc_url($settings['floating_img3']['url']) ?>"
                         alt="<?php echo esc_attr($settings['title']) ?>">
                </div>
                <?php
            }
            if (!empty($settings['floating_img4']['url'])) { ?>
                <div class="t_five p_absoulte">
                    <img class="layer layer2" data-depth="0.10"
                         src="<?php echo esc_url($settings['floating_img4']['url']) ?>"
                         alt="<?php echo esc_attr($settings['title']) ?>">
                </div>
                <?php
            } ?>
            <div class="intro">
                <div class="container">
                    <?php
                    if ( !empty( $settings['title'] ) ) {
                        echo '<h2 class="s_section_title">' . esc_html($settings['title'] ) . '</h2>';
                    } ?>
                    <div class="row">
                        <?php
                            $i = 1;
                            while($services->have_posts()) : $services->the_post();
                                $column = !empty($settings['column']) ? $settings['column'] : '4'
                                ?>
                                <div class="col-lg-<?php echo esc_attr( $column ) ?> col-md-6">
                                    <div class="scroll_service_item">
                                        <!--<div class="number"><?php /*echo esc_attr(  $i++ .'.' ) */?></div>-->
                                        <?php if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'full', array( 'class' => 'icon p_absoulte' ) );
                                        } ?>
                                        <a href="<?php the_permalink() ?>">
                                            <h3><?php the_title() ?></h3>
                                        </a>
                                        <p><?php echo wp_trim_words( get_the_content(), 10, '...' ); ?></p>
                                        <?php if(!empty($settings['btn_title'])) : ?>
                                            <a href="<?php the_permalink() ?>" class="p_btn">
                                                <?php echo esc_html($settings['btn_title']) ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }

        elseif ( $settings['style'] == 'style_02' ) {
            ?>
            <div class="services_area sec_pad">
                <div class="intro">
                    <div class="container custom_container">
                        <div class="row justify-content-center">
                            <div class="col-xl-7">
                                <div class="sec_title text-center">
                                    <?php
                                    if ( !empty ( $settings['title'] ) ) {
                                        echo '<h2 class="s_section_title">' . esc_html($settings['title']) . '</h2>';
                                    }
                                    if ( !empty ( $settings['subtitle'] ) ) {
                                        echo wp_kses_post(wpautop( $settings['subtitle'] ) );
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                                $i = 1;
                                while($services->have_posts()) : $services->the_post();
                                    $column = !empty($settings['column']) ? $settings['column'] : '4'
                                    ?>
                                    <div class="col-lg-<?php echo esc_attr( $column ) ?> col-md-6">
                                        <div class="scroll_service_item">
                                            <!--<h2 class="number"><?php /*echo esc_attr(  $i++ .'.' ) */?></h2>-->
                                            <?php if ( has_post_thumbnail() ) {
                                                the_post_thumbnail( 'full', array( 'class' => 'icon p_absoulte' ) );
                                            } ?>
                                            <a href="<?php the_permalink() ?>">
                                                <h3><?php the_title() ?></h3>
                                            </a>
                                            <p><?php echo wp_trim_words( get_the_content(), 10, '...' ); ?></p>
                                            <?php if(!empty($settings['btn_title'])) : ?>
                                                <a href="<?php the_permalink() ?>" class="p_btn">
                                                    <?php echo esc_html($settings['btn_title']) ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
