


<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

if (!class_exists('sebenas_control_cta_model')) {
    class sebenas_control_cta_model
    {
        public function setControls($class, $slug, $conditional)
        {
            $class->add_control(
                'enable_icon_cta'.$slug,
                [
                'label' => esc_html__('Enable icon CTA', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                'condition' => [
                    $conditional => 'yes',
                ],
            ]
            );

            $class->add_control(
                'icon_type_cta'.$slug,
                [
                'label' => esc_html__('Icon Type', 'Sebenas_Addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'icons' => esc_html__('Old Icons', 'Sebenas_Addons'),
                    'custom_icons' => esc_html__('New Icon', 'Sebenas_Addons'),
                ],
                'default' => 'custom_icons',
                'toggle' => false,
                'condition' => [
                    $conditional => 'yes',
                    'enable_icon_cta'.$slug => 'yes',
                ],
            ]
            );

            $class->add_control(
                'icon_cta'.$slug,
                [
                'label' => esc_html__('Icon', 'Sebenas_Addons'),
                'type' => Controls_Manager::ICON,
                'default' => 'fa fa-star',
                'condition' => [
                    'icon_type_cta'.$slug => 'icons',
                    $conditional => 'yes',
                    'enable_icon_cta'.$slug => 'yes',
                ],
            ]
            );

            $class->add_control(
                'custom_icon_cta'.$slug,
                [
                'label' => esc_html__('Icon', 'Sebenas_Addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'icon_type_cta'.$slug => 'custom_icons',
                    $conditional => 'yes',
                    'enable_icon_cta'.$slug => 'yes',
                ],
            ]
            );

            $class->add_control(
                'icon_side_cta'.$slug,
                [
                'label' => esc_html__('Icon position', 'Sebenas_Addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'left_side' => 'Left',
                    'right_side' => 'Right',
                ],
                'default' => 'left_side',
                'condition' => [
                    $conditional => 'yes',
                    'enable_icon_cta'.$slug => 'yes',
                ],
            ]
            );

            $class->add_control(
                'text_cta'.$slug,
                [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Text CTA', 'Sebenas_Addons'),
                'placeholder' => esc_html__('Enter your text CTA', 'Sebenas_Addons'),
                'label_block' => true,
                'condition' => [
                    $conditional => 'yes',
                ],
            ]
            );

            $class->add_control(
                'cta_action_click'.$slug,
                [
                'label' => esc_html__('CTA action click', 'Sebenas_Addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'external_url' => 'External url',
                    'special_action' => 'Special action',
                ],
                'default' => 'external_url',
                // 'toggle'  => false,
                'condition' => [
                    $conditional => 'yes',
                ],
            ]
            );

            $class->add_control(
                'cta_special_action'.$slug,
                [
                'label' => esc_html__('CTA special action click', 'Sebenas_Addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'add_cart_current_product' => 'Add to cart current product',
                    'open_popup' => 'Open popup',
                ],
                'default' => 'add_cart_current_product',
                // 'toggle'  => false,
                'condition' => [
                    $conditional => 'yes',
                    'cta_action_click'.$slug => 'special_action',
                ],
            ]
            );

            $class->add_control(
                'link_cta'.$slug,
                [
                'label' => esc_html__('Link url', 'Sebenas_Addons'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'Sebenas_Addons'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    $conditional => 'yes',
                    'cta_action_click'.$slug => 'external_url',
                ],
            ]
            );

            $class->add_control(
                'cta_style'.$slug,
                [
                'label' => esc_html__('CTA style', 'Sebenas_Addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'sbn_primaryButton' => 'Primary button',
                    'sbn_secondaryButton' => 'Secondary Button',
                    'sbn_thirdButton' => 'Third Button',
                    'sbn_transparentButton' => 'Transparent Button',
                    'sbn_underlineButton' => 'Underline Button',
                ],
                'default' => 'sbn_primaryButton',
                'condition' => [
                    $conditional => 'yes',
                ],
            ]
            );
        }

        public function setCTA($settings)
        {
            if (isset($settings) && $settings != null) {
                if (isset($settings) && $settings['enable_info_cta'] == 'yes') {
                    $ctaClasses = '';
                    $ctaClasses .= isset($settings['cta_style']) ? $settings['cta_style'] : '';
                    $ctaClasses .= ' ';
                    $ctaClasses .= isset($settings['icon_side_cta']) ? $settings['icon_side_cta'] : '';
                    $ctaClasses .= ' ';
                    if (isset($settings['cta_action_click'])) {
                        if ($settings['cta_action_click'] == 'external_url') { ?>
                        <a href="<?php  echo $settings['link_cta']['url']; ?>" class="sbn_buttonCustom sbn_btn_normal boxShadow2 <?php echo $ctaClasses; ?> ">
                    <?php }
                        if ($settings['cta_action_click'] == 'special_action') {
                            if ($settings['cta_special_action'] == 'add_cart_current_product') {
                                $ctaClasses .= ' sbn_addCart_this'; ?>
                            <a class="sbn_buttonCustom sbn_btn_normal boxShadow2 <?php echo $ctaClasses; ?> ">
                        <?php
                            }
                            if ($settings['cta_special_action'] == 'open_popup') {
                                $ctaClasses .= ' sbn_openPopup'; ?>
                            <a class="sbn_buttonCustom sbn_btn_normal boxShadow2 <?php echo $ctaClasses; ?> ">

                        <?php
                            }
                        }
                    } ?>
                        <?php
                        if (isset($settings) && $settings['enable_info_cta'] == 'yes') {
                            $icon = '';
                            $icon_class = '';
                            if ($settings['icon_type_cta'] == 'icons') {
                                if ($settings['icon_cta']) {
                                    $icon = '<i class="'.esc_attr($settings['icon_cta']).'"></i>';
                                }
                            } elseif ($settings['icon_type_cta'] == 'custom_icons') {
                                if ($settings['custom_icon_cta'] && \Elementor\Icons_Manager::is_migration_allowed()) {
                                    ob_start();
                                    \Elementor\Icons_Manager::render_icon($settings['custom_icon_cta'], ['aria-hidden' => 'true']);
                                    $icon = ob_get_clean();
                                    if ($settings['custom_icon_cta']['library'] == 'svg') {
                                        $icon_class = 'icon-svg';
                                    }
                                }
                            } ?>
                            <div class="icon_container <?php echo esc_attr($icon_class); ?>">
                                <?php echo $icon; ?>
                            </div>
                        <?php
                        } ?>
                        <?php echo isset($settings['text_cta']) ? $settings['text_cta'] : ''; ?>
                    </a>
                    <?php
                }
            }
        }
    }
}

?>