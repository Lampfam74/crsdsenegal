<?php
/**
 * Search Form template
 *
 * @package sopot
 * @author thememx
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<!-- Search -->
<div class="search-widget">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post" class="search-form">
        <div class="form-group">
            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search', 'sopot' ); ?>" required>
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
<!-- search end -->