<?php
Redux::setSection( 'wavee_opt', array(
    'title'            => esc_html__( 'Preloader', 'wavee' ),
    'id'               => 'preloader_opt',
    'icon'             => 'dashicons dashicons-controls-repeat',
    'fields'           => array(

        array(
            'id'      => 'is_preloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Pre-loader', 'wavee' ),
            'on'      => esc_html__( 'Enable', 'wavee' ),
            'off'     => esc_html__( 'Disable', 'wavee' ),
            'default' => true,
        ),

        array(
            'title'     => esc_html__( 'Color', 'wavee' ),
            'id'        => 'preloader_color',
            'type'      => 'color',
            'output'    => array( '.loader .loader-counter' ),
            'required'  => array( 'is_preloader', '=', '1' ),
        ),

        array(
            'title'     => esc_html__( 'Background Color', 'wavee' ),
            'id'        => 'preloader_bg_color',
            'type'      => 'color',
            'mode'      => 'background',
            'output'    => array( '.preloader .loader' ),
            'required'  => array( 'is_preloader', '=', '1' ),
        ),

        array(
            'title'         => esc_html__( 'Typography', 'wavee' ),
            'id'            => 'pre_loader_typo',
            'type'          => 'typography',
            'text-align'    => false,
            'color'         => false,
            'output'        => '.loader .loader-counter',
            'required'      => array( 'is_preloader', '=', '1' ),
        ),
    )
));