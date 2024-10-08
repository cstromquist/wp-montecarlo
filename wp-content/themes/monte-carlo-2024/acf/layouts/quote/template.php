<div <?php if (!empty($is_preview)) { echo 'id="quoteComponent"'; } ?> class="pb__block pb__block-quote-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">
  <div class="contain">
    <div class="row center-md">
      <div class="col-xs-12 col-md-10">
        <?php include( locate_template( 'template-parts/components/quote-testimonial.php', false, false ) ); ?>
      </div>
    </div>
  </div>
</div>
