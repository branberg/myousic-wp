<?php
/*********************************************************************************************************
REGISTER POST TYPE
*********************************************************************************************************/
function myousic_cpt_shows() {

	$labels = array(
		'name'                => _x( 'Shows', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Show', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Shows', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Show:', 'text_domain' ),
		'all_items'           => __( 'All Shows', 'text_domain' ),
		'view_item'           => __( 'View Show', 'text_domain' ),
		'add_new_item'        => __( 'Add New Show', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Show', 'text_domain' ),
		'update_item'         => __( 'Update Show', 'text_domain' ),
		'search_items'        => __( 'Search Shows', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'shows', 'text_domain' ),
		'description'         => __( 'A collection of shows', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( '' ), //wow, much custom, many fields
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
	register_post_type( 'shows', $args );

}

// Hook into the 'init' action
add_action( 'init', 'myousic_cpt_shows', 0 );

//add custom menu icon
function myousic_cpt_icon_shows(){
?>

<style>
#adminmenu .menu-icon-shows div.wp-menu-image:before {
  content: "\f231";
}
</style>

<?php
}
add_action( 'admin_head', 'myousic_cpt_icon_shows' );


/*********************************************************************************************************
DO CUSTOM COLUMNS IN ADMIN FOR SHOWS CPT
*********************************************************************************************************/
//Redefine the columns
add_filter( 'manage_edit-shows_columns', 'myousic_custom_shows_page_columns' );

function myousic_custom_shows_page_columns($columns) {
  $columns = array(
    'cb'        => '<input type="checkbox" />',
    'showdate'  => 'Show Date',
    'venue'     => 'Venue',
    'location'  => 'Location',
    'showdesc'	=> 'Description',
  );
  return $columns;
}

//display newly defined columns
add_action( 'manage_shows_posts_custom_column', 'myousic_custom_shows_columns');

function myousic_custom_shows_columns($column) {
  global $post;

  switch($column) {

    case 'showdate':
      if( get_field('date') ){
        $date = get_field('date'); //grab date value from page
        $y = substr( $date, 0, 4 ); //create vars of each val
        $m = substr( $date, 4, 2 );
        $d = substr( $date, 6, 2 );
        $time = strtotime( "{$y}-{$m}-{$d}" ); //restring into php < 5.3 friendly values
        echo '<a href="'.get_edit_post_link().'"><strong>' . date( 'm/d/Y', $time ) . '</strong></a>';
      } else {
        echo '<a href="'.get_edit_post_link().'"><em>No date set</em></a>';
      }
      break;

    case 'venue':
      if( get_field('venue') ){
        echo '<a href="'.get_edit_post_link().'">' . get_field('venue') . '</a>';
      } else {
        echo '<a href="'.get_edit_post_link().'"><em>No venue set</em></a>';
      }
      break;

    case 'location':
      if( get_field('location') ){
        echo '<a href="'.get_edit_post_link().'">' . get_field('location') . '</a>';
      } else {
        echo '<a href="'.get_edit_post_link().'"><em>No location set</em></a>';
      }
      break;

    case 'showdesc':
    	if( get_field('show_description') ){
        echo wp_trim_words( get_field('show_description'), 30 );
      } else {
        echo '<em>No description set</em>';
      }
      break;

  }

}