<?php
	
	//let's set up variables with null values to be safe
	$title = null;
	$permalink = null;
	$date = null;
	$excerpt = null;

	if( is_front_page() ){ //do this stuff if we're showing a snippet on the homepage

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
			//reset postdata
			wp_reset_postdata();

		}

	}

?>
<div class="news_article_wrap">
	<div class="news_article">
		<header class="article_header clearfix">
			<h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
			<span class="article_date"><?php echo $date; ?></span>
		</header>
		<div class="article_excerpt">
			<p><?php echo $excerpt; ?></p>
			<a href="<?php echo $permalink; ?>" class="read_more_link">Read More &raquo;</a>
		</div>
	</div>
</div>