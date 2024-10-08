<?php
  $title = get_sub_field( 'related_resources_section_title' );;
  if (empty($title)) {
    $title = 'Related resources';
  }
  $hasData = get_sub_field('related_resource_1')['related_resource_title'];

  if (!empty($hasData)) :
?>

  <section class="comp_related-resources bg_ocean">
    <div class="contain">

      <div class="row">
        <div class="col-xs-12 text-center">
          <h2><?php echo $title; ?></h2>
        </div>
      </div>

      <div class="row resource-row">

        <?php if ( have_rows( 'related_resource_1' ) ) : ?>
          <?php while ( have_rows( 'related_resource_1' ) ) : the_row(); ?>
            <div class="col-xs-12 col-sm-4">
              <?php $related_resource_cta = get_sub_field( 'related_resource_cta' ); ?>
              <?php if ( $related_resource_cta ) : ?>
                <a class="plain resource-link" href="<?php echo esc_url( $related_resource_cta['url'] ); ?>" target="<?php echo $related_resource_cta['target']; ?>" >
              <?php endif; ?>
                <div class="resource-card">
                  <h3 class="h6"><?php the_sub_field( 'related_resource_title' ); ?></h3>
                  <div class="p-xs">
                    <?php the_sub_field( 'related_resource_description' ); ?>
                  </div>
                  <?php $related_resource_cta = get_sub_field( 'related_resource_cta' ); ?>
                  <?php if ( $related_resource_cta ) : ?>
                    <div class="cta-wrap">
                      <span class="faux-a link link-lg"><?php echo esc_html( $related_resource_cta['title'] ); ?></span>
                    </div>
                  <?php endif; ?>
                </div>
              <?php if ( $related_resource_cta ) : ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

        <?php if ( have_rows( 'related_resource_2' ) ) : ?>
          <?php while ( have_rows( 'related_resource_2' ) ) : the_row(); ?>
            <div class="col-xs-12 col-sm-4">
              <?php $related_resource_cta = get_sub_field( 'related_resource_cta' ); ?>
              <?php if ( $related_resource_cta ) : ?>
                <a class="plain resource-link" href="<?php echo esc_url( $related_resource_cta['url'] ); ?>" target="<?php echo $related_resource_cta['target']; ?>" >
              <?php endif; ?>
                <div class="resource-card">
                  <h3 class="h6"><?php the_sub_field( 'related_resource_title' ); ?></h3>
                  <div class="p-xs">
                    <?php the_sub_field( 'related_resource_description' ); ?>
                  </div>
                  <?php $related_resource_cta = get_sub_field( 'related_resource_cta' ); ?>
                  <?php if ( $related_resource_cta ) : ?>
                    <div class="cta-wrap">
                      <span class="faux-a link link-lg"><?php echo esc_html( $related_resource_cta['title'] ); ?></span>
                    </div>
                  <?php endif; ?>
                </div>
              <?php if ( $related_resource_cta ) : ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

        <?php if ( have_rows( 'related_resource_3' ) ) : ?>
          <?php while ( have_rows( 'related_resource_3' ) ) : the_row(); ?>
            <div class="col-xs-12 col-sm-4">
              <?php $related_resource_cta = get_sub_field( 'related_resource_cta' ); ?>
              <?php if ( $related_resource_cta ) : ?>
                <a class="plain resource-link" href="<?php echo esc_url( $related_resource_cta['url'] ); ?>" target="<?php echo $related_resource_cta['target']; ?>" >
              <?php endif; ?>
                <div class="resource-card">
                  <h3 class="h6"><?php the_sub_field( 'related_resource_title' ); ?></h3>
                  <div class="p-xs">
                    <?php the_sub_field( 'related_resource_description' ); ?>
                  </div>
                  <?php $related_resource_cta = get_sub_field( 'related_resource_cta' ); ?>
                  <?php if ( $related_resource_cta ) : ?>
                    <div class="cta-wrap">
                      <span class="faux-a link link-lg"><?php echo esc_html( $related_resource_cta['title'] ); ?></span>
                    </div>
                  <?php endif; ?>
                </div>
              <?php if ( $related_resource_cta ) : ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

      </div>

    </div>
  </section>
  
<?php endif; ?>

