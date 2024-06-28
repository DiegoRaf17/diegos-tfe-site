@@ -1,179 +0,0 @@
<?php header("Content-type: text/css; charset: UTF-8"); ?>

<?php
  //header section
  $header_options = get_field('header_options', 'option');
  $header_width = $header_options['width'];
  if ( $header_width == 'custom' ) {
    $custom_width = $header_options['header_custom_width'];
    $header_width = round( ($custom_width / 16), 3 ) . "em";
  };
  $header_logo_width = $header_options['logo_width'] ?? null;
  $header_logo_em_width = round( ($header_logo_width / 16), 3 ) . "em";
  $header_logo_position = round( ($header_logo_width / 32), 3 ) . "em";
?>

@media only screen and ( min-width: <?php echo $header_width; ?> ) {
  #nav-toggle,
  .nav-chk-label {
    display: none;
  }
  .header-content {
    padding: var(--double-space);
  }
  header .menu {
    padding: 0 5%;
  }
  .header-content, 
  header .menu-main-menu-wrapper,
  header .menu {
    display: flex;
    align-items: center;
    justify-content: flex-end;
  }
  .header-content {
    justify-content: space-between;
  }
  .logo-right .header-content {
    flex-direction: row-reverse;
  }
  .logo-center .header-logo-link {
    width: <?php echo $header_logo_em_width; ?>;
    height: auto;
    position: absolute;
    left: calc( 50% - <?php echo $header_logo_position; ?>);
    z-index: 10;
  }
  .logo-center .header-logo-link img {
    width: 100%;
  }
  .site-navigation {
    width: auto;
    position: static;
    padding: 0;
  }
  .site-navigation .menu-main-menu-wrapper {
    position: static;
    right: 0;
    top: 0;
    padding: 0;
    overflow-x: visible;
    background-color: transparent;
    border-bottom: 0;
  }
  .logo-center .site-navigation,
  .logo-center .menu-main-menu-wrapper,
  .logo-center .menu-header-menu-container {
    width: 100%;
  }
  header .menu li {
    margin: 0;
    padding: 0;
  }
  header .menu > li + li {
    margin-left: var(--double-space);
  }
  .menu-header-container {
    flex-grow: 1;
  }
  header .menu {
    justify-content: space-evenly;
  }
  .logo-center .left-of-logo {
    margin-right: auto;
  }
  .logo-center .right-of-logo {
    margin-left: auto;
  }
  .menu .menu-item-has-children {
    position: relative;
  }
  .menu .sub-menu {
    margin: 0;
    height: 0;
    position: absolute;
    top: var(--double-space);
    left: -1em;
    width: max-content;
    overflow: hidden;
    transition: all .3s ease-in-out;
    opacity: 0;
  }
  .menu .sub-menu li {
    padding: 0 1em .25em;
  }
  .menu .sub-menu li:first-child {
    padding-top: 1em;
  }
  .menu .sub-menu li:last-child {
    padding-bottom: 1em;
  }
  .menu .open .sub-menu,
  .menu .openClick .sub-menu,
  .menu .menu-item-has-children:hover .sub-menu,
  .menu .menu-item-has-children a:focus + .sub-menu,
  .menu .sub-menu:focus-within {
    height: auto;
    opacity: 1;
    transition: all .3s ease-in-out;
  }
  .menu,
  .social-icons {
    margin: 0;
  }
}

<?php
  //footer section
  $footer_options = get_field('footer_options', 'option');
  $footer_mobile_width = $footer_options['footer_mobile_width'] ?? null;
  if ( $footer_mobile_width == 'custom' ) {
    $custom_mobile_width = $footer_options['footer_custom_mobile_width'];
    $footer_mobile_width = round( ($custom_mobile_width / 16), 3 ) . "em";
  };
  $footer_desktop_width = $footer_options['footer_desktop_width'] ?? null;
  if ( $footer_width == 'custom' ) {
    $custom_desktop_width = $footer_options['footer_custom_desktop_width'];
    $footer_desktop_width = round( ($custom_desktop_width / 16), 3 ) . "em";
  };
  if ( $footer_options['layout'] === 'logo-center') $footer_desktop_width = "-1";
  $footer_logo_width = $footer_options['logo_width'] ?? null;
?>
@media only screen and ( min-width: <?php echo $footer_mobile_width; ?> ) {
  .footer .menu li {
    display: inline-block;
    padding: 0 var(--half-space)
  }
  .footer .menu li + li {
    margin-top: 0;
  }
}
@media only screen and ( min-width: <?php echo $footer_desktop_width; ?> ) {
  .footer:not(.log-center) {
    .footer-content {
      flex-direction: row;
      justify-content: center;
    }
    .footer-nav-wrapper {
      margin-left: auto;
      margin-right: -1em;
    }
    .footer-copyright {
      width: 100%;
      text-align: left;
    }
  }
  .footer.logo-left .footer-nav-wrapper {
    
  }
  .footer.logo-right .footer-content {
    flex-direction: row-reverse;
  }
  .footer.logo-right .footer-nav-wrapper {
    margin-left: -1em;
    margin-right: auto;
  }
  .footer.logo-right .footer-copyright {
    text-align: right;
  }
  .logo-left.social-links .footer-logo-link {
    margin-right: auto;
    order: 1;
  }
  .logo-right.social-links .footer-logo-link {
    margin-left: auto;
  }
  .logo-left.social-links .footer-nav-wrapper,
  .logo-right.social-links .footer-nav-wrapper {
    margin: 0 auto;
    position: absolute;
    order: 2;
  }
  .logo-left.social-links .social-icon-wrapper {
    order: 3;
    margin-left: auto;
  }
  .logo-right.social-links .social-icon-wrapper {
    margin-right: auto;
  }
  .logo-left.social-links .footer-copyright,
  .logo-right.social-links .footer-copyright {
    order: 4;
    text-align: center;
  }
}

<?php
 	// remove spacing between sections with the same color
  $field['choices'] = array();
  $choices = get_field('theme_colors', 'option', false);

  // explode the value so that each line is a new array piece
  $choices = explode("\n", $choices);

  // remove any unwanted white space
  $choices = array_map('trim', $choices);

  // loop through array and add to field 'choices'
  if( is_array($choices) ) {
    foreach( $choices as $choice ) {
      $choice_pair = explode(':', $choice);
      $field['choices'][ $choice_pair[0] ] = $choice_pair[1]; 
      $section_class =  ".page-section." . $choice_pair[0];

      echo $section_class . " + " . $section_class . " .content {\n";
      echo "\tpadding-top: 0;\n";
      echo "}\n";

    } 
  }
?>