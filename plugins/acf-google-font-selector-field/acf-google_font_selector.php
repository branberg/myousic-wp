<?php
/*
Plugin Name: Advanced Custom Fields: Google Font Selector
Plugin URI: https://github.com/danielpataki/acf-google_font_selector
Description: A field for Advanced Custom Fields which allows users to select Google fonts with advanced options
Version: 1.0.0
Author: Daniel Pataki
Author URI: http://danielpataki.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


class acf_field_google_font_selector_plugin
{
	/*
	*  Construct
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	function __construct()
	{
		// set text domain
		/*
		$domain = 'acf-google_font_selector';
		$mofile = trailingslashit(dirname(__File__)) . 'lang/' . $domain . '-' . get_locale() . '.mo';
		load_textdomain( $domain, $mofile );
		*/


		// version 4+
		add_action('acf/register_fields', array($this, 'register_fields'));


		// version 3-
		add_action('init', array( $this, 'init' ), 5);
	}


	/*
	*  Init
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	function init()
	{
		if(function_exists('register_field'))
		{
			register_field('acf_field_google_font_selector', dirname(__File__) . '/google_font_selector-v3.php');
		}
	}

	/*
	*  register_fields
	*
	*  @description:
	*  @since: 3.6
	*  @created: 1/04/13
	*/

	function register_fields()
	{
		include_once('google_font_selector-v4.php');
	}

}

new acf_field_google_font_selector_plugin();

?>
