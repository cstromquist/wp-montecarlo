<?php
/**
 * Script functions
 *
 * @author   <Author>
 * @version  1.0.0
 * @package  <Package>
 */

/**
 * Enqueue theme scripts
 */
function tb_wp_theme_scripts() {

	$theme_handle_prefix = 'c5';

	// remove wordpress jquery
	wp_deregister_script('jquery');

	// use google cdn for jquery
	wp_register_script('jquery', ('//code.jquery.com/jquery-3.6.3.min.js'), false, null, true);
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( $theme_handle_prefix . '-scripts', get_template_directory_uri() . '/assets/dist/js/scripts.js', array( 'jquery' ), filemtime(get_theme_file_path('/assets/dist/js/scripts.js')), true );

	wp_localize_script( $theme_handle_prefix . '-scripts', 'ajax', array(
		'nonce' => wp_create_nonce( 'ajax' ),
		'url' => admin_url( 'admin-ajax.php' )
	));

}

add_action( 'wp_enqueue_scripts', 'tb_wp_theme_scripts' );
