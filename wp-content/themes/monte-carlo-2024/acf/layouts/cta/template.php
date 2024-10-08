<div <?php if (!empty($is_preview)) { echo 'id="ctaComponent"'; } ?> class="pb__block pb__block-cta-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">
  <div class="contain">
    <div class="row">
      <div class="col-xs-11 col-md-10 col-md-offset-1">
        <?php include( locate_template( 'template-parts/components/cta-extended-component.php', false, false ) ); ?>
      </div>
    </div>
  </div>
</div>
