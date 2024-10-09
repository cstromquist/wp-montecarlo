<?php
/**
 * Plugin Name:       MC Hero
 * Description:       Monte Carlo Hero
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Text Domain:       mc-hero
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

function create_block_mc_hero_block_init() {
	register_block_type( __DIR__ . '/mc-hero' );
}
add_action( 'init', 'create_block_mc_hero_block_init' );

add_filter( 'block_categories_all', 'monte_carlo_block_category', 10, 2);
function monte_carlo_block_category( $categories, $post ) {

	array_unshift( $categories, array(
		'slug'	=> 'monte-carlo',
		'title' => 'Monte Carlo'
	) );
	return $categories;
}
