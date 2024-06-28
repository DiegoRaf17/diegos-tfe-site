<?php if ( have_rows('social_links', 'option') ) : ?>
  <?php $social_links = get_field('social_links', 'option'); ?>
  <div class="social-icon-wrapper">
    <ul class="social-links">
      <?php foreach ( $social_links as $social_link ) : ?>
      <li>
        <a href="<?php echo $social_link['url']; ?>" class="social-icon social-<?php echo $social_link['type']['value']; ?>" title="<?php echo $social_link['type']['label']; ?>">
          <span class="screen-reader-only"><?php echo $social_link['type']['label']; ?></span>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>