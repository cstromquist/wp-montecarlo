<?php
/**
 * Block template file: /Users/tommy/Local Sites/montecarlo/app/public/wp-content/themes/monte-carlo-2023/template-parts/blocks/cards/cards.php
 *
 * Cards Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cards-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-cards-block';
if ( ! empty( $block['className'] ) ) {
  $classes .= ' ' . $block['className'];
}

$addTitle = get_field( 'cards_block_add_title' );
$addParagraph = get_field( 'cards_block_add_paragraph_text' );

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
  
  <?php if ( $addTitle == 1 || $addParagraph == 1 ) : ?>
    <div class="cards-header">
      <?php if ( $addTitle == 1 ) : ?>
        <div class="col-xs-11">
          <h2><?php echo get_field( 'cards_block_section_title' ); ?></h2>
        </div>
      <?php endif; ?>
      <?php if ( $addParagraph == 1 ) : ?>
        <div class="col-xs-10 col-sm-8 col-lg-6">
          <div class="section-text">
            <?php echo get_field( 'cards_block_section_text' ); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php 
    if ( have_rows( 'cards_block_card_items_comp__column_layout' ) ) : 
      while ( have_rows( 'cards_block_card_items_comp__column_layout' ) ) : the_row();
        include( locate_template( 'template-parts/components/columns-layout.php', false, false ) );
      endwhile; 
    endif; 
  ?>

  <?php if ( get_field( 'cards_block_add_section_cta' ) == 1 ) : ?>
    <?php $cards_block_section_cta = get_field( 'cards_block_section_cta' ); ?>
    <?php if ( $cards_block_section_cta ) : ?>
      <div class="row">
        <div class="col text-center">
          <div class="section-cta-wrap">
            <a class="btn btn-lg" href="<?php echo esc_url( $cards_block_section_cta['url'] ); ?>" target="<?php echo $cards_block_section_cta['target']; ?>" ><?php echo esc_html( $cards_block_section_cta['title'] ); ?></a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

</section>