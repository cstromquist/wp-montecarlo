<?php
  $categories = get_categories( array(
    'orderby' => 'term_order',
    'parent'  => 0,
    'exclude' => 183
  ));
?>
<section class="categories-layout">
  
  <div class="contain">
    
    <?php
      $c = 1;
      foreach( $categories as $category ) : 
        $args = array(
          'category_name'   => $category->name,
          'post__not_in'    => $recentIds,
          'posts_per_page'  => 6,
          'category__not_in' => array(183),
        );
        $category_posts = new WP_Query( $args );
                
        $blogCTAcards = get_field('cta_cards_repeater', 174);

        if( $category_posts->have_posts() ) :
    ?>
    
        <div class="posts-row <?php if ($c != 2) { echo ' bordered'; } ?>">
          <div class="row cat-header">
            <div class="col-xs-12 col-sm-6">
              <h2 class="h5 text_skyShade2"><?php echo $category->name; ?></h2>
            </div>

            <div class="hide-xs show-sm col-sm-6 text-right">
              <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="link link-sm">Read more on <?php echo $category->name; ?></a>
            </div>
          </div>

          <div class="row center-xs">
            <div class="col-xs-10 col-sm-12 pos-r">
              <div class="swiper posts-swiper">
                <div class="swiper-wrapper">
                  <?php $p = 1; while( $category_posts->have_posts() ) : $category_posts->the_post(); ?>
                    
                    <?php if ($blogCTAcards) : ?>
                      <?php foreach( $blogCTAcards as $ctaCard ) : ?>
                        <?php
                          $blogCardID = $ctaCard['append_cta_to'];
                          $blogCardPosition = $ctaCard['position_to_add_the_cta'];
                          $blogCardTitle = $ctaCard['cta_title'];
                          $blogCardText = $ctaCard['cta_text'];
                          $blogCardCTA = $ctaCard['cta_link'];
                        ?>
                        <?php if ( $category->term_id == $blogCardID && $p == $blogCardPosition ) : ?>
                          <div class="swiper-slide">
                            <div class="post-cta-card bg_deepSea">
                              <h3 class="m1"><?php echo $blogCardTitle; ?></h3>
                              <p><?php echo $blogCardText; ?></p>
                              <?php if ( $blogCardCTA ) : ?>
                                <a class="btn btn-md" href="<?php echo esc_url( $blogCardCTA['url'] ); ?>" target="<?php echo $blogCardCTA['target']; ?>" ><?php echo esc_html( $blogCardCTA['title'] ); ?></a>
                              <?php endif; ?>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  
                    <div class="swiper-slide">
                      <?php include( locate_template( 'template-parts/blog/post-card.php', false, false ) ); ?>
                    </div>
                    
                  <?php $p++; endwhile; ?>
                </div>
              </div>
              <div class="swiper-button-prev">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/slide-prev.svg" alt="">
              </div>
              <div class="swiper-button-next">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/slide-next.svg" alt="">
              </div>
            </div>
          </div>
        </div>
    
        <?php if ($c == 2) : ?>
          
          <?php if ( have_rows( 'blog_cta_banner_comp_banner', 174 ) ) : ?>
            <?php while ( have_rows( 'blog_cta_banner_comp_banner', 174 ) ) : the_row(); ?>
              <?php $bgColor = get_sub_field( 'banner_background_color_picker', 174 ); ?>

              <div class="comp_banner-cta bg_<?php echo $bgColor; if ( get_sub_field( 'add_an_image', 174 ) == 1 ) { echo ' has-image'; } ?>">

                <div class="row middle-sm">
                  <div class="col-xs-12">
                    <div class="banner-wrap">

                      <?php $image = get_sub_field( 'image', 174 ); ?>
                      <?php if ( $image ) : ?>
                        <div class="img">
                          <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                        </div>
                      <?php endif; ?>

                      <div class="content">
                        <p class="h3"><?php the_sub_field( 'callout_text', 174 ); ?></p>
                        <?php if ( get_sub_field( 'add_secondary_text', 174 ) == 1 ) : ?>
                          <p><?php the_sub_field( 'callout_text_secondary', 174 ); ?></p>
                        <?php endif; ?>
                      </div>

                      <div class="cta-container">
                        <?php $cta_button = get_sub_field( 'cta_button', 174 ); ?>
                        <?php if ( $cta_button ) : ?>
                          <a class="btn btn-lg" href="<?php echo esc_url( $cta_button['url'] ); ?>" target="<?php echo $cta_button['target']; ?>" ><?php echo esc_html( $cta_button['title'] ); ?></a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
          
        <?php endif; ?>
        
    <?php endif;
      wp_reset_postdata();
      wp_reset_query();
      $c++;
    endforeach; ?>
  
  </div>

</section>