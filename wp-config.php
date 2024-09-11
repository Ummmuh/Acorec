<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'exo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3#DMh|9Fc[IeU F;D|}H^>.J?C5/ii@2ETj`%&O9Zu,|=t_p;JMk99}<v-@mFz<c' );
define( 'SECURE_AUTH_KEY',  'df>y8(>1YK@nalTzn#(w~4}hnE4n~S ]sI3/sax<0;ZE1W<_%t,cK6,YnFl,VCYX' );
define( 'LOGGED_IN_KEY',    's$02PX=s:r7U49(.JO8U5I:Wy6Io/TKXa4$SPbR^/k?%g5 <I>[`-!75=o< jWJ%' );
define( 'NONCE_KEY',        'Ox]1Z>a>yfc`W>>0f_ucg2A*,<9`#B4=URjG8ShsNWhBf`]]rzhdt@gdi6rUpcnN' );
define( 'AUTH_SALT',        'T(*#A]SHTe:X4Q(|/a8shky<Z*Y#=FA*?G.3HsfEMQq#<s}G_}I^ [EAa3L%<5`!' );
define( 'SECURE_AUTH_SALT', 'fQF:iMo@j}N)LqNroy=mRMb~2%8^jO+w!qhVTDdl{!-DI+^ujyPbr8:?t{~rD7em' );
define( 'LOGGED_IN_SALT',   '1Jcvz(sO8+D&Z&Hls/nlg-?h,}`cKPRT`Ox9Do;w[~!m90HAS]% zP.qpJkjMLy7' );
define( 'NONCE_SALT',       '-k?^Scu5BAEo_7H:#Mn-ew t3N;en 8Zd;KM3s<s7w9+IZj!=~}XZk2k]7<w== c' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('FS_METHOD', 'direct');