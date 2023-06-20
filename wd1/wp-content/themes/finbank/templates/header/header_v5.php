<?php
$options = finbank_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Home One Logo Settings
$home1_logo = $options->get( 'light_color_logo' );
$home1_logo_dimension = $options->get( 'light_color_logo_dimension' );

//Mobile Logo Settings
$home4_logo = $options->get( 'light_color_logo4' );
$home4_logo_dimension = $options->get( 'light_color_logo_dimension4' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>
	
    <?php if( $options->get( 'theme_preloader' ) ):?>
	<!-- Start preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close"><?php esc_html_e('x', 'finbank'); ?></div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <?php echo wp_kses($options->get('preloader_text'), true); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End preloader -->
	<?php endif; ?>

    <div class="page-wrapper">
        <header class="main-header main-header-style1">
			<?php if($options->get('show_topbar_v5')){ ?>
            <!--Start Main Header Style1 Top-->
            <div class="main-header-style1-top">
                <div class="auto-container">
                    <div class="outer-box">
                        <!--Start Main Header Style1 Top Left-->
                        <div class="main-header-style1-top__left">
                            <?php if($options->get('show_email_info_v5')){ ?>
                            <div class="looking-banking-box ">
                                <div class="inner-title">
                                    <span class="icon-payment"></span>
                                    <p><?php echo wp_kses($options->get('email_info_v5'), true); ?></p>
                                </div> 
                            </div>
                            <?php } ?>
                            <?php if($options->get('show_find_location_v5')){ ?>
                            <div class="nearest-branch">
                                <span class="icon-map"></span>
                                <a href="<?php echo esc_url($options->get('find_location_link_v5')); ?>"><?php echo wp_kses($options->get('find_location_v5'), true); ?></a>
                            </div>
                            <?php } ?>
                        </div>
                        <!--End Main Header Style1 Top Left-->
                        <!--Start Main Header Style1 Top Right-->
                        <div class="main-header-style1-top__right">
                            <?php if($options->get('show_top_menu_v5')){ ?>
                            <div class="header-menu-style1">
                                <ul>
                                    <?php wp_nav_menu( array( 'theme_location' => 'top_menu', 'container_id' => 'navbar-collapse-1',
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
                            <?php if( $options->get('show_seach_form_v5') ){?>
                            <div class="box-search-style1">
                                <a href="#" class="search-toggler">
                                    <span class="icon-search"></span>
                                    <?php echo wp_kses($options->get('search_icon_title_v5'), true); ?>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <!--End Main Header Style1 Top Right-->
                    </div>
                </div>
            </div>
            <!--End Main Header Style1 Top-->
			<?php } ?>
            <nav class="main-menu main-menu-style1">
                <div class="main-menu__wrapper clearfix">
                    <div class="container">
                        <div class="main-menu__wrapper-inner">

                            <div class="main-menu-style1-left">
                                <div class="logo-box-style1">
                                    <?php echo finbank_logo( $logo_type, $home1_logo, $home1_logo_dimension, $logo_text, $logo_typography ); ?>
                                </div>

                                <div class="main-menu-box">
                                    <a href="#" class="mobile-nav__toggler">
                                        <i class="icon-menu"></i>
                                    </a>

                                    <ul class="main-menu__list one-page-scroll-menu">
                                        <?php wp_nav_menu( array( 'theme_location' => 'onepage_menu', 'container_id' => 'navbar-collapse-1',
											'container_class'=>'navbar-collapse collapse navbar-right',
											'menu_class'=>'nav navbar-nav',
											'fallback_cb'=>false,
											'items_wrap' => '%3$s',
											'container'=>false,
											'depth'=>'3',
											'walker'=> new Bootstrap_walker()
										) ); ?> 
                                    </ul>
                                </div>
                            </div>

                            <div class="main-menu-style1-right">
                                <div class="header-btn-one">
                                    <?php if($options->get('show_login_btn_v5')){ ?>
                                    <a href="<?php echo esc_url($options->get('login_btn_link_v5')); ?>">
                                        <span class="icon-home-button"></span><?php echo wp_kses($options->get('login_btn_title_v5'), true); ?>
                                    </a>
                                    <?php } ?>
                                    <?php if($options->get('show_account_btn_v5')){ ?>
                                    <a class="style2" href="<?php echo esc_url($options->get('account_btn_link_v5')); ?>">
                                        <span class="icon-payment"></span><?php echo wp_kses($options->get('account_btn_title_v5'), true); ?>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>
			<?php if($options->get('show_bottombar_v5')){ ?>
            <!--Start Main Header Style1 Bottom-->
            <div class="main-header-style1-bottom">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="update-box">
                            <?php if($options->get('update_title_v5')){ ?>
                            <div class="inner-title">
                                <span class="icon-megaphone"></span>
                                <h4><?php echo wp_kses($options->get('update_title_v5'), true); ?></h4>
                            </div>
                            <?php } ?>
                            <?php if($options->get('update_text_v5') || $options->get('btn_title_v5')){ ?>
                            <div class="text">
                                <?php if($options->get('update_text_v5')){ ?><p><?php echo wp_kses($options->get('update_text_v5'), true); ?></p><?php } ?>
                                <?php if($options->get('btn_title_v5')){ ?><a href="<?php echo esc_url($options->get('btn_link_v5')); ?>"><span class="icon-chevron"></span><?php echo wp_kses($options->get('btn_title_v5'), true); ?></a><?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if($options->get('show_customer_text_v5')){ ?>
                        <div class="slogan-box">
                            <p><?php echo wp_kses($options->get('customer_text_v5'), true); ?></p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--End Main Header Style1 Bottom-->
			<?php } ?>
        </header>


        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->
		
        <div class="mobile-nav__wrapper">
            <div class="mobile-nav__overlay mobile-nav__toggler"></div>
            <div class="mobile-nav__content">
                <span class="mobile-nav__close mobile-nav__toggler">
                    <i class="fas fa-plus"></i>
                </span>
                <div class="logo-box">
                    <?php echo finbank_logo( $logo_type, $home4_logo, $home4_logo_dimension, $logo_text, $logo_typography ); ?>
                </div>
                <div class="mobile-nav__container"></div>
                <?php if( $options->get('show_mobile_info_v5') ){?>
                <ul class="mobile-nav__contact list-unstyled">
                    <?php if($options->get('mobile_email_v5')){ ?>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:<?php echo esc_attr($options->get('mobile_email_v5')); ?>"><?php echo wp_kses($options->get('mobile_email_v5'), true); ?></a>
                    </li>
                    <?php } ?>
                    <?php if($options->get('mobile_phone_v5')){ ?>
                    <li>
                        <i class="fa fa-phone-alt"></i>
                        <a href="tel:<?php echo esc_attr($options->get('mobile_phone_v5')); ?>"><?php echo wp_kses($options->get('mobile_phone_v5'), true); ?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?php
					if( $options->get('show_msocial_share_v5') ):
					$icons = $options->get( 'mobile_social_share_v5' );
					if ( ! empty( $icons ) ) :
				?>
				<div class="mobile-nav__social">
					<?php
                    foreach ( $icons as $h_icon ) :
                    $header_social_icons = json_decode( urldecode( finbank_set( $h_icon, 'data' ) ) );
                    if ( finbank_set( $header_social_icons, 'enable' ) == '' ) {
                        continue;
                    }
                    $icon_class = explode( '-', finbank_set( $header_social_icons, 'icon' ) );
                    ?>
                        <a href="<?php echo esc_url(finbank_set( $header_social_icons, 'url' )); ?>" <?php if( finbank_set( $header_social_icons, 'background' ) || finbank_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(finbank_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(finbank_set( $header_social_icons, 'color' )); ?>"<?php endif;?> class="fab <?php echo esc_attr( finbank_set( $header_social_icons, 'icon' ) ); ?>"></a>
                    <?php endforeach; ?>					
                </div>
				<?php endif; endif; ?>
                <?php } ?>
            </div>
        </div>

		<?php if( $options->get('show_seach_form_v5') ){?>
        <div class="search-popup">
            <div class="search-popup__overlay search-toggler"></div>
            <?php get_template_part('searchform1')?>
        </div>
		<?php } ?>