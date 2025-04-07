<?php
/**
 * Search Form template
 *
 * @package sopot
 * @author Template Path
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr__( 'Search....', 'sopot' ); ?>" required="">
        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
    </div>
</form>