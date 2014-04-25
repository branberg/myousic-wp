<div class="news_article_wrap">
	<div class="news_article">
		<header class="article_header clearfix">
			<h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
			<span class="article_date"><?php echo $date; ?></span>
		</header>
		<div class="article_excerpt">
			<?php if( is_home() || is_front_page() ): ?>
				<p><?php echo $excerpt; ?></p>
				<a href="<?php echo $permalink; ?>" class="read_more_link">Read More &raquo;</a>
			<?php else: ?>
				<?php echo $content; ?>
			<?php endif; ?>
		</div>
	</div>
</div>