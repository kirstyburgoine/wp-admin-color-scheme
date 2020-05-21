<?php
/**
 * Plugin Name: KB Admin Color Schemes
 * Plugin URI:
 * Description: Test plugin enviroment. USed for experimenting with color schemes and build tools. Base plugin structure taken from admin color schemes plugin created by the WordPress Core Team: http://wordpress.org/plugins/admin-color-schemes/
 * Version: 0.1
 * Requires PHP: 5.3
 * Author: Kirsty Burgoine (& WordPress Core Team)
 * Author URI: http://wordpress.org/
 */

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/**
 * This plugin hasn't been developed for distriibution. You are welcome
 * to fork it and do with what you like, however, the purpose is for
 * experimental development and therefore, may regularly introduce breaking changes.
 */

namespace KB_Admin_Color_Schemes;
use function add_action;
use function wp_enqueue_script;
use function wp_admin_css_color;

function kb_colors_test_block_enqueue() {
	wp_enqueue_script(
		'kb-colors-test-block-script',
		plugins_url( '/build/index.js', __FILE__ ),
		array( 'wp-blocks', 'wp-element' )
	);
}

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\kb_colors_test_block_enqueue' );

/**
 * Helper function to get stylesheet URL.
 *
 * @param string $color The folder name for this color scheme.
 */
function get_color_url( $color ) {
	$suffix = is_rtl() ? '-rtl' : '';
	return plugins_url( "$color/colors$suffix.css?v=" . VERSION, __FILE__ );
}

/**
 * Register color schemes.
 */
function add_colors() {

	wp_admin_css_color(
		'meadow',
		__( 'Meadow', 'admin_schemes' ),
		get_color_url( 'meadow' ),
		array( '#1B676B', '#519548', '#88C425', '#BEF202', '#EAFDE6' ),
		array(
			'base' => '#333',
			'focus' => '#fff',
			'current' => '#fff',
		)
	);
}

add_action( 'admin_init', __NAMESPACE__ . '\add_colors' );
