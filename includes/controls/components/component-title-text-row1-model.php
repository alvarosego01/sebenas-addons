

<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

if (!class_exists('sebenas_title_text_row1')) {
    class sebenas_title_text_row1
    {
        public function setControls($class)
        {
            $class->start_controls_section(
                'section_row_1',
                [
                'label' => esc_html__('Section row 1', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $class->add_control(
                'enable_section_row_1',
                [
                'label' => esc_html__('Enable section row 1', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                ]
            );

            $class->add_control(
                'enable_title_section_row_1',
                [
                'label' => esc_html__('Enable title section row 1', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                'condition' => [
                    'enable_section_row_1' => 'yes',
                ],
                ]
            );

            $class->add_control(
                'title_text_section_row_1',
                [
                    'type' => Controls_Manager::TEXT,
                    'label' => esc_html__('Title principal', 'Sebenas_Addons'),
                    'placeholder' => esc_html__('Enter your title', 'Sebenas_Addons'),
                    'default' => 'Lorem ipsum dolor sit amet co',
                    'label_block' => true,
                    'description' => esc_html__('Use {{p text p}} for add primary color', 'Sebenas_Addons'),
                    'condition' => [
                        'enable_section_row_1' => 'yes',
                        'enable_title_section_row_1' => 'yes',
                    ],
            ]
            );

            $class->add_control(
                'enable_info_text_section_row_1',
                [
                'label' => esc_html__('Enable text section row 1', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                'condition' => [
                    'enable_section_row_1' => 'yes',
                ],
                ]
            );

            $class->add_control(
                'info_text_section_row_1',
                [
                'label' => esc_html__('Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Default text', 'Sebenas_Addons'),
                'placeholder' => esc_html__('Type your text here', 'Sebenas_Addons'),
                'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus animi quasi cum repellat atque?',
                'description' => esc_html__('Use {{p text p}} for add primary color', 'Sebenas_Addons'),
                'condition' => [
                    'enable_info_text_section_row_1' => 'yes',
                ],
            ]
            );

            $class->end_controls_section();
        }

        public function set_row1_section($settings_row1)
        {
            if (isset($settings_row1) && $settings_row1['enable_section_row_1'] == 'yes') {
                $space_class = null;

                if (isset($settings_row1) && $settings_row1['enable_info_text_section_row_1'] == 'yes') {
                    $space_class = 'mb25';
                } ?>
            <section class="innerSectionElement sct1">
                <div class="containElements">

                    <?php
                if (isset($settings_row1) && $settings_row1['enable_title_section_row_1'] == 'yes') {
                    ?>
                        <h2 class="secondaryTitle <?php echo $space_class; ?>">
                            <?php echo isset($settings_row1['title_text_section_row_1']) ? $settings_row1['title_text_section_row_1'] : ''; ?>
                        </h2>
                        <?php
                } ?>

            <?php
                if (isset($settings_row1) && $settings_row1['enable_info_text_section_row_1'] == 'yes') {
                    ?>
                        <div class="text">
                            <?php echo isset($settings_row1['info_text_section_row_1']) ? $settings_row1['info_text_section_row_1'] : ''; ?>
                        </div>
                        <?php
                } ?>

                </div>

            </section>

    <?php
            }
        }
    }
}

 ?>