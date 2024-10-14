<?php

/***************************************************************
  *
  ACF BLOCKS
  *
***************************************************************/

function always_load() {
  return true;
}

add_filter( 'ACFFA_always_enqueue_fa', 'always_load', 10, 1 );

add_action( 'init', 'register_acf_blocks' );

function register_acf_blocks() {
	register_block_type( __DIR__ . '/../template-parts/blocks/mc-hero/block.json' );
	register_block_type( __DIR__ . '/../template-parts/blocks/mc-logos/block.json' );
	register_block_type( __DIR__ . '/../template-parts/blocks/mc-carousel/block.json' );
	register_block_type( __DIR__ . '/../template-parts/blocks/mc-banner-cta/block.json' );
}

add_filter( 'block_categories_all', 'example_block_category', 10, 2);
function example_block_category( $categories, $post ) {
	
	array_unshift( $categories, array(
		'slug'	=> 'hasa-casa',
		'title' => 'Hasa Casa'
	) );

	array_unshift( $categories, array(
		'slug'	=> 'monte-carlo',
		'title' => 'Monte Carlo'
	) );
	return $categories;
}

// function block_styles() {
// 	wp_enqueue_style( 'block_styles', get_template_directory_uri() . '/template-parts/blocks/mc-logos/style.css', array() );
// }
// add_action( 'wp_enqueue_scripts', 'block_styles' );
/***************************************************************
  *
  SETUP TEMPLATE FOR PAGES THAT USES HERO BLOCK
  *
***************************************************************/

function tb_register_template() {
  
  $pages = get_post_type_object( 'page' );
  if( !is_front_page() ) {
    $pages->template = array(
      array( 'acf/hero' ),
    );
  }
    
}
add_action( 'init', 'tb_register_template' );


?>
