<div <?php if (!empty($is_preview)) { echo 'id="mediaTextComponent"'; } ?> class="pb__block pb__block-media-text-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">
  <?php include( locate_template( 'template-parts/components/media-text.php', false, false ) ); ?>
</div>
