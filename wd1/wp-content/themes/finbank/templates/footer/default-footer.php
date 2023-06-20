<?php
/**
 * Footer Template  File
 *
 * @package FINBANK
 * @author  Template Path
 * @version 1.0
 */

$options = finbank_WSH()->option();

$footer_bg_image = $options->get( 'footer_bg_image' );
$footer_bg_image = finbank_set( $footer_bg_image, 'url' );

$footer_logo = $options->get( 'footer_logo' );
$footer_logo = finbank_set( $footer_logo, 'url' );

$allowed_html = wp_kses_allowed_html( 'post' );

?>
    
    <?php if( is_active_sidebar( 'footer-sidebar' ) ):?>
    <!--Start footer area -->
    <footer class="footer-area">
        <?php if($options->get( 'show_footer_v1_bg_image' )){?>
        <div class="right-shape">
            <img src="<?php echo esc_url($footer_bg_image); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
        </div>
        <?php } ?>
		<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
        <!--Start Footer Top-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div>            
        </div>
        <!--End Footer Top-->
		<?php } ?>
        <?php if( $options->get( 'show_footer_v1_logo_image' ) || $options->get( 'show_footer_v1_copyright_text' ) || $options->get('show_contact_info') || $options->get('show_contact_info2') ){?>
        <!--Start Footer-->
        <div class="footer">
            <div class="container">
                <div class="row">

                    <!--Start single footer widget-->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-footer-widget marbtm50">
                            <div class="our-company-info">
                                <?php if($options->get( 'show_footer_v1_logo_image' )){?>
                                <div class="footer-logo-style1">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                    </a>
                                </div>
                                <?php } ?>
                                <?php if($options->get( 'show_footer_v1_copyright_text' )){?>
                                <div class="copyright-text">
                                    <p><?php echo wp_kses( $options->get( 'footer_v1_copyright_text'), $allowed_html ); ?></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->

                    <!--Start single footer widget-->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-footer-widget marbtm50">
                            <div class="footer-widget-contact-info">
                                <ul>
                                    <?php if($options->get('show_contact_info')){?>
                                    <li>
                                        <?php if($options->get('footer_phone_no')){?>
                                        <h3>
                                            <a href="tel:<?php echo esc_attr($options->get('footer_phone_no')); ?>"><?php echo wp_kses($options->get('footer_phone_no'), true); ?></a>
                                        </h3>
                                        <?php } ?>
                                        <p><?php echo wp_kses($options->get('footer_phone_title'), true); ?></p>
                                    </li>
                                    <?php } ?>
                                    <?php if($options->get('show_contact_info2')){?>
                                    <li>
                                        <h3><?php echo wp_kses($options->get('footer_whours'), true); ?></h3>
                                        <p><?php echo wp_kses($options->get('footer_whours_title'), true); ?></p>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->

                    <!--Start single footer widget-->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-footer-widget">
                            <div class="single-footer-widget-right-colum">
                                <?php if($options->get('show_button_info')){?>
                                <ul>
                                    <?php if($options->get('footer_btn_title')){?>
                                    <li>
                                        <a href="<?php echo esc_url($options->get('footer_btn_link')); ?>">
                                            <?php echo wp_kses($options->get('footer_btn_title'), true); ?>
                                            <span class="icon-download"></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if($options->get('footer_btn_title2')){?>
                                    <li>
                                        <a href="<?php echo esc_url($options->get('footer_btn_link2')); ?>">
                                            <?php echo wp_kses($options->get('footer_btn_title2'), true); ?>
                                            <span class="icon-feedback"></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->

                </div>
            </div>
        </div>
        <!--End Footer-->
		<?php };?>
        <?php if($options->get('show_footer_menu')){?>
        <div class="footer-bottom">
            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get('show_footer_menu')){?>
                    <div class="footer-menu">
                        <ul>
                            <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
								'container_class'=>'navbar-collapse collapse navbar-right',
								'menu_class'=>'nav navbar-nav',
								'fallback_cb'=>false,
								'items_wrap' => '%3$s',
								'container'=>false,
								'depth'=>'1',
								'walker'=> new Bootstrap_walker()
							) ); ?>
                        </ul>
                    </div>
                    <?php } ?>
					<?php
						if($options->get( 'show_social_icons_v1' )):
						$icons = $options->get( 'footer_v1_social_share' );
						if ( ! empty( $icons ) ) :
					?>
					<div class="footer-social-link">
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
		<?php };?>
    </footer>
    <!--End footer area-->
    <?php endif;?>
