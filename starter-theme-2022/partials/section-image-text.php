<?php 

  $classes = "page-section page-section-image-text";
  $section_width = get_sub_field('width') ?? null; 
  if ( !empty($section_width) ) {
    $classes .= ' ' . $section_width;
  }
  $section_spacing = get_sub_field('spacing') ?? null; 
  if ( !empty($section_spacing) ) {
    $classes .= ' ' . $section_spacing;
  }
  $custom_classes = get_sub_field('custom_classes') ?? null;
  if ( !empty($custom_classes) ) {
    $classes .= ' ' . $custom_classes;
  }
  $section_id = get_sub_field('section_id') ?? null;

  $show_intro = get_sub_field('show_intro') ?? null;
  if ($show_intro == 'true') {
    $headline = get_sub_field('headline') ?? null; 
    $description = get_sub_field('description') ?? null; 
    $section_colors = get_sub_field('colors') ?? null;
    if ( !empty($section_colors) ) {
      $classes .= ' ' . $section_colors;
    }
  }
 
  $rows = get_sub_field('image_text_rows') ?? null; 
?>

<!-- partials/section-image-text.php -->

<section class="<?php echo $classes; ?>" <?php if ( !empty($section_id) ) echo 'id="' . $section_id . '"' ?>>
  <div class="content">

    <?php if ( ($show_intro == true) && (!empty($headline) || !empty($description) )) : ?>
      <div class="page-section-header">
        <?php if ( !empty($headline) ) : ?>
          <h2 class="head-two"><?php echo $headline; ?></h2>
        <?php endif; ?>
        <?php if ( !empty($description) ) : ?>
          <?php echo $description; ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <div class="image-text-rows">
      <?php foreach ($rows as $row) : ?>
        <?php $args = [
          'is_hero' => false,
          'row'     => $row,
        ]; ?>
        <?php get_template_part( 'partials/single-image-text', '', $args ); ?>
      <?php endforeach; ?>
    </div>

  </div>
</section>