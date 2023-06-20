<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Finbank
 * @author     Template Path <admin@template_path.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );

?>
<?php get_header();
$data = \FINBANK\Includes\Classes\Common::instance()->data( '404' )->get();
$options = finbank_WSH()->option();
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
                    <div class="title" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="500">
                        <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( '' ) ); ?></h2>
                    </div>
                    <div class="breadcrumb-menu" data-aos="fade-left" data-aos-easing="linear"
                        data-aos-duration="500">
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
    
    <!--Start Error Page Area-->
    <section class="error-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="error-content text-center">
                        <div class="big-title wow fadeInDown" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <h2>
                            	<?php 
									if( $options->get( '404_page_title' ) ){
										echo wp_kses( $options->get( '404_page_title' ), true );
									}else{
										esc_html_e( 'Oh...ho...', 'finbank' );
									}
								?>
                            </h2>
                        </div>
                        <div class="title wow fadeInDown" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <h2>
                            	<?php if( $options->get( '404_page_text' ) ):?>
										<?php echo wp_kses( $options->get( '404_page_text' ), true );?>
                                <?php else:?>
                                        <?php esc_html_e( 'Sorry, Something Went Wrong.', 'finbank' );?>
                                <?php endif;?>
                            </h2>
                        </div>
                        <div class="text">
                            <p>
                            	<?php if( $options->get( '404_page_text2' ) ):?>
										<?php echo wp_kses( $options->get( '404_page_text2' ), true );?>
                                <?php else:?>
                                        <?php esc_html_e( 'The page you are looking for was moved, removed, renamed or never existed.', 'finbank' );?>
                                <?php endif;?>
                            </p>
                        </div>
						<?php if ( $options->get( '404_search_form', true ) ) : ?>
                        <div class="error-page-search-box">
                            <form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <input name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search ...', 'finbank' ); ?>" type="text">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <?php endif; ?>
                        <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                        <div class="btns-box wow slideInUp" data-wow-delay="200ms" data-wow-duration="1500ms">                            
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-one">
                                <span class="txt"><?php 
                                    if( $options->get( 'back_home_btn_label' ) ){
                                        echo wp_kses( $options->get( 'back_home_btn_label' ), true );
                                    }else{
                                        esc_html_e( 'Back to Home', 'finbank' );
                                    }
                                ?><i class="icon-refresh arrow"></i></span>
                            </a>
                        </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Error Page Area-->    
        
<?php
}
get_footer(); ?>
