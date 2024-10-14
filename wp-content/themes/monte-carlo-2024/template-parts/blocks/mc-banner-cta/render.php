<?php
/**
 * MC Carousel Block template.
 *
 * @param array $block The block settings and attributes.
 */
$heading            = !empty(get_field('heading')) ? get_field('heading') : 'Heading goes here...'; 
$subtext            = !empty(get_field('subtext')) ? get_field('subtext') : 'Subtext goes here...';
$subtext_by         = !empty(get_field('subtext_by')) ? get_field('subtext_by') : '';
$cta_button         = !empty(get_field('cta_button')) ? get_field('cta_button') : '';
$image_left         = !empty(get_field('image_left')) ? get_field('image_left') : '';
$image_right        = !empty(get_field('image_right')) ? get_field('image_right') : '';
?>
<div class="relative p-24 bg-tertiary text-white flex flex-col align-middle justify-center">
  <h2 class="text-4xl mb-2 mt-0 text-center lg:max-w-[450px] mx-auto mb-8"><?php echo esc_html($heading) ?></h2>
  <p class="relative text-lg text-center lg:max-w-[550px] mx-auto mc-quote">
    <?php echo esc_html($subtext) ?>
    <?php if ($subtext_by) : ?>
    <span class="block text-right mt-4 text-secondary italic bg-tertiary px-2 absolute right-20 -bottom-3">- <?php echo esc_html($subtext_by) ?></span>
    <?php endif; ?>
  </p>
  <div class="flex flex-row justify-center mt-8">
    <a href="<?php echo esc_url($cta_button['url']) ?>" class="mc-btn-primary"><?php echo esc_html($cta_button['title']) ?></a>
  </div>
  <div class="absolute md:left-0 xl:left-20 lg:left-0 bottom-0 invisible lg:visible">
    <?php if ($image_left) : ?>
    <img src="<?php echo esc_url($image_left['url']) ?>" alt="<?php echo esc_attr($image_left['alt']) ?>" class="h-[400px] w-auto" />
    <?php endif; ?>
  </div>
  <div class="absolute right-0 bottom-0 invisible lg:visible">
    <?php if ($image_right) : ?>
    <img src="<?php echo esc_url($image_right['url']) ?>" alt="<?php echo esc_attr($image_right['alt']) ?>" class="h-[400px] w-auto" />
    <?php endif; ?>
</div>
