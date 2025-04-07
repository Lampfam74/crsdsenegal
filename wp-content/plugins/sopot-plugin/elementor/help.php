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

class Help extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_help';
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
		return esc_html__( 'Help', 'sopot' );

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
			'help',
			[
				'label' => esc_html__( 'Help', 'sopot' ),
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
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Button Title', 'sopot' ),
					],
					[
						'name' => 'text',
						'label'       => __( 'Text', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Button Title', 'sopot' ),
					],
					[
						'name' => 'icon2',
						'label' => esc_html__('Icon Two', 'sopot_plugin'),
						'label_block' => true,
						'type' => Controls_Manager::ICONS,
					],
					[
						'name' => 'title2',
						'label'       => __( 'Title Two', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Button Title', 'sopot' ),
					],
					[
						'name' => 'text2',
						'label'       => __( 'Text Two', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Button Title', 'sopot' ),
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


		 <!--Help One Start-->
		 <section class="help-one">
		 <?php if($settings['bg_image']['id']){ ?><div class="help-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id']));?>);"></div><?php } ?>
            <div class="container">
                <h3 class="help-one__title"><?php echo wp_kses($settings['sub_title'], true);?></h3>
                <div class="row">
					<?php foreach($settings['items'] as $key => $item):?>
                    <div class="col-xl-6 col-lg-6">
                        <div class="help-one__content-box">
                            <div class="help-one__single">
                                <div class="help-one__icon">
                                    <span class="<?php echo esc_attr( $item['icon']['value']); ?>"></span>
                                </div>
                                <div class="help-one__content">
                                    <h4><?php echo wp_kses($item['title'], true);?></h4>
                                    <p><?php echo wp_kses($item['text'], true);?></p>
                                </div>
                            </div>
                            <div class="help-one__single">
                                <div class="help-one__icon">
                                    <span class="<?php echo esc_attr( $item['icon2']['value']); ?>"></span>
                                </div>
                                <div class="help-one__content">
                                    <h4><?php echo wp_kses($item['title2'], true);?></h4>
                                    <p><?php echo wp_kses($item['text2'], true);?></p>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endforeach;?>
                </div>
            </div>
        </section>
        <!--Help One End-->
	



    <?php
    }
}

