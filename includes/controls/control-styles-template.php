<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if (!class_exists('sebenas_control_styles')) {
    class sebenas_control_styles
    {
        public function setControls($class)
        {
            $class->start_controls_section(
                'section_background_type',
                [
                'label' => esc_html__('Background type section', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $class->add_control(
                'special_background_type',
                [
                'label' => esc_html__('Background type', 'Sebenas_Addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'sbn_default_styles' => 'SBN Styles',
                    // 'special_background_image' => 'Background image',
                    // 'special_background_color' => 'Background color',
                    // 'special_background_gradient' => 'Background gradient',
                ],
                'default' => 'sbn_default_styles',
            ]
            );

            $class->add_control(
                'background_image',
                [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Choose Image', 'Sebenas_Addons'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'enable_special_background' => 'yes',
                    'special_background_type' => 'special_background_image',
                ],
            ]
            );

            $class->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                'name' => 'background_image',
                'default' => 'full',
                'separator' => 'none',
                'condition' => [
                    'enable_special_background' => 'yes',
                    'special_background_type' => 'special_background_image',
                ],
            ]
            );

            $class->end_controls_section();

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
                'label' => esc_html__('Component Style', 'Sebenas_Addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'white_component_style' => 'White style',
                    'grey_component_style' => 'Grey style',
                    'black_component_style' => 'Black style',
                    'green_component_style' => 'Green style',
                    'yellow_component_style' => 'Yellow style',
                    'primary_component_style' => 'Primary style',
                ],
                'default' => 'white_component_style',
                'condition' => [
                    'special_background_type' => 'sbn_default_styles',
                ],
            ]
            );

            $class->end_controls_section();
        }

        public function set_background_style($settings)
        {
            $pre_styleContainer = null;
            if (isset($settings['component_styles']) && $settings['component_styles'] == 'white_component_style') {
                $pre_styleContainer = 'whiteBackground_Style';
            }
            if (isset($settings['component_styles']) && $settings['component_styles'] == 'grey_component_style') {
                $pre_styleContainer = 'greyBackground_Style';
            }
            if (isset($settings['component_styles']) && $settings['component_styles'] == 'black_component_style') {
                $pre_styleContainer = 'blackBackground_Style';
            }
            if (isset($settings['component_styles']) && $settings['component_styles'] == 'primary_component_style') {
                $pre_styleContainer = 'primaryBackground_Style';
            }
            if (isset($settings['component_styles']) && $settings['component_styles'] == 'green_component_style') {
                $pre_styleContainer = 'greenBackground_Style';
            }
            if (isset($settings['component_styles']) && $settings['component_styles'] == 'yellow_component_style') {
                $pre_styleContainer = 'yellowBackground_Style';
            }

            return $pre_styleContainer;
        }
    }
}

 ?>
