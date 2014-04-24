<?php get_header(); ?>

	<?php if( have_rows('page_sections') ): ?>

		<?php while( have_rows('page_sections') ): the_row(); ?>

			<?php if( get_row_layout() == 'music_embed' ): ?>

				<div class="page_section music_section first">
					<div class="wrap">

						<?php if( get_sub_field( 'section_heading_link' ) == 'External Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('external_link'); ?>">Music</a></h2></header>
						<?php elseif( get_sub_field( 'section_heading_link' ) == 'Interior Page Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('interior_page_link'); ?>">Music</a></h2></header>
						<?php else: ?>
							<header class="section_header"><h2>Music</h2></header>
						<?php endif; ?>

						<?php get_template_part( 'snippets/section', 'music' ); ?>

					</div>
				</div>

			<?php elseif( get_row_layout() == 'news_snippet' ): ?>

				<div class="page_section news_section">
					<div class="wrap">
						
						<?php if( get_sub_field( 'section_heading_link' ) == 'External Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('external_link'); ?>">News</a></h2></header>
						<?php elseif( get_sub_field( 'section_heading_link' ) == 'Interior Page Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('interior_page_link'); ?>">News</a></h2></header>
						<?php else: ?>
							<header class="section_header"><h2>News</h2></header>
						<?php endif; ?>

						<?php get_template_part( 'snippets/section', 'news' ); ?>
						
					</div>
				</div>

			<?php elseif( get_row_layout() == 'show_listings' ): ?>

				<div class="page_section shows_section shows_custom">
					<div class="wrap">
						
						<?php if( get_sub_field( 'section_heading_link' ) == 'External Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('external_link'); ?>">Shows</a></h2></header>
						<?php elseif( get_sub_field( 'section_heading_link' ) == 'Interior Page Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('interior_page_link'); ?>">Shows</a></h2></header>
						<?php else: ?>
							<header class="section_header"><h2>Shows</h2></header>
						<?php endif; ?>

						<?php get_template_part( 'snippets/section', 'shows' ); ?>
						
					</div>
				</div>

			<?php elseif( get_row_layout() == 'video_embed' ): ?>

				<div class="page_section videos_section">
					<div class="wrap">
						
						<?php if( get_sub_field( 'section_heading_link' ) == 'External Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('external_link'); ?>">Videos</a></h2></header>
						<?php elseif( get_sub_field( 'section_heading_link' ) == 'Interior Page Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('interior_page_link'); ?>">Videos</a></h2></header>
						<?php else: ?>
							<header class="section_header"><h2>Videos</h2></header>
						<?php endif; ?>

						<?php get_template_part( 'snippets/section', 'videos' ); ?>
						
					</div>
				</div>

			<?php elseif( get_row_layout() == 'photo_gallery' ): ?>

			<?php elseif( get_row_layout() == 'custom_text_section' ): ?>

			<?php endif; ?>

		<?php endwhile; ?>

	<?php else: ?>

		<p>No homepage sections added yet, here's a download file for the demo content if you need it ______.</p>

	<?php endif; ?>

<?php get_footer(); ?>