<?php

/*************************************************************************************************
THESE STYLES ARE GENERATED DYNAMICALLY BASED ON USER SETTINGS IN WORDPRESS
Do not edit this file if you do not know what you're doing
*It can get a bit thick in here, but I tried to seperate them as best as possible.*
*************************************************************************************************/


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

		13. Mobile Styles

	****************************************************/


	/****************************************************
	1. Logo
	****************************************************/
	//logo text color
	$logo_text_color = get_theme_mod('logo_text_color');

	/****************************************************
	2. Header Image
	****************************************************/
	//header image
	$header_image = get_theme_mod('custom_header_image', get_template_directory_uri() . '/library/img/header_background.jpg' );

	//Header overlay color
	$header_overlay_color = get_theme_mod('header_image_overlay_color');

	//Header overlay opacity
	$header_overlay_opacity = get_theme_mod('header_image_overlay_opacity');
	$header_overlay_opacity = $header_overlay_opacity / 100;

	/****************************************************
	3. Navigation
	****************************************************/

	/****************************************************
	4. Colors
	****************************************************/
	//menu link color
	$menu_link_color = get_theme_mod('menu_link_color');

	//menu link hover color
	$menu_link_hover = get_theme_mod('menu_link_hover_color');

	//dropdown menu background color
	$menu_dropdown_background = get_theme_mod('menu_dropdown_background_color');

	//background color
	$website_background_color = get_theme_mod('website_background_color');

	//heading font
	$heading_font_color = get_theme_mod('heading_font_color');

	//main text color
	$main_text_color = get_theme_mod('main_text_color');

	//link color
	$link_color = get_theme_mod('link_color');

	//footer background color
	$footer_background = get_theme_mod('footer_background_color');

	//footer text color
	$footer_text = get_theme_mod('footer_text_color');

	/****************************************************
	5. Typography
	****************************************************/
	$font_stack = array(

		//these keys need to match the keys in the options exactly
		'Lato' => "'Lato', sans-serif",
		'Open Sans' => "'Open Sans', sans-serif",
		'Montserrat' => "'Montserrat', sans-serif",
		'Roboto' => "'Roboto', sans-serif",
		'Source Sans Pro' => "'Source Sans Pro', sans-serif",
		'Oswald' => "'Oswald', sans-serif",
		'Quattrocento' => "'Quattrocento', serif",
		'Quattrocento Sans' => "'Quattrocento Sans', sans-serif",
		'Josefin Slab' => "'Josefin Slab', serif",
		'Josefin Sans' => "'Josefin Sans', sans-serif",
		'Arvo' => "'Arvo', serif",
		'Ubuntu' => "'Ubuntu', sans-serif",
		'Droid Sans' => "'Droid Sans', sans-serif",
		'Droid Serif' => "'Droid Serif', serif"

	);

	//heading font
	$heading_font = get_theme_mod('heading_font');
	$heading_font = $font_stack[$heading_font];

	//body font
	$body_font = get_theme_mod('body_font');
	$body_font = $font_stack[$body_font];

	/****************************************************
	6. Music Embeds
	****************************************************/
	//embed background color
	$music_embed_background = get_theme_mod('embed_background_color');

	//embed title color
	$embed_title_color = get_theme_mod('embed_title_color');

	//embed text color
	$embed_text_color = get_theme_mod('embed_text_color');

	//embed button background color
	$embed_button_background = get_theme_mod('embed_button_background_color');


	/****************************************************
	8. Shows Sections
	****************************************************/
	$shows_border_color = get_theme_mod('shows_border_color');


	/****************************************************
	9. Videos Sections
	****************************************************/
	//video section background
	$video_background = get_theme_mod('video_background_color');

	//video header color
	$video_header = get_theme_mod('video_heading_color');


	/****************************************************
	12. Contact Page
	****************************************************/

?>

<style type="text/css">

	/****************************************************
	1. Logo
	****************************************************/
	.site_header #logo_wrap #logo{ color: <?php echo $logo_text_color; ?>; }

	/****************************************************
	2. Header Image (overlay color & opacity)
	****************************************************/
	#main_header{
		background-image: url('<?php echo $header_image; ?>');
	}
	.site_header #header_overlay_color{
		background-color: <?php echo $header_overlay_color; ?>;
		opacity: <?php echo $header_overlay_opacity; ?>;
	}

	/****************************************************
	4. Colors
	****************************************************/
	.site_header #header_nav ul li a{ color: <?php echo $menu_link_color; ?>; }

	.site_header #header_nav ul li.current-menu-item a,
	.site_header #header_nav ul li a:hover{
		color: <?php echo $menu_link_hover; ?>;
	}

	.site_header #header_nav ul li ul.sub-menu li{ background-color: <?php echo $menu_dropdown_background; ?>; }
	.site_header #header_nav ul li ul.sub-menu:before{
		border-bottom-color: <?php echo $menu_dropdown_background; ?>;
	}

	.page_section,
	.news_section .news_article_wrap .news_article,
	#page_content > .wrap{
		background-color: <?php echo $website_background_color; ?>;
	}

	.page_section .section_header,
	.page_section .section_header a{
		color: <?php echo $heading_font_color; ?>;
	}

	html, body{
		color: <?php echo $main_text_color; ?>;
	}

	.news_section .news_article_wrap{
		border-top-color: <?php echo $main_text_color; ?>;
	}
	.news_section .news_article_wrap:before {
		background-color: <?php echo $website_background_color; ?>;
		background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo $main_text_color; ?>), to(<?php echo $website_background_color; ?>));
		background-image: -webkit-linear-gradient(top, <?php echo $main_text_color; ?>, <?php echo $website_background_color; ?>);
		background-image: -moz-linear-gradient(top, <?php echo $main_text_color; ?>, <?php echo $website_background_color; ?>);
		background-image: -o-linear-gradient(top, <?php echo $main_text_color; ?>, <?php echo $website_background_color; ?>);
		background-image: linear-gradient(to bottom, <?php echo $main_text_color; ?>, <?php echo $website_background_color; ?>);
	}

	a{
		color: <?php echo $link_color; ?>;
	}

	.site_footer{
		color: <?php echo $footer_text; ?>;
		background-color: <?php echo $footer_background; ?>;
	}
	.mailing_list .mailing_list_title, .mailing_list form,
	.social_links ul li a,
	.mailing_list form input[type="text"]{
		color: <?php echo $footer_text; ?>;
	}
	.mailing_list form ::-webkit-input-placeholder { color: <?php echo $footer_text; ?>; }
	.mailing_list form :-moz-placeholder { color: <?php echo $footer_text; ?>; }
	.mailing_list form ::-moz-placeholder { color: <?php echo $footer_text; ?>; }
	.mailing_list form :-ms-input-placeholder { color: <?php echo $footer_text; ?>; }
	.mailing_list form label.placeholder{ color: <?php echo $footer_text; ?>; }

	.mailing_list form input{
		border-color: <?php echo $footer_text; ?>;
	}

	.mailing_list form input[type="submit"]{
		background-color: <?php echo $footer_text; ?>;
		color: <?php echo $footer_background; ?>;
	}

	.social_links ul li a:hover, .social_links ul li a:hover{
		color: <?php echo $link_color; ?>;
	}

	/****************************************************
	5. Typography
	****************************************************/
	.site_header #header_nav,
	.site_header #logo_wrap #logo,
	h1, h2, h3, h4, h5, h6,
	.page_section .section_header a:after,
	.music_section .album .album_info_wrapper .album_info .album_type,
	.music_section .album .album_info_wrapper .album_info .album_button,
	table.tour_dates,
	.mailing_list,
	.site_footer .credits,
	form.contact_form label,
	form.contact_form input[type="submit"],
	#comments .comment-list .comment .comment-body .comment-meta .comment-author .fn,
	#comments .comment-list .comment .comment-body .comment-meta .comment-author .says{
		font-family: <?php echo $heading_font; ?>;
	}
	html, body{
		font-family: <?php echo $body_font; ?>;
	}

	/****************************************************
	6. Music Embeds
	****************************************************/
	.music_section .album{
		background-color: <?php echo $music_embed_background; ?>;
	}

	.music_section .album .album_info_wrapper .album_info .album_title{
		color: <?php echo $embed_title_color; ?>;
	}

	.music_section .album .album_info_wrapper .album_info .album_description,
	.music_section .album .album_info_wrapper .album_info .album_type{
		color: <?php echo $embed_text_color; ?>;
	}

	.music_section .album .album_info_wrapper .album_info .album_button{
		background-color: <?php echo $embed_button_background; ?>;
	}
	.music_section .album .album_info_wrapper .album_info .album_button{
		color: <?php echo $music_embed_background; ?>;
	}

	/****************************************************
	7. News Sections
	****************************************************/
	.news_section .news_article_wrap .news_article a.read_more_link{
		color: <?php echo $main_text_color; ?>;
		border-color: <?php echo $main_text_color; ?>;
	}
	.news_section .news_article_wrap.sticky:before{
		background-color: <?php echo $website_background_color; ?>;
		background-image: -webkit-gradient(linear, left top, left bottom, from(#fbb03b), to(<?php echo $website_background_color; ?>));
		background-image: -webkit-linear-gradient(top, #fbb03b, <?php echo $website_background_color; ?>);
		background-image: -moz-linear-gradient(top, #fbb03b, <?php echo $website_background_color; ?>);
		background-image: -o-linear-gradient(top, #fbb03b, <?php echo $website_background_color; ?>);
		background-image: linear-gradient(to bottom, #fbb03b, <?php echo $website_background_color; ?>);
	}

	/****************************************************
	8. Shows Sections
	****************************************************/
	table.tour_dates tr td a{
		color: <?php echo $main_text_color; ?>;
	}
	table.tour_dates tr td a:hover{
		color: <?php echo $link_color; ?>;
	}
	table.tour_dates tr:first-child td{
		border-top-color: <?php echo $shows_border_color; ?>;
	}
	table.tour_dates tr td{
		border-bottom-color: <?php echo $shows_border_color; ?>;
	}
	table.tour_dates tr td.date .cell_wrap:after{
		border-right-color: <?php echo $shows_border_color; ?>;
	}

	/****************************************************
	9. Videos Sections
	****************************************************/
	body.home .page_section.videos_section{
		background-color: <?php echo $video_background; ?>;
	}
	#page_content.videos_section > .wrap{
		/* Uncomment this if you want the video page(s) to have the same custom background color as the homepage video section */
		/*background-color: <?php echo $video_background; ?>;*/
	}
	.page_section.videos_section .section_header a{
		color: <?php echo $video_header; ?>;
	}


	/****************************************************
	12. Contact Page
	****************************************************/
	form.contact_form input,
	form.contact_form textarea{
		border-color: <?php echo $main_text_color; ?>;
	}

	form.contact_form input[type="submit"]{
		background-color: <?php echo $main_text_color; ?>;
		color: <?php echo $website_background_color; ?>;
	}


	/****************************************************
	13. Mobile Styles
	****************************************************/
	#mobile_header{
		background-color: <?php echo $header_overlay_color; ?>;
	}


</style>