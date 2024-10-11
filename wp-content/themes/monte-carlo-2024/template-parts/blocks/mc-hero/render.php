<?php

/**
 * MC Hero Block template.
 *
 * @param array $block The block settings and attributes.
 */

$justify_hash = array(
  'left' => 'start',
  'center' => 'center',
  'right' => 'end',
);
$flex_hash = array(
  'left' => 'flex-row',
  'center' => 'flex-col',
  'right' => 'flex-row-reverse',
);
// Load values and assign defaults.
$heading             = !empty(get_field('heading')) ? get_field('heading') : 'Your heading here...';
$subheading          = !empty(get_field('subheading')) ? get_field('subheading') : 'Your subheading here...';
$alignment           = !empty(get_field('alignment')) ? get_field('alignment') : 'left';
$image               = !empty(get_field('image')) ? get_field('image') : '';

?>
<div class="bg-gradient-to-b from-[#0073b4] to-[#005180]">
  <div class="flex min-h-[700px] max-w-screen-xl mx-auto px-4 items-center gap-2 pt-28 <?php echo esc_html($flex_hash[$alignment]); ?>">
    <div class="flex flex-col w-7/12 pl-6">
      <h1 class="text-6xl leading-[70px] text-white"><?php echo nl2br($heading); ?></h1>
      <h2 class="text-xl font-normal text-white lg:pt-6 m-0"><?php echo nl2br($subheading); ?></h2>
      <div class="flex align-middle py-8 space-x-6 justify-<?php echo $justify_hash[$alignment] ?>">
        <a href="/request-a-demo" class="bg-[#eda600] px-8 py-2 rounded-full text-[#1d4b67] hover:text-[white]">Take a product tour</a>
        <a href="#" class="border-[#eda600] border border-solid px-10 py-2 text-white hover:text-[#eda600] rounded-full">Request a demo</a>
      </div>
    </div>
    <?php if ($image && $alignment !== 'center') : ?>
    <div class="w-5/12 -mt-10 -ml-8"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="h-auto" /></div>
    <?php endif; ?>
  </div>
</div>
