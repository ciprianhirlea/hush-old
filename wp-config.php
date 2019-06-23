<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hush');

/** MySQL database username */
define('DB_USER', 'hush');

/** MySQL database password */
define('DB_PASSWORD', 'ehBheyd64gwj!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'ZV}<(r;wwM^S_bnaS6 B|M*{chI 4Wvlo|Mi3E-YFzF2Lhc;TCP~OcsMg}oLv%H>');
define('SECURE_AUTH_KEY',  '^#y%tdJE X|;s+mC5,{SP$uM/)K~O.@iSk4`$U1e$h65q@q+|3BbnNF&U6vF%1AU');
define('LOGGED_IN_KEY',    'qq?mk$3IR([nnNp_HAA>au*+.7?|?9KWrH{xmg)+zL&~lv5W);R0A@k&BcrBdEa)');
define('NONCE_KEY',        'q0#4gUJe,gPb@$J ?CMe@}yAbh_PA.:HmAkvGB-A|[p[yTmM5n zP|H^srC.Jsx&');
define('AUTH_SALT',        '6cs5M9whHW={/4Z>;&_A9q~eX*6*!k.l|Uz?{r+gI(*}Z_i,#Rga}QZJx^8Kp~aO');
define('SECURE_AUTH_SALT', '-EkVga<|DU~Rw iwH.C*13bv!;Gs6dH7j$CTmjsC]uOi/Qpe8ifk#^5x ?._>weF');
define('LOGGED_IN_SALT',   'ZE*VMiH}|5n^SdaHAf/mUD/OY-K|Cy*O@+[N8yZ/[%4>VHLNrN/u<_>`+kRpwul|');
define('NONCE_SALT',       'aZJh~+rCe.m5=5U$FD-bE=H:tW$^hWGoy9G&P^#.T+UKy=a99mlv>@SG!eU^~ ?f');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define( 'WP_DEBUG_DISPLAY', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_HOME','https://hush.ciprianhirlea.com');
define('WP_SITEURL','https://hush.ciprianhirlea.com');
define('FS_METHOD','direct');
