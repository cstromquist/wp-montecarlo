<?php

/**
 * @package MC Carousel Block
 *
 */
$carousel_items         = !empty(get_field('carousel_items')) ? get_field('carousel_items') : '';
?>
<div class="container text-center">
  <?php foreach ($carousel_items as $item) : ?>
    <div class="flex flex-col justify-center gap-8 p-4">
      <p class="text-xl text-gray mb-0 w-full md:w-[575px] mx-auto"><?php echo esc_html($item['text']); ?></p>
      <!-- logo -->
      <?php if ($item['logo']) : ?>
        <div class="w-44 mx-auto">
          <img src="<?php echo esc_url($item['logo']['url']); ?>" alt="<?php echo esc_attr($item['logo']['alt']); ?>" class="w-auto mx-auto" />
        </div>
      <?php endif; ?>
      <!-- subtext -->
      <?php if ($item['subtext']) : ?>
        <p class="text-sm text-gray w-full md:w-[500px] mx-auto"><?php echo esc_html($item['subtext']); ?></p>
      <?php endif; ?>
      <!-- link -->
      <?php if ($item['link']) : ?>
        <div>
          <a class="font-serif text-primary border-b-secondary border-solid border-b-2" href="<?php echo esc_url($item['link']['url']); ?>" class="text-blue-500 hover:text-blue-700"><?php echo esc_html($item['link']['title']); ?></a>
        </div>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
</div>
