<?php $blog_editors_picks = get_field( 'blog_editors_picks', 174 ); ?>

<section class="editors-layout">
  
  <div class="contain">
    
    <div class="posts-row bordered">
      <div class="row cat-header">
        <div class="col-xs-12">
          <h2 class="h5 text_skyShade2">Editors picks</h2>
        </div>
      </div>

      <?php if ( $blog_editors_picks ) : ?>
        <div class="row">
          <?php foreach ( $blog_editors_picks as $post ) : setup_postdata( $post ); ?>
            <div class="col-xs-12 col-sm-4">
              <?php include( locate_template( 'template-parts/blog/post-card.php', false, false ) ); ?>
            </div>
          <?php endforeach; wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>
    </div>
    
  </div>

</section>