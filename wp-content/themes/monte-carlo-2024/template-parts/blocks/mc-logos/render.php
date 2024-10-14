<?php
/**
 * MC Logos Block template.
 *
 * @param array $block The block settings and attributes.
 */

$images = !empty(get_field('images')) ? get_field('images') : '';
?>
<div class="mc-logos relative container px-4 sm:px-6 lg:px-10 lg:py-10 bg-white xl:rounded-lg md:-mt-20 flex justify-around flex-wrap shadow-xl">
  <?php foreach ($images as $image) : ?>
  <div class="w-1/3 sm:w-1/4 md:w-1/5 lg:w-1/6 xl:w-1/7 p-4">
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="h-auto" />
  </div>
  <?php endforeach; ?>
</div>
