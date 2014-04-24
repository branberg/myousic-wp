<?php
	
	if( is_front_page() ){ //make sure we're on the front page to run this code

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

	}

?>

<table class="tour_dates">
	<tbody>

		<?php if( $posts ): ?>
			<?php foreach( $posts as $post): ?>
				
				<?php

					//date stuff
					$date = get_field('date'); //grab date value from page
					$y = substr( $date, 0, 4 ); //create vars of each val
					$m = substr( $date, 4, 2 );
					$d = substr( $date, 6, 2 );
					$time = strtotime( "{$y}-{$m}-{$d}" ); //restring into php < 5.3 friendly values

					//venue
					$venue = get_field( 'venue' );
					$venue_link = get_field( 'venue_link' );

					//city
					$city = get_field( 'city' );

					//Ticket Link
					$ticket_link = get_field( 'buy_ticket_link' );

					//RSVP Link
					$rsvp_link = get_field( 'rsvp_link' );

				?>

				<tr>
					<td class="date">
						<div class="cell_wrap">
							<span class="month"><?php echo date( 'M', $time ); ?></span>
							<span class="day"><?php echo date( 'd', $time ); ?></span>
						</div>
					</td>
					<td class="location">
						<div class="cell_wrap">
							<a href="<?php echo $venue_link; ?>">
								<span class="venue"><?php echo $venue; ?></span>
								<span class="city"><?php echo $city; ?></span>
							</a>
						</div>
					</td>
					<td class="tickets">
						<div class="cell_wrap">
							<a href="<?php echo $ticket_link; ?>">Buy Tickets</a>
						</div>
					</td>
					<td class="rsvp">
						<div class="cell_wrap">
							<a href="<?php echo $rsvp_link; ?>">RSVP</a>
						</div>
					</td>
					<td><a href="<?php the_permalink(); ?>"><i class="icon-info-circle"></i></a></td>
				</tr>

			<?php endforeach; ?>

		<?php else: ?>

			<p>No shows just yet, check back soon!</p>

		<?php endif; ?>

	</tbody>
</table>

<?php wp_reset_query(); ?>