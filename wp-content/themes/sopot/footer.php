<?php
/**
 * Footer Main File.
 *
 * @package sopot
 * @author  thememx
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

	<div class="clearfix"></div>

	<?php sopot_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>


    

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post" class="search-form">
                <label class="sr-only"><?php echo esc_html__( 'search here', 'sopot' ); ?></label>
                <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search', 'sopot' ); ?>" required>
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-search-interface-symbol"></i>
                </button>
            </form>
        </div>
    </div>


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <i class="fa fa-angle-up"></i>
    </a>
	
</div>
<!--End Page Wrapper-->

<?php wp_footer(); ?>
</body>
</html>
