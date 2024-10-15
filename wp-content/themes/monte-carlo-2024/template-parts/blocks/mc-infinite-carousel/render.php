<?php
/**
 * MC Infinite Carousel Block template.
 */

$images         = !empty(get_field('images')) ? get_field('images') : '';
?>
<div class="mc-slider">
	<div class="mc-slide-track">
    <?php foreach ($images as $i => $image) : ?>
    <div class="mc-slide">
      <img src="<?php echo esc_url($image['url']) ?>" alt="" />
    </div>
    <?php endforeach; ?>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
    <div class="mc-slide">
      <img src="http://localhost:8000/wp-content/uploads/2024/10/high-performer-asia-pacific.png" alt="">
    </div>
	</div>
</div>
