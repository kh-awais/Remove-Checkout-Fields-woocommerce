<?php
    add_filter( 'woocommerce_checkout_fields' , 'rcf_updated_checkout_fields' );
 
    function rcf_updated_checkout_fields( $fields ) {

       //Get options for Billing Fields 
       $rcf_billing_fname =  get_option('wc_remove-checkout-fields_billing_fname');
       $rcf_billing_lname =  get_option('wc_remove-checkout-fields_billing_lname');
       $rcf_billing_phone =  get_option('wc_remove-checkout-fields_billing_phone');
       $rcf_billing_company =  get_option('wc_remove-checkout-fields_billing_company');
       $rcf_billing_country =  get_option('wc_remove-checkout-fields_billing_country');
       $rcf_billing_address2 =  get_option('wc_remove-checkout-fields_billing_address2');
       $rcf_billing_address =  get_option('wc_remove-checkout-fields_billing_address');
       $rcf_billing_city =  get_option('wc_remove-checkout-fields_billing_city');
       $rcf_billing_state =  get_option('wc_remove-checkout-fields_billing_state');
       $rcf_billing_postcode =  get_option('wc_remove-checkout-fields_billing_postcode');

       //Get options for Shipping Fields 
       $rcf_shipping_fname =  get_option('wc_remove-checkout-fields_Shipping_fname');
       $rcf_shipping_lname =  get_option('wc_remove-checkout-fields_Shipping_lname');
       $rcf_shipping_phone =  get_option('wc_remove-checkout-fields_Shipping_phone');
       $rcf_shipping_company =  get_option('wc_remove-checkout-fields_Shipping_company');
       $rcf_shipping_country =  get_option('wc_remove-checkout-fields_Shipping_country');
       $rcf_shipping_address2 =  get_option('wc_remove-checkout-fields_Shipping_address2');
       $rcf_shipping_address =  get_option('wc_remove-checkout-fields_Shipping_address');
       $rcf_shipping_city =  get_option('wc_remove-checkout-fields_Shipping_city');
       $rcf_shipping_state =  get_option('wc_remove-checkout-fields_Shipping_state');
       $rcf_shipping_postcode =  get_option('wc_remove-checkout-fields_Shipping_postcode');

       //Get option for Order Notes 
       $rcf_order_notes =  get_option('wc_remove-checkout-fields_order_notes');
        
       //Remove Billing Fields if options enabled
         if( $rcf_billing_fname == 'yes' ){
  
            unset($fields['billing']['billing_first_name']);
        
         }

         if( $rcf_billing_lname == 'yes' ){

            unset($fields['billing']['billing_last_name']);

         }   

         if( $rcf_billing_phone == 'yes' ){

            unset($fields['billing']['billing_phone']);

         }

         if( $rcf_billing_company == 'yes' ){

            unset($fields['billing']['billing_company']);

         }

         if( $rcf_billing_country == 'yes' ){

            unset($fields['billing']['billing_country']);

         }

         if( $rcf_billing_address2 == 'yes' ){

            unset($fields['billing']['billing_address_2']);

         }

         if(( $rcf_billing_address == 'yes' ) && ( $rcf_billing_address2 == 'yes' )){

            unset($fields['billing']['billing_address_1']);

         }

         if(( $rcf_billing_address == 'yes' ) && ( $rcf_billing_address2 == 'no' )){

            unset($fields['billing']['billing_address_1']);
            unset($fields['billing']['billing_address_2']);

         }

         if( $rcf_billing_city == 'yes' ){

            unset($fields['billing']['billing_city']);

         }

         if( $rcf_billing_state  == 'yes' ){

            unset($fields['billing']['billing_state']);

         }

         if( $rcf_billing_postcode == 'yes' ){

            unset($fields['billing']['billing_postcode']);

         }



         //Remove Shipping Fields if options enabled

         if( $rcf_shipping_fname == 'yes' ){
  
            unset($fields['shipping']['shipping_first_name']);
        
         }

         if( $rcf_shipping_lname == 'yes' ){

            unset($fields['shipping']['shipping_last_name']);

         }   

         if( $rcf_shipping_phone == 'yes' ){

            unset($fields['shipping']['shipping_phone']);

         }

         if( $rcf_shipping_company == 'yes' ){

            unset($fields['shipping']['shipping_company']);

         }

         if( $rcf_shipping_country == 'yes' ){

            unset($fields['shipping']['shipping_country']);

         }

         if( $rcf_shipping_address2 == 'yes' ){

            unset($fields['shipping']['shipping_address_2']);

         }

         if(( $rcf_shipping_address == 'yes' ) && ( $rcf_shipping_address2 == 'yes' )){

            unset($fields['shipping']['shipping_address_1']);

         }

         if(( $rcf_shipping_address == 'yes' ) && ( $rcf_shipping_address2 == 'no' )){

            unset($fields['shipping']['shipping_address_1']);
            unset($fields['shipping']['shipping_address_2']);

         }

         if( $rcf_shipping_city == 'yes' ){

            unset($fields['shipping']['shipping_city']);

         }

         if( $rcf_shipping_state  == 'yes' ){

            unset($fields['shipping']['shipping_state']);

         }

         if( $rcf_shipping_postcode == 'yes' ){

            unset($fields['shipping']['shipping_postcode']);

         }

         //Remove Order Notes Box if option enabled

         if( $rcf_order_notes == 'yes' ){

            add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

         }
      
         return $fields;
    }    