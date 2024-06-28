<?php 
  $headline = get_sub_field('headline'); 
  $hero_image = get_sub_field('image'); 
  $hero_classes = get_sub_field('width') . ' ' . get_sub_field('vertical_position') . ' ' . get_sub_field('horizontal_position') . ' ' . get_sub_field('headline_weight')  . ' ' . get_sub_field('colors') . ' ' .get_sub_field('custom_classes'); 
?>

<!-- partials/section-hero.php -->

<section class="page-section-hero <?php echo $hero_classes; ?>">
  <div class="flex-wrapper">
    <h1 class="head-primary"><?php echo $headline; ?></h1>
  </div>
  <img class="page-section-hero-img" src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt']; ?>" />
</section>