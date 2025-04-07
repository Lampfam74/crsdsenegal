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

class Project_Video extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_project_video';
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
		return esc_html__( 'Project Video', 'sopot' );

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
			'project_video',
			[
				'label' => esc_html__( 'Project Video', 'sopot' ),
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
			'video_link',
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

		$this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'sopot_plugin'),
                'label_block' => true,
                'type' => Controls_Manager::ICONS,
            ]
        );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'sopot' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'sopot' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'sopot' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'sopot' ),
			]
		);
		$this->add_control(
			'btn',
			[
				'label'       => __( 'Button', 'sopot' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'sopot' ),
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
		

		 <!--video One Start-->
		 <section class="video-one video-three">
            <div class="container">
                <div class="video-one__content-box">
                    <div class="video-two-shape sauare-mover"></div>
                    <?php if($settings['bg_image']['id']){ ?><div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                    style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id']));?>);"></div><?php } ?>
                    <div class="video-one__inner">
						<?php if($settings['video_link']['url']){ ?><div class="video-one__video-link">
							<a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-popup">
                                <div class="video-one__video-icon">
                                    <span class="<?php echo esc_attr( $settings['icon']['value']); ?>"></span>
                                    <i class="ripple"></i>
                                </div>
                            </a>
                        </div><?php } ?>
                        <?php if($settings['title']){ ?><h3 class="video-one__title"><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
						<?php if($settings['text']){ ?><p class="video-one__text"><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
						<?php if($settings['btn']){ ?><a href="<?php echo esc_url($settings['link']['url']);?>" class="thm-btn video-one__btn"><?php echo wp_kses($settings['btn'], true);?></a><?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--video One End-->
	



    <?php
    }
}

