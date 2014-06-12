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

					include('snippets/section-news.php');

				?>

				<?php endwhile; ?>

				<nav id="pagination">
					<?php if ( get_next_posts_link() ) : ?>
						<div class="nav_previous"><?php next_posts_link( __( '<span class="meta_nav">&larr;</span> Older posts', 'myousic' ) ); ?></div>
					<?php endif; ?>

					<?php if ( get_previous_posts_link() ) : ?>
						<div class="nav_next"><?php previous_posts_link( __( 'Newer posts <span class="meta_nav">&rarr;</span>', 'myousic' ) ); ?></div>
					<?php endif; ?>
				</nav>

			<?php else: ?>
				<p>Sorry, this page has no content or does not exist yet...</p>
			<?php endif; ?>

		</div>
	</div>

<?php get_footer(); ?>