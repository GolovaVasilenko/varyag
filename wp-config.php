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
define( 'DB_NAME', 'varyag3546_db' );
//define( 'DB_NAME', 'varyag75_db' );

/** Database username */
define( 'DB_USER', 'root' );
//define( 'DB_USER', 'varyag43user' );

/** Database password */
define( 'DB_PASSWORD', '' );
//define( 'DB_PASSWORD', 'rT539hF2uvbc' );

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
define( 'AUTH_KEY',         '`lhUnUCPV_^c`>3.:#auze4B*W)(pGrSnK ]trCUPT~RI`< U.FGk)d][G0$9-$M' );
define( 'SECURE_AUTH_KEY',  '1CK2DLbm3G4f?6G+2P9Cp3<Sio]&vvc5RjA1@A6.+>~b r.FR=BecS8^e?~cu8-e' );
define( 'LOGGED_IN_KEY',    'qV[DGc3M6&]1D./jnE,i&7VFwwyeyYCPb:SW?RJKo//LZLQy!~uKM1+AiGh?WzRe' );
define( 'NONCE_KEY',        'P;a;0NSdL1Gn6%(F)rD?4<?/|Etf& cu~Y!E,Mt^2vqiul9OL50~]}wo1Esw=R2y' );
define( 'AUTH_SALT',        'kl#ONd&ku7D:4 h5]bhT)xOrxFXQp eXYF|(Fd7(_`yzk2c %fCo%7gTP:]c5ZLR' );
define( 'SECURE_AUTH_SALT', 'oS|W!)b !9YGXh/dF?F9^C*w6-}L%9L _1JGUQK-d[$Q42]Wzg?.9:ET};nrH&QW' );
define( 'LOGGED_IN_SALT',   'p{#2(MKI_xAvtGNnkP/`>#.ePp}S2*2WHTZ.<RW[@RF{v=fqkh$0/c[m`P-{T8Ad' );
define( 'NONCE_SALT',       'V;V)CJ)|]MzBtnx)[#;DIl/-Le#PNVQ@kOW*y0@[VeLD g$t7wmojc}}3!{L^ZP6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'vr_';

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
