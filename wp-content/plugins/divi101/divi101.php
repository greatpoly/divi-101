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


// ----------------------------------------------------------------------------

// Calling menu function to add in admin menu
add_action( 'admin_menu', 'divi101_top_menu' );

// Menu function
function divi101_top_menu() {

	//Top level menu
	add_menu_page(
		'Divi 101',
		'Divi 101',
		'manage_options',
		'divi101',
		'divi101_tabs_and_fields',
		'dashicons-tickets'
	);
	// ------------------------------------------------------------------------
	// Sub level menus
	// Welcome submenu
	add_submenu_page(
		'divi101',
		'Welcome', // doesn't matter cause page title given by callback function
		'Welcome',
		'manage_options',
		'divi101', // same as the main menu (cause main menu and welcome submenu is the same page
        'divi101_tabs_and_fields'
	);
	// Registration submenu
	add_submenu_page(
		'divi101',
		'Registration',
		'Registration',
		'manage_options',
		'divi101_registration',
		'divi101_tabs_and_fields'
	);
	// Search submenu
	add_submenu_page(
		'divi101',
		'Search',
		'Search',
		'manage_options',
		'divi101_search',
		'divi101_tabs_and_fields'
	);
	// Recent submenu
	add_submenu_page(
		'divi101',
		'Recent',
		'Recent',
		'manage_options',
		'divi101_recent',
		'divi101_tabs_and_fields'
	);
	// Settings submenu
	add_submenu_page(
		'divi101',
		'Settings',
		'Settings',
		'manage_options',
		'divi101_settings',
		'divi101_tabs_and_fields'
	);
}

// End of menu function

// All tabs (sections) and there fields containing function
// They only get registered
// Later needs to call inside menu callback function 'divi101_menu_callback_function'
add_action( 'admin_init', 'divi101_option_tabs' );
function divi101_option_tabs() {

	/* Welcome Options Section (tab) */
	add_settings_section(
		'divi101_welcome_section',
		'', // Already title given by callback function
		'divi101_welcome_callback_function',
		'divi101_welcome_settings_page' // A custom settings page for welcome section
	);

	// No need to add fields in welcome section, only paragraphs there

	/* Registration Options Section (tab) */
	add_settings_section(
		'divi101_registration_section',
		'Essentials Header Options',
		'divi01_registration_callback_function',
		'divi101_registration_settings_page'// A custom settings page for registration section
	);

	/* Registration section fields */
	add_settings_field(
		'divi101_registration_section_field',
		'Registration field',
		'divi101_registration_field_function',
		'divi101_registration_settings_page', // Need to be same as it's section's page
		'divi101_registration_section',
		array(
			'header_type'
		)
	);

	/* Search Options Section (tab) */
	add_settings_section(
		'divi101_search_section',
		'Divi 101 search section',
		'divi101_search_callback_function',
		'divi101_search_settings_page' // A custom settings page for search section
	);

	/* Search section fields */
	add_settings_field(
		'divi101_search_section_field',
		'Search field',
		'divi101_search_field_function',
		'divi101_search_settings_page', // Need to be same as it's section's page
		'divi101_search_section',
		array(
			'header_type'
		)
	);

	//Recent options section
	add_settings_section(
		'divi101_recent_section',
		'Divi 101 recent section',
		'divi101_recent_callback_function',
		'divi101_recent_settings_page'
	);

	//Recent section fields
	add_settings_field(
		'divi101_recent_section_field',
		'Recent Field',
		'divi101_recent_field_function',
		'divi101_recent_settings_page',
		'divi101_recent_section'
	);


	register_setting( 'divi101_welcome_settings_page', 'divi101_welcome_settings_page' );
	register_setting( 'divi101_registration_settings_page', 'divi101_registration_settings_page' );
	register_setting( 'divi101_search_settings_page', 'divi101_registration_settings_page' );
	register_setting( 'divi101_recent_settings_page', 'divi101_recent_settings_page' );

}

add_action( 'admin_head', 'divi_custom_menu_icon' );
function divi_custom_menu_icon() {
	echo '
    <style>
    .dashicons-tickets {
        background: url("' . plugins_url( 'admin/images/divi_101_icon.png', __FILE__ ) . '") no-repeat center;

    }
    .menu-top:hover .dashicons-tickets {
        background: url("' . plugins_url( 'admin/images/divi_101_icon_b.png', __FILE__ ) . '") no-repeat center;

    }
    .dashicons-tickets:before {
        content: none;
    }
    .current .dashicons-tickets {
        background: url("' . plugins_url( 'admin/images/divi_101_icon_w.png', __FILE__ ) . '") no-repeat center;

    }
    .current:hover .dashicons-tickets {
        background: url("' . plugins_url( 'admin/images/divi_101_icon_w.png', __FILE__ ) . '") no-repeat center;

    }
    </style>
';
}

/* Call Backs
-----------------------------------------------------------------*/
function divi101_welcome_callback_function() {
	?>
    <div class="one_by_three_col">
        <h1>Welcome to Divi 101</h1>
        <p>Divi is a powerful but large platform, which needs lots of time to learn. This plugin allows you to view
            quality tutorials made by us within wp admin about divi. Which saves time and makes it easy to build website
            using divi.</p>
    </div>


    <div class="one_by_three_col">
        <h1>Documentation</h1>
        <p>For documentation please visite: <a href="http://divi101.com/documentation">divi101.com/documentation</a></p>
    </div>

    <div class="one_by_three_col">
        <h1>Support</h1>

        <p>For support, please visit: <a href="http://divi101.com/support">divi101.com/support</a></p>
        <p>How to use this plugin? Visit <a href="http://divi101.com/get-started">divi101.com/get-started</a></p>
    </div>
	<?php
}

function divi01_registration_callback_function() {
	echo '<p>Header Display Options:</p>';
}

function divi101_registration_field_function( $args ) {

	$options = get_option( 'divi101_registration_settings_page' );

	echo '<input type="text" id="' . $args[0] . '" name="divi101_registration_settings_page[' . $args[0] . ']" value="' . $options[ '' . $args[0] . '' ] . '"></input>';

}

function divi101_search_callback_function() {
	// todo make search callback function
}

function divi101_search_field_function() {
	// todo make search field function
}

/* Display Page
-----------------------------------------------------------------*/

// Function that displays divi 101 tabs
function divi101_tabs_and_fields() {

    // check if user is allowed access
    if ( ! current_user_can( 'manage_options' ) ) {
    return;
    }
    ?>
    <div class="wrap">
	<?php $active_tab = isset( $_GET['page'] ) ? $_GET['page'] : 'divi101'; ?>

    <div id="icon-themes" class="icon32"></div>
    <h1>Divi 101</h1>
    <p>View quality divi tutorials within wordpress admin</p>
	<?php settings_errors(); ?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=divi101"
           class="nav-tab <?php echo $active_tab == 'divi101' ? 'nav-tab-active' : ''; ?>">Welcome</a>
        <a href="?page=divi101_registration"
           class="nav-tab <?php echo $active_tab == 'divi101_registration' ? 'nav-tab-active' : ''; ?>">Registration</a>
        <a href="?page=divi101_search"
           class="nav-tab <?php echo $active_tab == 'divi101_search' ? 'nav-tab-active' : ''; ?>">Search</a>
        <a href="?page=divi101_recent"
           class="nav-tab <?php echo $active_tab == 'divi101_recent' ? 'nav-tab-active' : ''; ?>">Recent</a>
        <a href="?page=divi101_settings"
           class="nav-tab <?php echo $active_tab == 'divi101_settings' ? 'nav-tab-active' : ''; ?>">Settings</a>
    </h2>
    <form method="post" action="options.php">

		<?php
		if ( $active_tab == 'divi101' ) {
			//To display the hidden fields and handle security
			settings_fields( 'divi101_welcome_settings_page' );

			//To display the sections assigned to the page
			do_settings_sections( 'divi101_welcome_settings_page' );

		} else if ( $active_tab == 'divi101_registration' ) {
			//To display the hidden fields and handle security
			settings_fields( 'divi101_registration_settings_page' );


			//To display the sections assigned to the page
			do_settings_sections( 'divi101_registration_settings_page' );

		} else if ( $active_tab == 'divi101_search' ) {
			//todo add fields for search tab

		} else if ( $active_tab == 'divi101_recent' ) {
			//todo add fields for recent tab

		} else if ( $active_tab == 'divi101_settings' ) {
			//todo

		}
		?>

		<?php if ( ! ( $active_tab == 'welcome' ) ) {
			submit_button();
		}
		?>
    </form>
    </div>
	<?php
}

function divi101_load_styles() {
	wp_register_style( 'divi101_styles', plugin_dir_url( __FILE__ ) . 'admin/css/divi101_style.css', false, '1.0.0' );
	wp_enqueue_style( 'divi101_styles' );
}

add_action( 'admin_enqueue_scripts', 'divi101_load_styles' );






