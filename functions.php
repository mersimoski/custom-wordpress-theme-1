<?php 

// Adds dynamic title tag support

function customtheme_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
};


function customtheme_menus(){
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}
add_action('init', "customtheme_menus");



add_action('after_setup_theme', 'customtheme_theme_support');


function customtheme_register_styles() {
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('customtheme-style', get_template_directory_uri() . "/style.css", array("customtheme-bootstrap"), $version, "all");
    wp_enqueue_style('customtheme-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', "all");
    wp_enqueue_style('customtheme-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', "all");
}

add_action( 'wp_enqueue_scripts', 'customtheme_register_styles');

function customtheme_register_scripts() {
    $version = wp_get_theme()->get('Version');
    
    wp_enqueue_script('customtheme-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "3.4.1", true);
    wp_enqueue_script('customtheme-cdn', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "1.16.0", true);
    wp_enqueue_script('customtheme-bootstrapcdn', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "4.4.1", true);
    wp_enqueue_script('customtheme-main', get_template_directory_uri() . "/assets/js/main.js", array(), $version, true);
    
}

add_action( 'wp_enqueue_scripts', 'customtheme_register_scripts');

?>