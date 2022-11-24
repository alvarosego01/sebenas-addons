<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

require_once SEBENAS_PATH.'includes/controls/controls_main.php';
require_once SEBENAS_PATH.'includes/functions/main.php';

if (!class_exists('C_features_services_T2')) {
    class C_features_services_T2 extends Widget_Base
    {
        public function get_name()
        {
            return 'C_features_services_T2';
        }

        public function get_title()
        {
            return esc_html__('Features services T2', 'sbn_e_features_services_T2');
        }

        public function get_icon()
        {
            return 'eicon-code';
        }

        public function get_custom_help_url()
        {
            return 'https://developers.elementor.com/docs/widgets/';
        }

        public function get_categories()
        {
            return ['sebenas_widgets_modules', 'sebenas_widgets_modules_info', 'sebenas_widgets_modules_features'];
        }

        public function get_keywords()
        {
            return ['sebenas', 'info', 'modules', 'principal', 'images', 'CTA', 'cta', 'features'];
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
                'section_features',
                ['label' => esc_html__('Features list', 'Sebenas_Addons')]
            );

            $repeater = new Repeater();

            $repeater->add_control(
                'features_icon_type',
                [
                    'label' => esc_html__('Icon Type', 'Sebenas_Addons'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'icons' => esc_html__('Old Icons', 'Sebenas_Addons'),
                        'custom_icons' => esc_html__('New Icon', 'Sebenas_Addons'),
                    ],
                    'default' => 'icons',
                    'toggle' => false,
                ]
            );

            $repeater->add_control(
                'features_icon',
                [
                    'label' => esc_html__('Icon', 'Sebenas_Addons'),
                    'type' => Controls_Manager::ICON,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'features_icon_type' => 'icons',
                    ],
                ]
            );

            $repeater->add_control(
                'features_custom_icon',
                [
                    'label' => esc_html__('Icon', 'Sebenas_Addons'),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'features_icon_type' => 'custom_icons',
                    ],
                ]
            );

            $repeater->add_control(
                'features_title', [
                    'label' => esc_html__('Title', 'Sebenas_Addons'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('This is the title', 'Sebenas_Addons'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'features_desc', [
                    'label' => esc_html__('Description', 'Sebenas_Addons'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('This is the description', 'Sebenas_Addons'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'features_icons_default',
                [
                    'label' => '',
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'icon' => 'icon-rocket',
                            'title' => esc_html__('Lorem ipsum dolor s', 'Sebenas_Addons'),
                            'desc' => esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus an', 'Sebenas_Addons'),
                        ],
                        [
                            'icon' => 'icon-sync',
                            'title' => esc_html__('Lorem ipsum dolor s 2', 'Sebenas_Addons'),
                            'desc' => esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus an 2', 'Sebenas_Addons'),
                        ],
                        [
                            'icon' => 'icon-credit-card',
                            'title' => esc_html__('Lorem ipsum dolor s 3', 'Sebenas_Addons'),
                            'desc' => esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus an 3', 'Sebenas_Addons'),
                        ],
                        [
                            'icon' => 'icon-bubbles',
                            'title' => esc_html__('Lorem ipsum dolor s 4', 'Sebenas_Addons'),
                            'desc' => esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus an 4', 'Sebenas_Addons'),
                        ],
                    ],
                    // 'title_field'   => '{{{ title }}}',
                    'prevent_empty' => false,
                ]
            );
            $this->end_controls_section();

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
            $sebenas_title_text_row1 = new sebenas_title_text_row1();

            $F_textFormating = new F_textFormating();

            $sebenas_control_styles = new sebenas_control_styles();

            $sebenas_control_cta_model = new sebenas_control_cta_model();

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

            $features_list = $settings['features_icons_default'];

            $columnsFeatures = null;

            if (isset($features_list) && count($features_list) <= 4) {
                $columnsFeatures = 'col-md-12 col-lg-6';
            }
            if (isset($features_list) && count($features_list) >= 5) {
                $columnsFeatures = 'col-md-12 col-lg-4';
            }

            $pre_styleContainer = null;
            $pre_styleContainer = $sebenas_control_styles->set_background_style($general_settings); ?>

<section class="sbn_ComponentCustom parentElement elementorCustom C_features_services_T2 <?php echo $pre_styleContainer; ?>">

<div class="section-row">


    <?php
        $sebenas_title_text_row1->set_row1_section($settings_row1); ?>

    <section class="innerSectionElement sct2">
        <?php
        if (isset($general_settings['side_position_define']) && $general_settings['side_position_define'] == 'right_side_component') {
            ?>
        <div class="groupElements row rightSide">

            <div class="col-md-12 col-lg-5 partContainer info">
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
            <div class="col-md-12 col-lg-7 partContainer features">

            <?php if (isset($features_list) && count($features_list) > 0) { ?>
                    <div class="featureList row">

                        <?php
                        foreach ($features_list as $key => $value) {
                            ?>
                            <div class="featureItem  <?php echo $columnsFeatures; ?>">

                                <div class="containItem shadow2">

                                <div class="iconBase">

                                <?php
                                $icon = '';
                            $icon_class = '';
                            if ($value['features_icon_type'] == 'icons') {
                                if ($value['features_icon']) {
                                    $icon = '<i class="'.esc_attr($value['features_icon']).'"></i>';
                                }
                            } elseif ($value['features_icon_type'] == 'custom_icons') {
                                if ($value['features_custom_icon'] && \Elementor\Icons_Manager::is_migration_allowed()) {
                                    ob_start();
                                    \Elementor\Icons_Manager::render_icon($value['features_custom_icon'], ['aria-hidden' => 'true']);
                                    $icon = ob_get_clean();

                                    if ($value['features_custom_icon']['library'] == 'svg') {
                                        $icon_class = 'icon-svg';
                                    }
                                }
                            } ?>
                                <div class="icon_container <?php echo esc_attr($icon_class); ?>">
                                    <?php echo $icon; ?>
                                </div>

                                </div>
                                <div class="info">



                                <?php
                                    if (isset($value['features_title']) && $value['features_title'] != '') {
                                        ?>
                                            <h4 class="smallTitle">
                                                <?php echo isset($value['features_title']) ? $value['features_title'] : ''; ?>
                                            </h3>
                                            <?php
                                    } ?>

                                    <?php
                                    if (isset($value['features_desc']) && $value['features_desc'] != '') {
                                        ?>
                                            <div class="text">
                                                <?php echo isset($value['features_desc']) ? $value['features_desc'] : ''; ?>
                                            </div>
                                            <?php
                                    } ?>

                                </div>
                                </div>
                            </div>

                        <?php
                        } ?>


                    </div>
                <?php } ?>

            </div>

        </div>

    <?php
        } ?>
        <?php
        if (isset($general_settings['side_position_define']) && $general_settings['side_position_define'] == 'left_side_component') {
            ?>
        <div class="groupElements row leftSide">

            <div class="col-md-12 col-lg-7 partContainer features">

            <?php if (isset($features_list) && count($features_list) > 0) { ?>
                    <div class="featureList row">

                        <?php
                        foreach ($features_list as $key => $value) {
                            ?>

                            <div class="featureItem  <?php echo $columnsFeatures; ?>">

                                <div class="containItem shadow2">

                                <div class="iconBase">

                                <?php
                                $icon = '';
                            $icon_class = '';
                            if ($value['features_icon_type'] == 'icons') {
                                if ($value['features_icon']) {
                                    $icon = '<i class="'.esc_attr($value['features_icon']).'"></i>';
                                }
                            } elseif ($value['features_icon_type'] == 'custom_icons') {
                                if ($value['features_custom_icon'] && \Elementor\Icons_Manager::is_migration_allowed()) {
                                    ob_start();
                                    \Elementor\Icons_Manager::render_icon($value['features_custom_icon'], ['aria-hidden' => 'true']);
                                    $icon = ob_get_clean();

                                    if ($value['features_custom_icon']['library'] == 'svg') {
                                        $icon_class = 'icon-svg';
                                    }
                                }
                            } ?>
                                <div class="icon_container <?php echo esc_attr($icon_class); ?>">
                                    <?php echo $icon; ?>
                                </div>

                                </div>
                                <div class="info">

                                <?php
                                    if (isset($value['features_title']) && $value['features_title'] != '') {
                                        ?>
                                            <h4 class="smallTitle">
                                                <?php echo isset($value['features_title']) ? $value['features_title'] : ''; ?>
                                            </h3>
                                            <?php
                                    } ?>

                                    <?php
                                    if (isset($value['features_desc']) && $value['features_desc'] != '') {
                                        ?>
                                            <div class="text">
                                                <?php echo isset($value['features_desc']) ? $value['features_desc'] : ''; ?>
                                            </div>
                                            <?php
                                    } ?>

                                </div>
                                </div>
                            </div>

                        <?php
                        } ?>


                    </div>
                <?php } ?>

            </div>


            <div class="col-md-12 col-lg-5 partContainer info">
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

?>