<?php get_header(); ?>

  <div id="page_content" class="page_section shows_single">
    <div class="wrap">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <header id="show_header">

          <?php
            $date = get_field('date'); //grab date value from page
            $y = substr( $date, 0, 4 ); //create vars of each val
            $m = substr( $date, 4, 2 );
            $d = substr( $date, 6, 2 );
            $time = strtotime( "{$y}-{$m}-{$d}" ); //restring into php < 5.3 friendly values
          ?>
          <div id="show_date">
            <span class="month"><?php echo date( 'M', $time ); ?></span>
            <span class="day"><?php echo date( 'd', $time ); ?></span>
          </div>
          <div id="venue_info">
            <span id="venue_name"><a href="<?php the_field('venue_link'); ?>"><?php the_field('venue'); ?></a></span>
            <span id="city_name"><?php the_field('city'); ?></span>
          </div>

          <ul id="show_info_links">

            <?php if( get_field( 'buy_ticket_link' ) ): ?>
              <li id=""><a href="<?php the_field('buy_ticket_link'); ?>">Get Tickets</a></li>
            <?php endif; ?>

            <?php if( get_field( 'rsvp_link' ) ): ?>
              <li id=""><a href="<?php the_field('rsvp_link'); ?>">RSVP</a></li>
            <?php endif; ?>

          </ul>

        </header>

        <?php if( get_field('show_description') ): ?>
          <div id="show_description">
            <?php the_field('show_description'); ?>
          </div>
        <?php endif; ?>

        <?php if( have_rows('show_details') ): ?>
          <div id="show_details">
            <?php while(have_rows('show_details')): the_row(); ?>
              <div class="show_detail fourcol">
                <span class="detail_label"><?php the_sub_field('detail_label'); ?></span>
                <div class="detail_description"><?php the_sub_field('detail_description'); ?></div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>

      <?php endwhile; else: ?>
        <p>Sorry, this page has no content or does not exist yet...</p>
      <?php endif; ?>

    </div>
  </div>

<?php get_footer(); ?>