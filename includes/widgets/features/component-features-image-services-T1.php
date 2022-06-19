

<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Repeater;

if (!class_exists('C_features_image_services_T1')) {
    class C_features_image_services_T1 extends Widget_Base
    {
        public function get_name()
        {
            return 'C_features_image_services_T1';
        }

        public function get_title()
        {
            return esc_html__('Features image services T1', 'sbn_e_features_image_services_T1');
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
            require_once SEBENAS_PATH . 'includes/controls/controls_main.php';

            sebenas_control_styles::setControls($this);

            sebenas_title_text_row1::setControls($this);

            $this->start_controls_section(
                'section_features',
                [ 'label' => esc_html__( 'Features list', 'Sebenas_Addons' ) ]
            );


            $repeater = new Repeater();

            $repeater->add_control(
                'features_icon_type',
                [
                    'label'   => esc_html__( 'Icon Type', 'Sebenas_Addons' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'icons'        => esc_html__( 'Old Icons', 'Sebenas_Addons' ),
                        'custom_icons' => esc_html__( 'New Icon', 'Sebenas_Addons' ),
                    ],
                    'default' => 'icons',
                    'toggle'  => false,
                ]
            );

            $repeater->add_control(
                'features_icon',
                [
                    'label'     => esc_html__( 'Icon', 'Sebenas_Addons' ),
                    'type'      => Controls_Manager::ICON,
                    'default'   => 'fa fa-star',
                    'condition' => [
                        'features_icon_type' => 'icons',
                    ],
                ]
            );

            $repeater->add_control(
                'features_custom_icon',
                [
                    'label'            => esc_html__( 'Icon', 'Sebenas_Addons' ),
                    'type'             => Controls_Manager::ICONS,
                    'default'          => [
                        'value'   => 'fas fa-star',
                        'library' => 'fa-solid',
                    ],
                    'condition'        => [
                        'features_icon_type' => 'custom_icons',
                    ],
                ]
            );

            $repeater->add_control(
                'features_title', [
                    'label'       => esc_html__( 'Title', 'Sebenas_Addons' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__( 'This is the title', 'Sebenas_Addons' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'features_desc', [
                    'label'       => esc_html__( 'Description', 'Sebenas_Addons' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__( 'This is the description', 'Sebenas_Addons' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'features_icons_default',
                [
                    'label'         => '',
                    'type'          => Controls_Manager::REPEATER,
                    'fields'        => $repeater->get_controls(),
                    'default'       => [
                        [
                            'icon'  => 'icon-rocket',
                            'title' => esc_html__( 'Lorem ipsum dolor s', 'Sebenas_Addons' ),
                            'desc'  => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus an', 'Sebenas_Addons' ),
                        ],
                        [
                            'icon'  => 'icon-sync',
                            'title' => esc_html__( 'Lorem ipsum dolor s 2', 'Sebenas_Addons' ),
                            'desc'  => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus an 2', 'Sebenas_Addons' ),
                        ],
                        [
                            'icon'  => 'icon-credit-card',
                            'title' => esc_html__( 'Lorem ipsum dolor s 3', 'Sebenas_Addons' ),
                            'desc'  => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus an 3', 'Sebenas_Addons' ),
                        ],
                        [
                            'icon'  => 'icon-bubbles',
                            'title' => esc_html__( 'Lorem ipsum dolor s 4', 'Sebenas_Addons' ),
                            'desc'  => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repellat consectetur in cumque laborum. Dicta labore similique commodi earum possimus, numquam corrupti consequuntur modi, repellendus an 4', 'Sebenas_Addons' ),
                        ],
                    ],
                    // 'title_field'   => '{{{ title }}}',
                    'prevent_empty' => false
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'image_features_section',
                [
                'label' => esc_html__('Image feature', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            sebenas_image_component::setControls($this, '_image_features');

            $this->end_controls_section();

            $this->start_controls_section(
                'section_info_title',
                [
                'label' => esc_html__('Title info section', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'default' => 'Title Lorem ipsum dolor, sit amet consectetur adipisicing'
            ]
            );

            $this->add_control(
                'enable_info_title',
                [
                'label' => esc_html__('Enable title text', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
                ]
            );

            $this->add_control(
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

            $this->end_controls_section();

            $this->start_controls_section(
                'section_info_text',
                [
                'label' => esc_html__('Text info section', 'Sebenas_Addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $this->add_control(
                'enable_info_text',
                [
                'label' => esc_html__('Enable Description text', 'Sebenas_Addons'),
                'type' => Controls_Manager::SWITCHER,
            ]
            );

            $this->add_control(
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

            require_once SEBENAS_PATH . 'includes/functions/main.php';

            $general_settings = array(
                'side_position_define' => $settings['side_position_define'],
                'component_styles' => $settings['sebenas_component_defined_styles']
            );

            $settings_row1 = array(
                'enable_section_row_1' => $settings['enable_section_row_1'],
                'enable_title_section_row_1' => $settings['enable_title_section_row_1'],
                'title_text_section_row_1' => F_textFormating::setFormatingText($settings['title_text_section_row_1']),
                'enable_info_text_section_row_1' => $settings['enable_info_text_section_row_1'],
                'info_text_section_row_1' => F_textFormating::setFormatingText($settings['info_text_section_row_1']),
            );

            $features_list = $settings['features_icons_default'];

            $settings_title = array(
                'enable_info_title' => $settings['enable_info_title'],
                'title_text' => F_textFormating::setFormatingText( $settings['title_text'] ),
            );

            $settings_text = array(
                'enable_info_text' => $settings['enable_info_text'],
                'info_text' => F_textFormating::setFormatingText( $settings['info_text'] ),
            );

            $slug = '_image_features';
            $settings_image = array(
                'image_info' => $settings['image_info' . $slug],
                'enable_image_box_shadow' => $settings['enable_image_box_shadow' . $slug],
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

        <section class="sbn_ComponentCustom parentElement elementorCustom C_features_image_services_T1 <?php echo $pre_styleContainer ?> ">
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

        <?php } ?>

        <section class="innerSectionElement sct2  ">

                <?php

                $side = $general_settings['side_position_define'];
                if( isset($side) && $side == 'left_side_component' ){
                    $side = 'leftSide';
                }
                if( isset($side) && $side == 'right_side_component' ){
                    $side = 'rightSide';
                }

                ?>

            <div class="containElements row <?php echo $side; ?> ">

                <div class="col-md-12 col-lg-6 image">

                    <?php if(isset($settings_image['enable_image_box_shadow']) && $settings_image['enable_image_box_shadow'] == 'yes') {
                        $_shadow = 'boxShadow2';
                    }else{
                        $_shadow = 'noShadow';
                    } ?>
                    <div class="containerImage containImageHover <?php echo $_shadow ?>">
                            <?php
                                $imageSrc = isset($settings_image['image_info']) ? $settings_image['image_info']['url'] : ''; ?>
                            <img  src="<?php echo $imageSrc ?>" alt="" loading="lazy">
                        </div>
				</div>

                <div class="col-md-12 col-lg-6 info">

                    <div class="containInfo">

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

                <?php if( isset($features_list) && count($features_list) > 0 ) { ?>

                    <div class="featureList row">

                        <?php foreach ($features_list as $key => $value) { ?>

                            <div class="featureItem col-md-12 col-lg-12">

                                <div class="containItem">

                                <div class="icon">

                                <?php
                                $icon = '';
                                $icon_class = '';
                                if ($value['features_icon_type'] == 'icons') {
                                    if ($value['features_icon']) {
                                        $icon = '<i class="' . esc_attr($value['features_icon']) . '"></i>';
                                    }
                                } elseif ($value['features_icon_type'] == 'custom_icons') {
                                    if ($value['features_custom_icon'] && \Elementor\Icons_Manager::is_migration_allowed()) {
                                        ob_start();
                                        \Elementor\Icons_Manager::render_icon($value['features_custom_icon'], [ 'aria-hidden' => 'true' ]);
                                        $icon = ob_get_clean();

                                        if ($value['features_custom_icon']['library'] == 'svg') {
                                            $icon_class = 'icon-svg';
                                        }
                                    }
                                } ?>
                                <div class="icon-container <?php echo esc_attr($icon_class); ?>">
                                    <?php echo $icon; ?>
                                </div>

                                </div>
                                <div class="info">



                                <?php
                                    if (isset($value['features_title']) && $value['features_title'] != '' ) {
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

                        <?php } ?>

                    </div>

                    <?php } ?>
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