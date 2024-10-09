<?php
/**
 * Enqueue scripts and styles.
 */
function tailwind_scripts() {
	wp_enqueue_style( 'output', get_template_directory_uri() . '/assets/dist/css/tailwind.css', array() );
}
add_action( 'wp_enqueue_scripts', 'tailwind_scripts' );

function load_admin_style($hook) {
  if ('post.php' === $hook || 'post-new.php' === $hook || 'site-editor.php' === $hook) {
  	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/assets/dist/css/tailwind.css', array() );
  }
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );
