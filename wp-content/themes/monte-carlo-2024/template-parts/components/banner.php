<?php $bgColor = get_sub_field( 'banner_background_color_picker' ); ?>

<div class="comp_banner-cta bg_<?php echo $bgColor; if ( get_sub_field( 'add_an_image' ) == 1 ) { echo ' has-image'; } ?>">

  <div class="row middle-sm">
    <div class="col-xs-12">
      <div class="banner-wrap">

        <?php $image = get_sub_field( 'image' ); ?>
        <?php if ( $image ) : ?>
          <div class="img">
            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
          </div>
        <?php endif; ?>

        <div class="content">
          <p class="h3"><?php the_sub_field( 'callout_text' ); ?></p>
          <?php if ( get_sub_field( 'add_secondary_text' ) == 1 ) : ?>
            <?php // echo 'true'; ?>
            <p><?php the_sub_field( 'callout_text_secondary' ); ?></p>
          <?php else : ?>
            <?php // echo 'false'; ?>
          <?php endif; ?>
        </div>

        <div class="cta-container">
          <?php $cta_button = get_sub_field( 'cta_button' ); ?>
          <?php if ( $cta_button ) : ?>
            <a class="btn btn-lg" href="<?php echo esc_url( $cta_button['url'] ); ?>" target="<?php echo $cta_button['target']; ?>" ><?php echo esc_html( $cta_button['title'] ); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
    
</div>