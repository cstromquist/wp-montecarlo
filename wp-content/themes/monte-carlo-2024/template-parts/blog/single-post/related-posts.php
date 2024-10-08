<section class="related-posts contain">
  
  <div class="row">
    <div class="col-xs-12">
      <h2 class="h5 text-center">Read more posts.</h2>
    </div>
  </div>
  
  <?php
    $related = get_posts(array(
      'post_type'   => 'post',
      'post_status' => 'publish',
      'orderby' => 'rand',
      'numberposts' => 6,
      'category'    => $catIDs,
      'exclude'     => $postId
    ));
  ?>
  <?php if ($related) : ?>
    <div class="row posts-row">
      <?php foreach ( $related as $post ) : setup_postdata( $post ); ?>
        <div class="col-xs-12 col-sm-4">
          <?php include( locate_template( 'template-parts/blog/post-card.php', false, false ) ); ?>
        </div>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>
  <?php endif; ?>
  
  <div class="row">
    <div class="col-xs-12">
      <span class="border-break"></span>
    </div>
  </div>
  
</section>