<?php
/***************************************************************
  *
  ALLOW SVG FILE TYPES
  *
***************************************************************/

function tb_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'tb_mime_types' );

/**
 * Enqueue SVG javascript and stylesheet in admin
 * @author fadupla
 */

function tb_svg_enqueue_scripts( $hook ) {
	wp_enqueue_style( 'c5-svg-style', get_theme_file_uri( '/assets/admin/svg.css' ) );
	wp_enqueue_script( 'c5-svg-script', get_theme_file_uri( '/assets/admin/svg.js' ), 'jquery' );
	wp_localize_script( 'c5-svg-script', 'script_vars',
		array( 'AJAXurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'admin_enqueue_scripts', 'tb_svg_enqueue_scripts' );


/**
 * Ajax get_attachment_url_media_library
 * @author fadupla
 */
function tb_get_attachment_url_media_library() {

	$url          = '';
	$attachmentID = isset( $_REQUEST['attachmentID'] ) ? $_REQUEST['attachmentID'] : '';
	if ( $attachmentID ) {
		$url = wp_get_attachment_url( $attachmentID );
	}

	echo $url;

	die();
}

add_action( 'wp_ajax_svg_get_attachment_url', 'tb_get_attachment_url_media_library' );

?>
