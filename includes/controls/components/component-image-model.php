

<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if (!class_exists('sebenas_image_component')) {
    class sebenas_image_component
    {
        public function setControls($class, $slug, $conditional = null)
        {
            $class->add_control(
                'image_info' . $slug,
                [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Choose Image', 'Sebenas_Addons'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
            );

            $class->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                'name'      => 'image_info' . $slug,
                'default'   => 'full',
                'separator' => 'none',
            ]
            );
        }
    }
}

 ?>