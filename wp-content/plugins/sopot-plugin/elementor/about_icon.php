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

class About_icon extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_about_icon';
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
		return esc_html__( 'About Icon', 'sopot' );

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
			'about_icon',
			[
				'label' => esc_html__( 'About Icon', 'sopot' ),
			]
		);
		
		$this->add_control(		
			'items',			  
			[
				'type' => Controls_Manager::REPEATER,					
				'seperator' => 'before',					
				'default' => 
					 [
						 ['block_title' => esc_html__('Icon List', 'sopot')],					
					 ],
				'fields' => 
				[

					
					[
						'name' => 'icon',
						'label' => esc_html__('Icon', 'sopot_plugin'),
						'label_block' => true,
						'type' => Controls_Manager::ICONS,
					],
					[
						'name' => 'title',
						'label'       => __( 'Title', 'sopot' ),
						'type'        => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Text', 'sopot' ),
					],
					[
						'name' => 'text',
						'label'       => __( 'Text', 'sopot' ),
						'type'        => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Text', 'sopot' ),
					]	
                    		
				],

			]
		); 
		$this->add_control(
            'play_icon',
            [
                'label' => esc_html__('Play Icon', 'sopot_plugin'),
                'label_block' => true,
                'type' => Controls_Manager::ICONS,
            ]
        );
		$this->add_control(
			'btn',
			[
				'label'       => __( 'Button', 'sopot' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'sopot' ),
			]
		);
		$this->add_control(
			'link',
			[
				'label' => __( 'Button Url', 'sopot' ),
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
		
		
			<div class="about-one__right">
				
					<ul class="list-unstyled about-one__points">
						<?php foreach($settings['items'] as $key => $item):?>
						<li>
							<div class="icon">
								<span class="<?php echo esc_attr($item['icon']['value']); ?>"></span>
							</div>
							<div class="text">
								<h4><?php echo wp_kses($item['title'], true);?></h4>
								<p><?php echo wp_kses($item['text'], true);?></p>
							</div>
						</li>
						<?php endforeach;?>
					</ul>
					<div class="about-one__bottom-video-box">
						<?php if($settings['btn']){ ?><div class="about-one__btn-box">
							<a href="<?php echo esc_url($settings['link']['url']);?>" class="thm-btn about-one__btn"><?php echo wp_kses($settings['btn'], true);?></a>
						</div><?php } ?>
						<?php if($settings['link']['url']){ ?>
						<div class="about-one__video-link">
							<a href="<?php echo esc_url($settings['link']['url']);?>" class="video-popup">
								<div class="about-one__video-icon">
									<span class="<?php echo esc_attr($settings['play_icon']['value']); ?>"></span>
									<i class="ripple"></i>
								</div>
							</a>
						</div>
						<?php } ?>
					</div>
				
			</div>
		
	
	



    <?php
    }
}

