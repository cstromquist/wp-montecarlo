<div <?php if (!empty($is_preview)) { echo 'id="dividerComponent"'; } ?> class="pb__block pb__block-divider-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">

  <?php

    $widthItem = get_sub_field( 'page_builder_divider_size' );

    if ($widthItem == 'sm') {
      $dividerSize = 'col-xs-8 col-sm-6 col-md-4 divider-sm';
    } else if ($widthItem == 'md') {
      $dividerSize = 'col-xs-10 col-sm-8 col-md-6 divider-md';
    } else if ($widthItem == 'lg') {
      $dividerSize = 'col-xs-12 col-md-10 divider-lg';
    } else {
      $dividerSize = 'col-xs-12';
    }

  ?>

  <div class="contain">
    <div class="row center-xs">
      <div class="divider-wrap <?php echo $dividerSize; ?>">
        <?php
          $line = get_sub_field( 'page_builder_divider_color' );
          if (!empty($line)) {
            $lineColor = $line;
          } else {
            $lineColor = "#121212";
          }
        ?>
        <div class="divider" style="background: <?php echo $lineColor; ?>;"></div>
      </div>
    </div>
  </div>

</div>
