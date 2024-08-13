<?php
//adds titles via wordpress automatically if no title tag
function ff_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('html5', array('style', 'script'));
    add_theme_support('automatic-feed-links');
}

add_action('after_setup_theme', 'ff-theme-support');


function ff_menu(){

    $locations = array(
        'main' => "Desktop Primary Top Menu Bar",
        'footer' => "Footer Menu Sitemap"
    );
    register_nav_menus($locations);
}

add_action('init', 'ff_menu');

//initialises stylesheets
function ff_register_stylesheets(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('ff-stylesheet', get_template_directory_uri() . "/style.css", array(), $version, 'all');

}

add_action('wp_enqueue_scripts', 'ff_register_styles');

//initialises js scripts
function ff_register_scripts()
{
   wp_enqueue_script('ff-javascript', get_template_directory_uri(). "/assets/js/script.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'ff_register_scripts');

function ff_widget_areas(){

    register_sidebar(
        array(
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '',
        'after_widget' => '',
        'name' => 'FooterMenu',
        'id' => 'footer-menu',
        'description' => 'Footer Widget'

        ));
}

add_action('widgets_init', ff_widget_areas());
?>


