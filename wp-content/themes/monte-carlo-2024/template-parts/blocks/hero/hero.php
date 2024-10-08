<?php
/**
 * Block template file: /Users/tommy/Local Sites/montecarlo/app/public/wp-content/themes/monte-carlo-2023/template-parts/blocks/hero/hero.php
 *
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 global $isPreview;
 
 $isPreview = $is_preview;
 
// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'tbc_block-hero block-layout hero-item';
$alignment = get_field( 'hero_block_content_alignment' );
$background = get_field( 'hero_block_color_picker' );

if ( ! empty( $alignment ) ) {
  $classes .= ' layout-' . $alignment;
}
if ( ! empty( $background ) ) {
  $classes .= ' bg_' . $background;
}
if ($is_preview) {
  $classes .= ' is__preview';
}

// ACF content fields
$hero_block_img_ratio = get_field( 'hero_block_image_ratio' );
$hero_block_image = get_field( 'hero_block_image' );
$size = array(480, 480);
$hero_block_title = get_field( 'hero_block_title' );
$hero_block_text = get_field( 'hero_block_text' );

// Set CTA up for block
$heroCtaItem = function() {
  global $isPreview;
  // Rather the CTA should be a button or a form
  $hero_block_cta_type = get_field( 'hero_block_show_a_cta_button_or_cta_form' );

  // CTA fields
  $hero_block_cta_button = get_field( 'hero_block_cta_button' );
  $hero_block_cta_form = get_field( 'hero_block_cta_form' );

  if ($hero_block_cta_type == 'form') {
    
    echo '<div class="cta">';
    if ($isPreview) {
      echo '<div class="block-display-message">Form will show on page render</div>';
    } else {
      echo do_shortcode($hero_block_cta_form);
    }
    echo '</div>';

  } else {

    if ($hero_block_cta_button) {
      echo '<div class="cta"><a class="btn btn-lg" href="'.esc_url( $hero_block_cta_button['url'] ).'" target="'.$hero_block_cta_button['target'].'" >'.$hero_block_cta_button['title'].'</a></div>';
    }

  }
}

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">

  <div class="contain">
    
    <?php if ( $alignment == 'center' ) : ?>
      
      <div class="row center-sm">
        <div class="col-xs-12 col-lg-10">

          <h1><?php echo $hero_block_title; ?></h1>

          <?php if (!empty($hero_block_text)) : ?>
            <div class="text">
              <?php echo $hero_block_text; ?>
            </div>
          <?php endif; ?>

          <?php $heroCtaItem(); ?>

        </div>
      </div>

    <?php else : ?>
      
      <div class="row middle-sm">
        <div class="col-xs-12 col-sm-6">
          <h1><?php echo $hero_block_title; ?></h1>

          <?php if (!empty($hero_block_text)) : ?>
            <div class="text">
              <?php echo $hero_block_text; ?>
            </div>
          <?php endif; ?>

          <?php $heroCtaItem(); ?>
        </div>
        <div class="hide-xs show-sm col-sm-1">

        </div>
        <div class="col-xs-12 col-sm-5 media">
          <div class="img-wrap <?php echo '_' . $hero_block_img_ratio; ?>">
            <?php
              if( $hero_block_image ) {
                echo wp_get_attachment_image( $hero_block_image, $size, "", array( "class" => "disable-lazyload" ) );
              }
            ?>
          </div>
        </div>
      </div>
      
    <?php endif; ?>
  
  </div>
  
</section>