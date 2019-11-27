<?php

function addCustomThemeFiles_blackSheep(){

    wp_enqueue_style('bootstrapCSSBlackSheep', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.3.1', 'all');
    wp_enqueue_style('customCSSBlackSheep', get_template_directory_uri() . '/assets/css/style.min.css', array(), '0.0.1', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapJSBlackSheep', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('customJSBlackSheep', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), '0.0.1', true);
};

add_action('wp_enqueue_scripts', 'addCustomThemeFiles_blackSheep');

function addCustomMenus_blackSheep(){
    add_theme_support('menus');
    register_nav_menu('top_navigation', __('The Top Navigation is the navigation located at the top of each page.', 'blackSheepCustom'));

    register_nav_menu('side_navigation', __('The Side navigation is the navigation located at the side of each page', 'blackSheepCustom'));
}

add_action('after_setup_theme', 'addCustomMenus_blackSheep');

function register_navwalker(){
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action( 'after_setup_theme', 'register_navwalker' );

register_default_headers( array(
    'defaultImage' => array(
        'url'           => get_template_directory_uri() . '/assets/images/the-black-sheep.jpg',
        'thumbnail_url' => get_template_directory_uri() . '/assets/images/the-black-sheep.jpg',
        'description'   => __( 'The default image for the custom header.', 'blackSheepCustom' )
    )
) );

$customeHeaderDefaults = array(
    'width' => 1280,
    'height' => 720,
    'default-image' => get_template_directory_uri() . '/assets/images/the-black-sheep.jpg'
);
add_theme_support('custom-header', $customeHeaderDefaults);

add_theme_support('wp-block-styles');

require_once get_template_directory() . '/inc/customizer.php';
