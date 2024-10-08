<div class="contain comp__form-hero">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-lg-5">
      <div class="content">
        <h1><?php echo get_sub_field( 'comp_form_hero_title' ); ?></h1>
        <div class="text">
          <?php echo get_sub_field( 'comp_form_hero_text' ); ?>
        </div>
        <?php 
          $comp_form_hero_image = get_sub_field( 'comp_form_hero_image' );
          $size = array(480, 480);
          
          if ( $comp_form_hero_image ) {
            echo wp_get_attachment_image( $comp_form_hero_image, $size, "", array( "class" => "disable-lazyload" ) );
          } 
        ?>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-offset-1">
      <div class="hero-form cta <?php echo get_sub_field( 'comp_form_hero_form_columns' ); ?>">
        <?php echo get_sub_field( 'comp_form_hero_hubspot_shortcode' ); ?>
      </div>
    </div>
  </div>
</div>