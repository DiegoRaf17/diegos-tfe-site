<?php 
/*
 * Template Name: Basic Section Template
 * description: >-
  Page template for sectional pages
 */

  get_header(); 
?>


<article class="article">
  <?php get_template_part( 'partials/section-page' ); ?>
</article>


<?php get_footer(); ?>