<?php

Redux::setSection('wavee_opt', array(
	'title'     => esc_html__( 'Blog', 'wavee' ),
	'id'        => 'blog_page',
	'icon'      => 'dashicons dashicons-admin-post',
));


// Blog Title Bar
Redux::setSection('wavee_opt', array(
	'title'     => esc_html__( 'Title-bar', 'wavee' ),
	'id'        => 'blog_titlebar_settings',
	'icon'      => '',
    'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Blog page title', 'wavee' ),
            'subtitle'  => esc_html__( 'Give here the blog page title', 'wavee' ),
            'desc'      => esc_html__( 'This text will be show on blog page banners', 'wavee' ),
            'id'        => 'blog_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Blog List', 'wavee' )
        ),

        array(
            'title'     => esc_html__( 'Background image', 'wavee' ),
            'subtitle'  => esc_html__( 'Upload here the background banner image for Blog page', 'wavee' ),
            'id'        => 'blog_bg_banner_img',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => WAVEE_DIR_IMG .'/banners/blog_banner.jpg'
            ),
        ),

        array(
            'title'     => esc_html__('Overlay background color', 'wavee'),
            'id'        => 'blog_banner_overlay_bg_color',
            'type'      => 'color_gradient',
            'validate' => 'color',
            'default'  => array(
                'from' => '',
                'to'   => '',
            ),
        ),

        array(
            'title'         => esc_html__( 'Title font properties', 'wavee' ),
            'id'            => 'blog_titlebar_title_typo',
            'type'          => 'typography',
            'google'        => true,
            'text-align'    => true,
            'output'        => '.breadcrumb_content h1',
            'preview'       => array(
                'always_display' => false
            )
        ),
	)
));


// Blog Archive
Redux::setSection('wavee_opt', array(
	'title'     => esc_html__( 'Blog archive', 'wavee' ),
	'id'        => 'blog_meta_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
		array(
			'title'     => esc_html__( 'Post meta', 'wavee' ),
			'subtitle'  => esc_html__( 'Show/hide post meta on blog archive page', 'wavee' ),
			'id'        => 'is_post_meta',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'wavee' ),
            'off'       => esc_html__( 'Hide', 'wavee' ),
            'default'   => '1',
		),

		array(
			'title'     => esc_html__( 'Post date', 'wavee' ),
			'id'        => 'is_post_meta_date',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'wavee' ),
            'off'       => esc_html__( 'Hide', 'wavee' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),

		array(
			'title'     => esc_html__( 'Post Author Name', 'wavee' ),
			'id'        => 'is_post_meta_author_name',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'wavee' ),
            'off'       => esc_html__( 'Hide', 'wavee' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),

		array(
			'title'     => esc_html__( 'Post category', 'wavee' ),
			'id'        => 'is_post_meta_cat',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'wavee' ),
            'off'       => esc_html__( 'Hide', 'wavee' ),
            'default'   => '1',
            'required' => array( 'is_post_meta', '=', 1 )
		),

	)
));



// Blog Single
Redux::setSection('wavee_opt', array(
	'title'     => esc_html__( 'Blog single', 'wavee' ),
	'id'        => 'blog_single_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(

        array(
            'title'     => esc_html__( 'Banner Style', 'wavee' ),
            'id'        => 'blog_banner_style',
            'type'      => 'select',
            'default'   => '1',
            'options'   => array(
                'options'   => array(
                    '1' => esc_html__( 'Style One', 'wavee' ),
                    '2' => esc_html__( 'Style Two', 'wavee' ),
                ),
            )
        ),

        array(
            'title'     => esc_html__( 'Post Style', 'wavee' ),
            'id'        => 'blog_post_style',
            'type'      => 'select',
            'default'   => '1',
            'options'   => array(
                '1' => esc_html__( 'Style One', 'wavee' ),
                '2' => esc_html__( 'Style Two', 'wavee' ),
            ),
        ),

		array(
			'title'     => esc_html__( 'Post Tag', 'wavee' ),
			'id'        => 'is_single_post_tag',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'wavee' ),
            'off'       => esc_html__( 'Hide', 'wavee' ),
            'default'   => '1'
		),

        array(
            'title'     => esc_html__( 'Social Share', 'wavee' ),
            'id'        => 'is_single_social_share',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'wavee' ),
            'off'       => esc_html__( 'Hide', 'wavee' ),
            'default'   => '1'
        ),

        array(
            'title'     => esc_html__( 'Button Title', 'wavee' ),
            'subtitle'  => esc_html__( 'Give here the blog post button label', 'wavee' ),
            'desc'      => esc_html__( 'This text will be changing button title', 'wavee' ),
            'id'        => 'read_more_btn',
            'type'      => 'text',
            'default'   => 'Read More'
        ),
	)
));
