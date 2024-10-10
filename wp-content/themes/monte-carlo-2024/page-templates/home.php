
<?php
/*
 * Template Name: Home 2024 template
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

    <?php
    $hide_default_related_section = get_field('hide_the_default_page_resources_section');

    global $post;
    if ( !is_page( array( 'about-us', 'careers-at-monte-carlo' ) ) && !$hide_default_related_section ) {
        $checkField = get_field( 'page_related_resources_comp_related_resources', $post->ID );
        $checkForTitle = '';
        if (!is_null($checkField)) {
            $checkForTitle = $checkField['related_resource_1']['related_resource_title'];
        }
        if (!empty($checkForTitle)) :
            if ( have_rows( 'page_related_resources_comp_related_resources', $post->ID ) ) :
                while ( have_rows( 'page_related_resources_comp_related_resources', $post->ID ) ) : the_row();
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
    }
    ?>

  </main>

<?php get_footer(); ?>
