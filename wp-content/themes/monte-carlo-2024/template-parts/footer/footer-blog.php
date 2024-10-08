<?php 
 
  $footerPosts = [];
  $blogOption = get_field( 'choose_how_to_populate_footer_blog_posts', 'option' );
  
  if ($blogOption == 'curated') {
    $footerPosts = get_field( 'footer_blog_curated_list', 'option' );
  } else {
    $footerPosts = get_posts(array(
      'post_type' => 'post',
      'numberposts' => 3,
      'post_status' => 'publish',
    ));
  }
  
  if ( $footerPosts ) :
    
?>

<div class="footer-blog">
    <h3><?php echo get_field( 'footer_blog_title', 'option' ); ?></h3>
    <ul>

    <?php
    foreach ( $footerPosts as $post ) :
        setup_postdata ( $post );
    ?>

        <li>
            <div class="footer-card">
                <a href="<?php the_permalink(); ?>">
                    <h4><?php the_title(); ?></h4>
                </a>

                <?php if ( has_excerpt( $post->ID ) ) : ?>

                <div class="content">
                    <?php the_excerpt(); ?>
                </div>

                <?php endif; ?>

                <span class="faux-a link link-sm">Read now</span>
            </div>
        </li>

    <?php endforeach; wp_reset_postdata(); ?>

    </ul>
</div>

<?php endif; ?>