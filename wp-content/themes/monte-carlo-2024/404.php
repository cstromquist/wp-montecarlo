<?php get_header(); ?>

  <main <?php post_class(); ?> role="main">

    <section class="notfound-main">

      <div class="contain">

        <div class="row">

          <div class="col-xs-12 text-center">

            <h1><?php _e( '404' ); ?></h1>

          </div>

        </div>

        <div class="row center-xs">

          <div class="col-xs-12 col-sm-8 text-center">

            <p class="h3">Sorry, we couldn’t find what you’re looking for. Let's start from the top</p>
            
            <div class="button-wrap">
              <a href="<?php echo home_url( '/' ); ?>" class="btn btn-lg">Back to Home</a>
            </div>

          </div>

        </div>

      </div>

    </section>

  </main>

<?php get_footer(); ?>
