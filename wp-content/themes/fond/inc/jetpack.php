<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package fond
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function fond_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'fond_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function fond_jetpack_setup
add_action( 'after_setup_theme', 'fond_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function fond_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function fond_infinite_scroll_render
