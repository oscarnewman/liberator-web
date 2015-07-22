<?php
/**
 * Development environment config settings
 *
 * Enter any WordPress config settings that are specific to this environment 
 * in this file.
 * 
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    1.0
 * @author     Studio 24 Ltd  <info@studio24.net>
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'liberator_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');


define( 'WP_SITEURL', 'http://localhost:8888/liberator/testing/wordpress/' );
define('WP_HOME', 'localhost:8888/liberator/testing/wordpress/');
define('ABSPATH', 'localhost:8888/liberator/testing/wordpress/');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<LqsdOmIys!$^b[zakeE&+Es]6brzE~je8><,zhLt&<8XoH3F+Z$zGhAw`)u$YDt');
define('SECURE_AUTH_KEY',  '%2Fyl&MERK^WXF ru?}J<K&k|C<8S+w=4Mo2q84+<2ieCw4f,6^ o*95A3*+jB9s');
define('LOGGED_IN_KEY',    'b_->.v^5$xb0*B-iL^X,p&A^l~i#o}~Fpr=%,[Y pz1aNG|~&C$FvQmQ,[kC9WX|');
define('NONCE_KEY',        '{x1e`l;;fWz:K8<^2V6h2Ce&1`++XI-#Tqh[c^b4t/*I?&1uDQc(#f@m;1P6BH*=');
define('AUTH_SALT',        'N}kTJ:$HT:uP)tpfOiWu+>U~9W[0^>%70<Kc!p9QCk@o$+{T;|l^YZf!WqeEBH9z');
define('SECURE_AUTH_SALT', '@*wa^&I+SrujlkKFetSi)N2w.|+|.Po-Le0`*6eOhfs+wR9q[G9W|f#SiK~+-lc ');
define('LOGGED_IN_SALT',   'r+w!-V?}/? beL>ol(ppCQ_j+]U<^cF2T4wML(0r.h)|Ld-|25;m|Lh9Qc:+qjYK');
define('NONCE_SALT',       '797SR[,/X+a/~wj_e^O*6%IT-)$( e|/!Pnoyot2CA^Tdw0AOn0+rd?^=RO#$RjW');
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
