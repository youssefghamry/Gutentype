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
define( 'DB_NAME', 'Gutentype' );

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
define( 'AUTH_KEY',         'VuI&lFgt(+.;9_9!x`X%nGGg,qFt7?_DzX&^>+QsX76.U.0)kS<sM9@,NJq.Tv3K' );
define( 'SECURE_AUTH_KEY',  'll:&l,Gj)oO5qghi~tR#Scx{R${{J7F5dx|C-< ^]!8%H!LBTCmEdbg s<f0uz6C' );
define( 'LOGGED_IN_KEY',    'pMx#:@;^qI*<}Sq;g6eO^;_0k%W(:nX1!fH@Z3e#8{}:&el;#)LY@:C|yJ}Oxsu+' );
define( 'NONCE_KEY',        '/Eh@MdKqF?Wv^WJ8qa*(O 2>lw_@nsfk(QaURcSHp%rI_jYd?!gZ[chsjIi0G)lI' );
define( 'AUTH_SALT',        '&3Bir3KrA)#d|nG/]fX~$C]7ggG:9CV5x,;rJfucC)^E[0jeIW~N0@PM1rP<szfP' );
define( 'SECURE_AUTH_SALT', 'hgIB:gw%^tfTAL[UY|QgvkP>;B.Dc><TXXMF:XXVpr*m<z%Z@fL6RDGkn1TdL6nx' );
define( 'LOGGED_IN_SALT',   'LV[g49ntCGM!B|}7GJg/6Ef<{QS6H/M:7{miT2C-g&fJ.hRy7o7y),Ie{04qCBU7' );
define( 'NONCE_SALT',       '/8$n7x5b`uk@/1nFtvHOz21/qp#LWy#{^yY QGtiu1HFz3@]:h7i rC_@x]4&nnn' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_Gutentype';

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
