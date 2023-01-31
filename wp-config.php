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
define( 'DB_NAME', 'woazuymy_sb' );

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
define( 'AUTH_KEY',         'mQCCB sv<yLnK?D%u~Af6Su@T ;g<;2+{cw>W 2c[pQ>[/InJiS#`c]jj`#4ca}Q' );
define( 'SECURE_AUTH_KEY',  'DNSd-R{7rXLUJYJaab>|QI.7pO+<k/hmk{Ca9C02|Gge_iD]^eO1/=nmkyVB#_va' );
define( 'LOGGED_IN_KEY',    'bo>RKkX=UW<B)cqQ5~g$C0R%o{]zw8%6*0n?rC4:?si;I:P)%}I(xJ{DH}br@28+' );
define( 'NONCE_KEY',        'Hwoj@B|Q}>d[Vz|]x}ss4/4oO4NSO,86,yc;zy|TgAND?qg%,Qa20&uUIM*nV|=-' );
define( 'AUTH_SALT',        '2U*[{5n44!{+a4kgJv`NPB8e@IUb4la/P.pvnr0+)tXWB&t};vD]ao)o=-MX6]_!' );
define( 'SECURE_AUTH_SALT', '6XHleD%v/ZL9Sqr/}vf-Me%7[e8}bz09^V.bjxnlO~!AbCGX1roW1LFa~}=< PK&' );
define( 'LOGGED_IN_SALT',   ';jB.O+_nHqt4[1c._Beq{|Y=C^75Y!RrY}&aq&nZ=K4:|Pe0q>&w=xfqg|Q/&AMw' );
define( 'NONCE_SALT',       'u2bx@KG4.BgJ-rIsN`}0i_$A.]G!Wo,^g=x3:2<7oE{@y+$TrB|>?;tQ5gKa.PDF' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sb641_';

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
define('ALLOW_UNFILTERED_UPLOADS', true);

define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
define( 'WP_MEMORY_LIMIT', '5G' );
/* Add any custom values between this line and the "stop editing" line. */



define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

/** Sets up 'direct' method for wordpress, auto update without ftp */
define('FS_METHOD','direct');
