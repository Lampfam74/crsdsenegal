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

class Skill extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_skill';
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
		return esc_html__( 'Skill', 'sopot' );

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
			'skill',
			[
				'label' => esc_html__( 'Skill', 'sopot' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
			  'label' => __( 'Choose Image', 'sopot' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'bg_image2',
			[
			  'label' => __( 'Choose Image Two', 'sopot' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'sopot' ),
			]
		);
		$this->add_control(
			'sec_title',
			[
				'label'       => __( 'Sec Title', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'sopot' ),
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
			'items',			  
			[
				'type' => Controls_Manager::REPEATER,					
				'seperator' => 'before',					
				'default' => 
					 [
						 ['block_title' => esc_html__('Progress List', 'sopot')],					
					 ],
				'fields' => 
				[


					[
						'name' => 'class',
						'label'       => __( 'Class', 'sopot' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Text', 'sopot' ),
					],
					[
						'name' => 'progress_title',
						'label'       => __( 'Progress Title', 'sopot' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Text', 'sopot' ),
					],
					[
						'name' => 'count',
						'label'       => __( 'Count', 'sopot' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Text', 'sopot' ),
					],
					[
						'name' => 'sub_count',
						'label'       => __( 'Sub Count', 'sopot' ),
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
		

		 <!--Skill One Start-->
		 <section class="skill-one">
            <div class="skill-one__container">
                <div class="skill-one__left">
                    <?php if($settings['bg_image']['id']){ ?><div class="skill-one__bg"
                        style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id']));?>);"></div><?php } ?>
                    <div class="skill-one__arrow-box">
                        <div class="skill-one__arrow-box-inner float-bob-x"></div>
                    </div>
                </div>
                <div class="skill-one__right">
                    <?php if($settings['bg_image2']['id']){ ?><div class="skill-one__bg-two"
                        style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image2']['id']));?>);"></div><?php } ?>
                    <div class="skill-one__content">
                        <div class="section-title text-left">
                            <span class="section-title__tagline"><?php echo wp_kses($settings['sub_title'], true);?></span>
                            <h2 class="section-title__title"><?php echo wp_kses($settings['sec_title'], true);?></h2>
                        </div>
                        <p class="skill-one__text"><?php echo wp_kses($settings['text'], true);?></p>
                        <div class="progress-levels">
							<?php foreach($settings['items'] as $key => $item):?>
                            <!--Skill Box-->
                            <div class="progress-box <?php echo wp_kses($item['class'], true);?>">
                                <div class="inner count-box">
                                    <div class="text"><?php echo wp_kses($item['progress_title'], true);?></div>
                                    <div class="bar">
                                        <div class="bar-innner">
                                            <div class="skill-percent">
                                                <span class="count-text" data-speed="3000" data-stop="<?php echo wp_kses($item['count'], true);?>"><?php echo wp_kses($item['count'], true);?></span>
                                                <span class="percent"><?php echo wp_kses($item['sub_count'], true);?></span>
                                            </div>
                                            <div class="bar-fill" data-percent="90"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <?php if($settings['btn']){ ?><a href="<?php echo esc_url($settings['link']['url']);?>" class="thm-btn skill-one__btn"><?php echo wp_kses($settings['btn'], true);?></a><?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--Skill One End-->
	



    <?php
    }
}

