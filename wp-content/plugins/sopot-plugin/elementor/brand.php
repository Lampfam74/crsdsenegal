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

class Brand extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_brand';
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
		return esc_html__( 'Brand', 'sopot' );

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
			'brand',
			[
				'label' => esc_html__( 'Brand', 'sopot' ),
			]
		);
		$this->add_control(		
			'items',			  
			[
				'type' => Controls_Manager::REPEATER,					
				'seperator' => 'before',					
				'default' => 
					 [
						 ['block_title' => esc_html__('Brand List', 'sopot')],					
					 ],
				'fields' => 
				[

					[
						'name' => 'image',
						'label' => __( 'Choose Two', 'sopot' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'link',
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

	// swiper slider
    const swiperElm = document.querySelectorAll(".thm-swiper__slider");
    swiperElm.forEach(function (swiperelm) {
      const swiperOptions = JSON.parse(swiperelm.dataset.swiperOptions);
      let thmSwiperSlider = new Swiper(swiperelm, swiperOptions);
    });


  });
</script>
		<!--Brand One Start-->
        <section class="brand-one">
            <div class="container">
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                    "0": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 30,
                        "slidesPerView": 3
                    },
                    "767": {
                        "spaceBetween": 50,
                        "slidesPerView": 4
                    },
                    "991": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    },
                    "1199": {
                        "spaceBetween": 100,
                        "slidesPerView": 5
                    }
                }}'>
                    <div class="swiper-wrapper">
						<?php foreach($settings['items'] as $key => $item):?>
                        <div class="swiper-slide">
                            <a href="<?php echo esc_url($item['link']['url']);?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sopot'); ?>"></a>
                            <div class="brand-one__overly">
                                <a href="<?php echo esc_url($item['link']['url']);?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sopot'); ?>"></a>
                            </div>
                        </div><!-- /.swiper-slide -->
               			 <?php endforeach;?>
                    </div>
                </div>
            </div>
        </section>
        <!--Brand One End-->
	



    <?php
    }
}

