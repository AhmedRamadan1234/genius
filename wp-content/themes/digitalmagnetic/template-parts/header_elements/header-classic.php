<?php
$opt = get_option('wavee_opt');
$is_header_content = isset ( $opt['is_header_content']) ? $opt['is_header_content'] :  '';
$header_content = function_exists('get_field') ? get_field ( 'header_content') : $is_header_content;


if ( isset($opt['is_header_sticky']) ) {
    $is_header_sticky = $opt['is_header_sticky'] == '1' ? ' sticky_nav' : '';
} else {
    $is_header_sticky = ' sticky_nav';
}
$is_rtl_menu_class = is_rtl() ? 'mr-auto' : 'ml-auto';

/**
 * Header Nav-bar Layout
 */
$page_header_classic_layout = function_exists( 'get_field' ) ? get_field( 'is_classic_menu' ) : 'full_width';

switch ( $page_header_classic_layout ) {
    case 'boxed':
        $menu_container = 'container';
        break;
    case 'full_width':
        $menu_container = 'container-fluid';
        break;
    default:
        $menu_container = 'container-fluid';
}
?>

<header class="header_area p_absoulte m_p <?php echo esc_attr($is_header_sticky) ?>">
    <nav class="navbar navbar-expand-lg" id="header">
        <div class="<?php echo esc_attr($menu_container) ?>">
            <div class="logo_info">
                <a class="navbar-brand logo_two" href="<?php echo esc_url(home_url('/')) ?>">
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
                        <img src="<?php echo esc_url( $sticky_logo ) ?>" srcset="<?php echo esc_url( $retina_sticky_logo ) ?> 2x" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        <?php
                    } else {
                        echo '<h3>' . esc_html(get_bloginfo('name')) . '</h3>';
                    }
                    ?>
                </a>
                <?php if ( $header_content ) : ?>
                    <div class="h_contact_info">
                        <?php if (!empty($opt['tel_no'])) : ?>
                            <a href="tel:<?php echo esc_attr($opt['tel_no']) ?>">
                                <?php echo esc_html($opt['tel_no']) ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($opt['mail_address'])) : ?>
                            <a href="mailto:<?php echo sanitize_email($opt['mail_address']) ?>">
                                <?php echo sanitize_email($opt['mail_address']) ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php
            if( has_nav_menu('main_menu') ) { ?>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'wavee') ?>">
                                    <span class="menu_toggle">
                                        <span class="hamburger">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </span>
                                        <span class="hamburger-cross">
                                            <span></span>
                                            <span></span>
                                        </span>
                                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                    wp_nav_menu( array (
                        'menu'              => 'main_menu',
                        'theme_location'    => 'main_menu',
                        'container'         => 'ul',
                        'depth'             => 2,
                        'menu_class'        => 'navbar-nav '.$is_rtl_menu_class.' menu',
                        'walker'            => new Wavee_Nav_Navwalker()
                    ));
                    ?>
                </div>
                <?php
            } ?>
        </div>
    </nav>
</header>
