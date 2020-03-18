<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

function custom_rest(){
  register_rest_field( 'members', 'function', $args = array(
    'get_callback' => function() { return get_field('function'); }
  ) );
  register_rest_field( 'members', 'department', $args = array(
    'get_callback' => function() { return get_field('department'); }
  ) );
}

add_action( 'rest_api_init', 'custom_rest' );

function asmi_post_types(){
  register_post_type( 'members', array(
    "supports"=> array("title", "custom-fields"),
    "public" => true,
    "show_in_rest" => true,
    "labels" => array(
      "name" => "Membri",
      "add_new_item" => "Add Member"
    ),
    'has_archive' => true,
    "menu_icon" => "dashicons-buddicons-buddypress-logo"
  ));
  register_post_type( 'projects', array(
    "supports"=> array("title", "custom-fields"),
    "public" => true,
    "show_in_rest" => true,
    "labels" => array(
      "name" => "Proiecte",
      "add_new_item" => "Add Project"
    ),
    "menu_icon" => "dashicons-book-alt"
  ));
  register_post_type( 'departments', array(
    "supports"=> array("title", "custom-fields"),
    "public" => true,
    "show_in_rest" => true,
    "labels" => array(
      "name" => "Departamente",
      "add_new_item" => "Add Department"
    ),
    'has_archive' => true,
    "menu_icon" => "dashicons-groups"
  ));
}

add_action('init', 'asmi_post_types');
