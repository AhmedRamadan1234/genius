<?php
define('WP_CACHE', true); // Added by WP Rocket
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
* @link https://wordpress.org/support/article/editing-wp-config-php/
*
* @package WordPress
*/

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'DBSAMPLE' );

/** MySQL database username */
define( 'DB_USER', 'DBSAMPLE' );

/** MySQL database password */
define( 'DB_PASSWORD', 'DBSAMPLE' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY',         'L=K[$z|N>aQDa/3+$lz/yqO>g ZiJ,W|TTahjLjC3>&a-VH-P{#RI$dSG``#$l9|');
define('SECURE_AUTH_KEY',  'oV]{HX=liWB),l spAo[AxF<D|JR~];^>?OW2Q{K8&OrBTNUHz1Jf#_qpICt2st2');
define('LOGGED_IN_KEY',    'ngIK.a&U&!{k0%@,}v{k`3cbX(+XJ4vH?I@X?l@%K569OgZ]bT!:,sgiil9!kVjx');
define('NONCE_KEY',        ')~Qe_(eUzIat-m=p!!rpT@g3/&^~29FLbbS0{w_|`h*|LFVPg#@(m}U2Dl^^ymuH');
define('AUTH_SALT',        'Q95:2lwhWT&=*R?~IXU`CtV&}-V+rl.Y[w8@c:iR&D2-VzVYkG3Qn#K|%n9u;D=/');
define('SECURE_AUTH_SALT', 'i []};0-~?V;Zhc}e9K0I-E&P7S4acF>+lPJU[G>8zMc^;j}a*iR7RV!fXsD*m+y');
define('LOGGED_IN_SALT',   'c)FMqdK-*Oz.JAT|lPiA<%yD{-igQP4&^gak}z4z+WP5-e{p8CEcCEV]/|aqNCkM');
define('NONCE_SALT',       '-qH=d.F0 fB^pY:T;|rUuXBE8Rzxf|UuuFb*:~YhuNC]V6 4A1qW,r9Lo1(LQrkN');

/**#@-*/

define('WP_TEMP_DIR', ABSPATH . 'wp-content/temp');

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
define( 'DISALLOW_FILE_EDIT', true ); // Added by Defender
$table_prefix = 'dma_';

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
//define(‘WPCF7_LOAD_JS’, true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
