<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '#Heuredegloire1@' );

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
define( 'AUTH_KEY',         'DtP:&i*OJ[ ~#bl,.WUmrk@Zc/mJ{/_pXr>l{5#J}w2./)]x`VSFok=B5!b1`wsb' );
define( 'SECURE_AUTH_KEY',  'X<[k`Xuf#zPvW*ij2`u}&Ezsne f>d|mcTx0S4<Ovc4R,5~b2R%#jGoI*5Q>]Nn#' );
define( 'LOGGED_IN_KEY',    'W<aW5.cvf?SB:l{4|c#g5r%c5St-llly+T~wZaU0!Mx-xZKJw^4`q6sq!PqI|+kp' );
define( 'NONCE_KEY',        '  _/K3I~z^$@D(!>*@z~&U8!pRfx21bX^z4 !Kfee:zwb rHYSv5irUJVF$Hq}]W' );
define( 'AUTH_SALT',        'KFp/8Emr-A/g0GN0e!7JW1=.ic,e/g R8Ka17y;f(Q^ &XPSw&qdRv.S?_EE$-*}' );
define( 'SECURE_AUTH_SALT', 'X32<BTnS AGwV1%_Tc-C?W#ez-Ax%E,6]$H$i-ii~eVf.9&=Y2%18!|gESdR$]vD' );
define( 'LOGGED_IN_SALT',   'S{]Di2j?eY@:=ET*6p)0b1?am~>m]Zxk^nPo^<*j-KwK{?UI{A#[21bkD#VD+MYp' );
define( 'NONCE_SALT',       '(*!OLMrbBhIt2.r@m2*%}YNt>k1[j4ovZWfO-/0CpDg#[D7mtl|J;y<!l >:<li%' );
define('JWT_AUTH_SECRET_KEY', '(*!OLMrbBhIt2.r@m2*%}YNt>k1[j4ovZWfO-/0CpDg#[D7mtl|J;y<!l >:<li%');
define('JWT_AUTH_CORS_ENABLE', true);
define('API_BEARER_JWT_SECRET', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjMwMDAiLCJpYXQiOjE2ODAwOTc2OTgsIm5iZiI6MTY4MDA5NzY5OCwiZXhwIjoxNjgwNzAyNDk4LCJkYXRhIjp7InVzZXIiOnsiaWQiOjEsImRldmljZSI6IiIsInBhc3MiOiJhOThjY2RjYTQ4ZmU5ZDkwNmUyMmRiM2M2NDk2N2E5YSJ9fX0.e9Fm2-Tc7nuy9STigBm_eFMv1xiYc_BdvNcjv_KMyV0');

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
