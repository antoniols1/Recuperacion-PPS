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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'ciber' );

/** Database password */
define( 'DB_PASSWORD', 'supersegura1' );

/** Database hostname */
define( 'DB_HOST', '10.10.10.5' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/******* REDIS CONFIG ********/
define( 'WP_REDIS_HOST', '10.10.10.5' );
define( 'WP_REDIS_PORT', 6379 );
//define( 'WP_REDIS_PASSWORD', 'secret' );
define( 'WP_REDIS_TIMEOUT', 1 );
define( 'WP_REDIS_READ_TIMEOUT', 1 );

// change the database for each site to avoid cache collisions
// values 0-15 are valid in a default redis config.
define( 'WP_REDIS_DATABASE', 0 );

// supported clients: `phpredis`, `credis`, `predis` and `hhvm`
// define( 'WP_REDIS_CLIENT', 'phpredis' );

// automatically delete cache keys after 7 days
// define( 'WP_REDIS_MAXTTL', 60 * 60 * 24 * 7 );

// bypass the object cache, useful for debugging
// define( 'WP_REDIS_DISABLED', true );


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
define( 'AUTH_KEY',         '5#A5v;}I9-MNJ,eCfgyA?[AWDJ3v7:v3)nYCOmE&:b1/$4;vG+I@gn%B_sn-f>*Z' );
define( 'SECURE_AUTH_KEY',  'IpY02^i`D(b^4bbi|VZy{T$GcvB5BmWYC|d?rhiXQX[D-,IT1B|Fn3(7zzF>?^9M' );
define( 'LOGGED_IN_KEY',    ')A{6Txnk4?$&lB+~KmX<(etnp$E%O0M4cD,`o=CeAQi0,1T `#Jdt?:Y[+%)|.^M' );
define( 'NONCE_KEY',        'Rk)(l0ih|`4QUVgp>Gea1uvSJUdJ/,-WJYCi~[<tx^FIZ+]rm*SJfJo}ky(Lo h2' );
define( 'AUTH_SALT',        'M-lxqY{?NM%H ~f{|0Q[0lCt_ct]T/hBmN$Vs<rA)%bwZ+!l~C=z_e9Aur}Ti4;|' );
define( 'SECURE_AUTH_SALT', 't&F~`NA89H}|{z+zqz(z3oUE3j+6.Qe{:m&1uEB[NSi/4XCRk*s*r&)BS:7:Ds@=' );
define( 'LOGGED_IN_SALT',   'zZH^ JnEA=vC%/_&JpUt8{r[A[~:XGqW_f`1TaUl@{W&trMS[YW cYA}j,=sx(_O' );
define( 'NONCE_SALT',       'Ql{IE[{fiFgM@c:gOZkU~kFuJ+.EJp(>>va4>+!sI|)[VM[8iSD;~BR%F`bD=#Fu' );

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
