<?php get_header(); ?>

	<div id="page_content" class="page_section news_section">
		<div class="wrap">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php

					//set the variables needed to plug into the news snippet
					$title = get_the_title();
					$permalink = get_permalink();
					$date = get_the_time( 'M d' );
					$excerpt = get_the_excerpt();
					$content = get_the_content();

					include('snippets/section-news.php');

				?>


			<?php endwhile; else: ?>
				<p>Sorry, this page has no content or does not exist yet...</p>
			<?php endif; ?>

		</div>
	</div>

<?php get_footer(); ?>