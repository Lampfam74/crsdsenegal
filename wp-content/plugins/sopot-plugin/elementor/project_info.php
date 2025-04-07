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

class Project_info extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_project_info';
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
		return esc_html__( 'Project Info', 'sopot' );

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
		return [ 'sopot' ];
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
			'project_info',
			[
				'label' => esc_html__( 'Project Info', 'sopot' ),
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
						'name' => 'name',
						'label'       => __( 'Name', 'sopot' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Text', 'sopot' ),
					],
					[
						'name' => 'text',
						'label'       => __( 'Text', 'sopot' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Text', 'sopot' ),
					]

					
				],
			]
		);
		
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'sopot' ),
			]
		);
		$this->add_control(
			'social_icon',
			[
				'label'       => __( 'Social Icon', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'sopot' ),
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
		


		<div class="project-details__right">
                            
			<ul class="list-unstyled project-details__list">
			<?php foreach($settings['items'] as $key => $item):?>
				<li>
					<div class="left">
						<h4><?php echo wp_kses($item['name'], true);?></h4>
					</div>
					<div class="right">
						<p><?php echo wp_kses($item['text'], true);?></p>
					</div>
				</li>
				<?php endforeach;?>
				<li>
					<div class="left">
						<h4><?php echo wp_kses($settings['text'], true);?></h4>
					</div>
					<div class="right">
						<div class="project-details__social">
							<?php echo wp_kses($settings['social_icon'], true);?>
						</div>
					</div>
				</li>
			</ul>

		</div>
	
	



    <?php
    }
}

