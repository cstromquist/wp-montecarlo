<header class="blog-nav contain hide-xs show-md">
  <div class="grip">
    <div class="bg"></div>
    <div class="row middle-xs">
      <div class="col-xs-10">
        <ul class="cat-nav">
          <?php if (!is_home()) : ?>
            <li class="cat-item">
              <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">All</a>
            </li>
          <?php endif; ?>
          <?php
            wp_list_categories( array(
              'orderby'  => 'term_order',
              'title_li' => '',
              'parent'   => 0,
              'exclude'  => array(183)
            ) ); 
          ?>
        </ul>
      </div>
      <div class="col-xs-2">
        <button id="openSearch">
          <span>
            <?php include( locate_template( 'template-parts/svgs/search-icon.php', false, false ) ); ?>
          </span>
          <span>Search articles</span>
        </button>
        <?php include( locate_template( 'searchform.php', false, false ) ); ?>
      </div>
    </div>
  </div>
</header>