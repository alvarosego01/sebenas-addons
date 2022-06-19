<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!class_exists('C_TitleTextCta_T2')) {
    class C_TitleTextCta_T2 extends Widget_Base
    {
        public function get_name()
        {
            return 'C_TitleTextCta_T2';
        }

        public function get_title()
        {
            return esc_html__('CTA title text T2', 'sbn_e_TitleTextCta_T2');
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
            return ['sebenas_widgets_modules', 'sebenas_widgets_modules_info', 'sebenas_widgets_modules_ctas'];
        }


        public function get_keywords()
        {
            return ['sebenas', 'info', 'modules', 'principal', 'images', 'CTA', 'cta'];
        }

        protected function register_controls()
        {
            require_once SEBENAS_PATH . 'includes/controls/controls_main.php';

            sebenas_control_styles::setControls($this);

            sebenas_controls_info_text_cta::setControls($this);

            sebenas_background_style_component::setControls($this);
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            require_once SEBENAS_PATH . 'includes/functions/main.php';

            $general_settings = array(
                'component_styles' => $settings['sebenas_component_defined_styles']
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

            $background_style = array(
                'enable_special_background' => $settings['enable_special_background'],
                'special_background_type' => $settings['special_background_type'],
                'background_image' => $settings['background_image'],
                // 'background_color' => $settings['background_color'],
            );

            $backgroundSRC = null;
            if (isset($background_style['enable_special_background']) && $background_style['enable_special_background'] == 'yes') {

                if (isset($background_style['special_background_type']) && $background_style['special_background_type'] == 'special_background_image') {

                    $backgroundSRC = isset($background_style['background_image']) ? $background_style['background_image']['url'] : null;
                 /*<section style="background-image: url('<?php echo $backgroundSRC ?>')" class="sbn_ComponentCustom parentElement elementorCustom C_TitleTextCta_T2 whiteBackground_Style">
                */
                }
            }

                $pre_styleContainer = null;
                if (isset($general_settings['component_styles']) && $general_settings['component_styles'] == 'white_component_style') {
                    $pre_styleContainer = 'whiteBackground_Style';
                }
                if (isset($general_settings['component_styles']) && $general_settings['component_styles'] == 'grey_component_style') {
                    $pre_styleContainer = 'greyBackground_Style';
                }
                if (isset($general_settings['component_styles']) && $general_settings['component_styles'] == 'black_component_style'){
                     $pre_styleContainer = 'blackBackground_Style';
                }
                if (isset($general_settings['component_styles']) && $general_settings['component_styles'] == 'primary_component_style'){
                     $pre_styleContainer = 'primaryBackground_Style';
                }

                ?>

                    <?php if( isset($backgroundSRC) && $backgroundSRC != null ){  ?>

                    <section
                    style="background-image: url('<?php echo $backgroundSRC ?>')"
                    class="sbn_ComponentCustom parentElement elementorCustom C_TitleTextCta_T2 <?php echo $pre_styleContainer ?>">

                    <?php } else {  ?>

                        <section
                        class="sbn_ComponentCustom parentElement elementorCustom C_TitleTextCta_T2 <?php echo $pre_styleContainer ?>">

                    <?php } ?>

        <div class="section-row">

        <section class="innerSectionElement sct2">

            <div class="groupElements row">
                <div class="col-md-12 col-lg-12 info">
                    <div class="containElements">
                <?php if (isset($settings_banner) && $settings_banner['enable_info_title'] == 'yes') { ?>
                        <h3 class="secondaryTitle">
                            <?php echo isset($settings_banner['title_text']) ? $settings_banner['title_text'] : ''; ?>
                        </h3>
                        <?php
                } ?>

                <?php if (isset($settings_banner) && $settings_banner['enable_info_text'] == 'yes') { ?>
                        <div class="text">
                            <?php echo isset($settings_banner['info_text']) ? $settings_banner['info_text'] : ''; ?>
                        </div>
                        <?php
                } ?>

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
                                <div class="icon_container <?php echo esc_attr($icon_class); ?>">
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

            </div>



            </section>

        </div>

        </section>
<?php }

        }
    }

?>