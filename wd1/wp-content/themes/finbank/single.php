<?php
/**
 * Blog Post Main File.
 *
 * @package FINBANK
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$options = finbank_WSH()->option();

$data    = \FINBANK\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-12' : 'col-lg-9 col-md-12 col-sm-12';


if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

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
                        <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( ) ); ?></h2>
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

<!--Start Blog Details Area-->
<section class="blog-details-area">
    <div class="container">
        <div class="row">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'finbank_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post(); ?>
				
                <div class="blog-details-box">
                	
                    <div class="thm-unit-test">    
                        <?php if(has_post_thumbnail()){ ?>
                        <div class="blog-details-img-box">                            
                            <div class="inner">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="blog-details-text-box">                        	 
                            
                            <div class="text"><?php the_content(); ?></div>
                            <div class="clearfix"></div>
                            <?php wp_link_pages(array('before'=>'<div class="paginate-links m-t30">'.esc_html__('Pages: ', 'finbank'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                            
							<?php if(has_tag()):?>
                            <div class="tag-box">
                                <ul class="tag-list">
                                    <?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
                                </ul>
                            </div>
                            <?php endif;?>
                            
							<?php if((get_previous_post()) || (get_next_post())): ?>
                            <div class="blog-details-page__prev-next-option">
                                <?php global $post; $prev_post = get_previous_post();
									if (!empty($prev_post)):
									$post_thumbnail_id = get_post_thumbnail_id($prev_post->ID);
									$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
								?>
                                <div class="single-box left">
                                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                                        <div class="icon-box">
                                            <span class="icon-right-arrow"></span><?php esc_html_e(' Prev Post', 'finbank'); ?>
                                        </div>
                                        <div class="title-box">
                                            <h3><?php echo wp_kses_post($prev_post->post_title); ?></h3>
                                        </div>
                                    </a>
                                </div>
                                <?php endif ?>
                                <?php global $post; $next_post = get_next_post();
									if (!empty($next_post)):
									$post_thumbnail_ids = get_post_thumbnail_id($next_post->ID);
									$post_thumbnail_urls = wp_get_attachment_url( $post_thumbnail_ids );
								?>
                                <div class="single-box right">
                                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                                        <div class="icon-box">
                                            <?php esc_html_e('Next Post ', 'finbank'); ?><span class="icon-right-arrow"></span>
                                        </div>
                                        <div class="title-box">
                                            <h3><?php echo wp_kses_post($next_post->post_title); ?></h3>
                                        </div>
                                    </a>
                                </div>
                                <?php endif ?>
                            </div>
                            <?php endif ?>
                            
                        	<?php if( $options->get( 'single_post_author_box' ) ):?>
                            <div class="author-box-holder">
                                <div class="inner-box">
                                    <?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
                                    <div class="img-box">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 140); ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="text">
                                        <h3><?php the_author(); ?></h3>
                                        <p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>                                       
										<?php if( $options->get( 'single_post_author_links' ) ):?>
                                            <?php $icons = $options->get( 'single_post_author_social_share' );
                                            if ( ! empty( $icons ) ) :
                                         ?>
                                         <div class="footer-social-link-style1">
                                             <ul class="clearfix">
                                               <?php
                                                foreach ( $icons as $h_icon ) :
                                                $header_social_icons = json_decode( urldecode( finbank_set( $h_icon, 'data' ) ) );
                                                if ( finbank_set( $header_social_icons, 'enable' ) == '' ) {
                                                    continue;
                                                }
                                                $icon_class = explode( '-', finbank_set( $header_social_icons, 'icon' ) );
                                                ?>
                                                <li><a href="<?php echo esc_url(finbank_set( $header_social_icons, 'url' )); ?>" <?php if( finbank_set( $header_social_icons, 'background' ) || finbank_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(finbank_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(finbank_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fab <?php echo esc_attr( finbank_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
                                               <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <?php endif; endif; ?>                            
                                    </div>
                                </div>
                            </div>
							<?php endif;?>
                        	
                            <!--End post-details-->
                        	<?php comments_template(); ?>                        
                    	</div>
                	</div>
					<!--End thm-unit-test-->
                </div>
                <!--End blog-content-->
				<?php endwhile; ?>
                
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
