<?php

// Navbar styling
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Menu', 'wavee' ),
    'id'               => 'menu_opt',
    'icon'             => 'el el-lines',
));

/**
 * Main Menu styling
 */
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Classic Menu', 'wavee' ),
    'id'               => 'main_menu_opt',
    'icon'             => '',
    'subsection'       => true,
    'fields'           => array(
        array(
            'id'            => 'menu_typo',
            'type'          => 'typography',
            'title'         => esc_html__( 'Menu Typography', 'wavee' ),
            'subtitle'      => esc_html__( 'Menu item typography options', 'wavee' ),
            'color'         => false,
            'output'        => '.menu > .nav-item > .nav-link, .menu > .nav-item.submenu .dropdown-menu .nav-item .nav-link'
        ),

        array(
            'title'         => esc_html__( 'Menu Item Color', 'wavee' ),
            'subtitle'      => esc_html__( 'This is the menu item font color. Also this color will apply on the mobile menu hamburger icon in order to keep the color consistency.', 'wavee' ),
            'id'            => 'menu_font_color',
            'type'          => 'color',
            'output'        => array (
                'color'      => '.menu > .nav-item > .nav-link',
            ),
        ),

        array(
            'title'     => esc_html__( 'Active/Hover Color', 'wavee' ),
            'subtitle'  => esc_html__( 'Menu item\'s font color on active and hover stats.', 'wavee' ),
            'id'        => 'menu_active_font_color',
            'output'    => array(
                'color' => '.menu > .nav-item > .nav-link:hover, .sticky_nav .menu > .active.nav-item > .nav-link',
            ),
            'type'      => 'color',
        ),


        // Sub-menu settings section
        array(
            'id' => 'submenu_menu_start',
            'type' => 'section',
            'title' => esc_html__( 'Sub-Menu settings', 'wavee' ),
            'indent' => true
        ),

        array(
            'title'         => esc_html__( 'Menu Item Color', 'wavee' ),
            'subtitle'      => esc_html__( 'This is the sub-menu item font color. Also this color will apply on the mobile menu hamburger icon in order to keep the color consistency.', 'wavee' ),
            'id'            => 'submenu_font_color',
            'type'          => 'color',
            'output'        => array (
                'color'      => '.menu > .nav-item.submenu .dropdown-menu .nav-item .nav-link',
            ),
        ),

        array(
            'title'     => esc_html__( 'Active/Hover Color', 'wavee' ),
            'subtitle'  => esc_html__( 'Sub-menu item\'s font color on active and hover stats.', 'wavee' ),
            'id'        => 'submenu_active_font_color',
            'type'      => 'color',
            'output'    => array(
                'color' => '.menu > .nav-item.submenu .dropdown-menu .nav-item .nav-link:hover, .menu > .nav-item.submenu .dropdown-menu .active.nav-item .nav-link',
            ),
        ),

        array(
            'id'     => 'sub_menu_end',
            'type'   => 'section',
            'indent' => false,
        ),


        // Sticky menu settings section
        array(
            'id' => 'sticky_menu_start',
            'type' => 'section',
            'title' => esc_html__( 'Sticky menu settings', 'wavee' ),
            'subtitle' => esc_html__( 'The following settings will only apply on the sticky header mode..', 'wavee' ),
            'indent' => true
        ),

        array(
            'title'         => esc_html__( 'Menu Color', 'wavee' ),
            'subtitle'      => esc_html__( 'Menu item font color on sticky menu mode.  Also this color will apply on the mobile menu hamburger icon in order to keep the color consistency.', 'wavee' ),
            'id'            => 'sticky_menu_font_color',
            'output'        => array (
                'color'     => '.navbar_fixed.header_area .menu > .nav-item > .nav-link',
            ),
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__( 'Menu Active Color', 'wavee' ),
            'subtitle'  => esc_html__( 'Menu item active font color on header sticky mode', 'wavee' ),
            'id'        => 'menu_sticky_active_font_color',
            'output'    => array(
                'color' => '.navbar_fixed.header_area .menu > .nav-item > .nav-link:hover,.navbar_fixed.header_area .menu > .active.nav-item > .nav-link',
            ),
            'type'      => 'color',
        ),

        array(
            'id'     => 'sticky_menu_end',
            'type'   => 'section',
            'indent' => false,
        ),

        array(
            'title'     => esc_html__( 'Menu item padding', 'wavee' ),
            'subtitle'  => esc_html__( 'Padding around menu item. Default is 25px 0px 25px 0px. You can reduce the top and bottom padding to make the menu bar height smaller.', 'wavee' ),
            'id'        => 'menu_item_padding',
            'type'      => 'spacing',
            'output'    => array( '.navbar_fixed.header_area .menu > .nav-item' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
        ),

        array(
            'title'     => esc_html__( 'Menu item margin', 'wavee' ),
            'subtitle'  => esc_html__( 'Margin around menu item.', 'wavee' ),
            'id'        => 'menu_item_margin',
            'type'      => 'spacing',
            'output'    => array( '.menu > .nav-item + .nav-item' ),
            'mode'      => 'margin',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
        ),

        array(
            'title'         => esc_html__( 'Menu Background Color', 'wavee' ),
            'id'            => 'classic_menu_bg_color',
            'type'          => 'color',
            'output'        => array (
                'background'      => '.navbar_fixed.header_area, .menu > .nav-item.submenu .dropdown-menu',
            ),
        ),

    )
));

/**
 * Overlay Menu
 */
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Overlay Menu', 'wavee' ),
    'id'               => 'overlaymenu_opt',
    'icon'             => '',
    'subsection'       => true,
    'fields'           => array(

        array (
            'id'            => 'overlay_menu_typo',
            'type'          => 'typography',
            'title'         => esc_html__( 'Menu Typography', 'wavee' ),
            'subtitle'      => esc_html__( 'Menu item typography options', 'wavee' ),
            'output'        => '.navbar .offcanfas_menu > .nav-item .nav-link'
        ),

        array(
            'title'         => esc_html__( 'Menu Item Color', 'wavee' ),
            'subtitle'      => esc_html__( 'This is the menu item font color.', 'wavee' ),
            'id'            => 'overlay_menu_font_color',
            'type'          => 'color',
            'output'        => array (
                'color'      => '.burger_menu, .navbar .offcanfas_menu > .nav-item .nav-link, .split_menu .burger_menu, .split_menu_icon .top_menu .close_icon
                                ',
                'background' => '.burger_menu .dot_icon .dot, .split_menu .burger_menu .dot_icon .dot',
            ),
        ),

        array (
            'title'     => esc_html__( 'Menu Active/Hover Color', 'wavee' ),
            'subtitle'  => esc_html__( 'Menu item active and hover font color', 'wavee' ),
            'id'        => 'overlay_menu_active_font_color',
            'output'    => array(
                'color' => '.navbar .offcanfas_menu > .nav-item .nav-link:hover, .navbar .offcanfas_menu > .nav-item.submenu.active .nav-link',
            ),
            'type'      => 'color',
        ),

        array (
            'title'         => esc_html__( 'Space Between', 'wavee' ),
            'subtitle'      => esc_html__( 'Space between the menu items.', 'wavee' ),
            'id'            => 'overlay_menu_item_margin',
            'type'          => 'slider',
            'output'        => array (
                'margin-bottom' => '.navbar .offcanfas_menu > .nav-item:not(:last-child)'
            ),
            "min"           => 5,
            "step"          => 1,
            "max"           => 100,
            'display_value' => 'text'
        ),

        array (
            'title'     => esc_html__( 'Overlay Menu Background', 'wavee' ),
            'subtitle'  => esc_html__( 'Overlay Menu background color', 'wavee' ),
            'id'        => 'overlay_menu_bg_color',
            'output'    => array(
                'background-color' => '.hamburger_menu_wrepper',
            ),
            'type'      => 'color_rgba',
        ),

    )
));
