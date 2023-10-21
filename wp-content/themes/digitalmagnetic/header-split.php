<?php
$opt = get_option('wavee_opt');

$main_logo = isset($opt['main_logo'] ['url']) ? $opt['main_logo'] ['url'] : '';
$dark_logo = isset($opt['dark_logo']['url']) ? $opt['dark_logo']['url'] : '';
$retina_dark_logo = isset ( $opt['retina_dark_logo']['url']) ? $opt['retina_dark_logo']['url'] :  '';
$retina_logo = isset ( $opt['retina_logo']['url'] ) ? $opt['retina_logo']['url'] : '';
?>

<!doctype html>
    <html <?php language_attributes(); ?>>
        <head>
            <!-- Required meta tags -->
            <meta charset="<?php bloginfo('charset'); ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <?php wp_head() ?>

        </head>
    <body <?php body_class(); ?>>

    <?php
    if ( function_exists('wp_body_open') ) {
        wp_body_open();
    }
    ?>

    <div class="preloader">
        <div class="loader">
            <div class="loader-counter"></div>
        </div>
    </div>

    <header class="header_area_one header_area_four p_absoulte m_p">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-9 col-7">
                    <div class="menu_left">
                        <a href="<?php echo esc_url(home_url('/')) ?>" class="logo">
                            <?php
                            if ( !empty( $main_logo ) ) {  ?>
                                <img src="<?php echo esc_url( $main_logo ) ?>" srcset="<?php echo esc_url( $retina_logo ) ?> 2x" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <img src="<?php echo esc_url( $dark_logo ) ?>" srcset="<?php echo esc_url( $retina_dark_logo ) ?> 2x" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php
                            } else {
                                ?>
                                <h3> <?php echo esc_html(get_bloginfo('name')) ?> </h3>
                                <?php
                            } ?>
                        </a>


                    </div>
                </div>
                <div class="col-sm-3 col-5">
                    <div class="menu_right split_menu">
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


    <div class="hamburger_menu_wrepper" id="menu">
        <div class="animation-box split_menu_icon">
            <div class="top_menu">
                <a href=<?php echo esc_url(home_url('/')) ?>>
                    <?php
                    if (!empty($main_logo)) { ?>
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
                wp_nav_menu(array(
                    'menu' => 'main_menu',
                    'theme_location' => 'main_menu',
                    'container' => 'ul',
                    'depth' => 2,
                    'menu_class' => 'navbar-nav justify-content-end menu offcanfas_menu',
                    'walker' => new Wavee_Hamburger_Navwalker()
                ));
                ?>
            </div>
        </div>
    </div>