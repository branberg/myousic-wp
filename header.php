<!DOCTYPE html>
<html>
<head>
	<!--
	
	  __  __ __     __ ____   _    _   _____  _____  _____ 
	 |  \/  |\ \   / // __ \ | |  | | / ____||_   _|/ ____|
	 | \  / | \ \_/ /| |  | || |  | || (___    | | | |     
	 | |\/| |  \   / | |  | || |  | | \___ \   | | | |     
	 | |  | |   | |  | |__| || |__| | ____) | _| |_| |____ 
	 |_|  |_|   |_|   \____/  \____/ |_____/ |_____|\_____|
	                                                       
	  Theme: Myousic
	  Author: Branberg (http://branberg.com)

	-->
	<meta charset="UTF-8">
	<title><?php the_title(); ?> | <?php bloginfo('name'); ?></title>
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/img/favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Social meta tags -->
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:title" content="<?php the_title(); ?> | <?php bloginfo('name'); ?>" />
	<meta property="og:type" content="profile" />
	<meta property="og:url" content="<?php echo site_url(); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	
	<?php // mobile site menu is generated via javascript ?>

	<div id="site_wrap">

		<div id="mobile_header">
			<div id="mobile_menu_toggle">
				<i class="icon-menu"></i>
			</div>
			<span id="mobile_site_title">Fox &amp; Coyote</span>
		</div>
		<header id="main_header" class="site_header">
			<div id="header_overlay_color"></div>
			<div class="wrap">
				<div id="logo_wrap">
					<a href="<?php echo site_url(); ?>" id="logo" class="logo_img"><img src="<?php echo get_template_directory_uri(); ?>/library/img/logo.png" alt="fox &amp; coyote" /></a>
				</div>
				
				<?php wp_nav_menu(array( 'theme_location' => 'main-nav', 'container' => 'nav', 'container_id' => 'header_nav' )); ?>

				<?php if( is_home() ): ?>
					<span id="page_title">NEWS</span>
				<?php elseif( !is_front_page() ): ?>
					<span id="page_title"><?php the_title(); ?></span>
				<?php endif; ?>

			</div>
		</header>