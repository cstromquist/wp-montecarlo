<div <?php if (!empty($is_preview)) { echo 'id="carouselComponent"'; } ?> class="pb__block pb__block-carousel-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">
  
  <?php include( locate_template( 'template-parts/components/pb-carousel-component.php', false, false ) ); ?>

</div>
