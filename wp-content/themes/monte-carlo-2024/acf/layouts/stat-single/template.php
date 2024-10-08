<div <?php if (!empty($is_preview)) { echo 'id="statSingleComponent"'; } ?> class="pb__block pb__block-stat-single-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">

  <div class="contain">
    <div class="row center-md">
      <div class="col-xs-12 col-md-10">
        <div class="pb__block-stat-single">
          <div class="stat-desc">
            <h3><?php the_sub_field( 'page_builder_stats_single_title' ); ?></h3>
            <div class="p-lg">
              <?php the_sub_field( 'page_builder_stats_single_description' ); ?>
            </div>
          </div>
          <div class="stat-row">
            <?php if ( have_rows( 'page_builder_stats_single_stat' ) ) : ?>
              <?php while ( have_rows( 'page_builder_stats_single_stat' ) ) : the_row(); ?>
                <div class="stat p-reveal">
                  <p class="h1"><?php the_sub_field( 'page_builder_stats_single_stat_statistic_number' ); ?></p>
                  <p class="sub-text-sm"><?php the_sub_field( 'page_builder_stats_single_stat_description' ); ?></p>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
