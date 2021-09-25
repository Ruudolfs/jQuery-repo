<?php

// Show/hide table row on the checkout page with jQuery
function action_wp_footer() {
    // Only on checkout
    if ( is_checkout() && ! is_wc_endpoint_url() ) :
    ?>
    <script type="text/javascript">
    jQuery( function($){
        // Selector
        var my_input = 'input[name=forwarding]';
        var my_class = '.cart-wcdpp-fields';
        
        // Show or hide
        function show_or_hide() {
            if ( $( my_input ).is(':checked') ) {
                return $( my_class ).show();
            } else {
                return $( my_class ).hide();               
            }           
        }
        
        // Default
        $( document ).ajaxComplete(function() {
            show_or_hide();
        });
        
        // On change
        $( 'form.checkout' ).change(function() {
            show_or_hide();
        });
    });
    </script>
    <?php
    endif;
}
add_action( 'wp_footer', 'action_wp_footer', 10, 0 );