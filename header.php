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
	<title><?php wp_title( '|', 'true', 'right' ); ?><?php bloginfo('name'); ?></title>
	<link rel="icon" type="image/png" href="<?php echo get_theme_mod( 'favicon_image', get_template_directory_uri().'/library/img/favicon.png' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Social meta tags -->
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:title" content="<?php the_title(); ?> | <?php bloginfo('name'); ?>" />
	<meta property="og:type" content="profile" />
	<meta property="og:url" content="<?php echo site_url(); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />

	<?php wp_head(); ?>

	<?php include_once('includes/custom_styles.php'); ?>

</head>
<body <?php body_class(); ?>>

	<?php // mobile site menu is generated via javascript ?>

	<div id="site_wrap">

		<div id="mobile_header">
			<div id="mobile_menu_toggle">
				<i class="icon-bars"></i>
			</div>
			<span id="mobile_site_title">Fox &amp; Coyote</span>
		</div>
		<header id="main_header" class="site_header">
			<div id="header_overlay_color"></div>
			<div class="wrap">
				<div id="logo_wrap">
					<a href="<?php echo site_url(); ?>" id="logo" class="logo_text">

						<?php if( get_theme_mod('logo_image') ): ?>

							<img src="<?php echo get_theme_mod('logo_image') ?>" alt="<?php echo get_theme_mod( 'logo_text', get_bloginfo('name')) ?>" />

						<?php else: ?>

							<?php echo get_theme_mod('logo_text', get_bloginfo('name')); ?>

						<?php endif; ?>

					</a>
				</div>

				<?php wp_nav_menu(array( 'theme_location' => 'main-nav', 'container' => 'nav', 'container_id' => 'header_nav' )); ?>

				<?php if( ! is_front_page() ): //only do this fancy-pancy title stuff if it is NOT the home page. ?>

					<div id="page_title">
						<?php
							/*
							Set up all our page titles for different page types
							*/
						?>
						<?php if( is_home() ): ?>

							<h1>NEWS</h1>

						<?php elseif( is_single() ): ?>

							<?php $posts_page = get_option('page_for_posts'); $posts_page = get_permalink($posts_page); ?>
							<h1><?php the_title(); ?></h1>
							<a href="<?php echo site_url('/' . $posts_page) ?>" class="back_to_blog">&larr; Back to Blog</a>

						<?php elseif( is_tag() ): ?>

							<h1><i class="icon-tag" title="Post Tags"></i> <?php single_tag_title(); ?></h1>
							<span class="sub_title">Showing posts tagged as "<?php single_tag_title(); ?>"</span>

						<?php elseif( is_category() ): ?>

							<h1><i class="icon-archive" title="Post Categories"></i> <?php single_cat_title(); ?></h1>
							<span class="sub_title">Showing posts categorized as "<?php single_cat_title(); ?>"</span>

						<?php elseif( is_author() ): ?>

							<h1><i class="icon-user" title="Post Categories"></i> <?php the_author(); ?></h1>
							<?php if( get_the_author_posts() == 1 ): ?>
								<span class="sub_title">Showing 1 post written by "<?php the_author(); ?>"</span>
							<?php elseif( get_the_author_posts() > 1 ): ?>
								<span class="sub_title">Showing <?php the_author_posts(); ?> posts written by "<?php the_author(); ?>"</span>
							<?php endif; ?>

						<?php elseif( is_archive() ): ?>

							<h1>Archive:</h1>

						<?php else: ?>

							<h1><?php the_title(); ?></h1>

						<?php endif; ?>
					</div>

				<?php endif; ?>

			</div>
		</header>