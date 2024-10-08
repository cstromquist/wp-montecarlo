<div <?php if (!empty($is_preview)) { echo 'id="largeImageComponent"'; } ?> class="pb__block pb__block-large-image-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">

  <?php

    $pbLgImgTitle =  get_sub_field( 'page_builder_large_image_block_title' );
    $pbLgImgDesc = get_sub_field( 'page_builder_large_image_block_description' );

  ?>

  <div class="contain">

    <?php if ((!empty($pbLgImgTitle) || !empty($pbLgImgDesc)) && get_sub_field( 'page_builder_large_image_block_add_title_and_description' ) == 1) : ?>

      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-1 col-lg-5">
          <div class="pb__large-image-title-descr">
            <?php if (!empty($pbLgImgTitle)) : ?>
              <h3><?php echo $pbLgImgTitle; ?></h3>
            <?php endif; ?>
            <?php if (!empty($pbLgImgDesc)) : ?>
              <div>
                <?php echo $pbLgImgDesc; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <?php endif; ?>

    <div class="row">
      <div class="col-xs-12">
        <img width="1920" height="1080" src="<?php the_sub_field( 'page_builder_large_image_block_image' ); ?>" />
      </div>
    </div>

  </div>

</div>
