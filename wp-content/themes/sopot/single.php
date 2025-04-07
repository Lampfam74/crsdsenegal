<?php
/**
 * Blog Post Main File.
 *
 * @package sopot
 * @author  thememx
 * @version 1.0
 */

 get_header();
 $data    = \sopot\Includes\Classes\Common::instance()->data( 'single' )->get();
 $layout = $data->get( 'layout' );
 $sidebar = $data->get( 'sidebar' );
 $class = ( $data->get( 'layout' ) != 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-8' : 'col-xs-12 col-sm-12 col-md-12';
 
 $options = sopot_WSH()->option();
 
 if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
     
     while(have_posts()) {
        the_post();
        the_content();
     }
 
 } else {
     ?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'sopot_banner', $data );?>
<?php else:?>

<!--  Page Title -->
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

<!--  blog-details -->
<section class="blog-details">
    <div class="container">
        <div class="row">   
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'sopot_sidebar', $data );
				}
			?>
            <div class="content-side <?php if(is_active_sidebar( $sidebar ) ): echo esc_attr_e( 'col-xl-8', 'sopot' ); else : echo esc_attr_e( 'col-xl-12', 'sopot' ); endif;?>		">         	
				<?php while ( have_posts() ) : the_post(); ?>
                <div class="blog-details__content ">
                    <?php sopot_template_load( 'templates/blog-single/single-content.php', compact( 'options', 'data' ) ); ?>
                </div>
                <!--End blog-content-->
				<?php endwhile; ?>                
            </div>
            
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'sopot_sidebar', $data );
				}
			?>
        </div>
    </div>
</section>
<!--End blog area--> 

<?php
}
get_footer();
