<?php 
  $logo_url  = $args['logo_url'];
  $logo_name = $args['logo_name'];
?>

<?php if ( !is_front_page() && !is_home() ) : ?>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
<?php endif; ?>

  <div class="logo-link">
    <?php if ( $logo_url ) : ?>
      <img src="<?php echo $logo_url;?>" alt="<?php echo $logo_name; ?>" />
    <?php else : ?>
      <?php echo $logo_name; ?>
    <?php endif; ?>
  </div>
  
<?php if ( !is_front_page() && !is_home() ) : ?>
  </a>
<?php endif; ?>
