<?php

// namespace SebenasAddonsWidgets;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;


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
         * @return string Widget name.
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
         * @return string Widget title.
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
            return ['sebenas', 'info', 'modules', 'url', 'link'];
        }


        protected function register_controls()
        {

            // sebenas_controls_InfoCta_model($this);
            // sebenas_control_styles($this);

            require_once SEBENAS_PATH . '/includes/controls/controls_main.php';

            sebenas_control_styles::setControls($this);
            sebenas_controls_InfoCta_model::setControls($this);


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

            require_once SEBENAS_PATH . 'includes/functions/main.php';

            $general_settings = array(
                'side_position_define' => $settings['side_position_define'],
                'component_styles' => $settings['sebenas_component_defined_styles']
            );

            $slug = '_info_image_1';
            $settings_image = array(
                'image_info' => $settings['image_info' . $slug]
            );

            $settings_title = array(
                'enable_info_title' => $settings['enable_info_title'],
                'title_text' => F_textFormating::setFormatingText( $settings['title_text'] ),
            );

            $settings_text = array(
                'enable_info_text' => $settings['enable_info_text'],
                'info_text' => F_textFormating::setFormatingText( $settings['info_text'] ),
            );

            $settings_text = array(
                'enable_info_text' => $settings['enable_info_text'],
                'info_text' => F_textFormating::setFormatingText( $settings['info_text'] ),
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
            )

            ?>

            <?php
                    if (isset($general_settings['component_styles']) && $general_settings['component_styles'] == 'white_component_style') {
                        ?>

        <section class="sbn_ComponentCustom parentElement elementorCustom C_ImageTextCtaSide_T1 whiteBackground_Style">

        <?php
                    }
            if (isset($general_settings['component_styles']) && $general_settings['component_styles'] == 'grey_component_style') {
                ?>

        <section class="sbn_ComponentCustom parentElement elementorCustom C_ImageTextCtaSide_T1 greyBackground_Style">

        <?php
            }
            if (isset($general_settings['component_styles']) && $general_settings['component_styles'] == 'black_component_style') {
                ?>

        <section class="sbn_ComponentCustom parentElement elementorCustom C_ImageTextCtaSide_T1 blackBackground_Style">

        <?php
            } ?>

			<div class="section-row">

				<section class="innerSectionElement">
                    <?php
                    if (isset($general_settings['side_position_define']) && $general_settings['side_position_define'] == 'right_side_component') {
                        ?>
					<div class="groupElements row rightSide">
						<div class="col-md-12 col-lg-6 partContainer info">
                            <div class="containElements">
                        <?php
                        if (isset($settings_title) && $settings_title['enable_info_title'] == 'yes') {
                            ?>
                                <h3 class="secondaryTitle">
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
						<div class="col-md-12 col-lg-6 partContainer image">
								<div class="containerImage containImageHover">
                                    <?php
                                        $imageSrc = isset($settings_image['image_info']) ? $settings_image['image_info']['url'] : ''; ?>
                                    <img  src="<?php echo $imageSrc ?>" alt="" loading="lazy">

                                </div>
						</div>

					</div>

                <?php
                    } ?>
                    <?php
                    if (isset($general_settings['side_position_define']) && $general_settings['side_position_define'] == 'left_side_component') {
                        ?>
					<div class="groupElements row leftSide">

                        <div class="col-md-12 col-lg-6 partContainer image">
                            <div class="containerImage containImageHover">
                                    <?php
                                        $imageSrc = isset($settings_image['image_info']) ? $settings_image['image_info']['url'] : ''; ?>
                                    <img  src="<?php echo $imageSrc ?>" alt="" loading="lazy">

                                </div>
						</div>


                        <div class="col-md-12 col-lg-6 partContainer info">
                        <div class="containElements">
<?php
if (isset($settings_title) && $settings_title['enable_info_title'] == 'yes') {
                                            ?>
        <h3 class="secondaryTitle">
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
