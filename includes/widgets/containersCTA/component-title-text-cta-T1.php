<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!class_exists('C_TitleTextCta_T1')) {
    class C_TitleTextCta_T1 extends Widget_Base
    {
        public function get_name()
        {
            return 'C_TitleTextCta_T1';
        }

        public function get_title()
        {
            return esc_html__('CTA title text T1', 'sbn_e_TitleTextCta_T1');
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
            return ['sebenas_widgets_modules', 'sebenas_widgets_modules_info'];
        }


        public function get_keywords()
        {
            return ['sebenas', 'info', 'modules', 'principal', 'images', 'CTA', 'cta'];
        }

        protected function register_controls()
        {
            require_once SEBENAS_PATH . 'includes/controls/controls_main.php';

            sebenas_control_styles::setControls($this);

            $this->start_controls_section(
                'section_row_1',
                [
                'label' => esc_html__('Section row 1', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $this->add_control(
                'enable_section_row_1',
                [
                'label' => esc_html__('Enable section row 1', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                ]
            );

            $this->add_control(
                'enable_title_section_row_1',
                [
                'label' => esc_html__('Enable title section row 1', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                'condition' => [
                    'enable_section_row_1' => 'yes',
                ],
                ]
            );

            $this->add_control(
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

            $this->add_control(
                'enable_info_text_section_row_1',
                [
                'label' => esc_html__('Enable title section row 1', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                'condition' => [
                    'enable_section_row_1' => 'yes',
                ],
                ]
            );

            $this->add_control(
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

            $this->end_controls_section();

            sebenas_controls_info_text_cta::setControls($this);
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            require_once SEBENAS_PATH . 'includes/functions/main.php';

            $general_settings = array(
                'component_styles' => $settings['sebenas_component_defined_styles']
            );

            $settings_row1 = array(
                'enable_section_row_1' => $settings['enable_section_row_1'],
                'enable_title_section_row_1' => $settings['enable_title_section_row_1'],
                'title_text_section_row_1' => F_textFormating::setFormatingText($settings['title_text_section_row_1']),
                'enable_info_text_section_row_1' => $settings['enable_info_text_section_row_1'],
                'info_text_section_row_1' => F_textFormating::setFormatingText($settings['info_text_section_row_1']),
            );


            $settings_banner = array(
                'enable_info_title' => $settings['enable_info_title'],
                'title_text' => F_textFormating::setFormatingText($settings['title_text']),
                'enable_info_text' => $settings['enable_info_text'],
                'info_text' => F_textFormating::setFormatingText($settings['info_text']),
            );

            $slug = '_info_CTA';
            $settings_CTA = array(
                'enable_info_cta' => $settings['enable_info_cta'],
                'enable_icon_cta' => $settings['enable_icon_cta' . $slug],
                'icon_type_cta' => $settings['icon_type_cta' . $slug],
                'icon_cta' => $settings['icon_cta' . $slug],
                'custom_icon_cta' => $settings['custom_icon_cta' . $slug],
                'icon_side_cta' => $settings['icon_side_cta' . $slug],
                'text_cta' => $settings['text_cta' . $slug],
                'cta_action_click' => $settings['cta_action_click' . $slug],
                'cta_special_action' => $settings['cta_special_action' . $slug],
                'link_cta' => $settings['link_cta' . $slug],
                'cta_style' => $settings['cta_style' . $slug],
            );

?>

<section class="sbn_ComponentCustom parentElement elementorCustom C_TitleTextCta_T1 ">
        <div class="section-row">

        <?php
                    if (isset($settings_row1) && $settings_row1['enable_section_row_1'] == 'yes') {
                        ?>
            <section class="innerSectionElement sct1">
                        <div class="containElements">

                            <?php
                        if (isset($settings_row1) && $settings_row1['enable_title_section_row_1'] == 'yes') {
                            ?>
                                <h2 class="secondaryTitle">
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
                    } ?>

                    <?php

if (isset($general_settings['component_styles']) && $general_settings['component_styles'] == 'white_component_style') {
    ?>

 <section class="innerSectionElement sct2  whiteBackground_Style">

<?php
}
if (isset($general_settings['component_styles']) && $general_settings['component_styles'] == 'grey_component_style') {
    ?>

 <section class="innerSectionElement sct2  greyBackground_Style">

<?php
}
if (isset($general_settings['component_styles']) && $general_settings['component_styles'] == 'black_component_style') {
    ?>

 <section class="innerSectionElement sct2  blackBackground_Style">

<?php
}  ?>

                    <div class="containElements">

                        <div class="info">

                        <?php
                        if (isset($settings_banner) && $settings_banner['enable_info_title'] == 'yes') {
                            ?>
                                <h3 class="secondaryTitle">
                                    <?php echo isset($settings_banner['title_text']) ? $settings_banner['title_text'] : ''; ?>
                                </h3>
                                <?php
                        } ?>

                        <?php
                        if (isset($settings_banner) && $settings_banner['enable_info_text'] == 'yes') {
                            ?>
                                <div class="text">
                                    <?php echo isset($settings_banner['info_text']) ? $settings_banner['info_text'] : ''; ?>
                                </div>
                                <?php
                        } ?>


                        </div>

                        <div class="cta">

                            <?php
                                 if (isset($settings_CTA) && $settings_CTA['enable_info_cta'] == 'yes') {
                                    $ctaClasses = '';
                                    $ctaClasses .= isset($settings_CTA['cta_style']) ? $settings_CTA['cta_style'] : '';
                                    $ctaClasses .= ' ';
                                    $ctaClasses .= isset($settings_CTA['icon_side_cta']) ? $settings_CTA['icon_side_cta'] : '';
                                    $ctaClasses .= ' '; ?>
                                        <a href="" class="sbn_buttonCustom <?php echo $ctaClasses ?> ">
                                            <?php
                                            if (isset($settings_CTA) && $settings_CTA['enable_info_cta'] == 'yes') {
                                                $icon = '';
                                                $icon_class = '';
                                                if ($settings_CTA['icon_type_cta'] == 'icons') {
                                                    if ($settings_CTA['icon_cta']) {
                                                        $icon = '<i class="' . esc_attr($settings_CTA['icon_cta']) . '"></i>';
                                                    }
                                                } elseif ($settings_CTA['icon_type_cta'] == 'custom_icons') {
                                                    if ($settings_CTA['custom_icon_cta'] && \Elementor\Icons_Manager::is_migration_allowed()) {
                                                        ob_start();
                                                        \Elementor\Icons_Manager::render_icon($settings_CTA['custom_icon_cta'], [ 'aria-hidden' => 'true' ]);
                                                        $icon = ob_get_clean();

                                                        if ($settings_CTA['custom_icon_cta']['library'] == 'svg') {
                                                            $icon_class = 'icon-svg';
                                                        }
                                                    }
                                                } ?>
                                                <div class="icon-container <?php echo esc_attr($icon_class); ?>">
                                                    <?php echo $icon; ?>
                                                </div>
                                            <?php
                                            } ?>
                                            <?php echo isset($settings_CTA['text_cta']) ? $settings_CTA['text_cta'] : ''; ?>
                                        </a>
                                        <?php
                             } ?>


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