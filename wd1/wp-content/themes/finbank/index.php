<?php
/**
 * Blog Main File.
 *
 * @package FINBANK
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \FINBANK\Includes\Classes\Common::instance()->data( 'blog' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-9 col-md-12 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>
	
    <?php if ( $data->get( 'enable_banner' ) ) : ?>
		<?php do_action( 'finbank_banner', $data );?>
    <?php else:?>
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area">
        <div class="breadcrumb-area-bg" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title">
                            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( get_the_title( '' ) ); ?></h2>
                        </div>
                        <div class="breadcrumb-menu">
                            <ul>
                                <?php echo finbank_the_breadcrumb(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->
    <?php endif;?>
    
    <!--Start Blog Page Two-->
    <section class="blog-page-two">
        <div class="container">
            <div class="row">
                <?php
                    if ( $data->get( 'layout' ) == 'left' ) {
                        do_action( 'finbank_sidebar', $data );
                    }
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                    <div class="blog-page-content-box">
                        <div class="thm-unit-test">
                            
                            <?php
                                while ( have_posts() ) :
                                    the_post();
                                    finbank_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                                endwhile;
                                wp_reset_postdata();
                            ?>
                                
                        </div>
                        
                        <!--Pagination-->
                    	<div class="styled-pagination clearfix">
                        	<?php finbank_the_pagination( $wp_query->max_num_pages );?>
                        </div>
                    </div>
                </div>
                <?php
                    if ( $data->get( 'layout' ) == 'right' ) {
                        do_action( 'finbank_sidebar', $data );
                    }
                ?>
            </div>
        </div>
    </section> 
    <!--End blog area--> 
	<?php
}
get_footer();
