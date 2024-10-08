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
  register_block_type( get_template_directory_uri() . '/template-parts/blocks/hero/block.json' );
}

add_filter( 'block_categories_all', 'example_block_category', 10, 2);
function example_block_category( $categories, $post ) {
	
	array_unshift( $categories, array(
		'slug'	=> 'hasa-casa',
		'title' => 'Hasa Casa'
	) );

	return $categories;
}

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
