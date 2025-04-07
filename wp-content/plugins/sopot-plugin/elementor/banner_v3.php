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

class Banner_v3 extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'sopot_banner_v3';
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
		return esc_html__( 'Banner V3', 'sopot' );

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
			'banner_v3',
			[
				'label' => esc_html__( 'Slider Settings', 'sopot' ),
			]
		);
		$this->add_control(
			'slider_loop',
			[
				'label'       => __( 'Loop', 'sopot' ),
				'type' => Controls_Manager::SWITCHER,
				'true' => esc_html__( 'True', 'sopot' ),
				'false' => esc_html__( 'False', 'sopot' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);	
		$this->add_control(
			'slider_effect',
			[
				'label' => __( 'Effect', 'sopot_plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'fade',
				'options' => [
					'fade'  => __( 'Fade', 'sopot_plugin' ),
                    'cube' => __( 'Cube', 'sopot_plugin' ),
                    'coverflow' => __( 'Coverflow', 'sopot_plugin' ),
                    'cards' => __( 'Cards', 'sopot_plugin' ),
                    'flip' => __( 'Flip', 'sopot_plugin' ),
                    'creative' => __( 'Creative', 'sopot_plugin' ),
				],
			]
		);
		$this->add_control(
			'slider_delay',
			[
				'label' => __( 'Delay', 'sopot' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => __( 'Autoplay Delay', 'sopot' ),
				'default' => "8000",
			]
		);
		$this->add_control(
			'slider_speed',
			[
				'label' => __( 'Speed', 'sopot' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => __( 'Slider Speed', 'sopot' ),
				'default' => "2000",
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'banner_v1',
			[
				'label' => esc_html__( 'Slider item', 'sopot' ),
			]
		);
		
		$this->add_control(		
			'items',			  
			[
				'type' => Controls_Manager::REPEATER,					
				'seperator' => 'before',					
				'default' => 
					 [
						 ['block_title' => esc_html__('Banner List', 'sopot')],					
					 ],
				'fields' => 
				[

					[
						'name' => 'slider_image',
						'label' => esc_html__('Background image', 'sopot_plugin'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'image',
						'label' => esc_html__('Background image', 'sopot_plugin'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[	
						'name' => 'banner_title',
						'label'       => __( 'Banner Title', 'sopot' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your BIg Title', 'sopot' ),
					],
					[	
						'name' => 'banner_text',
						'label'       => __( 'Text', 'sopot' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your BIg Title', 'sopot' ),
					],
					
					[	
						'name' => 'btn',
						'label'       => __( 'Button', 'sopot' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your BIg Title', 'sopot' ),
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
		
        
	{ ?>


<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {



	if ($(".thm-swiper__slider").length) {
		$(".thm-swiper__slider").each(function () {
		  let elm = $(this);
		  let options = elm.data("swiper-options");
		  let thmSwiperSlider = new Swiper(elm, options);
		});
	}


  });
</script>';


?>



<!--Main Slider Start-->
<section class="main-slider main-slider-three">
	
		<div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": <?php echo esc_attr($settings['slider_loop'], true);?>,
			"effect": "<?php echo esc_attr($settings['slider_effect'], true);?>",
			"speed": <?php echo esc_attr($settings['slider_speed'], true);?>,
			"pagination": {
			"el": "#main-slider-pagination",
			"type": "bullets",
			"clickable": true
			},
			"navigation": {
			"nextEl": "#main-slider__swiper-button-next",
			"prevEl": "#main-slider__swiper-button-prev"
			},
			"autoplay": {
			"delay": <?php echo esc_attr($settings['slider_delay'], true);?>
			}}'>

				<div class="swiper-wrapper">
					<?php foreach($settings['items'] as $key => $item):?> 
						<!--Start Main Slider One-->

						   <div class="swiper-slide">
						   <?php if($item['slider_image']['id']){ ?><div class="image-layer"
                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['slider_image']['id']));?>);"></div><?php } ?>
							<?php if($item['image']['id']){ ?><div class="main-slider__three-map">
						<img src="<?php echo esc_url(wp_get_attachment_url($item['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'sopot'); ?>">
                        </div><?php } ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider__content">
									<?php if($item['banner_title']){ ?><h2><?php echo wp_kses($item['banner_title'], true);?></h2><?php } ?>
									<?php if($item['banner_text']){ ?><p><?php echo wp_kses($item['banner_text'], true);?></p><?php } ?>
                                    <?php if($item['btn']){ ?>    <a href="<?php echo esc_url($item['link']['url']);?>" class="thm-btn main-slider__btn"><?php echo wp_kses($item['btn'], true);?></a><?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endforeach;?>
				</div>
				<!--End Main Slider One-->

				<!-- If we need navigation buttons -->
				<div class="main-slider__nav style2">
				<div class="swiper-button-prev" id="main-slider__swiper-button-next">
					<i class="fa fa-long-arrow-alt-left"></i>
				</div>
				<div class="swiper-button-next" id="main-slider__swiper-button-prev">
					<i class="fa fa-long-arrow-alt-right"></i>
				</div>
        </div>
	</section>
	<!--Main Slider End-->
	




	<?php }
    wp_reset_postdata();
	}
}

