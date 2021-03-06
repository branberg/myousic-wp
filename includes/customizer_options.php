<?php

function myousic_sanitize_text ($input) {
	return wp_kses_post( force_balance_tags($input) );
}
function myousic_sanitize_overlay_opacity( $input ) {

	if( is_numeric($input) ){
		return $input;
	} else {
		return '';
	}

}

function myousic_theme_customizer( $wp_customize ) {

	// Let's create a custom class to use a cooler number field for the opacity
	class Example_Customize_Number_Control extends WP_Customize_Control {
		public $type = 'number';

		public function render_content() {
			?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<input type="number" <?php $this->link(); ?> min="0" max="100" step="1" value="<?php echo intval( $this->value() ); ?>" style="width:98%;" />
				</label>
			<?php
		}
	}

	/****************************************************

		THEME CUSTOMIZER OPTIONS

		1. Logo
			a. Logo Text
			b. Logo Text Color
			c. Logo Image
			d. Favicon Image

		2. Header Image
			a. Default Header Image fields
			b. Image Overlay Color
			c. Image overlay opacity

		3. Navigation

		4. Colors
			a. Menu Link Color
			b. Menu link hover color
			c. Dropdown menu background color
			d. Website background color
			e. Heading font color
			f. Main text color
			g. Link color
			h. Footer Background color
			i. Footer text color

		5. Typography
			a. Heading font
			b. Body font

		6. Music Embeds
			a. Embed background color
			b. Embed title color
			c. Embed text color
			d. Embed button background color

		7. News Sections
			a. Read more button background

		8. Shows Sections

		9. Videos
			a. Video background color
			b. Video text color (title)

		10. Photos Sections

		11. Text Sections

		12. Contact Page

	****************************************************/


	/****************************************************

	1. Logo

	****************************************************/
	$wp_customize->add_section(
		'logo_section',
		array(
			'title' => 'Logo',
			'description' => 'Settings for the logo section.',
			'priority' => 1,
		)
	);

		/****************************************************
		1a. Logo Text
		****************************************************/
		$wp_customize->add_setting(
			'logo_text',
			array(
				'default' => get_bloginfo('name'),
				'sanitize_callback' => 'myousic_sanitize_text'
			)
		);
		$wp_customize->add_control(
		'logo_text',
			array(
				'label' => 'Logo Text',
				'section' => 'logo_section',
				'type' => 'text',
			)
		);

		/****************************************************
		1b. Logo Text Color
		****************************************************/
		$wp_customize->add_setting(
			'logo_text_color',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'logo_text_color',
				array(
					'label' => 'Text Logo Color',
					'section' => 'logo_section',
					'settings' => 'logo_text_color',
				)
			)
		);

		/****************************************************
		1c. Logo Image
		****************************************************/
		$wp_customize->add_setting( 'logo_image' );
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'logo_image',
				array(
					'label' => 'Logo Image',
					'section' => 'logo_section',
					'settings' => 'logo_image'
				)
			)
		);

		/****************************************************
		1c. Favicon Image
		****************************************************/
		$wp_customize->add_setting( 'favicon_image' );
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'favicon_image',
				array(
					'label' => 'Favicon Image',
					'section' => 'logo_section',
					'settings' => 'favicon_image'
				)
			)
		);


	/****************************************************

	2. Header Image

	****************************************************/
	$wp_customize->add_section(
		'header_image_settings',
		array(
			'title' => 'Header Image',
			'description' => 'Change the image, overlay color and overlay opacity.',
			'priority' => 2,
		)
	);

		/****************************************************
		2a. Default Header Image fields
		****************************************************/
		$wp_customize->add_setting( 'custom_header_image' );
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'custom_header_image',
				array(
					'label' => 'Header Image',
					'section' => 'header_image_settings',
					'settings' => 'custom_header_image',
					'priority' => 1
				)
			)
		);

		/****************************************************
		2b. Header Image Overlay Color
		****************************************************/
		$wp_customize->add_setting(
			'header_image_overlay_color',
			array(
				'default' => '#00243b',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'header_image_overlay_color',
				array(
					'label' => 'Header Image Overlay Color',
					'section' => 'header_image_settings',
					'settings' => 'header_image_overlay_color',
					'priority' => 2
				)
			)
		);

		/****************************************************
		2c. Header Image Overlay Opacity
		****************************************************/
		$wp_customize->add_setting(
			'header_image_overlay_opacity',
			array(
				'default' => '70',
				'sanitize_callback' => 'myousic_sanitize_overlay_opacity'
			)
		);
		$wp_customize->add_control(
			new Example_Customize_Number_Control(
				$wp_customize,
				'header_image_overlay_opacity',
				array(
					'label' => 'Header Image Overlay Opacity',
					'section' => 'header_image_settings',
					'settings' => 'header_image_overlay_opacity',
					'priority' => 3
				)
			)
		);


	/****************************************************

	3. Navigation

	****************************************************/
	$wp_customize->get_section('nav')->title = __( 'Menu Links' );
	$wp_customize->get_section('nav')->priority = 3;


	/****************************************************

	4. Colors

	****************************************************/
	$wp_customize->get_section('colors')->priority = 4;
	// remove automatically added header_textcolor
	$wp_customize->remove_control('header_textcolor');

		/****************************************************
		4a. Menu Link Color
		****************************************************/
		$wp_customize->add_setting(
			'menu_link_color',
			array(
				'default' => '#aaaaaa',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_link_color',
				array(
					'label' => 'Menu Link Color',
					'section' => 'colors',
					'settings' => 'menu_link_color',
					'priority' => 1
				)
			)
		);

		/****************************************************
		4b. Menu link hover color
		****************************************************/
		$wp_customize->add_setting(
			'menu_link_hover_color',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_link_hover_color',
				array(
					'label' => 'Menu Link Hover Color',
					'section' => 'colors',
					'settings' => 'menu_link_hover_color',
					'priority' => 2
				)
			)
		);

		/****************************************************
		4c. Dropdown Menu Background Color
		****************************************************/
		$wp_customize->add_setting(
			'menu_dropdown_background_color',
			array(
				'default' => '#333333',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_dropdown_background_color',
				array(
					'label' => 'Dropdown Menu Background Color',
					'section' => 'colors',
					'settings' => 'menu_dropdown_background_color',
					'priority' => 3
				)
			)
		);

		/****************************************************
		4d. Website Background Color
		****************************************************/
		$wp_customize->add_setting(
			'website_background_color',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'website_background_color',
				array(
					'label' => 'Website Background Color',
					'section' => 'colors',
					'settings' => 'website_background_color',
					'priority' => 4
				)
			)
		);

		/****************************************************
		4e. Heading Font Color
		****************************************************/
		$wp_customize->add_setting(
			'heading_font_color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'heading_font_color',
				array(
					'label' => 'Heading Font Color',
					'section' => 'colors',
					'settings' => 'heading_font_color',
					'priority' => 5
				)
			)
		);

		/****************************************************
		4f. Main Text Color
		****************************************************/
		$wp_customize->add_setting(
			'main_text_color',
			array(
				'default' => '#444444',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'main_text_color',
				array(
					'label' => 'Main Text Color',
					'section' => 'colors',
					'settings' => 'main_text_color',
					'priority' => 6
				)
			)
		);

		/****************************************************
		4g. Link Color
		****************************************************/
		$wp_customize->add_setting(
			'link_color',
			array(
				'default' => '#547adc',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'link_color',
				array(
					'label' => 'Link Color',
					'section' => 'colors',
					'settings' => 'link_color',
					'priority' => 7
				)
			)
		);

		/****************************************************
		4h. Footer Background Color
		****************************************************/
		$wp_customize->add_setting(
			'footer_background_color',
			array(
				'default' => '#333333',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'footer_background_color',
				array(
					'label' => 'Footer Background Color',
					'section' => 'colors',
					'settings' => 'footer_background_color',
					'priority' => 8
				)
			)
		);

		/****************************************************
		4i. Footer Text Color
		****************************************************/
		$wp_customize->add_setting(
			'footer_text_color',
			array(
				'default' => '#999999',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'footer_text_color',
				array(
					'label' => 'Footer Text Color',
					'section' => 'colors',
					'settings' => 'footer_text_color',
					'priority' => 9
				)
			)
		);


	/****************************************************

	5. Typography

	****************************************************/
	$wp_customize->add_section(
		'typography',
		array(
			'title' => 'Typography',
			'description' => '',
			'priority' => 5,
		)
	);

		/****************************************************
		5a. Heading Font
		****************************************************/
		$wp_customize->add_setting(
			'heading_font',
			array(
				'default' => 'Montserrat',
			)
		);
		$wp_customize->add_control(
			'heading_font',
			array(
				'type' => 'select',
				'label' => 'Heading Font:',
				'section' => 'typography',
				'choices' => array(
					'Lato' => 'Lato',
					'Open Sans' => 'Open Sans',
					'Montserrat' => 'Montserrat',
					'Roboto' => 'Roboto',
					'Source Sans Pro' => 'Source Sans Pro',
					'Oswald' => 'Oswald',
					'Quattrocento' => 'Quattrocento',
					'Quattrocento Sans' => 'Quattrocento Sans',
					'Josefin Slab' => 'Josefin Slab',
					'Josefin Sans' => 'Josefin Sans',
					'Arvo' => 'Arvo',
					'Ubuntu' => 'Ubuntu',
					'Droid Sans' => 'Droid Sans',
					'Droid Serif' => 'Droid Serif',
				),
			)
		);

		/****************************************************
		5b. Body Font
		****************************************************/
		$wp_customize->add_setting(
			'body_font',
			array(
				'default' => 'Open Sans',
			)
		);
		$wp_customize->add_control(
			'body_font',
			array(
				'type' => 'select',
				'label' => 'Body Font:',
				'section' => 'typography',
				'choices' => array(
					'Lato' => 'Lato',
					'Open Sans' => 'Open Sans',
					'Montserrat' => 'Montserrat',
					'Roboto' => 'Roboto',
					'Source Sans Pro' => 'Source Sans Pro',
					'Oswald' => 'Oswald',
					'Quattrocento' => 'Quattrocento',
					'Quattrocento Sans' => 'Quattrocento Sans',
					'Josefin Slab' => 'Josefin Slab',
					'Josefin Sans' => 'Josefin Sans',
					'Arvo' => 'Arvo',
					'Ubuntu' => 'Ubuntu',
					'Droid Sans' => 'Droid Sans',
					'Droid Serif' => 'Droid Serif',
				),
			)
		);


	/****************************************************

	6. Music Embeds

	****************************************************/
	$wp_customize->add_section(
		'music_embeds',
		array(
			'title' => 'Music Embeds',
			'description' => 'Controls the style options for the music sections throughout the site',
			'priority' => 6,
		)
	);

		/****************************************************
		6a. Embed Background Color
		****************************************************/
		$wp_customize->add_setting(
			'embed_background_color',
			array(
				'default' => '#212121',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'embed_background_color',
				array(
					'label' => 'Embed Background Color',
					'section' => 'music_embeds',
					'settings' => 'embed_background_color',
					'priority' => 1
				)
			)
		);

		/****************************************************
		6b. Embed Title Color
		****************************************************/
		$wp_customize->add_setting(
			'embed_title_color',
			array(
				'default' => '#eeeeee',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'embed_title_color',
				array(
					'label' => 'Embed Title Color',
					'section' => 'music_embeds',
					'settings' => 'embed_title_color',
					'priority' => 2
				)
			)
		);

		/****************************************************
		6c. Embed Text Color
		****************************************************/
		$wp_customize->add_setting(
			'embed_text_color',
			array(
				'default' => '#999999',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'embed_text_color',
				array(
					'label' => 'Embed Text Color',
					'section' => 'music_embeds',
					'settings' => 'embed_text_color',
					'priority' => 3
				)
			)
		);

		/****************************************************
		6d. Embed Button Background Color
		****************************************************/
		$wp_customize->add_setting(
			'embed_button_background_color',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'embed_button_background_color',
				array(
					'label' => 'Embed Button Background Color',
					'section' => 'music_embeds',
					'settings' => 'embed_button_background_color',
					'priority' => 4
				)
			)
		);

	/****************************************************

	7. News Sections

	****************************************************/
	$wp_customize->add_section(
		'news_sections',
		array(
			'title' => 'News Sections',
			'description' => '',
			'priority' => 7,
		)
	);

	/****************************************************

	8. Shows Sections

	****************************************************/
	$wp_customize->add_section(
		'shows_sections',
		array(
			'title' => 'Shows Sections',
			'description' => '',
			'priority' => 8,
		)
	);

		/****************************************************
		8a. Shows Border Color
		****************************************************/
		$wp_customize->add_setting(
			'shows_border_color',
			array(
				'default' => '#eeeeee',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'shows_border_color',
				array(
					'label' => 'Shows Border Color',
					'section' => 'shows_sections',
					'settings' => 'shows_border_color',
					'priority' => 1
				)
			)
		);

	/****************************************************

	9. Videos Sections

	****************************************************/
	$wp_customize->add_section(
		'videos_section',
		array(
			'title' => 'Videos Sections',
			'description' => '',
			'priority' => 9,
		)
	);

		/****************************************************
		9a. Video Section Background Color
		****************************************************/
		$wp_customize->add_setting(
			'video_background_color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'video_background_color',
				array(
					'label' => 'Video Section Background Color',
					'section' => 'videos_section',
					'settings' => 'video_background_color',
					'priority' => 1
				)
			)
		);

		/****************************************************
		9b. Video Section Heading Color
		****************************************************/
		$wp_customize->add_setting(
			'video_heading_color',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'video_heading_color',
				array(
					'label' => 'Video Section Heading Color',
					'section' => 'videos_section',
					'settings' => 'video_heading_color',
					'priority' => 2
				)
			)
		);


	/****************************************************

	10. Photos Sections

	****************************************************/

	/****************************************************

	11. Text Sections

	****************************************************/

	/****************************************************

	12. Contact Sections

	****************************************************/



	/****************************************************
	A little bit of cleanup
	****************************************************/
	//Remove static front page section
	$wp_customize->remove_section('static_front_page');

	//remove site title/tagline section
	$wp_customize->remove_section('title_tagline');

}

add_action( 'customize_register', 'myousic_theme_customizer' );