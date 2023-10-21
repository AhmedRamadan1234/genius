<?php

// Footer settings
Redux::setSection('wavee_opt', array(
    'title'     => esc_html__('Footer', 'wavee'),
    'id'        => 'wavee_footer',
    'icon'      => 'el el-arrow-down',
));


// Footer Logo
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Logo', 'wavee' ),
    'id'               => 'footer_logo_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(

        array(
            'title'     => esc_html__( 'Upload Footer logo', 'wavee' ),
            'subtitle'  => esc_html__( 'Upload here a image file for your footer logo', 'wavee' ),
            'id'        => 'footer_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array (
                'url'   => WAVEE_DIR_IMG.'/logo/footer_log.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Footer Retina Logo', 'wavee' ),
            'subtitle'  => esc_html__( 'The retina logo should be double (2x) of your original logo', 'wavee' ),
            'id'        => 'footer_retina_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => WAVEE_DIR_IMG.'/logo/logo2x.png'
            )
        ),
    )
));

// Footer settings
Redux::setSection('wavee_opt', array(
    'title'     => esc_html__('Footer Contents', 'wavee'),
    'id'        => 'footer_contents_sec',
    'icon'      => '',
    'subsection'=> true,
    'fields'    => array(

        array(
            'title'     => esc_html__('Title Text', 'wavee'),
            'id'        => 'footer_title',
            'type'      => 'editor',
            'args'    => array(
                'wpautop'       => true,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
            )
        ),

        array(
            'title'     => esc_html__('Copyright Text', 'wavee'),
            'id'        => 'copyright_txt',
            'type'      => 'editor',
            'default'   => 'Copyright © 2020 <a href="#">DroitThemes</a> | All rights reserved',
            'args'    => array(
                'wpautop'       => true,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
            )
        ),

    )
));

// Footer background
Redux::setSection('wavee_opt', array(
    'title'     => esc_html__('Background', 'wavee'),
    'id'        => 'wavee_footer_background',
    'icon'      => '',
    'subsection'=> true,
    'fields'    => array(

        array(
            'title'     => esc_html__('Background image', 'wavee'),
            'desc'      => esc_html__('The main footer background image', 'wavee'),
            'id'        => 'footer_bg_image',
            'type'      => 'media',
            'default'   => array(
                'url' => WAVEE_DIR_IMG.'/about/footer_png.png'
            )
        ),


        array(
            'title'     => esc_html__('Gradient Background color', 'wavee'),
            'id'        => 'footer_bg_color_sec',
            'type'      => 'color_gradient',
            'validate' => 'color',
            'default'  => array(
                'from' => '',
                'to'   => '',
            ),
        ),

    )
));
