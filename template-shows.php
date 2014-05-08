<?php
/*
Template Name: Shows Page
*/
?>
<?php get_header(); ?>

	<div id="page_content" class="page_section news_section">
		<div class="wrap">

			<?php

				$today = date('Ymd', strtotime('-1 day'));
				$posts = get_posts(
					array(
						'post_type' => 'shows',
						'meta_key' => 'date',
						'posts_per_page' => -1,
						'orderby' => 'meta_value_num',
						'order' => 'ASC',
						'meta_query' => array(
							array(
								'key' => 'date',
								'compare' => '>=',
								'value' => $today,
								'type' => 'DATE'
							)
						)
					)
				);

				include('snippets/section-shows.php');

				wp_reset_query();

			?>

		</div>
	</div>

<?php get_footer(); ?>