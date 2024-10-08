<?php
/**
 * Block template file: /Users/tommy/Local Sites/montecarlo/app/public/wp-content/themes/monte-carlo-2023/template-parts/blocks/carousel/carousel.php
 *
 * Carousel Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'carousel-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-carousel-block';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}

// Create one array for images and one for copy
$imgArray = array();
$titleArray = array();
$copyArray = array();
if ( have_rows( 'carousel_block_carousel_items' ) ) :
  while ( have_rows( 'carousel_block_carousel_items' ) ) : the_row();
    $carousel_block_item_image = get_sub_field( 'carousel_block_item_image' );
    array_push($imgArray, $carousel_block_item_image);
    array_push($titleArray, get_sub_field( 'carousel_item_title' ));
    array_push($copyArray, get_sub_field( 'carousel_item_text' ));
  endwhile;
else :
endif;
?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> <?php echo get_field( 'carousel_block_content_alignment' ); ?>">
  <div class="row">
    <div class="col">
      <div class="inner-container">

        <div class="spacer hide-xs show-sm">
          <div class="img">
            <?php if ( count($imgArray) > 0 ) : ?>
              <?php $i = 0; ?>
              <?php while ( $i < count($imgArray) ) : ?>
                <?php $imgItem = $imgArray[$i] ?>
                <?php if ( $imgItem ) : ?>
                  <img data-slide="<?php echo $i ?>" class="<?php if($i == 0) { echo 'active'; } ?>" src="<?php echo esc_url( $imgItem['url'] ); ?>" alt="<?php echo esc_attr( $imgItem['alt'] ); ?>" />
                <?php endif; ?>
                <?php $i++; ?>
              <?php endwhile; ?>
            <?php else : ?>
              <?php // No rows found ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="item-list-container">
          <h3><?php echo get_field( 'carousel_block_title' ); ?></h3>
          <div class="content-container">
            <div class="indicator-bar">
              <div class="indicator"></div>
            </div>
            <ul class="list">
              <?php if ( count($imgArray) > 0 ) : ?>
                <?php $i = 0; ?>
                <?php while ( $i < count($imgArray) ) : ?>
                    <li data-slide="<?php echo $i ?>" class="<?php if($i == 0) { echo 'active'; } ?>">
                      <button class="h6"><?php echo $titleArray[$i] ?></button>
                      <div class="content">
                        <?php echo $copyArray[$i] ?>
                        <?php $imgItem = $imgArray[$i] ?>
                        <?php if ( $imgItem ) : ?>
                          <div class="img">
                            <img class="show-xs hide-sm" src="<?php echo esc_url( $imgItem['url'] ); ?>" alt="<?php echo esc_attr( $imgItem['alt'] ); ?>" />
                          </div>
                        <?php endif; ?>
                      </div>
                    </li>
                    <?php $i++; ?>
                <?php endwhile; ?>
              <?php else : ?>
                <?php // No rows found ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>