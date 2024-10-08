<?php
/**
 * Block template file: /Users/tommy/Local Sites/montecarlo/app/public/wp-content/themes/monte-carlo-2023/template-parts/blocks/headline/headline.php
 *
 * Headline Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'headline-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-headline';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
  <div class="row">
    <div class="col">
      <div class="content <?php echo get_field( 'headline_block_content_alignment' ); ?>">
        <h2><?php echo get_field( 'headline_block_title' ); ?></h2>
        <?php echo get_field( 'headline_block_text' ); ?>
      </div>
      
      <?php if ( get_field( 'headline_block_add_an_image' ) == 1 ) : ?>
        <?php $headline_block_image = get_field( 'headline_block_image' ); ?>
        <?php if ( $headline_block_image ) : ?>
          <div class="img">
            <img src="<?php echo esc_url( $headline_block_image['url'] ); ?>" alt="<?php echo esc_attr( $headline_block_image['alt'] ); ?>" />
          </div>
        <?php endif; ?>
      <?php else : ?>
        <?php // echo 'false'; ?>
      <?php endif; ?>
      
      <?php if ( get_field( 'headline_block_add_a_cta' ) == 1 ) : ?>
        <?php $headline_block_cta_button = get_field( 'headline_block_cta_button' ); ?>
        <?php if ( $headline_block_cta_button ) : ?>
          <div class="cta-wrapper">
            <a class="btn btn-lg" href="<?php echo esc_url( $headline_block_cta_button['url'] ); ?>" target="<?php echo $headline_block_cta_button['target']; ?>" ><?php echo esc_html( $headline_block_cta_button['title'] ); ?></a>
          </div>
        <?php endif; ?>
      <?php else : ?>
        <?php // echo 'false'; ?>
      <?php endif; ?>
    </div>
  </div>
</section>