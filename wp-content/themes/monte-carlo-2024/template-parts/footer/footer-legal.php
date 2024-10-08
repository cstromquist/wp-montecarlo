<div class="footer-legal">
  <div class="row">
    <div class="col">
      <div>
        <?php $footer_logo = get_field( 'footer_logo', 'option' ); ?>
        <?php if ( $footer_logo ) : ?>
          <img width="100" height="100" class="logo" src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" />
        <?php endif; ?>

        <div>
          <span class="copyright"><?php echo get_field( 'footer_legal_text', 'option' ); ?></span>
          
          <?php if ( have_rows( 'footer_legal_menu', 'option' ) ) : ?>
            <ul class="links">
              <?php while ( have_rows( 'footer_legal_menu', 'option' ) ) : the_row(); ?>
                <?php $footer_legal_link = get_sub_field( 'footer_legal_link' ); ?>
                <?php if ( $footer_legal_link ) : ?>
                  <li>
                    <a href="<?php echo esc_url( $footer_legal_link['url'] ); ?>" target="<?php echo $footer_legal_link['target']; ?>" ><?php echo esc_html( $footer_legal_link['title'] ); ?></a>
                  </li>
                <?php endif; ?>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>

          
          <?php if ( have_rows( 'footer_social_link', 'option' ) ) : ?>
            <ul class="links">
              <?php while ( have_rows( 'footer_social_link', 'option' ) ) : the_row(); ?>
                <?php $social_icon_svg = get_sub_field( 'footer_social_icon_svg' ); ?>
                <?php if ( $social_icon_svg ) : ?>
                  <li>
                    <a class="social" href="<?php the_sub_field( 'footer_social_link' ); ?>" target="_blank" aria-label="Footer social link"><?php the_sub_field( 'footer_social_icon_svg' ); ?></a>
                  </li>
                <?php endif; ?>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
          
        </div>
      </div>
    </div>
  </div>
</div>