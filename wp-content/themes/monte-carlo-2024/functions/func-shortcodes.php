<?php

// Theme shortcodes

function styled_cta_shortcode($atts) { 
  
  $default = array(
    'text' => 'Learn more',
    'url' => '#',
    'target' => 'false',
    'buttonstyle' => 'btn btn-lg',
    'buttonalignment' => 'left'
  );
  
  $a = shortcode_atts($default, $atts);
  
  if ($a['target'] == 'true') {
    $a['target'] = '_blank';
  } else {
    $a['target'] = '_self';
  }
  
  return '<div class="button-wrap text-'.$a['buttonalignment'].'"><a href="'.$a['url'].'" target="'.$a['target'].'" class="'.$a['buttonstyle'].'">'.$a['text'].'</a></div>';

}
// register shortcode
add_shortcode('styled-button', 'styled_cta_shortcode');