<?php
/**
 * Blog Post Main File.
 *
 * @package sopot
 * @author  thememx
 * @version 1.0
 */

get_header();
$data  = \sopot\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xl-9 col-lg-8 col-md-12 col-sm-12';
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

<section class="blog-page">
	<div class="container">
		<div class="row">        
            <div class="content-side col-md-12">
                <div class="wp-style content-side">
                    
					<?php while ( have_posts() ): the_post(); ?>
                    <div class="text page_text ">    
					<?php the_content(); ?>
					</div>					
                    <?php endwhile; ?>
                    
                    <div class="clearfix"></div>
                    <?php
                    $defaults = array(
                        'before' => '<div class="paginate_links">' . esc_html__( 'Pages:', 'sopot' ),
                        'after'  => '</div>',
    
                    );
                    wp_link_pages( $defaults );
                    ?>
                    <?php comments_template() ?>
                </div>
            </div> 
        </div>
	</div>
</section><!-- blog section with pagination -->



<?php get_footer(); ?>
