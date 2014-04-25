<?php get_header(); ?>

	<?php if( have_rows('page_sections') ): ?>

		<?php while( have_rows('page_sections') ): the_row(); ?>






			<?php

				/******************************************
				**
				**   MUSIC EMBED
				**
				******************************************/

				if( get_row_layout() == 'music_embed' ):

			?>

				<div class="page_section music_section first">
					<div class="wrap">

						<?php if( get_sub_field( 'section_heading_link' ) == 'External Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('external_link'); ?>">Music</a></h2></header>
						<?php elseif( get_sub_field( 'section_heading_link' ) == 'Interior Page Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('interior_page_link'); ?>">Music</a></h2></header>
						<?php else: ?>
							<header class="section_header"><h2>Music</h2></header>
						<?php endif; ?>

						<?php

							//get ID of post from Home page
							$music_object = get_sub_field('music_embed');
							
							//get all fields for that post ID
							$fields = get_fields($music_object->ID);

							//assign vars to each needed piece of info
							$music_iframe = $fields['soundcloud_iframe_code'];
							$feature_type = $fields['feature_type'];
							$album_title = $fields['feature_title'];
							$album_desc = $fields['feature_description'];
							$button_text = $fields['button_text'];
							$button_url = $fields['button_url'];

							//load up the music embed snippet
							include( 'snippets/section-music.php' );

						?>

					</div>
				</div>






			<?php

				/******************************************
				**
				**   NEWS SNIPPET
				**
				******************************************/

				elseif( get_row_layout() == 'news_snippet' ):

			?>

				<div class="page_section news_section">
					<div class="wrap">
						
						<?php if( get_sub_field( 'section_heading_link' ) == 'External Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('external_link'); ?>">News</a></h2></header>
						<?php elseif( get_sub_field( 'section_heading_link' ) == 'Interior Page Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('interior_page_link'); ?>">News</a></h2></header>
						<?php else: ?>
							<header class="section_header"><h2>News</h2></header>
						<?php endif; ?>

						<?php

							//do different queries based on snippet type
							if( get_sub_field( 'snippet_type' ) == 'Most Recent Post' ){

								$query_args = array( 'numberposts' => 1, 'output' => 'OBJECT', 'post_status' => 'publish' );
								$post = wp_get_recent_posts($query_args);
								$post = $post[0]; //we're only getting one post, so we can just pick the first array
								$id = $post['ID'];
								$post = get_post( $id );
								setup_postdata($post);
								//set post vars for below
								$title = get_the_title();
								$permalink = get_permalink();
								$date = get_the_time( 'M d' );
								$excerpt = get_the_excerpt();
								$content = get_the_content();
								//reset postdata
								wp_reset_postdata();

							} elseif( get_sub_field( 'snippet_type' ) == 'Custom Post' ){

								$post = get_sub_field('custom_post');
								setup_postdata($post);
								//set post vars for below
								$title = get_the_title();
								$permalink = get_permalink();
								$date = get_the_time( 'M d' );
								$excerpt = get_the_excerpt();
								$content = get_the_content();
								//reset postdata
								wp_reset_postdata();

							}

							//load up the news embed snippet
							include( 'snippets/section-news.php' );

						?>
						
					</div>
				</div>






			<?php

				/******************************************
				**
				**   SHOW LISTINGS
				**
				******************************************/

				elseif( get_row_layout() == 'show_listings' ):

			?>

				<div class="page_section shows_section shows_custom">
					<div class="wrap">
						
						<?php if( get_sub_field( 'section_heading_link' ) == 'External Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('external_link'); ?>">Shows</a></h2></header>
						<?php elseif( get_sub_field( 'section_heading_link' ) == 'Interior Page Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('interior_page_link'); ?>">Shows</a></h2></header>
						<?php else: ?>
							<header class="section_header"><h2>Shows</h2></header>
						<?php endif; ?>

						<?php

							$show_count = get_sub_field( 'shows' ); //get show count
							$show_count = intval($show_count); //convert to integer

							if( $show_count ){ //if show count is set, show X amt of posts...

								$posts = get_posts(
									array(
										'post_type' => 'shows',
										'posts_per_page' => $show_count,
										'meta_key' => 'date',
										'orderby' => 'meta_value_num',
										'order' => 'ASC'
									)
								);

							} else { //...otherwise shwo 5 shows (or less if have less)

								$posts = get_posts(
									array(
										'post_type' => 'shows',
										'posts_per_page' => 5,
										'meta_key' => 'date',
										'orderby' => 'meta_value_num',
										'order' => 'ASC'
									)
								);

							}

							//load up the shows embed snippet
							include( 'snippets/section-shows.php' );

						?>
						
					</div>
				</div>






			<?php

				/******************************************
				**
				**   VIDEO EMBED
				**
				******************************************/

				elseif( get_row_layout() == 'video_embed' ):

			?>

				<div class="page_section videos_section">
					<div class="wrap">
						
						<?php if( get_sub_field( 'section_heading_link' ) == 'External Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('external_link'); ?>">Videos</a></h2></header>
						<?php elseif( get_sub_field( 'section_heading_link' ) == 'Interior Page Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('interior_page_link'); ?>">Videos</a></h2></header>
						<?php else: ?>
							<header class="section_header"><h2>Videos</h2></header>
						<?php endif; ?>

						<?php
							//get ID of post from Home page
							$video_object = get_sub_field('video_embed');
							
							//get all fields for that post ID
							$fields = get_fields($video_object->ID);

							$video_url = $fields['video_url'];

							$oembed = wp_oembed_get( $video_url, array( 'width' => 920, 'height' => 520 ) );

							//load up the video embed snippet
							include( 'snippets/section-videos.php' );

						?>
						
					</div>
				</div>






			<?php

				/******************************************
				**
				**   PHOTO GALLERY
				**
				******************************************/

				elseif( get_row_layout() == 'photo_gallery' ):

			?>

				<div class="page_section photos_section">
					<div class="wrap">
						<?php if( get_sub_field( 'section_heading_link' ) == 'External Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('external_link'); ?>">Photos</a></h2></header>
						<?php elseif( get_sub_field( 'section_heading_link' ) == 'Interior Page Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('interior_page_link'); ?>">Photos</a></h2></header>
						<?php else: ?>
							<header class="section_header"><h2>Photos</h2></header>
						<?php endif; ?>
					</div>
					
					<?php $photos = get_sub_field( 'photo_gallery' ); ?>
					<?php if( $photos ): ?>
					<div class="photo_gallery">
						<ul class="clearfix">
							<?php foreach( $photos as $photo ): ?>
								<li><a href="<?php echo $photo['url']; ?>" class="lightbox" data-lightbox-gallery="homepagephotos"><img src="<?php echo $photo['sizes']['gallery-photo']; ?>" alt="<?php echo $photo['alt']; ?>" /></a></li>
							<?php endforeach; ?>
						</ul>
					</div>

					<?php else: ?>
						<p style="text-align:center;">No photos have been added yet, please check back soon!</p>
					<?php endif; ?>

				</div>






			<?php

				/******************************************
				**
				**   CUSTOM TEXT SECTION
				**
				******************************************/

				elseif( get_row_layout() == 'custom_text_section' ):

			?>

				<div class="page_section text_section">
					<div class="wrap">

						<?php $title = get_sub_field( 'text_section_title' ); ?>

						<?php if( get_sub_field( 'section_heading_link' ) == 'External Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('external_link'); ?>"><?php echo $title; ?></a></h2></header>
						<?php elseif( get_sub_field( 'section_heading_link' ) == 'Interior Page Link' ): ?>
							<header class="section_header"><h2><a href="<?php the_sub_field('interior_page_link'); ?>"><?php echo $title; ?></a></h2></header>
						<?php else: ?>
							<header class="section_header"><h2><?php echo $title; ?></h2></header>
						<?php endif; ?>

						<?php $text = get_sub_field( 'text_section' ); ?>
						<div class="text_content">
							<?php echo $text; ?>
						</div>

					</div>
				</div>






			<?php endif; ?>

		<?php endwhile; ?>

	<?php else: ?>

		<p>No homepage sections added yet, here's a download file for the demo content if you need it ______.</p>

	<?php endif; ?>

<?php get_footer(); ?>