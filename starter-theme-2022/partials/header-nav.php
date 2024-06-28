<?php 
  $site_name = esc_html( get_bloginfo( 'name' ) );
  $header_options = get_field('header_options', 'option');
  $header_logo = $header_options['logo'] ?? null;
  $header_logo_url = $header_logo['url'] ?? null;
  $header_logo_name = $header_logo['alt'] ?? null;
  if (!$header_logo_name) $header_logo_name = $site_name;
  $logo = array(
    'logo_url'  => $header_logo_url,
    'logo_name' => $header_logo_name,
  );
  $classes  = 'header';
  $classes .= ' ' . $header_options['layout'] ?? null;
  $classes .= ' ' . $header_options['color']  ?? null;
?>

<header id="header" class="<?php echo $classes; ?>">
  <div class="header-content">

    <div class="header-logo-link">
      <?php get_template_part( 'partials/logo-link', null, $logo ); ?>
    </div>
    
    <nav id="main-navigation" class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" >
      <button id="nav-toggle"><span class="screen-reader-only">Mobile menu toggle</span></button>
      <!-- mobile js-free fallback -->
      <input type="checkbox" id="nav-chk" />
      <label class="nav-chk-label" for="nav-chk"><span><span class="screen-reader-only">Mobile menu toggle</span></span></label>
      <!-- end fallback -->
      <div class="menu-main-menu-wrapper">
        <?php wp_nav_menu( array( 'theme_location' => 'header_menu' ) ); ?>
        <?php // get_template_part( 'partials/social-links' ); ?>
      </div>

    </nav>

  </div>
</header> 