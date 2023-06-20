<?php
/**
 * Footer Main File.
 *
 * @package FINBANK
 * @author  Theme Kalia
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

	<div class="clearfix"></div>

	<?php finbank_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>

	 <!--Scroll to top-->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <i class="icon-chevron"></i>
    </a>

</div>
<!--End Page Wrapper-->

<?php wp_footer(); ?>
</body>
</html>
