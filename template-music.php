<?php
/*
Template Name: Music Page
*/
?>
<?php get_header(); ?>
	
	<div id="page_content" class="page_section music_section">
		<div class="wrap">

			<?php
				
				//get music records based on template selection
				$albums = get_field('music_page_music');

				//loop through each album
				foreach( $albums as $album ){

					$ID = $album->ID; //get_field returns the IDs of the music entry, but not the actual music entry, so we need to grab the ID...
					$fields = get_fields($ID); //...and get the fields associated with it.

					//set variables based on fields
					$music_iframe = $fields['soundcloud_iframe_code'];
					$feature_type = $fields['feature_type'];
					$album_title = $fields['feature_title'];
					$album_desc = $fields['feature_description'];
					$button_text = $fields['button_text'];
					$button_url = $fields['button_url'];

					//include the music snippet to populate the varialbes into
					include( 'snippets/section-music.php' );

				}

			?>

		</div>
	</div>


<?php get_footer(); ?>