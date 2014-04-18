<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!--
	  __  ____     ______  _    _  _____ _____ _____ 
	 |  \/  \ \   / / __ \| |  | |/ ____|_   _/ ____|
	 | \  / |\ \_/ / |  | | |  | | (___   | || |     
	 | |\/| | \   /| |  | | |  | |\___ \  | || |     
	 | |  | |  | | | |__| | |__| |____) |_| || |____ 
	 |_|  |_|  |_|  \____/ \____/|_____/|_____\_____|
	                                                                                                                                                 
	  Theme: Myousic, by Branberg (branberg.com)

	-->

	<meta charset="UTF-8">
	<title><?php the_title(); ?> | <?php bloginfo('name'); ?></title>

	<?php $favicon = get_field('favicon','option'); if($favicon): ?>
		<link rel="icon" type="image/png" href="<?php echo $favicon; ?>" />
	<?php else: ?>
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() . '/library/img/favicon.png' ?>" />
	<?php endif; ?>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Social meta tags -->
	<meta name="description" content="Boombox is a simple, one-page theme that was created specifically for musicians." />
	<meta property="og:title" content="<?php the_title(); ?> | <?php bloginfo('name'); ?>" />
	<meta property="og:type" content="profile" />
	<meta property="og:url" content="<?php site_url(); ?>" />
	<meta property="og:image" content="http://example.com/image.jpg" />
	<meta property="og:description" content="Boombox is a simple, one-page theme that was created specifically for musicians." />

	<?php wp_head(); ?>

	<style type="text/css"><?php include_once('includes/custom_styles.php'); ?></style>

</head>
<body <?php body_class(); ?>>

	<!--[if lt IE 9]>
		<div id="ie_upgrade_message">
			<p>This website is not supported on your browser. It uses up-to-date technology that this version of Internet Exploer does not support.</p>
			<p>Please <a href="http://browsehappy.com/">upgrade to a modern browser</a> for the best viewing experience possible.</p>
		</div>
	<![endif]-->

	