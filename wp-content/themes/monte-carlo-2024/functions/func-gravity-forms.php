<?php

/***************************************************************
  *
  FORCE GRAVITY FORMS TO INIT SCRIPTS IN THE FOOTER AND ENSURE
  THAT THE DOM IS LOADED BEFORE SCRIPTS ARE EXECUTED
  *
***************************************************************/

//add_filter( 'gform_init_scripts_footer', '__return_true' );
//add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );

//function wrap_gform_cdata_open( $content = '' ) {

//  if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
//    return $content;
//  }
//    $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
//    return $content;
//  }

//  add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );

//  function wrap_gform_cdata_close( $content = '' ) {
//    if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
//    return $content;
//    }

//  $content = ' }, false );';

//  return $content;

//}

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
  ADD MERGE TAG MODIFIERS
  *
***************************************************************/

add_filter( 'gform_merge_tag_filter', function ( $value, $merge_tag, $modifier, $field, $raw_value, $format ) {
  if ( $merge_tag != 'all_fields' && $modifier == 'noapostrophy' ) {
    $value = str_replace('&#039;', '', $value);
  }

  return $value;
}, 10, 6 );

/***************************************************************
  *
  SWITCH INPUT TO BUTTON
  *
***************************************************************/

add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {

  //print_r($form);
  
  return "<button aria-label='Submit form' class='button gform_button' id='gform_submit_button_{$form['id']}'>{$form['button']['text']} <span class='submit-icon'></span></button>";

  // FOR USE IF YOU NEED CONDITIONAL BUTTONS DEPENDING ON FORM
  
  //if ( $form['id'] == 4 ) {

  //  return "<button aria-label='Submit form' class='button gform_button' id='gform_submit_button_{$form['id']}'><span class='submit-icon'></span></button>";

  //} else if ( $form['id'] == 5 ) {

  //  return "<button aria-label='Submit form' class='va-btn legal' id='gform_submit_button_{$form['id']}'>{$form['button']['text']}</button>";

  //} else {

  //  return "<button aria-label='Submit form' class='button gform_button' id='gform_submit_button_{$form['id']}'>{$form['button']['text']} <span class='submit-icon'></span></button>";

  //}

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
  gravity_form($gfId, $gfTitle, $gfDesc, false, '', $gfAjax);
  die();
}


/***************************************************************
  *
  CUSTOM FORM VALIDATION
  *
  ***************************************************************/

// add_filter( 'gform_field_validation', function ( $result, $value, $form, $field ) {
//  if ( !$result['is_valid'] && $field->get_input_type() === 'email' ) {
//    $result['is_valid'] = false;
//    $result['message']  = '';
//    return $result;
//  }
//  if ( $result['is_valid'] && $field->get_input_type() === 'email' ) {
//// && $form['id'] !== 4

//    $emailBlacklist = ['gmail.com','yahoo.com','hotmail.com','live.com','aol.com','outlook.com','rediffmail.com','yandex.com','mail.com','email.com','comcast.com'];
//    $domain = substr($value, strpos($value, "@") + 1);  

//    foreach ($emailBlacklist as &$blacklistedDomain) {

//      if ( $blacklistedDomain == $domain ) {
//        $result['is_valid'] = false;
//        $result['message']  = 'Sorry, no personal emails! &#128515;';
//        return $result;
//      }
//    }

//    //$result['is_valid'] = false;
//    //$result['message']  = 'Success!';
//  }
//  return $result;
//}, 10, 4 );

?>
