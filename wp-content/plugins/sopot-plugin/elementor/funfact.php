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

class Funfact extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_funfact';
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
		return esc_html__( 'Funfact', 'sopot' );

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
			'funfact',
			[
				'label' => esc_html__( 'Funfact', 'sopot' ),
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
			'items',			  
			[
				'type' => Controls_Manager::REPEATER,					
				'seperator' => 'before',					
				'default' => 
					 [
						 ['block_title' => esc_html__('Counter List', 'sopot')],					
					 ],
				'fields' => 
				[

					[
						'name' => 'title',
						'label'       => __( 'Title', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Text', 'sopot' ),
					],
					[
						'name' => 'count',
						'label'       => __( 'Count', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Text', 'sopot' ),
					],
					[
						'name' => 'sub_count',
						'label'       => __( 'Sub Count', 'sopot' ),
						'label_block' => true,
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
		

<script>
 jQuery(document).ready(function($) {

  if ($(".odometer").length) {
    var odo = $(".odometer");
    odo.each(function () {
      $(this).appear(function () {
        var countNumber = $(this).attr("data-count");
        $(this).html(countNumber);
      });
    });
  }


  });
</script>


		 <!--Counter One Start-->
		 <section class="counter-one">
		 <?php if($settings['bg_image']['id']){ ?><div class="counter-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id']));?>);"></div><?php } ?>
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline"><?php echo wp_kses($settings['sub_title'], true);?></span>
                    <h2 class="section-title__title"><?php echo wp_kses($settings['sec_title'], true);?></h2>
                </div>
                <div class="row">
					<?php foreach($settings['items'] as $key => $item):?>
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                        <!--Counter One Single-->
                        <div class="counter-one__single">
                            <div class="counter-one__content">
                                <h3 class="odometer" data-count="<?php echo wp_kses($item['count'], true);?>">00</h3>
                                <span class="counter-one__letter"><?php echo wp_kses($item['sub_count'], true);?></span>
                                <p class="counter-one__text"><?php echo wp_kses($item['title'], true);?></p>
                            </div>
                        </div>
                    </div>
					<?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="counter-one__btn-box text-center">
                            <a href="<?php echo esc_url($settings['link']['url']);?>" class="thm-btn counter-one__btn"><?php echo wp_kses($settings['btn'], true);?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Counter One End-->
	



    <?php
    }
}