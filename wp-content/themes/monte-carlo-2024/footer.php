    <footer id="footer" role="contentinfo">
      <div class="contain">
        
        <div class="footer-header">
          <div class="row">
            <div class="col-xs-12">
              <div class="footer-heading">
                <h2><?php echo get_field( 'footer_title', 'option' ); ?></h2>
                
                <div class="cta-wrap">
                  <?php 
                    
                    $footer_hero_cta_type = get_field( 'footer_cta_type', 'option' );
                    
                    if ($footer_hero_cta_type == 'link') :
                    $footer_cta = get_field( 'footer_cta_link', 'option' );
                    if ( $footer_cta ) :
                  ?>
                    <a class="btn btn-lg" href="<?php echo esc_url( $footer_cta['url'] ); ?>" target="<?php echo $footer_cta['target']; ?>" ><?php echo esc_html( $footer_cta['title'] ); ?></a>
                  <?php 
                      endif;
                      
                    else :
                      echo get_field( 'footer_cta_embed', 'option' );
                    endif;

                    $footer_scripts = get_field( 'footer_scripts', 'option' );

                    if ($footer_scripts) {
                        echo $footer_scripts;
                    }
                  ?>
                </div>

              </div>
            </div>
          </div>
        </div>
        
        <div class="footer-main">
          <?php 
            // Footer Nav
            include( locate_template( 'template-parts/footer/footer-nav.php', false, false ) );
            // Footer Blog
            include( locate_template( 'template-parts/footer/footer-blog.php', false, false ) );
          ?>
        </div>

        <?php 
          // Footer Legal
          include( locate_template( 'template-parts/footer/footer-legal.php', false, false ) ); 
        ?>
        
      </div>
    </footer>
    
    <?php wp_footer(); ?>

  </body>

</html>
