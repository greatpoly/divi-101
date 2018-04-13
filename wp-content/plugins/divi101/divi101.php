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



	add_action( 'admin_menu', 'divi101_top_menu' );
	function divi101_top_menu() {
		/* Base Menu */
		add_menu_page(
			'Divi 101',
			'Divi 101',
			'manage_options',
			'divi101',
			'divi101_menu_callback_function',
            'dashicons-tickets');
	}


	add_action( 'admin_init', 'divi101_option_tabs' );
	function divi101_option_tabs() {

		/* Welcome Options Section */
		add_settings_section(
			'divi101_welcome_section',
			'',
			'divi101_welcome_callback_function',
			'ch_essentials_front_page_option'
		);

//		add_settings_field(
//			'featured_post',
//			'Featured Post',
//			'ch_essentials_featured_post_callback',
//			'ch_essentials_front_page_option',
//			'divi101_welcome_section'
//		);

		/* Registration Options Section */
		add_settings_section(
			'divi101_registration_section',
			'Essentials Header Options',
			'ch_essentials_header_callback',
			'ch_essentials_header_option'
		);

		add_settings_field(
			'header_type',
			'Header Type',
			'ch_essentials_textbox_callback',
			'ch_essentials_header_option',
			'divi101_registration_section',
			array(
				'header_type'
			)
		);

		/* Search Options Section */
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
		<p>Divi is a powerful but large platform, which needs lots of time to learn. This plugin allows you to view quality tutorials made by us within wp admin about divi. Which saves time and makes it easy to build website using divi.</p>
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

	function ch_essentials_header_callback() {
		echo '<p>Header Display Options:</p>';
	}

	function ch_essentials_textbox_callback( $args ) {

		$options = get_option( 'ch_essentials_header_option' );

		echo '<input type="text" id="' . $args[0] . '" name="ch_essentials_header_option[' . $args[0] . ']" value="' . $options[ '' . $args[0] . '' ] . '"></input>';

	}

	function ch_essentials_featured_post_callback() {

		$options = get_option( 'ch_essentials_front_page_option' );

		query_posts( $args );


		echo '<select id="featured_post" name="ch_essentials_front_page_option[featured_post]">';
		while ( have_posts() ) : the_post();

			$selected = selected( $options[ featured_post ], get_the_id(), false );
			printf( '<option value="%s" %s>%s</option>', get_the_id(), $selected, get_the_title() );

		endwhile;
		echo '</select>';
	}

	/* Display Page
	-----------------------------------------------------------------*/
	function divi101_menu_callback_function() {
			// check if user is allowed access
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}
		?>
        <div class="wrap">
            <div id="icon-themes" class="icon32"></div>
            <h1>Divi 101</h1>
            <p>View quality divi tutorials within wordpress admin</p>
			<?php settings_errors(); ?>

			<?php
			$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'welcome';
			?>

            <h2 class="nav-tab-wrapper">
                <a href="?page=divi101&tab=welcome"
                   class="nav-tab <?php echo $active_tab == 'welcome' ? 'nav-tab-active' : ''; ?>">Welcome</a>
                <a href="?page=divi101&tab=registration"
                   class="nav-tab <?php echo $active_tab == 'registration' ? 'nav-tab-active' : ''; ?>">Registration</a>
                <a href="?page=divi101&tab=search"
                   class="nav-tab <?php echo $active_tab == 'search' ? 'nav-tab-active' : ''; ?>">Search</a>
                <a href="?page=divi101&tab=recent"
                   class="nav-tab <?php echo $active_tab == 'recent' ? 'nav-tab-active' : ''; ?>">Recent</a>
                <a href="?page=divi101&tab=settings"
                   class="nav-tab <?php echo $active_tab == 'settings' ? 'nav-tab-active' : ''; ?>">Settings</a>
            </h2>


            <form method="post" action="options.php">

				<?php
				if ( $active_tab == 'welcome' ) {
					settings_fields( 'ch_essentials_front_page_option' );
					do_settings_sections( 'ch_essentials_front_page_option' );
				} else if ( $active_tab == 'registration' ) {
					settings_fields( 'ch_essentials_header_option' );
					do_settings_sections( 'ch_essentials_header_option' );

				} else if ($active_tab == 'search') {
				    //todo add fileds for search tab
                } else if ($active_tab == 'recent') {
				    //todo add fileds for recent tab
                } else if ($active_tab == 'settings') {
				    // @todo:
                }
				?>

				<?php  if (!($active_tab == 'welcome')){
					submit_button();
                }
                 ?>
            </form>

        </div>
		<?php
	}

function divi101_load_styles() {
	wp_register_style( 'divi101_styles', plugin_dir_url(__FILE__) . 'admin/css/divi101_style.css', false, '1.0.0' );
	wp_enqueue_style( 'divi101_styles' );
}
add_action( 'admin_enqueue_scripts', 'divi101_load_styles' );






