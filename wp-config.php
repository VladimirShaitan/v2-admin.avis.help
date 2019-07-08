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
// define('FS_METHOD','direct');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rxhdrqftax');

/** MySQL database username */
define('DB_USER', 'rxhdrqftax');

/** MySQL database password */
define('DB_PASSWORD', 'WWqsSupD7Q');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FORCE_SSL_ADMIN', false);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'AY116tP> Um!mBz5:Sp(U5WP#WOT3.OZ-@*6;_b#{X1iNU|Iqq{Q7Sepmu}(Bg`/');
define('SECURE_AUTH_KEY',  '92U`s%@]u@o.wv%,C1YIFZm(:X}-P#k?wgNLXQZWD1YyvX9{Q@FlHQ<ODp9jgA3e');
define('LOGGED_IN_KEY',    'Q~7b44.ZS*vpS[$Xkp;_$>sv}v@_)+SjiWa2C#.m~D8ym<zE|n=V5@U7Q*#=oB I');
define('NONCE_KEY',        'f[QmZlf8(]rfcVk&~]v9KH41%LdOUu7c;-Jl<4qy]5~R!S=#kBTpXsu_:Td(]p-)');
define('AUTH_SALT',        'vaeHMO_.q#uY44Dnhw$UhW`rf:$>*`P$}/Xz1b5Iu,K_ptT0iSrD.~j[D FmlR.5');
define('SECURE_AUTH_SALT', 'A[AUX`c9TOyp*1R)09+PXdo*frFN?yC `lM2ez/M|k(saB?KdUQt3QvI2KL8(/0!');
define('LOGGED_IN_SALT',   'pyi(ODe:pP@A`:d3a`%9VE|q3Ace@aV=IAm+d{1(XA Us=Ev%R4h>V^4TvQgt+i5');
define('NONCE_SALT',       'YDs1BWQ%V7=7B*wkvByeHm8e.c*me^RX{ed~!a.F_JA:(*.6R($we,69PC&~HRP7');

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
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_DEBUG_LOG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
