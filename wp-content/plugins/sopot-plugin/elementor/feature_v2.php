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

class Feature_v2 extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_feature_v2';
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
		return esc_html__( 'Feature V2', 'sopot' );

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
			'feature_v2',
			[
				'label' => esc_html__( 'Feature V2', 'sopot' ),
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
				'label'       => __( 'Title ', 'sopot' ),
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
		

		<!--Feature Two Single-->
		<div class="feature-two__single">
			<?php if($settings['image']['id']){ ?><div class="feature-two__img">
			<img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sopot'); ?>">
			</div><?php } ?>
			<div class="feature-two__content">
				<div class="feature-two__top">
					<div class="feature-two__icon">
						<span class="<?php echo esc_attr( $settings['icon']['value']); ?>"></span>
					</div>
					<h3 class="feature-two__title"><a href="<?php echo esc_url($settings['link']['url']);?>"><?php echo wp_kses($settings['title'], true);?></a></h3>
				</div>
				<p class="feature-two__text"><?php echo wp_kses($settings['text'], true);?></p>
			</div>
		</div>

    <?php
    }
}

