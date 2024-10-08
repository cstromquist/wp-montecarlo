<?php 
  
  $testimonialHasTitle = get_sub_field( 'testimonials_add_section_title' );
  $testimonialLayout = get_sub_field( 'testimonial_comp_layout' );
  $styleClasses = $testimonialLayout;
  $removeBg = get_sub_field( 'testimonials_remove_background_color' );
  
  
  if ($removeBg == 1) {
    $styleClasses .= ' make-clear';
  } else {
    $styleClasses .= ' bg_deepSea';
  }
  
?>

<div class="comp_testimonials stretch <?php echo $styleClasses; ?>">
  
  <div class="contain">
    
    <?php 
      if ($testimonialHasTitle == 1) : 
        
        $titleClasses = 'testimonial_section-title';
        $textAlignment = get_sub_field( 'testimonials_title_alignment' );
        
        if ($textAlignment == 'center') {
          $titleClasses .= ' col-xs-12 col-md-10 col-md-offset-1 text-' . $textAlignment;
        } elseif ($textAlignment == 'right') {
          $titleClasses .= ' col-xs-12 col-md-10 col-md-offset-2 text-' . $textAlignment;
        } else {
          $titleClasses .= ' col-xs-12 col-md-10 text-' . $textAlignment;
        }
        
    ?>
        
      <div class="row">
        
        <div class="<?php echo $titleClasses; ?>">
          <p class="h2"><?php the_sub_field( 'testimonials_section_title' ); ?></p>
        </div>
      
      </div>

    <?php endif; ?>
    
    <div class="testimonial-wrap">
      <?php
        if ($testimonialLayout == 'single') {
          include( locate_template( 'template-parts/components/testimonials/single-col.php', false, false ) );
        } elseif ($testimonialLayout == 'double') {
          include( locate_template( 'template-parts/components/testimonials/two-col.php', false, false ) );
        } elseif ($testimonialLayout == 'triple') {
          include( locate_template( 'template-parts/components/testimonials/three-col.php', false, false ) );
        }
      ?>
    </div>
    
  </div>
  
</div>