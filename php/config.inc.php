<?php
define("HOST", "localhost"); 			// The host you want to connect to. 
define("USER", "paymentp_payment"); 			// The database username. 
define("PASSWORD", "munywa1234$$"); 	// The database password. 
define("DATABASE", "paymentp_payments");             // The database name.

/**
 * Who can register and what the default role will be
 * Values for who can register under a standard setup can be:
 *      any  == anybody can register (default)
 *      admin == members must be registered by an administrator
 *      root  == only the root user can register members
 * 
 * Values for default role can be any valid role, but it's hard to see why
 * the default 'member' value should be changed under the standard setup.
 * However, additional roles can be added and so there's nothing stopping
 * anyone from defining a different default.
 */
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

/**
 * Is this a secure connection?  The default is FALSE, but the use of an
 * HTTPS connection for logging in is recommended.
 * 
 * If you are using an HTTPS connection, change this to TRUE
 */
define("SECURE", TRUE);    // For development purposes only!!!!


error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

?>
