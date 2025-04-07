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

class Cta_v2 extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_cta_v2';
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
		return esc_html__( 'Cta V2', 'sopot' );

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
			'cta_v2',
			[
				'label' => esc_html__( 'Cta V2', 'sopot' ),
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



		 <!--help-people Start-->
		 <section class="help-people">
		 <?php if($settings['bg_image']['id']){ ?><div class="help-people-bg" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id']));?>);"><?php } ?>
            </div>
            <div class="container">
                <div class="help-people__inner wow fadeInUp" data-wow-delay="300ms">
                    <div class="help-people__sub-title-box">
                        <?php if($settings['sub_title']){ ?><p><?php echo wp_kses($settings['sub_title'], true);?></p><?php } ?>
                    </div>
                    <?php if($settings['title']){ ?><h3 class="help-people__title"><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
                    <?php if($settings['text']){ ?><p class="help-people__text"><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                    <a href="<?php echo esc_url($settings['link']['url']);?>" class="thm-btn help-people__btn"><?php echo wp_kses($settings['btn'], true);?></a>
                </div>
            </div>
        </section>
        <!--help-people End-->
	



    <?php
    }
}

