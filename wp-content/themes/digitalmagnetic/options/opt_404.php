<?php
Redux::setSection('wavee_opt', array(
    'title'     => esc_html__('404 Error Page', 'wavee'),
    'id'        => '404_0pt',
    'icon'      => 'dashicons dashicons-info',
    'fields'    => array(
        array(
            'title'     => esc_html__('Error Heading Text', 'wavee'),
            'id'        => 'error_heading',
            'type'      => 'text',
            'default'   => esc_html__("404", 'wavee')
        ),
        array(
            'title'     => esc_html__('Title', 'wavee'),
            'id'        => 'error_title',
            'type'      => 'text',
            'default'   => esc_html__("Oops, This Page Could Not Be Found!", 'wavee')
        ),
        array(
            'title'     => esc_html__('Subtitle', 'wavee'),
            'id'        => 'error_subtitle',
            'type'      => 'text',
            'default'   => esc_html__("We can't seem to find the page you're looking for", 'wavee')
        ),
        array(
            'title'     => esc_html__('Home button label', 'wavee'),
            'id'        => 'error_home_btn_label',
            'type'      => 'text',
            'default'   => esc_html__("Back to home", 'wavee')
        ),
        array(
            'title'     => esc_html__('Background Image', 'wavee'),
            'id'        => '404_bg',
            'type'      => 'media',
        ),
    )
));