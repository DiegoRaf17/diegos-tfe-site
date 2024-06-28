<?php 
  get_header(); 

  // to get ACF fields:
  // $home = get_field('home');

?>

<section class="home-main">
  <div class="home-main-content">
   
    <?php get_template_part( 'partials/section-page' ); ?>
    <h1>Setting up local site and connected to github repo</h1>

    <?php $my_field = get_field('my_text_fieild'); ?>
    <?php if ($my_field) : ?>
      <h2><?php echo $my_field; ?></h2>
    <?php endif; ?>

    <!-- <?php 
      $gallery = get_field('gallery');
      foreach($gallery as $image) {
        echo '<img src="' . $image['sizes']['thumbnail'] . '" alt="' . $image['alt'] . '" />';
      } 
    ?>

    <?php
      $color_options = get_field('choose_your_color'); 
      foreach($color_options as $val => $label) {
        if($val === 'value') {
          echo '<input type="radio" name="color" value="' . $val . '" id="' . $val . '">';
          echo '<label for="' . $val . '">' . $label . '</label>';
        }
      }
    ?> -->

    <div class='random-div'>Diego was here!</div>
    <style>
      .random-div {
        background-color: lightblue;
        padding: 10px;
        border: 2px;
        border-color: black;
        border-style: solid;
        transform: translate(50px);
        width: 300px;
        height: 300px;
        transition-duration: 1000ms;
        transition-property: background-color, transform;
      }

      .random-div:hover {
        background-color: lightcoral;
        transform: rotate(45deg) scale(.5);
      }
    </style>

  </div>
</section>

<?php 

      // $foods = array(
      //   'post_type' => 'food',
      //   'posts_per_page' => 3,
      //   'order' => 'ASC',
      // );

      // $foods['order'] = 'DESC';
      // $foods['China'] = 'Beijing';

      // $foods = array_flip($foods);
      // $foods = array_reverse($foods);

      // foreach($foods as $key => $value) {
      //   echo $key . '=>' . $value . '<br>';
      // }
?>


<?php
  get_footer(); 
?>