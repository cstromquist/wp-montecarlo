<?php
  $featured = get_posts( array(
    'post_type'   => 'post',
    'numberposts' => 3,
    'meta_key'    => 'is_featured',
    'meta_value'  => 1,
    'exclude'     => $recentIds
  ));
?>
<section class="featured-layout">
  
  <div class="contain">
    
    <div class="posts-row bordered">
      <div class="row cat-header">
        <div class="col-xs-12">
          <h2 class="h5 text_skyShade2">Featured</h2>
        </div>
      </div>

      <?php if ( $featured ) : ?>
        <div class="row">
          <?php foreach ( $featured as $post ) : setup_postdata( $post ); ?>
            <div class="col-xs-12 col-sm-4">
              <?php include( locate_template( 'template-parts/blog/post-card.php', false, false ) ); ?>
            </div>
          <?php endforeach; wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>
    </div>
    
  </div>

</section>