<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;


if ( ! function_exists( 'sebenas_controls_InfoCta_model' ) ) {

	function sebenas_controls_InfoCta_model( $class ) {

		$class->start_controls_section(
			'Image_section_info',
			[
				'label' => esc_html__( 'Image', 'Sebenas_Addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		sebenas_image_component( $class, 'info_image_1' );

		$class->end_controls_section();

        $class->start_controls_section(
			'section_info_title',
			[
				'label' => esc_html__( 'Title info section', 'Sebenas_Addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $class->add_control(
            'enable_info_title',
            [
                'label' => esc_html__( 'Enable title text', 'Sebenas_Addons' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

		$class->add_control(
			'title_text',
			[
				'type' => Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'Sebenas_Addons' ),
				'placeholder' => esc_html__( 'Enter your title', 'Sebenas_Addons' ),
				'condition' => [
                    'enable_info_title' => 'yes',
                ],
			]
		);


		$class->end_controls_section();

        $class->start_controls_section(
			'section_info_text',
			[
				'label' => esc_html__( 'Text info section', 'Sebenas_Addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $class->add_control(
            'enable_info_text',
            [
                'label' => esc_html__( 'Enable Description text', 'Sebenas_Addons' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

		$class->add_control(
			'info_text',
			[
				'label' => esc_html__( 'Description text', 'Sebenas_Addons' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default text', 'Sebenas_Addons' ),
				'placeholder' => esc_html__( 'Type your text here', 'Sebenas_Addons' ),
                'condition' => [
                    'enable_info_text' => 'yes',
                ],

			]
		);

		$class->end_controls_section();

        $class->start_controls_section(
			'section_info_cta',
			[
				'label' => esc_html__( 'CTA info section', 'Sebenas_Addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $class->add_control(
            'enable_info_cta',
            [
                'label' => esc_html__( 'Enable CTA', 'Sebenas_Addons' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

		sebenas_control_cta_model( $class, 'info_CTA', 'enable_info_cta' );

		$class->end_controls_section();

    }

}

?>