<?php 
  get_header();
  $header = get_field('wine_header');
  $details = get_field('wine_details');
  $nutritional_info = get_field('nutritional_info');
  $winemaking_notes = get_field('winemaking_notes');
  $tasting_notes = get_field('tasting_notes');
  $notes_link = get_field('notes');
  $buy_link = get_field('buy_link');
?>
<?php if(have_posts()) : ?>
  <?php while(have_posts()): the_post(); ?>

    <div class="wine-page">

      <div class="wine-intro">

        <div class="wine-intro-head">
          <?php if ( !empty($header['name']) ) : ?>
            <h1><?php echo $header['name']; ?></h1>
          <?php else : ?>
            <h1><?php the_title(); ?></h1>
          <?php endif; ?>

          <?php if ( !empty($header['subhead']) ) : ?>
            <h2><?php echo $header['subhead']; ?></h2>
          <?php else : ?>
            <?php if ( !empty($details['appellation']) ) : ?>
              <h2><?php echo $details['appellation']; ?></h2>
            <?php endif; ?>
          <?php endif; ?>
        </div>

        <div class="accolade">
          <?php 
            $accolades = $header['accolade'];
            if( $accolades ) {
              foreach( $accolades as $accolade ) {
                $score = $accolade['score'];
                $source = $accolade['source'];
                echo "<p class='score'>$score</p>" ;
                echo "<p class='source'>$source</p>" ;
              }
            } 
          ?>
        </div>

        <div class="wine-intro-pics">
          <?php 
            $secondary_image_left = $header['secondary_image_left']; 
            $secondary_image_right = $header['secondary_image_right']; 
            if ( !empty($secondary_image_left) ) : ?>
            <img src="<?php echo esc_url($secondary_image_left['url']); ?>" alt="<?php echo esc_attr($secondary_image_left['alt']); ?>" />
          <?php 
            endif;
            if ( !empty($secondary_image_right) ) : ?>
            <img src="<?php echo esc_url($secondary_image_right['url']); ?>" alt="<?php echo esc_attr($secondary_image_right['alt']); ?>" />
          <?php endif; ?>
        </div>
      </div>

      <div class="wine-details-wrapper">
        <div class="wine-details-content">
          <div class="wine-details-image">
            <?php if( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail(); ?>
            <?php endif; ?>
          </div>

          <div class="wine-details-text">
            <dl>
              <?php if ( !empty($details['composition']) ) : ?>
                <div class="full">
                  <dt>Composition:</dt>
                  <dd><?php echo $details['composition']; ?></dd>
                </div>
              <?php endif; ?>
              <?php if ( !empty($details['appellation']) ) : ?>
                <div class="full">
                  <dt>Appellation:</dt>
                  <dd><?php echo $details['appellation']; ?></dd>
                </div>
              <?php endif; ?>
              <?php if ( !empty($details['alcohol']) ) : ?>
                <div class="split">
                  <dt>Alcohol:</dt>
                  <dd><?php echo $details['alcohol']; ?></dd>
                </div>
              <?php endif; ?>
              <?php if ( !empty($details['ta']) ) : ?>
                <div class="split">
                  <dt>TA:</dt>
                  <dd><?php echo $details['ta']; ?></dd>
                </div>
              <?php endif; ?>
              <?php if ( !empty($details['ph']) ) : ?>
                <div class="split">
                  <dt>pH:</dt>
                  <dd><?php echo $details['ph']; ?></dd>
                </div>
              <?php endif; ?>
              <?php if ( !empty($details['rs']) ) : ?>
                <div class="split">
                  <dt>RS:</dt>
                  <dd><?php echo $details['rs']; ?></dd>
                </div>
              <?php endif; ?>
              <?php if ( !empty($details['calories']) ) : ?>
                <div class="full">
                  <dt>Calories:</dt>
                  <dd><?php echo $details['calories']; ?></dd>
                </div>
              <?php endif; ?>
            </dl>
            <?php if ( !empty($nutritional_info) ) {
              echo "<p class='info'>$nutritional_info</p>";
            } ?>

          </div>
        </div>
      </div>

      <div class="wine-notes-wrapper">
        <div class="wine-notes-content">

          <?php if ( !empty($winemaking_notes) ) : ?>
            <div class="wine-notes-winemaking-notes">
              <h2>Winemaking Notes</h2>
              <?php echo $winemaking_notes; ?>
            </div>
          <?php endif; ?>

          <div class="wine-notes-tasting-notes">
            <?php if ( !empty($tasting_notes) ) : ?>
              <h2>Tasting Notes</h2>
              <?php echo $tasting_notes; ?>
            <?php endif; ?>

            <?php if ( !empty($notes_link )) : ?>
              <a class="go-link" target="_blank" href="<?php echo esc_url( $notes_link['url'] ); ?>">View Notes</a>
            <?php endif; ?>
            <?php if ( !empty($buy_link )) : ?>
              <a class="go-link" target="_blank" href="<?php echo esc_url( $buy_link); ?>">Buy</a>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div>

  <?php endwhile; ?>
<?php endif; ?>

<?php
  get_footer(); 
?>