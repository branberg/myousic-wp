<?php
	
	//get ID of post from Home page
	$video_object = get_sub_field('video_embed');
	
	//get all fields for that post ID
	$fields = get_fields($video_object->ID);

	$video_url = $fields['video_url'];

	$oembed = wp_oembed_get( $video_url, array( 'width' => 920, 'height' => 520 ) );

?>
<div class="video_embed">
	<!-- //this is responsive thanks to fitvids! -->
	<?php echo $oembed; ?>
</div>