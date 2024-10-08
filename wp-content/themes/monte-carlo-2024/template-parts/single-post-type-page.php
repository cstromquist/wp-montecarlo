<?php
        
  $postTypeClasses = 'contain';
          
  if ( has_block( 'acf/hero' ) || has_block( 'acf/form-hero' ) ) {
    $postTypeClasses .= ' no-spacer';
  } else {
    $postTypeClasses .= ' hero-spacer';
  }

?>

<article class="<?php echo $postTypeClasses; ?>">

  <div class="row">

    <div class="col-xs-12">

      <div class="post-copy">

        <?php the_content(); ?>

      </div>

    </div>

  </div>

</article>

<?php
  global $post;
  $checkField = get_field( 'page_related_resources_comp_related_resources', $post->ID );
  $checkForTitle = '';
  if (!is_null($checkField)) {
    $checkForTitle = $checkField['related_resource_1']['related_resource_title'];
  }
  if (!empty($checkForTitle)) :
    if ( have_rows( 'page_related_resources_comp_related_resources', $post->ID ) ) : 
      while ( have_rows( 'page_related_resources_comp_related_resources', $post->ID ) ) : the_row(); 
        include( locate_template( 'template-parts/components/related-resources.php', false, false ) );
      endwhile; 
    endif;
  else :
    if ( have_rows( 'home_related_resources_comp_related_resources', get_option( 'page_on_front' ) ) ) :
      while ( have_rows( 'home_related_resources_comp_related_resources', get_option( 'page_on_front' ) ) ) : the_row();
        include( locate_template( 'template-parts/components/related-resources.php', false, false ) ); 
      endwhile;
    endif;
  endif;
?>