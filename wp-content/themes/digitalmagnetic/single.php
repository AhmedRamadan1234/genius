<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Digital Magnetic Agency
 */

get_header();
$opt = get_option('wavee_opt');

    $blog_post = function_exists('get_field') ? get_field('blog_single_post_style') : '';
    if ( !empty($blog_post) && $blog_post != 'default' ) {
        $blog_post_style = $blog_post;
    } else {
        $blog_post_style = !empty($opt['blog_post_style']) ? $opt['blog_post_style'] : '1';
    }
    get_template_part( 'template-parts/header_elements/blog-post', $blog_post_style );

get_footer();