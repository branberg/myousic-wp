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

?>
<div class="album clearfix">
	<div class="soundcloud_embed">
		<?php echo $music_iframe; ?>
	</div>
	<div class="album_info_wrapper">
		<div class="album_info">
			<span class="album_type"><?php echo $feature_type; ?></span>
			<h3 class="album_title"><?php echo $album_title; ?></h3>
			<div class="album_description">
				<p><?php echo $album_desc; ?></p>
			</div>
			<a href="<?php echo $button_url; ?>" class="album_button" target="_blank"><?php echo $button_text; ?></a>
		</div>
	</div>
</div>