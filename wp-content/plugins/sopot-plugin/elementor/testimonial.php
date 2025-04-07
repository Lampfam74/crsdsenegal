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

class Testimonial extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_testimonial';
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
		return esc_html__( 'Testimonial', 'sopot' );

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
			'testimonial',
			[
				'label' => esc_html__( 'Testimonial', 'sopot' ),
			]
		);
		

		$this->add_control(		
			'items',			  
			[
				'type' => Controls_Manager::REPEATER,					
				'seperator' => 'before',					
				'default' => 
					 [
						 ['block_title' => esc_html__('Testimonial List', 'sopot')],					
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
						'placeholder' => __( 'Enter your Title', 'sopot' ),
					],
					[
						'name' => 'name',
						'label'       => __( 'Name', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Title', 'sopot' ),
					],
					[
						'name' => 'text2',
						'label'       => __( 'Designation', 'sopot' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Title', 'sopot' ),
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

	if ($(".thm-owl__carousel").length) {
      $(".thm-owl__carousel").each(function () {
        let elm = $(this);
        let options = elm.data('owl-options');
        let thmOwlCarousel = elm.owlCarousel(options);
      });
    }

    if ($(".thm-owl__carousel--custom-nav").length) {
      $(".thm-owl__carousel--custom-nav").each(function () {
        let elm = $(this);
        let owlNavPrev = elm.data('owl-nav-prev');
        let owlNavNext = elm.data('owl-nav-next');
        $(owlNavPrev).on("click", function (e) {
          elm.trigger('prev.owl.carousel');
          e.preventDefault();
        })

        $(owlNavNext).on("click", function (e) {
          elm.trigger('next.owl.carousel');
          e.preventDefault();
        })
      });
    }


  });
</script>
		 <!--Testimonial One End-->
		 <section class="testimonial-one">
            <div class="container">
                <div class="owl-carousel owl-theme thm-owl__carousel testimonial-one__carousel" data-owl-options='{
                    "loop": true,
                    "autoplay": true,
                    "margin": 30,
                    "nav": false,
                    "dots": false,
                    "smartSpeed": 500,
                    "autoplayTimeout": 10000,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive": {
                        "0": {
                            "items": 1
                        },
                        "768": {
                            "items": 2
                        },
                        "991": {
                            "items": 3
                        },
                        "1200": {
                            "items": 3
                        }
                    }
                }'>
                    <!--Testimonial One single-->
					<?php foreach($settings['items'] as $key => $item):?>
                    <div class="testimonial-one__single">
                        <div class="testimonial-one__img">
						<?php if($item['image']['id']){ ?><img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sopot'); ?>"><?php } ?>
                            <div class="testimonial-one__quote">
                                <span class="<?php echo esc_attr( $item['icon']['value']); ?>"></span>
                            </div>
                        </div>
                        <p class="testimonial-one__text"><?php echo wp_kses($item['text'], true);?></p>
                        <div class="testimonial-one__client-info">
                            <h4 class="testimonial-one__client-name"><?php echo wp_kses($item['name'], true);?></h4>
                            <span class="testimonial-one__client-title"><?php echo wp_kses($item['text2'], true);?></span>
                        </div>
                    </div>
					<?php endforeach;?>
                </div>
            </div>
        </section>
        <!--Testimonial End End-->
	



    <?php
    }
}

