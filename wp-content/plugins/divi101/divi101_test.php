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

add_action( 'admin_menu', 'divi101_add_top_level_menu' );
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
		'Welcome to Divi 101', // Page title
		'Divi 101', // Menu title
		'manage_options', // Capability
		'div101', // Menu slug
		'div101_body', // Function
		'dashicons-tickets', // Icon
		null // Position
	);
	add_submenu_page(
		'divi101', // Parent slug
		'Divi 101', // Page title
		'Welcome', // Menu title
		'manage_options', // Capability
		'divi101_welcome', // Menu slug
		'divi101_display_inner_pages' // Function
	);

	add_submenu_page(
		'divi101', // Parent slug
		'Divi 101 Registration', // Page title
		'Divi Registration', // Menu title
		'manage_options', // Capability
		'divi101_registration', // Menu slug
		'divi101_display_inner_pages' // Function
	);


}

function div101_body(){
    ?>
	<div class="wrap">
        <div id="icon-themes" class="icon32"></div>
        <h2>Essentials Theme Options</h2>
    </div>
    <?php
}
add_action ('admin_init', 'divi101_welcome');
function divi101_welcome() {
    // welcome tab
    add_settings_section (
            'divi101_welcome_section',
            'Welcome to Divi 101',
            'divi101_welcome_section_callback',
            'divi101_welcome_page'
    );
    add_settings_field(
            'welcome_message',
            'Welcome to Divi 101',
            'welcome_message_callback_function',
            'divi101_welcome_page',
            'divi101_welcome_section'
    );

    register_setting('divi101_welcome_page', 'divi101_welcome_page');
}

// Call backs
function divi101_welcome_section_callback() {
    echo '<p>Welcome</p>';
}

//add_action('admin_menu', 'my_menu_pages');
//function my_menu_pages() {
//	add_menu_page(
//		'My Page Title',
//		'My Menu Title',
//		'manage_options',
//		'my-menu',
//		'my_menu_output' );
//
//	add_submenu_page(
//		'my-menu',
//		'Submenu Page Title',
//		'Whatever You Want',
//		'manage_options',
//		'my-menu' );
//
//	add_submenu_page(
//		'my-menu',
//		'Submenu Page Title2',
//		'Whatever You Want2',
//		'manage_options',
//		'my-menu2' );
//}
//


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


// ----------------------------------------------------------------------------
add_action('admin_menu', 'ch_essentials_admin');
function ch_essentials_admin() {
	/* Base Menu */
	add_menu_page(
		'Essentials Theme',
		'Essentials Theme',
		'manage_options',
		'ch-essentials-options',
		'ch_essentials_index');
}


add_action('admin_init', 'ch_essentials_options');
function ch_essentials_options() {

	/* Front Page Options Section */
	add_settings_section(
		'ch_essentials_front_page',
		'Essential Front Page Options',
		'ch_essentials_front_page_callback',
		'ch_essentials_front_page_option'
	);

	add_settings_field(
		'featured_post',
		'Featured Post',
		'ch_essentials_featured_post_callback',
		'ch_essentials_front_page_option',
		'ch_essentials_front_page'
	);

	/* Header Options Section */
	add_settings_section(
		'ch_essentials_header',
		'Essentials Header Options',
		'ch_essentials_header_callback',
		'ch_essentials_header_option'
	);

	add_settings_field(
		'header_type',
		'Header Type',
		'ch_essentials_textbox_callback',
		'ch_essentials_header_option',
		'ch_essentials_header',
		array(
			'header_type'
		)
	);

	register_setting( 'ch_essentials_front_page_option', 'ch_essentials_front_page_option' );
	register_setting( 'ch_essentials_header_option', 'ch_essentials_header_option' );

}


/* Call Backs
-----------------------------------------------------------------*/
function ch_essentials_front_page_callback() {
	echo '<p>Front Page Display Options:</p>';
}
function ch_essentials_header_callback() {
	echo '<p>Header Display Options:</p>';
}
function ch_essentials_textbox_callback($args) {

	$options = get_option('ch_essentials_header_option');

	echo '<input type="text" id="'  . $args[0] . '" name="ch_essentials_header_option['  . $args[0] . ']" value="' . $options[''  . $args[0] . ''] . '"></input>';

}
function ch_essentials_featured_post_callback() {

	$options = get_option('ch_essentials_front_page_option');

	query_posts( $args );


	echo '<select id="featured_post" name="ch_essentials_front_page_option[featured_post]">';
	while ( have_posts() ) : the_post();

		$selected = selected($options[featured_post], get_the_id(), false);
		printf('<option value="%s" %s>%s</option>', get_the_id(), $selected, get_the_title());

	endwhile;
	echo '</select>';
}

/* Display Page
-----------------------------------------------------------------*/
function ch_essentials_index() {
	?>
    <div class="wrap">
        <div id="icon-themes" class="icon32"></div>
        <h2>Essentials Theme Options</h2>
		<?php settings_errors(); ?>

		<?php
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'front_page_options';
		?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=ch-essentials-options&tab=front_page_options" class="nav-tab <?php echo $active_tab == 'front_page_options' ? 'nav-tab-active' : ''; ?>">Front Page Options</a>
            <a href="?page=ch-essentials-options&tab=header_options" class="nav-tab <?php echo $active_tab == 'header_options' ? 'nav-tab-active' : ''; ?>">Header Options</a>
        </h2>


        <form method="post" action="options.php">

			<?php
			if( $active_tab == 'front_page_options' ) {
				settings_fields( 'ch_essentials_front_page_option' );
				do_settings_sections( 'ch_essentials_front_page_option' );
			} else if( $active_tab == 'header_options' ) {
				settings_fields( 'ch_essentials_header_option' );
				do_settings_sections( 'ch_essentials_header_option' );

			}
			?>
			<?php submit_button(); ?>
        </form>

    </div>
	<?php
}




