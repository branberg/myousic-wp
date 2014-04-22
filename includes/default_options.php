<?php

function updateoptionkeys() {
	$fields = array (

		/** EXAMPLES

		//background options
		"field_534575addbe8c"	=> 'Fullscreen',
		"field_5345762adbe8f"	=> '#ffffff', //bg overlay color
		"field_53457641dbe90"	=> '90', //bg overlay opacity

		//social icons
		"field_534579d0ada8d"	=> array(
			array( 'social_network' => 'facebook', 'link_url' => 'http://facebook.com' ),
			array( 'social_network' => 'twitter', 'link_url' => 'http://twitter.com' ),
			array( 'social_network' => 'soundcloud', 'link_url' => 'http://soundcloud.com' )
		),

		//mailing list
		"field_534574934f4c8"	=> 'Off', //mailing list visibility

		**/

	); 

	foreach ($fields as $key=>$value) { 

		$existence = get_field_object($key);

		if (!get_field($existence['name'], "options")) {
			update_field($key, $value, "options");
		}

	} 
}

function myactivationfunction($oldname, $oldtheme=false) {
	updateoptionkeys();
}

add_action("after_switch_theme", "myactivationfunction");