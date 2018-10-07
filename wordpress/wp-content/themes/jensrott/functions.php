<?php 

/**
 * Proper way to enqueue scripts and styles
 */

 /* 
 Load in bootstrap
*/
function wpdocs_theme_name_scripts() {
    wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' );
    wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
    wp_enqueue_style( 'style', get_stylesheet_uri());
}

add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


/* Register Custom Navigation Walker */
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

/* 
 Register sidebar
*/
function textdomain_register_widgets() {
  /* Register the primary sidebar. */
  register_sidebar(
      array(
          'name' => __( 'Sidebar', 'textdomain' ),
          'id' => 'sidebar',
          'before_widget' => '<div class="sidebar-module">',
          'after_widget' => '</div>',
          'before_title' => '<h4>',
          'after_title' => '</h4>'
      )
  );
  /* Repeat register_sidebar() code for additional sidebars. */
}

add_action( 'widgets_init', 'textdomain_register_widgets' );

/* 
 Register custom header
*/
function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
  add_action( 'init', 'wpb_custom_new_menu' );

/* 
Post Types 
*/

/* Reviews */

// Post Type
function create_reviews_posttype() {
    
    $labels = array(
        // Label that will be used in the backend, to do crud operations.
        'name' => __('Reviews'),
        'array' => __('Reviews'),
        'singular_name' => __('Review'),
        'add_new' => __('Add New Review'),
        'all_items' => __('All Reviews'),
        'add_new_item' => __('Add New Review'),
        'edit_item' => __('Edit Review'),
    );

    $args = array(
        'description' => 'All the Reviews!',
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'capability_type' => 'post', // Take over everything that is already in post
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'except',
            'thumbnail',
            'revisions'
        ),
    
        'menu_position' => 5,
    );

    register_post_type('reviews', $args);
};

add_action('init', 'create_reviews_posttype');

/* Recipes */

// Post Type
function create_recipes_posttype() {

    $labels = array(
        'name' => __('Recipes'),
        'array' => __('Recipes'),
        'singular_name' => __('Recipes'),
        'add_new' => __('Add New Recipes'),
        'all_items' => __('All Recipes'),
        'add_new_item' => __('Add New Recipes'),
        'edit_item' => __('Edit Recipes'),
    );

    $args = array(
        'description' => 'All the recipes!',
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'capability_type' => 'post', // Take over everything that is already in post
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'except',
            'thumbnail',
            'revisions',
            'custom-fields'
        ),
        
        'menu_position' => 5,
        'exclude_from_search' => false
    );

    register_post_type('recipes', $args);
}

add_action('init', 'create_recipes_posttype');

// Categories taxonomy
function create_recipes_taxonomies() {

    // Categories
    $labels = array(
        'name'              => _x('Categories', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Category', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Recipe Categories', 'textdomain'),
        'all_items'         => __('All Recipe Categories', 'textdomain'),
        'parent_item'       => __('Parent Recipe Category', 'textdomain'),
        'parent_item_colon' => __('Parent Recipe Category:', 'textdomain'),
        'edit_item'         => __('Edit Recipe Category', 'textdomain'), 
        'update_item'       => __('Update Recipe Category', 'textdomain'),
        'add_new_item'      => __('Add New Recipe Category', 'textdomain'),
        'new_item_name'     => __('New Recipe Category', 'textdomain'),
        'menu_name'         => __('Categories', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
    );

    register_taxonomy('category', 'recipes', $args);

    // Allergens
    $labels = array(
        'name'              => _x('Allergens', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Allergens', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Recipe Allergens', 'textdomain'),
        'all_items'         => __('All Recipe Allergens', 'textdomain'),
        'parent_item'       => __('Parent Recipe Allergy', 'textdomain'),
        'parent_item_colon' => __('Parent Recipe Allergy:', 'textdomain'),
        'edit_item'         => __('Edit Recipe Allergy', 'textdomain'), 
        'update_item'       => __('Update Recipe Allergy', 'textdomain'),
        'add_new_item'      => __('Add New Recipe Allergy', 'textdomain'),
        'new_item_name'     => __('New Recipe Allergy', 'textdomain'),
        'menu_name'         => __('Allergy', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
    );

    register_taxonomy('allergens', 'recipes', $args);

    // Difficulties
    $labels = array(
        'name'              => _x('Difficulties', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Difficulties', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Recipe Difficulties', 'textdomain'),
        'all_items'         => __('All Recipe Difficulties', 'textdomain'),
        'parent_item'       => __('Parent Recipe Difficulty', 'textdomain'),
        'parent_item_colon' => __('Parent Recipe Difficulty:', 'textdomain'),
        'edit_item'         => __('Edit Recipe Difficulty', 'textdomain'), 
        'update_item'       => __('Update Recipe Difficulty', 'textdomain'),
        'add_new_item'      => __('Add New Recipe Difficulty', 'textdomain'),
        'new_item_name'     => __('New Recipe Difficulty', 'textdomain'),
        'menu_name'         => __('Difficulty', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
    );

    register_taxonomy('difficulties', 'recipes', $args);
}

add_action('init', 'create_recipes_taxonomies', 0);

/* Events */

// Post Type
function create_events_posttype() {

    $labels = array(
        'name' => __('Events'),
        'array' => __('Events'),
        'singular_name' => __('Events'),
        'add_new' => __('Add New Events'),
        'all_items' => __('All Events'),
        'add_new_item' => __('Add New Events'),
        'edit_item' => __('Edit Events'),
    );

    $args = array(
        'description' => 'All the events!',
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'capability_type' => 'post', // Take over everything that is already in post
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'except',
            'thumbnail',
            'revisions'
        ),
    
        'menu_position' => 5,
        'exclude_from_search' => false
    );
    register_post_type('events', $args);
}

add_action('init', 'create_events_posttype');

function create_events_taxonomies() {

    // Provincies
     $labels = array(
        'name'              => _x('Provinces', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Province', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Events Provinces', 'textdomain'),
        'all_items'         => __('All Events Provinces', 'textdomain'),
        'parent_item'       => __('Parent Events Province', 'textdomain'),
        'parent_item_colon' => __('Parent Events Province:', 'textdomain'),
        'edit_item'         => __('Edit Events Province', 'textdomain'), 
        'update_item'       => __('Update Events Province', 'textdomain'),
        'add_new_item'      => __('Add New Events Province', 'textdomain'),
        'new_item_name'     => __('New Events Province', 'textdomain'),
        'menu_name'         => __('Province', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
    );

    register_taxonomy('province', 'events', $args);

     // Setting
     $labels = array(
        'name'              => _x('Settings', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Setting', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Events Settings', 'textdomain'),
        'all_items'         => __('All Events Settings', 'textdomain'),
        'parent_item'       => __('Parent Events Setting', 'textdomain'),
        'parent_item_colon' => __('Parent Events Setting:', 'textdomain'),
        'edit_item'         => __('Edit Events Setting', 'textdomain'), 
        'update_item'       => __('Update Events Setting', 'textdomain'),
        'add_new_item'      => __('Add New Events Setting', 'textdomain'),
        'new_item_name'     => __('New Events Setting', 'textdomain'),
        'menu_name'         => __('Setting', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
    );

    register_taxonomy('setting', 'events', $args);


    // Tags
    $labels = array(
        'name'              => _x('Tags', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Tag', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Events Tags', 'textdomain'),
        'all_items'         => __('All Events Tags', 'textdomain'),
        'parent_item'       => __('Parent Events Tag', 'textdomain'),
        'parent_item_colon' => __('Parent Events Tag:', 'textdomain'),
        'edit_item'         => __('Edit Events Tag', 'textdomain'), 
        'update_item'       => __('Update Events Tag', 'textdomain'),
        'add_new_item'      => __('Add New Events Tag', 'textdomain'),
        'new_item_name'     => __('New Events Tag', 'textdomain'),
        'menu_name'         => __('Tags', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
    );

    register_taxonomy('tag', 'events', $args);
}

add_action('init', 'create_events_taxonomies', 0);