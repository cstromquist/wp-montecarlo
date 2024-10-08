<div <?php if (!empty($is_preview)) { echo 'id="wistiaComponent"'; } ?> class="pb__block pb__block-wistia-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">

  <?php

    $pbWistiaTitle =  get_sub_field( 'page_builder_wistia_embed_block_title' );
    $pbWistiaDesc = get_sub_field( 'page_builder_wistia_embed_block_description' );

  ?>

  <div class="contain">

    <?php if ((!empty($pbWistiaTitle) || !empty($pbWistiaDesc)) && get_sub_field( 'page_builder_wistia_embed_block_add_title_and_description' ) == 1) : ?>

      <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-6 col-md-offset-1 col-lg-5">
          <div class="pb__wistia-title-descr">
            <?php if (!empty($pbWistiaTitle)) : ?>
              <h3><?php echo $pbWistiaTitle; ?></h3>
            <?php endif; ?>
            <?php if (!empty($pbWistiaDesc)) : ?>
              <div>
                <?php echo $pbWistiaDesc; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <?php endif; ?>

    <div class="row video-anchor">
      <div class="col-xs-12">

        <?php include( locate_template( 'template-parts/components/wistia-embed.php', false, false ) ); ?>

      </div>
    </div>

  </div>

</div>
