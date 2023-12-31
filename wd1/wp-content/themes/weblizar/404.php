<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage weblizar
*/
get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="not-found-404">
				<h2><?php echo esc_html__('Error 404','weblizar'); ?><i class="iscon-remove-sign skin-text"></i></h2>
				<p><?php echo esc_html__("We are sorry, but the page you were looking for does not exist.", 'weblizar'); ?></p> 
				<p class="search-404"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary search-submit"><?php esc_html_e('Go to Homepage','weblizar'); ?></a></p>					
			</div>
		</div>
	</div>
 </div>
<?php get_footer(); ?>