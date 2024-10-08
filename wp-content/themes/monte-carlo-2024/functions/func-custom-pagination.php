<?php

/***************************************************************
  *
  PAGINATION
  *
***************************************************************/

// Numeric Page Navi (built into the theme by default)
function bones_page_navi() {
  global $wp_rewrite, $wp_query;
  $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  //echo '<nav class="pagination">';
  $pagination = array(
    'base'      => @add_query_arg('page','%#%'),
    'format'    => '',
    'total'     => $wp_query->max_num_pages,
    'current'   => $current,
    'prev_next' => true,
    'prev_text' => '<span></span> Prev',
    'next_text' => 'Next <span></span>',
    'type'      => 'list',
    'end_size'  => 1,
    'mid_size'  => 1,
    'type' => 'array'
  );
  //echo '</nav>';
  if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
  if ( !empty( $wp_query->query_vars['s'] ) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
  $pages = paginate_links( $pagination );
  echo '<div class="pagination-wrap"><div class="post-pagination"><ul>';
  $countItem = 1;
  foreach ($pages as $page) :
    if ($countItem == 1) :
      echo '<li class="pag-first blog-pag">'.$page.'</li>';
    else :
      echo '<li class="blog-pag">'.$page.'</li>';
    endif;
    $countItem++;
  endforeach;
  echo '</ul></div></div>';

} /* end page navi */

/***************************************************************
 * Function if you need to printx out of x many posts 
***************************************************************/

 //function main_posts_count() {

//    $posts = min( ( int ) $wp_query->get( 'posts_per_page' ), $wp_query->found_posts );
//    $paged = max( ( int ) $wp_query->get( 'paged' ), 1 );
//    $count = ( $paged - 1 ) * $posts;

//    $return = sprintf(
//        '%d - %d of %d',
//        $count + 1,
//        $count + $wp_query->post_count,
//        $wp_query->found_posts
//    );
    
//    return $return;
    
//}

?>
