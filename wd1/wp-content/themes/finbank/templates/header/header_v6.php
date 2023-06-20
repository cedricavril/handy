<?php
$options = finbank_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Color Logo Settings
$home2_logo = $options->get( 'light_color_logo2' );
$home2_logo_dimension = $options->get( 'light_color_logo_dimension2' );

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

        <header class="main-header main-header-style2">
			<?php if($options->get('show_topbar_v6')){ ?>
            <!--Start Main Header Style2 Top-->
            <div class="main-header-style2__top">
                <div class="auto-container">
                    <div class="outer-box">
                        <?php if($options->get('show_notify_v6')){ ?>
                        <!--Start Main Header Style2 Top Left-->
                        <div class="main-header-style2__top-left">
                            <div class="notification-box">
                                <div class="icon">
                                    <span class="icon-notification"></span>
                                </div>                                
                                <p>
                                    <?php echo wp_kses($options->get('notify_text_v6'), true); ?>
                                    <?php if($options->get('notify_link_v6')){ ?><a href="<?php echo esc_url($options->get('notify_link_v6')); ?>"><span class="icon-right-arrow"></span></a><?php } ?>
                                </p>                                
                            </div>
                        </div>
                        <!--End Main Header Style2 Top Left-->
						<?php } ?>
                        <!--Start Main Header Style2 Top Right-->
                        <div class="main-header-style2__top-right">
                            <?php if($options->get('show_top_menu_v6')){ ?>
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
                            <?php if( $options->get('show_seach_form_v6') ){?>
                            <div class="box-search-style1">
                                <a href="#" class="search-toggler">
                                    <span class="icon-search"></span>
                                    <?php echo wp_kses($options->get('search_icon_title_v6'), true); ?>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <!--End Main Header Style2 Top Right-->
                    </div>
                </div>
            </div>
            <!--End Main Header Style2 Top-->
			<?php } ?>
            <nav class="main-menu main-menu-style2">
                <div class="main-menu__wrapper clearfix">
                    <div class="container">
                        <div class="main-menu__wrapper-inner">

                            <div class="main-menu-style2-left">
                                <div class="logo-box-style2">
                                    <?php echo finbank_logo( $logo_type, $home2_logo, $home2_logo_dimension, $logo_text, $logo_typography ); ?>
                                </div>
								<?php if($options->get('show_address_info_v6')){ ?>
                                <div class="looking-banking-box looking-banking-box--style2">
                                    <div class="icon">
                                        <span class="icon-map"></span>
                                    </div>
                                    <div class="select-box clearfix">
                                        <p><?php esc_html_e('Address', 'finbank'); ?></p>
                                        <?php echo wp_kses($options->get('address_v6'), true); ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
							
                            <div class="main-menu-style2-right">

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
								<?php if($options->get('show_account_btn_v6')){ ?>
                                <div class="header-btn-one">
                                    <a href="<?php echo esc_url($options->get('account_btn_link_v6')); ?>"><?php echo wp_kses($options->get('account_btn_title_v6'), true); ?></a>
                                </div>
                                <?php } ?>
								<?php if($options->get('show_login_btn_v6')){ ?>
                                <div class="header-logon-box">
                                    <div class="icon">
                                        <span class="icon-home-button"></span>
                                    </div>                                    
                                    <div class="select-box style-two">
                                        <a href="<?php echo esc_url($options->get('login_btn_link_v6')); ?>">
                                            <?php echo wp_kses($options->get('login_btn_title_v6'), true); ?>
                                        </a>
                                    </div>
                                </div>
								<?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>

        </header>


        <div class="stricky-header stricky-header--style2 stricked-menu main-menu">
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
                <?php if( $options->get('show_mobile_info_v6') ){?>
                <ul class="mobile-nav__contact list-unstyled">
                    <?php if($options->get('mobile_email_v6')){ ?>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:<?php echo esc_attr($options->get('mobile_email_v6')); ?>"><?php echo wp_kses($options->get('mobile_email_v6'), true); ?></a>
                    </li>
                    <?php } ?>
                    <?php if($options->get('mobile_phone_v6')){ ?>
                    <li>
                        <i class="fa fa-phone-alt"></i>
                        <a href="tel:<?php echo esc_attr($options->get('mobile_phone_v6')); ?>"><?php echo wp_kses($options->get('mobile_phone_v6'), true); ?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?php
					if( $options->get('show_msocial_share_v6') ):
					$icons = $options->get( 'mobile_social_share_v6' );
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

		<?php if( $options->get('show_seach_form_v6') ){?>
        <div class="search-popup">
            <div class="search-popup__overlay search-toggler"></div>
            <?php get_template_part('searchform1')?>
        </div>
		<?php } ?>
