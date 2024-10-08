<section class="featured-event-card contain">
  <?php 
    foreach ( $featuredPosts as $post ) : 
    setup_postdata( $post ); 
    
    $featuredId = get_the_id();
    $description = get_field( 'event_descrition' );
    $link = get_field('event_link');
    $date = get_field('event_dates');
    $location = get_field('event_location');
    $city = get_field('event_city');
    
  ?>
    <div class="row middle-sm">
      <div class="col-xs-12 col-md-6">
        <p class="text_ocean"><strong>Featured</strong></p>
        <h2><?php the_title(); ?></h2>
        <?php
          if ($description) {
            echo '<p class="p-sm description">'.$description.'</p>';
          }
        ?>
        <ul class="meta">
          <li class="meta-date">
            <span></span>
            <p class="p-sm">
              <?php 
              if ($date['start'] != $date['end']) {
                echo $date['start'] . ' - ' . $date['end'];
              } else {
                echo $date['start'];
              }
            ?>
            </p>
          </li>
          <?php
            if ($location != 'Virtual') {
              echo '<li class="meta-city"><span></span><p class="p-sm">'.$city.'</p></li>';
            }
          ?>
          <li class="meta-location">
            <span></span>
            <p class="p-sm">
              <?php echo $location; ?>
            </p>
          </li>
        </ul>
        <a href="<?php echo $link; ?>" target="_blank" class="btn btn-lg">Learn more</a>
      </div>
      <div class="col-xs-12 col-md-6 first-xs last-md">
        <div class="image img_3x2">
          <?php 
            if ( has_post_thumbnail()) : 
              $alt = get_the_post_thumbnail_caption();
              if (empty($alt)) {
                $alt = get_the_title();
              }
              the_post_thumbnail( array(579, 385), [ 'class' => 'disable-lazyload', 'alt' => esc_html ( $alt ) ] ); 
            endif; 
          ?>
        </div>
      </div>
    </div>
  <?php endforeach; wp_reset_postdata(); ?>
</section>
