<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
use Elementor\Widget_Base;

require_once SEBENAS_PATH.'includes/controls/controls_main.php';
require_once SEBENAS_PATH.'includes/functions/main.php';

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
            return ['sebenas_widgets_modules', 'sebenas_widgets_modules_info', 'sebenas_widgets_modules_ctas'];
        }

        public function get_keywords()
        {
            return ['sebenas', 'info', 'modules', 'principal', 'images', 'CTA', 'cta'];
        }

        protected function register_controls()
        {
            $sebenas_control_styles = new sebenas_control_styles();
            $sebenas_control_styles->setControls($this);

            $sebenas_title_text_row1 = new sebenas_title_text_row1();
            $sebenas_title_text_row1->setControls($this);

            $sebenas_controls_info_text_cta = new sebenas_controls_info_text_cta();
            $sebenas_controls_info_text_cta->setControls($this);
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            $sebenas_title_text_row1 = new sebenas_title_text_row1();
            $F_textFormating = new F_textFormating();
            $sebenas_control_styles = new sebenas_control_styles();
            $sebenas_control_cta_model = new sebenas_control_cta_model();

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
            ]; ?>

<section class="sbn_ComponentCustom parentElement elementorCustom C_TitleTextCta_T1 ">
        <div class="section-row">

        <?php
// aqui row 1
            $sebenas_title_text_row1->set_row1_section($settings_row1);

            $general_settings = [
                'side_position_define' => $settings['side_position_define'],
                'component_styles' => $settings['sebenas_component_defined_styles'],
            ];

            $pre_styleContainer = null;
            $pre_styleContainer = $sebenas_control_styles->set_background_style($general_settings); ?>

                <section class="innerSectionElement sct2  <?php echo $pre_styleContainer; ?>">
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
                                 $sebenas_control_cta_model->setCTA($settings_CTA); ?>

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