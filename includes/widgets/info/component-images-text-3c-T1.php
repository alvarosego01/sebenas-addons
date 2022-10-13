

<?php

// namespace SebenasAddonsWidgets;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

require_once SEBENAS_PATH.'includes/controls/controls_main.php';
require_once SEBENAS_PATH.'includes/functions/main.php';

if (!class_exists('C_images_text_3c_T1')) {
    class C_images_text_3c_T1 extends Widget_Base
    {
        /**
         * Get widget name.
         *
         * Retrieve oEmbed widget name.
         *
         * @since 1.0.0
         *
         * @return string widget name
         */
        public function get_name()
        {
            return 'C_ImageText3c_T1';
        }

        /**
         * Get widget title.
         *
         * Retrieve oEmbed widget title.
         *
         * @since 1.0.0
         *
         * @return string widget title
         */
        public function get_title()
        {
            return esc_html__('Images text 3c 1', 'sbn_e_ImageTextCtaSide_T1');
        }

        /**
         * Get widget icon.
         *
         * Retrieve oEmbed widget icon.
         *
         * @since 1.0.0
         *
         * @return string widget icon
         */
        public function get_icon()
        {
            return 'eicon-code';
        }

        /**
         * Get custom help URL.
         *
         * Retrieve a URL where the user can get more information about the widget.
         *
         * @since 1.0.0
         *
         * @return string widget help URL
         */
        public function get_custom_help_url()
        {
            return 'https://developers.elementor.com/docs/widgets/';
        }

        /**
         * Get widget categories.
         *
         * Retrieve the list of categories the oEmbed widget belongs to.
         *
         * @since 1.0.0
         *
         * @return array widget categories
         */
        public function get_categories()
        {
            return ['sebenas_widgets_modules', 'sebenas_widgets_modules_info'];
        }

        /**
         * Get widget keywords.
         *
         * Retrieve the list of keywords the oEmbed widget belongs to.
         *
         * @since 1.0.0
         *
         * @return array widget keywords
         */
        public function get_keywords()
        {
            return ['sebenas', 'info', 'modules', 'principal', 'images'];
        }

        protected function register_controls()
        {
            $sebenas_control_styles = new sebenas_control_styles();
            $sebenas_control_styles->setControls($this);

            $sebenas_title_text_row1 = new sebenas_title_text_row1();
            $sebenas_title_text_row1->setControls($this);

            $sebenas_image_component = new sebenas_image_component();

            $this->start_controls_section(
                'column_section_1',
                [
                'label' => esc_html__('Column section 1', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $this->add_control(
                'enable_info_title_1c',
                [
                'label' => esc_html__('Enable title column 1', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                ]
            );

            $this->add_control(
                'title_text_1c',
                [
                    'type' => Controls_Manager::TEXT,
                    'label' => esc_html__('Title', 'Sebenas_Addons'),
                    'placeholder' => esc_html__('Enter your title', 'Sebenas_Addons'),
                    'default' => 'Lorem ipsum dolor sit amet co',
                    'label_block' => true,
                    'description' => esc_html__('Use {{p text p}} for add primary color', 'Sebenas_Addons'),
                    'condition' => [
                        'enable_info_title_1c' => 'yes',
                    ],
            ]
            );

            $sebenas_image_component->setControls($this, '_1c_image');

            $this->end_controls_section();

            $this->start_controls_section(
                'column_section_2',
                [
                'label' => esc_html__('Column section 2', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );
            $sebenas_image_component->setControls($this, '_2c_image');

            $this->add_control(
                'enable_info_text_2c',
                [
                'label' => esc_html__('Enable Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
            ]
            );

            $this->add_control(
                'info_text_2c',
                [
                'label' => esc_html__('Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Default text', 'Sebenas_Addons'),
                'placeholder' => esc_html__('Type your text here', 'Sebenas_Addons'),
                'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus animi quasi cum repellat atque?',
                'description' => esc_html__('Use {{p text p}} for add primary color', 'Sebenas_Addons'),
                'condition' => [
                    'enable_info_text_2c' => 'yes',
                ],
            ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'column_section_3',
                [
                'label' => esc_html__('Column section 3', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $this->add_control(
                'enable_info_text_3c',
                [
                'label' => esc_html__('Enable Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
            ]
            );

            $this->add_control(
                'info_text_3c',
                [
                'label' => esc_html__('Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Default text', 'Sebenas_Addons'),
                'placeholder' => esc_html__('Type your text here', 'Sebenas_Addons'),
                'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus animi quasi cum repellat atque?',
                'description' => esc_html__('Use {{p text p}} for add primary color', 'Sebenas_Addons'),
                'condition' => [
                    'enable_info_text_3c' => 'yes',
                ],
            ]
            );

            $sebenas_image_component->setControls($this, '_3c_image');

            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();
            $sebenas_title_text_row1 = new sebenas_title_text_row1();

            $sebenas_image_component = new sebenas_image_component();
            $F_textFormating = new F_textFormating();
            $sebenas_control_styles = new sebenas_control_styles();

            $general_settings = [
                'component_styles' => $settings['sebenas_component_defined_styles'],
            ];

            $settings_row1 = [
                'enable_section_row_1' => $settings['enable_section_row_1'],
                'enable_title_section_row_1' => $settings['enable_title_section_row_1'],
                'title_text_section_row_1' => $F_textFormating->setFormatingText($settings['title_text_section_row_1']),
                'enable_info_text_section_row_1' => $settings['enable_info_text_section_row_1'],
                'info_text_section_row_1' => $F_textFormating->setFormatingText($settings['info_text_section_row_1']),
            ];

            $slug = '_1c_image';
            $settings_c1 = [
                'enable_info_title_1c' => $settings['enable_info_title_1c'],
                'title_text_1c' => $F_textFormating->setFormatingText($settings['title_text_1c']),
            ];

            $settings_image1 = [
                'image_info' => $settings['image_info'.$slug],
                'enable_image_box_shadow' => $settings['enable_image_box_shadow'.$slug],
                'enable_image_box_shadow' => $settings['enable_image_box_shadow'.$slug],
                'enable_image_circle_style' => $settings['enable_image_circle_style'.$slug],
            ];

            $slug = '_2c_image';
            $settings_c2 = [
                'enable_info_text_2c' => $settings['enable_info_text_2c'],
                'info_text_2c' => $F_textFormating->setFormatingText($settings['info_text_2c']),
            ];

            $settings_image2 = [
                'image_info' => $settings['image_info'.$slug],
                'enable_image_box_shadow' => $settings['enable_image_box_shadow'.$slug],
                'enable_image_box_shadow' => $settings['enable_image_box_shadow'.$slug],
                'enable_image_circle_style' => $settings['enable_image_circle_style'.$slug],
            ];

            $slug = '_3c_image';
            $settings_c3 = [
                'enable_info_text_3c' => $settings['enable_info_text_3c'],
                'info_text_3c' => $F_textFormating->setFormatingText($settings['info_text_3c']),
            ];

            $settings_image3 = [
                'image_info' => $settings['image_info'.$slug],
                'enable_image_box_shadow' => $settings['enable_image_box_shadow'.$slug],
                'enable_image_box_shadow' => $settings['enable_image_box_shadow'.$slug],
                'enable_image_circle_style' => $settings['enable_image_circle_style'.$slug],
            ];

            $pre_styleContainer = null;
            $pre_styleContainer = $sebenas_control_styles->set_background_style($general_settings); ?>

        <section class="sbn_ComponentCustom parentElement elementorCustom C_images_text_3c_T1 <?php echo $pre_styleContainer; ?>">
            <div class="section-row">

            <?php
                    $sebenas_title_text_row1->set_row1_section($settings_row1); ?>


        <section class="innerSectionElement sct2">
            <div class="groupElements row">
                <div class="col-md-12 col-lg-4 partContainer element_c1">
                    <div class="containElements">

                    <?php
                    if (isset($settings_c1) && $settings_c1['enable_info_title_1c'] == 'yes') {
                        ?>
                        <h3 class="secondaryTitle">
                            <?php echo isset($settings_c1['title_text_1c']) ? $settings_c1['title_text_1c'] : ''; ?>
                        </h3>
                        <?php
                    } ?>

                        <?php
                            $sebenas_image_component->setImageContain($settings_image1); ?>

                    </div>
                </div>
                <div class="col-md-12 col-lg-4 partContainer element_c2">
                    <div class="containElements">

                        <?php
                            $sebenas_image_component->setImageContain($settings_image2); ?>

                        <?php
                if (isset($settings_c2) && $settings_c2['enable_info_text_2c'] == 'yes') {
                    ?>
                        <div class="text">
                            <?php echo isset($settings_c2['info_text_2c']) ? $settings_c2['info_text_2c'] : ''; ?>
                        </div>
                        <?php
                } ?>

                    </div>
                </div>
                <div class="col-md-12 col-lg-4 partContainer element_c3">
                    <div class="containElements">

                    <?php
                if (isset($settings_c3) && $settings_c3['enable_info_text_3c'] == 'yes') {
                    ?>
                        <div class="text">
                            <?php echo isset($settings_c3['info_text_3c']) ? $settings_c3['info_text_3c'] : ''; ?>
                        </div>
                        <?php
                } ?>

                    <?php
                       $sebenas_image_component->setImageContain($settings_image3); ?>

                    </div>
                </div>
            </div>

                </section>
            </div>
        </section>

        <?php
        }
    }
}
         ?>