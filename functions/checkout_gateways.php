

<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}




if ( ! function_exists( 'preSelectors_gateway_payment' ) ) {

    function preSelectors_gateway_payment() {
        // ob_start();

        ?>
        <div class="sbn_payment_gateways_preselectors">
                <div class="selectorsElements">

                    <ul class="gatewayLists">

                        <li class="gatewayElement paypal active">

                            <button onclick="setpaymentgateway(this)" gateway="paypal" type="button" class="sbn_buttonCustom sbn_selectable_check_Button paypal">

                            <div class="selectorInner">

                                <div class="icon">
                                    <?php
                                     $x = content_url() . '/plugins/sebenas-addons/resources/assets/images/icons/payments/payment-512x512-51306.png';
                                    ?>
                                    <img src="<?php echo $x; ?>" alt="Sebenasmart paypal payment method" class="iconSmall">
                                </div>

                            </div>

                            <div class="infoGateway">

                                <h5>
                                    Pay with paypal
                                </h5>
                                <small>
                                    The faster, safer way to pay
                                </small>

                            </div>

                            <div class="customCheckBox">
                                <label class="checkboxCustom path">
                                    <input
                                        type="checkbox" checked>
                                    <svg viewBox="0 0 21 21">
                                        <path
                                            d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186">
                                        </path>
                                    </svg>
                                </label>
                            </div>

                            </button>

                        </li>

                        <li class="gatewayElement stripe">
                            <button onclick="setpaymentgateway(this)" gateway="stripe"  type="button" class="sbn_buttonCustom sbn_selectable_check_Button stripe">

                            <div class="selectorInner">

                                <div class="icon">
                                    <?php
                                     $x = content_url() . '/plugins/sebenas-addons/resources/assets/images/icons/payments/payment-512x512-51317.png';
                                    ?>
                                    <img src="<?php echo $x; ?>" alt="Sebenasmart stripe payment method" class="iconSmall">
                                </div>

                            </div>

                            <div class="infoGateway">

                                <h5>
                                    Credit or debit card
                                </h5>
                                <small>
                                The best and safest way <br class="mobileSmallElement"> <br class="desktopElement"> to pay online
                                </small>

                            </div>

                            <div class="customCheckBox">
                                <label class="checkboxCustom path">
                                    <input
                                        type="checkbox">
                                    <svg viewBox="0 0 21 21">
                                        <path
                                            d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186">
                                        </path>
                                    </svg>
                                </label>
                            </div>

                            </button>

                        </li>

                    </ul>

                </div>
        </div>

        <script>




        </script>

        <?php

        // return ob_get_clean();
    }
}

add_action( 'woocommerce_checkout_pre_payment_methods', 'preSelectors_gateway_payment');



// add_filter( 'woocommerce_gateway_icon', 'sort_stripe_payment_icons', 10, 2 );
// function sort_stripe_payment_icons( $icons_str, $payment_id ) {

// }




/*

        add_filter( 'woocommerce_gateway_icon', 'sort_stripe_payment_icons', 10, 2 );
        function sort_stripe_payment_icons( $icons_str, $payment_id ) {

            $icons_str = null;
            ob_start();
            if ( $payment_id === 'ppcp-gateway' && is_checkout() ) {
                // paypal

                // $icons_str = 'paypal';


                $x = content_url() . '/plugins/sebenas-addons/resources/assets/images/icons/payments/payment-256x256-51306.png'
                ?>
                    <div class="payment_gateway_singleIcon">
                        <img src="<?php echo $x; ?>" alt="Sebenasmart paypal payment method" class="iconSmall">
                    </div>
                <?php


            }

            if ( $payment_id === 'stripe' && is_checkout() ) {
                // stripe


                // if ( 'USD' === get_woocommerce_currency() ) {
                //     $icons_str .= isset( $icons['discover'] ) ? $icons['discover'] : '';
                //     // $icons_str .= isset( $icons['jcb'] ) ? $icons['jcb'] : '';
                //     // $icons_str .= isset( $icons['diners'] ) ? $icons['diners'] : '';
                // }

                // $icons_str = 'AAAA';

                $x = content_url() . '/plugins/sebenas-addons/resources/assets/images/icons/payments/payment-256x256-51317.png'
                ?>
                    <div class="payment_gateway_singleIcon">
                        <img src="<?php echo $x; ?>" alt="Sebenasmart stripe payment method" class="iconSmall" >
                    </div>
                <?php

            }
            // return $icons_str;
            // return $payment_id;

            return ob_get_clean();
        }

*/


?>