<?php
/**
 * Enqueue theme styles.
 */
function tb_wp_theme_styles() {

	/**
	 * Set a script handle prefix based on theme name.
	 */
	$theme_handle_prefix = 'c5';

	// register Google fonts
	//wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Mono:400,700|Roboto:100,300,400,500,700&display=swap', false );

	//wp_enqueue_style( 'google-fonts' );

	wp_enqueue_style( $theme_handle_prefix . '-styles', get_template_directory_uri() . '/assets/dist/css/style.css', array(), filemtime(get_theme_file_path('/assets/dist/css/style.css')), 'all' );

	//See func-theme-setup.php
	if (is_front_page()) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
	}

}
add_action( 'wp_enqueue_scripts', 'tb_wp_theme_styles' );
