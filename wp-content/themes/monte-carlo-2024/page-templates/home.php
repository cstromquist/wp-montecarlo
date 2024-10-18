
<?php
/*
 * Template Name: 2024 Home Page template
 * Template Post Type: page
 */
?>

<?php get_header(); ?>

  <main <?php post_class('post-content'); ?> role="main">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php
        $postTypeClassesBase = '';
        $firstElement = true;

        $blocks = parse_blocks( get_the_content() );

        foreach ( $blocks as $block ) {
            if ($firstElement) {
                if ( has_block( 'acf/hero' ) || has_block( 'acf/form-hero' ) || has_block('acf/mc-hero')) {
                    $postTypeClasses = $postTypeClassesBase . ' no-spacer';
                } else {
                    $postTypeClasses = $postTypeClassesBase . ' hero-spacer';
                }
                $firstElement = false;
            } else {
                $postTypeClasses = $postTypeClassesBase;
            }

            if ( $block['blockName'] === 'acf/related' ) {
                echo render_block( $block );
            } elseif ($block['blockName'] === 'cpcff/form-shortcode') {
                echo '<div class="' . $postTypeClasses . '">';
                echo '  <div class="row center-sm">';
                echo '    <div class="col-xs-12">';
                echo '      <div class="post-copy page-copy">';
                _e(do_shortcode($block['innerHTML']));
                echo '      </div>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            } else {
                echo '<div class="' . $postTypeClasses . '">';
                echo '  <div class="row center-sm">';
                echo '    <div class="col-xs-12">';
                echo '      <div class="post-copy page-copy">';
                echo          render_block( $block );
                echo '      </div>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            }
        }
        ?>

    <?php endwhile; endif; ?>

  </main>

<?php get_footer(); ?>
