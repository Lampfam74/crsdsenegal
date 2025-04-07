<?php

namespace SOPOTPLUGIN\Element;

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
class Events extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sopot_events';
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
		return esc_html__( 'Events', 'sopot' );
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
			'events',
			[
				'label' => esc_html__( 'Events', 'sopot' ),
			]
		);
		$this->add_control(
			'column',
			[
				'label'   => esc_html__( 'Column', 'sopot' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '6',
				'options' => array(
					'12'   => esc_html__( 'One Column', 'sopot' ),
					'6'   => esc_html__( 'Two Column', 'sopot' ),
					'4'   => esc_html__( 'Three Column', 'sopot' ),
					'3'   => esc_html__( 'Four Column', 'sopot' ),
					'2'   => esc_html__( 'Six Column', 'sopot' ),
				),
			]
		);
		$this->add_control(
			'events_styles',
			[
				'label' => __('Events Styles', 'sopot'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style_one' => __( 'Style One', 'sopot' ),
					'style_two' => __( 'Style Two', 'sopot' ),   
					],
				'default' => __('style_one' , 'sopot'),
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'sopot' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'sopot' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 6,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
		$this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'sopot'),
				'label_block' => true,
                'options' => get_events_categories(),
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
		
		$count = 1;
		$events = tribe_get_events(array(
		'posts_per_page' => $settings['query_number'],
		'tax_query'=> array(
			array(
				'taxonomy' => 'tribe_events_cat',
				'field' => 'slug',
				'terms' => $settings['query_category']
			)
		)
	)); ?>

	<?php if($settings['events_styles'] == 'style_one'):?>	
	<div class="content-inner">
		<div class="row">
		<?php 
			if ( empty( $events ) ) :
			echo 'Sorry, nothing found.';
			else: 
			foreach( $events as $event ) : 
			
			$event_thumbnail_id = get_post_thumbnail_id($event->ID);
			$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);
			
			$start_datetime = tribe_get_start_date( $event->ID );
			$end_datetime = tribe_get_end_date( $event->ID );
			
			$start_date = tribe_get_start_date($event->ID, true, 'd' );
			$end_month_date = tribe_get_end_date($event->ID, true, 'F' );
			$end_year_date = tribe_get_end_date($event->ID, true, 'Y' );
			
			$start_time = tribe_get_start_time ( $event->ID, 'h:i A' );
			$end_time = tribe_get_end_time ( $event->ID, 'h:i A' );
			
			$location = get_option('location');
		?>
			<div class="col-lg-<?php echo esc_attr($settings['column'], true );?>">
				<div class="recent-event__single">
					<div class="recent-event__img">
						<?php echo (get_the_post_thumbnail($event->ID, 'sopot_268x199')); ?>
						<div class="recent-event__btn-box">
							<a href="<?php echo esc_url(get_permalink($event->ID)); ?>" class="thm-btn recent-event__btn"><?php esc_html_e('Read More', 'sopot'); ?></a>
						</div>
					</div>
					<div class="recent-event__content">
						<ul class="list-unstyled recent-event__meta">
							<li>
								<p> <span class="icon-calendar"></span> <?php echo wp_kses($end_month_date, true); ?> <?php echo wp_kses($start_date, true); ?>, <?php echo wp_kses($end_year_date, true); ?></p>
							</li>
							<li>
								<p> <span class="icon-back-in-time"></span> <?php echo wp_kses($start_time, true); ?></p>
							</li>
						</ul>
						<h3 class="recent-event__title"><a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php echo wp_kses(get_the_title( $event->ID ), true);?></a></h3>
						<p class="recent-event__text"><?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?></p>
					</div>
				</div>
			</div>				
		<?php endforeach; endif;  ?>
		</div>
	</div>
	<?php elseif($settings['events_styles'] == 'style_two'):?>
		<?php 
			if ( empty( $events ) ) :
			echo 'Sorry, nothing found.';
			else: 
			foreach( $events as $event ) : 
			
			$event_thumbnail_id = get_post_thumbnail_id($event->ID);
			$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);
			
			$start_datetime = tribe_get_start_date( $event->ID );
			$end_datetime = tribe_get_end_date( $event->ID );
			
			$start_date = tribe_get_start_date($event->ID, true, 'd' );
			$end_month_date = tribe_get_end_date($event->ID, true, 'F' );
			$end_year_date = tribe_get_end_date($event->ID, true, 'Y' );
			
			$start_time = tribe_get_start_time ( $event->ID, 'h:i A' );
			$end_time = tribe_get_end_time ( $event->ID, 'h:i A' );
			
			$location = get_option('location');
		?>
		<div class="up-comming-events__content">
			<h3 class="up-comming-events__title"><a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php echo wp_kses(get_the_title( $event->ID ), true);?></a></h3>  
			<ul class="list-unstyled up-comming-events__details">
				<li>
					<p> <span class="far fa-calendar-alt"></span> <?php echo wp_kses($end_month_date, true); ?> <?php echo wp_kses($start_date, true); ?>, <?php echo wp_kses($end_year_date, true); ?> <?php esc_html_e('at', 'sopot'); ?> <?php echo wp_kses($start_time, true); ?></p>
				</li>
				<li>
					<p> <span class="fas fa-map-marker-alt"></span> <?php echo tribe_get_venue( $event->ID ); ?></p>
				</li>
			</ul>
		</div>				
		<?php endforeach; endif;  ?>	
	<?php endif; ?>
	<?php 
	}
}