<?php
/**
 * Plugin Name: Remove Default Checkout Fields for Woocommerce
 * Description: Remove default woocommerce Billing and Shipping Fields on Checkout page
 * 
 * Author URI:  https://khawais.com/
 * Author:      Khawaja Awais
 * Version:     1.0
 *
 * Text Domain: Remove-Checkout-Fields
 *
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

if (!defined('ABSPATH')) {
	die('Access Denied');

}


add_action( 'activated_plugin', 'remvcheckoutfields_activation_redirect' );

function remvcheckoutfields_activation_redirect($plugin) {
    if ( (class_exists( 'WC_Integration' )) && ( $plugin == plugin_basename( __FILE__ ) ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=wc-settings&tab=remove_checkout_fields' ) ) );
    }
    

}

//add settings link for plugin
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'rcf_settings_link' );
 
function rcf_settings_link ( $actions ) {
   $rcf_settings = array(
      '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=remove_checkout_fields' ) . '">Settings</a>',
   );
   $actions = array_merge( $actions, $rcf_settings );
   return $actions;
}



function remvcheckoutfields_admin_notice__error() {
if ( !class_exists( 'WC_Integration' ) ) {
    $class = 'notice notice-error';
    $message = __( " Plugin works only with woocommerce! You can deactivate plugin if you no longer use woocommerce.", 'Remove-Checkout-Fields' );
 
    printf( '<div class="%1$s"><p><strong>Remove Checkout Fields</strong>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
}
}
add_action( 'admin_notices', 'remvcheckoutfields_admin_notice__error' );



include('field-removal-options.php');

if (class_exists( 'RCF_WC_Remove_Checkout_Fields' )) {

  RCF_WC_Remove_Checkout_Fields::init();

  include('remove-fields.php');

}