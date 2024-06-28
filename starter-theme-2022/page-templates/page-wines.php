<?php 
  get_header(); 
?>

<!-- page-wines.php -->
<div class="wines-page">
  <div class="wines-page-content">

  
  <?php if(have_posts()) : ?>
    <?php while(have_posts()): the_post(); ?>
      <div class="wines-page-intro">

        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>

      </div>
    <?php endwhile; ?>
  <?php endif; ?>  
  
  <?php 
    $args = array(
      'post_type' => 'wines',
      'post_status' => 'publish',
      'posts_per_page' => 3,
    );
    $arr_posts = new WP_Query( $args );
    if ( $arr_posts->have_posts() ) : ?>
      <div class="wines-wrapper">
        <?php while ( $arr_posts->have_posts() ) :
          $arr_posts->the_post();
          global $post;
          $post_slug = $post->post_name;
          $header = get_field('wine_header');
          $details = get_field('wine_details');
          $description = get_field('wines_page_description');
        ?>
          
          <div class="wine-card wine-card-<?php echo $post_slug; ?>">
            
            <div class="wine-card-bottle">
              <?php if( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink() ;?>">
                  <?php the_post_thumbnail(); ?>
                </a>
              <?php endif; ?>
            </div>

            <div class="wine-card-text">
              <div class="wine-card-text-content">
                <div class="wine-card-header">
                  <h2><?php the_title(); ?></h2>
                  <?php if ( !empty($header['subhead']) ) : ?>
                    <h3><?php echo $header['subhead']; ?></h3>
                  <?php else : ?>
                    <?php if ( !empty($details['appellation']) ) : ?>
                      <h3><?php echo $details['appellation']; ?></h3>
                    <?php endif; ?>
                  <?php endif; ?>
                  <a class="go-link" href="<?php the_permalink() ;?>">Go</a>
                </div>
                <?php if ( !empty($description) ) : ?>
                  <p><?php echo $description; ?></p>
                <?php endif; ?>
              </div>
            </div>

          </div>

        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  <?php wp_reset_postdata(); ?>

</div>

<?php
  get_footer(); 
?>