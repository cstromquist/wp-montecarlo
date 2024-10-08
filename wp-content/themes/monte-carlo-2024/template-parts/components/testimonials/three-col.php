<?php if ( have_rows( 'three_column_testimonial' ) ) : ?>
  <?php while ( have_rows( 'three_column_testimonial' ) ) : the_row(); ?>
  
    <?php 
      $layout = get_sub_field( 'triple_image_options' ); 
      $section_cta = get_sub_field( 'section_cta' );
    ?>
    
    <div class="row">
      
      <div class="col-xs-12 col-sm-4">
        <?php if ( have_rows( 'testimonial_1' ) ) : ?>
          <?php while ( have_rows( 'testimonial_1' ) ) : the_row(); ?>
            <?php 
              $first_primary_image = get_sub_field( 'first_primary_image' );
              $first_logo = get_sub_field( 'first_logo' );
              $addCta = get_sub_field( 'first_add_a_cta' );
              $first_testimonial_cta = get_sub_field( 'first_testimonial_cta' );
            ?>
            
            <?php if ($first_primary_image || $first_logo) : ?>
              <div class="testimonial-images">
                <?php if ( $first_primary_image ) : ?>
                  <div class="testimonial-primary">
                    <img src="<?php echo esc_url( $first_primary_image['url'] ); ?>" alt="<?php echo esc_attr( $first_primary_image['alt'] ); ?>" />
                  </div>
                <?php endif; ?>
                <?php if ( $first_logo ) : ?>
                  <div class="testimonial-logo">
                    <img src="<?php echo esc_url( $first_logo['url'] ); ?>" alt="<?php echo esc_attr( $first_logo['alt'] ); ?>" />
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            
            <div class="testimonial-content">
              <p class="quote"><?php the_sub_field( 'first_testimonial' ); ?></p>
              <div class="meta">
                <p class="quotee">
                  <span><?php the_sub_field( 'first_quotee' ); ?></span>
                  <span><?php the_sub_field( 'first_quotee_title_position' ); ?></span>
                </p>
                <?php if ( $first_testimonial_cta && $addCta == 1 ) : ?>
                  <div class="cta-wrap">
                    <a class="link link-lg" href="<?php echo esc_url( $first_testimonial_cta['url'] ); ?>" target="<?php echo $first_testimonial_cta['target']; ?>" ><?php echo esc_html( $first_testimonial_cta['title'] ); ?></a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      
      <div class="col-xs-12 col-sm-4">
        <?php if ( have_rows( 'testimonial_2' ) ) : ?>
          <?php while ( have_rows( 'testimonial_2' ) ) : the_row(); ?>
            <?php 
              $second_primary_image = get_sub_field( 'second_primary_image_3' );
              $second_logo = get_sub_field( 'second_logo_3' );
              $addCta = get_sub_field( 'second_add_a_cta' );
              $second_testimonial_cta = get_sub_field( 'second_testimonial_cta' );
            ?>

            <?php if ($second_primary_image || $second_logo) : ?>
              <div class="testimonial-images">
                <?php if ( $second_primary_image ) : ?>
                  <div class="testimonial-primary">
                    <img src="<?php echo esc_url( $second_primary_image['url'] ); ?>" alt="<?php echo esc_attr( $second_primary_image['alt'] ); ?>" />
                  </div>
                <?php endif; ?>
                <?php if ( $second_logo ) : ?>
                  <div class="testimonial-logo">
                    <img src="<?php echo esc_url( $second_logo['url'] ); ?>" alt="<?php echo esc_attr( $second_logo['alt'] ); ?>" />
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="testimonial-content">
              <p class="quote"><?php the_sub_field( 'second_testimonial' ); ?></p>
              <div class="meta">
                <p class="quotee">
                  <span><?php the_sub_field( 'second_quotee' ); ?></span>
                  <span><?php the_sub_field( 'second_quotee_title_position' ); ?></span>
                </p>
                <?php if ( $second_testimonial_cta && $addCta == 1 ) : ?>
                  <div class="cta-wrap">
                    <a class="link link-lg" href="<?php echo esc_url( $second_testimonial_cta['url'] ); ?>" target="<?php echo $second_testimonial_cta['target']; ?>" ><?php echo esc_html( $second_testimonial_cta['title'] ); ?></a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      
      <div class="col-xs-12 col-sm-4">
        <?php if ( have_rows( 'testimonial_3' ) ) : ?>
          <?php while ( have_rows( 'testimonial_3' ) ) : the_row(); ?>
            <?php 
              $third_primary_image = get_sub_field( 'third_primary_image' );
              $third_logo = get_sub_field( 'third_logo' );
              $addCta = get_sub_field( 'third_add_a_cta' );
              $third_testimonial_cta = get_sub_field( 'third_testimonial_cta' );
            ?>

            <?php if ($third_primary_image || $third_logo) : ?>
              <div class="testimonial-images">
                <?php if ( $third_primary_image ) : ?>
                  <div class="testimonial-primary">
                    <img src="<?php echo esc_url( $third_primary_image['url'] ); ?>" alt="<?php echo esc_attr( $third_primary_image['alt'] ); ?>" />
                  </div>
                <?php endif; ?>
                <?php if ( $third_logo ) : ?>
                  <div class="testimonial-logo">
                    <img src="<?php echo esc_url( $third_logo['url'] ); ?>" alt="<?php echo esc_attr( $third_logo['alt'] ); ?>" />
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="testimonial-content">
              <p class="quote"><?php the_sub_field( 'third_testimonial' ); ?></p>
              <div class="meta">
                <p class="quotee">
                  <span><?php the_sub_field( 'third_quotee' ); ?></span>
                  <span><?php the_sub_field( 'third_quotee_title_position' ); ?></span>
                </p>
                <?php if ( $third_testimonial_cta && $addCta == 1 ) : ?>
                  <div class="cta-wrap">
                    <a class="link link-lg" href="<?php echo esc_url( $third_testimonial_cta['url'] ); ?>" target="<?php echo $third_testimonial_cta['target']; ?>" ><?php echo esc_html( $third_testimonial_cta['title'] ); ?></a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    
    </div>
    
    <?php if ( $section_cta && get_sub_field( 'add_a_section_cta' ) == 1 ) : ?>
      <div class="row center-xs">
        <div class="col-xs-12 text-center">
          <div class="section-cta-wrap">
             <a class="btn btn-lg" href="<?php echo esc_url( $section_cta['url'] ); ?>" target="<?php echo $section_cta['target']; ?>" ><?php echo esc_html( $section_cta['title'] ); ?></a>
          </div>
        </div>
      </div>
    <?php endif; ?>
    
  <?php endwhile; ?>
<?php endif; ?>