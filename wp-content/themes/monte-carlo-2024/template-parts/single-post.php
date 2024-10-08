<article class="contain">
  
  <?php include( locate_template( 'template-parts/blog/single-post/post-header.php', false, false ) ); ?>
  
  <div class="row center-md">
    <div class="col-xs-12 col-md-10">
     <div class="blog-copy">
       <?php the_content(); ?>
     </div>
    </div>
  </div>
  
</article>

<?php include( locate_template( 'template-parts/blog/single-post/related-posts.php', false, false ) ); ?>

<?php 
  if ( have_rows( 'single_post_related_resources_comp_related_resources' ) ) : 
    while ( have_rows( 'single_post_related_resources_comp_related_resources' ) ) : the_row(); 
      include( locate_template( 'template-parts/components/related-resources.php', false, false ) );
    endwhile; 
  else :
    if ( have_rows( 'blog_related_resources_comp_related_resources', 174 ) ) :
      while ( have_rows( 'blog_related_resources_comp_related_resources', 174 ) ) : the_row();
        include( locate_template( 'template-parts/components/related-resources.php', false, false ) ); 
      endwhile;
    endif;
  endif; 
?>