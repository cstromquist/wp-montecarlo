<?php if ( have_rows( 'integrations_text_and_media_section' ) ) : ?>
  <?php while ( have_rows( 'integrations_text_and_media_section' ) ) : the_row(); ?>
    <section class="integrations-media-text contain">
      <?php if ( have_rows( 'integrations_media_and_text_block_media_and_text_object' ) ) : ?>
        <?php while ( have_rows( 'integrations_media_and_text_block_media_and_text_object' ) ) : the_row(); ?>

          <?php include( locate_template( 'template-parts/components/media-text.php', false, false ) ); ?>

        <?php endwhile; ?>
      <?php endif; ?>
    </section>
  <?php endwhile; ?>
<?php endif; ?>