<?php
if ( ! defined('VERSION')) {
    define( 'VERSION', '1.0.0');
}

function mysite_scripts() 
{
    // Style
    wp_enqueue_style('mysite-style', get_stylesheet_uri());

    wp_enqueue_style('mysite-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', '', VERSION, '' );
    wp_enqueue_script('mysite-bundlejs', get_template_directory_uri() . '/dist/app.js', array(), VERSION, true);
    
}
add_action('wp_enqueue_scripts', 'mysite_scripts');