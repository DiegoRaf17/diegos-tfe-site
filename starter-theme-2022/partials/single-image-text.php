<?php 
  extract ($args);
  if ($is_hero) {
    $head = 1;
  } else {

  }
  $classes = '';
  if (isset($row['layout']))              $classes .= $row['layout'] . ' ';
  if (isset($row['image_side']))          $classes .= $row['image_side'] . ' ';
  if (isset($row['colors']))              $classes .= $row['colors'] . ' ';
  if (isset($row['vertical_position']))   $classes .= $row['vertical_position'] . ' ';
  if (isset($row['horizontal_position'])) $classes .= $row['horizontal_position'] . ' ';
  if (!empty($row['custom_classes']))     $classes .= $row['custom_classes'];
  $row_link_content = $row['show_link'] ?? '';
  $add_image_link = $row['add_image_link'] ?? '';
?>

<div class="image-text-row  <?php echo $classes; ?>">

  <?php if ( !empty($row['image']) ) : ?>
    <div class="image-text-img">
      <?php if ( ($row_link_content === 'true') && ($add_image_link === 'true') ) : ?>
        <a class="image-text-img-link" tabindex="-1" href="<?php echo $row['link_url']; ?>">
      <?php endif; ?>
          <img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $row['image']['alt']; ?>" />
      <?php if ( ($row_link_content === 'true') && ($add_image_link === 'true') ) : ?>
        </a>
      <?php endif; ?>

    </div>
  <?php endif; ?>
  
  <div class="image-text-txt">
    <div class="image-text-content">

      <?php if ( !empty($row['prehead']) ) : ?>
        <div class="page-section-preheader">
          <h4 class="head-five"><?php echo $row['prehead']; ?></h4>
        </div>
      <?php endif; ?>

      <?php if ( !empty($row['headline']) ) : ?>
        <div class="page-section-head">
          <h3 class="head-two"><?php echo $row['headline']; ?></h3>
        </div>
      <?php endif; ?>

      <?php if ( !empty($row['content']) ) : ?>
        <div class="page-section-custom-content">
          <?php echo $row['content']; ?>
        </div>
      <?php endif; ?>

      <?php if ($row_link_content === 'true' ) : ?>
        <div class="page-section-link">
          <a class="cta" href="<?php echo $row['link_url']; ?>"><?php echo $row['link_text']; ?></a>
        </div>
      <?php endif; ?>

      <?php $row_post_link_content = $row['show_post_link_content'] ?? ''; ?>
      <?php if ($row_post_link_content === 'true' ) : ?>  
        <div class="page-section-custom-content">
          <?php echo $row['post_link_content']; ?>
        </div>
      <?php endif; ?>

    </div>
  </div>

</div>