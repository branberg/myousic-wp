<div class="news_article_wrap">
	<div class="news_article">

		<header class="article_header clearfix">

			<?php if( is_single() ): ?>
				<h3><?php the_title(); ?></h3>
			<?php else: ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php endif; ?>

			<span class="article_date"><?php echo get_the_time( 'M d' ); ?></span>
		</header>

		<div class="article_content">

			<?php if( is_home() || is_front_page() ): ?>

				<p class="article_excerpt"><?php the_excerpt_max_charlength(250); ?></p>
				<a href="<?php the_permalink(); ?>" class="read_more_link">Read More &raquo;</a>

			<?php else: ?>

				<?php the_content(); ?>

			<?php endif; ?>

		</div>

		<footer class="article_footer">

			<?php if( is_single() ): ?>
				<ul class="share_links">
					<li class="share_label">Share</li>
					<li class="twitter">
						<a href="http://twitter.com/share?text=@foxandcoyote rocks!&url=http://foxandcoyote.branhub.net" title="Tweet This" class="tooltip tweet" target="_blank">
							<i class="icon-twitter"></i>
						</a>
					</li>
					<li class="facebook">
						<a href="http://www.facebook.com/sharer.php?u=http://foxandcoyote.branhub.net&t=Wanna Header Some Great Music?" title="Share on Facebook" class="tooltip like" target="_blank">
							<i class="icon-facebook"></i>
						</a>
					</li>
				</ul>
			<?php endif; ?>

			<div class="post_meta">
				<p class="author">
					<span class="user"><i class="icon-user"></i><?php the_author_posts_link(); ?></span>
					<span class="post_date"><i class="icon-clock-o"></i> <?php echo get_the_time( 'm/d/Y' ); ?></span>
				</p>
				<p class="categories"><i class="icon-archive"></i> <?php the_category( ', ' ); ?></p>
				<?php the_tags( '<p class="tags"><i class="icon-tag"></i> ', ', ', '</p>' ); ?>
			</div>

		</footer>

	</div>
</div>