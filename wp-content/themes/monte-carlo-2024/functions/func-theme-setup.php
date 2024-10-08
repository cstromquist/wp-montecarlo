<?php

/***************************************************************
  *
  THEME SETUP
  *
***************************************************************/

function tb_setup() {
  
  load_theme_textdomain( 'c5', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 640;
  
  register_nav_menus(
    array( 'main-menu' => __( 'Main Menu', 'c5' ) )
  );
  
  add_action( 'init', 'tb_theme_buttons' );
  
}
add_action( 'after_setup_theme', 'tb_setup' );

//add_filter('wp_img_tag_add_decoding_attr', '__return_false');

//add_filter( 'rank_math/frontend/canonical', function( $canonical ) { $current_url="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; if(false === strpos($current_url, '/page/') || is_single()) return $canonical; $canonical = strtok($current_url, '?'); return $canonical; });

add_filter( 'rank_math/frontend/disable_adjacent_rel_links', '__return_true' );

add_filter( 'rank_math/metabox/priority', function( $priority ) {
  return 'low';
});

/********* TinyMCE Buttons ***********/
if ( ! function_exists( 'tb_theme_buttons' ) ) {
    function tb_theme_buttons() {
        if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
            return;
        }

        if ( get_user_option( 'rich_editing' ) !== 'true' ) {
            return;
        }

        add_filter( 'mce_external_plugins', 'tb_theme_add_buttons' );
        add_filter( 'mce_buttons', 'tb_theme_register_buttons' );
    }
}

if ( ! function_exists( 'tb_theme_add_buttons' ) ) {
    function tb_theme_add_buttons( $plugin_array ) {
        $plugin_array['c5ctabutton'] = get_template_directory_uri().'/assets/admin/tinymce_buttons.js';
        return $plugin_array;
    }
}

if ( ! function_exists( 'tb_theme_register_buttons' ) ) {
    function tb_theme_register_buttons( $buttons ) {
        array_push( $buttons, 'c5ctabutton' );
        return $buttons;
    }
}

add_action ( 'after_wp_tiny_mce', 'tb_theme_tinymce_extra_vars' );

if ( !function_exists( 'tb_theme_tinymce_extra_vars' ) ) {
  function tb_theme_tinymce_extra_vars() { ?>
  <script type="text/javascript">
    var tinyMCE_object = <?php echo json_encode(
    array(
    'button_name' => esc_html__('Add stylized button/link', 'tb_starter'),
    'button_title' => esc_html__('Select CTA style and URL', 'tb_starter'),
    'link_text' => esc_html__('Link text', 'tb_starter'),
    'link_url' => esc_html__('Link URL', 'tb_starter'),
    'link_target' => esc_html__('Open link in a new tab?', 'tb_starter'),
    'button_alignment' => esc_html__('Select button alignment', 'tb_starter'),
    'button_style' => esc_html__('Select button style', 'tb_starter'),
    )
    );
  ?>;
  </script><?php
  }
}

// Add support for responsive embedded content.
add_theme_support( 'responsive-embeds' );

add_theme_support('align-wide');

/***************************************************************
  *
  REMOVE GUTENBERG BLOCK PATTERNS
  *
***************************************************************/

// remove_theme_support( 'core-block-patterns' );

function tb_setup_block_patterns() {
  
  unregister_block_pattern_category( 'featured' );
  unregister_block_pattern_category( 'posts' );
  unregister_block_pattern_category( 'text' );
  unregister_block_pattern_category( 'gallery' );
  unregister_block_pattern_category( 'banner' );
  unregister_block_pattern_category( 'header' );
  unregister_block_pattern_category( 'footer' );
  unregister_block_pattern_category( 'testimonials' );
  unregister_block_pattern_category( 'call-to-action' );
  
  register_block_pattern_category(
    'hasa-casa',
    array( 'label' => __( 'Hasa Casa' ) )
  );
  
  // Landing page pattern
  include( locate_template( 'functions/patterns/landing-page.php', false, false ) );
  // Products post pattern
  include( locate_template( 'functions/patterns/product.php', false, false ) );
  // Verticals post pattern
  include( locate_template( 'functions/patterns/vertical.php', false, false ) );
  // Uses Case post pattern
  include( locate_template( 'functions/patterns/use-case.php', false, false ) );
  
}

add_action( 'init', 'tb_setup_block_patterns' );


/***************************************************************
  *
  CHECK IF YOU ARE ON A NEW PAGE OR EDIT PAGE
  * @author Ohad Raz <admin@bainternet.info>
  * @param  string  $new_edit what page to check for accepts new - new post page ,edit - edit post page, null for either
  * @return boolean
  *
***************************************************************/

function is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;

    if($new_edit == "edit")
      return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
      return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
      return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}

/**
 * Change default greeting
 */
function tb_wp_greeting( $wp_admin_bar ) {
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$profile_url = get_edit_profile_url( $user_id );

	if ( 0 !== $user_id ) {
		$avatar = get_avatar( $user_id, 28 );
		$howdy = sprintf( __( 'Hi, %1$s' ), $current_user->display_name );
		$class = empty( $avatar ) ? '' : 'with-avatar';

		$wp_admin_bar->add_menu(array(
			'id' => 'my-account',
			'parent' => 'top-secondary',
			'title' => $howdy . $avatar,
			'href' => $profile_url,
			'meta' => array(
				'class' => $class,
			),
		));
	}
}
add_action( 'admin_bar_menu', 'tb_wp_greeting', 11 );

/***************************************************************
  *
  ADD CLASS TO BODY TAG USING PAGE SLUG
  *
***************************************************************/

function add_slug_body_class( $classes ) {

  global $post;

  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

  if($is_lynx) $classes[] = 'lynx';
  elseif($is_gecko) $classes[] = 'gecko';
  elseif($is_opera) $classes[] = 'opera';
  elseif($is_NS4) $classes[] = 'ns4';
  elseif($is_safari) $classes[] = 'safari';
  elseif($is_chrome) $classes[] = 'chrome';

  elseif($is_IE) {
    $classes[] = 'ie';
    if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
    $classes[] = 'ie'.$browser_version[1];
  } else $classes[] = 'unknown';

  if($is_iphone) $classes[] = 'iphone';
  if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
    $classes[] = 'osx';
  } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
    $classes[] = 'windows';
  }
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
  
  if ( is_front_page() ) {
    unset($classes[array_search('page-template-default', $classes)]);
  }

  return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/***************************************************************
  *
  ALLOW PAGE SLUGS TO MATCH A CUSTOM POST TYPE SLUG
  ALLOWS PAGINATION FOR POST TYPE WITHOUT BREAKING PAGE SLUG
  *
***************************************************************/

add_action('init', 'custom_rewrite_basic');
function custom_rewrite_basic() {
    global $wp_post_types;
    foreach ($wp_post_types as $wp_post_type) {
        if ($wp_post_type->_builtin) continue;
        if (!$wp_post_type->has_archive && isset($wp_post_type->rewrite) && isset($wp_post_type->rewrite['with_front']) && !$wp_post_type->rewrite['with_front']) {
            $slug = (isset($wp_post_type->rewrite['slug']) ? $wp_post_type->rewrite['slug'] : $wp_post_type->name);
            $page = get_page_by_slug($slug);
            if ($page) add_rewrite_rule('^' .$slug .'/page/([0-9]+)/?', 'index.php?page_id=' .$page->ID .'&paged=$matches[1]', 'top');
        }
    }
}

function get_page_by_slug($page_slug, $output = OBJECT, $post_type = 'page' ) {
    global $wpdb;

    $page = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s AND post_status = 'publish'", $page_slug, $post_type ) );

    return ($page ? get_post($page, $output) : NULL);
}

/***************************************************************
  *
  STRIP SHORTCODES
  *
***************************************************************/

function remove_shortcode_from_index( $content ) {
  if ( is_home() ) {
    $content = strip_shortcodes( $content );
  }
  return $content;
}
add_filter( 'the_content', 'remove_shortcode_from_index' );

/***************************************************************
  *
  EMAIL ENCODE SHORTCODE
  *
***************************************************************/

function tb_hide_email_shortcode( $atts , $content = null ) {
	if ( ! is_email( $content ) ) {
		return;
	}

	$content = antispambot( $content );

	$email_link = sprintf( 'mailto:%s', $content );

	return sprintf( '<a class="mail-to-link" href="%s">%s</a>', esc_url( $email_link, array( 'mailto' ) ), esc_html( $content ) );
}
// Can use as follows: [email]you@you.com[/email]
add_shortcode( 'email', 'tb_hide_email_shortcode' );

/***************************************************************
  *
  SOCIAL SHARE LINKS
  *
***************************************************************/

function tb_share_buttons() {
    $home = urlencode(get_site_url());
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

    include( locate_template('template-parts/social-share.php', false, false) );
}

/***************************************************************
  *
  CUSTOM CSS BLOCK
  *
***************************************************************/

function inject_custom_css_block() {
    $value = get_post_meta( get_the_ID(), 'custom_css_meta_block_field', true );

    if ( $value && is_singular( 'post' ) ) {
      echo '<style type="text/css">'.  "\n";
      echo esc_html( $value );
      echo "\n" . '</style>';
    }

}
add_action('wp_head', 'inject_custom_css_block');

/***************************************************************
  *
  STRIP STRING FOR ID NAME
  *
***************************************************************/

function cleanString($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}

/***************************************************************
  *
  HEX to RGBA
  *
***************************************************************/

function hex2rgb($hex) {

  $hex = str_replace("#", "", $hex);

  if(strlen($hex) == 3) {
    $r = hexdec(substr($hex,0,1).substr($hex,0,1));
    $g = hexdec(substr($hex,1,1).substr($hex,1,1));
    $b = hexdec(substr($hex,2,1).substr($hex,2,1));
  } else {
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));
  }

  $rgb = array($r, $g, $b);

  return $rgb; // returns an array with the rgb values

}

/*******************************************************************
  *
  RESOURCE CAT LIST
  @param $separator: Choose the delimiter between Terms 
  @param $type: Choose to return Term name (name) or Term ID (id)
  *
*******************************************************************/

function tax_list_nolinks($separator, $type = 'name') {

  $first_time = 1;
  $return = '';
  $postType = get_post_type( get_the_ID() );
  
  if ($postType == 'integration') {
    $terms = get_the_terms( get_the_ID(), 'integration-type' );
  } elseif ($postType == 'webinars') {
    $terms = get_the_terms( get_the_ID(), 'webinar-type' );
  }
  

  foreach($terms as $term) {
    
    if ($term->name != 'Featured') {
      if ($type == 'name') {
        
        if ($first_time == 1) {
          $return .= '<span>'  . $term->name.'</span>';
          $first_time = 0;
        } else {
          $return .= $separator . '<span>' . $term->name.'</span>';
        }
        
      } elseif ($type == 'id') {
        
        if ($first_time == 1) {
          $return .= $term->term_id;
          $first_time = 0;
        } else {
          $return .= $separator . ' ' . $term->term_id;
        }
        
      }
    }
    
  }

  return $return;

}

/***************************************************************
  *
  CREATE CATEGORY LIST
  *
***************************************************************/

function cat_list_nolinks($separator) {

  $first_time = 1;
  $return = '';

  foreach((get_the_category()) as $category) {

  	if ($category->term_id != 1 && $category->term_id != 3) {

  	  if ($first_time == 1) {
    		$return .= '<span>'  . $category->name.'</span>';
    		$first_time = 0;
  	  } else {
    		$return .= $separator . '<span>' . $category->name.'</span>';
  	  }

  	}

  }

  return $return;

}

function get_post_cat_id($separator) {

  $first_time = 1;
  $return = '';

  foreach((get_the_category()) as $category) {

  	if ($category->term_id != 1 && $category->term_id != 3) {

  	  if ($first_time == 1) {
    		$return .=  $category->term_id;
    		$first_time = 0;
  	  } else {
    		$return .=  $separator . $category->term_id;
  	  }

  	}

  }

  return $return;

}

/***************************************************************
  *
  GET ALT TEXT FOR IMAGES
  *
***************************************************************/

function tb_get_attachment_alt( $attachment_ID ) {

	// Get ALT
	$thumb_alt = get_post_meta( $attachment_ID, '_wp_attachment_image_alt', true );
	
	// No ALT supplied get attachment info
	if ( empty( $thumb_alt ) )
		$attachment = get_post( $attachment_ID );
	
	// Use caption if no ALT supplied
	if ( empty( $thumb_alt ) )
		$thumb_alt = $attachment->post_excerpt;
	
	// Use title if no caption supplied either
	if ( empty( $thumb_alt ) )
		$thumb_alt = $attachment->post_title;

	// Return ALT
	return esc_attr( trim( strip_tags( $thumb_alt ) ) );

}

function get_acf_image_alt($imagefield, $postID){

  $imageID = get_field($imagefield, $postID); 
  $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true); 
  return $alt_text;

}

/***************************************************************
  *
  REMOVE AUTHOR FROM SHARE CARD
  *
***************************************************************/

add_filter( 'oembed_response_data', 'disable_embeds_filter_oembed_response_data_' );
function disable_embeds_filter_oembed_response_data_( $data ) {
  unset($data['author_url']);
  unset($data['author_name']);
  return $data;
}
  

/***************************************************************
  *
  ONLY SHOW CERTAIN GUTNEBERG BLOCKS
  *
***************************************************************/

//function tb_plugin_allowed_block_types( $allowed_block_types, $post ) {

//    return array(
//      'core/paragraph',
//      'core/image',
//      'core/heading',
//      'core/gallery',
//      'core/list',
//      'core/quote',
//      'core/file',
//      'core/table',
//      'core/code',
//      'core/freeform',
//      'core/html',
//      'core/preformatted',
//      //'core/pullquote',
//      'core/text-columns',
//      'core/media-text',
//      'core/separator',
//      'core/spacer',
//      'core/shortcode',
//      'core/separator',
//      'core/embed',
//      'core-embed/youtube',
//      'core-embed/vimeo',
//      'acf/va-cta',
//      'acf/wistia-block',
//      'acf/va-accordion',
//    );

//}

//add_filter( 'allowed_block_types_all', 'tb_plugin_allowed_block_types', 10, 2 );


/***************************************************************
  *
  SIMPLE FUNCTION TO CHECK IF IS A BOT BY COMPARING VISITORS HTTP HEADERS
  *
***************************************************************/

function is_a_bot()
{

  $is_bot = false;

  $user_agents = array('GTmetrix', 'Googlebot', 'Bingbot', 'BingPreview', 'msnbot', 'slurp', 'Ask Jeeves/Teoma', 'Baidu', 'DuckDuckBot', 'AOLBuild', 'Chrome-Lighthouse', 'Google PageSpeed Insights', 'Google Page Speed Insights');

  $user_agent = $_SERVER['HTTP_USER_AGENT'];

  foreach ($user_agents as $agent) {
    if (strpos($user_agent, $agent)) {
      $is_bot = true;
    }
  }

  return $is_bot;
}
?>
