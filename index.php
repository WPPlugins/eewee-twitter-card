<?php 
/*
Plugin Name: Eewee Twitter Card
Plugin URI: http://www.eewee.fr/
Description: Twitter Card.
Version: 1.4
Author: Michael DUMONTET
Author URI: http://www.eewee.fr/wordpress/
License: copyright eewee
*/

/**
 * Define
 * @since 1.0.0
 */
define( 'EEWEE_TWITTERCARD_VERSION', '1.4' );
define( 'EEWEE_TWITTERCARD_NAME', 'eeweeTwitterCard' );
define( 'EEWEE_TWITTERCARD_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );
define( 'EEWEE_TWITTERCARD_PLUGIN_URL', WP_PLUGIN_URL . '/' . dirname( plugin_basename( __FILE__ ) ) );

/**
 * Add CSS
 * @since 1.0.0
 */
function addCssTwitterCard(){
	wp_enqueue_style( 'cssCountdown-style', '/wp-content/plugins/eewee_twitter_card/css/style.css' );
}
add_action( 'init', 'addCssTwitterCard' );

/**
 * Add JS
 * @since 1.0.0
 */
function addJsTwitterCard(){
	wp_enqueue_style( 'jsTwitterCard', '/wp-content/plugins/eewee_twitter_card/css/themes/base/jquery.ui.all.css' );
}
add_action( 'init', 'addJsTwitterCard' );


/**
 * Add Files
 * @since 1.0.0
 */
require_once( EEWEE_TWITTERCARD_PLUGIN_DIR . '/forms/addTwitterCard.php' );
require_once( EEWEE_TWITTERCARD_PLUGIN_DIR . '/controllers/EeweeTwitterCard.php' );


/**
 * Instantiate Classe
 * @since 1.0.0
 */
$eewee_admin = new EeweeTwitterCard();


/**
 * Wordpress Activate/Deactivate
 *
 * @uses register_activation_hook()
 * @uses register_deactivation_hook()
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, array( $eewee_admin, 'eewee_activate' ) );
register_deactivation_hook( __FILE__, array( $eewee_admin, 'eewee_deactivate' ) );


/**
 * Required action filters
 *
 * @uses add_action()
 *
 * @since 1.0.0
 */
add_action( 'admin_menu', array( $eewee_admin, 'eewee_adminMenu' ) );
?>