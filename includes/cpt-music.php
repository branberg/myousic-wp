<?php
/*********************************************************************************************************
REGISTER MUSIC POST TYPE
*********************************************************************************************************/
function myousic_cpt_music() {

	$labels = array(
		'name'                => _x( 'Music', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Music', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Music', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Music:', 'text_domain' ),
		'all_items'           => __( 'All Music', 'text_domain' ),
		'view_item'           => __( 'View Music', 'text_domain' ),
		'add_new_item'        => __( 'Add New Music', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Music', 'text_domain' ),
		'update_item'         => __( 'Update Music', 'text_domain' ),
		'search_items'        => __( 'Search Music', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'music', 'text_domain' ),
		'description'         => __( 'A collection of music', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( '' ),
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
	register_post_type( 'music', $args );

}

// Hook into the 'init' action
add_action( 'init', 'myousic_cpt_music', 0 );

//add custom menu icon
function myousic_cpt_icon_music(){
?>

<style>
#adminmenu .menu-icon-music div.wp-menu-image:before {
  content: "\f127";
}
</style>

<?php
}
add_action( 'admin_head', 'myousic_cpt_icon_music' );


/*********************************************************************************************************
DO CUSTOM COLUMNS IN ADMIN FOR SHOWS CPT
*********************************************************************************************************/
//Redefine the columns
add_filter( 'manage_edit-music_columns', 'myousic_custom_music_page_columns' );

function myousic_custom_music_page_columns($columns) {
  $columns = array(
    'cb'        				=> '<input type="checkbox" />',
    'musictitle'  			=> 'Music Title',
    'musicdescription'	=> 'Description',
    'featuretype'  			=> 'Feature Type',
    'date'							=> 'Date',
  );
  return $columns;
}

//display newly defined columns
add_action( 'manage_music_posts_custom_column', 'myousic_custom_music_columns');

function myousic_custom_music_columns($column) {
  global $post;

  switch($column) {

    case 'musictitle':
      if( get_field('feature_title') ){
        echo '<a href="'.get_edit_post_link().'">' . get_field('feature_title') . '</a>';
      } else {
        echo '<a href="'.get_edit_post_link().'"><em>No title set</em></a>';
      }
      break;

    case 'musicdescription':
      if( get_field('feature_description') ){
        echo wp_trim_words( get_field('feature_description'), 30 );
      } else {
        echo '<em>No description set</em>';
      }
      break;

    case 'featuretype':
      if( get_field('feature_type') ){
        echo get_field('feature_type');
      } else {
        echo '<em>No type set</em>';
      }
      break;

  }

}