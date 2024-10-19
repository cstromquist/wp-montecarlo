<?php

/**
 * MC Awards  Block template.
 */
$main_image           = !empty(get_field('main_image')) ? get_field('main_image') : '';
$images               = !empty(get_field('images')) ? get_field('images') : '';
?>
<div class="container flex flex-col md:flex-row justify-between md:gap-12 border border-solid border-secondary rounded-lg p-8 bg-[#f7f7f7]">
  <div class="md:w-4/12 mb-4 md:mb-0">
    <?php if ($main_image) : ?>
      <img src="<?php echo esc_url($main_image['url']) ?>" alt="<?php echo esc_attr($main_image['alt']) ?>" class="w-full" />
    <?php endif; ?>
  </div>
  <div class="md:w-8/12 grid grid-cols-3 gap-8 md:justify-between">
    <?php if ($images) : ?>
      <?php foreach ($images as $i => $image) : ?>
        <div class="p-2 lg:p-6 bg-white rounded-lg border border-solid border-[#cdd9e1]">
          <img src="<?php echo esc_url($image['url']) ?>" alt="<?php echo $image['alt'] ?>" class="w-full" />
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
