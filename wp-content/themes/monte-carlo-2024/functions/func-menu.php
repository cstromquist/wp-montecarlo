<?php
/**
 * Menu functions
 *
 * @author   <Author>
 * @version  1.0.0
 * @package  <Package>
 */

 /***************************************************************
   *
   REGISTER MENU AREAS
   If custom menu locations are needed they can be added here
   *
 ***************************************************************/

 function register_menu_locations() {
   register_nav_menus(
     array(
       'main-menu' => __('Main Menu'),
     )
   );
 }
 add_action( 'init', 'register_menu_locations' );

 /***************************************************************
   *
   ADD DIV WRAPPER AROUND SUB MENUS
   *
 ***************************************************************/

class Child_Wrap extends Walker_Nav_Menu {

  function start_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<div class=\"sub-menu-wrapper sub-depth-$depth\"><ul class=\"sub-menu \">\n";  
  }
  function end_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul></div>\n";
  }
  
  function end_el( &$output, $data_object, $depth = 0, $args = null ) {
    //pr($data_object);
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
        
    $output .= "</li>{$n}";
    
  }

}

 /***************************************************************
   *
   ADD DATA ATTRIBUTE TO MENU ITEMS
   *
 ***************************************************************/

function add_menu_atts( $atts, $item, $args ) {

  $atts['data-text'] = $item->title;
  $class = 'menu-link'; // or something based on $item
  $atts['class'] = $class;
  return $atts;

}
add_filter( 'nav_menu_link_attributes', 'add_menu_atts', 10, 3 );

/***************************************************************
  *
  ADD ACF MENU ITEMS
  *
***************************************************************/

add_filter('wp_nav_menu_objects', 'tb_wp_nav_menu_objects', 10, 2);

function tb_wp_nav_menu_objects( $items, $args ) {
    
    // loop
    foreach( $items as $key=>&$item ) {
        
        $hasVisual = get_field('nav_add_cta_to_dropdown', $item);
        $item->hasVisual .= $hasVisual;

        if ($hasVisual == 1) {
          $img = get_field('nav_visual_image', $item);
          $title = get_field('nav_visual_title', $item);
          $text = get_field('nav_visual_text', $item);
          $navLink = get_field('nav_visual_link', $item);
          $url = $navLink['url'];
          $target = $navLink['target'];

          $item->visualImg .= $img;
          $item->visualTitle .= $title;
          $item->visualText .= $text;
          $item->visualURL .= $url;
          $item->visualTarget .= $target;
        } else {
          $item->visualImg .= '';
          $item->visualTitle .= '';
          $item->visualText .= '';
          $item->visualURL .= '';
          $item->visualTarget .= '';
        }
        
    }
    
    // return
    return $items;
    
}