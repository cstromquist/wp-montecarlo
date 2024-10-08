<?php get_header(); ?>

  <main role="main">
    
    <?php if ( is_post_type_archive('webinars')) : ?>
        
      <?php include( locate_template( 'template-parts/webinars/webinars-archive.php', false, false ) ); ?>
      
    <?php elseif ( is_post_type_archive('press') ) : ?>
        
      <?php include( locate_template( 'template-parts/press/press-archive.php', false, false ) ); ?>
      
    <?php elseif ( is_post_type_archive('events') ) : ?>
        
      <?php include( locate_template( 'template-parts/events/events-archive.php', false, false ) ); ?>
      
    <?php else : ?>
      
      <section id="content" role="main">
      <header class="header">
      <h1 class="entry-title"><?php 
      if ( is_day() ) { printf( __( 'Daily Archives: %s', 'blankslate' ), get_the_time( get_option( 'date_format' ) ) ); }
      elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'blankslate' ), get_the_time( 'F Y' ) ); }
      elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'blankslate' ), get_the_time( 'Y' ) ); }
      else { _e( 'Archives', 'blankslate' ); }
      ?></h1>
      </header>
    
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php endwhile; endif; ?>
      
      </section>
    
    <?php endif; ?>
  
  </main>
  
<?php get_footer(); ?>