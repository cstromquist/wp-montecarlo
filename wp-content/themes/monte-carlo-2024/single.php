<?php get_header(); ?>

  <main <?php post_class('post-content'); ?> role="main">

    <?php

      if ( have_posts() ) : while ( have_posts() ) : the_post();
      
        $title = get_the_title();
        $postId = get_the_ID();
        $postDate = get_the_date( 'M d Y' );
        $postType = get_post_type($postId);
        
        if ($postType == 'verticals' || $postType == 'use-cases' || $postType == 'product') {
          include( locate_template( 'template-parts/single-post-type-page.php', false, false ) );
        } else {
          include( locate_template( 'template-parts/single-post.php', false, false ) );
        }
        
      endwhile; endif;

    ?>
    
  </main>

<?php get_footer(); ?>
