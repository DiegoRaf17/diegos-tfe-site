<?php 
  $footer_options = get_field('footer_options', 'option');

  $site_name = esc_html( get_bloginfo( 'name' ) );
  $footer_logo = $footer_options['logo'] ?? null;
  $footer_logo_url = $footer_logo['url'] ?? null;
  $footer_logo_name = $footer_logo['alt'] ?? null;
  if (!$footer_logo_name) $footer_logo_name = $site_name;
  $logo = array(
    'logo_url'  => $footer_logo_url,
    'logo_name' => $footer_logo_name,
  );
  $footer_social_links = $footer_options['social_links'] ?? null;

  $classes  = 'footer';
  $classes .= ' ' . $footer_options['layout'] ?? null;
  $classes .= ' ' . $footer_options['color']  ?? null;
?>

    </main>
    <footer id="footer" class="<?php echo $classes; ?>">
      <div class="footer-content">

        <div class="footer-logo-link">
          <?php get_template_part( 'partials/logo-link', null, $logo ); ?>
        </div>
      
        <?php if ( $footer_social_links === 'true' ) : ?>
          <?php get_template_part( 'partials/social-links' ); ?>
        <?php endif; ?>

        <div class="footer-nav-wrapper">
          <nav id="footer-nav" class="footer-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); ?>
          </nav>
        </div>

        <div id="copyright" class="footer-copyright">
          &copy; <?php echo esc_html( date_i18n( __( 'Y', 'blankslate' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>, CA. All&nbsp;Rights&nbsp;Reserved.
        </div>

      </div>
    </footer>
  </div><!-- page-wrapper -->
  <?php wp_footer(); ?>
</body>
</html>