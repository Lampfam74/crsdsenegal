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
class Causes extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sopot_causes';
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
        return esc_html__( 'Causes', 'sopot' );
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
            'causes',
            [
                'label' => esc_html__( 'Causes', 'sopot' ),
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'sopot' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'sopot' ),
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
				'placeholder' => __( 'Enter your Title', 'sopot' ),
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
                'default' => 4,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_orderby',
            [
                'label'   => esc_html__( 'Order By', 'sopot' ),
				'label_block' => true,
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
				'label_block' => true,
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'sopot' ),
                    'ASC'  => esc_html__( 'ASC', 'sopot' ),
                ),
            ]
        );
        $this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'sopot'),
				'label_block' => true,
                'options' => get_campaign_categories()
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

        $paged = get_query_var('paged');
		$paged = sopot_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-sopot' );
        $args = array(
            'post_type'      => 'campaign',
            'posts_per_page' => sopot_set( $settings, 'query_number' ),
            'orderby'        => sopot_set( $settings, 'query_orderby' ),
            'order'          => sopot_set( $settings, 'query_order' ),
            'paged'         => $paged
        );

        if( sopot_set( $settings, 'query_category' ) ) $args['campaign_category'] = sopot_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>
        
        <!-- cause -->
                <div class="row">
                    <?php
						global $post; 
						while ( $query->have_posts() ) : $query->the_post();
						$campaign = charitable_get_current_campaign(); 
						$post_thumbnail_id = get_post_thumbnail_id($post->ID);
						$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
						$term_list = wp_get_post_terms(get_the_id(), 'campaign_category', array("fields" => "names"));
					?>
					<div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <!--Causes One Single-->
                        <div class="causes-one__single">
                            <div class="causes-one__img">
							<?php if(has_post_thumbnail()){ ?><figure class="image"><?php the_post_thumbnail('sopot_370x270'); ?></figure><?php } ?>
                            </div>
                            <div class="causes-one__content-box">
                                <div class="causes-one__donate-btn-box">
									<a href="<?php echo charitable_get_permalink( 'campaign_donation_page', array( 'campaign_id' => $campaign->ID ) ); ?>" class="thm-btn causes-one__donate-btn"><?php esc_html_e('Donate', 'sopot'); ?></a>
                                </div>
                                <div class="causes-one__content">
                                    <h3 class="causes-one__title"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a>
                                    </h3>
                                    <div class="causes-one__progress">
                                        <div class="bar">
                                            <div class="bar-inner count-bar" data-percent="<?php echo esc_attr($campaign->get_percent_donated_raw());?>%">
                                                <div class="count-text"><?php echo esc_attr($campaign->get_percent_donated_raw());?>%</div>
                                            </div>
                                        </div>
                                        <div class="causes-one__goals">
                                            <p><?php echo wp_kses($campaign->get_donation_summary(), true); ?></p>
                                        </div>
                                    </div>
                                    <div class="causes-one__btn-box">
                                        <a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="causes-one__read-more"><?php esc_html_e('Read More', 'sopot'); ?> <span
                                                class="icon-plus-sign"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>

<script>
 jQuery(document).ready(function($) {

  if ($(".count-bar").length) {
    $(".count-bar").appear(
      function () {
        var el = $(this);
        var percent = el.data("percent");
        $(el).css("width", percent).addClass("counted");
      }, {
        accY: -50
      }
    );
  }


  });
</script>
        
        <?php }
        wp_reset_postdata();
    }
}
