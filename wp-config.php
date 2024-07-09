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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gymfitness' );

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
define( 'AUTH_KEY',         'x2w=EIH1 >Yshh>F}F_~E~4M. |,FoZmcZsL1C=KalB-j_ox+qx[Rt4J=!!c4HCc' );
define( 'SECURE_AUTH_KEY',  'p8:)y~Ks,iOl;Bld#$VyCKiI%n9*5lTvd/<AvF&v7GMef+|irO.E+U[5$[7(%L6h' );
define( 'LOGGED_IN_KEY',    'ks_d%+m=N,+#7Z/#/}Jo9nn.<6?/G^L^a4_@T8RPZp[B`kgLswPir*]<S^ETmnl/' );
define( 'NONCE_KEY',        'y>[+1SUBycY3n!A;,(hWK.:<@ejUY)Qu%P1MU;zKstM=C$k=f@X4m QSeJbg|tu3' );
define( 'AUTH_SALT',        '{KYr<zJ_zpS/m4SQf7T{Hx|?v<q+zVQhi8{1aH)FW<ZZ<nCoX3WphtetoYX4aMo$' );
define( 'SECURE_AUTH_SALT', 'BTsB8Z03IgLk)q9+d~v#WP/iKS(}q!GS^sN<3.K&`]zoxw`#;~!L+so{`#]xJj0i' );
define( 'LOGGED_IN_SALT',   '(rhbHjgI.vGm rQP1%MF6~)f|*Y<)s?mk)$H{Xv;3b+. UuIW_A)I%TMI[^ zV9T' );
define( 'NONCE_SALT',       '$Kx20,4A]|[-YZ|#TT~5H(0=5p)%SDM3(^e(^UGRb0;``s6r|/Mi|cy[|-+Sk=K|' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
