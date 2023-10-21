<?php
// Shop page
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Shop', 'wavee' ),
    'id'               => 'shop_opt',
    'icon'             => 'dashicons dashicons-cart',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Page title', 'wavee' ),
            'subtitle'  => esc_html__( 'Give here the shop page title', 'wavee' ),
            'desc'      => esc_html__( 'This text will show on the shop page banner', 'wavee' ),
            'id'        => 'shop_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Shop', 'wavee' ),
        ),

        array(
            'title'     => esc_html__( 'Layout', 'wavee' ),
            'subtitle'  => esc_html__( 'Select the product view layout', 'wavee' ),
            'id'        => 'shop_layout',
            'type'      => 'image_select',
            'options'   => array(
                'shop_grid' => array(
                    'alt' => esc_html__( 'Grid Layout', 'wavee' ),
                    'img' => WAVEE_DIR_IMG.'/layouts/grid.jpg'
                ),
                'shop_list' => array(
                    'alt' => esc_html__( 'List Layout', 'wavee' ),
                    'img' => WAVEE_DIR_IMG.'/layouts/list.jpg'
                ),
            ),
            'default' => 'shop_grid'
        ),

        array(
            'title'     => esc_html__( 'Sidebar', 'wavee' ),
            'subtitle'  => esc_html__( 'Select the sidebar position of Shop page', 'wavee' ),
            'id'        => 'shop_sidebar',
            'type'      => 'image_select',
            'options'   => array(
                'left' => array(
                    'alt' => esc_html__( 'Left Sidebar', 'wavee' ),
                    'img' => WAVEE_DIR_IMG.'/layouts/sidebar_left.jpg'
                ),
                'right' => array(
                    'alt' => esc_html__( 'Right Sidebar', 'wavee' ),
                    'img' => WAVEE_DIR_IMG.'/layouts/sidebar_right.jpg',
                ),
                'full' => array(
                    'alt' => esc_html__( 'Full Width', 'wavee' ),
                    'img' => WAVEE_DIR_IMG.'/layouts/fullwidth.png',
                ),
            ),
            'default' => 'full'
        ),

        array(
            'title'     => esc_html__( 'Add to Cart Icon', 'wavee' ),
            'id'        => 'is_add_to_cart',
            'type'      => 'switch',
            'on'        => esc_html__( 'Enabled', 'wavee' ),
            'off'       => esc_html__( 'Disabled', 'wavee' ),
            'default'   => '1'
        ),

        array(
            'title'     => esc_html__( 'Light-box Icon', 'wavee' ),
            'id'        => 'is_product_lightbox',
            'type'      => 'switch',
            'on'        => esc_html__( 'Enabled', 'wavee' ),
            'off'       => esc_html__( 'Disabled', 'wavee' ),
            'default'   => '1'
        ),

        array(
            'title'     => esc_html__( 'Title bar background', 'wavee' ),
            'subtitle'  => esc_html__( 'Upload image file as Shop page title bar background', 'wavee' ),
            'id'        => 'shop_header_bg',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => WAVEE_DIR_IMG .'/banners/blog_banner.jpg'
            ),
        ),

        array(
            'title'     => esc_html__('Overlay background color', 'wavee'),
            'id'        => 'banner_shop_overlay_bg_color',
            'type'      => 'color_gradient',
            'validate' => 'color',
            'default'  => array(
                'from' => '',
                'to'   => '',
            ),
        ),
    ),
));


// Product Single Options
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Product Single', 'wavee' ),
    'id'               => 'product_single_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Related Products Title', 'wavee' ),
            'id'        => 'related_products_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Related products', 'wavee' ),
        ),
    )
));