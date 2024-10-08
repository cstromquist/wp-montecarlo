<div <?php if (!empty($is_preview)) { echo 'id="columnGridComponent"'; } ?> class="pb__block pb__block-column-grid-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">

  <div class="contain">

    <div class="row center-md">

      <div class="col-xs-12 col-md-10 pb__columns-contain">

        <div class="is-flex">

          <?php if ( have_rows( 'page_builder_three_column_grid_columns' ) ) : $v = 1; ?>
            <?php while ( have_rows( 'page_builder_three_column_grid_columns' ) ) : $val = str_pad($v,2,"0",STR_PAD_LEFT); the_row(); ?>

              <div class="pb__column-item-box">

                <div class="pb__column-item">

                  <?php $mediaType = get_sub_field( 'page_builder_three_column_grid_image_or_icon' ); ?>

                  <?php if ( $mediaType == 'icon' ) : ?>
                    <div class="pb__column-item-icon">
                      <?php $page_builder_three_column_grid_icon = get_sub_field( 'page_builder_three_column_grid_icon' ); ?>
                      <?php if ( $page_builder_three_column_grid_icon ) : ?>
                        <img loading="lazy" width="48" height="48" src="<?php echo esc_url( $page_builder_three_column_grid_icon['url'] ); ?>" alt="<?php echo esc_attr( $page_builder_three_column_grid_icon['alt'] ); ?>" />
                      <?php endif; ?>
                    </div>
                  <?php else : ?>
                    <div class="pb__column-item-image">
                      <?php $page_builder_three_column_grid_image = get_sub_field( 'page_builder_three_column_grid_image' ); ?>
                      <?php if ( $page_builder_three_column_grid_image ) : ?>
                        <div class="img-box">
                          <img loading="lazy" width="600" height="400" src="<?php echo esc_url( $page_builder_three_column_grid_image['url'] ); ?>" alt="<?php echo esc_attr( $page_builder_three_column_grid_image['alt'] ); ?>" />
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>

                  <p class="p-lg"><?php the_sub_field( 'page_builder_three_column_grid_title' ); ?></p>

                  <div class="copy">
                    <?php the_sub_field( 'page_builder_three_column_grid_text' ); ?>
                  </div>

                </div>

              </div>

            <?php $v++; endwhile; ?>
          <?php endif; ?>

        </div>

      </div>

    </div>

  </div>

</div>
