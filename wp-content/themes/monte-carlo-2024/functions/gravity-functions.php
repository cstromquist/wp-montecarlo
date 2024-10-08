<?php

/***************************************************************
  *
  FORCE GRAVITY FORMS TO INIT SCRIPTS IN THE FOOTER AND ENSURE
  THAT THE DOM IS LOADED BEFORE SCRIPTS ARE EXECUTED
  *
***************************************************************/

//add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );

function wrap_gform_cdata_open( $content = '' ) {

  if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
    return $content;
  }
    $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
    return $content;
  }

  add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );

  function wrap_gform_cdata_close( $content = '' ) {
    if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
    return $content;
    }

  $content = ' }, false );';

  return $content;

}

/***************************************************************
  *
  ADD CLASS TO FIELD TYPES
  *
***************************************************************/

add_filter( 'gform_field_css_class', 'custom_class', 10, 3 );
function custom_class( $classes, $field, $form ) {
    if ( $field->type == 'text' || $field->type == 'textarea' || $field->type == 'email' || $field->type == 'phone' ) {
        $classes .= ' placed-labels';
    }
    return $classes;
}

/***************************************************************
  *
  SWITCH INPUT TO BUTTON
  *
***************************************************************/

add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
  return "<button class='button gform_button' id='gform_submit_button_{$form['id']}'>Submit <div class='arrow-icon-desk'><img class='bit tl' src='/wp-content/themes/va2020/assets/img/tl.svg'/><img class='bit tr' src='/wp-content/themes/va2020/assets/img/tr.svg'/><img class='bit bl' src='/wp-content/themes/va2020/assets/img/bl.svg'/><img class='bit br' src='/wp-content/themes/va2020/assets/img/br.svg'/><img class='bit arrow' src='/wp-content/themes/va2020/assets/img/arrow.svg'/></div><div class='arrow-icon-mobile'><img src='/wp-content/themes/va2020/assets/img/outline-min.svg'/></div></button>";
}

/***************************************************************
  *
  CHANGE AJAX SPINNER
  *
***************************************************************/

add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}

add_action( 'wp_ajax_nopriv_load_gravity_form', 'load_gravity_form' );
add_action( 'wp_ajax_load_gravity_form', 'load_gravity_form' );

function load_gravity_form() {
  $gfId = intval($_GET['formid']);
  $gfTitle = filter_var($_GET['formtitle'], FILTER_VALIDATE_BOOLEAN);
  $gfDesc = filter_var($_GET['formdescr'], FILTER_VALIDATE_BOOLEAN);
  $gfAjax = filter_var($_GET['formajax'], FILTER_VALIDATE_BOOLEAN);
  gravity_form($gfId, $gfTitle, $gfDesc, false, '', $gfAjax, 1);
  die();
}

?>
