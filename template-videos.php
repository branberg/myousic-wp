<?php
/*
Template Name: Videos Page
*/
?>
<?php get_header(); ?>

	<div id="page_content" class="page_section videos_section">
		<div class="wrap">

			<div class="video_list">

				<?php

					//get video records based on template selection
					$videos = get_field('videos_page_videos');

					foreach( $videos as $video ){

						$ID = $video->ID; //get_field returns the IDs of the music entry, but not the actual music entry, so we need to grab the ID...
						$fields = get_fields($ID); //...and get the fields associated with it.
						
						$video_url = $fields['video_url'];

						$oembed = wp_oembed_get( $video_url, array( 'width' => 920, 'height' => 520 ) );

						//load up the video embed snippet
						include( 'snippets/section-videos.php' );

					}

				?>

			</div>

		</div>
	</div>

<?php get_footer(); ?>