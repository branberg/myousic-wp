<?php
/*********************************************************************************************************
REGISTER VIDEO POST TYPE
*********************************************************************************************************/
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
		'supports'            => array( '', ),
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
		'publicly_queryable'  => false,
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


/*********************************************************************************************************
DO CUSTOM COLUMNS IN ADMIN FOR SHOWS CPT
*********************************************************************************************************/
//Redefine the columns
add_filter( 'manage_edit-videos_columns', 'myousic_custom_videos_page_columns' );

function myousic_custom_videos_page_columns($columns) {
  $columns = array(
    'cb'       		=> '<input type="checkbox" />',
    'videotitle'	=> 'Video Title',
    'videourl'  	=> 'Feature URL',
    'date'				=> 'Date',
  );
  return $columns;
}

//display newly defined columns
add_action( 'manage_videos_posts_custom_column', 'myousic_custom_videos_columns');

function myousic_custom_videos_columns($column) {
  global $post;

  switch($column) {

    case 'videotitle':
      if( get_field('video_title') ){
        echo '<a href="'.get_edit_post_link().'">' . get_field('video_title') . '</a>';
      } else {
        echo '<a href="'.get_edit_post_link().'"><em>No title set</em></a>';
      }
      break;

    case 'videourl':
      if( get_field('video_url') ){
        echo '<a href="'.get_field('video_url').'" target="_blank">' . get_field('video_url') . ' <div class="dashicons dashicons-share-alt2"></div></a>';
      } else {
        echo '<em>No URL set</em>';
      }
      break;

  }

}