<?php get_header(); ?>

  <main <?php post_class('post-content'); ?> role="main">

    <?php

      if ( have_posts() ) : while ( have_posts() ) : the_post();
      
        $title = get_the_title();

    ?>
    
      <article>
        
        <div class="contain">
          <div class="row center-sm">
            <div class="col-xs-12 col-sm-10 col-md-8">
              <br><br><br><br><br><br><br><br><br><br>
              <h1><?php echo $title; ?></h1>
            </div>
          </div>
        </div>
        
        <?php if ( have_rows( 'testimonial_component' ) ) : ?>
          <?php while ( have_rows( 'testimonial_component' ) ) : the_row(); ?>
            <?php include( locate_template( 'template-parts/components/testimonials.php', false, false ) ); ?>
          <?php endwhile; ?>
        <?php endif; ?>
        
      </article>

    <?php endwhile; endif; ?>

  </main>

<?php get_footer(); ?>
