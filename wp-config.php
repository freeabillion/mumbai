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
define('DB_NAME', 'freeabil_mumbai');

/** MySQL database username */
define('DB_USER', 'freeabil_mumbai');

/** MySQL database password */
define('DB_PASSWORD', '0b;O;y9BwolF');

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
define('AUTH_KEY',         'gf6yK[Vy#7S~#X$T[D>z4#c>8wJti%YXqmD,,y!g/KH6it[AdN a=[PNH{oj+zF7');
define('SECURE_AUTH_KEY',  '.di#ip_L=f%Ldo9R%P3}5:_DwD/ZNFYPrZXL<:hVHRM-8giO@4[0O~O*29@WpbMW');
define('LOGGED_IN_KEY',    'T_(R-SCsD:In2,aq6rzx4LRmS:*9[%U3abnuzvQ#/Y|?>GmJ8kO+lZrSO^Xa,b<c');
define('NONCE_KEY',        '}9@EHz(k I-)_,lVN7GYH=}0BT@Ku7VA$y8qFR]@v!^CfNXDjm()t)#6~@|YcOUf');
define('AUTH_SALT',        'ZWv3B&$mUmc$#H2VukH%Q%tNs0JWdG`?P.S-PwT^PV6V{enw!Xy&rE9J/b0oJ]-u');
define('SECURE_AUTH_SALT', '6g)GeoKKLyWV}Z{*I[a-w)1K[1y>oJW{7=$KGFIcd#}ZN?W,D#t#BKO @w !uQc?');
define('LOGGED_IN_SALT',   'IFs#%7HiH7=A:hp2&qkK}LC-#BaF}M:RHz<?A$WZ$/id.Jkm2}Y6rKt|}R2ClC/J');
define('NONCE_SALT',       'o1j<j+@g_MNn;0AHdcDc/q3E19(PNr;WII^f=0^>+|x%I()<(|$n5E!1:G.~>RX ');

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
define('WP_MEMORY_LIMIT', '512M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
