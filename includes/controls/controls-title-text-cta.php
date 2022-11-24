<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if (!class_exists('sebenas_controls_info_text_cta')) {
    class sebenas_controls_info_text_cta
    {
        public function setControls($class)
        {

            $class->start_controls_section(
                'section_info_title',
                [
                'label' => esc_html__('Title info section', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'default' => 'Title Lorem ipsum dolor, sit amet consectetur adipisicing'
            ]
            );

            $class->add_control(
                'enable_info_title',
                [
                'label' => esc_html__('Enable title text', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                ]
            );

            $class->add_control(
                'title_text',
                [
                    'type' => Controls_Manager::TEXT,
                    'label' => esc_html__('Title', 'Sebenas_Addons'),
                    'placeholder' => esc_html__('Enter your title', 'Sebenas_Addons'),
                    'default' => 'Lorem ipsum dolor sit amet co',
                    'label_block' => true,
                    'description' => esc_html__( 'Use {{p text p}} for add primary color', 'Sebenas_Addons' ),
                    'condition' => [
                        'enable_info_title' => 'yes',
                    ],
            ]
            );

            $class->end_controls_section();

            $class->start_controls_section(
                'section_info_text',
                [
                'label' => esc_html__('Text info section', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $class->add_control(
                'enable_info_text',
                [
                'label' => esc_html__('Enable Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
            ]
            );

            $class->add_control(
                'info_text',
                [
                'label' => esc_html__('Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Default text', 'Sebenas_Addons'),
                'placeholder' => esc_html__('Type your text here', 'Sebenas_Addons'),
                'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus animi quasi cum repellat atque?',
                'description' => esc_html__( 'Use {{p text p}} for add primary color', 'Sebenas_Addons' ),
                'condition' => [
                    'enable_info_text' => 'yes',
                ],

            ]
            );

            $class->end_controls_section();

            $class->start_controls_section(
                'section_info_cta',
                [
                'label' => esc_html__('CTA info section', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $class->add_control(
                'enable_info_cta',
                [
                'label' => esc_html__('Enable CTA', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
            ]
            );

            $sebenas_control_cta_model = new sebenas_control_cta_model();
            $sebenas_control_cta_model->setControls($class, '_info_CTA', 'enable_info_cta');

            $class->end_controls_section();
        }
    }
}
