<?php
/*  */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="wine-image">
    <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail();
    } ?>
  </div>

  <div class="wine-text">

    <?php 
      the_title( '<h1 class="entry-title">', '</h1>');

      echo "<dl>\n";
      if ( get_field('wine_tasting_notes')) { 
        echo "\t<dt>Tasting Notes: </dt>\n\t<dd>";
        the_field('wine_tasting_notes'); 
        echo "</dd>\n";
      };
      if ( get_field('wine_pairings')) { 
        echo "\t<dt>Pairs well with: </dt>\n\t<dd>";
        the_field('wine_pairings'); 
        echo "</dd>\n";
      };
      if ( get_field('wine_calories')) { 
        echo "\t<dt>Calories: </dt>\n\t<dd>";
        the_field('wine_calories'); 
        echo "</dd>\n";
      };
      if ( get_field('wine_alcohol')) { 
        echo "\t<dt>Alcohol %: </dt>\n\t<dd>";
        the_field('wine_alcohol'); 
        echo "% abv</dd>\n";
      };
      echo "</dl>";
    ?>
  </div> <!-- .wine-text  -->


</article>