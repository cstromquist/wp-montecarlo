<?php

  if ( have_rows( 'webinars_page_hero_row', 'option' ) ) :
    while ( have_rows( 'webinars_page_hero_row', 'option' ) ) : the_row();

    // Create class attribute allowing for custom "className" and "align" values.
    $classes = 'tbc_block-hero hero-item block-layout';
    $alignment = get_sub_field( 'hero_block_content_alignment' );
    $background = get_sub_field( 'hero_block_color_picker' );

    if ( ! empty( $alignment ) ) {
      $classes .= ' layout-' . $alignment;
    }
    if ( ! empty( $background ) ) {
      $classes .= ' bg_' . $background;
    }

    // ACF content fields
    $hero_block_img_ratio = get_sub_field( 'hero_block_image_ratio' );
    $hero_block_image = get_sub_field( 'hero_block_image' );
    $hero_block_title = get_sub_field( 'hero_block_title' );
    $hero_block_text = get_sub_field( 'hero_block_text' );

    // Set CTA up for block
    $heroCtaItem = function() {

      // Rather the CTA should be a button or a form
      $hero_block_cta_type = get_sub_field( 'hero_block_show_a_cta_button_or_cta_form' );

      // CTA fields
      $hero_block_cta_button = get_sub_field( 'hero_block_cta_button' );
      $hero_block_cta_form = get_sub_field( 'hero_block_cta_form' );

      if ($hero_block_cta_type == 'form') {
        
        echo '<div class="cta">';
        echo do_shortcode($hero_block_cta_form);
        echo '</div>';

      } else {

        if ($hero_block_cta_button) {
          echo '<div class="cta"><a class="btn btn-lg" href="'.esc_url( $hero_block_cta_button['url'] ).'" target="'.$hero_block_cta_button['target'].'" >'.$hero_block_cta_button['title'].'</a></div>';
        }

      }
    }

?>

<section class="<?php echo esc_attr( $classes ); ?>">

  <div class="contain">
    
    <?php if ( $alignment == 'center' ) : ?>
      
      <div class="row center-sm">
        <div class="col-xs-12 col-sm-10 col-lg-8">

          <h1><?php echo $hero_block_title; ?></h1>

          <?php if (!empty($hero_block_text)) : ?>
            <div class="text">
              <?php echo $hero_block_text; ?>
            </div>
          <?php endif; ?>

          <?php $heroCtaItem(); ?>

        </div>
      </div>

    <?php else : ?>
      
      <div class="row middle-sm">
        <div class="col-xs-12 col-sm-6">
          <h1><?php echo $hero_block_title; ?></h1>

          <?php if (!empty($hero_block_text)) : ?>
            <div class="text">
              <?php echo $hero_block_text; ?>
            </div>
          <?php endif; ?>

          <?php $heroCtaItem(); ?>
        </div>
        <div class="hide-xs show-sm col-sm-1">

        </div>
        <div class="col-xs-12 col-sm-5 media">
          <div class="img-wrap <?php echo '_' . $hero_block_img_ratio; ?>">
            <img src="<?php echo esc_url( $hero_block_image['url'] ); ?>" alt="<?php echo esc_attr( $hero_block_image['alt'] ); ?>" />
          </div>
        </div>
      </div>
      
    <?php endif; ?>
  
  </div>
  
</section>

<?php endwhile; endif; ?>

<?php
  $featuredId = [];
  $today = date("Ymd");
  $featuredWebinar = get_posts(array(
    'numberposts' => 1,
    'post_type'   => 'webinars',
    'post_status' => 'publish',
    'tax_query' => array(
      array(
        'taxonomy' => 'webinar-type',
        'field'    => 'slug',
        'terms'    => 'featured'
      )
    ),
    'meta_query'  => array(
      array(
        'key'     => 'webinar_date',
        'value'   => $today,
        'compare' => '>='
      )
    ),
  ));
  
  if ($featuredWebinar) {
    include( locate_template( 'template-parts/webinars/featured-webinar.php', false, false ) );
  } else {
    echo '<div class="no-featured"></div>';
  }
  
  $allArgs = array(
    'numberposts' => -1,
    'post_type'   => 'webinars',
    'post_status' => 'publish',
    'exclude'     => $featuredId,
    'meta_key'    => 'webinar_date',
    'orderby'     => 'meta_value',
    'order'       => 'ASC',
    'meta_query'  => array(
      array(
        'key'     => 'webinar_date',
        'value'   => $today,
        'compare' => '>='
      )
    ),
  );
  $allWebinars = get_posts($allArgs);
  
?>

<section class="webinar-posts">
  <div class="contain">
    
    <div class="row">
      <div class="col-xs-12">
        <div class="webinars-container">
          <div class="webinars-filter filters-button-group">
            <?php
              $terms = get_terms(array(
                'taxonomy' => 'webinar-type',
                'exclude'  => 201
              ));
              if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                echo '<button class="filter-btn is-checked" data-filter="*">All webinars</button>';
                foreach ( $terms as $term ) {
                  echo '<button class="filter-btn" data-filter="'.$term->term_id.'">' . $term->name . '</button>';
                }
              }
            ?>
          </div>
          <div class="webinars">
            <?php 
              foreach ($allWebinars as $post) : 
                setup_postdata( $post ); 
                $description = get_field( 'webinar_description' );
                $link = get_field('webinar_url');
                $date = get_field('webinar_date');
            ?>
              <div class="webinar-item shadow-card" data-filterId="<?php echo tax_list_nolinks(' ', 'id'); ?>">
                <div class="image img_3x2">
                  <?php 
                    if ( has_post_thumbnail()) : 
                      $alt = get_the_post_thumbnail_caption();
                      if (empty($alt)) {
                        $alt = get_the_title();
                      }
                      the_post_thumbnail( array(375, 480), [ 'alt' => esc_html ( $alt ) ] );
                    else :
                      echo '<img src="'.get_template_directory_uri().'/assets/img/event-card.webp" alt="'.get_the_title().'">';
                    endif; 
                  ?>
                </div>
                <div class="content">
                  <p class="m2"><?php the_title(); ?></p>
                  <?php
                    if ($description) {
                      echo '<p class="p-b5 description">'.$description.'</p>';
                    }
                  ?>
                  <ul class="meta">
                    <li class="meta-date">
                      <span></span>
                      <p>
                        <?php echo $date; ?>
                      </p>
                    </li>
                    <li class="meta-location">
                      <span></span>
                      <p>
                        <?php echo tax_list_nolinks(',', 'name'); ?>
                      </p>
                    </li>
                  </ul>
                  <span class="faux-a btn btn-sm">Learn more</span>
                </div>
                <a href="<?php echo $link; ?>" target="_blank"><span class="sr-only">Learn more</span></a>
              </div>
            <?php endforeach; wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-12">
        <?php if ( have_rows( 'webinars_page_banner_comp_banner', 'option' ) ) : ?>
          <?php while ( have_rows( 'webinars_page_banner_comp_banner', 'option' ) ) : the_row(); ?>
            <?php include( locate_template( 'template-parts/components/banner.php', false, false ) ); ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  
  </div>
</section>

<?php
  global $post;
  $checkField = get_field( 'webinars_page_related_resources_comp_related_resources', 'option' );
  $checkForTitle = '';
  if (!is_null($checkField)) {
    $checkForTitle = $checkField['related_resource_1']['related_resource_title'];
  }
  if (!empty($checkForTitle)) :
    if ( have_rows( 'webinars_page_related_resources_comp_related_resources', 'option' ) ) : 
      while ( have_rows( 'webinars_page_related_resources_comp_related_resources', 'option' ) ) : the_row(); 
        include( locate_template( 'template-parts/components/related-resources.php', false, false ) );
      endwhile;
    endif;
  else :
    if ( have_rows( 'blog_related_resources_comp_related_resources', 174 ) ) :
      while ( have_rows( 'blog_related_resources_comp_related_resources', 174 ) ) : the_row();
        include( locate_template( 'template-parts/components/related-resources.php', false, false ) );
      endwhile;
    endif;
  endif;
?>
