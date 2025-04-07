<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.2.4
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
global $post;
$event_id = get_the_ID();

$data    = \SOPOT\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'blog-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = sopot_WSH()->option();


$event_thumbnail_id = get_post_thumbnail_id($event_id);
$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);

$start_datetime = tribe_get_start_date( $event_id );
$end_datetime = tribe_get_end_date( $event_id );

$start_date = tribe_get_start_date($event_id, true, 'Y/m/d' );
$end_date = tribe_get_end_date($event_id, true, 'Y/m/d' );

$start_time = tribe_get_start_time ( $event_id, 'h:i A' );
$end_time = tribe_get_end_time ( $event_id, 'h:i A' );

$location = get_option('location');

?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'sopot_banner', $data );?>
<?php else:?>
<section class="page-header">
    <?php if ( $data->get( 'banner' ) ) : ?>
    <div class="page-header-bg" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);"></div>
    <?php else : ?>
    <div class="page-header-bg" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/background/page-title.jpg');?>);"></div>
    <?php endif; ?>
    <div class="container">
        <div class="page-header__inner">
            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( add_theme_support( "title-tag" ) ); ?></h2>
            <ul class="thm-breadcrumb">
            <?php echo sopot_the_breadcrumb(); ?>
            </ul>
        </div>
    </div>
</section>

<?php endif;?>


<section class="event__details">
    <div class="container">
        <div class="row">
        	
			<?php if( $layout == 'left' ): ?>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
            	<div class="cause-sidebar default-sidebar">
                	<?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php endif; ?>
            
            
            <div class="content-side <?php echo esc_attr( $class ); ?>">
                <div class="event_single">
					<?php while ( have_posts() ) : the_post(); ?>
                    
                        <div class="recent-event__content">
                            <div class="recent-event__content_top">                                
                                <figure class="recent-event__content_image"><?php the_post_thumbnail('sopot_1170x500'); ?></figure>
                                <ul class="recent-event__content_desc">
                                    <li><span class="icon-calendar"></span><?php echo wp_kses($start_date, true); ?></li>
                                    <li><span class="icon-back-in-time"></span><?php echo wp_kses($start_time, true); ?></li>
                                </ul>
                            </div>
                            
                            <?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
							<?php the_content();?>
                            <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
                            
                        </div>
                        
                        <!-- Event meta -->
						<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
                        <?php tribe_get_template_part( 'modules/meta' ); ?>
                        <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
                        
                    
                    <?php endwhile; ?>
                </div>
            </div>
        	
			<?php if( $layout == 'right' ): ?>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="cause-sidebar default-sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
			<?php endif; ?>
			
        </div>
    </div>
</section>
