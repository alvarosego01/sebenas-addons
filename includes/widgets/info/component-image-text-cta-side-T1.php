<?php

// namespace SebenasAddonsWidgets;

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'C_ImageTextCtaSide_T1' ) ) {

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class C_ImageTextCtaSide_T1 extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'C_ImageTextCtaSide_T1';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Image text cta side 1', 'sbn_e_ImageTextCtaSide_T1' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'sebenas_widgets_modules', 'sebenas_widgets_modules_info' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'sebenas', 'info', 'modules' ,'url', 'link' ];
	}

	protected function register_controls() {

		sebenas_controls_InfoCta_model( $this );

		sebenas_control_styles( $this );

		$this->start_controls_section(
			'side_position_section',
			[
				'label' => esc_html__( 'Component position side', 'Sebenas_Addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'side_position_define',
			[
				'label'   => esc_html__( 'Component position', 'Sebenas_Addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'left_side_component' => 'Left',
					'right_side_component' => 'Right',

				],
				'default' => 'left_side_component',
			]
		);

		$this->end_controls_section();



	}


	protected function render() {

		$settings = $this->get_settings_for_display();

		?>
        <section class="C_ImageTextCtaSide_T1">

			<div class="section-row">



			</div>

        </section>
		<?php

	}


}

}