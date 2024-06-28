<?php 
  get_header(); 
?>

<?php 
  echo "page.php";
?>

<?php if(have_posts()) : ?>
  <?php while(have_posts()): the_post(); ?>

    <article class="article">
      <div class="content-wrapper">
        <div class="content">

          <?php the_content(); ?>

        </div>
      </div>    
    </article>

  <?php endwhile; ?>
<?php endif; ?>


<?php
  get_footer(); 
?>