<?php
/**
 * Plugin Name:       API Accelerator
 * Plugin URI:        https://github.com/SeanBlakeley/API-Accelerator
 * Description:       Avoid needing to initialize the full WordPress boot sequence. This (beautifully simple) plugin will substantially speed up API requests by intercepting the call and including only the plugins required for the API.
 * Version:           0.1.0
 * Author:            Sean Blakeley <sean@seanblakeley.co.uk>
 * Author URI:        seanblakeley.co.uk
 */

/**
 *
 * Ignore requests to the homepage
 *
 * @author     Sean Blakeley
 * @since      0.1.0
 *
 */
if ( ! isset( $_SERVER['REQUEST_URI'] ) ) {
	return;
}

/**
 *
 * Ignore requests to any page other than an API Endpoint
 *
 * If the URL contains 'wp-json' then we assume it is a API request
 *
 * @author     Sean Blakeley
 * @since      0.1.0
 *
 */
if ( strpos( stripslashes( $_SERVER['REQUEST_URI'] ), 'wp-json/' ) === false ) {
	return;
}

/**
 *
 * Hijack the WordPress Boot Sequence
 *
 * We can stop all the plugins loading and go directly to plugins required by the API (and including our plugin containing our endpoint).
 *
 * We could use the SHORTINIT() function & load the wp-load file directly,
 * but the location is not always consistent - and that approach is not secure.
 *
 * @author     Sean Blakeley
 * @since      0.1.0
 * @param      array $plugins   The list of active plugins.
 * @return     array $api       The plugin(s) we want (by-passing the other active plugins).
 *
 */
function api_accelerator_load_plugins( $plugins ) {

	// Create an array of the API plugin dependancies
	$api = array();

	// add the plugin containing the endpoint (ensuring it's loaded after the dependancies)
	$api[] = '';

	// Return the API plugins instead of the default active plugins list ( $plugins ).
	return $api;

}
add_filter( 'pre_option_active_plugins', 'api_accelerator_load_plugins' );
