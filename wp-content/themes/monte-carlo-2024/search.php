<?php get_header(); ?>

  <main id="content" <?php post_class('archive-layout'); ?> role="main">
  
    <?php include( locate_template( 'template-parts/blog/blog-nav.php', false, false ) ); ?>

    <section class="results hero-spacer">
      
      <div class="contain">
        
        <?php
          $s=get_search_query();
          $args = array( 
            's' =>$s,
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key'     => 'hide_on_blog_page',
                    'value'   => '1',
                    'compare' => '!=',
                ),
                array(
                    'key'     => 'hide_on_blog_page',
                    'compare' => 'NOT EXISTS',
                ),
                array(
                    'key'     => 'hide_on_blog_page',
                    'value'   => '',
                    'compare' => '=',
                ),
            )
           );
          // The Query
          $the_query = new WP_Query( $args );
          
          if ( $the_query->have_posts() ) : 
        ?>
        
          <div class="row">
            <div class="col-xs-12 col-lg-10">
              <?php _e("<h1 class='h5'><span>Search Results for: </span>".get_query_var('s')."</h1>"); ?>
            </div>
          </div>
          
          <div class="row posts_row">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="col-xs-12 col-sm-4">
                <?php include( locate_template( 'template-parts/blog/post-card.php', false, false ) ); ?>
              </div>
            <?php endwhile; ?>
          </div>
          
        <?php else : ?>
          
          <div class="row">
            <div class="col-xs-12 text-center">
              <h1 class="no-results-title">Nothing Found</h1>
              <div class="alert-info">
                <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
                <div class="cta-wrap">
                  <a href="/blog" class="btn btn-lg">Return to Blog</a>
                </div>
              </div>
            </div>
          </div>
          
        <?php endif; ?>
      
      </div>
    
    </section>
    
    <?php
      if ( have_rows( 'blog_related_resources_comp_related_resources', 174 ) ) :
        while ( have_rows( 'blog_related_resources_comp_related_resources', 174 ) ) : the_row();
          include( locate_template( 'template-parts/components/related-resources.php', false, false ) ); 
        endwhile;
      endif;
    ?>

  </main>

<?php get_footer(); ?>
