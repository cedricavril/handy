<?php
/**
 * Footer Template  File
 *
 * @package FINBANK
 * @author  Template Path
 * @version 1.0
 */

$options = finbank_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

?>
  	
    <!--Start footer area -->
    <footer class="footer-area footer-area--style3">
		<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
        <!--Start Footer Top-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
					<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                </div>
            </div>
        </div>
        <!--End Footer Top-->
		<?php } ?>

        <div class="footer-bottom">
            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get('show_footer_menu_v3')){?>
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
						if($options->get( 'show_social_icons_v3' )):
						$icons = $options->get( 'footer_v3_social_share' );
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

    </footer>
    <!--End footer area-->
