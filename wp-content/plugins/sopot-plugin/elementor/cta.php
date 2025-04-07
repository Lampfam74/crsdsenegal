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

class Cta extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_cta';
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
		return esc_html__( 'Cta', 'sopot' );

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
			'cta',
			[
				'label' => esc_html__( 'Cta', 'sopot' ),
			]
		);

		$this->add_control(		
			'items',			  
			[
				'type' => Controls_Manager::REPEATER,					
				'seperator' => 'before',					
				'default' => 
					 [
						 ['block_title' => esc_html__('Cta List', 'sopot')],					
					 ],
				'fields' => 
				[

					[
						'name' => 'class',
						'label'       => __( 'Class', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Button Title', 'sopot' ),
					],
					[
						'name' => 'image',
						'label' => __( 'Choose Image', 'sopot' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'sub_title',
						'label'       => __( 'Sub Title', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Button Title', 'sopot' ),
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
						'name' => 'btn',
						'label'       => __( 'Button', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Button Title', 'sopot' ),
					],
					[
						'name' => 'link',
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


		<!--Two Section Start-->
        <section class="two-section">
            <div class="two-section__wrapper">
				<?php foreach($settings['items'] as $key => $item):?>
                <div class="two-section__<?php echo wp_kses($item['class'], true);?> wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"
                    style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['image']['id']));?>);">
                    <div class="two-section__content-box">
						<?php if($item['sub_title']){ ?>  <p class="two-section__sub-title"><?php echo wp_kses($item['sub_title'], true);?></p><?php } ?>
                        <?php if($item['title']){ ?>  <h3 class="two-section__title"><?php echo wp_kses($item['title'], true);?></h3><?php } ?>
                        <?php if($item['btn']){ ?>  <a href="<?php echo esc_url($item['link']['url']);?>" class="thm-btn two-section__btn-1"><?php echo wp_kses($item['btn'], true);?></a><?php } ?>
                    </div>
                </div>
				<?php endforeach;?>
            </div>
        </section>
        <!--Two Section Start-->
	



    <?php
    }
}

