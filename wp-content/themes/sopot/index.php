<?php
/**
 * Blog Main File.
 *
 * @package sopot
 * @author  thememx
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \sopot\Includes\Classes\Common::instance()->data( 'blog' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xl-12 col-lg-12 col-md-12 col-sm-12' : 'col-xl-8 col-lg-8 col-md-12 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
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
    
<!-- blog page -->
<section class="blog-sidebar">
        <div class="container">
        <div class="row">                
            <!--Sidebar Start-->
            <?php
                if ( $data->get( 'layout' ) == 'left' ) {
                    do_action( 'sopot_sidebar', $data );
                }
            ?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
                <div class="blog-page-content">	
                    <div class="thm-unit-test">                        
                        <?php
                            while ( have_posts() ) :
                                the_post();
                                sopot_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                            endwhile;
                            wp_reset_postdata();
                        ?>                            
                    </div>                
                    <!--Pagination-->
                    <div class="pagination-wrapper">
                        <?php sopot_the_pagination( $wp_query->max_num_pages );?>
                    </div>
                </div>
            </div>            
            <!--Sidebar Start-->
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
