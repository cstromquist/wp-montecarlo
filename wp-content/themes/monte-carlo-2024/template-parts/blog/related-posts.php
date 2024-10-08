<section class="related-posts contain">
  <div class="row center-xs">
    <div class="col-xs-12 col-lg-10 text-center">
      <?php if ($curated_posts) : ?>
        <h2 class="h5"><?php the_field( 'related_posts_title', $term_id_prefixed ); ?></h2>
      <?php else : ?>
        <h2 class="h5">Read more related stories.</h2>
      <?php endif; ?>
    </div>
  </div>
  <div class="row posts_row">
    <?php foreach ( $cat_related_posts as $post ) : setup_postdata ( $post ); ?>
      <div class="col-xs-12 col-sm-4">
        <?php include( locate_template( 'template-parts/blog/post-card.php', false, false ) ); ?>
      </div>
    <?php endforeach; wp_reset_postdata(); ?>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <span class="border-break"></span>
    </div>
  </div>
</section>