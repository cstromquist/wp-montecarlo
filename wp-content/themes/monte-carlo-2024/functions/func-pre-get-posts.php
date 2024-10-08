<?php

/***************************************************************
  *
  Set Query variables for Pre Get Posts
  *
***************************************************************/

add_action( 'pre_get_posts', 'custom_query_vars' );

function custom_query_vars( $query ) {
  
  if ($query->is_search && !is_admin() ) {
    $query->set('post_type',array('post'));
  }
  
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  if ( !is_admin() && $query->is_main_query() ) {
    if ( is_category() ) {
      $query->set( 'posts_per_page', 9 );
      $query->set( 'post_status', 'publish' );
      $query->set( 'paged', $paged );
    }
    if ( is_post_type_archive('press') ) {
      $query->set( 'posts_per_page', 9 );
      $query->set( 'post_status', 'publish' );
      $query->set( 'paged', $paged );
    }
    if( is_post_type_archive('post') ) {
      $query->set( 'nopaging' , true );
    }
  }
  
  return $query;
  
}

?>
