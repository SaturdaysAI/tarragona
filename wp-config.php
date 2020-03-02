<?php
define('WP_AUTO_UPDATE_CORE', false);// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sai_plesk' );

/** MySQL database username */
define( 'DB_USER', 'wp_j0q6n' );

/** MySQL database password */
define( 'DB_PASSWORD', 'f4!8YTbI3r' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '1-[zg1Qg(c9Ns7#)q:xQ2Q56Ts26S@|/!KU|t|Dz%vft24t|HB8nDGzC2DOaI#Ox');
define('SECURE_AUTH_KEY', '!hs[v~n:NZ+2*7A1e07@5BBq-(ob26E2ss84QGrerswvZ5_I!NGf4HGgCi04:vu_');
define('LOGGED_IN_KEY', 'zCTB[&@K3R))k0@*#Y&CXn[K~5Y00e0zv49!G5R3yP28FFV+f@Q9h@jS6e;6]0Sn');
define('NONCE_KEY', '%S9]IX]|V1*A-ybP:&Ln:58Ai+YdV/0:*1(5#xF9dO:7769+:[43Y(k8eMqU29;J');
define('AUTH_SALT', '5RxZ:I&YTs*pa]LeK5Iy37C(UA894w6CYwOMQ)i[9:y1S|5W#0~l|X~7)Q&Zk4sD');
define('SECURE_AUTH_SALT', 'UUZ[B~6oe|b0ODr2L9L)-6W!]6C[MnM~cKj2za23E6An+#EUTJUhlXAu515(6B21');
define('LOGGED_IN_SALT', ')41Y8Or|_4PPLFb;*_J83qm@*tysxZrD/5Dy4rAX;f2K@3pl@5*h67bwCY/86dqD');
define('NONCE_SALT', '~2gMe15:@&O29Pb7-t1-n3#~%!765dEN5kC5o;uaxmj#R-9ay8673VlH2yeMyN+7');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Ak6Ct5K_';


define('WP_ALLOW_MULTISITE', true);

define('WP_CACHE', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
