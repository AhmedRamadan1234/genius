<?php
namespace WaveeCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
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
class Wavee_service_tabs extends Widget_Base {

    public function get_name() {
        return 'wavee_service_tabs';
    }

    public function get_title() {
        return esc_html__( 'Service Tabs', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-document-file';
    }

    public function get_categories() {
        return [ 'wavee-elements' ];
    }


    protected function _register_controls() {


        $this->start_controls_section(
            'tabs_sec',
            [
                'label' => __( 'Tab Contents', 'wavee-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_title', [
                'label' => __( 'Tab Title', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $repeater->add_control(
            'tab_contents', [
                'label' => __( 'Content', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => __( 'Tabs', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->end_controls_section();


        //--------------------------------------- Section Background --------------------------------------//
        $this->start_controls_section(
            'sec_bg_style',
            [
                'label' => __( 'Section Background', 'wavee-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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

        $tabs = $this->get_settings_for_display( 'tabs' );
        $id_int = substr( $this->get_id_int(), 0, 3 );

        ?>
        <div class="services_details_area sec_pad">
            <div class="intro">
                <div class="container custom_container">
                    <div class="row">
                        <div class="col-md-5 col-xl-4">
                            <div class="services_details_sidebar">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php
                                    foreach ( $tabs as $index => $item ) :
                                        $tab_count = $index + 1;
                                        $tab_title_setting_key = $this->get_repeater_setting_key( 'tab_title', 'tabs', $index );
                                        $active = $tab_count == 1 ? 'active' : '';
                                        $this->add_render_attribute( $tab_title_setting_key, [
                                            'class' => [ 'nav-link', $active ],
                                            'data-toggle' => 'pill',
                                            'role' => 'tab',
                                            'href' => '#'.'tab-' . $id_int . $tab_count,
                                            'aria-controls' => 'tab-' . $id_int . $tab_count,
                                        ]);
                                        ?>
                                        <a <?php echo $this->get_render_attribute_string( $tab_title_setting_key ); ?>>
                                            <?php if ( !empty( $item['tab_title'] ) ) : ?>
                                                <div class="single_nav_menu">
                                                    <?php echo wp_kses_post( $item['tab_title'] ); ?>
                                                </div>
                                            <?php  endif; ?>
                                        </a>
                                    <?php
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7 col-xl-8">
                            <div class="service_details_content">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <?php
                                    foreach ( $tabs as $index => $item ) :
                                        $tab_count = $index + 1;
                                        $tab_content_setting_key = $this->get_repeater_setting_key( 'tab_contents', 'tabs', $index );
                                        $active = $tab_count == 1 ? ' show active' : '';
                                        $this->add_render_attribute( $tab_content_setting_key, [
                                            'class' => [ 'tab-pane', 'fade', $active  ],
                                            'id' => 'tab-'.$id_int . $tab_count,
                                            'role' => 'tabpanel',
                                        ]);
                                        ?>
                                        <div <?php echo $this->get_render_attribute_string( $tab_content_setting_key ); ?>>
                                            <?php if ( !empty( $item['tab_contents'] ) ) : ?>
                                                <?php echo wp_kses_post( wpautop( $item['tab_contents'] ) ); ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}