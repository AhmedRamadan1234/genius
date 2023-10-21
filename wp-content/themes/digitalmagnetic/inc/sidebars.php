<?php
// Register Widget areas
add_action('widgets_init', function() {

    register_sidebar( array(
        'name'          => esc_html__('Primary Sidebar', 'wavee'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'wavee'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="widget sidebar_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar_title">',
        'after_title'   => '</h3>'
    ));

    if (class_exists( 'WooCommerce')) {
        register_sidebar(array(
            'name' => esc_html__( 'Shop sidebar', 'wavee' ),
            'description' => esc_html__( 'Place widgets here for WooCommerce shop page.', 'wavee' ),
            'id' => 'shop_sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="sidebar_title">',
            'after_title' => '</h3>'
        ));
    }

});
