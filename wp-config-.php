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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cpr' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         ',hO*S(D-)I|;7h8_j(Zf!?y Jgspe0?+8l5?WhNB9._)ss*$tV0.=6~)kn*<k-dG' );
define( 'SECURE_AUTH_KEY',  'hMV~ZzlIlq6|] ,7ZKVIL)fx3c^cgxR`!;oxd:10pP%M3hD(;YVij;O1~/{xy9oY' );
define( 'LOGGED_IN_KEY',    'lEk-Am3M[W -/wX65[7Y#^QS#_5EfEc~e,t_rtBj)XvT<javpKs-4dpv_F&71bzt' );
define( 'NONCE_KEY',        'Uqp_6#*:?5B?CsD:`Y^ma!3jDh]?ba6hJIk#)V$j]~{!s_#H;(|SSMy=v<|-V.z:' );
define( 'AUTH_SALT',        '6Y$YygQ} <#Fk/g3:!b%p-f8/>-}Xn9R?vWd1WQQex$1YK)SSK-%$|(tYpB7ubpt' );
define( 'SECURE_AUTH_SALT', 'mHz^vj qQx-.B:d`}gpKHp<PPOo3{suus0<`E@<Pc==>G*|,yC%ntCXe=3~Vs5]]' );
define( 'LOGGED_IN_SALT',   '=zxtt+kbK==JW*:bEJpyhgOZT7hHX8o$*0RW55K_f#TYe_v~]c&U/-D=1c~+jOBz' );
define( 'NONCE_SALT',       'z%:bkP,M}}X@vX})#;mBv{ILr[pWqB&3xSa)W)N+mO1!.c_3[B7+%W$msr|x;t .' );

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
