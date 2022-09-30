<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////
// Create Custom Post Type ///////////////////////////////////////////////////////////////////////////



// Slideshow //////////////////////////////////////////
add_action( 'init', 'slideshow_init',0 );
function slideshow_init() {
    
    $labels = array(
        'name'               => __( 'Slideshows', 'post type general name', 'eventmana' ),
        'singular_name'      => __( 'Slide', 'post type singular name', 'eventmana' ),
        'menu_name'          => __( 'Slideshows', 'admin menu', 'eventmana' ),
        'name_admin_bar'     => __( 'Slide', 'add new on admin bar', 'eventmana' ),
        'add_new'            => __( 'Add New slide', 'Slide', 'eventmana' ),
        'add_new_item'       => __( 'Add New Slide', 'eventmana' ),
        'new_item'           => __( 'New Slide', 'eventmana' ),
        'edit_item'          => __( 'Edit Slide', 'eventmana' ),
        'view_item'          => __( 'View Slide', 'eventmana' ),
        'all_items'          => __( 'All Slides', 'eventmana' ),
        'search_items'       => __( 'Search Slides', 'eventmana' ),
        'parent_item_colon'  => __( 'Parent Slides:', 'eventmana' ),
        'not_found'          => __( 'No Slides found.', 'eventmana' ),
        'not_found_in_trash' => __( 'No Slides found in Trash.', 'eventmana' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-format-gallery',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slideshow' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail','comments'),
        'taxonomies'          => array('slidegroup'),
    );

    register_post_type( 'slideshow', $args );
}


add_action( 'init', 'create_slidegroup_taxonomies', 0 );
// create slidegroup taxonomy
function create_slidegroup_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Group', 'taxonomy general name' , 'eventmana'),
        'singular_name'     => __( 'Group', 'taxonomy singular name' , 'eventmana'),
        'search_items'      => __( 'Search Group', 'eventmana'),
        'all_items'         => __( 'All Group', 'eventmana' ),
        'parent_item'       => __( 'Parent Group', 'eventmana' ),
        'parent_item_colon' => __( 'Parent Group:' , 'eventmana'),
        'edit_item'         => __( 'Edit Group' , 'eventmana'),
        'update_item'       => __( 'Update Group' , 'eventmana'),
        'add_new_item'      => __( 'Add New Group' , 'eventmana'),
        'new_item_name'     => __( 'New Group Name' , 'eventmana'),
        'menu_name'         => __( 'Group' , 'eventmana'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'slideshow' )
    );

    register_taxonomy( 'slidegroup', array('slideshow'), $args );
}


// Event //////////////////////////////////////////
add_action( 'init', 'event_init',0 );
function event_init() {
    
    $labels = array(
        'name'               => __( 'Event', 'post type general name', 'eventmana' ),
        'singular_name'      => __( 'Event', 'post type singular name', 'eventmana' ),
        'menu_name'          => __( 'Events', 'admin menu', 'eventmana' ),
        'name_admin_bar'     => __( 'Event', 'add new on admin bar', 'eventmana' ),
        'add_new'            => __( 'Add New Event', 'Event', 'eventmana' ),
        'add_new_item'       => __( 'Add New Event', 'eventmana' ),
        'new_item'           => __( 'New Event', 'eventmana' ),
        'edit_item'          => __( 'Edit Event', 'eventmana' ),
        'view_item'          => __( 'View Event', 'eventmana' ),
        'all_items'          => __( 'All Events', 'eventmana' ),
        'search_items'       => __( 'Search Events', 'eventmana' ),
        'parent_item_colon'  => __( 'Parent Events:', 'eventmana' ),
        'not_found'          => __( 'No Events found.', 'eventmana' ),
        'not_found_in_trash' => __( 'No Events found in Trash.', 'eventmana' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-format-gallery',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'event' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail','comments', 'excerpt'),
        'taxonomies'          => array('eventgroup'),
    );

    register_post_type( 'event', $args );
}


add_action( 'init', 'create_eventgroup_taxonomies', 0 );
// create slidegroup taxonomy
function create_eventgroup_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Group', 'taxonomy general name' , 'eventmana'),
        'singular_name'     => __( 'Group', 'taxonomy singular name' , 'eventmana'),
        'search_items'      => __( 'Search Group', 'eventmana'),
        'all_items'         => __( 'All Group', 'eventmana' ),
        'parent_item'       => __( 'Parent Group', 'eventmana' ),
        'parent_item_colon' => __( 'Parent Group:' , 'eventmana'),
        'edit_item'         => __( 'Edit Group' , 'eventmana'),
        'update_item'       => __( 'Update Group' , 'eventmana'),
        'add_new_item'      => __( 'Add New Group' , 'eventmana'),
        'new_item_name'     => __( 'New Group Name' , 'eventmana'),
        'menu_name'         => __( 'Group' , 'eventmana'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'eventgroup' )
    );

    register_taxonomy( 'eventgroup', array('event'), $args );
}






// Schedule /////////////////////////////////////////////////////////
add_action( 'init', 'schedule_post_type', 0 );
function schedule_post_type() {

    $labels = array(
        'name'                => __( 'Schedule', 'Post Type General Name', 'eventmana' ),
        'singular_name'       => __( 'Schedule', 'Post Type Singular Name', 'eventmana' ),
        'menu_name'           => __( 'Schedule', 'eventmana' ),
        'parent_item_colon'   => __( 'Parent Schedule:', 'eventmana' ),
        'all_items'           => __( 'All Schedules', 'eventmana' ),
        'view_item'           => __( 'View Schedule', 'eventmana' ),
        'add_new_item'        => __( 'Add New Schedule', 'eventmana' ),
        'add_new'             => __( 'Add New Schedule', 'eventmana' ),
        'edit_item'           => __( 'Edit Schedule', 'eventmana' ),
        'update_item'         => __( 'Update Schedule', 'eventmana' ),
        'search_items'        => __( 'Search Schedules', 'eventmana' ),
        'not_found'           => __( 'No Schedules found', 'eventmana' ),
        'not_found_in_trash'  => __( 'No Schedules found in Trash', 'eventmana' ),
    );
    $args = array(
        'label'               => __( 'schedule', 'eventmana' ),
        'description'         => __( 'Schedule information pages', 'eventmana' ),
        'labels'              => $labels,
        'supports'            => array( 'thumbnail', 'editor', 'title', 'comments','excerpt'),
        'taxonomies'          => array('categories'),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'menu_icon'          => 'dashicons-calendar',
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,        
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'schedule', $args );
}

add_action( 'init', 'create_schedule_taxonomies', 0 );
// create categories taxonomy
function create_schedule_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => __( 'Categories', 'taxonomy general name' , 'eventmana'),
        'singular_name'     => __( 'Categories', 'taxonomy singular name' , 'eventmana'),
        'search_items'      => __( 'Search Categories', 'eventmana'),
        'all_items'         => __( 'All Categories', 'eventmana' ),
        'parent_item'       => __( 'Parent Category', 'eventmana' ),
        'parent_item_colon' => __( 'Parent Category:' , 'eventmana'),
        'edit_item'         => __( 'Edit Category' , 'eventmana'),
        'update_item'       => __( 'Update Category' , 'eventmana'),
        'add_new_item'      => __( 'Add New Category' , 'eventmana'),
        'new_item_name'     => __( 'New Category Name' , 'eventmana'),
        'menu_name'         => __( 'Categories' , 'eventmana'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'schedule' )        
    );

    register_taxonomy( 'categories', array('schedule'), $args );
}

