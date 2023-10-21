<?php

add_filter('get_search_form', function($form) {
    $value = get_search_query() ? get_search_query() : '';
    $form = '<form action="'.esc_url(home_url("/")).'" class="search-form input-group">
                <input type="search" name="s" class="form-control widget_input" placeholder="'.esc_attr__('Search', 'wavee').'" value="'.esc_attr($value).'">
                <button type="submit"><i class="icon_search"></i></button>
             </form>';
    return $form;
});

