<?php
/*
Plugin Name: Usage Example
Description: An example plugin that uses the extensible plugin example. Activate this to modify the behavior of the extensible plugin.
Version: 20171118
Author: Benjamin Intal @bfintal
Author URI: twitter.com/bfintal
License: MIT License
License URI: https://opensource.org/licenses/MIT
*/

add_filter( 'myplugin_get_posts_args', 'show_only_woocommerce_products' );
function show_only_woocommerce_products( $args ) {
    $args['post_type'] = 'product';
    return $args;
}
