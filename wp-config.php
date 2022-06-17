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
define( 'DB_NAME', 'ojvafdii_wp_l1wje' );

/** MySQL database username */
define( 'DB_USER', 'wp_gkk7y' );

/** MySQL database password */
define( 'DB_PASSWORD', 'd#69W1RZeLd$1%mY' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'g:6~2qjsX6T9+7W07Xu2|90Gi-39z|WJ4X;#0@Xpe&9039P3#g|NlZ]6VbF!1y:)');
define('SECURE_AUTH_KEY', '[sj3r389S__iH&Nmdo!52d1W|1Aef%mce/Td9&C)FR/T_W2OG(f(3XK]/H8K65P+');
define('LOGGED_IN_KEY', '77JYf1hP98Wg31a728a~[TF3RmoKG-|)t@2*K&t8qU;#fXa2|W&/]xT_*WK3#oJt');
define('NONCE_KEY', '+_Pj)o439lKFX9(l)7/Rc/3l@!/g[CF5]5@w0|)w2(NxK[!d@86yr*[o#tC54sv2');
define('AUTH_SALT', '1M3~|V)D;(E&!/5k]D0_8V[YZJz9bTV~@!Cf!~4zly@zh9b;1|1/;KA!&50(w__K');
define('SECURE_AUTH_SALT', '9X9a2YT&zX%loF2!:o|6GR00EVwN9##2jMirz[9k2&]_LjUzu1/o7#7!V6%;8#A6');
define('LOGGED_IN_SALT', 'RXqm7kdUocVV354n0])Hth0KKeLxQ9P5yWU54pM9B_2&gQroSRx4AZd/U@x2gK_N');
define('NONCE_SALT', 'rM|2G3SW]V@02+c;mT%w0S5N863x#14dKbKt866lyD097y2F[4DQ4faE086z)8yU');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp';


define('WP_ALLOW_MULTISITE', true);
define( 'DISABLE_WP_CRON', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
