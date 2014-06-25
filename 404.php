<?php get_header(); ?>

  <div id="page_content" class="page_section text_section">
    <div class="wrap">

      <div class="text_content" style="text-align: center;">

        <h1>Error 404</h1>
        <p>The page you are lookign for either doesn't exist or has been moved somewhere else.</p>
        <p>Please <a href="mailto:<?php echo antispambot(get_option( 'admin_email' )); ?>">contact us</a> if you need help.</p>

      </div>

    </div>
  </div>

<?php get_footer(); ?>