

<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if (!class_exists('sebenas_background_style_component')) {
    class sebenas_background_style_component
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
                'enable_special_background',
                [
                'label' => esc_html__('Enable special background', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                ]
            );


            $class->add_control(
                'special_background_type',
                [
                'label'   => esc_html__('Background type', 'Sebenas_Addons'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'special_background_image' => 'Background image',
                    // 'special_background_color' => 'Background color',
                    // 'special_background_gradient' => 'Background gradient',

                ],
                'default' => 'special_background_image',
                'condition' => [
                    'enable_special_background' => 'yes',
                ],

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
                'name'      => 'background_image',
                'default'   => 'full',
                'separator' => 'none',
                'condition' => [
                    'enable_special_background' => 'yes',
                    'special_background_type' => 'special_background_image',
                ],
            ]
            );



            $class->end_controls_section();

        }
    }
}

 ?>