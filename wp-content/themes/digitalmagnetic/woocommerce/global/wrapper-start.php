<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$opt = get_option( 'wavee_opt' );
$layout = !empty($opt['shop_layout']) ? $opt['shop_layout'] : '';
$view_style = !empty($_GET['view']) ? $_GET['view'] : $layout;

if ($view_style == 'grid' ) {
    $is_grid_classes = 'shop_area';
}elseif ($view_style == 'shop_grid' ) {
    $is_grid_classes = 'shop_area';
}else {
    $is_grid_classes = '';
}

if ($view_style == 'list' ) {
    $is_list_classes = 'shop_list_area';
}elseif ($view_style == 'shop_list' ) {
    $is_list_classes = 'shop_list_area';
}else {
    $is_list_classes = '';
}

$template = wc_get_theme_slug_for_templates();

if ( is_shop() || is_tax( 'product_cat')) {
    echo '<section class="'.esc_attr($is_grid_classes . $is_list_classes ).' sec_pad">';
}
elseif (is_singular( 'product')) {
    echo '<section class="product_details_area sec_pad">';
}

echo '<div class="container">';