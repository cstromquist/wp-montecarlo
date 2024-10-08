<?php 

  //This is just the meat of the component, be sure to wrap it in the if/while statement/
  
  //Secction title
  $addTitle = get_sub_field( 'add_a_section_title' );
  $title = get_sub_field( 'comp_logo_carousel_section_title' );
  $titleClass = 'title';
  //Options
  $optionClasses = 'logos-container';
  $animated = get_sub_field( 'comp_logo_carousel_enable_scrolling' );
  $monochrome = get_sub_field( 'comp_logo_carousel_make_logos_black_and_white' );
  if ($animated == 1) {
    $optionClasses .= ' animate_scroll';
    $titleClass .= ' h5';
  } else {
    $titleClass .= ' h2';
  }
  if ($monochrome == 1) {
    $optionClasses .= ' monochrome';
  } 
  //Logos
  $comp_logo_carousel_logos_images = get_sub_field( 'comp_logo_carousel_logos' );
  
  // CTA
  $comp_logo_carousel_section_cta = get_sub_field( 'comp_logo_carousel_section_cta' );

?>

<div class="comp__logo-grid">

  <?php if ( $addTitle == 1 ) : ?>
    
    <div class="contain">
      <div class="row center-xs">
        <div class="col-xs-12 col-lg-11 text-center">
          <p class="<?php echo $titleClass; ?>"><?php echo $title; ?></p>
        </div>
      </div>
    </div>

  <?php endif; ?>

  <?php if ( $comp_logo_carousel_logos_images ) :  ?>
    
    <div class="<?php echo $optionClasses; ?>">
      <ul>
        <?php foreach ( $comp_logo_carousel_logos_images as $comp_logo_carousel_logos_image ) : ?>

          <li class="logo-item">
            <?php if ( $comp_logo_carousel_logos_image ) : ?>
              <div class="fit">
                <img src="<?php echo esc_url( $comp_logo_carousel_logos_image['url'] ); ?>" alt="<?php echo esc_attr( $comp_logo_carousel_logos_image['alt'] ); ?>" />
              </div>
            <?php endif; ?>
          </li>

        <?php endforeach; ?>
      </ul>
    </div>
    
  <?php endif; ?>
  
  <div class="contain">
    <div class="row">
      <div class="col-xs-12">
        <?php if ( $comp_logo_carousel_section_cta ) : ?>
          <div class="cta-wrap">
            <a class="btn btn-lg" href="<?php echo esc_url( $comp_logo_carousel_section_cta['url'] ); ?>" target="<?php echo $comp_logo_carousel_section_cta['target']; ?>" ><?php echo esc_html( $comp_logo_carousel_section_cta['title'] ); ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  
</div>
