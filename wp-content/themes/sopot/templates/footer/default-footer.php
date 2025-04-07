<?php
/**
 * Footer Template  File
 *
 * @package sopot
 * @author  Template Path
 * @version 1.0
 */

$options = sopot_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

?>

<!-- main-footer -->
<section class="main-footer" id="footer">
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="copyright-text"><?php echo wp_kses( $options->get( 'copyright_text', '&copy; Copyright <span id="currentYear"></span> by <a href="#">sopot</a>' ), true ); ?></div>
            </div>
        </div>
    </div>
</section>
<!-- main-footer end -->