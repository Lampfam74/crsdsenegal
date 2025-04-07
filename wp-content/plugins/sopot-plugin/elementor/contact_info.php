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

class Contact_info extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_contact_info';
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
		return esc_html__( 'Contact Info', 'sopot' );

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
			'contact_info',
			[
				'label' => esc_html__( 'Contact Info', 'sopot' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'sopot' ),
			]
		);
		$this->add_control(
			'email',
			[
				'label'       => __( 'Email', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'sopot' ),
			]
		);
		$this->add_control(
			'email_link',
			[
				'label' => __( 'Email Url', 'sopot' ),
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
		$this->add_control(
			'number',
			[
				'label'       => __( 'Phone', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'sopot' ),
			]
		);
		$this->add_control(
			'phone_link',
			[
				'label' => __( 'Url', 'sopot' ),
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
						'name' => 'title',
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
		


		<!--Contact Info Start-->
        <section class="contact-info">
            <div class="container">
                <div class="row">
				<?php foreach($settings['items'] as $key => $item):?>
                    <div class="col-xl-4 col-lg-4">
                        <!--Contact Info Single-->
                        <div class="contact-info__single">
                            <h4 class="contact-info__title"><?php echo wp_kses($item['title'], true);?></h4>
                            <p class="contact-info__text"><?php echo wp_kses($item['text'], true);?></p>
                        </div>
                    </div>
					<?php endforeach;?>
                    <div class="col-xl-4 col-lg-4">
                        <!--Contact Info Single-->
                        <div class="contact-info__single contact-info__single-3">
                            <h4 class="contact-info__title"><?php echo wp_kses($settings['title'], true);?></h4>
                            <p class="contact-info__email-phone">
                                <a href="<?php echo esc_url($settings['email_link']['url']);?>"
                                    class="contact-info__email"><?php echo wp_kses($settings['email'], true);?></a>
                                <a href="<?php echo esc_url($settings['phone_link']['url']);?>" class="contact-info__phone"><?php echo wp_kses($settings['number'], true);?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Info End-->
	
	



    <?php
    }
}

