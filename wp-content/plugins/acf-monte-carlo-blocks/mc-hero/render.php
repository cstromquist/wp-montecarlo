<?php
/**
 * MC Hero Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$heading             = !empty(get_field( 'heading' )) ? get_field( 'heading' ) : 'Your heading here...';
$subheading             = !empty(get_field( 'subheading' )) ? get_field( 'subheading' ) : 'Your subheading here...';

?>
<div class="bg-gradient-to-b from-[#0073b4] to-[#005180]">
  <div class="max-w-screen-xl mx-auto px-4 lg:pt-[100px] min-h-[600px] flex flex-col">
  <h1 class="text-6xl text-white"><?php echo esc_html( $heading ); ?></h1>
  <h2 class="text-2xl text-white lg:pt-8"><?php esc_html( $heading ); ?></h2>
    <div class="flex align-middle py-8 space-x-6">
      <a href="#" class="bg-[#eda600] px-8 py-2 text-white rounded-full text-[#1d4b67] hover:text-[white]">Take a product tour</a>
      <a href="#" class="border-[#eda600] border px-10 py-2 text-white hover:text-[#eda600] rounded-full">Request a demo</a>
    </div>
  </div>
</div>
