<?php
/**
 *
 * Related Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'related-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-related-block';
if ( ! empty( $block['className'] ) ) {
  $classes .= ' ' . $block['className'];
}

$block_elements = get_field('related_block');

if ($block_elements) :
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">

    <?php
    if ( have_rows( 'related_block_comp_related_resources' ) ) :
        while ( have_rows( 'related_block_comp_related_resources' ) ) : the_row();
            include( locate_template( 'template-parts/components/related-resources.php', false, false ) );
        endwhile;
    endif;
    ?>

</section>


<?php
endif;
