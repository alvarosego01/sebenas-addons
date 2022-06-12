

<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! function_exists( 'sebenas_register_controls_template' ) ) {
	function sebenas_register_controls_template(  ) {

		// components generales
		require_once SEBENAS_PATH . 'includes/controls/components/components_main.php';

		// Importaciones
		require_once SEBENAS_PATH . 'includes/controls/controls-info-cta-model.php';

	}

}

 ?>