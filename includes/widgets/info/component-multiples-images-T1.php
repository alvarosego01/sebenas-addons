<?php

// namespace SebenasAddonsWidgets;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

require_once SEBENAS_PATH.'includes/functions/main.php';
require_once SEBENAS_PATH.'/includes/controls/controls_main.php';

if (!class_exists('C_MultiplesImages_T1')) {
    /**
     * Elementor oEmbed Widget.
     *
     * Elementor widget that inserts an embbedable content into the page, from any given URL.
     *
     * @since 1.0.0
     */
    class C_MultiplesImages_T1 extends Widget_Base
    {
        /**
         * Get widget name.
         *
         * Retrieve oEmbed widget name.
         *
         * @since 1.0.0
         *
         * @return string Widget name.
         */
        public function get_name()
        {
            return 'C_MultiplesImages_T1';
        }

        /**
         * Get widget title.
         *
         * Retrieve oEmbed widget title.
         *
         * @since 1.0.0
         *
         * @return string Widget title.
         */
        public function get_title()
        {
            return esc_html__('Component multi images', 'sbn_e_MultiplesImages_T1');
        }

        /**
         * Get widget icon.
         *
         * Retrieve oEmbed widget icon.
         *
         * @since 1.0.0
         *
         * @return string Widget icon.
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
         * @return string Widget help URL.
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
         * @return array Widget categories.
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
         * @return array Widget keywords.
         */
        public function get_keywords()
        {
            return ['sebenas', 'info', 'modules', 'url', 'link', 'images', 'files'];
        }

        protected function register_controls()
        {
            $sebenas_control_styles = new sebenas_control_styles();
            $sebenas_control_styles->setControls($this);

            $sebenas_title_text_row1 = new sebenas_title_text_row1();
            $sebenas_title_text_row1->setControls($this);

            $sebenas_image_component = new sebenas_image_component();

            $sebenas_controls_info_text_cta = new sebenas_controls_info_text_cta();

            $this->start_controls_section(
                'section_images_list',
                ['label' => esc_html__('Image list', 'Sebenas_Addons')]
            );

            $repeater = new Repeater();

            $repeater->add_control(
                'item_title', [
                    'label' => esc_html__('Title', 'Sebenas_Addons'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('This is the title', 'Sebenas_Addons'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'item_desc', [
                    'label' => esc_html__('Description', 'Sebenas_Addons'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('This is the description', 'Sebenas_Addons'),
                    'label_block' => true,
                ]
            );

            $sebenas_image_component->setControls($repeater);

            $repeater->add_control(
                'item_position',
                [
                'label' => esc_html__('Item position', 'Sebenas_Addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'item_position_top' => 'Top',
                    'item_position_bottom' => 'Bottom',
                ],
                'default' => 'item_position_top',
            ]
            );

            $repeater->add_control(
                'item_width',
                [
                'label' => esc_html__('Width PC item', 'Sebenas_Addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'item_width_1_1' => '1/1',
                    'item_width_1_2' => '1/2',
                    'item_width_1_3' => '1/3',
                    'item_width_1_4' => '1/4',
                ],
                'default' => 'item_width_1_1',
            ]
            );

            $this->add_control(
                'list_data',
                [
                    'label' => '',
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        // [
                        //     'icon' => 'icon-rocket',
                        //     'title' => esc_html__('Lorem ipsum dolor s', 'Sebenas_Addons'),
                        //     'desc' => esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus an', 'Sebenas_Addons'),
                        // ],
                    ],
                    // 'title_field'   => '{{{ title }}}',
                    'prevent_empty' => false,
                ]
            );

            $this->end_controls_section();

            $sebenas_controls_info_text_cta->setControls($this);
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();
            $sebenas_title_text_row1 = new sebenas_title_text_row1();
            $sebenas_control_styles = new sebenas_control_styles();

            $F_textFormating = new F_textFormating();

            $sebenas_control_cta_model = new sebenas_control_cta_model();

            $sebenas_image_component = new sebenas_image_component();

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

            $itemsList = $settings['list_data'];

            $itemColumns = null;

            $pre_styleContainer = null;
            $pre_styleContainer = $sebenas_control_styles->set_background_style($general_settings); ?>

        <section class="sbn_ComponentCustom parentElement elementorCustom C_MultiplesImages_T1 <?php echo $pre_styleContainer; ?>">

			<div class="section-row">

                <?php $sebenas_title_text_row1->set_row1_section($settings_row1); ?>

				<section class="innerSectionElement sct2">

                <div class="containElements">

                <?php if (isset($itemsList) && count($itemsList) > 0) { ?>



                    <div class="imagesList row">

                <?php foreach ($itemsList as $key => $value) {
                $position = $value['item_position'];
                $itemWidth = null;
                switch ($value['item_width']) {
                                case 'item_width_1_1':
                                    $itemWidth = 'col-md-12 col-lg-12';
                                    break;

                                case 'item_width_1_2':
                                    $itemWidth = 'col-md-12 col-lg-6';
                                    break;

                                case 'item_width_1_3':
                                    $itemWidth = 'col-md-12 col-lg-4';
                                    break;

                                case 'item_width_1_4':
                                    $itemWidth = 'col-md-12 col-lg-3';
                                    break;

                                default:
                                    // code...
                                    break;
                            } ?>



                            <div class="item <?php echo $itemWidth.' '.$position; ?>">

                                <?php if ($position == 'item_position_top') { ?>
                                        <div class="image">
                                            <?php
                                            $sebenas_image_component->setImageContain($value); ?>
                                        </div>
                                     <?php } ?>

                                     <?php
                                     if (
                                        (isset($value['item_title']) && $value['item_title'] != '') ||
                                        (isset($value['item_desc']) && $value['item_desc'] != '')
                                     ) {   ?>
                                <div class="info">
                                <?php if (isset($value['item_title'])) {
                                         ?>
                                    <h4 class="smallTitle">
                                        <?php echo isset($value['item_title']) ? $value['item_title'] : ''; ?>
                                    </h4>
                                   <?php
                                     } ?>
                                           <?php if (isset($value['item_desc'])) {
                                         ?>
                                    <p class="text">
                                        <?php echo isset($value['item_desc']) ? $value['item_desc'] : ''; ?>
                                    </p>

                                    <?php
                                     } ?>
                                </div>

                                <?php } ?>

                                <?php if ($position == 'item_position_bottom') { ?>
                                        <div class="image">
                                            <?php
                                            $sebenas_image_component->setImageContain($value); ?>
                                        </div>
                                     <?php } ?>

                            </div>

                        <?php
            } ?>

                    </div>
                    <?php } ?>

                    <?php
                     if (isset($settings_CTA) && $settings_CTA['enable_info_cta'] == 'yes') {
                         ?>
                    <div class="cta">
                            <?php
                                 $sebenas_control_cta_model->setCTA($settings_CTA); ?>

                        </div>

                    <?php
                     } ?>

                </div>


            </section>

        </div>

         </section>
            <?php
        }
    }
}
