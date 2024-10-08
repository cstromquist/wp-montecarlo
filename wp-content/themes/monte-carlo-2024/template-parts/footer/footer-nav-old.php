<div class="footer-main">
          <div class="row">
            <?php if ( have_rows( 'footer_menus', 'option' ) ) : ?>
              <?php while ( have_rows( 'footer_menus', 'option' ) ) : the_row(); ?>
                
                <div class="col-xs-6 col-sm-2" style="display:flex; flex-direction:column;">
                  <h5 style="display: none;"><?php the_sub_field( 'footer_top_level_menu_item' ); ?></h5>

                  <?php $footer_top_menu_title = get_sub_field( 'footer_top_menu_title' ); ?>
                  
                  <?php if ( $footer_top_menu_title ) : ?>
                    <h5 class="menu-h1"><?php the_sub_field( 'footer_top_menu_title' ); ?></h5>
                  <?php endif; ?>
                  
                  
                  <?php $footer_top_menu_link = get_sub_field( 'footer_top_menu_link' ); ?>
                  
                  <?php if ( $footer_top_menu_link ) : ?>
                    <h5 class="menu-h1">
                      <a href="<?php echo esc_url( $footer_top_menu_link['url'] ); ?>" <?php echo $footer_top_menu_link['target']; ?> ><?php echo esc_html( $footer_top_menu_link['title'] ); ?></a>
                    </h5>
                  <?php endif; ?>
                  
                  <?php if ( get_sub_field( 'footer_add_title_to_menu' ) == 1 ) : ?>
                    <?php // echo 'true add_title_to_menu'; ?>
                  <?php else : ?>
                    <?php // echo 'false add_title_to_menu'; ?>
                  <?php endif; ?>
                  
                  <h6 class="menu-h2"><?php the_sub_field( 'footer_menu_title' ); ?></h6>
                  
                  <?php if ( have_rows( 'footer_menu_items' ) ) : ?>
                    <ul>
                      <?php while ( have_rows( 'footer_menu_items' ) ) : the_row(); ?>
                        <?php $footer_menu_menu_item = get_sub_field( 'footer_menu_menu_item' ); ?>
                        <?php if ( $footer_menu_menu_item ) : ?>
                          <li>
                            <a href="<?php echo esc_url( $footer_menu_menu_item['url'] ); ?>" <?php echo $footer_menu_menu_item['target']; ?> ><?php echo $footer_menu_menu_item['title']; ?></a>
                          </li>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    </ul>
                  <?php else : ?>
                    <?php // No rows found ?>
                  <?php endif; ?>
                  
                  <?php if ( get_sub_field( 'footer_menu_add_a_second_menu' ) == 1 ) : ?>
                    <?php // echo 'true menu_add_a_second_menu'; ?>
                  <?php else : ?>
                    <?php // echo 'false menu_add_a_second_menu'; ?>
                  <?php endif; ?>
                  
                  <?php if ( get_sub_field( 'footer_add_title_to_menu_two' ) == 1 ) : ?>
                    <?php // echo 'true add_title_to_menu_two'; ?>
                  <?php else : ?>
                    <?php // echo 'false add_title_to_menu_two'; ?>
                  <?php endif; ?>
                  
                  <h6 class="menu-h2"><?php the_sub_field( 'footer_menu_two_title' ); ?></h6>
                  
                  <?php if ( have_rows( 'footer_menu_two_items' ) ) : ?>
                    <ul>
                      <?php while ( have_rows( 'footer_menu_two_items' ) ) : the_row(); ?>
                        <?php $footer_menu_two_menu_item = get_sub_field( 'footer_menu_two_menu_item' ); ?>
                        <?php if ( $footer_menu_two_menu_item ) : ?>
                          <li>
                            <a href="<?php echo esc_url( $footer_menu_two_menu_item['url'] ); ?>" <?php echo $footer_menu_two_menu_item['target']; ?> ><?php echo esc_html( $footer_menu_two_menu_item['title'] ); ?></a>
                          </li>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    </ul>
                  <?php else : ?>
                    <?php // No rows found ?>
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            <?php else : ?>
              <?php // No rows found ?>
            <?php endif; ?>
          </div>
        </div>