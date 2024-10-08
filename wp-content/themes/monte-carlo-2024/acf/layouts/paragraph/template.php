<div <?php if (!empty($is_preview)) { echo 'id="paragraphComponent"'; } ?> class="pb__block pb__block-paragraph-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">
  <?php include( locate_template( 'template-parts/components/paragraph.php', false, false ) ); ?>
</div>
