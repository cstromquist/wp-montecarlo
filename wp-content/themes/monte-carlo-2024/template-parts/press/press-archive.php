<?php

  if ( have_rows( 'press_page_hero_row', 'option' ) ) :
    while ( have_rows( 'press_page_hero_row', 'option' ) ) : the_row();

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
        
        echo do_shortcode($hero_block_cta_form);

      } else {

        if ($hero_block_cta_button) {
          echo '<a class="btn btn-lg" href="'.esc_url( $hero_block_cta_button['url'] ).'" target="'.$hero_block_cta_button['target'].'" >'.$hero_block_cta_button['title'].'</a>';
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

          <div class="cta">
            <?php $heroCtaItem(); ?>
          </div>

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

          <div class="cta">
            <?php $heroCtaItem(); ?>
          </div>
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

<section class="press-posts">
  <div class="contain">
        
    <div class="row press-row">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="col-xs-12 col-sm-4">
          <div class="press-card">
            <a class="plain" target="_blank" href="<?php echo esc_url(get_field( 'press_article_link' )); ?>">
              <div>
                <?php $press_logo = get_field( 'press_logo' ); ?>
                <?php if ( $press_logo ) : ?>
                  <div class="image">
                    <img src="<?php echo esc_url( $press_logo['url'] ); ?>" alt="<?php echo esc_attr( $press_logo['alt'] ); ?>" />
                  </div>
                <?php endif; ?>
                <h3 class="m1"><?php the_title(); ?></h3>
                <?php 
                  $pressDate = get_field( 'press_release_date' );
                  if ($pressDate) : 
                ?>
                  <p class="press-date"><?php echo $pressDate; ?></p>
                <?php endif; ?>
                <span class="faux-a btn btn-sm">Read more</span>
              </div>
            </a>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
    
    <div class="row center-xs">
      <div class="col-xs-12">
        <div class="press-pagination">
          <?php bones_page_navi(); ?>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-12">
        <?php if ( have_rows( 'press_page_banner_comp_banner', 'option' ) ) : ?>
          <?php while ( have_rows( 'press_page_banner_comp_banner', 'option' ) ) : the_row(); ?>
            <?php include( locate_template( 'template-parts/components/banner.php', false, false ) ); ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  
  </div>
</section>

<?php
  global $post;
  $checkField = get_field( 'press_page_related_resources_comp_related_resources', 'option' );
  $checkForTitle = '';
  if (!is_null($checkField)) {
    $checkForTitle = $checkField['related_resource_1']['related_resource_title'];
  }
  if (!empty($checkForTitle)) :
    if ( have_rows( 'press_page_related_resources_comp_related_resources', 'option' ) ) : 
      while ( have_rows( 'press_page_related_resources_comp_related_resources', 'option' ) ) : the_row(); 
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
