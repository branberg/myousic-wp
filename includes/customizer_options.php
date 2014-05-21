<?php

function myousic_customize_register( $wp_customize ){

	//colors
	$colors = array();
	$colors[] = array(
		'slug'		=> 'content_text_color',
		'default'	=> '#333',
		'label'		=> 'Content Text Color'
	);
	$colors[] = array(
		'slug'		=> 'content_link_color',
		'default'	=> '#88C34B',
		'label'		=> 'Content Link Color'
	);
	foreach( $colors as $color ){
		//settings
		$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option',
				'capability' => 'edit_theme_options'
			)
		);
		//controls
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'],
				array(
					'label' => $color['label'],
					'section' => 'colors',
					'settings' => $color['slug']
				)
			)
		);
	}

}

add_action( 'customize_register', 'myousic_customize_register' );