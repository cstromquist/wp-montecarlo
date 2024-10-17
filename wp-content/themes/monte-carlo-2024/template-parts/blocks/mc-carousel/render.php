<?php

/**
 * MC Carousel Block template.
 *
 * @param array $block The block settings and attributes.
 */

$carousel_items = !empty(get_field('carousel_items')) ? get_field('carousel_items') : '';
?>
<div class="container mx-auto flex flex-col pb-0 mt-10 pt-8 block-carousel-block mc-carousel">
  <div class="flex flex-row justify-between items-center inner-container">
    <div class="flex flex-col w-full md:w-1/2 text-primary [&>div>p]:text-gray md:pr-16">
      <?php foreach ($carousel_items as $i => $item) : ?>
        <div class="flex flex-col carousel-item cursor-pointer relative <?php echo $i == 0 ? 'active' : ''; ?>" data-slide="<?php echo $i ?>">
          <h4 class="text-2xl font-sans font-normal mb-2 mt-0 p-4"><?php echo esc_html($item['carousel_item_title']) ?></h4>
          <p class="content text-lg px-4"><?php echo esc_html($item['carousel_item_text']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="hidden md:block img flex flex-col w-1/2 relative transform-none">
      <?php foreach ($carousel_items as $i => $item) : ?>
        <img data-slide="<?php echo $i ?>" src="<?php echo esc_url($item['carousel_image']['url']) ?>" alt="<?php echo esc_attr($item['carousel_item_image']['alt']) ?>" class="w-full" />
      <?php endforeach; ?>
    </div>
  </div>
