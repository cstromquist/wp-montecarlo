<div class="footer-nav">
  
  <?php if ( have_rows( 'footer_navigation_column_1', 'option' ) ): ?>
    <div class="nav-col">
      <ul>
        <?php while ( have_rows( 'footer_navigation_column_1', 'option' ) ) : the_row(); ?>
      
          <?php if ( get_row_layout() == 'menu_title' ) : ?>
            <li class="nav-title">
              <?php the_sub_field( 'title' ); ?>
            </li>
          <?php elseif ( get_row_layout() == 'menu_sub_title' ) : ?>
            <li class="nav-sub-title">
              <?php the_sub_field( 'sub_title' ); ?>
            </li>
          <?php elseif ( get_row_layout() == 'menu_link' ) : ?>
            <?php $menu_link = get_sub_field( 'menu_link' ); ?>
            <?php if ( $menu_link ) : ?>
              <li class="nav-link">
                <a href="<?php echo esc_url( $menu_link['url'] ); ?>" target="<?php echo $menu_link['target']; ?>" ><?php echo $menu_link['title']; ?></a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php endif; ?>
  
  <?php if ( have_rows( 'footer_navigation_column_2', 'option' ) ): ?>
    <div class="nav-col">
      <ul>
        <?php while ( have_rows( 'footer_navigation_column_2', 'option' ) ) : the_row(); ?>
      
          <?php if ( get_row_layout() == 'menu_title' ) : ?>
            <li class="nav-title">
              <?php the_sub_field( 'title' ); ?>
            </li>
          <?php elseif ( get_row_layout() == 'menu_sub_title' ) : ?>
            <li class="nav-sub-title">
              <?php the_sub_field( 'sub_title' ); ?>
            </li>
          <?php elseif ( get_row_layout() == 'menu_link' ) : ?>
            <?php $menu_link = get_sub_field( 'menu_link' ); ?>
            <?php if ( $menu_link ) : ?>
              <li class="nav-link">
                <a href="<?php echo esc_url( $menu_link['url'] ); ?>" target="<?php echo $menu_link['target']; ?>" ><?php echo $menu_link['title']; ?></a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php endif; ?>
  
  <?php if ( have_rows( 'footer_navigation_column_3', 'option' ) ): ?>
    <div class="nav-col">
      <ul>
        <?php while ( have_rows( 'footer_navigation_column_3', 'option' ) ) : the_row(); ?>
      
          <?php if ( get_row_layout() == 'menu_title' ) : ?>
            <li class="nav-title">
              <?php the_sub_field( 'title' ); ?>
            </li>
          <?php elseif ( get_row_layout() == 'menu_sub_title' ) : ?>
            <li class="nav-sub-title">
              <?php the_sub_field( 'sub_title' ); ?>
            </li>
          <?php elseif ( get_row_layout() == 'menu_link' ) : ?>
            <?php $menu_link = get_sub_field( 'menu_link' ); ?>
            <?php if ( $menu_link ) : ?>
              <li class="nav-link">
                <a href="<?php echo esc_url( $menu_link['url'] ); ?>" target="<?php echo $menu_link['target']; ?>" ><?php echo $menu_link['title']; ?></a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php endif; ?>
  
  <?php if ( have_rows( 'footer_navigation_column_4', 'option' ) ): ?>
    <div class="nav-col">
      <ul>
        <?php while ( have_rows( 'footer_navigation_column_4', 'option' ) ) : the_row(); ?>
      
          <?php if ( get_row_layout() == 'menu_title' ) : ?>
            <li class="nav-title">
              <?php the_sub_field( 'title' ); ?>
            </li>
          <?php elseif ( get_row_layout() == 'menu_sub_title' ) : ?>
            <li class="nav-sub-title">
              <?php the_sub_field( 'sub_title' ); ?>
            </li>
          <?php elseif ( get_row_layout() == 'menu_link' ) : ?>
            <?php $menu_link = get_sub_field( 'menu_link' ); ?>
            <?php if ( $menu_link ) : ?>
              <li class="nav-link">
                <a href="<?php echo esc_url( $menu_link['url'] ); ?>" target="<?php echo $menu_link['target']; ?>" ><?php echo $menu_link['title']; ?></a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php endif; ?>

</div>