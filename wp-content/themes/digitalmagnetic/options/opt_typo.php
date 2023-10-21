<?php

Redux::setSection('wavee_opt', array(
    'title'            => esc_html__( 'Typography', 'wavee' ),
    'id'               => 'wavee_typo_opt',
    'icon'             => 'dashicons dashicons-editor-textcolor',
    'fields'           => array(

        array(
            'id'        => 'body_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Body Typography', 'wavee'),
            'subtitle'  => esc_html__( 'These settings control the typography for all body text.', 'wavee'),
            'output'    => 'body'
        ),
    )
));


/*** Headers Typography ***/
Redux::setSection('wavee_opt', array(
    'title'            => esc_html__( 'Headers Typography', 'wavee' ),
    'id'               => 'headers_typo_opt',
    'icon'             => '',
    'subsection'       => true,
    'fields'           => array(
        array(
            'id'        => 'typo_note_headers',
            'type'      => 'info',
            'style'     => 'success',
            'title'     => esc_html__( 'Important Note:', 'wavee'),
            'icon'      => 'dashicons dashicons-info',
            'desc'      => esc_html__( 'This tab contains general typography options. Additional typography options for specific areas can be found within other tabs. Example: For menu typography options go to the Menu Settings tab.', 'wavee')
        ),

        array(
            'id'        => 'h1_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H1 Headers Typography', 'wavee'),
            'subtitle'  => esc_html__( 'These settings control the typography for all H1 Headers.', 'wavee'),
            'output'    => 'h1'
        ),

        array(
            'id'        => 'h2_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H2 Headers Typography', 'wavee'),
            'subtitle'  => esc_html__( 'These settings control the typography for all H2 Headers. The h2 title tag used in the most section title.', 'wavee'),
            'output'    => 'h2'
        ),
        array(
            'id'        => 'h3_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H3 Headers Typography', 'wavee'),
            'subtitle'  => esc_html__( 'These settings control the typography for all H3 Headers.', 'wavee'),
            'output'    => 'h3'
        ),

        array(
            'id'        => 'h4_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H4 Headers Typography', 'wavee'),
            'subtitle'  => esc_html__( 'These settings control the typography for all H4 Headers.', 'wavee'),
            'output'    => 'h4'
        ),

        array(
            'id'        => 'h5_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H5 Headers Typography', 'wavee'),
            'subtitle'  => esc_html__( 'These settings control the typography for all H5 Headers.', 'wavee'),
            'output'    => 'h5'
        ),

        array(
            'id'        => 'h6_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'H6 Headers Typography', 'wavee'),
            'subtitle'  => esc_html__( 'These settings control the typography for all H6 Headers.', 'wavee'),
            'output'    => 'h6'
        ),
    )
));