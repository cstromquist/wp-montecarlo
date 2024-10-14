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
$cta1_text           = !empty(get_field('cta1_text')) ? get_field('cta1_text') : 'Cta 1 text goes here...';
$cta2_text           = !empty(get_field('cta2_text')) ? get_field('cta2_text') : 'Cta 2 text goes here...';

?>
<div class="bg-gradient-to-b from-[#0073b4] to-[#005180]">
  <div class="flex lg:<?php echo esc_html($flex_hash[$alignment]); ?> flex-col md:min-h-[800px] container mx-auto items-center gap-2 pt-36 lg:pt-16 <?php echo esc_html($flex_hash[$alignment]); ?>">
    <div class="flex flex-col lg:w-7/12 text-center lg:text-left">
      <h1 class="text-5xl mb-8 lg:mb-0 lg:text-6xl lg:leading-[70px] text-white lg:text-<?php echo $justify_hash[$alignment] ?>"><?php echo nl2br($heading); ?></h1>
      <h2 class="text-[24px] font-sans font-normal text-white lg:pt-6 m-0"><?php echo nl2br($subheading); ?></h2>
      <div class="flex align-middle py-8 space-x-6 justify-center lg:justify-<?php echo $justify_hash[$alignment] ?>">
    <a href="/request-a-demo" class="mc-btn-primary"><?php echo esc_html($cta1_text) ?></a>
        <a href="#" class="text-xs sm:text-sm md:text-xl font-serif border-secondary border border-solid px-10 py-2 text-white hover:text-secondary rounded-full"><?php echo esc_html($cta2_text) ?></a>
      </div>
    </div>
    <?php if ($image) : ?>
    <div class="w-5/12 pb-10 lg:pb-0"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="h-auto" /></div>
    <?php endif; ?>
  </div>
</div>
