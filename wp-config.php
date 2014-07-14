<?php
/**
 * The base configurations of the WordPress.
 */
 
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');
 
/** Include environment specific configuration. */
define('WP_ENV', (getenv('WP_ENV') ?: 'production'));
require_once(ABSPATH . 'wp-config-' . WP_ENV . '.php');
 
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');