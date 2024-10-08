<?php get_header(); ?>

  <main role="main" class="archive-layout">

    <?php include( locate_template( 'template-parts/blog/blog-nav.php', false, false ) ); ?>

      <section class="hero-spacer contain">

          <div class="row">
              <div class="col-xs-12 col-lg-10">
                  <h1 class="h5"><?php single_cat_title(); ?></h1>
              </div>
          </div>

          <?php
          $args = array(
              'post_type'      => 'post',
              'posts_per_page' => 9,
              'category_name' => single_cat_title('', false),
          );

          $custom_query = new WP_Query($args);

          if ( $custom_query->have_posts() ) : ?>

              <div class="row posts_row">

                  <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                      <div class="col-xs-12 col-sm-4">
                          <?php include( locate_template( 'template-parts/blog/post-card.php', false, false ) ); ?>
                      </div>

                  <?php endwhile; wp_reset_postdata(); ?>

              </div>

              <div class="row">
                  <div class="col-xs-12">
                      <?php bones_page_navi(); ?>
                  </div>
              </div>

          <?php endif; ?>

      </section>

      <?php
      $taxonomy_prefix = 'category';
      $term_id = get_queried_object_id();
      $term_id_prefixed = $taxonomy_prefix .'_'. $term_id;
      $curated_posts = get_field( 'cat_related_posts', $term_id_prefixed );
      $cat_related_posts = '';

      if ($curated_posts) {
        $cat_related_posts = $curated_posts;
      } else {
        $args = array(
          'post_type'   => 'post',
          'numberposts' => 6,
          'post_status' => 'publish',
          'exclude'     => $excludeIds,
        );
        $cat_related_posts = get_posts($args);
      }

      if ( $cat_related_posts ) :
        include( locate_template( 'template-parts/blog/related-posts.php', false, false ) );
      endif;
      ?>

      <?php
        $checkField = get_field( 'cat_related_resources_comp_related_resources', $term_id_prefixed );
        $checkForTitle = '';
        if (!is_null($checkField)) {
          $checkForTitle = $checkField['related_resource_1']['related_resource_title'];
        }
        if (!empty($checkForTitle)) :
          if ( have_rows( 'cat_related_resources_comp_related_resources', $term_id_prefixed ) ) :
            while ( have_rows( 'cat_related_resources_comp_related_resources', $term_id_prefixed ) ) : the_row();
              include( locate_template( 'template-parts/components/related-resources.php', false, false ) );
            endwhile;
          endif;
        else :
          if ( have_rows( 'blog_related_resources_comp_related_resources', 174 ) ) :
            while ( have_rows( 'blog_related_resources_comp_related_resources', 174 ) ) : the_row();
              include( locate_template( 'template-parts/components/related-resources.php', false, false ) );
            endwhile;
          endif;
        endif;
      ?>


  </main>

<?php get_footer(); ?>
