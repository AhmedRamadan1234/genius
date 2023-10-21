<?php
// Header Section
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Header', 'wavee' ),
    'id'               => 'header_sec',
    'customizer_width' => '400px',
    'icon'             => 'el el-arrow-up',
));


// Logo
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Logo', 'wavee' ),
    'id'               => 'logo_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(

        array(
            'title'     => esc_html__( 'Upload logo', 'wavee' ),
            'subtitle'  => esc_html__( 'Upload here a image file for your logo', 'wavee' ),
            'id'        => 'main_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => WAVEE_DIR_IMG.'/logo/logo.png'
            )
        ),
        array(
            'title'     => esc_html__( 'Sticky header logo', 'wavee' ),
            'id'        => 'sticky_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => WAVEE_DIR_IMG.'/logo/dark_logo.png'
            )
        ),
        array(
            'title'     => esc_html__( 'Retina Logo', 'wavee' ),
            'subtitle'  => esc_html__( 'The retina logo should be double (2x) of your original logo', 'wavee' ),
            'id'        => 'retina_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => WAVEE_DIR_IMG.'/logo/logo2x.png'
            )
        ),
        array(
            'title'     => esc_html__( 'Retina Sticky Logo', 'wavee' ),
            'subtitle'  => esc_html__( 'The retina logo should be double (2x) of your original logo', 'wavee' ),
            'id'        => 'retina_sticky_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => WAVEE_DIR_IMG.'/logo/dark_logo2x.png'
            )
        ),




        /*array(
            'title'     => esc_html__( 'Main Logo', 'wavee' ),
            'subtitle'  => esc_html__( 'Upload here a image file for your logo', 'wavee' ),
            'id'        => 'main_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array (
                'url'   => WAVEE_DIR_IMG.'/logo/logo.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Dark Logo', 'wavee' ),
            'subtitle'  => esc_html__( 'Upload here a image file for your dark logo', 'wavee' ),
            'id'        => 'dark_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => WAVEE_DIR_IMG.'/logo/dark_logo.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Retina Dark Logo', 'wavee' ),
            'subtitle'  => esc_html__( 'The retina logo should be double (2x) of your original logo', 'wavee' ),
            'id'        => 'retina_dark_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => WAVEE_DIR_IMG.'/logo/dark_logo2x.png '
            )
        ),

        array(
            'title'     => esc_html__( 'Retina Logo', 'wavee' ),
            'subtitle'  => esc_html__( 'The retina logo should be double (2x) of your original logo', 'wavee' ),
            'id'        => 'retina_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => WAVEE_DIR_IMG.'/logo/logo2x.png'
            )
        ),*/

        array(
            'title'     => esc_html__( 'Logo dimensions', 'wavee' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo.', 'wavee' ),
            'id'        => 'logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.logo_info .navbar-brand img'
        ),

        array(
            'title'     => esc_html__( 'Padding', 'wavee' ),
            'subtitle'  => esc_html__( 'Padding around the logo. Input the padding as clockwise (Top Right Bottom Left)', 'wavee' ),
            'id'        => 'logo_padding',
            'type'      => 'spacing',
            'output'    => array( '.logo_info .navbar-brand img' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
        ),
    )
) );


// Header Left
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Header Content', 'wavee' ),
    'id'               => 'header_left_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(

        array(
            'id'        => 'is_header_sticky',
            'type'      => 'switch',
            'title'     => esc_html__( 'Header Sticky', 'wavee' ),
            'on'        => esc_html__( 'Enable', 'wavee' ),
            'off'       => esc_html__( 'Disable', 'wavee' ),
            'default'   => true,
        ),

        array(
            'id'        => 'is_header_content',
            'type'      => 'switch',
            'title'     => esc_html__( 'Header Left Part', 'wavee' ),
            'on'        => esc_html__( 'Show', 'wavee' ),
            'off'       => esc_html__( 'Hide', 'wavee' ),
            'default'   => '1',
        ),

        array(
            'title'     => esc_html__( 'Tel Number', 'wavee' ),
            'subtitle'  => esc_html__( 'Enter here your Tel Number address.', 'wavee' ),
            'id'        => 'tel_no',
            'default'   => '+0074 215 2455',
            'type'      => 'text',
            'required'  => array( 'is_header_content', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'E-mail', 'wavee' ),
            'subtitle'  => esc_html__( 'Enter here your mail address.', 'wavee' ),
            'id'        => 'mail_address',
            'type'      => 'text',
            'default'   => 'contact@wave.com',
            'required'  => array( 'is_header_content', '=', '1' )
        ),

        // Header Left Styling
        array(
            'id' => 'header_left_styling_start',
            'type' => 'section',
            'title' => esc_html__( 'Styling', 'wavee' ),
            'indent' => true,
            'required'  => array( 'is_header_content', '=', '1' ),
        ),

        array(
            'title'         => esc_html__( 'Typography', 'wavee' ),
            'id'            => 'preloader_typo',
            'type'          => 'typography',
            'text-align'    => false,
            'output'        => '.h_contact_info a',
        ),

        array(
            'title'     => esc_html__( 'Separator Color', 'wavee' ),
            'id'        => 'header_top_separator_color',
            'type'      => 'color',
            'output'    => array( '.h_contact_info a + a:before' ),
            'mode'      => 'color'
        ),

        array(
            'id'     => 'header_top_styling_end',
            'type'   => 'section',
            'indent' => false,
        ),
    )
));


// Header Contents
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Header Styling', 'wavee' ),
    'id'               => 'header_styling_sec',
    'customizer_width' => '400px',
    'icon'             => '',
    'subsection'       => true,
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Header Style', 'wavee' ),
            'subtitle'  => __( 'Select the menu type which menu type you want to use for the whole website.', 'wavee' ),
            'id'        => 'header_layout_style',
            'type'      => 'image_select',
            'default'   => 'classic',
            'options'   => array(
                'classic' => array(
                    'alt' => esc_html__( 'Classic Menu', 'wavee' ),
                    'img' => WAVEE_DIR_IMG . '/header/header-style-02.png',
                ),
                'hamburger' => array(
                    'alt' => esc_html__( 'Hamburger Overlay Menu', 'wavee' ),
                    'img' => WAVEE_DIR_IMG . '/header/header-style-01.png',
                ),
            ),
        ),
    )
));


/**
 * Title-bar
 */
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Title-bar', 'wavee' ),
    'id'               => 'title_bar_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(


        array(
            'title'     => esc_html__( 'Title-bar Style', 'wavee' ),
            'id'        => 'banner_style',
            'type'      => 'image_select',
            'default'   => '1',
            'options'   => array(
                '1' => array(
                    'alt' => esc_html__( 'Title-bar 01', 'wavee' ),
                    'img' => WAVEE_DIR_IMG.'/banners/banner_2.png',
                ),
                '2' => array(
                    'alt' => esc_html__( 'Title-bar 02', 'wavee' ),
                    'img' => WAVEE_DIR_IMG.'/banners/banner_1.png',
                ),
            )
        ),

        array(
            'title'     => esc_html__( 'Breadcrumb', 'wavee' ),
            'id'        => 'is_breadcrumb',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'wavee' ),
            'off'       => esc_html__( 'Hide', 'wavee' ),
            'default'   => '1',
            'required'  => array( 'title_bar_style', '=', 'style_02' )
        ),

        array(
            'id'        => 'title_bar_title_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Title Typography', 'wavee' ),
            'output'    => '.breadcrumb_content h1'
        ),

        array(
            'id'        => 'title_bar_subtitle_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Subtitle Typography', 'wavee' ),
            'output'    => '.breadcrumb_content p',
            'required'  => array( 'title_bar_style', '=', 'style_01' )
        ),

        array(
            'title'     => esc_html__( 'Overlay Color', 'wavee' ),
            'id'        => 'title_bar1_banner_overlay_color',
            'type'      => 'color_rgba',
            'output'    => array(
                'background' => '.overlay',
            ),
            'required'  => array( 'title_bar_style', '=', 'style_01' )
        ),

        array(
            'title'     => esc_html__( 'Overlay Color', 'wavee' ),
            'id'        => 'banner_overlay_color',
            'type'      => 'color_gradient',
            'default'   => array(
                'from'  => '',
                'to'    => '',
            ),
            'required'  => array( 'title_bar_style', '=', 'style_02' )
        ),

        array(
            'title'     => esc_html__( 'Title-bar padding', 'wavee' ),
            'subtitle'  => esc_html__( 'Padding around the Title-bar.', 'wavee' ),
            'id'        => 'title_bar_padding',
            'type'      => 'spacing',
            'output'    => array( '.breadcrumb_area' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),
            'units_extended' => 'true',
        ),

        array(
            'id'       => 'titlebar_align',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Alignment', 'wavee' ),
            'options' => array(
                'left' => esc_html__( 'Left', 'wavee' ),
                'center' => esc_html__( 'Center', 'wavee' ),
                'right' => esc_html__( 'Right', 'wavee' )
            ),
            'default' => 'center'
        ),
    )
));