<?php

/**
 * MC accordion Block template.
 *
 * NOTE: This package leverages the carousel.js library at assets/js/blocks/carousel.js
 * @param array $block The block settings and attributes.
 */

$accordion_items = !empty(get_field('accordion_items')) ? get_field('accordion_items') : '';
?>
<div class="container mx-auto flex flex-col pb-0 pt-8 block-carousel-block mc-accordion">
  <div class="flex flex-row justify-between items-center inner-container">
    <div class="flex flex-col w-full md:w-1/2 text-primary [&>div>p]:text-gray md:pr-16">
      <?php foreach ($accordion_items as $i => $item) : ?>
        <div class="flex flex-col carousel-item cursor-pointer px-4 md:px-0 relative <?php echo $i == 0 ? 'active' : ''; ?>" data-slide="<?php echo $i ?>">
          <h4 class="text-2xl font-sans font-normal md:p-4 mb-2 mt-0"><?php echo esc_html($item['accordion_item_title']) ?></h4>
          <p class="content text-lg md:px-4 mb-2"><?php echo esc_html($item['accordion_item_text']) ?></p>
          <p class="block md:hidden">
            <img data-slide="<?php echo $i ?>" src="<?php echo esc_url($item['accordion_image']['url']) ?>" alt="<?php echo esc_attr($item['accordion_item_image']['alt']) ?>" class="w-full" />
          </p>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="hidden md:block img flex flex-col w-1/2 relative transform-none">
      <?php foreach ($accordion_items as $i => $item) : ?>
        <img data-slide="<?php echo $i ?>" src="<?php echo esc_url($item['accordion_image']['url']) ?>" alt="<?php echo esc_attr($item['accordion_item_image']['alt']) ?>" class="w-full" />
      <?php endforeach; ?>
    </div>
  </div>
