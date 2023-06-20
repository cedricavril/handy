<?php get_header();
$data = \FINBANK\Includes\Classes\Common::instance()->data('single-team')->get(); ?>

<!--Start breadcrumb area-->
<section class="breadcrumb-area">
    <div class="breadcrumb-area-bg" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content">
                    <div class="title">
                        <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( '' ) ); ?></h2>
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

<?php while (have_posts()) : the_post(); ?>

<!--
=====================================================
    Team Details
=====================================================
-->
<!-- team-details -->
<section class="team-details">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <?php if(has_post_thumbnail()):?>
                <div class="image-box">
                    <div class="image-shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/backgrounds/pattern-8.png);"></div>
                    <figure class="image image-1"><?php the_post_thumbnail('finbank_370x505'); ?></figure>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content-box">
                    <h2><span><?php esc_html_e('Hi, I am', 'finbank');?></span> <?php the_title(); ?></h2>
                    <span class="designation special-font"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                    <div class="text">
                        <?php the_content();?>                        
                    </div>
                    <div class="contact-inner">
                        <h6><?php esc_html_e('Contact me', 'finbank');?></h6>
                        <h3><a href="mailto:<?php echo (get_post_meta( get_the_id(), 'team_email', true ));?>"><?php echo (get_post_meta( get_the_id(), 'team_email', true ));?></a></h3>
                        <?php 
							$icons = get_post_meta( get_the_id(), 'social_profile', true );
							if ( ! empty( $icons ) ) : 
						?>
                        <ul class="social-links clearfix">
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team-details end -->

<?php endwhile; ?>
<?php get_footer(); ?>