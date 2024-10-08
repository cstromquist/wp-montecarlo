<?php if ( have_rows( 'single_column_testimonial' ) ) : ?>
  <?php while ( have_rows( 'single_column_testimonial' ) ) : the_row(); ?>
    
    <?php 
      $layout = get_sub_field( 'single_image_options' );
      $primary_image = get_sub_field( 'primary_image' );
      $logo_img = get_sub_field( 'logo_img' );
      
      $testimonialContent = function() {
        
        $quote = get_sub_field( 'single_testimonial' );
        $quotee = get_sub_field( 'single_quotee' );
        $position = get_sub_field( 'quotee_title_position' );
        $addCta = get_sub_field( 'add_a_cta_to_the_block' );
        $single_bottom_cta = get_sub_field( 'single_bottom_cta' );
        
        echo '<p class="h5 quote">'.$quote.'</p>
              <p class="quotee">
                <span>'.$quotee.'</span>
                <span>'.$position.'</span>
              </p>';
              
        if ( $single_bottom_cta && $addCta == 1 ) {
          echo '<div class="cta-wrap">
                  <a class="link link-lg" href="'.esc_url( $single_bottom_cta['url'] ).'" '.$single_bottom_cta['target'].' >'.$single_bottom_cta['title'].'</a>
                </div>';
        }
              
      }
      
    ?>
    
    <div class="row">
      <div class="col-xs-12 single_testimonial">
        
        <?php // Both image types are selected ?>
        <?php if ($layout == 'both') : ?>
          <div class="with_primary">
            <div class="testimonial-images">
              <?php if ( $primary_image ) : ?>
                <div class="testimonial-primary">
                  <img src="<?php echo esc_url( $primary_image['url'] ); ?>" alt="<?php echo esc_attr( $primary_image['alt'] ); ?>" />
                </div>
              <?php endif; ?>
              <?php if ( $logo_img ) : ?>
                <div class="testimonial-logo">
                  <img src="<?php echo esc_url( $logo_img['url'] ); ?>" alt="<?php echo esc_attr( $logo_img['alt'] ); ?>" />
                </div>
              <?php endif; ?>
            </div>
            <div class="testimonial-content">
              <?php $testimonialContent(); ?>
            </div>
          </div>
        <?php // Only logo image is selected or no image at all ?>
        <?php else : ?>
          <div class="no_primary">
            <?php if ( $logo_img ) : ?>
              <div class="testimonial-logo">
                <img src="<?php echo esc_url( $logo_img['url'] ); ?>" alt="<?php echo esc_attr( $logo_img['alt'] ); ?>" />
              </div>
            <?php endif; ?>
            <div class="testimonial-content">
              <?php $testimonialContent(); ?>
            </div>
          </div>
        <?php endif; ?>
      
      </div>
    </div>
    
  <?php endwhile; ?>
<?php endif; ?>