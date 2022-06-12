


<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Utils;


if ( ! function_exists( 'sebenas_control_cta_model' ) ) {

	function sebenas_control_cta_model( $class, $slug ,$conditional ) {


		$class->add_control(
            'enable_icon_cta' . $slug,
            [
                'label' => esc_html__( 'Enable icon CTA', 'Sebenas_Addons' ),
                'type' => Controls_Manager::SWITCHER,
				'condition' => [
                    $conditional => 'yes',
                ],
            ]
        );

		$class->add_control(
			'icon_type_cta' . $slug,
			[
				'label'   => esc_html__( 'Icon Type', 'Sebenas_Addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'icons'        => esc_html__( 'Old Icons', 'Sebenas_Addons' ),
					'custom_icons' => esc_html__( 'New Icon', 'Sebenas_Addons' ),
				],
				'default' => 'custom_icons',
				'toggle'  => false,
				'condition' => [
                    $conditional => 'yes',
					'enable_icon_cta' . $slug => 'yes',
                ],

			]
		);

		$class->add_control(
			'icon_cta' . $slug,
			[
				'label'     => esc_html__( 'Icon', 'Sebenas_Addons' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fa fa-star',
				'condition' => [
					'icon_type' . $slug => 'icons',
					$conditional => 'yes',
					'enable_icon_cta' . $slug => 'yes',
				],
			]
		);

		$class->add_control(
			'custom_icon_cta' . $slug,
			[
				'label'            => esc_html__( 'Icon', 'Sebenas_Addons' ),
				'type'             => Controls_Manager::ICONS,
				'default'          => [
					'value'   => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition'        => [
					'icon_type' . $slug => 'custom_icons',
					$conditional => 'yes',
					'enable_icon_cta' . $slug => 'yes',
				],
			]
		);

		$class->add_control(
			'icon_side_cta' . $slug,
			[
				'label'   => esc_html__( 'Icon position', 'Sebenas_Addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'left_side' => 'Left',
					'right_side' => 'Right',
				],
				'default' => 'left_side',
				'condition' => [
                    $conditional => 'yes',
					'enable_icon_cta' . $slug => 'yes',
                ],

			]
		);


		$class->add_control(
			'text_cta' . $slug,
			[
				'type' => Controls_Manager::TEXT,
				'label' => esc_html__( 'Text CTA', 'Sebenas_Addons' ),
				'placeholder' => esc_html__( 'Enter your text CTA', 'Sebenas_Addons' ),
				'condition' => [
                    $conditional => 'yes',
                ],
			]
		);


		$class->add_control(
			'cta_action_click' . $slug,
			[
				'label'   => esc_html__( 'CTA action click', 'Sebenas_Addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'external_url'        => 'External url',
					'special_action'        => 'Special action'
				],
				'default' => 'external_url',
				// 'toggle'  => false,
				'condition' => [
                    $conditional => 'yes',
                ],

			]
		);

		$class->add_control(
			'cta_special_action' . $slug,
			[
				'label'   => esc_html__( 'CTA special action click', 'Sebenas_Addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'add_cart_current_product' => 'Add to cart current product',
					'open_popup'        => 'Open popup',
				],
				'default' => 'add_cart_current_product',
				// 'toggle'  => false,
				'condition' => [
					$conditional => 'yes',
                    'cta_action_click' . $slug => 'special_action',
                ],

			]
		);

		$class->add_control(
			'link_cta' . $slug,
			[
				'label'         => esc_html__( 'Link url', 'Sebenas_Addons' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'Sebenas_Addons' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				],
				'condition' => [
					$conditional => 'yes',
                    'cta_action_click' . $slug => 'external_url',
                ],
			]
		);



    }

}

?>