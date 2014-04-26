<?php
/*
Template Name: Shows Page
*/
?>
<?php get_header(); ?>

	<div id="page_content" class="page_section news_section">
		<div class="wrap">

			<?php
				$posts = get_posts(
					array(
						'post_type' => 'shows',
						'posts_per_page' => -1,
						'meta_key' => 'date',
						'orderby' => 'meta_value_num',
						'order' => 'ASC'
					)
				);
			?>

			<?php include('snippets/section-shows.php'); ?>

		</div>
	</div>

<?php get_footer(); ?>