

<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if (!class_exists('sebenas_image_component')) {
    class sebenas_image_component
    {
        public function setControls($class, $slug = null, $conditional = null)
        {
            $class->add_control(
                'image_info'.$slug,
                [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Choose Image', 'Sebenas_Addons'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
            );

            $class->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                'name' => 'image_info'.$slug,
                'default' => 'full',
                'separator' => 'none',
            ]
            );

            $class->add_control(
                'enable_image_box_shadow'.$slug,
                [
                'label' => esc_html__('Enable box shadow', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                ]
            );

            $class->add_control(
                'enable_image_circle_style'.$slug,
                [
                    'label' => esc_html__('Enable circle style', 'Sebenas_Addons'),
                    'type' => Controls_Manager::SWITCHER,
                ]
            );
        }

        public function setImageContain($imageSettings = null, $slug = null)
        {
            if (isset($imageSettings) && $imageSettings != null) {
                $image_info = $imageSettings['image_info'.$slug];

                if (isset($image_info) && $image_info != null) {
                    $imageSrc = isset($image_info) ? $image_info['url'] : '';
                    $imageAlt = get_post_meta($image_info['id'], '_wp_attachment_image_alt', true);
                    $imageDesc = wp_get_attachment_caption($image_info['id']);

                    $imageStyle = null;

                    if (isset($imageSettings) && $imageSettings['enable_image_box_shadow'.$slug] == 'yes') {
                        $imageStyle = $imageStyle.' shadow2';
                    }

                    if (isset($imageSettings) && $imageSettings['enable_image_circle_style'.$slug] == 'yes') {
                        $imageStyle = $imageStyle.' circleBox';
                    } ?>
                    <div class="containerImage lightbox containImageHover <?php echo $imageStyle; ?>">
                        <a href="<?php echo $imageSrc; ?>" data-lightbox="roadtrip" data-alt="<?php echo $imageAlt; ?>" data-title="<?php echo $imageDesc; ?>">
                            <img  src="<?php echo $imageSrc; ?>" alt="<?php echo $imageAlt; ?>" loading="lazy">
                        </a>
                    </div>

                <?php
                }
            }
        }
    }
}

 ?>