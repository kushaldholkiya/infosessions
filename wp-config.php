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
define( 'DB_NAME', 'events' );

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
define( 'AUTH_KEY',         'JA@LPW$re@Im+th%`G`8#mw~t0}OR<] j |PM39,vsK1h& =6nrM$]L)J_}F. |7' );
define( 'SECURE_AUTH_KEY',  'w3FTYBgKdV^Ep3AuDy=1(kuSl*n_6MGqxj18#MM{-w9O2vgcu)HE=:=-+M{wd+bv' );
define( 'LOGGED_IN_KEY',    '-sGLTnE,]N71oRDVaIQU;rUBrPeWyfeQp:yFR;mc.|N-kI(CFfG@^q;%.a7ON(]r' );
define( 'NONCE_KEY',        'Mkk,=jQ^d><NGi?j{uAy][*p-P!wwXK#T2NSg>}nAr!`2znIw*2*RGYCTUD>Xp!k' );
define( 'AUTH_SALT',        'mE^]=j^%l=?cJF8<,qAs7xeruQ_tLtN_)2^)Z|~xy9_[*`q$Q>*=1^B6lynNjX5W' );
define( 'SECURE_AUTH_SALT', '2QCice%(ja!{6bBOM?6A;a(l*oS)pLyg%VjaDVf;e.S/8PxMLllXq4(~j %s]hIT' );
define( 'LOGGED_IN_SALT',   '6P:BH)4b(x2>^K?]g;t<Id?q#_M/8&:eQFc0u[&GTB7uWsy+^_ATejv8m| nAR3{' );
define( 'NONCE_SALT',       '#Hlif@bhF.[^weW1+q51HJLMU=f|n0LXy%d@q:BECUPSf~`=_4VD^A0ZZ&wV6N!n' );

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
