<?php 
  $headline = get_sub_field('headline'); 
  $content = get_sub_field('content'); 
  $width = get_sub_field('width');
  $section_classes = get_sub_field('custom_classes') . ' ' . $width;
?>

<!-- partials/section-content.php -->

<section class="page-section-custom <?php echo $section_classes; ?>">

  <?php if ( !empty($headline) ) : ?>
    <div class="page-section-header">
      <h2 class="head-secondary"><?php echo $headline; ?></h2>
    </div>
  <?php endif; ?>

  <?php if ( !empty($content) ) : ?>
    <div class="page-section-custom-content">
      <?php echo $content; ?>
    </div>
  <?php endif; ?>

</section>