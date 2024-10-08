<?php
/*
 * Template Name: Integrations template
 * Template Post Type: page, product
 */
?>

<?php get_header(); ?>

  <main role="main">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      
      <section class="tbc_block-hero hero-item block-layout layout-center bg_deepSea">

        <div class="contain">

          <div class="row center-sm">
            <div class="col-xs-12 col-sm-10 col-lg-8">

              <h1><?php echo get_field( 'integrations_page_title' ); ?></h1>

              <div class="text">
                <?php the_content(); ?>
              </div>

              <div class="integrations-search cta">
                <span>
                  <?php include( locate_template( 'template-parts/svgs/search-icon.php', false, false ) ); ?>
                </span>
                <input
                  placeholder="<?php echo get_field( 'integrations_search_form_text' ); ?>"
                  type="text"
                  id="quicksearch"
                  class="filter-search"
                  name="filter-search"
                />
              </div>

            </div>
          </div>

        </div>

      </section>
      
      <?php
        $integrations = get_posts(array(
          'post_type'   => 'integration',
          'numberposts' => -1,
        ));
      ?>
      
      <section class="contain">
        <div class="row">
          <div class="col-xs-12">
            <div class="integrations">
              <div class="filters-wrap">

                <p class="m1">Sort by</p>
                
                <div class="button-group sortOrder">
                  <button id="setAsc">&uparrow; ASC</button>
                  <button id="setDesc" class="is-checked">&downarrow; DESC</button>
                </div>

                <div class="button-group sort-by-button-group">
                  <button class="button is-checked" data-sort-value="date">New</button>
                  <button class="button" data-sort-value="modified">Recently updated</button>
                  <button class="button" data-sort-value="byname">Name</button>
                </div>
                
                <p class="m1">Integration type</p>

                <!-- For filtering controls add -->
                <?php
                  $terms = get_terms( 'integration-type' );
                  if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    echo '<div id="filters" class="button-group integration-filter-list">';
                      echo '<button class="button is-checked" data-filter="*">All</button>';
                    foreach ( $terms as $term ) {
                      echo '<button class="button" data-filter=".'. $term->term_id .'">' . $term->name . '</button>';
                    }
                    echo '</div>';
                  }
                ?>
              </div>
              <div class="integration-filter-container">
                <div class="integrations-container">
                  <div class="grid-sizer"></div>
                  <?php
                    if ($integrations) :
                      foreach ($integrations as $post) : setup_postdata( $post );
                  ?>
                    <div class="filter-item <?php echo tax_list_nolinks(',', 'id'); ?>" data-category="<?php echo tax_list_nolinks(',', 'id'); ?>" data-modified="<?php the_modified_time('ymdHis'); ?>" data-date="<?php echo get_the_date('ymdHis'); ?>" data-byname="<?php echo strtolower(get_the_title()); ?>">
                    <?php if (get_field("integration_docs_url") && !empty(get_field("integration_docs_url"))) : ?>
                      <a href="<?php _e(get_field("integration_docs_url")); ?>" target="_blank" class="card">
                    <?php else : ?>
                      <div class="card">
                    <?php endif; ?>
                        <div class="image">
                          <?php if ( has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                          <?php endif; ?>
                        </div>
                        <div class="content">
                          <p class="m2"><?php the_title(); ?></p>
                          <?php echo tax_list_nolinks(' ', 'name'); ?>
                        </div>
                    <?php if (get_field("integration_docs_url") && !empty(get_field("integration_docs_url"))) : ?>
                      </a>
                    <?php else : ?>
                      </div>
                    <?php endif; ?>
                    </div>
                  <?php 
                      endforeach; wp_reset_postdata();
                    endif;
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <?php 
        include( locate_template( 'template-parts/integrations/carousel.php', false, false ) );
        include( locate_template( 'template-parts/integrations/media-text.php', false, false ) );
        include( locate_template( 'template-parts/integrations/request.php', false, false ) );
        
        $checkField = get_field( 'integrations_related_resources_comp_related_resources' );
        $checkForTitle = '';
        if (!is_null($checkField)) {
          $checkForTitle = $checkField['related_resource_1']['related_resource_title'];
        }
        if (!empty($checkForTitle)) :
          if ( have_rows( 'integrations_related_resources_comp_related_resources' ) ) : 
            while ( have_rows( 'integrations_related_resources_comp_related_resources' ) ) : the_row(); 
              include( locate_template( 'template-parts/components/related-resources.php', false, false ) );
            endwhile; 
          endif;
        else :
          if ( have_rows( 'home_related_resources_comp_related_resources', get_option( 'page_on_front' ) ) ) :
            while ( have_rows( 'home_related_resources_comp_related_resources', get_option( 'page_on_front' ) ) ) : the_row();
              include( locate_template( 'template-parts/components/related-resources.php', false, false ) ); 
            endwhile;
          endif;
        endif;
        
      ?>

    <?php endwhile; endif; ?>

  </main>

<?php get_footer(); ?>
