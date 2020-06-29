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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_backend_1' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jK?f&2f<b~>&.4EB9f$r?d8lW!/qWe+B:Bq]1sd!ox!JjZ{r&/*S:>-|_F;Jc}Q}' );
define( 'SECURE_AUTH_KEY',  'O:lC?28$uU_a~O^/^Xp<c`K$-gg?eF GOtrl9HIJm3z[BJb8dq8_>#n0PvhXW%gr' );
define( 'LOGGED_IN_KEY',    '60mJ=bBU:1N01TCh&}dO{#_Q,(+/h`tlD9B|GuV<?EHy_KzEPz az=1tuNxOcY*R' );
define( 'NONCE_KEY',        'odWo?0h4X.d9W&ur@v[P.fU]S1C:pVN5eZ=g)0p8?kw&^-+A3 L}*JVQ.1lcY:!P' );
define( 'AUTH_SALT',        'v?~8OOF@BR(6,[g3DbCgVnNxg,&Xja,[s+CBg=Kny{dc5/Vurq6zlOlF^ylr#l%}' );
define( 'SECURE_AUTH_SALT', ' V;7dyb@cnUk<3)IB3@>*%7A4c<nxDiYVx%^IhOCt(,naXDg;~z8!h$m2lW-y2ke' );
define( 'LOGGED_IN_SALT',   'f5Pci05R5K}6!kQAXJCFZoKIJ&~Ibm!ykzemN&xJ3tUvp%F{,zev*<CW=eR :CTL' );
define( 'NONCE_SALT',       'Bz|K%VupI@u)#{ZB|D4-zBb%I8@)xH!1p=8XUQ0tzM/4uoF]w$dW1n]b[a_N|+4D' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
