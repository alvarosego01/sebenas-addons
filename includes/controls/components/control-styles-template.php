



<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Utils;


if ( ! function_exists( 'sebenas_control_styles' ) ) {

	function sebenas_control_styles( $class ) {


		$class->start_controls_section(
			'sebenas_component_styles',
			[
				'label' => esc_html__( 'Component defined styles', 'Sebenas_Addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $class->add_control(
			'sebenas_component_defined_styles',
			[
				'label'   => esc_html__( 'Component Style', 'Sebenas_Addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'white_component_style' => 'White style',
					'grey_component_style' => 'Grey style',
					'black_component_style' => 'Black style',
				],
				'default' => 'white_component_style',

			]
		);

		$class->end_controls_section();


    }
}

