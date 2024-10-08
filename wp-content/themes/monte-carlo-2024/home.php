<?php get_header(); ?>

  <main role="main">
    
    <?php include( locate_template( 'template-parts/blog/blog-nav.php', false, false ) ); ?>
    
    <section class="intro bg_sky tbc_block-hero hero-item">
      <div class="contain">
        
        <div class="row center-xs text-center">
          <div class="col-xs-12 col-md-11">
            <h1><?php echo get_field( 'blog_page_title', 174 ); ?></h1>
            <div class="text page-description">
              <?php 
                $content = apply_filters('the_content', get_post_field('post_content', 174));
                echo $content;
              ?>
            </div>
          </div>
        </div>
        
      </div>
    </section>
    
    <section class="most-recent">
      <div class="contain">
        <div class="row">
          <div class="col-xs-12">
            <h2 class="h5 text_skyShade2">Most recent</h2>
          </div>
        </div>
        
        <div class="row recent-grid">
          <?php 

            $mostRecent = get_posts(array(
              'numberposts' => 3,
              'post_type'   => 'post',
              'post_status' => 'publish',
              'order_by'    => 'date',
              'order'       => 'DESC',
              // Add Video cat to exclude list
              'category__not_in'     => array(183)
            ));
            $recentIds = [];
            $r = 1;
          ?>

          <?php if ( $mostRecent ) : ?>
            <?php foreach ( $mostRecent as $post ) : setup_postdata( $post ); ?>
              <?php array_push($recentIds, get_the_id()); ?>
              <?php if ($r == 1) : ?>
                <div class="col-xs-12">
                  <div class="top_post">
                    <div class="image img_3x2">
                      <?php 
                        if ( has_post_thumbnail()) : 
                          $alt = get_the_post_thumbnail_caption();
                          if (empty($alt)) {
                            $alt = get_the_title();
                          }
                          the_post_thumbnail( 'large', [ 'class' => 'disable-lazyload', 'alt' => esc_html ( $alt ) ] ); 
                        endif; 
                      ?>
                    </div>
                    <div class="content">
                      <div>
                        <a class="post_link" href="<?php the_permalink(); ?>">
                          <h3><?php the_title(); ?></h3>
                        </a>
                        <div class="excerpt p-sm">
                          <?php the_excerpt(); ?>
                        </div>
                        <span class="faux-a link link-lg">Read more</span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php else : ?>
                <div class="col-xs-12 col-sm-6">
                  <div class="recent-card">
                    <div class="image img_3x2">
                      <?php 
                        if ( has_post_thumbnail()) : 
                          $alt = get_the_post_thumbnail_caption();
                          if (empty($alt)) {
                            $alt = get_the_title();
                          }
                          the_post_thumbnail( 'large', [ 'class' => 'disable-lazyload', 'alt' => esc_html ( $alt ) ] ); 
                        endif; 
                      ?>
                    </div>
                    <div class="content">
                      <a class="post_link" href="<?php the_permalink(); ?>">
                        <h3 class="h6"><?php the_title(); ?></h3>
                      </a>
                      <span class="faux-a link link-lg">Read more</span>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php $r++; endforeach; wp_reset_postdata(); ?>
            <?php endif; ?>
            
        </div>
      </div>
    </section>
    
    <?php 
      include( locate_template( 'template-parts/blog/featured.php', false, false ) );
      include( locate_template( 'template-parts/blog/editors-picks.php', false, false ) );
      include( locate_template( 'template-parts/blog/categories.php', false, false ) );
      include( locate_template( 'template-parts/blog/videos.php', false, false ) ); 
      
      if ( have_rows( 'blog_related_resources_comp_related_resources', 174 ) ) :
        while ( have_rows( 'blog_related_resources_comp_related_resources', 174 ) ) : the_row();
          include( locate_template( 'template-parts/components/related-resources.php', false, false ) ); 
        endwhile;
      endif;
    ?>

  </main>

<?php get_footer(); ?>
