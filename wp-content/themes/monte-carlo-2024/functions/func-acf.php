<?php

/***************************************************************
  *
  MOVE RESOURCE WYSIWYG TO ACF BOX & CUSTOM CSS FOR ACF BACKEND
  *
***************************************************************/

function tb_acf_admin_head() {
    ?>
    
    <style type="text/css">

      .acf-field #wp-content-editor-tools {
          background: transparent;
          padding-top: 0;
          position: relative !important;
          width: 100% !important;
      }

      .acf-field-5acfdc4dcd5e6 .acf-repeater .acf-row > td {
        border:0;
        border-bottom: 15px solid #dedede;
      }

    </style>
    <?php
}

add_action('acf/input/admin_head', 'tb_acf_admin_head');

/***************************************************************
  *
  DYNAMICALLY POPULATE ACF ACCORDION TITLES
  *
***************************************************************/

function acf_admin_enqueue_script( $hook ) {

  if (is_edit_page()){
	  wp_enqueue_script( 'c5-acf-accordion', get_theme_file_uri( '/assets/admin/acf-accordion.js' ), 'jquery' );
  }

}

add_action( 'admin_enqueue_scripts', 'acf_admin_enqueue_script' );

/***************************************************************
  *
  SYNC ACF FIELDS BETWEEN ENVIRONMENTS
  *
***************************************************************/

function tb_acf_json_load_point( $paths ) {

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';


    // return
    return $paths;

}
add_filter('acf/settings/load_json', 'tb_acf_json_load_point');

/***************************************************************
  *
  ADD STRIPPED DOWN WYSIWYG OPTION
  *
***************************************************************/

// Add themed colors to WYSIWYG 
//function tb_mce4_options($init) {

//    $custom_colours = '
//        "3366FF", "Color 1 name",
//        "CCFFCC", "Color 2 name",
//        "FFFF00", "Color 3 name",
//        "99CC00", "Color 4 name",
//        "FF0000", "Color 5 name",
//        "FF99CC", "Color 6 name",
//        "CCFFFF", "Color 7 name"
//    ';

//    // build colour grid default+custom colors
//    $init['textcolor_map'] = '['.$custom_colours.']';

//    // change the number of rows in the grid if the number of colors changes
//    // 8 swatches per row
//    $init['textcolor_rows'] = 1;

//    return $init;
//}
//add_filter('tiny_mce_before_init', 'tb_mce4_options');


add_filter( 'acf/fields/wysiwyg/toolbars', function ( $toolbars ) {
  
  // Basic without CTA button
  $toolbars['Basic'] = array();
  $toolbars['Basic'][1] = array('forecolor', 'bold', 'italic', 'underline', 'strikethrough', 'bullist', 'numlist', 'alignleft', 'aligncenter', 'alignright', 'link', 'undo', 'redo', 'pastetext');
  
  // Basic with CTA button
  $toolbars['Basic with CTA button'] = array();
  $toolbars['Basic with CTA button'][1] = array('forecolor', 'bold', 'italic', 'underline', 'strikethrough', 'bullist', 'numlist', 'alignleft', 'aligncenter', 'alignright', 'link', 'undo', 'redo', 'pastetext', 'c5ctabutton');
  
  // Bare
  $toolbars['Bare'] = array();
  $toolbars['Bare'][1] = array('bold', 'forecolor', 'link', 'pastetext',);
      
	return $toolbars;

} );

/***************************************************************
  *
  Settings for Advanced Custom Field Extended Plugin 
  *
***************************************************************/

add_action('acf/init', 'tb_acfe_modules');

function tb_acfe_modules(){

  acf_update_setting('acfe/modules/author', false);
  //acf_update_setting('acfe/modules/dynamic_options_pages', false);
  //acf_update_setting('acfe/modules/dynamic_block_types', false);
  acf_update_setting('acfe/modules/dynamic_forms', false);

}

add_filter('acfe/flexible/thumbnail/layout=menu_title', 'tb_acf_layout_title_thumbnail', 10, 3);
function tb_acf_layout_title_thumbnail($thumbnail, $field, $layout){
  // Must return an URL or Attachment ID
  return 10124;
}

add_filter('acfe/flexible/thumbnail/layout=menu_sub_title', 'tb_acf_layout_sub_thumbnail', 10, 3);
function tb_acf_layout_sub_thumbnail($thumbnail, $field, $layout){
  // Must return an URL or Attachment ID
  return 10123;
}

add_filter('acfe/flexible/thumbnail/layout=menu_link', 'tb_acf_layout_link_thumbnail', 10, 3);
function tb_acf_layout_link_thumbnail($thumbnail, $field, $layout){
  // Must return an URL or Attachment ID
  return 10122;
}



/***************************************************************
  *
  Dynamic preview for buttons/links 
  *
***************************************************************/

add_action('acf/render_field/name=button_link_styles', 'tb_acfe_links_dynamic_render');
add_action('acf/render_field/name=link_button_link_styles', 'tb_acfe_links_dynamic_render');
function tb_acfe_links_dynamic_render($field){
    ?>
    
    <table class="wp-list-table widefat fixed striped">
      <thead>
        <tr>
          <th><b>Button style 1</b></th>
          <th><b>Button style 2</b></th>
          <th><b>Button style 3</b></th>
          <th><b>Button style 4</b></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><a class="btn button-var-1">Btn</a></td>
          <td><a class="btn button-var-2">Btn</a></td>
          <td><a class="btn button-var-3">Btn</a></td>
          <td><a class="btn button-var-4">Btn</a></td>
        </tr>
      </tbody>
    </table>
    
    <table class="wp-list-table widefat fixed striped">
      <thead>
        <tr>
          <th><b>Link style 1</b></th>
          <th><b>Link style 2</b></th>
          <th><b>Link style 3</b></th>
          <th><b>Link style 4</b></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><a class="btn link-var-1">Link</a></td>
          <td><a class="btn link-var-2">Link</a></td>
          <td><a class="btn link-var-3">Link</a></td>
          <td><a class="btn link-var-4">Link</a></td>
        </tr>
      </tbody>
    </table>
    
    <?php
}

/***************************************************************
  *
  Exclude video cat from CTA taxonomy dropdown 
  *
***************************************************************/

add_filter('acf/fields/taxonomy/query/name=append_cta_to', 'tb_taxonomy_args', 10, 2);
    
  function tb_taxonomy_args( $args, $field ) {
    $args['exclude'] = array(183); //the IDs of the excluded terms
    return $args;
  }

?>
