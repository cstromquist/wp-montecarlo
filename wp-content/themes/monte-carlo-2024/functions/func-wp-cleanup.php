<?php

/***************************************************************
  *
  REMOVE WP LOGIN ERROR
  *
***************************************************************/

function remove_all_login_errors( $error ) {
  return "Incorrect login information";
}
add_filter( 'login_errors', 'remove_all_login_errors');

/***************************************************************
  *
  REMOVE WP VERSION NUMBER
  *
***************************************************************/

// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

/***************************************************************
  *
  ADD TEXT TO POSTS PAGE
  *
***************************************************************/

/**
* Add the wp-editor back into WordPress after it was removed in 4.2.2.
*
* @see https://wordpress.org/support/topic/you-are-currently-editing-the-page-that-shows-your-latest-posts?replies=3#post-7130021
* @param $post
* @return void
*/
function fix_no_editor_on_posts_page($post) {

 if( $post->ID != get_option( 'page_for_posts' ) ) { return; }

 remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
 add_post_type_support( 'page', 'editor' );

}

// This is applied in a namespaced file - so amend this if you're not namespacing
add_action( 'edit_form_after_title', __NAMESPACE__ . '\\fix_no_editor_on_posts_page', 0 );

/***************************************************************
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 ***************************************************************/

function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
	return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1);

/***************************************************************
  *
  REMOVE ADMIN BAR CSS
  *
***************************************************************/

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

/***************************************************************
  *
  CLEANUP CODE AROUND IMAGES AND REMOVE P TAGS
  *
***************************************************************/

add_filter( 'the_content', 'tb_filter_ptags_on_images' );

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function tb_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

/***************************************************************
  *
  CLEANUP WORDPRESS HEAD
  *
***************************************************************/

add_action( 'init', 'tb_head_cleanup' );

function tb_head_cleanup() {
	// category feeds
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
  // Remove shortlink
  remove_action( 'wp_head', 'wp_shortlink_wp_head');
  //Remove api.w.org relation link
  remove_action('wp_head', 'rest_output_link_wp_head', 10);
  remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
  remove_action('template_redirect', 'rest_output_link_header', 11, 0);
  // remove Emojis
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
}

/***************************************************************
  *
  BETTER WORDPRESS TITLE
  *
***************************************************************/

add_filter( 'the_title', 'tb_title' );

function tb_title( $title ) {
  if ( $title == '' ) {
    return '&rarr;';
  } else {
    return $title;
  }
}

add_filter( 'wp_title', 'tb_filter_wp_title' );

function tb_filter_wp_title( $title ) {
  return $title . esc_attr( get_bloginfo( 'name' ) );
}

/***************************************************************
  *
  DO NOT LOAD DASHICONS ON FRONTEND
  *
***************************************************************/

add_action( 'wp_enqueue_scripts', 'bs_dequeue_dashicons' );
function bs_dequeue_dashicons() {
    if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
}

// show_admin_bar( true );

/***************************************************************
  *
  REMOVE JQUERY MIGRATE
  *
***************************************************************/

function remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];

        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
}

add_action('wp_default_scripts', 'remove_jquery_migrate');
?>
