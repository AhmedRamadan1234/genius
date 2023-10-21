<?php
// Require widget files
require plugin_dir_path(__FILE__) . 'Wavee_widget_recent_comments.php';
require plugin_dir_path(__FILE__) . 'Wavee_widget_recent_post.php';


// Register Widgets
add_action('widgets_init', function() {
    register_widget('Wavee_widget_recent_comments');
    register_widget('Wavee_widget_recent_post');
});

