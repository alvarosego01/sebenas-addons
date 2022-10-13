<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;

require_once SEBENAS_PATH.'includes/controls/controls_main.php';
require_once SEBENAS_PATH.'includes/functions/main.php';

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
            $sebenas_controls_info_text_cta = new sebenas_controls_info_text_cta();
            $sebenas_controls_info_text_cta->setControls($this);

            $sebenas_control_styles = new sebenas_control_styles();
            $sebenas_control_styles->setControls($this);
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            $F_textFormating = new F_textFormating();
            $sebenas_control_cta_model = new sebenas_control_cta_model();

            $sebenas_control_styles = new sebenas_control_styles();

            $general_settings = [
                'component_styles' => $settings['sebenas_component_defined_styles'],
            ];

            $settings_banner = [
                'enable_info_title' => $settings['enable_info_title'],
                'title_text' => $F_textFormating->setFormatingText($settings['title_text']),
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

            $background_style = [
                'enable_special_background' => $settings['enable_special_background'],
                'special_background_type' => $settings['special_background_type'],
                'background_image' => $settings['background_image'],
                // 'background_color' => $settings['background_color'],
            ];

            $backgroundSRC = null;
            if (isset($background_style['enable_special_background']) && $background_style['enable_special_background'] == 'yes') {
                if (isset($background_style['special_background_type']) && $background_style['special_background_type'] == 'special_background_image') {
                    $backgroundSRC = isset($background_style['background_image']) ? $background_style['background_image']['url'] : null;
                    /*<section style="background-image: url('<?php echo $backgroundSRC ?>')" class="sbn_ComponentCustom parentElement elementorCustom C_TitleTextCta_T2 whiteBackground_Style">
                */
                }
            }

            $pre_styleContainer = null;
            $pre_styleContainer = $sebenas_control_styles->set_background_style($general_settings); ?>

                        <section
                        class="sbn_ComponentCustom parentElement elementorCustom C_TitleTextCta_T2 <?php echo $pre_styleContainer; ?>">



        <div class="section-row">

        <section class="innerSectionElement sct2">

            <div class="groupElements row">
                <div class="col-md-12 col-lg-12 info">
                    <div class="containElements">
                <?php if (isset($settings_banner) && $settings_banner['enable_info_title'] == 'yes') { ?>
                        <h2 class="secondaryTitle">
                            <?php echo isset($settings_banner['title_text']) ? $settings_banner['title_text'] : ''; ?>
                        </h2>
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
                    $sebenas_control_cta_model->setCTA($settings_CTA);
                } ?>
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