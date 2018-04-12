<?php
/**
 * Plugin Name:         Divi 101
 * Plugin URI:          https://divi101.com
 * Description:         Divi 101 is a tutorial plugin, which allows to view tutorial within admin panel, saving a ton of time.
 * Author:              ShiftWeb Solutions
 * Author URI:          https://shiftwebsolutions.com/
 * Tags: ----------
 * Version:             1.0
 * Stable tag:          1.0
 * Requires at least:   4.5
 * Tested up to:        4.9
 * Text Domain:         divi101
 * Domain Path:         /languages
 * License:     ----------------
 * License URI: ----------------
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version
 * 2 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * with this program. If not, visit: https://www.gnu.org/licenses/
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Display the plugin settings page
function divi101_display_settings_page() {
	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>

    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
			<?php
			// output security fields
			settings_fields( 'divi101_options' );

			// output setting sections
			do_settings_sections( 'divi101' );

			// submit button
			submit_button();
			?>
        </form>
    </div>
	<?php
}

// add top-level administrative menu
function divi101_add_top_level_menu() {
	/*
		add_menu_page {
				string      $page_title,
				string      $menu_title,
				string      $capability,
				string      $menu_slug,
				callable    $function = '',
				string      $icon_url = '',
				int         $position = null
	*/
	add_menu_page(
		'Welcome to Divi 101',
		'Divi 101',
		'manage_options',
		'divi101_welcome',
		'divi101_display_settings_page',
		'dashicons-tickets',
		null
	);
	add_submenu_page(
		'divi101',
		'Divi Registration',
		'Divi Registration',
		'manage_options',
		'divi101_welcome',
		'divi101_display_inner_pages'
	);
}

add_action( 'admin_menu', 'divi101_add_top_level_menu' );

add_action( 'admin_head', 'my_custom_favicon' );
function my_custom_favicon() {
	echo '
    <style>
    .dashicons-tickets {
        background: url("' . plugins_url( '/images/divi_101_icon.png', __FILE__ ) . '") no-repeat center;
        
    }
    .menu-top:hover .dashicons-tickets {
        background: url("' . plugins_url( '/images/divi_101_icon_b.png', __FILE__ ) . '") no-repeat center;
        
    }
    .dashicons-tickets:before {
        content: none;
    }
    .current .dashicons-tickets {
        background: url("' . plugins_url( '/images/divi_101_icon_w.png', __FILE__ ) . '") no-repeat center;
        
    }
    .current:hover .dashicons-tickets {
        background: url("' . plugins_url( '/images/divi_101_icon_w.png', __FILE__ ) . '") no-repeat center;
        
    }
    </style>
';
}

function divi101_display_inner_pages() {
	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>

    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
			<?php
			// output security fields
			settings_fields( 'divi101_options' );

			// output setting sections
			do_settings_sections( 'divi101' );

			// submit button
			submit_button();
			?>
        </form>
    </div>
	<?php
}

//function divi101_add_sublevel_menu (){
//
//}

//add_action('admin_menu', 'divi101_add_sublevel_menu');




}
