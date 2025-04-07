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
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;
use Elementor\Utils;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Blog extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'blog';
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
		return esc_html__( 'Blog', 'sopot' );
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
	protected function _register_controls() {
		$this->start_controls_section(
			'blog',
			[
				'label' => esc_html__( 'Blog', 'sopot' ),
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
			'bttn',
			[
				'label'       => __( 'Button', 'sopot' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your Button Title', 'sopot' ),
				'default' => esc_html__('Read More', 'sopot'),
			]
		);	
		
		$this->end_controls_section();
	
		$this->start_controls_section(
				'content_section',
				[
					'label' => __( 'Blog Block', 'sopot' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);
			
		$this->add_control(
			'blog_styles',
			[
				'label' => __('Blog Styles', 'sopot'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style_one' => __( 'Style One', 'sopot' ),
					'style_two' => __( 'Style Two', 'sopot' ),   
					'style_three' => __( 'Style Three', 'sopot' ),  
					],
				'default' => __('style_one' , 'sopot'),
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'sopot' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 15,
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
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'sopot' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'sopot' ),
					'title'      => esc_html__( 'Title', 'sopot' ),
					'menu_order' => esc_html__( 'Menu Order', 'sopot' ),
					'rand'       => esc_html__( 'Random', 'sopot' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'sopot' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'sopot' ),
					'ASC'  => esc_html__( 'ASC', 'sopot' ),
				),
			]
		);
		$this->add_control(
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'sopot' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'sopot' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'sopot'),
				  'options' => get_blog_categories()
				]
		);
		$this->add_control(
			'show_pagination',
			[
				'label' => __( 'Enable/Disable Pagination', 'sopot' ),
				'type'     => Controls_Manager::SWITCHER,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enable/Disable Pagination', 'sopot' ),
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
        
        $paged = sopot_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'thememx-sopot' );
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => sopot_set( $settings, 'query_number' ),
			'orderby'        => sopot_set( $settings, 'query_orderby' ),
			'order'          => sopot_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( sopot_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = sopot_set( $settings, 'query_exclude' );
		}
		if( sopot_set( $settings, 'query_category' ) ) $args['category_name'] = sopot_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>


		<?php if($settings['blog_styles'] == 'style_one'):?>

		<div class="blog-style1-content-box">
			<div class="row">

				<?php while ( $query->have_posts() ) : $query->the_post();?>
				<div class="col-xl-<?php echo esc_attr($settings['column'], true );?> col-lg-4 wow fadeInUp" data-wow-delay="100ms">
					<!--Blog One single-->
					<div class="blog-one__single">
						<?php if(has_post_thumbnail()){ ?>
						<div class="blog-one__img">
							<?php the_post_thumbnail(); ?>
							<a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
								<span class="blog-one__plus"></span>
							</a>
						</div>
						<?php } ?>
						<div class="blog-one__content">
							<div class="blog-one__meta">
								<div class="blog-one__cat">
									<p><?php the_category(', '); ?></p>
								</div>
								<div class="blgo-one__date">
									<p> <span class="icon-calendar"></span><?php echo get_the_date('d'); ?> <?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?></p>
								</div>
							</div>
							<h3 class="blog-one__title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
								<?php the_title(); ?>
								</a></h3>
							<p class="blog-one__text"><?php echo wp_kses(wp_trim_words(get_the_content(), $settings['text_limit']), true); ?></p>
						</div>
					</div>
				</div>
				<!--End Single blog Style1-->
				<?php endwhile; ?>

			</div>
			<?php if($settings['show_pagination']){ ?>
				
			<div class="pagination-wrapper">
				<?php sopot_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fas fa-angle-right"></i> ', 'prev_text' => '<i class=" fas fa-angle-left"></i>')); ?>
			</div>

			<?php } ?>
		</div>


		<?php elseif($settings['blog_styles'] == 'style_two'):?>

		<div class="blog-style1-content-box">
			<div class="row">
				<?php while ( $query->have_posts() ) : $query->the_post();?>
				<div class="col-xl-<?php echo esc_attr($settings['column'], true );?> col-lg-4 wow fadeInUp" data-wow-delay="100ms">
					<!--Blog Three Single-->
					<div class="blog-three__single">
						<?php if(has_post_thumbnail()){ ?>
						<div class="blog-three__img">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php } ?>
						<div class="blog-three__content">
							<ul class="list-unstyled blog-three__meta">
								<li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><i class="far fa-clock"></i> <?php comments_number( wp_kses(__('0 Comment' , 'sopot'), true), wp_kses(__('1 Comment' , 'sopot'), true), wp_kses(__('% Comments' , 'sopot'), true)); ?> </a>
								</li>
								<li><a href="<?php echo get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>"><i class="far fa-calendar"></i> <?php echo get_the_date('d'); ?> <?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?></a>
								</li>
							</ul>
							<h3 class="blog-three__title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
								<?php the_title(); ?>
								</a></h3>
							<div class="blog-three__person">
								<div class="blog-three__person-img">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
								</div>
								<div class="blog-three__person-name">
									<p><span><?php esc_html_e('By', 'sopot'); ?></span> <?php the_author(); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<?php if($settings['show_pagination']){ ?>
				
			<div class="pagination-wrapper">
				<?php sopot_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fas fa-angle-right"></i> ', 'prev_text' => '<i class=" fas fa-angle-left"></i>')); ?>
			</div>

			<?php } ?>
		</div>

		<?php elseif($settings['blog_styles'] == 'style_thre'):?>

		<div class="blog-style1-content-box">
			<ul class="footer-widget-one__latest-works-list list-unstyled clearfix">
				<?php while ( $query->have_posts() ) : $query->the_post();?>
				<li>
					<div class="footer-widget-one__latest-works-content">
						<h4 class="footer-widget-one__latest-works-title">
							<a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>">
								<?php the_title(); ?>
								</a>
						</h4>
						<p class="footer-widget-one__latest-works-date">
						<?php echo get_the_date('d'); ?> <?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?>
						</p>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php if($settings['show_pagination']){ ?>
				
			<div class="pagination-wrapper">
				<?php sopot_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fas fa-angle-right"></i> ', 'prev_text' => '<i class=" fas fa-angle-left"></i>')); ?>
			</div>

			<?php } ?>
		</div>


		<?php endif; ?>





		
        <?php }
		wp_reset_postdata();
	}

}
