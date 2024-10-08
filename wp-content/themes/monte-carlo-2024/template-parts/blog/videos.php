<section class="videos-layout">

  <div class="contain">
    
    <div class="row">
      <div class="col-xs-12 text-center">
        <h2 class="h5"><?php echo get_field( 'blog_video_section_title', 174 ); ?></h2>
      </div>
    </div>
    
    <?php
      $videoPosts = [];
      $videoPostsType = get_field( 'blog_video_type', 174 );

      if ($videoPostsType == 'recent') {
        $videoPosts = get_posts(array(
          'numberposts' => 3,
          'post_type'   => 'post',
          'post_status' => 'publish',
          'order_by'    => 'date',
          'order'       => 'DESC',
          'category'    => 183
        ));
      } else {
        $videoPosts = get_field( 'blog_curated_video_posts', 174 );
      }
      
      if ( $videoPosts ) : 
        
    ?>
    
    <div class="row">
      <?php foreach ( $videoPosts as $post ) : ?>
        <?php setup_postdata ( $post ); ?>
        <div class="col-xs-12 col-sm-4">
          <?php include( locate_template( 'template-parts/blog/post-card.php', false, false ) ); ?>
        </div>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    </div>
    
    <?php endif; ?>
    
    <div class="row">
      <div class="col-xs-12">
        <span class="border-break"></span>
      </div>
    </div>
  
  </div> 

</section>