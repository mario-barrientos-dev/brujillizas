<?php
define( 'WP_CACHE', true );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u846270414_Dq6S9' );

/** Database username */
define( 'DB_USER', 'u846270414_KXx5V' );

/** Database password */
define( 'DB_PASSWORD', '5OWTwXeUgW' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '{WJ1_*$pl+*.f>/)R>L[;13*y!~qMi@TO~=c =fc)MQ|o~E0]d}BW]F_,H+&}/w1' );
define( 'SECURE_AUTH_KEY',   '~Uap A-[2u^@cuffI.c*+(3j4EGf}Z<wPq~n4,qmVOWYREJx1J,ET^bU_3B<l5RI' );
define( 'LOGGED_IN_KEY',     ';[}&kO/[kCon5m0(p-v-bXXJQ!G yf^Jqrv$-OAv3-)8@1`_*|u]|I_}6}3Yfgpv' );
define( 'NONCE_KEY',         '{%COrM]^3ZPX]zB+VL>dZ}Saz_*mxf$?oP7+,bTsQ!.}|E `/q))wXrd2#Hymd_I' );
define( 'AUTH_SALT',         '1xK?ALF5r<]YBSS!3mVlU}jF,Cz:>:IR-?qJr#S*rEhTnr`f/[bHW[w3z[mn3ud4' );
define( 'SECURE_AUTH_SALT',  '(|%Bmlx0UT;=7y#Xdu6C`s[b9]Z7]Tx?BvIhYPm(};!yAii@0I&mp.i.RUyF5ltB' );
define( 'LOGGED_IN_SALT',    'e|*<j(w>{t):e*twmT]@1Vc{q=G=yc39 xAvi%@Vk|E2PE!N+In-8IfB=OAq&Ec9' );
define( 'NONCE_SALT',        '>OuS@0>SDSd<^@T0hS?#U|][h7|T&R dx9=Kmqrj0z>GEc4l +KzQqH[FtIb;EXu' );
define( 'WP_CACHE_KEY_SALT', '{@bt/UFEkbT~%r2sYyvRi[- oMcO<*,2O&<2Otf-0grGZp:LArTyOpxy3(Flcz;#' );


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



define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
