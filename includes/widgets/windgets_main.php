

<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! function_exists( 'sebenas_register_widgets' ) ) {
	function sebenas_register_widgets( $widgets_manager ) {

		// Importaciones
		require_once SEBENAS_PATH . 'includes/widgets/oembed-widget.php';
		require_once SEBENAS_PATH . 'includes/widgets/info/component-image-text-cta-side-T1.php';

		// Declaraciones
        $widgets_manager->register( new \Elementor_oEmbed_Widget() );
        $widgets_manager->register( new \C_ImageTextCtaSide_T1() );



        // SI SON DE WOOCOMMERCE ENTONCES AQUI
		if ( class_exists( 'WC_Widget' ) ) {

			// require_once SEBENAS_PATH . '/inc/widgets/product-categories.php';



			// register_widget( 'Martfury_Widget_Product_Categories' );



		}
	}

}

?>