<?php 
  get_header(); 
?>

    <div class="article-wrapper">
      <article class="article-content error-page">

        <h1>Sorry! <span class="screen-reader-only">404 error</span></h1>
        <h2>We can't find anything at all!!</h2>
        <p>
          <a class="go-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a>
          <!-- tfestart: replace shop link with brand page -->
          <a class="go-link" href="https://www.onestopwineshop.com/">Shop</a> 
        </p>

        
      </article>
    </div>

<?php
  get_footer(); 
?>