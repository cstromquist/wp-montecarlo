<?php
/**
 * Block template file: /Users/tommy/Local Sites/montecarlo/app/public/wp-content/themes/monte-carlo-2023/template-parts/blocks/logos/logos.php
 *
 * Logo Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'logo-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-logo-block';
if ( ! empty( $block['className'] ) ) {
  $classes .= ' ' . $block['className'];
}

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
  <?php if ( have_rows( 'logos_layout_block_comp_logo_carousel' ) ) : ?>
    <?php while ( have_rows( 'logos_layout_block_comp_logo_carousel' ) ) : the_row(); ?>
      <?php include( locate_template( 'template-parts/components/logo-grid.php', false, false ) ); ?>
    <?php endwhile; ?>
  <?php endif; ?>
</section>