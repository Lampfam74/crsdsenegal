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

class About_v2 extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_about_v2';
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
		return esc_html__( 'About V2', 'sopot' );

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
			'about_v2',
			[
				'label' => esc_html__( 'About V2', 'sopot' ),
			]
		);
		$this->add_control(
			'image',
			[
			  'label' => __( 'Choose Image', 'sopot' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			'image2',
			[
			  'label' => __( 'Choose Image Two', 'sopot' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'image3',
			[
			  'label' => __( 'Choose Image Three', 'sopot' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Sub Title', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'sopot' )
			]
		);
		$this->add_control(
			'sec_title',
			[
				'label'       => __( 'Sec Title', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'sopot' )
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'sopot' )
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
						'name' => 'text',
						'label'       => __( 'Text', 'sopot' ),
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
		$this->add_control(
			'btn',
			[
				'label'       => __( 'Button', 'sopot' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'sopot' ),
			]
		);
		
		$this->add_control(
			'link',
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
		

		 <!--About Two Start-->
		 <section class="about-two">
		 <?php if($settings['image']['id']){ ?><div class="about-two-shape-1 float-bob-x"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sopot'); ?>">
            </div><?php } ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-two__left">
						<?php if($settings['bg_image']['id']){ ?><div class="about-two__bg"
                                style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id']));?>);"></div><?php } ?>
                            <div class="about-two__img-box wow slideInLeft" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <?php if($settings['image2']['id']){ ?><div class="about-two__img">
								<img src="<?php echo esc_url(wp_get_attachment_url($settings['image2']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sopot'); ?>">
                                </div><?php } ?>
								<?php if($settings['image3']['id']){ ?><div class="about-two__small-img wow zoomIn animated animated" data-wow-delay="500ms"
                                    data-wow-duration="2500ms">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($settings['image3']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sopot'); ?>">
                                </div><?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-two__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline"><?php echo wp_kses($settings['sub_title'], true);?></span>
                                <h2 class="section-title__title"><?php echo wp_kses($settings['sec_title'], true);?></h2>
                            </div>
                            <p class="about-two__text"><?php echo wp_kses($settings['text'], true);?></p>
                            <ul class="list-unstyled about-two__points">
								<?php foreach($settings['items'] as $key => $item):?>
                                <li>
                                    <div class="icon">
                                        <span class="<?php echo esc_attr($item['icon']['value']); ?>"></span>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses($item['text'], true);?></p>
                                    </div>
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <?php if($settings['btn']){ ?><a href="<?php echo esc_url($settings['link']['url']);?>" class="thm-btn about-two__btn"><?php echo wp_kses($settings['btn'], true);?></a><?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Two End-->
	



    <?php
    }
}

