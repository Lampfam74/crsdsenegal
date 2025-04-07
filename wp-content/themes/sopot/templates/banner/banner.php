<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage thememx
 * @author     thememx
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}

?>
<?php if ( $data->get( 'enable_banner' ) ) : ?>

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
        
<?php endif; ?>









