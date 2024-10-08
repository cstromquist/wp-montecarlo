<?php
/**
 * Admin functions
**/

/***************************************************************
  *
  UPDATE CSS IN ADMIN
  *
***************************************************************/

function admin_style($hook) {
  global $post;

  // Custom Admin CSS
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/dist/css/admin.css');
  
  if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
    wp_enqueue_style('acf-block-styles', get_template_directory_uri().'/assets/dist/css/blocksAcf.css');
  }

  // Custom tooltips for Admin
  //wp_enqueue_script( 'tooltip-scripts', get_template_directory_uri() . '/assets/admin/zebra_tooltips.min.js', array( 'jquery' ), filemtime(get_theme_file_path('/assets/admin/zebra_tooltips.min.js')), false );

  //if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
  //  if ( 'custompage' === $post->post_type || 'solutions' === $post->post_type ) {
  //    wp_enqueue_style('admin-builder-styles', get_template_directory_uri().'/assets/dist/css/pageBuilder.css');
  //  }
  //}

}

add_action('admin_enqueue_scripts', 'admin_style');

//add_action('admin_head', 'tb_add_css_js_to_admin');

//function tb_add_css_js_to_admin() {
//  echo '<script>
//    jQuery(document).ready(function() {

//      new jQuery.Zebra_Tooltips(jQuery(".zebra_tip"), {
//        max_width:  350,
//        show_delay: 50,
//        vertical_offset: -5
//      });

//    });
//  </script>';
//}
