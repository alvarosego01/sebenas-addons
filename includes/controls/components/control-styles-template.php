
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


use Elementor\Controls_Manager;
use Elementor\Base_Data_Control;
use Elementor\Utils;

if (!class_exists('sebenas_control_styles')) {
    class sebenas_control_styles
    {
        public function setControls($class)
        {
            $class->start_controls_section(
                'sebenas_component_styles',
                [
                'label' => esc_html__('Component defined styles', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $class->add_control(
                'sebenas_component_defined_styles',
                [
                'label'   => esc_html__('Component Style', 'Sebenas_Addons'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'white_component_style' => 'White style',
                    'grey_component_style' => 'Grey style',
                    'black_component_style' => 'Black style',
                    'primary_component_style' => 'Primary style',
                ],
                'default' => 'white_component_style',

            ]
            );

            $class->end_controls_section();
        }
    }
}


 ?>
