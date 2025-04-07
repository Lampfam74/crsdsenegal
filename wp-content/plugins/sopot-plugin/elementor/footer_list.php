<?php

namespace sopotPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */

class Footer_list extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_footer_list';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */

	public function get_title() {
		return esc_html__( 'Footer Iist', 'sopot' );

	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */

	public function get_icon() {
		return 'eicon-elementor';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */

	public function get_categories() {
		return [ 'elements' ];
	}

	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */

	 protected function register_controls() {
		$this->start_controls_section(
			'footer_list',
			[
				'label' => esc_html__( 'Footer Iist', 'sopot' ),
			]
		);
		
		$this->add_control(		
			'items',			  
			[
				'type' => Controls_Manager::REPEATER,					
				'seperator' => 'before',					
				'default' => 
					 [
						 ['block_title' => esc_html__('List', 'sopot')],					
					 ],
				'fields' => 
				[	


					[
						'name' => 'text',
						'label'       => __( 'Text', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Title', 'sopot' ),
					],
					[
						'name' => 'link',
						'label' => __( 'Icon Url', 'sopot' ),
						'label_block' => true,
						'type' => Controls_Manager::URL,
						'placeholder' => __( '', 'sopot' ),
						'show_external' => true,
						'default' => [
						'url' => '',
						'is_external' => true,
						'nofollow' => true,
						],
					]

					
				],
			]
		);
		

		$this->end_controls_section();


	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */

	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');
	?>
		

		
		
			<div class="footer-widget__column footer-widget__service clearfix">
				<ul class="footer-widget__service-list list-unstyled clearfix">
					<?php foreach($settings['items'] as $key => $item):?>
					<li><a href="<?php echo esc_url($item['link']['url']);?>"><?php echo wp_kses($item['text'], true);?></a></li>
					<?php endforeach;?>
				</ul>
			</div>

		
                                


    <?php
    }
}

