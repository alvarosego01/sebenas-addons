<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

require_once SEBENAS_PATH.'includes/controls/controls_main.php';
require_once SEBENAS_PATH.'includes/functions/main.php';

if (!class_exists('C_features_services_T1')) {
    class C_features_services_T1 extends Widget_Base
    {
        public function get_name()
        {
            return 'C_features_services_T1';
        }

        public function get_title()
        {
            return esc_html__('Features services T1', 'sbn_e_features_services_T1');
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
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();
            $sebenas_title_text_row1 = new sebenas_title_text_row1();

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

            $features_list = $settings['features_icons_default'];

            $pre_styleContainer = null;
            $pre_styleContainer = $sebenas_control_styles->set_background_style($general_settings); ?>

        <section class="sbn_ComponentCustom parentElement elementorCustom C_features_services_T1 <?php echo $pre_styleContainer; ?> ">
        <div class="section-row">

        <?php
                    $sebenas_title_text_row1->set_row1_section($settings_row1); ?>

        <section class="innerSectionElement sct2  ">
            <div class="containElements">

                <?php if (isset($features_list) && count($features_list) > 0) { ?>
                    <div class="featureList row">

                        <?php
                        foreach ($features_list as $key => $value) {
                            ?>

                            <div class="featureItem col-md-6 col-lg-4">

                                <div class="containItem">

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

    </section>


</div>


</section>

<?php
        }
    }
}

?>