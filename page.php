<?php get_header(); ?>

	<div id="page_content" class="page_section">
		<div class="wrap">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; else: ?>
				<p>Sorry, this page has no content or does not exist yet...</p>
			<?php endif; ?>

		</div>
	</div>

<?php get_footer(); ?>