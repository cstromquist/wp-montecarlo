<?php
/* 
  Custom Post Types 
  ****************************************************************************************
  - MOVING CUSTOM POST TYPES TO CPT UI PLUGIN FOR EASIER MAINTAINABILITY BETWEEN PROJECTS
  - LEAVING REWRITE RULE IN CASE NEEDED
  ****************************************************************************************
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'tb_flush_rewrite_rules' );

// Flush your rewrite rules
function tb_flush_rewrite_rules() {
  flush_rewrite_rules();
}

// Register Custom Post Type
//function custom_post_type() {

//}

// add_action( 'init', 'custom_post_type', 0 );

add_action( 'template_redirect', 'tb_wp_redirect_post' );

function tb_wp_redirect_post() {
  
  if (  is_singular('events') ) {
    wp_redirect( home_url( '/events/' ), 301 );
    exit;
  }
  
  if (  is_singular('webinars') ) {
    wp_redirect( home_url( '/webinars/' ), 301 );
    exit;
  }
  
  if (  is_singular('press') ) {
    wp_redirect( home_url( '/press/' ), 301 );
    exit;
  }
  
  if (  is_singular('integration') ) {
    wp_redirect( home_url( '/integration/' ), 301 );
    exit;
  }
  
  //if ( is_tag() ) {
  //	wp_redirect( home_url( '/blog/' ), 301 );
  //	exit;
  //}

}

?>
