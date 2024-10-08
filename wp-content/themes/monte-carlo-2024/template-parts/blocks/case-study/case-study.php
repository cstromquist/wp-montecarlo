<?php
/**
 * Block template file: /Users/tommy/Local Sites/montecarlo/app/public/wp-content/themes/monte-carlo-2023/template-parts/blocks/case-study/case-study.php
 *
 * Case Study Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'case-study-block-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-case-study-block';
if ( ! empty( $block['className'] ) ) {
  $classes .= ' ' . $block['className'];
}

?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
  
  <div class="row">
    <div class="col col-lg-11 col-xl-10">
      <h2><?php echo get_field( 'case_study_block_title' ); ?></h2>
    </div>
  </div>
  
  <?php if ( get_field( 'case_study_block_show_data_stack' ) == 1 ) : ?>
    
    <div class="data-stack">
      
      <p class="h5"><?php echo get_field( 'case_study_block_data_stack_title' ); ?></p>
      
      <?php $case_study_block_data_stack_logos_images = get_field( 'case_study_block_data_stack_logos' ); ?>
      <?php if ( $case_study_block_data_stack_logos_images ) :  ?>
        <ul>
          <?php foreach ( $case_study_block_data_stack_logos_images as $case_study_block_data_stack_logos_image ): ?>
            <li>
              <img src="<?php echo esc_url( $case_study_block_data_stack_logos_image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $case_study_block_data_stack_logos_image['alt'] ); ?>" />
              <p><?php echo esc_html( $case_study_block_data_stack_logos_image['caption'] ); ?></p>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      
    </div>
    
  <?php endif; ?>
    
  <?php if ( get_field( 'case_study_block_add_callout_stats' ) == 1 ) : ?>
    <?php if ( have_rows( 'case_study_block_callout_stats' ) ) : ?>
      <?php while ( have_rows( 'case_study_block_callout_stats' ) ) : the_row(); ?>
        <div class="callout-stats">
          <div>
            <p class="h2"><?php the_sub_field( 'stat_title_one' ); ?></p>
            <p><?php the_sub_field( 'stat_text_one' ); ?></p>
          </div>
          <div>
            <p class="h2"><?php the_sub_field( 'stat_title_two' ); ?></p>
            <p><?php the_sub_field( 'stat_text_two' ); ?></p>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  <?php endif; ?>
  
  <div class="challenge-solution">
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <h3><?php echo get_field( 'case_study_block_column_one_title' ); ?></h3>
        <div class="column-text">
          <?php echo get_field( 'case_study_block_column_one_text' ); ?>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <h3><?php echo get_field( 'case_study_block_column_two_title' ); ?></h3>
        <div class="column-text">
          <?php echo get_field( 'case_study_block_column_two_text' ); ?>
        </div>
      </div>
    </div>
  </div>
  
  <?php if ( have_rows( 'case_study_block_testimonial' ) ) : ?>
    <?php while ( have_rows( 'case_study_block_testimonial' ) ) : the_row(); ?>
      <div class="client-story">
        <?php $client_logo = get_sub_field( 'client_logo' ); ?>
        <?php if ( $client_logo ) : ?>
          <div class="client-logo">
            <img src="<?php echo esc_url( $client_logo['url'] ); ?>" alt="<?php echo esc_attr( $client_logo['alt'] ); ?>" />
          </div>
        <?php endif; ?>
        <p class="quote"><?php the_sub_field( 'quote' ); ?></p>
        <p class="quotee">
          <span><?php the_sub_field( 'quotee' ); ?></span>
          <span><?php the_sub_field( 'quotee_title_position' ); ?></span>
        </p>
        <?php $link_to_study = get_sub_field( 'link_to_study' ); ?>
        <?php if ( $link_to_study ) : ?>
          <div class="cta-wrap">
            <a class="link link-lg" href="<?php echo esc_url( $link_to_study['url'] ); ?>" target="<?php echo $link_to_study['target']; ?>" ><?php echo esc_html( $link_to_study['title'] ); ?></a>
          </div>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  
</section>