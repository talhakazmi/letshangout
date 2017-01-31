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
define('DB_NAME', 'matrixc_dassprod');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'Nqc$8ePruIdr76{@<as*m4`=T{&;w|3q.f.nXTxeThohAds;x+yMEI-yh*q|WBjt');
define('SECURE_AUTH_KEY',  'M#4w $Hv76X[H$;AAXVCD8<oCJIS j+38Tob#-ER||U{pR:?%71R{B69m]8Klh+:');
define('LOGGED_IN_KEY',    '3xd}3H`wen}nBEQQ|AI[~<CM)QvQu3qLjZBI .=,9xkaL`ecRC#l +z,j1Q;];Sl');
define('NONCE_KEY',        'Z)6WMbki.LlLJ_o1x(-( 8/1$>zu*&v>0yZ8V&:,>BQmYx|]QfK}_t5h=RQkJXfX');
define('AUTH_SALT',        'NZIU1`LEz,r,4$!^uDzg`uVr^*;Gu@x+rGV ?D]7h548nU6Z hl}YN;&I/+07>3p');
define('SECURE_AUTH_SALT', 'Z*%=0q*G.m|^uTY+r]W_32xpBpb|(JA3HKB_/sByUD5qVf$niNM0DOz5)aVw1i+O');
define('LOGGED_IN_SALT',   'D>m4>$[- vd6Wf2cDP&EXShTr`K2iB>+smbo4#m(e.J ^QsyB A:;q12_RlH#U0E');
define('NONCE_SALT',       '3}B 16m]iV[J]riu!K#h 4jRtB9uqJHTwGmLm|RTVo)W=XP:Tw12UNxYE>F9QmP]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ms_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');