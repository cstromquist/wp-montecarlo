<?php 
  //This is just the meat of the component, be sure to wrap it in the if/while statement/
    
  // Box media styles
  $containerWidth = get_sub_field( 'cards_container_size' );
  $colCount = get_sub_field( 'cards_column_count' );
  $addMedia = get_sub_field( 'add_image_to_boxes' );
  $imgAspect = get_sub_field( 'image_aspect_ratio' );
  $imgSizing = get_sub_field( 'image_sizing');
  
  $componentClasses = 'comp__columns-layout ' . $containerWidth . ' ' . $colCount;
  
  if ( count(get_sub_field('layout_items')) == 5 ) {
    $componentClasses .= ' centered-layout';
  }
  
  if ($imgSizing == 1) {
    $imgAspect .= ' contained';
  }
    
  // Box CTA
  $boxHasLink = get_sub_field( 'add_a_cta_to_each_box' );
  $btnStyle = get_sub_field( 'box_cta_style' );
  
  if ( str_contains($btnStyle, 'btn') ) {
    $btnStyle .= ' btn';
  } else {
    $btnStyle .= ' link';
  }

?>

<?php if ( have_rows( 'layout_items' ) ) : ?>
  <div class="<?php echo $componentClasses; ?>">
  
    <?php while ( have_rows( 'layout_items' ) ) : the_row(); ?>
      <?php $link = get_sub_field( 'layout_button_link' ); ?>
    
      <div class="card_box">
      
        <div class="box-contain">
          
          <?php if ($addMedia == 1) : ?>
            <div class="box-media _<?php echo $imgAspect; ?>">
              <?php $media = get_sub_field( 'media' ); ?>
              <?php if ( $media ) : ?>
                <?php if ( $boxHasLink == 1 ) : ?>
                  <?php if ( $link ) : ?>

                    <a class="plain" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo $link['target']; ?>" >
                      <img loading="lazy" src="<?php echo esc_url( $media['url'] ); ?>" alt="<?php echo esc_attr( $media['alt'] ); ?>" />
                    </a>

                  <?php endif; ?>
                <?php else : ?>
                  <img loading="lazy" src="<?php echo esc_url( $media['url'] ); ?>" alt="<?php echo esc_attr( $media['alt'] ); ?>" />
                <?php endif; ?>

              <?php endif; ?>
            </div>
          <?php endif; ?>
          
          <div class="box-content">
            
            <div class="box-title">
              
              <?php if ( $boxHasLink == 1 ) : ?>
                <?php if ( $link ) : ?>

                  <a class="plain" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo $link['target']; ?>" >
                    <p class=""><?php the_sub_field( 'layout_item_title' ); ?></p>
                  </a>

                <?php endif; ?>
              <?php else : ?>
                <p class=""><?php the_sub_field( 'layout_item_title' ); ?></p>
              <?php endif; ?>

            </div>
            
            <div class="box-copy">
              <?php the_sub_field( 'text' ); ?>
            </div>
            
            <?php if ( $boxHasLink == 1 ) : ?>
              <?php if ( $link ) : ?>
                <div class="button-wrap">
                  <a class="<?php echo $btnStyle; ?>" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo $link['target']; ?>" ><?php echo esc_html( $link['title'] ); ?></a>
                </div>
              <?php endif; ?>

            <?php endif; ?>
            
          </div>
        
        </div>
        
      </div>
      
    <?php endwhile; ?>
    
  </div>	
<?php endif; ?>
