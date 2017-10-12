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
define('DB_NAME', 'lolz');

/** MySQL database username */
//define('DB_USER', 'truongphat_123');
define('DB_USER', 'root');

/** MySQL database password */
//define('DB_PASSWORD', 'truongphat@123');
define('DB_PASSWORD', 'hungdaica');

/** MySQL hostname */
define('DB_HOST', '139.59.250.144');

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
define('AUTH_KEY',         'XF-r%@/WP&`]u#t@AQ[PU22?Pb-{Eb.|x0x!b:n5/V,P=3)[d`V% ]%cwp@B3{I+');
define('SECURE_AUTH_KEY',  '%V$Fl}n@0jCQvRtZUn!<b.!vMK(V{~8bPvZVIVkR:E.;?uG2|$IAlGUN>YH+xcQ+');
define('LOGGED_IN_KEY',    '?$4F@#+O7tF)ljC}]z6zL`a|8A)/BxFXAzd)/_)>h7@7B,8@cme0j&#r}}WnmJjH');
define('NONCE_KEY',        'c%Y;z-vROZ!&%{6_vBkP41~gjog[5)%}BJD Ws}(i6}0+| 0;QyBsOj#H;cLK_De');
define('AUTH_SALT',        '#<t$8SIsFJs?9iovgE=t^3c_@u~98@O!9:v+HpJ):+(w(}#@kL/7sc2<,+Y8Wy_A');
define('SECURE_AUTH_SALT', '$`-FJ);`aV/KO6tn4sS;A/#>a%O58<dbr-wXYD*DYfUdc2XzlX,pEo^s$Mq&6#lI');
define('LOGGED_IN_SALT',   'Tm!@N)zKWL.tV_ 8ie<s_;W$E2$dX1:?Lj9b|:S:F8XHx1N*}L!arA0G]K@qICo=');
define('NONCE_SALT',       '$OqqKq*l.#t345![1*S;K$z-s?6W#^W.( ChU.0bZBk:q(~ct2wC6FtV<)Su/w]7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'g_';

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
define('WP_MEMORY_LIMIT', '64M');
//define('WP_SITEURL','http://nuockhoang365.com/demo');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
