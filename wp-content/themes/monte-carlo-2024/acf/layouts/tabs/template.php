<div <?php if (!empty($is_preview)) { echo 'id="tabsComponent"'; } ?> class="pb__block pb__tabs-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">
  <div class="contain">
    <div class="row center-md">
      <div class="col-xs-12 col-md-10">
        <?php include( locate_template( 'template-parts/components/tabs-component.php', false, false ) ); ?>
      </div>
    </div>
  </div>
</div>
