<?php
defined( 'ABSPATH' ) || exit;



if ( ! function_exists('hms_team_cpt') ) {

// Register Custom Post Type
function hms_team_cpt() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'hms-team-cpt' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'hms-team-cpt' ),
		'menu_name'             => __( 'Team Members', 'hms-team-cpt' ),
		'name_admin_bar'        => __( 'Team Member', 'hms-team-cpt' ),
		'archives'              => __( 'Team Member Archives', 'hms-team-cpt' ),
		'attributes'            => __( 'Team Member Attributes', 'hms-team-cpt' ),
		'parent_item_colon'     => __( 'Parent Team:', 'hms-team-cpt' ),
		'all_items'             => __( 'All Team Members', 'hms-team-cpt' ),
		'add_new_item'          => __( 'Add New Team Member', 'hms-team-cpt' ),
		'add_new'               => __( 'Add New Team Member', 'hms-team-cpt' ),
		'new_item'              => __( 'New Team Member', 'hms-team-cpt' ),
		'edit_item'             => __( 'Edit Team Member', 'hms-team-cpt' ),
		'update_item'           => __( 'Update Team Member', 'hms-team-cpt' ),
		'view_item'             => __( 'View Team Member', 'hms-team-cpt' ),
		'view_items'            => __( 'View Team Members', 'hms-team-cpt' ),
		'search_items'          => __( 'Search Team Member', 'hms-team-cpt' ),
		'not_found'             => __( 'Team Member Not found', 'hms-team-cpt' ),
		'not_found_in_trash'    => __( 'Team Member Not found in Trash', 'hms-team-cpt' ),
		'featured_image'        => __( 'Featured Image', 'hms-team-cpt' ),
		'set_featured_image'    => __( 'Set featured image', 'hms-team-cpt' ),
		'remove_featured_image' => __( 'Remove featured image', 'hms-team-cpt' ),
		'use_featured_image'    => __( 'Use as featured image', 'hms-team-cpt' ),
		'insert_into_item'      => __( 'Insert into Team Member', 'hms-team-cpt' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team Member', 'hms-team-cpt' ),
		'items_list'            => __( 'Team Members list', 'hms-team-cpt' ),
		'items_list_navigation' => __( 'Team Members list navigation', 'hms-team-cpt' ),
		'filter_items_list'     => __( 'Filter Team Members list', 'hms-team-cpt' ),
	);

	$args = array(
		'label'                 => __( 'Team Member', 'hms-team-cpt' ),
		'description'           => __( 'Post Type Description', 'hms-team-cpt' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'            => array( 'departments' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
    'show_in_rest'          => true, // Important for Gutenberg
	);

  register_post_type( 'team_members', $args );
  }
}
add_action( 'init', 'hms_team_cpt', 0 );
