<div class="page-section-wrapper">

<?php if( have_rows('sections') ): ?>
  <?php while ( have_rows('sections') ) : the_row(); ?>

    <?php if( get_row_layout() == 'hero_block' ): ?>
      <?php get_template_part( 'partials/section-hero' ); ?>
    <?php endif; ?>

    <?php if( get_row_layout() == 'cards_block' ): ?>
      <?php get_template_part( 'partials/section-cards' ); ?>
    <?php endif; ?>

    <?php if( get_row_layout() == 'content_block' ): ?>
      <?php get_template_part( 'partials/section-content' ); ?>
    <?php endif; ?>
        
  <?php endwhile; ?>
<?php endif; ?>

</div>