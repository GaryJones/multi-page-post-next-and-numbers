<?php
/**
 * Multi-Page Post Next and Numbers
 *
 * @package   MultiPagePostNextAndNumbers
 * @author    Gary Jones <gary@garyjones.co.uk>
 * @license   GPL-2.0+
 * @link      https://github.com/GaryJones/multi-page-post-next-and-numbers
 * @copyright 2013 Gary Jones, Gamajo Tech
 *
 * @wordpress-plugin
 * Plugin Name:       Multi-Page Post Next and Numbers
 * Plugin URI:        https://github.com/GaryJones/multi-page-post-next-and-numbers
 * Description:       Display both Previous & Next links and numbers for multi-page posts.
 * Version:           1.1.0
 * Author:            Gary Jones
 * Author URI:        http://gamajo.com/
 * Text Domain:       multi-page-post-next-and-numbers
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /lang
 * GitHub Plugin URI: https://github.com/GaryJones/multi-page-post-next-and-numbers
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter( 'wp_link_pages', 'multi_page_post_next_and_numbers', 10, 2 );
/**
 * Filter wp_link_pages() so that it shows both Previous & Next links, as well as numbered pagination.
 *
 * @since 1.0.0
 *
 * @param  string $output Existing markup.
 * @param  array $args    Original arguments (not merged with defaults)
 *
 * @return string         Amended markup.
 */
function multi_page_post_next_and_numbers( $output, $args ) {
	global $page, $numpages, $multipage, $more;

	// If not a multipage post, return early.
	if ( ! $multipage )
		return $output;

	// Start fresh as we're re-building everything
	$output = '';

	// Re-do the args, since it looks like a bug in wp_link_pages() where only the original args are parsed in.
	$defaults = array(
		'before'           => '<p>' . __( 'Pages:' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next Page' ),
		'previouspagelink' => __( 'Previous Page' ),
		'pagelink'         => '%',
		'echo'             => 1
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	// Check and optionally do Previous link
	$i = $page - 1;
	if ( $i ) {
		$link = _wp_link_page( $i ) . $link_before . $previouspagelink . $link_after . '</a>';
		$link = apply_filters( 'wp_link_pages_link', $link, $i );
		$output .= $separator . $link;
	}

	// Do numbers
	for ( $i = 1; $i <= $numpages; $i++ ) {
		$link = $link_before . str_replace( '%', $i, $pagelink ) . $link_after;
		if ( $i != $page || ! $more && 1 == $page )
			$link = _wp_link_page( $i ) . $link . '</a>';
		$link = apply_filters( 'wp_link_pages_link', $link, $i );
		$output .= $separator . $link;
	}

	// Check and optionally do Next link
	$i = $page + 1;
	if ( $i <= $numpages ) {
		$link = _wp_link_page( $i ) . $link_before . $nextpagelink . $link_after . '</a>';
		$link = apply_filters( 'wp_link_pages_link', $link, $i );
		$output .= $separator . $link;
	}

	return $before. $output . $after;
}
