<?php
$opt = get_option('wavee_opt');
$is_header_content = isset ( $opt['is_header_content']) ? $opt['is_header_content'] :  '';
$header_content = function_exists('get_field') ? get_field ( 'header_content') : $is_header_content;
$page_overlay_menu = function_exists( 'get_field' ) ? get_field( 'is_overlay_menu' ) : 'full_width';


if ( $page_overlay_menu == 'boxed' ) {
    ?>
    <header class="header_area">
        <nav class="navbar navbar-expand-lg portfolio_menu" id="header">
            <div class="container-fluid">
                <div class="logo_info">
                    <a href="<?php echo esc_url(home_url('/')) ?>" class="navbar-brand logo_two">
                        <?php
                        if ( isset($opt['main_logo']['url'] )) {
                            $reverse_logo = function_exists( 'get_field' ) ? get_field( 'reverse_logo' ) : '';
                            if ($reverse_logo ) {
                                // Normal Logo
                                $main_logo = isset($opt['sticky_logo'] ['url']) ? $opt['sticky_logo'] ['url'] : '';
                                $retina_logo = isset($opt['retina_sticky_logo'] ['url']) ? $opt['retina_sticky_logo'] ['url'] : '';
                                // Sticky Logo
                                $sticky_logo = isset($opt['sticky_logo'] ['url']) ? $opt['sticky_logo'] ['url'] : '';
                                $retina_sticky_logo = isset($opt['retina_sticky_logo'] ['url']) ? $opt['retina_sticky_logo'] ['url'] : '';
                            } else {
                                // Normal Logo
                                $main_logo = isset($opt['main_logo'] ['url']) ? $opt['main_logo'] ['url'] : '';
                                $retina_logo = isset($opt['retina_logo'] ['url']) ? $opt['retina_logo'] ['url'] : '';
                                // Sticky Logo
                                $sticky_logo = isset($opt['sticky_logo'] ['url']) ? $opt['sticky_logo'] ['url'] : '';
                                $retina_sticky_logo = isset($opt['retina_sticky_logo'] ['url']) ? $opt['retina_sticky_logo'] ['url'] : '';
                            }
                            $logo_srcset = !empty($retina_logo) ?  "srcset='$retina_logo 2x'" : '';
                            $logo_srcset_sticky = !empty($retina_sticky_logo) ?  "srcset='$retina_sticky_logo 2x'" : '';
                            ?>
                            <img src="<?php echo esc_url($main_logo); ?>" <?php echo wp_kses_post($logo_srcset) ?> alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <?php
                        } else {
                            echo '<h3>' . esc_html(get_bloginfo('name')) . '</h3>';
                        }
                        ?>
                    </a>
                </div>
                
                <?php wavee_portfolio_filter(); ?>
                
                <div class="burger_menu">
                    <span class="text" data-text="menu"></span>
                    <div class="dot_icon">
                        <span class="dot one"></span>
                        <span class="dot two"></span>
                        <span class="dot three"></span>
                        <span class="dot four"></span>
                        <span class="dot five"></span>
                        <span class="dot six"></span>
                        <span class="dot seven"></span>
                        <span class="dot eight"></span>
                        <span class="dot nine"></span>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <?php
} else {
    ?>
    <header class="header_area_one p_absoulte m_p">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-9 col-7">
                    <div class="menu_left">
                        <a href="<?php echo esc_url(home_url('/')) ?>" class="logo">
                            <?php
                            if ( isset($opt['main_logo']['url'] )) {
                                $reverse_logo = function_exists( 'get_field' ) ? get_field( 'reverse_logo' ) : '';
                                if ($reverse_logo ) {
                                    // Normal Logo
                                    $main_logo = isset($opt['sticky_logo'] ['url']) ? $opt['sticky_logo'] ['url'] : '';
                                    $retina_logo = isset($opt['retina_sticky_logo'] ['url']) ? $opt['retina_sticky_logo'] ['url'] : '';
                                    // Sticky Logo
                                    $sticky_logo = isset($opt['sticky_logo'] ['url']) ? $opt['sticky_logo'] ['url'] : '';
                                    $retina_sticky_logo = isset($opt['retina_sticky_logo'] ['url']) ? $opt['retina_sticky_logo'] ['url'] : '';
                                } else {
                                    // Normal Logo
                                    $main_logo = isset($opt['main_logo'] ['url']) ? $opt['main_logo'] ['url'] : '';
                                    $retina_logo = isset($opt['retina_logo'] ['url']) ? $opt['retina_logo'] ['url'] : '';
                                    // Sticky Logo
                                    $sticky_logo = isset($opt['sticky_logo'] ['url']) ? $opt['sticky_logo'] ['url'] : '';
                                    $retina_sticky_logo = isset($opt['retina_sticky_logo'] ['url']) ? $opt['retina_sticky_logo'] ['url'] : '';
                                }
                                $logo_srcset = !empty($retina_logo) ?  "srcset='$retina_logo 2x'" : '';
                                $logo_srcset_sticky = !empty($retina_sticky_logo) ?  "srcset='$retina_sticky_logo 2x'" : '';
                                ?>
                                <img src="<?php echo esc_url($main_logo); ?>" <?php echo wp_kses_post($logo_srcset) ?> alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php
                            } else {
                                echo '<h3>' . esc_html(get_bloginfo('name')) . '</h3>';
                            }
                            ?>
                        </a>
                        <?php if ( $header_content ) : ?>
                            <div class="h_contact_info">
                                <?php if ( !empty( $opt['tel_no'] ) ) : ?>
                                    <a href="tel:<?php echo esc_attr($opt['tel_no']) ?>">
                                        <?php echo esc_html($opt['tel_no']) ?>
                                    </a>
                                <?php endif; ?>
                                <?php if ( !empty( $opt['mail_address'] ) ) : ?>
                                    <a href="mailto:<?php echo sanitize_email($opt['mail_address']) ?>">
                                        <?php echo sanitize_email($opt['mail_address']) ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-3 col-5">
                    <div class="menu_right">
                        <div class="burger_menu">
                            <span class="text" data-text="<?php esc_attr_e('menu', 'wavee') ?>"></span>
                            <div class="dot_icon">
                                <span class="dot one"></span>
                                <span class="dot two"></span>
                                <span class="dot three"></span>
                                <span class="dot four"></span>
                                <span class="dot five"></span>
                                <span class="dot six"></span>
                                <span class="dot seven"></span>
                                <span class="dot eight"></span>
                                <span class="dot nine"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
}
?>


<div class="hamburger_menu_wrepper" id="menu">
    <div class="animation-box">
        <div class="top_menu">
            <a href=<?php echo esc_url(home_url('/')) ?>>
                <?php
                if (!empty( $main_logo)) { ?>
                    <img src="<?php echo esc_url( $main_logo ) ?>" srcset="<?php echo esc_url( $retina_logo ) ?> 2x" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php
                } else {
                    ?>
                    <h3> <?php echo esc_html(get_bloginfo('name')) ?> </h3>
                    <?php
                }
                ?>
            </a>
            <div class="burger_menu close_icon">
                <span class="text" data-text="<?php esc_attr_e('Close', 'wavee') ?>"></span>
                <i class="icon_close"></i>
            </div>
        </div>
        <div class="menu-box navbar">
            <?php
            if ( has_nav_menu( 'main_menu') ) {
                wp_nav_menu(array(
                    'menu' => 'main_menu',
                    'theme_location' => 'main_menu',
                    'container' => 'ul',
                    'depth' => 2,
                    'menu_class' => 'navbar-nav justify-content-end menu offcanfas_menu',
                    'walker' => new Wavee_Hamburger_Navwalker()
                ));
            }
            ?>
        </div>
    </div>
</div>