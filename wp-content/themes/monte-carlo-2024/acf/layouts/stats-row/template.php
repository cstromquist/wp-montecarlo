<div <?php if (!empty($is_preview)) { echo 'id="statRowComponent"'; } ?> class="pb__block pb__block-stats-row-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">

  <div class="contain">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-md-6 col-md-offset-1 col-lg-5">
        <h3><?php the_sub_field( 'page_builder_stats_row_title' ); ?></h3>
        <div class="stats-desc">
          <?php the_sub_field( 'page_builder_stats_row_description' ); ?>
        </div>
      </div>
    </div>
    <div class="row center-md">
      <div class="col-xs-12 col-md-10">
        <div class="pb__block-stats-row">
          <?php if ( have_rows( 'page_builder_stats_row_stats' ) ) : ?>
            <?php while ( have_rows( 'page_builder_stats_row_stats' ) ) : the_row(); ?>
              <div class="stat p-reveal">
                <p class="h1"><?php the_sub_field( 'page_builder_stats_row_statistic_number' ); ?></p>
                <p class="sub-text-sm"><?php the_sub_field( 'page_builder_stats_row_statistic_description' ); ?></p>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

</div>
