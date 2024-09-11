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
define( 'AUTH_KEY',         '~<Q79kM-m]dWq&BH3M?XPfXrCWi[,iy3.PHlJ<?K/CAX}T%psQ=NgaYvF_r({igi' );
define( 'SECURE_AUTH_KEY',  'L+.:8K.2^A;W5hoMV-hB!KRXtF:_uDl%m^3;Rq7<_^#KN-}<k*@LQu}I72|d~.>d' );
define( 'LOGGED_IN_KEY',    'hEEF_~$[|?k}fe3gcC:d|2~/o~__G}k<u@+MzYR)@bF`AqZ+4^,m^ZH}X/6y(yqZ' );
define( 'NONCE_KEY',        'Ub84x+)>/Nysu *N0*BqO;ZXG,teTt0zw{h91Ezyn@T&765(AA;,.gPu]T1@tot+' );
define( 'AUTH_SALT',        '5:VA}v6:|&5z{Zl,$_XI/fHV1{h|>Z-<vUEBUZy3q1*9lXG^]w~ITtGgRmtZ8%Q4' );
define( 'SECURE_AUTH_SALT', '. HN9Yl/:C H7osq0g`N]`yh+@7:Ql*Umq!z>WP/)cEF(L%xh1*7Z>-ybegwqBJv' );
define( 'LOGGED_IN_SALT',   '-y#2kvk3w?r?CjHTw3_]FJ|}^bv9FRG|>^-l/Ro47k;D. QMXS+DN(_&+$,vY;Jr' );
define( 'NONCE_SALT',       '=$o>NI uJy;r=.~,MRl)gUzO!Y_+Ndq`t+q:=}XaS4*UsXspcd0gZ24S-pRl$Z}6' );

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
