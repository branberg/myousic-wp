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