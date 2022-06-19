

<?php

// namespace SebenasAddonsWidgets;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;


if (!class_exists('C_images_text_3c_T1')) {
    class C_images_text_3c_T1 extends Widget_Base
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
            return 'C_ImageText3c_T1';
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
            return esc_html__('Images text 3c 1', 'sbn_e_ImageTextCtaSide_T1');
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
            return ['sebenas', 'info', 'modules', 'principal', 'images'];
        }

        protected function register_controls()
        {
            require_once SEBENAS_PATH . 'includes/controls/controls_main.php';


            sebenas_control_styles::setControls($this);

            sebenas_title_text_row1::setControls($this);


            $this->start_controls_section(
                'column_section_1',
                [
                'label' => esc_html__('Column section 1', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $this->add_control(
                'enable_info_title_1c',
                [
                'label' => esc_html__('Enable title column 1', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                ]
            );

            $this->add_control(
                'title_text_1c',
                [
                    'type' => Controls_Manager::TEXT,
                    'label' => esc_html__('Title', 'Sebenas_Addons'),
                    'placeholder' => esc_html__('Enter your title', 'Sebenas_Addons'),
                    'default' => 'Lorem ipsum dolor sit amet co',
                    'label_block' => true,
                    'description' => esc_html__( 'Use {{p text p}} for add primary color', 'Sebenas_Addons' ),
                    'condition' => [
                        'enable_info_title_1c' => 'yes',
                    ],
            ]
            );


            sebenas_image_component::setControls($this, '_1c_image');

            $this->end_controls_section();

            $this->start_controls_section(
                'column_section_2',
                [
                'label' => esc_html__('Column section 2', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );
            sebenas_image_component::setControls($this, '_2c_image');


            $this->add_control(
                'enable_info_text_2c',
                [
                'label' => esc_html__('Enable Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
            ]
            );

            $this->add_control(
                'info_text_2c',
                [
                'label' => esc_html__('Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Default text', 'Sebenas_Addons'),
                'placeholder' => esc_html__('Type your text here', 'Sebenas_Addons'),
                'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus animi quasi cum repellat atque?',
                'description' => esc_html__( 'Use {{p text p}} for add primary color', 'Sebenas_Addons' ),
                'condition' => [
                    'enable_info_text_2c' => 'yes',
                ],

            ]
            );


            $this->end_controls_section();

            $this->start_controls_section(
                'column_section_3',
                [
                'label' => esc_html__('Column section 3', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $this->add_control(
                'enable_info_text_3c',
                [
                'label' => esc_html__('Enable Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
            ]
            );

            $this->add_control(
                'info_text_3c',
                [
                'label' => esc_html__('Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Default text', 'Sebenas_Addons'),
                'placeholder' => esc_html__('Type your text here', 'Sebenas_Addons'),
                'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus animi quasi cum repellat atque?',
                'description' => esc_html__( 'Use {{p text p}} for add primary color', 'Sebenas_Addons' ),
                'condition' => [
                    'enable_info_text_3c' => 'yes',
                ],

            ]
            );

            sebenas_image_component::setControls($this, '_3c_image');

            $this->end_controls_section();
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

            $slug = '_1c_image';
            $settings_c1 = array(
                'enable_info_title_1c' => $settings['enable_info_title_1c'],
                'title_text_1c' => F_textFormating::setFormatingText( $settings['title_text_1c'] ),
                'image_1c' => $settings['image_info' . $slug]
            );

            $slug = '_2c_image';
            $settings_c2 = array(
                'image_2c' => $settings['image_info' . $slug],
                'enable_info_text_2c' => $settings['enable_info_text_2c'],
                'info_text_2c' => F_textFormating::setFormatingText( $settings['info_text_2c'] )
            );

            $slug = '_3c_image';
            $settings_c3 = array(
                'image_3c' => $settings['image_info' . $slug],
                'enable_info_text_3c' => $settings['enable_info_text_3c'],
                'info_text_3c' => F_textFormating::setFormatingText( $settings['info_text_3c'] )
            );

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

        <section class="sbn_ComponentCustom parentElement elementorCustom C_images_text_3c_T1 <?php echo $pre_styleContainer ?>">
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

        <section class="innerSectionElement sct2">
            <div class="groupElements row">
                <div class="col-md-12 col-lg-4 partContainer element_c1">
                    <div class="containElements">

                    <?php
                    if (isset($settings_c1) && $settings_c1['enable_info_title_1c'] == 'yes') {
                        ?>
                        <h3 class="secondaryTitle">
                            <?php echo isset($settings_c1['title_text_1c']) ? $settings_c1['title_text_1c'] : ''; ?>
                        </h3>
                        <?php
                    } ?>

                        <div class="containerImage containImageHover">
                            <?php
                                $imageSrc = isset($settings_c1['image_1c']) ? $settings_c1['image_1c']['url'] : ''; ?>
                            <img  src="<?php echo $imageSrc ?>" alt="" loading="lazy">

                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-lg-4 partContainer element_c2">
                    <div class="containElements">


                    <div class="containerImage containImageHover">
                            <?php
                                $imageSrc = isset($settings_c2['image_2c']) ? $settings_c2['image_2c']['url'] : ''; ?>
                            <img  src="<?php echo $imageSrc ?>" alt="" loading="lazy">

                        </div>

                        <?php
                if (isset($settings_c2) && $settings_c2['enable_info_text_2c'] == 'yes') {
                    ?>
                        <div class="text">
                            <?php echo isset($settings_c2['info_text_2c']) ? $settings_c2['info_text_2c'] : ''; ?>
                        </div>
                        <?php
                } ?>

                    </div>
                </div>
                <div class="col-md-12 col-lg-4 partContainer element_c3">
                    <div class="containElements">

                    <?php
                if (isset($settings_c3) && $settings_c3['enable_info_text_3c'] == 'yes') {
                    ?>
                        <div class="text">
                            <?php echo isset($settings_c3['info_text_3c']) ? $settings_c3['info_text_3c'] : ''; ?>
                        </div>
                        <?php
                } ?>

                            <div class="containerImage containImageHover">
                            <?php
                                $imageSrc = isset($settings_c3['image_3c']) ? $settings_c3['image_3c']['url'] : ''; ?>
                            <img  src="<?php echo $imageSrc ?>" alt="" loading="lazy">

                             </div>

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