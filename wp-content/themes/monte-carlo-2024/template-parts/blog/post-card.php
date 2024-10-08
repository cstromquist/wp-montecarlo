<div class="comp__post-card">
  <div class="image img_3x2">
    <?php 
      if ( has_post_thumbnail()) : 
        $alt = get_the_post_thumbnail_caption();
        if (empty($alt)) {
          $alt = get_the_title();
        }
        the_post_thumbnail( array(375, 480), [ 'alt' => esc_html ( $alt ) ] ); 
      endif; 
    ?>
  </div>
  <div class="meta">
    <a class="plain post_link" href="<?php the_permalink(); ?>">
      <h3 class="m2"><?php the_title(); ?></h3>
    </a>
    <span class="faux-a link link-md">Read more</span>
  </div>
</div>
