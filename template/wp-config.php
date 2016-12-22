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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

if ($_ENV['DYNO']) {
	$db_name      = trim(parse_url($_ENV['JAWSDB_URL'], PHP_URL_PATH), '/');
	$db_user      = parse_url($_ENV['JAWSDB_URL'], PHP_URL_USER);
	$db_password  = parse_url($_ENV['JAWSDB_URL'], PHP_URL_PASS);
	$db_host      = parse_url($_ENV['JAWSDB_URL'], PHP_URL_HOST);
	$env          = $_ENV['ENV'];
	$wp_debug     = $_ENV['ENV'] == 'staging';
	$protocol     = 'http://';

// MAMP
} else {
	$db_name      = 'wp_{{PROJECT_SLUG}}_development';
	$db_user      = 'root';
	$db_password  = 'root';
	$db_host      = '127.0.0.1:8889';
	$env          = 'development';
	$wp_debug     = true;
	$protocol     = 'http://';

}

/** Define ENV global */
define("ENV", $env);

/** Define protocol */
define('PROTOCOL', $protocol);

/** The name of the database for WordPress */
define('DB_NAME', $db_name);

/** MySQL database username */
define('DB_USER', $db_user);

/** MySQL database password */
define('DB_PASSWORD', $db_password);

/** MySQL hostname */
define('DB_HOST', $db_host);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Allows both foobar.com and foobar.herokuapp.com to load media assets correctly. */
define("WP_SITEURL", PROTOCOL . $_SERVER["HTTP_HOST"] . '/wp');

/** WP_HOME is your Blog Address (URL). */
define('WP_HOME', PROTOCOL . $_SERVER["HTTP_HOST"]);

//define('FORCE_SSL_ADMIN', (PROTOCOL == 'https://'));

/** Disable theme editor */
define('DISALLOW_FILE_EDIT', true);

/** Define default theme */
define('WP_DEFAULT_THEME', '{{PROJECT_SLUG}}');

/**
 * Moving wp-content folder
 * https://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content_folder
 */
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');
define('WP_CONTENT_URL', WP_HOME . '/wp-content');

/**
 * Revisions management
 * http://codex.wordpress.org/Revision_Management
 */
define('WP_POST_REVISIONS', 1);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
{{WP_SALT_KEYS}}

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', $wp_debug);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
