<?php 
  $headline = get_sub_field('cards_headline'); 
  $custom_classes = get_sub_field('custom_classes'); 
  $layout = get_sub_field('card_layout');
  $card_width = get_sub_field('max_width');
  $section_classes = $custom_classes . ' ' . $layout  . ' ' . $card_width;
  $cards = get_sub_field('card');
?>

<!-- partials/section-cards.php -->

<section class="page-section-cards <?php echo $section_classes; ?>">
  <div class="cards-header">
    <h2 class="head-secondary"><?php echo $headline; ?></h2>
  </div>
  <div class="cards">
    <?php foreach ($cards as $card) : ?>
      <div class="card">

        <?php if ( !empty($card['image']) ) : ?>
          <div class="card-img">
            <img 
              class="<?php echo $card['image_shape']; ?>"
              src="<?php echo $card['image']['url']; ?>"
              alt="<?php echo $card['image']['alt']; ?>" 
            />
          </div>
        <?php endif; ?>

        <?php if ( !empty($card['headline']) || !empty($card['headline']) || $card['link'] === 'true' ) : ?>
          <div class="card-text">
        <?php endif; ?>   

          <?php if ( !empty($card['headline']) ) : ?>
            <h3 class="head-tertiary"><?php echo $card['headline']; ?></h3>
          <?php endif; ?>

          <?php if ( !empty($card['content']) ) : ?>
            <?php echo $card['content']; ?>
          <?php endif; ?>

          <?php if ( $card['link'] === 'true') : ?>
            <a class="cta small <?php echo $card['link_color']; ?>" href="<?php echo $card['link_url']; ?>">
              <?php if ( !empty($card['link_text']) ) : ?>
                <?php echo $card['link_text']; ?>
              <?php else : ?>
                Go
              <?php endif; ?> 
            </a>  
          <?php endif; ?>   

        <?php if ( !empty($card['headline']) || !empty($card['headline']) || $card['link'] === 'true' ) : ?>
        </div><!-- /card-text -->
        <?php endif; ?>   

        </div>
      <?php endforeach; ?>
  </div>
</section>