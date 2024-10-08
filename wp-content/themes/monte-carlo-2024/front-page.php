<?php get_header(); ?>

<main class="home-main" role="main">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
    <section class="hero">
      <div class="contain">
        <div class="row">
          <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            <h1><?php echo get_field( 'home_page_title' ); ?></h1>
            <?php the_content(); ?>
            <div class="cta-container">
              <?php 
                
                $home_hero_cta_type = get_field( 'home_choose_cta_type' );
                
                if ($home_hero_cta_type == 'link') :
                 $home_hero_cta = get_field( 'home_hero_cta' );
                 if ( $home_hero_cta ) :
              ?>
                <a class="btn btn-lg" href="<?php echo esc_url( $home_hero_cta['url'] ); ?>" target="<?php echo $home_hero_cta['target']; ?>" ><?php echo esc_html( $home_hero_cta['title'] ); ?></a>
              <?php 
                  endif;
                  
                else :
                  $switch_home_hero_cta_enbed2 = get_field( 'switch_hero_cta_embed2_visibility' );

                  echo get_field( 'home_hero_cta_embed' );

                  if ( $switch_home_hero_cta_enbed2 ) {
                    echo get_field( 'home_hero_cta_embed2' );
                  }
                endif;
              ?>
            </div>
            <?php if ( get_field( 'home_hero_image' ) ) : ?>
              <div class="img_16x9">
                <?php
                  $image = get_field('home_hero_image');
                  $size = array(327, 185);
                  if( $image ) {
                    echo wp_get_attachment_image( $image, $size, "", array( "class" => "hero-image disable-lazyload" ) );
                  }
                ?>
              </div>
            <?php endif ?>

            <img class="bg-image back left hide-xs show-sm" src="<?php bloginfo('template_url'); ?>/assets/img/home-bg-back-left.webp" alt="">
            <img class="bg-image front left hide-xs show-sm" src="<?php bloginfo('template_url'); ?>/assets/img/home-bg-front-left.webp" alt="">
            <img class="bg-image back right hide-xs show-sm" src="<?php bloginfo('template_url'); ?>/assets/img/home-bg-back-right.webp" alt="">
            <img class="bg-image front right hide-xs show-sm" src="<?php bloginfo('template_url'); ?>/assets/img/home-bg-front-right.webp" alt="">
          </div>
        </div>
      </div>
    </section>
    
    <section class="logo-grid">
      <?php if ( have_rows( 'home_client_logos_comp_logo_carousel' ) ) : ?>
        <?php while ( have_rows( 'home_client_logos_comp_logo_carousel' ) ) : the_row(); ?>
          <?php include( locate_template( 'template-parts/components/logo-grid.php', false, false ) ); ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </section>

    <?php if ( have_rows( 'home_image_card_callouts' ) ) : ?>
      <section class="card-callouts">
        <div class="contain">
          <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
              <div class="card-container">
                <?php while ( have_rows( 'home_image_card_callouts' ) ) : the_row(); ?>

                  <div class="card">
                    <?php $card_image = get_sub_field( 'card_image' ); ?>
                    <?php if ( $card_image ) : ?>
                      <div class="img">
                        <img src="<?php echo esc_url( $card_image['url'] ); ?>" alt="<?php echo esc_attr( $card_image['alt'] ); ?>" />
                      </div>
                    <?php endif; ?>
                    <h6><?php the_sub_field( 'card_title' ); ?></h6>
                    <?php the_sub_field( 'card_text' ); ?>
                  </div>

                <?php endwhile; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php else : ?>
      <?php // No rows found ?>
    <?php endif; ?>

    <section class="observability">
      <div class="contain">
        <div class="row">
          <div class="col-xs-12">
            <div class="callout-container">
              <h2><?php echo get_field( 'home_data_observability_section_title' ); ?></h2>
              <div class="content">
                <?php echo get_field( 'home_data_observability_section_text' ); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <?php if ( get_field( 'home_data_observability_product_overview_illustration' ) ) : ?>
              <div class="img">
                <img width="1920" height="1080" alt="" src="<?php echo get_field( 'home_data_observability_product_overview_illustration' ); ?>" />
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </section>

    <?php 
      $imgArray = array();
      $titleArray = array();
      $copyArray = array();
      if ( have_rows( 'home_data_observability_product_screenshots_carousel_block_carousel_items' ) )  {
        while ( have_rows( 'home_data_observability_product_screenshots_carousel_block_carousel_items' ) ) {
          the_row();
          $carousel_block_item_image = get_sub_field( 'carousel_block_item_image' );
          array_push($imgArray, $carousel_block_item_image);
          array_push($titleArray, get_sub_field( 'carousel_item_title' ));
          array_push($copyArray, get_sub_field( 'carousel_item_text' ));
        } 
      }
    ?>

<section class="block-carousel-block">
      <div class="bg-ocean">
        <div class="contain">
          <div class="row">
            <div class="col">
              <div class="inner-container">

                <div class="spacer hide-xs show-sm">
                  <div class="img">
                    <?php if ( count($imgArray) > 0 ) : ?>
                      <?php $i = 0; ?>
                      <?php while ( $i < count($imgArray) ) : ?>
                        <?php $imgItem = $imgArray[$i] ?>
                        <?php if ( $imgItem ) : ?>
                          <img data-slide="<?php echo $i ?>" class="<?php if($i == 0) { echo 'active'; } ?>" src="<?php echo esc_url( $imgItem['url'] ); ?>" alt="<?php echo esc_attr( $imgItem['alt'] ); ?>" />
                        <?php endif; ?>
                        <?php $i++; ?>
                      <?php endwhile; ?>
                    <?php else : ?>
                      <?php // No rows found ?>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="item-list-container">
                  <p class="h3"><?php echo get_field( 'home_data_observability_product_screenshots_carousel_block_title' ); ?></p>
                  <div class="content-container">
                    <div class="indicator-bar">
                      <div class="indicator"></div>
                    </div>
                    <ul class="list">
                      <?php if ( count($imgArray) > 0 ) : ?>
                        <?php $i = 0; ?>
                        <?php while ( $i < count($imgArray) ) : ?>
                            <li data-slide="<?php echo $i ?>" class="<?php if($i == 0) { echo 'active'; } ?>">
                              <button class="h6"><?php echo $titleArray[$i] ?></button>
                              <div class="content">
                                <?php echo $copyArray[$i] ?>
                                <?php $imgItem = $imgArray[$i] ?>
                                <?php if ( $imgItem ) : ?>
                                  <div class="img">
                                    <img class="show-xs hide-sm" src="<?php echo esc_url( $imgItem['url'] ); ?>" alt="<?php echo esc_attr( $imgItem['alt'] ); ?>" />
                                  </div>
                                <?php endif; ?>
                              </div>
                            </li>
                            <?php $i++; ?>
                        <?php endwhile; ?>
                      <?php else : ?>
                        <?php // No rows found ?>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-white">
          <div class="contain">
            <div class="row">
              <div class="col-xs-12">
                <div>
                  <img class="scene" src="<?php bloginfo('template_directory'); ?>/assets/img/laptop-scene.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="testimonials">
      <div class="contain">
        <div class="row">
          <div class="col-xs-12">
            <h2><span class="quote-industry"></span><?php echo get_field( 'home_testimonials_section_title_trailing_text' ); ?></h2>
          </div>
        </div>
      </div>
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php if ( have_rows( 'home_testimonials' ) ) : ?>
            <?php while ( have_rows( 'home_testimonials' ) ) : the_row(); ?>
              <div class="swiper-slide item" data-industry="<?php the_sub_field( 'home_testimonial_industry' ); ?>">

                <?php $home_testimonial_primary_image = get_sub_field( 'home_testimonial_primary_image' ); ?>
                <?php if ( $home_testimonial_primary_image ) : ?>
                  <div class="media">
                    <div class="img">
                      <img width="300" height="300" src="<?php echo esc_url( $home_testimonial_primary_image['url'] ); ?>" alt="<?php echo esc_attr( $home_testimonial_primary_image['alt'] ); ?>" />
                    </div>
                    <?php $home_testimonial_logo = get_sub_field( 'home_testimonial_logo' ); ?>
                    <?php if ( $home_testimonial_logo ) : ?>
                      <div class="client-logo">
                        <img width="300" height="200" src="<?php echo esc_url( $home_testimonial_logo['url'] ); ?>" alt="<?php echo esc_attr( $home_testimonial_logo['alt'] ); ?>" />
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                
                <div>
                  <p class="p-quote"><?php the_sub_field( 'home_testimonial_quote' ); ?></p>
                  <p class="p-quotee"><?php the_sub_field( 'home_testimonial_quotee' ); ?></p>
                  <p class="p-quotee-title"><?php the_sub_field( 'home_testimonial_quotee_position_title' ); ?></p>
                
                  <?php $home_testimonial_quote_cta = get_sub_field( 'home_testimonial_quote_cta' ); ?>
                  <?php if ( $home_testimonial_quote_cta ) : ?>
                    <div class="button-wrap">
                      <a class="link link-md" href="<?php echo esc_url( $home_testimonial_quote_cta['url'] ); ?>" target="<?php echo $home_testimonial_quote_cta['target']; ?>" ><?php echo esc_html( $home_testimonial_quote_cta['title'] ); ?></a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <?php // No rows found ?>
          <?php endif; ?>
        </div>
        <button class="swiper-button-prev" aria-label="Previous">
          <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.16406 22.6621L11.6641 12.1621L1.16406 1.66211" stroke="#003453" stroke-width="2.84846"/>
          </svg>
        </button>
        <button class="swiper-button-next" aria-label="Next">
          <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.16406 22.6621L11.6641 12.1621L1.16406 1.66211" stroke="#003453" stroke-width="2.84846"/>
          </svg>
        </button>
      </div>
      
    </section>

    <?php if ( have_rows( 'home_callout_banner_comp_banner' ) ) : ?>
      <?php while ( have_rows( 'home_callout_banner_comp_banner' ) ) : the_row(); ?>
        <section class="banner">
          <div class="contain">
            <div class="row">
              <div class="col-xs-12">
                <?php include( locate_template( 'template-parts/components/banner.php', false, false ) ); ?>
              </div>
            </div>
          </div>
        </section>
        
      <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'home_integrations_comp_logo_carousel' ) ) : ?>
      <?php while ( have_rows( 'home_integrations_comp_logo_carousel' ) ) : the_row(); ?>
        <section class="logo-grid lower-logos">
          <?php include( locate_template( 'template-parts/components/logo-grid.php', false, false ) ); ?>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>


    <?php
      if ( have_rows( 'home_related_resources_comp_related_resources' ) ) :
        while ( have_rows( 'home_related_resources_comp_related_resources' ) ) : the_row();
          include( locate_template( 'template-parts/components/related-resources.php', false, false ) ); 
        endwhile;
      endif; 
    ?>
  
  <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
