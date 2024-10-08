<?php
  //This is just the meat of the component, be sure to wrap it in the if/while statement/
  // Alignment variables
  $mediaPosition = get_sub_field( 'media_text_component_image_position' );
  $mediaType = get_sub_field( 'media_text_component_media_type' );
  $media_Image = get_sub_field( 'media_text_component_image' );
  $mediaRatio = get_sub_field( 'media_text_component_media_aspect_ratio' );
  $mediaClasses = 'media-wrap';
  $alignTextClasses = '';
  $alignImgClasses = '';
  $listClasses = '';
  
  if ($mediaPosition == 'left') {
    $alignImgClasses = 'first-sm';
    $alignTextClasses = 'col-sm-offset-1';
  } else {
    $alignImgClasses = 'col-sm-offset-1';
  }
  
  if ($mediaType == 'video') {
    $mediaClasses .= ' img_16x9';
  } else {
    $mediaClasses .= ' img_' . $mediaRatio;
  }
  
  if ( get_sub_field( 'media_text_component_stylize_list_items' ) == 1 ) {
    $listClasses = 'styled';
  }

  if ( get_sub_field( 'media_text_component_under_each_other' ) == 1 ) {
    $listClasses .= ' under-each-other';
  }

?>

<div class="row middle-sm comp__media-text">
  
  <div class="col-xs-12 col-sm-6 <?php echo $alignTextClasses; ?>">
    
    <?php if ( get_sub_field( 'media_text_component_eyebrow' ) == 1 ) : ?>
      <?php $media_text_component_eyebrow_image = get_sub_field( 'media_text_component_eyebrow_image' ); ?>
      <?php if ( $media_text_component_eyebrow_image ) : ?>
        <div class="eyebrow-image">
          <img src="<?php echo esc_url( $media_text_component_eyebrow_image['url'] ); ?>" alt="<?php echo esc_attr( $media_text_component_eyebrow_image['alt'] ); ?>" />
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <p class="mt-title h3"><?php the_sub_field( 'media_text_component_title' ); ?></p>
    <div class="mt-content p-sm <?php echo $listClasses; ?>">
      <?php the_sub_field( 'media_text_component_copy' ); ?>
    </div>

  </div>
  
  <div class="col-xs-12 col-sm-5 <?php echo $alignImgClasses; ?>">
  
    <div class="<?php echo $mediaClasses; ?>">
      <?php if ($mediaType == 'video') : ?>
        <?php the_sub_field( 'media_text_component_video_url' ); ?>
      <?php else : ?>
        <?php if ( $media_Image ) : ?>
          <img width="600" height="600" loading="lazy" src="<?php echo esc_url( $media_Image['url'] ); ?>" alt="<?php echo esc_attr( $media_Image['alt'] ); ?>" />
        <?php endif; ?>
      <?php endif; ?>
    </div>
    
  </div>
    
</div>