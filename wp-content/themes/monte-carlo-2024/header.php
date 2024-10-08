<!doctype html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8">
    <?php if (!is_a_bot()) : ?>
      <script>
        (function(){var a=window.mutiny=window.mutiny||{};if(!window.mutiny.client){a.client={_queue:{}};var b=["identify","trackConversion"];var c=[].concat(b,["defaultOptOut","optOut","optIn"]);var d=function factory(c){return function(){for(var d=arguments.length,e=new Array(d),f=0;f<d;f++){e[f]=arguments[f]}a.client._queue[c]=a.client._queue[c]||[];if(b.includes(c)){return new Promise(function(b,d){a.client._queue[c].push({args:e,resolve:b,reject:d});setTimeout(d,500)})}else{a.client._queue[c].push({args:e})}}};c.forEach(function(b){a.client[b]=d(b)})}})();
      </script>
      <script data-cfasync="false" src="https://client-registry.mutinycdn.com/personalize/client/813b436159f68e1a.js"></script>

      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.defer=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-T3HJ9NR');</script>
      <!-- End Google Tag Manager -->
    <?php endif; ?>
    
		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="theme-color" content="#ffffff">
    
    <?php if (is_front_page()) : ?>
      <link rel="preload" fetchpriority="high" as="image" href="/wp-content/uploads/2023/08/hero-svg-optimized.svg" type="image/svg+xml">
    <?php endif; ?>
    
    <?php wp_head(); ?>
    <?php if (!is_a_bot()) : ?>
      <!-- Qualified -->
      <script>
      (function(w,q){w['QualifiedObject']=q;w[q]=w[q]||function(){
      (w[q].q=w[q].q||[]).push(arguments)};})(window,'qualified')
      </script>
      <script defer src="https://js.qualified.com/qualified.js?token=jZczq5n4ttznd5f1"></script>
      <!-- End Qualified -->
    <?php endif; ?>
  </head>

<body <?php body_class(); ?>>

  <?php if (!is_a_bot()) : ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3HJ9NR"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  <?php endif; ?>
  
  <!--<svg id="fader"></svg>-->
	
	<header id="header" role="banner">
		<div class="header-container contain">
			<div class="layout">
				<div class="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo plain" aria-label="Home">
						<?php if ( get_field( 'header_logo', 'option' ) ) : ?>
							<img width="300" height="200" src="<?php echo get_field( 'header_logo', 'option' ); ?>" alt="Monte Carlo Data Logo" />
						<?php endif ?>
					</a>
				</div>
				<div class="site-nav">
					<?php if ( have_rows( 'top_level_navigation', 'option' ) ) : ?>
						<ul id="menu-main-menu">
							<?php while ( have_rows( 'top_level_navigation', 'option' ) ) : the_row(); ?>
								<li class="sub">
									<?php if ( have_rows( 'nav_menu_item_1' ) ) : ?>
										<?php while ( have_rows( 'nav_menu_item_1' ) ) : the_row(); ?>
                      <a class="menu-h1" href="#">
												<span><?php the_sub_field( 'nav_menu_one_top_menu_text' ); ?></span>
                       </a>
											<div class="sub-menu-wrapper nav_menu_item_1">
												<div>
                          <div class="menu-h2">
                            <?php the_sub_field( 'nav_menu_one_sub_menu_title' ); ?>
                          </div>
													<?php if ( have_rows( 'nav_menu_one_sub_menu_items' ) ) : ?>
														<ul class="menu-sub-menu links">
															<?php while ( have_rows( 'nav_menu_one_sub_menu_items' ) ) : the_row(); ?>
																<?php $nav_menu_one_sub_menu_item_link = get_sub_field( 'nav_menu_one_sub_menu_item_link' ); ?>
																<li>
																	<?php if ( $nav_menu_one_sub_menu_item_link ) : ?>
																		<a href="<?php echo esc_url( $nav_menu_one_sub_menu_item_link['url'] ); ?>" target="<?php echo $nav_menu_one_sub_menu_item_link['target']; ?>" >
																			<?php echo esc_html( $nav_menu_one_sub_menu_item_link['title'] ); ?>
																			<span><?php the_sub_field( 'nav_menu_one_sub_menu_item_description' ); ?></span>
																		</a>
																	<?php endif; ?>
																</li>
															<?php endwhile; ?>
														</ul>
													<?php endif; ?>
												</div>
												<div class="productDemo">
													<?php $nav_menu_one_sub_cta_url = get_sub_field( 'nav_menu_one_sub_cta_url' ); ?>
													<?php if ( $nav_menu_one_sub_cta_url ) : ?>
														<a href="<?php echo esc_url( $nav_menu_one_sub_cta_url['url'] ); ?>" target="<?php echo $nav_menu_one_sub_cta_url['target']; ?>" >
                              <?php echo esc_html( $nav_menu_one_sub_cta_url['title'] ); ?>
                              <?php $nav_menu_one_sub_cta_image = get_sub_field( 'nav_menu_one_sub_cta_image' ); ?>
                              <?php if ( $nav_menu_one_sub_cta_image ) : ?>
                                  <img width="800" height="600" src="<?php echo esc_url( $nav_menu_one_sub_cta_image['url'] ); ?>" alt="<?php echo esc_attr( $nav_menu_one_sub_cta_image['alt'] ); ?>" />
                              <?php endif; ?>
                              <?php the_sub_field( 'nav_menu_one_sub_cta_text' ); ?>
                              <span>
                                  <?php the_sub_field( 'nav_menu_one_sub_cta_description' ); ?>
                              </span>
                            </a>
													<?php endif; ?>
												</div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</li>

								<li class="sub">
									<?php if ( have_rows( 'nav_menu_item_2' ) ) : ?>
										<?php while ( have_rows( 'nav_menu_item_2' ) ) : the_row(); ?>
											<a class="menu-h1" href="#">
                        <span><?php the_sub_field( 'nav_menu_two_top_menu_text_copy' ); ?></span>
                      </a>
											<div class="sub-menu-wrapper nav_menu_item_2">
												<div>
                          <div class="menu-h2">
													  <?php the_sub_field( 'nav_menu_two_sub_one_menu_title_copy' ); ?>
                          </div>
                          <?php if ( have_rows( 'nav_menu_two_sub_one_menu_items_copy' ) ) : ?>
														<ul class="menu-sub-menu links">
                              <?php while ( have_rows( 'nav_menu_two_sub_one_menu_items_copy' ) ) : the_row(); ?>
                                  <?php $nav_menu_one_sub_one_menu_item_link = get_sub_field( 'nav_menu_one_sub_one_menu_item_link' ); ?>
                                  <?php if ( $nav_menu_one_sub_one_menu_item_link ) : ?>
                                      <li>    
                                          <a href="<?php echo esc_url( $nav_menu_one_sub_one_menu_item_link['url'] ); ?>" target="<?php echo $nav_menu_one_sub_one_menu_item_link['target']; ?>" >
                                              <?php echo esc_html( $nav_menu_one_sub_one_menu_item_link['title'] ); ?>
                                              <span><?php the_sub_field( 'nav_menu_one_sub_one_menu_item_description' ); ?></span>
                                          </a>
                                      </li>
                                  <?php endif; ?>
                              <?php endwhile; ?>
                            </ul>
													<?php endif; ?>
												</div>
												<div>
                          <div class="menu-h2">
													  <?php the_sub_field( 'nav_menu_two_sub_two_menu_title' ); ?>
                          </div>
													<?php if ( have_rows( 'nav_menu_two_sub_two_menu_items' ) ) : ?>
														<ul class="menu-sub-menu links">
                              <?php while ( have_rows( 'nav_menu_two_sub_two_menu_items' ) ) : the_row(); ?>
                                  <?php $nav_menu_two_sub_two_menu_item_link = get_sub_field( 'nav_menu_two_sub_two_menu_item_link' ); ?>
                                  <?php if ( $nav_menu_two_sub_two_menu_item_link ) : ?>
                                      <li>
                                          <a href="<?php echo esc_url( $nav_menu_two_sub_two_menu_item_link['url'] ); ?>" target="<?php echo $nav_menu_two_sub_two_menu_item_link['target']; ?>" >
                                              <?php echo esc_html( $nav_menu_two_sub_two_menu_item_link['title'] ); ?>
                                              <span><?php the_sub_field( 'nav_menu_two_sub_two_menu_item_description' ); ?></span>
                                          </a>
                                        </li>
                                  <?php endif; ?>
                              <?php endwhile; ?>
                            </ul>
													<?php endif; ?>
												</div>
												<div class="productDemo">
													<?php $nav_menu_two_sub_cta_url_copy = get_sub_field( 'nav_menu_two_sub_cta_url_copy' ); ?>
													<?php if ( $nav_menu_two_sub_cta_url_copy ) : ?>
														<a href="<?php echo esc_url( $nav_menu_two_sub_cta_url_copy['url'] ); ?>" target="<?php echo $nav_menu_two_sub_cta_url_copy['target']; ?>" >
                              <?php echo esc_html( $nav_menu_two_sub_cta_url_copy['title'] ); ?>
                              <?php $nav_menu_two_sub_cta_image_copy = get_sub_field( 'nav_menu_two_sub_cta_image_copy' ); ?>
                              <?php if ( $nav_menu_two_sub_cta_image_copy ) : ?>
                                  <img width="800" height="600" src="<?php echo esc_url( $nav_menu_two_sub_cta_image_copy['url'] ); ?>" alt="<?php echo esc_attr( $nav_menu_two_sub_cta_image_copy['alt'] ); ?>" />
                              <?php endif; ?>
                              <?php the_sub_field( 'nav_menu_two_sub_cta_text_copy' ); ?>
                              <span>
                                  <?php the_sub_field( 'nav_menu_two_sub_cta_description_copy' ); ?>
                              </span>
                            </a>
													<?php endif; ?>
												</div>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</li>

								<li>
									<?php if ( have_rows( 'nav_menu_item_3' ) ) : ?>
										<?php while ( have_rows( 'nav_menu_item_3' ) ) : the_row(); ?>
											<?php $nav_menu_three_top_menu_link = get_sub_field( 'nav_menu_three_top_menu_link' ); ?>
											<?php if ( $nav_menu_three_top_menu_link ) : ?>
												<a class="menu-h1" href="<?php echo esc_url( $nav_menu_three_top_menu_link['url'] ); ?>" target="<?php echo $nav_menu_three_top_menu_link['target']; ?>" >
                          <span><?php echo esc_html( $nav_menu_three_top_menu_link['title'] ); ?></span>
                        </a>
											<?php endif; ?>
										<?php endwhile; ?>
									<?php endif; ?>
								</li>

								<li>
									<?php if ( have_rows( 'nav_menu_item_4' ) ) : ?>
										<?php while ( have_rows( 'nav_menu_item_4' ) ) : the_row(); ?>
											<?php $nav_menu_four_top_menu_link = get_sub_field( 'nav_menu_four_top_menu_link' ); ?>
											<?php if ( $nav_menu_four_top_menu_link ) : ?>
												<a class="menu-h1" href="<?php echo esc_url( $nav_menu_four_top_menu_link['url'] ); ?>" target="<?php echo $nav_menu_four_top_menu_link['target']; ?>" >
                          <span><?php echo esc_html( $nav_menu_four_top_menu_link['title'] ); ?></span>
                        </a>
											<?php endif; ?>
										<?php endwhile; ?>
									<?php endif; ?>
								</li>

								<li class="sub">
									<?php if ( have_rows( 'nav_menu_item_5' ) ) : ?>
										<?php while ( have_rows( 'nav_menu_item_5' ) ) : the_row(); ?>
											<a class="menu-h1" href="#">
                        <span><?php the_sub_field( 'nav_menu_five_top_menu_text_copy' ); ?></span>
                      </a>
                      <div class="sub-menu-wrapper nav_menu_item_5">
                        <div>
                          <div class="menu-h2">
                            <?php the_sub_field( 'nav_menu_five_sub_one_menu_title_copy' ); ?>
                          </div>
                          <?php if ( have_rows( 'nav_menu_five_sub_one_menu_items_copy' ) ) : ?>
                            <ul class="menu-sub-menu links">
                              <?php while ( have_rows( 'nav_menu_five_sub_one_menu_items_copy' ) ) : the_row(); ?>
                                <?php $nav_menu_four_sub_one_menu_item_link = get_sub_field( 'nav_menu_four_sub_one_menu_item_link' ); ?>
                                <?php if ( $nav_menu_four_sub_one_menu_item_link ) : ?>
                                  <li>
                                    <a href="<?php echo esc_url( $nav_menu_four_sub_one_menu_item_link['url'] ); ?>" target="<?php echo $nav_menu_four_sub_one_menu_item_link['target']; ?>" >
                                      <?php echo esc_html( $nav_menu_four_sub_one_menu_item_link['title'] ); ?>
                                      <span><?php the_sub_field( 'nav_menu_four_sub_one_menu_item_description' ); ?></span>
                                    </a>
                                  </li>
                                <?php endif; ?>
                              <?php endwhile; ?>
                            </ul>
                          <?php else : ?>
                            <?php // No rows found ?>
                          <?php endif; ?>
                        </div>
                        <div id="navEvents">
                          <div class="menu-h2">
                            <?php the_sub_field( 'nav_menu_five_sub_two_menu_title' ); ?>
                          </div>
                          <?php if ( have_rows( 'nav_menu_five_sub_two_menu_items' ) ) : ?>
                            <ul class="menu-sub-menu links single">
                              <?php while ( have_rows( 'nav_menu_five_sub_two_menu_items' ) ) : the_row(); ?>
                                <?php $nav_menu_four_sub_two_menu_item_link = get_sub_field( 'nav_menu_four_sub_two_menu_item_link' ); ?>
                                <?php if ( $nav_menu_four_sub_two_menu_item_link ) : ?>
                                  <li>
                                    <a href="<?php echo esc_url( $nav_menu_four_sub_two_menu_item_link['url'] ); ?>" target="<?php echo $nav_menu_four_sub_two_menu_item_link['target']; ?>" >
                                      <?php echo esc_html( $nav_menu_four_sub_two_menu_item_link['title'] ); ?>
                                      <span>
                                        <?php the_sub_field( 'nav_menu_four_sub_two_menu_item_description' ); ?>
                                      </span>
                                    </a>
                                  </li>
                                <?php endif; ?>
                              <?php endwhile; ?>
                            </ul>
                          <?php else : ?>
                            <?php // No rows found ?>
                          <?php endif; ?>
                        </div>
                        <div class="productDemo">
                          <?php $nav_menu_five_sub_cta_url_copy = get_sub_field( 'nav_menu_five_sub_cta_url_copy' ); ?>
                          <?php if ( $nav_menu_five_sub_cta_url_copy ) : ?>
                            <a href="<?php echo esc_url( $nav_menu_five_sub_cta_url_copy['url'] ); ?>" target="<?php echo $nav_menu_five_sub_cta_url_copy['target']; ?>" >
                              <?php echo esc_html( $nav_menu_five_sub_cta_url_copy['title'] ); ?>
                              <?php $nav_menu_five_sub_cta_image_copy = get_sub_field( 'nav_menu_five_sub_cta_image_copy' ); ?>
                              <?php if ( $nav_menu_five_sub_cta_image_copy ) : ?>
                                <img width="800" height="600" src="<?php echo esc_url( $nav_menu_five_sub_cta_image_copy['url'] ); ?>" alt="<?php echo esc_attr( $nav_menu_five_sub_cta_image_copy['alt'] ); ?>" />
                              <?php endif; ?>
                              <?php the_sub_field( 'nav_menu_five_sub_cta_text_copy' ); ?>
                              <span>
                                <?php the_sub_field( 'nav_menu_five_sub_cta_description_copy' ); ?>
                              </span>
                            </a>
                          <?php endif; ?>
                        </div>
                      </div>
										<?php endwhile; ?>
									<?php endif; ?>
								</li>

								<li class="sub">
									<?php if ( have_rows( 'nav_menu_item_6' ) ) : ?>
										<?php while ( have_rows( 'nav_menu_item_6' ) ) : the_row(); ?>
											<a class="menu-h1" href="#">
                        <span><?php the_sub_field( 'nav_menu_six_top_menu_text' ); ?></span>
                      </a>
                      <div class="sub-menu-wrapper nav_menu_item_6">
                        <?php if ( have_rows( 'nav_menu_six_sub_one_menu_items' ) ) : ?>
                          <ul class="menu-sub-menu links single">
                            <?php while ( have_rows( 'nav_menu_six_sub_one_menu_items' ) ) : the_row(); ?>
                              <?php $nav_menu_five_sub_one_menu_item_link = get_sub_field( 'nav_menu_five_sub_one_menu_item_link' ); ?>
                              <?php if ( $nav_menu_five_sub_one_menu_item_link ) : ?>
                                <li>
                                  <a href="<?php echo esc_url( $nav_menu_five_sub_one_menu_item_link['url'] ); ?>" target="<?php echo $nav_menu_five_sub_one_menu_item_link['target']; ?>" >
                                    <?php echo esc_html( $nav_menu_five_sub_one_menu_item_link['title'] ); ?>
                                    <span>
                                      <?php the_sub_field( 'nav_menu_five_sub_one_menu_item_description' ); ?>
                                    </span>
                                  </a>
                                </li>
                              <?php endif; ?>
                            <?php endwhile; ?>
                          </ul>
                        <?php else : ?>
                            <?php // No rows found ?>
                        <?php endif; ?>
                        <div class="productDemo">
                          <?php $nav_menu_six_sub_cta_url_copy = get_sub_field( 'nav_menu_six_sub_cta_url_copy' ); ?>
                          <?php if ( $nav_menu_six_sub_cta_url_copy ) : ?>
                            <a href="<?php echo esc_url( $nav_menu_six_sub_cta_url_copy['url'] ); ?>" target="<?php echo $nav_menu_six_sub_cta_url_copy['target']; ?>" >
                              <?php echo esc_html( $nav_menu_six_sub_cta_url_copy['title'] ); ?>
                              <?php $nav_menu_six_sub_cta_image_copy = get_sub_field( 'nav_menu_six_sub_cta_image_copy' ); ?>
                              <?php if ( $nav_menu_six_sub_cta_image_copy ) : ?>
                                <img width="800" height="600" src="<?php echo esc_url( $nav_menu_six_sub_cta_image_copy['url'] ); ?>" alt="<?php echo esc_attr( $nav_menu_six_sub_cta_image_copy['alt'] ); ?>" />
                              <?php endif; ?>
                              <?php the_sub_field( 'nav_menu_six_sub_cta_text_copy' ); ?>
                              <span>
                                  <?php the_sub_field( 'nav_menu_six_sub_cta_description_copy' ); ?>
                              </span>
                            </a>
                          <?php endif; ?>
                        </div>
                      </div>
										<?php endwhile; ?>
									<?php endif; ?>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
          <div class="site-cta">
            <a href="<?php echo get_field( 'nav_login_link', 'option' ); ?>" target="_blank">Log in</a>
            <?php $nav_header_button = get_field( 'nav_header_button', 'option' ); ?>
            <?php if ( $nav_header_button ) : ?>
              <a class="btn button-var-1" href="<?php echo esc_url( $nav_header_button['url'] ); ?>" target="<?php echo $nav_header_button['target']; ?>" ><?php echo esc_html( $nav_header_button['title'] ); ?></a>
            <?php endif; ?>
          </div>
				</div>

				<div class="site-hamburger">
					<button aria-label="Open Menu">
						<span></span>
						<span></span>
					</button>
				</div>
			</div>
		</div>
	</header>