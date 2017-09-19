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
define('DB_NAME', 'thanh_wordpress_foobla');

/** MySQL database username */
define('DB_USER', 'thanh_wordpress_foobla');

/** MySQL database password */
define('DB_PASSWORD', 'toicobautroi96');

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
define('AUTH_KEY',         'Z,MW7Fc$*`n!t2~XxQ5 R]{b`c#h;|^m8>&PXTBS~<*r`;Z4*gr6; p`h&C.^kv=');
define('SECURE_AUTH_KEY',  'vWo@NKj/ob,BG<Q4S7?bno<ub_H1d)sAe%DoQmiDZVXO6[81rhCtd@HpIv5Tv=?N');
define('LOGGED_IN_KEY',    'nx /{*N:^Lt/1jaW@|slY4,Jsv06MfGVfVE~UtW%?cw~^H TrlW$kq(/YmL#66,C');
define('NONCE_KEY',        'vDwVx,0T~|pu^mkg@nU$0E]`ka-]`4LY^Y}r;)4p,K4)_+,/*yDzU3*}<[zq2 ={');
define('AUTH_SALT',        '#}mF+MONB6tf_.Ix5YJehe0;)/4IYnz=.bNl00PF.b,TvxA.o/BMQ_br).3HMNcq');
define('SECURE_AUTH_SALT', 'lQT3Ok.,(S]A`v54nrKI?UD [.bP$:z;,Yl;O7$a:ba-XEDZkvL*V?s;Qh6eM!cr');
define('LOGGED_IN_SALT',   '~V,=v_aXPLfV|X]he9M.Owkduh)rlc2_{Z,>34MSElV:=yN?0,pSWgL~Lsbxh;bb');
define('NONCE_SALT',       '<sExwTHBF@cw,sKK2Zj@yGQ5Vsk[lp%V`DBOC)_}3Hpg~f~(#Iw=!Uhp4FL4EC~<');

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
