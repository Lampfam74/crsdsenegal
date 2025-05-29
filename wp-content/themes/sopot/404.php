<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage sopot
 * @author     thememx
 * @version    1.0
 */
global $redux_builder_sopot;
$options = isset($redux_builder_sopot) ? $redux_builder_sopot : null;
$allowed_html = wp_kses_allowed_html( 'post' );


$error_img   = $options ? $options->get('404_message') : 'Page non trouvée';
$error_img   = sopot_set( $error_img, 'url', sopot_URI . 'assets/images/icons/error.png' );

?>
<?php get_header();
$data = \sopot\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'sopot_banner', $data );
$options = sopot_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
		
?>

<!-- error-section -->
<section class="error-section centred">
    <div class="container">
        <div class="inner-box text-center">
            <h1>
				<?php 
                    if( $options->get( '404_page_title' ) ){
                        echo wp_kses( $options->get( '404_page_title' ), true );
                    }else{
                        esc_html_e( '404', 'sopot' );
                    }
                ?>
            </h1>
            <h2>
				<?php 
                    if( $options->get( '404_page_text' ) ){
                        echo wp_kses( $options->get( '404_page_text' ), true );
                    }else{
                        esc_html_e( 'Oops! The page you are looking for does not exist. Please return to  the site’s homepage.', 'sopot' );
                    }
                ?>
            </h2>
            <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
            <div class="error-page__btn"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="thm-btn">
                <span class="txt">
				<?php 
                    if( $options->get( 'back_home_btn_label' ) ){
                        echo wp_kses( $options->get( 'back_home_btn_label' ), true );
                    }else{
                        esc_html_e( 'Go To Home', 'sopot' );
                    }
                ?>
                </span>
            </a></div>
        	<?php endif; ?>
        </div>
    </div>
</section>
<!-- error-section end -->
	
        
<?php
}
get_footer(); ?>
