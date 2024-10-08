<div <?php if (!empty($is_preview)) { echo 'id="logoGridComponent"'; } ?> class="pb__block pb__block-logo-grid-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">
  <div class="contain">
    
    <div class="row">

      <div class="col-xs-12 col-sm-8 col-md-offset-1 col-lg-6">

        <h4><?php the_sub_field( 'page_builder_logo_grid_section_title' ); ?></h4>

      </div>

    </div>
    
    <div class="row center-xs">
      <div class="col-xs-12 col-md-11">

        <?php include( locate_template( 'template-parts/components/logo-grid.php', false, false ) ); ?>

      </div>
    </div>
  </div>
</div>
