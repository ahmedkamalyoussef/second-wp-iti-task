<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'day2task' );

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
define( 'AUTH_KEY',         'a,{TL5v6R2.d;L3}(gqiGwHcr~r@5P154T.@HD?QPjn-.#Kr((QlfN}AQB,:^|gL' );
define( 'SECURE_AUTH_KEY',  'JE?PC&EGF~Oe~Dx`R<pA#pE93uHO8kZ_a_IXdITaue8{]7.JWVMe^1533Z_W%*S|' );
define( 'LOGGED_IN_KEY',    '&G8V) [B#`x[rJ,l@kgM:W;]+JXy`Xm.Tjf?8m<&{LsJ)*Vh[B(tGp ^>t-/{sgP' );
define( 'NONCE_KEY',        '[N$GVY}:A3^PFbg ,HYOS$BM`_V2i`mQgs1/KPDV#S>&L%5v )HR>m?LxT(3`R.|' );
define( 'AUTH_SALT',        '{/b7}&(DH}j }:`9bbToQ>{paTn]Kf>}u6p,a/A,)q~,uX#)K3j~!V}BEBW,G24O' );
define( 'SECURE_AUTH_SALT', 'O5xl3B]zSXz-``J{0C|SrP4$6=lQh~kx(~FEM/0[X~hAjxOEhJLEE5w|/ZAweP$%' );
define( 'LOGGED_IN_SALT',   'yPRRyn%AoCr!d8^XdC9^~D]T4.=D3V1gSz;pSLgTn@T3yV@V_*qAzj+96E|42z&2' );
define( 'NONCE_SALT',       '?{^/-a:6?#8|hj[#~/q^=e`5H4Z>LX2Z0>6nTF3fE4vxD??,V=0~~`-]*Q-G%Kco' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
