

function setActiveGateway(type) {

    if( type == 'paypal' ){

        jQuery('ul.gatewayLists li.gatewayElement.paypal').addClass('active');

        jQuery('ul.gatewayLists li.gatewayElement.paypal input[type=checkbox]').attr('checked', true);

        jQuery('input#payment_method_ppcp-gateway').click();

    }

    if( type == 'stripe' ){

        jQuery('ul.gatewayLists li.gatewayElement.stripe').addClass('active');

        jQuery('ul.gatewayLists li.gatewayElement.stripe input[type=checkbox]').attr('checked', true);

        jQuery('input#payment_method_stripe').click();

    }

}

 function setpaymentgateway(e) {

    if (e) {

        var a = jQuery(e).attr('gateway');

        if( jQuery(e).parent().hasClass('active') ){

            return;
        }


        if( jQuery('.sbn_payment_gateways_preselectors .selectorsElements ul.gatewayLists li.gatewayElement').hasClass('active') ){

            jQuery('.sbn_payment_gateways_preselectors .selectorsElements ul.gatewayLists li.gatewayElement.active  input[type=checkbox]').attr('checked', false);

        }

        jQuery('.sbn_payment_gateways_preselectors .selectorsElements ul.gatewayLists li.gatewayElement').removeClass('active');

        // var l = jQuery('.sbn_payment_gateways_preselectors .selectorsElements ul.gatewayLists li.gatewayElement  input[type=checkbox]');


        setActiveGateway(a);

    }


}



jQuery(document).ready(function () {




});

