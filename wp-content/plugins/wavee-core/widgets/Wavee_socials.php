<?php
namespace WaveeCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;



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
class Wavee_socials extends Widget_Base {

    public function get_name() {
        return 'wavee_socials';
    }

    public function get_title() {
        return __( 'Wavee Socials', 'wavee-core' );
    }

    public function get_icon() {
        return 'eicon-social-icons';
    }

    public function get_categories() {
        return [ 'wavee-elements' ];
    }

    protected function _register_controls() {

        // ------------------------------------------- Start Social links -----------------------------------------//
        $this->start_controls_section(
            'social_link_sec',
            [
                'label' => __( 'Social Icons', 'wavee-core' ),
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

        $this->add_control(
            'divider',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'icon_align',
            [
                'label' => __( 'Alignment', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'plugin-domain' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'plugin-domain' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'plugin-domain' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .social_link_two' => 'text-align: {{VALUE}}',
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->end_controls_section(); // End Social links

    }

    protected function render() {
        $settings = $this->get_settings();
        ?>
        <ul class="list-unstyled social_link social_link_two">
            <?php
            if ( !empty( $settings['dribbble']['url'] ) ) { ?>
                <li>
                    <a href="<?php echo esc_url( $settings['dribbble']['url'] ) ?>" <?php wavee_is_external( $settings['dribbble'] ); wavee_is_nofollow( $settings['dribbble'] ) ?>>
                        <i class="social_dribbble"></i><i class="social_dribbble"></i>
                    </a>
                </li>
                <?php
            }
            if ( !empty( $settings['facebook']['url'] ) ) { ?>
                <li>
                    <a href="<?php echo esc_url( $settings['facebook']['url'] ) ?>" <?php wavee_is_external( $settings['facebook'] ); wavee_is_nofollow( $settings['facebook'] ) ?>>
                        <i class="social_facebook"></i><i class="social_facebook"></i>
                    </a>
                </li>
                <?php
            }
            if ( !empty( $settings['twitter']['url'] ) ) { ?>
                <li>
                    <a href="<?php echo esc_url( $settings['twitter']['url'] ) ?>" <?php wavee_is_external( $settings['twitter'] ); wavee_is_nofollow( $settings['twitter'] ) ?>>
                        <i class="social_twitter"></i><i class="social_twitter"></i>
                    </a>
                </li>
                <?php
            }
            if ( !empty( $settings['instagram']['url'] ) ) { ?>
                <li>
                    <a href="<?php echo esc_url( $settings['instagram']['url'] ) ?>" <?php wavee_is_external( $settings['instagram'] ); wavee_is_nofollow( $settings['instagram'] ) ?>>
                        <i class="social_instagram"></i><i class="social_instagram"></i>
                    </a>
                </li>
                <?php
            }
            if ( !empty( $settings['linkedin']['url'] ) ) { ?>
                <li>
                    <a href="<?php echo esc_url( $settings['linkedin']['url'] ) ?>" <?php wavee_is_external( $settings['linkedin'] ); wavee_is_nofollow( $settings['linkedin'] ) ?>>
                        <i class="social_linkedin"></i><i class="social_linkedin"></i>
                    </a>
                </li>
                <?php
            }
            if ( !empty( $settings['youtube']['url'] ) ) { ?>
                <li>
                    <a href="<?php echo esc_url( $settings['youtube']['url'] ) ?>" <?php wavee_is_external( $settings['youtube'] ); wavee_is_nofollow( $settings['youtube'] ) ?>>
                        <i class="social_youtube"></i><i class="social_youtube"></i>
                    </a>
                </li>
                <?php
            }
            if ( !empty( $settings['pinterest']['url'] ) ) { ?>
                <li>
                    <a href="<?php echo esc_url( $settings['pinterest']['url'] ) ?>" <?php wavee_is_external( $settings['pinterest'] ); wavee_is_nofollow( $settings['pinterest'] ) ?>>
                        <i class="social_pinterest"></i><i class="social_pinterest"></i>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
}