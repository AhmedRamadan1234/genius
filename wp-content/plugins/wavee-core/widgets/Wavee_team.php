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
class Wavee_team extends Widget_Base {

    public function get_name() {
        return 'wavee_team';
    }

    public function get_title() {
        return __( 'Team Members', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-person';
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
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section(); // End Title


        //--------------------------------------- Team Members -------------------------------------//
        $this->start_controls_section(
            'team_members_sec',
            [
                'label' => __( 'Team Members', 'wavee-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'profile_img', [
                'label' => __( 'Profile Picture', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'name', [
                'label' => __( 'Name', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Arif Rahman'
            ]
        );

        $repeater->add_control(
            'designation', [
                'label' => __( 'Designation', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Web Developer'
            ]
        );

        $repeater->add_control(
            'dribbble',
            [
                'label' => esc_html__( 'Dribbble URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $repeater->add_control(
            'facebook',
            [
                'label' => esc_html__( 'Facebook URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $repeater->add_control(
            'twitter',
            [
                'label' => esc_html__( 'Twitter URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $repeater->add_control(
            'googleplus',
            [
                'label' => esc_html__( 'Google plus URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'instagram',
            [
                'label' => esc_html__( 'Instagram URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $repeater->add_control(
            'linkedin',
            [
                'label' => esc_html__( 'Linkedin URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'youtube',
            [
                'label' => esc_html__( 'Youtube URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'pinterest',
            [
                'label' => esc_html__( 'Pinterest URL', 'wavee-core' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'team_members',
            [
                'label' => __( 'Team Member', 'wavee-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section(); // End features



        /**
         * Style Tab
         * ------------------------------ Style Item Title ------------------------------//
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
                    '{{WRAPPER}} .sec_title .s_section_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .sec_title .s_section_title
                ',
            ]
        );

        $this->end_controls_section(); // End Title Style


        // ------------------------------ Style Item Subtitle ------------------------------//
        $this->start_controls_section(
            'item_subtitle_sec', [
                'label' => __( 'Subtitle', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color', [
                'label' => __( 'Text Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'subtitle_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .sec_title p',
            ]
        );

        $this->end_controls_section(); // End Subtitle Style


        // ------------------------------ Style Item Subtitle ------------------------------//
        $this->start_controls_section(
            'item_hover_color_sec', [
                'label' => __( 'Item Hover Color', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_hover_color', [
                'label'     => esc_html__('Item Color 01', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'item_hover_color2', [
                'label'     => esc_html__('Item Color 02', 'wavee-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '.team_item .team-img:before' => 'background-image: -webkit-linear-gradient(-42deg,  {{item_hover_color.VALUE}} 0%, {{VALUE}} 100%)',
                ],
            ]
        );

        $this->end_controls_section();


        //------------------------------  Section Background  --------------------------------//
        $this->start_controls_section(
            'sec_bg_style',
            [
                'label' => esc_html__( 'Section Background', 'wavee-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Column Settings
        $this->add_control(
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
            'bg_color', [
                'label' => __( 'Background Color', 'wavee-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area ' => 'background: {{VALUE}};',
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
            ]
        );


        $this->end_controls_section(); // End Section Background

    }

    protected function render() {

        $settings = $this->get_settings();

        ?>
        <section class="team_area sec_pad">
            <div class="container">
                <div class="sec_title text-center">
                    <?php
                        if ( !empty( $settings['title'] ) ) {
                            echo '<h2 class="s_section_title">' . esc_html( $settings['title'] ) . '</h2>';
                        }

                        if ( !empty( $settings['subtitle'] ) ) {
                            echo wp_kses_post( wpautop( $settings['subtitle'] ) );
                        } ?>
                </div>
                <div class="row">
                    <?php
                        if ( !empty( $settings['team_members'] ) ) {
                            foreach ( $settings['team_members'] as $member ) {
                                ?>
                                <div class="col-md-<?php echo esc_attr( $settings['column'] ) ?> col-sm-6 elementor-repeater-item-<?php echo $member['_id'] ?>">
                                    <div class="team_item">
                                        <div class="team-img">
                                            <?php
                                                if( !empty( $member['profile_img']['id'] ) ) {
                                                    echo wp_get_attachment_image( $member['profile_img']['id'], 'full');
                                                }
                                            ?>
                                            <ul class="list-unstyled social_link">
                                                <?php

                                                    if ( !empty( $member['dribbble']['url'] ) ) { ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( $member['dribbble']['url'] ) ?>" <?php wavee_is_external( $member['dribbble'] ); wavee_is_nofollow( $member['dribbble'] ) ?>>
                                                                <i class="social_dribbble"></i><i class="social_dribbble"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }

                                                    if ( !empty( $member['facebook']['url'] ) ) { ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( $member['facebook']['url'] ) ?>" <?php wavee_is_external( $member['facebook'] ); wavee_is_nofollow( $member['facebook'] ) ?>>
                                                                <i class="social_facebook"></i><i class="social_facebook"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }

                                                    if ( !empty( $member['twitter']['url'] ) ) { ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( $member['twitter']['url'] ) ?>" <?php wavee_is_external( $member['twitter'] ); wavee_is_nofollow( $member['twitter'] ) ?>>
                                                                <i class="social_twitter"></i><i class="social_twitter"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }

                                                    if ( !empty( $member['googleplus']['url'] ) ) { ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( $member['googleplus']['url'] ) ?>" <?php wavee_is_external( $member['googleplus'] ); wavee_is_nofollow( $member['googleplus'] ) ?>>
                                                                <i class="social_googleplus"></i><i class="social_googleplus"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }

                                                    if ( !empty( $member['instagram']['url'] ) ) { ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( $member['instagram']['url'] ) ?>" <?php wavee_is_external( $member['instagram'] ); wavee_is_nofollow( $member['instagram'] ) ?>>
                                                                <i class="social_instagram"></i><i class="social_instagram"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }

                                                    if ( !empty( $member['linkedin']['url'] ) ) { ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( $member['linkedin']['url'] ) ?>" <?php wavee_is_external( $member['linkedin'] ); wavee_is_nofollow( $member['linkedin'] ) ?>>
                                                                <i class="social_linkedin"></i><i class="social_linkedin"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }

                                                    if ( !empty( $member['youtube']['url'] ) ) { ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( $member['youtube']['url'] ) ?>" <?php wavee_is_external( $member['youtube'] ); wavee_is_nofollow( $member['youtube'] ) ?>>
                                                                <i class="social_youtube"></i><i class="social_youtube"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }

                                                    if ( !empty( $member['pinterest']['url'] ) ) { ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( $member['pinterest']['url'] ) ?>" <?php wavee_is_external( $member['pinterest'] ); wavee_is_nofollow( $member['pinterest'] ) ?>>
                                                                <i class="social_pinterest"></i><i class="social_pinterest"></i>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                        <?php
                                            if ( !empty( $member['name'] ) ) {
                                                echo '<h4>' . esc_html( $member['name'] ) . '<span> / ' . esc_html( $member['designation'] ). '</span></h4>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
}
