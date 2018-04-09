<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'plugd');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'o)0KdW8p72-x/>cx[&G-$Hd$K)J1@smVRTGo&N.q^b{>6bR<|JC-N~dv1M0&K5>o');
define('SECURE_AUTH_KEY',  '> UUzj(3Q;Wp{ULf+.t+cA(]r|9TAW ??fQQvj;4bqBf=hTC@?F,Hw([rM&<k-z]');
define('LOGGED_IN_KEY',    'wHpDxtAuvUbBM4W(a(;.e%TNyrEQls8LY48cp7j6Df=BRu|2ND}RMkzcx 9AMotF');
define('NONCE_KEY',        ' PiGU](kYM}31yO UNBIX O/Bt<3 y(Mlb>d_?ZmzJ[z_Qn!Du]oY{m#c}MNd-<y');
define('AUTH_SALT',        '`s{XrmSyGt~/szPnqLQBSDq8;=l[(_Q1Vr4gj-Y6p;E#[-pOOzp.&jwe}l?es1 K');
define('SECURE_AUTH_SALT', '8{W^J*kgR^VnQd8CoVC~[auj5hi{cUR{),P`^$d1;FAq`<^MKrk6t0MSlzGzLpwT');
define('LOGGED_IN_SALT',   'HoBVt=bjQ(t&AXg&{q<gu65f?QX).Jaj]MwX-E#Rv8m53WOc>~=pc1U*0{ZGF(i|');
define('NONCE_SALT',       '/tQs%TT$}n2&P8f]}f2RTYqP`_%N!,N)Na>jso6EiNl@!%UPUFad2qta/om+ bIL');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
