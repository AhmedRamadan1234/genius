<?php

Redux::setSection('wavee_opt', array(
	'title'     => esc_html__('Portfolio', 'wavee'),
	'id'        => 'portfolio_settings',
	'icon'      => 'dashicons dashicons-images-alt2',
	'fields'    => array(

        array(
            'title'     => esc_html__('Banner Style', 'wavee'),
            'subtitle'  => esc_html__('Select the default portfolio layout for portfolio details page', 'wavee'),
            'id'        => 'portfolio_banner_style',
            'type'      => 'select',
            'options'   => array(
                'style_01' => esc_html__('Style One', 'wavee'),
                'style_02' => esc_html__('Style Two', 'wavee'),
            ),
            'default'   => 'style_01'
        ),

		array(
			'title'     => esc_html__('Default Layout', 'wavee'),
			'subtitle'  => esc_html__('Select the default portfolio layout for portfolio details page', 'wavee'),
			'id'        => 'portfolio_layout',
			'type'      => 'select',
            'options'   => array(
                'top_img_bottom_contents' => esc_html__('Top Image Bottom Contents', 'wavee'),
                'left_img_right_contents' => esc_html__('Left Image Right Contents', 'wavee'),
                'top_img_bottom_contents2' => esc_html__('Top Images Bottom Contents 02', 'wavee'),
            ),
            'default'   => 'top_img_bottom_contents'
		),

		// Portfolio Share Options
		array(
            'id' => 'portfolio_share_start',
            'type' => 'section',
            'title' => __('Share Options', 'wavee'),
            'subtitle' => __('Enable/Disable social media share options as you want.', 'wavee'),
            'indent' => true
        ),

        array(
            'id'       => 'portfolio_share_options',
            'type'     => 'switch',
            'title'    => esc_html__('Share Options', 'wavee'),
            'default'  => true,
            'on'       => esc_html__('Show', 'wavee'),
            'off'      => esc_html__('Hide', 'wavee'),
        ),
        array(
            'id'       => 'portfolio_share_title',
            'type'     => 'text',
            'title'    => esc_html__('Title', 'wavee'),
            'default'  => esc_html__('Share', 'wavee'),
            'required' => array('portfolio_share_options','=','1'),
        ),
        array(
            'id'       => 'is_portfolio_fb',
            'type'     => 'switch',
            'title'    => esc_html__('Facebook', 'wavee'),
            'default'  => true,
            'required' => array('portfolio_share_options','=','1'),
            'on'       => esc_html__('Show', 'wavee'),
            'off'      => esc_html__('Hide', 'wavee'),
        ),
        array(
            'id'       => 'is_portfolio_twitter',
            'type'     => 'switch',
            'title'    => esc_html__('Twitter', 'wavee'),
            'default'  => true,
            'required' => array('portfolio_share_options','=','1'),
            'on'       => esc_html__('Show', 'wavee'),
            'off'      => esc_html__('Hide', 'wavee'),
        ),

        array(
            'id'       => 'is_portfolio_pinterest',
            'type'     => 'switch',
            'title'    => esc_html__('Pinterest', 'wavee'),
            'default'  => true,
            'required' => array('portfolio_share_options','=','1'),
            'on'       => esc_html__('Show', 'wavee'),
            'off'      => esc_html__('Hide', 'wavee'),
        ),

        array(
            'id'       => 'is_portfolio_linkedin',
            'type'     => 'switch',
            'title'    => esc_html__('Linkedin', 'wavee'),
            'default'  => true,
            'required' => array('portfolio_share_options','=','1'),
            'on'       => esc_html__('Show', 'wavee'),
            'off'      => esc_html__('Hide', 'wavee'),
        ),

        array(
            'id'     => 'portfolio_share_end',
            'type'   => 'section',
            'indent' => false,
        ),
	)
));

