<header class="post-header">

  <div class="row">
    <div class="col-xs-12 col-sm-9 col-md-8 col-lg-offset-1 col-xl-7">
      <div class="meta">
        <div class="post-cat">
          <?php
            $catIDs = [];
            $categories = get_the_category();
            $separator = ', ';
            $output = '';
            if ( ! empty( $categories ) ) {
              foreach( $categories as $category ) {
                if ($category->name != 'Video') {
                  array_push($catIDs, $category->term_id);
                  $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                }
              }
              echo trim( $output, $separator );
            }
          ?>
        </div>
        <div class="post-date">
          <?php
            $publishDate = (int) get_the_date('ymdHis');
            $modifiedDate = (int) get_the_modified_time('ymdHis');
            if ($modifiedDate > $publishDate) {
              echo '<p class="p-sm">Updated '. get_the_date( 'M d Y' ) . '</p>';
            } else {
              echo '<p class="p-sm">Published '. get_the_date( 'M d Y' ) . '</p>';
            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-9 col-md-8 col-lg-offset-1 col-xl-7">
      <h1><?php echo $title; ?></h1>
      <div class="image">
        <?php if ( has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('large', ['class' => 'disable-lazyload']); ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-4 col-lg-3 col-xl-offset-1">

      <div class="author">
        <?php
          $user_id = get_the_author_meta('ID');
          $user_acf_prefix = 'user_';
          $user_id_prefixed = $user_acf_prefix . $user_id;
          $profile_photo = get_field( 'profile_photo', $user_id_prefixed );
          $size = 'thumbnail';
        ?>
        <?php if ( $profile_photo ) : ?>
          <div class="img_1x1">
            <?php echo wp_get_attachment_image( $profile_photo, $size, "", array( "class" => "disable-lazyload" )  ); ?>
          </div>
        <?php endif; ?>
        <div>
          <p class="name"><?php echo get_the_author_meta('display_name'); ?></p>
          <p class="bio"><?php echo get_the_author_meta('description'); ?></p>
        </div>
      </div>

        <?php if( have_rows( 'authors' ) ): ?>

            <?php
            $i = 0;

            while( have_rows( 'authors' ) ): the_row();
                $user             = get_field('authors');
                $user_id          = $user[$i]->data->ID;
                $user_name        = get_userdata($user_id)->data->display_name;
                $user_description = get_user_meta($user_id, 'description', true);
                $user_id_prefixed = "user_{$user_id}";
                $profile_photo    = get_field('profile_photo', $user_id_prefixed);
            ?>

            <div class="author">

                <?php if ( $profile_photo ) : ?>

                <div class="img_1x1">

                    <?= wp_get_attachment_image(
                        $profile_photo,
                        "thumbnail",
                        "",
                        array( "class" => "disable-lazyload" )
                    ); ?>

                </div>

                <?php endif; ?>

                <div>

                    <?php if ( ! empty( $user_name ) ) : ?>

                        <p class="name"><?= $user_name; ?></p>

                    <?php
                    endif;

                    if ( ! empty( $user_description ) ) :
                    ?>

                        <p class="bio"><?= $user_description; ?></p>

                    <?php endif; ?>

                </div>

            </div>

            <?php
                $i++;
            endwhile;
            ?>

        <?php endif; ?>

      <?php echo tb_share_buttons(); ?>

    </div>
  </div>

</header>
