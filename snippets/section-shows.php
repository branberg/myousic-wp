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

					//location
					$location = get_field('location');

					//venue
					$venue = get_field( 'venue' );
					$venue_link = get_field( 'venue_link' );

					//Ticket Link
					$ticket_link = get_field( 'buy_ticket_link' );

					//RSVP Link
					$rsvp_link = get_field( 'rsvp_link' );

					//URL safe site name...In case someone is using an ampersand ( & ) in their site name.
					$safe_name = get_bloginfo('name');
					$safe_name = str_replace( '&amp;', '%26', $safe_name );

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
							<?php if($venue_link): ?>
								<a href="<?php echo $venue_link; ?>">
									<span class="venue"><?php echo $venue; ?></span>
									<span class="location"><?php echo $location; ?></span>
								</a>
							<?php else: ?>
								<span class="venue"><?php echo $venue; ?></span>
								<span class="location"><?php echo $location; ?></span>
							<?php endif; ?>
						</div>
					</td>
					<td class="tickets">
						<div class="cell_wrap">
							<a href="<?php echo $ticket_link; ?>">Buy Tickets</a>
						</div>
					</td>
					<td class="social_share">
						<div class="cell_wrap">
							<ul>
								<li class="facebook_share">
									<a href="http://www.facebook.com/sharer/sharer.php" target="_blank" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share this show on Facebook">
										<i class="icon-facebook"></i>
									</a>
								</li>
								<li class="twitter_share">
									<a href="http://twitter.com/share?text=<?php echo $safe_name ?> is playing a show on <?php echo date( 'M d', $time ); ?> at <?php echo $venue ?>" target="_blank" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share this show on Twitter">
										<i class="icon-twitter"></i>
									</a>
								</li>
							</ul>
						</div>
					</td>
				</tr>

			<?php endforeach; ?>

		<?php else: ?>

			<p>No shows just yet, check back soon!</p>

		<?php endif; ?>

	</tbody>
</table>