<?php
// namespace SebenasAddonsWidgets;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

require_once SEBENAS_PATH.'includes/functions/main.php';
require_once SEBENAS_PATH.'/includes/controls/controls_main.php';

if (!class_exists('C_ImageTextCtaSide_T1')) {
    /**
     * Elementor oEmbed Widget.
     *
     * Elementor widget that inserts an embbedable content into the page, from any given URL.
     *
     * @since 1.0.0
     */
    class C_ImageTextCtaSide_T1 extends Widget_Base
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
            return 'C_ImageTextCtaSide_T1';
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
            return esc_html__('Image text cta side 1', 'sbn_e_ImageTextCtaSide_T1');
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
            return ['sebenas', 'info', 'modules', 'url', 'link'];
        }

        protected function register_controls()
        {
            $sebenas_control_styles = new sebenas_control_styles();
            $sebenas_control_styles->setControls($this);

            $sebenas_title_text_row1 = new sebenas_title_text_row1();
            $sebenas_title_text_row1->setControls($this);

            $sebenas_controls_InfoCta_model = new sebenas_controls_InfoCta_model();
            $sebenas_controls_InfoCta_model->setControls($this);

            $this->start_controls_section(
                'side_position_section',
                [
                'label' => esc_html__('Component position side', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $this->add_control(
                'side_position_define',
                [
                'label' => esc_html__('Component position', 'Sebenas_Addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'left_side_component' => 'Left',
                    'right_side_component' => 'Right',
                ],
                'default' => 'left_side_component',
            ]
            );

            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            $F_textFormating = new F_textFormating();
            $sebenas_control_cta_model = new sebenas_control_cta_model();
            $sebenas_image_component = new sebenas_image_component();

            $sebenas_control_styles = new sebenas_control_styles();

            $sebenas_title_text_row1 = new sebenas_title_text_row1();

            $general_settings = [
                'side_position_define' => $settings['side_position_define'],
                'component_styles' => $settings['sebenas_component_defined_styles'],
            ];

            $settings_row1 = [
                'enable_section_row_1' => $settings['enable_section_row_1'],
                'enable_title_section_row_1' => $settings['enable_title_section_row_1'],
                'title_text_section_row_1' => $F_textFormating->setFormatingText($settings['title_text_section_row_1']),
                'enable_info_text_section_row_1' => $settings['enable_info_text_section_row_1'],
                'info_text_section_row_1' => $F_textFormating->setFormatingText($settings['info_text_section_row_1']),
            ];

            $slug = '_info_image_1';
            $settings_image = [
                'image_info' => $settings['image_info'.$slug],
                'enable_image_box_shadow' => $settings['enable_image_box_shadow'.$slug],
                'enable_image_box_shadow' => $settings['enable_image_box_shadow'.$slug],
                'enable_image_circle_style' => $settings['enable_image_circle_style'.$slug],
            ];

            $settings_title = [
                'enable_info_title' => $settings['enable_info_title'],
                'title_text' => $F_textFormating->setFormatingText($settings['title_text']),
            ];

            $settings_text = [
                'enable_info_text' => $settings['enable_info_text'],
                'info_text' => $F_textFormating->setFormatingText($settings['info_text']),
            ];

            $slug = '_info_CTA';
            $settings_CTA = [
                'enable_info_cta' => $settings['enable_info_cta'],
                'enable_icon_cta' => $settings['enable_icon_cta'.$slug],
                'icon_type_cta' => $settings['icon_type_cta'.$slug],
                'icon_cta' => $settings['icon_cta'.$slug],
                'custom_icon_cta' => $settings['custom_icon_cta'.$slug],
                'icon_side_cta' => $settings['icon_side_cta'.$slug],
                'text_cta' => $settings['text_cta'.$slug],
                'cta_action_click' => $settings['cta_action_click'.$slug],
                'cta_special_action' => $settings['cta_special_action'.$slug],
                'link_cta' => $settings['link_cta'.$slug],
                'cta_style' => $settings['cta_style'.$slug],
            ];

            $pre_styleContainer = null;
            $pre_styleContainer = $sebenas_control_styles->set_background_style($general_settings); ?>

        <section class="sbn_ComponentCustom parentElement elementorCustom C_ImageTextCtaSide_T1 <?php echo $pre_styleContainer; ?>">

			<div class="section-row">


                <?php
                    $sebenas_title_text_row1->set_row1_section($settings_row1); ?>

				<section class="innerSectionElement sct2">
                    <?php
                    if (isset($general_settings['side_position_define']) && $general_settings['side_position_define'] == 'right_side_component') {
                        ?>
					<div class="groupElements row rightSide">
						<div class="col-md-12 col-lg-6 partContainer info">
                            <div class="containElements">
                        <?php
                        if (isset($settings_title) && $settings_title['enable_info_title'] == 'yes') {
                            $space_class = null;
                            if (isset($settings_text) && $settings_text['enable_info_text'] == 'yes') {
                                $space_class = 'mb25';
                            } ?>

                                <h3 class="secondaryTitle <?php echo $space_class; ?>">
                                    <?php echo isset($settings_title['title_text']) ? $settings_title['title_text'] : ''; ?>
                                </h3>
                                <?php
                        } ?>

                        <?php
                        if (isset($settings_text) && $settings_text['enable_info_text'] == 'yes') {
                            ?>
                                <div class="text">
                                    <?php echo isset($settings_text['info_text']) ? $settings_text['info_text'] : ''; ?>
                                </div>
                                <?php
                        } ?>

                        <?php

                            $sebenas_control_cta_model->setCTA($settings_CTA); ?>
                            </div>

						</div>
						<div class="col-md-12 col-lg-6 partContainer image">

                                <?php
                                   $sebenas_image_component->setImageContain($settings_image); ?>
						</div>

					</div>

                <?php
                    } ?>
                    <?php
                    if (isset($general_settings['side_position_define']) && $general_settings['side_position_define'] == 'left_side_component') {
                        ?>
					<div class="groupElements row leftSide">

                        <div class="col-md-12 col-lg-6 partContainer image">
                                <?php
                                   $sebenas_image_component->setImageContain($settings_image); ?>

						</div>


                        <div class="col-md-12 col-lg-6 partContainer info">
                            <div class="containElements">
                        <?php

                        if (isset($settings_title) && $settings_title['enable_info_title'] == 'yes') {
                            $space_class = null;
                            if (isset($settings_text) && $settings_text['enable_info_text'] == 'yes') {
                                $space_class = 'mb25';
                            } ?>

                                <h3 class="secondaryTitle <?php echo $space_class; ?>">
                                    <?php echo isset($settings_title['title_text']) ? $settings_title['title_text'] : ''; ?>
                                </h3>

                        <?php
                        } ?>

                        <?php
                        if (isset($settings_text) && $settings_text['enable_info_text'] == 'yes') {
                            ?>
                                <div class="text">
                                    <?php echo isset($settings_text['info_text']) ? $settings_text['info_text'] : ''; ?>
                                </div>
                                <?php
                        } ?>

                        <?php

                                $sebenas_control_cta_model->setCTA($settings_CTA); ?>

                                </div>
                        </div>

					</div>

                    <?php
                    } ?>


                    </section>

                </div>
                </section>
            <?php
        }
    }
}
