<?php
// Register Custom Post Type
function myousic_cpt_videos() {

	$labels = array(
		'name'                => _x( 'Videos', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Videos', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Video:', 'text_domain' ),
		'all_items'           => __( 'All Videos', 'text_domain' ),
		'view_item'           => __( 'View Video', 'text_domain' ),
		'add_new_item'        => __( 'Add New Video', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Video', 'text_domain' ),
		'update_item'         => __( 'Update Video', 'text_domain' ),
		'search_items'        => __( 'Search Videos', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'videos', 'text_domain' ),
		'description'         => __( 'A collection of videos', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'videos', $args );

}

// Hook into the 'init' action
add_action( 'init', 'myousic_cpt_videos', 0 );

//add custom menu icon
function myousic_cpt_icon_videos(){
?>

<style>
#adminmenu .menu-icon-videos div.wp-menu-image:before {
  content: "\f236";
}
</style>

<?php
}
add_action( 'admin_head', 'myousic_cpt_icon_videos' );