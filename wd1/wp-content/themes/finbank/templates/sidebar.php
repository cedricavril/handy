<?php

/**
 * Sidebar Template
 *
 * @package    WordPress
 * @subpackage FINBANK
 * @author     ThemeKalia
 * @version    1.0
 */

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'sidebar_type' ) == 'e' AND $data->get( 'sidebar_elementor' ) ) {
	?>

	<!--Start Thm Sidebar Box-->
    <div class="col-xl-3 col-lg-3">
        <div class="thm-sidebar-box">
			<?php
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'sidebar_elementor' ) );
			?>
		</div>
	</div>
	<?php
	return false;
} else {
	$options = $data->get( 'sidebar' );
}
?>

<?php if ( is_active_sidebar( $options ) ) : ?>
	<!--Start Thm Sidebar Box-->
    <div class="col-xl-3 col-lg-3">
        <div class="thm-sidebar-box">
			<?php dynamic_sidebar( $options ); ?>
		</div>
	</div>
<?php endif; ?>

