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

$footer_logo_v2 = $options->get( 'footer_logo_v2' );
$footer_logo_v2 = finbank_set( $footer_logo_v2, 'url', FINBANK_URI . 'assets/images/footer/footer-logo-2.png' );

?>
    
    
    <!--Start footer area -->
    <footer class="footer-area footer-area--style2">

        <!--Start Footer Top-->
        <div class="footer-top-style2">
            <div class="container">
                <div class="row">

                    <div class="col-xl-7">
                        <div class="footer-top-style2__left-content">
                            <!--Start Our Company Info-->
                            <div class="our-company-info">
                                <?php if($options->get( 'show_footer_v2_logo_image' )){?>
                                <div class="footer-logo-style1">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img src="<?php echo esc_url($footer_logo_v2); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                    </a>
                                </div>
                                <?php } ?>
                                <div class="bottom-text2">
                                    <p><?php echo wp_kses($options->get('footer_description_v2'), true); ?></p>
                                    <div class="btn-box">
                                        <a href="<?php echo esc_url($options->get('footer_btn_link_v2'), true); ?>"><span class="icon-right-arrow"></span> <?php echo wp_kses($options->get('footer_btn_title_v2'), true); ?></a>
                                    </div>
                                </div>
                            </div>
                            <!--End Our Company Info-->
                            <?php if(has_nav_menu('footer_about_menu')){ ?>
                            <!--Start Footer Top Style2 Left Content Inner-->
                            <div class="footer-top-style2__left-content-inner">
                                <ul>
								<?php wp_nav_menu( array( 'theme_location' => 'footer_about_menu', 'container_id' => 'navbar-collapse-1',
                                    'container_class'=>'navbar-collapse collapse navbar-right',
                                    'menu_class'=>'nav navbar-nav',
                                    'fallback_cb'=>false,
                                    'items_wrap' => '%3$s',
                                    'container'=>false,
                                    'depth'=>'1',
                                    'walker'=> new Bootstrap_walker()
                                )); ?>
								</ul>
                            </div>
                            <!--End Footer Top Style2 Left Content Inner-->
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-xl-5">
                        <div class="footer-top-style2__right-content">
                            <div class="footer-contact-info-style">
                                <ul>
                                    <?php if($options->get('footer_branch_title_v2') || $options->get('footer_branch_address_v2')){ ?>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-map"></span>
                                        </div>
                                        <div class="text">
                                            <h3><?php echo wp_kses($options->get('footer_branch_title_v2'), true); ?></h3>
                                            <p><?php echo wp_kses($options->get('footer_branch_address_v2'), true); ?></p>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    
                                    <?php if($options->get('footer_phone_no_v2') || $options->get('footer_email_address_v2')){ ?>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-phone-call"></span>
                                        </div>
                                        <div class="text">
                                            <h3><?php echo wp_kses($options->get('footer_help_desk_title_v2'), true); ?></h3>
                                            <p><?php esc_html_e('Call to:', 'finbank'); ?> <a href="tel:<?php echo esc_attr($options->get('footer_phone_no_v2'), true); ?>"><?php echo wp_kses($options->get('footer_phone_no_v2'), true); ?></a></p>
                                            <p><?php esc_html_e('Send a Mail:', 'finbank'); ?> <a href="mailto:<?php echo esc_attr($options->get('footer_email_address_v2'), true); ?>"><?php echo wp_kses($options->get('footer_email_address_v2'), true); ?></a></p>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="find-nearest-branch-box">
                                <div class="top-outer">
                                    <div class="top">
                                        <div class="icon">
                                            <span class="icon-bank-1"></span>
                                        </div>
                                        <div class="inner-title">
                                            <h3><?php echo wp_kses($options->get('footer_zip_code_address_v2'), true); ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-box1">
                                    <div class="zip-form">
                                        <?php echo do_shortcode($options->get('footer_zip_code_form_v2'), true); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--End Footer Top-->

        <div class="footer-bottom-style2">
            <div class="container">
                <div class="bottom-inner">
                    <?php if($options->get('show_footer_menu_v2')){?>
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
                    <?php if($options->get('show_footer_backtotop_v2')){?>
                    <div class="scrool-top-btn-style2">
                        <a href="#" data-target="html" class="scroll-to-target scroll-to-top--style2">
                            <i class="icon-diagonal-arrow"></i><?php esc_html_e('Back to Top', 'finbank');?>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </footer>
    <!--End footer area-->
