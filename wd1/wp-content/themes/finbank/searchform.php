<?php
/**
 * Search Form template
 *
 * @package FINBANK
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="sidebar-search-box">
    <form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Keyword', 'finbank' ); ?>" type="text">
        <button type="submit">
            <i class="icon-search"></i>
        </button>
    </form>
</div>