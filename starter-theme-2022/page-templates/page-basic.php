<?php 
/*
 * Template Name: Basic Single Width
 * description: >-
  Page template for simple single-section pages
 */

  get_header(); 
?>


<?php if(have_posts()) : ?>
  <?php while(have_posts()): the_post(); ?>

  <article class="article">

      <div class="basic-wrapper">
        <div class="content basic-content">

          <?php the_content(); ?>

        </div>
      </div>    
      
    </article>

  <?php endwhile; ?>
<?php endif; ?>


<?php
  get_footer(); 
?>