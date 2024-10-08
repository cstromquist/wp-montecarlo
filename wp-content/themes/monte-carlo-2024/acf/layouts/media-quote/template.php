<div <?php if (!empty($is_preview)) { echo 'id="mediaQuoteComponent"'; } ?> class="pb__block pb__block-media-quote-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">
  <?php include( locate_template( 'template-parts/components/media-quote.php', false, false ) ); ?>
</div>
