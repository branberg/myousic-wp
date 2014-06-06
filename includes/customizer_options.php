<?php
 
function myousic_customize_register($wp_customize){
    
    //Header
    	//Link color
    	//Logo image
		//Favicon Image
    	//text logo color
    	//background image
    	//background image overlay color
    	//background image overlay opacity

	$wp_customize->add_section('myousic_header_options', array(
		'title'    => __('Header', 'myousic'),
		'priority' => 120,
		'description' => 'Change site-wide settings for the header'
	));

		/*********************
		** Logo Image
		*********************/
		$wp_customize->add_setting('myousic_logo_image', array(
	        'default'           => 'image.jpg',
	        'capability'        => 'edit_theme_options',
	        'type'           => 'option',
	 
	    ));
 
	    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'myousic_logo_image', array(
	        'label'    => __('Logo Image', 'myousic'),
	        'section'  => 'myousic_header_options',
	        'settings' => 'myousic_logo_image',
	    )));

	    /*********************
		** Favicon Image
		*********************/
		$wp_customize->add_setting('myousic_theme_options[favicon_image]', array(
	        'default'           => 'image.jpg',
	        'capability'        => 'edit_theme_options',
	        'type'           => 'option',
	 
	    ));
 
	    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'favicon_image', array(
	        'label'    => __('Favicon Image', 'myousic'),
	        'section'  => 'myousic_header_options',
	        'settings' => 'myousic_theme_options[favicon_image]',
	    )));

	    /*********************
		** Text Logo Color
		*********************/
	    $wp_customize->add_setting('myousic_theme_options[text_logo_color]', array(
	        'default'           => 'ffffff',
	        'sanitize_callback' => 'sanitize_hex_color',
	        'capability'        => 'edit_theme_options',
	        'type'           => 'option',
	 
	    ));
	 
	    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'text_logo_color', array(
	        'label'    => __('Text Logo Color', 'myousic'),
	        'section'  => 'myousic_header_options',
	        'settings' => 'myousic_theme_options[text_logo_color]',
	    )));

	    /*********************
		** Background Image
		*********************/
		$wp_customize->add_setting('myousic_theme_options[header_background_image]', array(
	        'default'           => 'image.jpg',
	        'capability'        => 'edit_theme_options',
	        'type'           => 'option',
	 
	    ));
 
	    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'header_background_image', array(
	        'label'    => __('Header Background Image', 'myousic'),
	        'section'  => 'myousic_header_options',
	        'settings' => 'myousic_theme_options[header_background_image]',
	    )));

	    /*********************
		** Header image overlay color
		*********************/
	    $wp_customize->add_setting('myousic_theme_options[header_background_overlay_color]', array(
	        'default'           => '263c4a',
	        'sanitize_callback' => 'sanitize_hex_color',
	        'capability'        => 'edit_theme_options',
	        'type'           => 'option',
	 
	    ));
	 
	    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_background_overlay_color', array(
	        'label'    => __('Header Background Overlay Color', 'myousic'),
	        'section'  => 'myousic_header_options',
	        'settings' => 'myousic_theme_options[header_background_overlay_color]',
	    )));

	    /*********************
		** Header image overlay opacity
		*********************/
	    $wp_customize->add_setting('myousic_theme_options[header_background_overlay_opacity]', array(
	        'default'        => '0.7',
	        'capability'     => 'edit_theme_options',
	        'type'           => 'option',
	 
	    ));
	 
	    $wp_customize->add_control('header_background_overlay_opacity', array(
	        'label'      => __('Header Background Overlay Opacity', 'myousic'),
	        'section'    => 'myousic_header_options',
	        'settings'   => 'myousic_theme_options[header_background_overlay_opacity]',
	    ));

	    /*********************
		** Menu Link Color
		*********************/
	    $wp_customize->add_setting('myousic_theme_options[menu_link_color]', array(
	        'default'           => 'ffffff',
	        'sanitize_callback' => 'sanitize_hex_color',
	        'capability'        => 'edit_theme_options',
	        'type'           => 'option',
	 
	    ));
	 
	    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'menu_link_color', array(
	        'label'    => __('Menu Link Color', 'myousic'),
	        'section'  => 'myousic_header_options',
	        'settings' => 'myousic_theme_options[menu_link_color]',
	    )));

    //Site-wide colors
    	//Page Background color
    	//Heading color
    	//Main text color
    	//secondary text color
    	//Main link color
    //Music sections
    	//Music embed background color
    	//Music embed title color
    	//music embed text color
    	//music embed button background
    	//music embed button text
    //Video sections
    	//video background color
    //footer
    	//footer background color
    	//footer text color
    	//copyright text



    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('myousic_theme_options[text_test]', array(
        'default'        => 'Arse!',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('myousic_text_test', array(
        'label'      => __('Text Test', 'myousic'),
        'section'    => 'myousic_heade_options',
        'settings'   => 'myousic_theme_options[text_test]',
    ));
 
    //  =============================
    //  = Radio Input               =
    //  =============================
    $wp_customize->add_setting('myousic_theme_options[color_scheme]', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
 
    $wp_customize->add_control('myousic_color_scheme', array(
        'label'      => __('Color Scheme', 'myousic'),
        'section'    => 'myousic_color_scheme',
        'settings'   => 'myousic_theme_options[color_scheme]',
        'type'       => 'radio',
        'choices'    => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        ),
    ));
 
    //  =============================
    //  = Checkbox                  =
    //  =============================
    $wp_customize->add_setting('myousic_theme_options[checkbox_test]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));
 
    $wp_customize->add_control('display_header_text', array(
        'settings' => 'myousic_theme_options[checkbox_test]',
        'label'    => __('Display Header Text'),
        'section'  => 'myousic_color_scheme',
        'type'     => 'checkbox',
    ));
 
 
    //  =============================
    //  = Select Box                =
    //  =============================
     $wp_customize->add_setting('myousic_theme_options[header_select]', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'myousic_theme_options[header_select]',
        'label'   => 'Select Something:',
        'section' => 'myousic_color_scheme',
        'type'    => 'select',
        'choices'    => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        ),
    ));
 
 
    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('myousic_theme_options[image_upload_test]', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
        'label'    => __('Image Upload Test', 'myousic'),
        'section'  => 'myousic_color_scheme',
        'settings' => 'myousic_theme_options[image_upload_test]',
    )));
 
    //  =============================
    //  = File Upload               =
    //  =============================
    $wp_customize->add_setting('myousic_theme_options[upload_test]', array(
        'default'           => 'arse',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'upload_test', array(
        'label'    => __('Upload Test', 'myousic'),
        'section'  => 'myousic_color_scheme',
        'settings' => 'myousic_theme_options[upload_test]',
    )));
 
 
    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('myousic_theme_options[link_color]', array(
        'default'           => '000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Link Color', 'myousic'),
        'section'  => 'myousic_color_scheme',
        'settings' => 'myousic_theme_options[link_color]',
    )));
 
 
    //  =============================
    //  = Page Dropdown             =
    //  =============================
    $wp_customize->add_setting('myousic_theme_options[page_test]', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('myousic_page_test', array(
        'label'      => __('Page Test', 'myousic'),
        'section'    => 'myousic_color_scheme',
        'type'    => 'dropdown-pages',
        'settings'   => 'myousic_theme_options[page_test]',
    ));
 
}
 
add_action('customize_register', 'myousic_customize_register');