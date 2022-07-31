<?php
if ( !class_exists( 'RCF_WC_Remove_Checkout_Fields' ) ) {
class RCF_WC_Remove_Checkout_Fields {

   
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_remove_checkout_fields', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_remove_checkout_fields', __CLASS__ . '::update_settings' );
    }
    
    
    
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['remove_checkout_fields'] = __( 'Remove Checkout Fields', 'woocommerce-remove-checkout-fields' );
        return $settings_tabs;
    }


    
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }


    
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }


    
    public static function get_settings() {

        $settings = array(
              array(
                'type' => 'title',
                'desc' => __( '<b>Note:</b> You can remove fields and save settings without any hesitation as all settings are reversible. If you decide to show field again in future, you can simply uncheck the option for that field and save settings.', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_initial_note'
            ),
             array(
                'name' => __( 'Select Billing Fields to remove', 'Remove-Checkout-Fields' ),
                'type' => 'title',
                'id'   => 'wc_remove-checkout-fields_billing_title'
            ),
             array(
                'name' => __( 'First Name', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( "Remove First Name field", 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_billing_fname'
            ),
             array(
                'name' => __( 'Last Name', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove Last Name field', 'Remove-Checkout-Fields' ), 
                'id'   => 'wc_remove-checkout-fields_billing_lname'
            ),
          
	            array(
                'name' => __( 'Phone Number', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove Phone field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_billing_phone'
            ), 
              array(
                'name' => __( 'Company', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove Company name field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_billing_company'
            ), 
             array(
                'name' => __( 'Country', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove Country / Region field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_billing_country'
            ), 
              array(
                'name' => __( 'Address 2', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove optional street address field Only', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_billing_address2'
            ), 
              array(
                'name' => __( 'Address', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove both Street Address FIelds (If it\'s enabled then no need to enable previous <strong>Address 2</strong> option)', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_billing_address'
            ), 
              array(
                'name' => __( 'City', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove Town / City field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_billing_city'
            ), 
             array(
                'name' => __( 'State', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove State field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_billing_state'
            ), 
              array(
                'name' => __( 'Postcode', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove ZIP Code field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_billing_postcode'
            ), 
             array(
                 'type' => 'sectionend',
                  'id' => 'wc_remove-checkout-fields_billing_details_section_end'
               
            ),
              array(
                'name' => __( 'Select Shipping Fields to remove', 'Remove-Checkout-Fields' ),
                'type' => 'title',
                'id'   => 'wc_remove-checkout-fields_shipping_title'
            ),
                          array(
                'name' => __( 'First Name', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove First Name field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_Shipping_fname'
            ),
             array(
                'name' => __( 'Last Name', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove Last Name field', 'Remove-Checkout-Fields' ), 
                'id'   => 'wc_remove-checkout-fields_Shipping_lname'
            ),
              array(
                'name' => __( 'Company name', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove Company field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_Shipping_company'
            ), 
             array(
                'name' => __( 'Country', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove Country / Region field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_Shipping_country'
            ), 
              array(
                'name' => __( 'Address 2', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove optional street address field Only', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_Shipping_address2'
            ), 
              array(
                'name' => __( 'Address', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove both Street Address FIelds (If it\'s enabled then no need to enable previous <strong>Address 2</strong> option)', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_Shipping_address'
            ), 
              array(
                'name' => __( 'City', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove Town / City field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_Shipping_city'
            ), 
             array(
                'name' => __( 'State', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove State field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_Shipping_state'
            ), 
              array(
                'name' => __( 'Postcode', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove ZIP Code field', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_Shipping_postcode'
            ), 
              
             array(
                 'type' => 'sectionend',
                  'id' => 'wc_remove-checkout-fields_shipping_details_section_end'
               
        ),
              array(
                'name' => __( 'Order Notes Section', 'Remove-Checkout-Fields' ),
                'type' => 'title',
                'id'   => 'wc_remove-checkout-fields_order_notes_title'
            ),
                          array(
                'name' => __( 'Order Notes Box', 'Remove-Checkout-Fields' ),
                'type' => 'checkbox',
                'desc' => __( 'Remove Order Notes Box on Checkout page', 'Remove-Checkout-Fields' ),
                'id'   => 'wc_remove-checkout-fields_order_notes'
           ), 
              
             array(
                 'type' => 'sectionend',
                  'id' => 'wc_remove-checkout-fields_order_notes_section_end'
             )
            );

        return apply_filters( 'wc_remove-checkout-fields_settings', $settings );
    }

}

}