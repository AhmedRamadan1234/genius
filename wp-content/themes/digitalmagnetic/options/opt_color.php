<?php

// Color option
Redux::setSection('wavee_opt', array(
	'title'     => esc_html__('Color', 'wavee'),
	'id'        => 'color',
	'icon'      => 'dashicons dashicons-admin-appearance',
	'fields'    => array(

        array(
            'id'          => 'primary_accent_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Primary Accent Color', 'wavee' ),
            'output'      => array(
                'color' => '
                    .menu > .nav-item.submenu .dropdown-menu .nav-item .nav-link:hover, .menu > .nav-item.submenu .dropdown-menu .nav-item.active .nav-link,
                    .gallery_filter li.active, .gallery_filter li:hover, .gallery_inner_four .gallery_item .gallery_post .gallery_content h3:hover,
                    .gallery_inner_four .gallery_item .gallery_post .gallery_content .g_tag:hover, .blog_list_content h2:hover,
                    .read_btn:hover, .comment_btn:hover, .pagination .page-numbers:hover, .pagination .page-numbers.current,
                    .p_comment_list .post_comment .comment_post .media-body .reply:hover, .widget_categorie ul li a:hover, .widget_categorie ul li .dropdown-menu li a:hover,
                    .widget_post .post_item .media-body h5:hover, .contact_info_item a:hover, .widget_categories ul li.cat-item:hover,.widget_categories ul li.cat-item:hover a,
                    .widget_archive ul li a:hover, .widget_archive ul li a:hover, .widget_tag_cloud .tagcloud .tag-cloud-link:hover, 
                    .widget_recent_entries ul li a:hover, .widget_recent_entries ul li a:hover, .widget_meta ul li a:hover, .widget_meta ul li a:hover,
                    .widget_recent_comments li.recentcomments a:hover, .calendar_wrap #wp-calendar a:hover, .widget.widget_pages ul li a:hover,
                    .widget_nav_menu ul li a:hover, .comment_post .media-body p a:hover, .blog_details_area ul li a:hover, figcaption a:hover,
                    blockquote.wp-block-quote strong em a:hover, .wp-block-file a:hover, .blog_details footer.wp-block-latest-comments__comment-meta a:hover,
                    .blog_details p a:hover, .widget_archive ul li:hover,.widget_archive ul li:hover a, .navbar_fixed .logo_info .navbar-brand h3
                    ',

                'background-color' => '
                   .p_tag a, .pagination .page-numbers:before, .p_tag a:nth-child(odd)
                    ',

                'border-color' => '
                    .widget_search .search-form input:focus, .widget_tag_cloud .tagcloud .tag-cloud-link:hover, .post_social_info .tags a.tag:hover
                    ',


            ),
        ),

        array (
            'id'       => 'secondary_accent_color',
            'type'     => 'color_gradient',
            'title'    => __('Background Gradient Color', 'wavee'),
            'validate' => 'color',
            'default'  => array(
                'from' => '',
                'to'   => '',
            ),


        )

	)
));

