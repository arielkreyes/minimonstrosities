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

if($_SERVER['HTTP_HOST'] == 'localhost' ){
//if on the local host server use these credentials
define('DB_NAME', 'ar_minimonstrosities');
/** MySQL database username */
define('DB_USER', 'ar_minimonstrosities');
/** MySQL database password */
define('DB_PASSWORD', 'QS7PqnxWDTafCbKy');

}else{
//if on LIVE Server use these credentials instead
define('DB_NAME', 'crmsnmn_minimonstrosities');
/** MySQL database username */
define('DB_USER', 'crmsnmn_ariel');
/** MySQL database password */
define('DB_PASSWORD', 'AWolfyR23@#');
}

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
 define('AUTH_KEY',         '/Vfgy@2g&$W@J`4ZuV[>K(Qs]IE|}.HjkiP!n/Fd8y1*RiWk-Fn<aEgC^%8].zfI');
 define('SECURE_AUTH_KEY',  '%7XX_-H<IvH|7_xc5:|J1O*wPq_-w$-t%|Z##gj&J7$865mX)SE-.Fn+[H3FD<6I');
 define('LOGGED_IN_KEY',    'QuRj^Z7Dwe&Gm-Mm:57$h|FF^-_@-tRMef]:F8naL2fzm|3d*b`wSKvKM7|/,E^P');
 define('NONCE_KEY',        'qIz|1h}U-TblU|H4)2pI9n0>ht^vb=BU*&9[]Y$zMS]MAmsvNm1u~Dcb=m0|n!</');
 define('AUTH_SALT',        '}5i-i|Ro4+m2ABoXe_d<..cn+iy[3pz_mky|=i0o+) 1Q&PwI{_p<#8r+Q?d-Uy*');
 define('SECURE_AUTH_SALT', 'eiHL5a|KcQ-F(*VEPVf`.h#<SxR6hZgYBTHeGeW+#K&0++r.I3YJaK(5TA4+@i+h');
 define('LOGGED_IN_SALT',   'at+|)MGP}[9<&Qf;91b6JVfZ{z$R qz^kX_y%%V{_h1p2Fpd<jEwW.LU@Nk@d.{>');
 define('NONCE_SALT',       '[?jE8- L7&#`lSSWD)$Jo.Awtv?)vu]yrR|P,i)}!e+N;_+0vPC?T^!x=~;&CC!$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ar_';

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
