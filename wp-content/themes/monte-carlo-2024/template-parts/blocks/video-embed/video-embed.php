<?php
/**
 * Block template file: /Users/tommy/Local Sites/montecarlo/app/public/wp-content/themes/monte-carlo-2023/template-parts/blocks/video-embed/video-embed.php
 *
 * Video Embed Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'video-embed-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-video-embed';
if ( ! empty( $block['className'] ) ) {
  $classes .= ' ' . $block['className'];
}

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">

  <div class="row center-xs">
    <div class="col-xs-12 col-sm-10 col-md-11 col-lg-10 text-center">
      <h2><?php echo get_field( 'video_embed_title' ); ?></h2>
    </div>
  </div>
  
  <div class="row center-xs">
    <div class="col-xs-12 text-center">
      <div class="responsive-embed">
        <?php echo get_field( 'video_embed_url' ); ?>
      </div>
      <?php if ( get_field( 'video_embed_add_cta' ) == 1 ) : ?>
        <?php $video_embed_cta = get_field( 'video_embed_cta' ); ?>
        <?php if ( $video_embed_cta ) : ?>
          <div class="button-wrap">
            <a class="btn btn-lg" href="<?php echo esc_url( $video_embed_cta['url'] ); ?>" target="<?php echo $video_embed_cta['target']; ?>" ><?php echo esc_html( $video_embed_cta['title'] ); ?></a>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>

</section>