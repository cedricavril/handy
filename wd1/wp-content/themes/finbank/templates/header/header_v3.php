<?php
$options = finbank_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Color Logo Settings
$home3_logo = $options->get( 'light_color_logo3' );
$home3_logo_dimension = $options->get( 'light_color_logo_dimension3' );

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
        <header class="main-header main-header-style3">
			<?php if($options->get('show_topbar_v3')){ ?>
            <!--Start Main Header Style3 Top-->
            <div class="main-header-style3__top">
                <div class="auto-container">
                    <div class="outer-box">

                        <!--Start Main Header Style3 Top Left-->
                        <div class="main-header-style3__top-left">
                            <?php if($options->get('show_pay_btn_v3')){ ?>
                            <div class="header-btn-one">
                                <a href="<?php echo esc_url($options->get('pay_btn_link_v3')); ?>"><?php echo wp_kses($options->get('pay_btn_title_v3'), true); ?></a>
                            </div>
                            <?php } ?>
                            <?php if($options->get('show_top_menu_v3')){ ?>
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
                        </div>
                        <!--End Main Header Style3 Top Left-->

                        <!--Start Main Header Style3 Top Right-->
                        <div class="main-header-style3__top-right">
                            <div class="header-contact-info-style1">
                                <ul>
                                    <?php if($options->get('show_top_address_v3')){ ?>
                                    <li><span class="icon-map"></span> <?php echo wp_kses($options->get('address_v3'), true); ?> </li>
                                    <?php } ?>
                                    <?php if($options->get('show_top_whours_v3')){ ?>
                                    <li><span class="icon-clock"></span> <?php echo wp_kses($options->get('whours_v3'), true); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php
								if( $options->get('show_social_share_v3') ):
								$icons = $options->get( 'social_share_v3' );
								if ( ! empty( $icons ) ) :
							?>
							<div class="header-social-link-style1">
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
                        <!--End Main Header Style3 Top Right-->

                    </div>
                </div>
            </div>
            <!--End Main Header Style3 Top-->
			<?php } ?>
            <nav class="main-menu main-menu-style3">
                <div class="main-menu__wrapper clearfix">
                    <div class="container">
                        <div class="main-menu__wrapper-inner">

                            <div class="main-menu-style3-left">
                                <?php if($options->get('show_login_btn_v3')){ ?>
                                <div class="header-logon-box">
                                    <div class="icon">
                                        <span class="icon-home-button"></span>
                                    </div>                                    
                                    <div class="select-box style-two">
                                        <a href="<?php echo esc_url($options->get('login_btn_link_v3')); ?>">
                                            <?php echo do_shortcode($options->get('login_btn_title_v3')); ?>
                                        </a>
                                    </div>
                                </div>
								<?php } ?>
                                <div class="logo-box-style3">
                                    <?php echo finbank_logo( $logo_type, $home3_logo, $home3_logo_dimension, $logo_text, $logo_typography ); ?>
                                </div>
                            </div>

                            <div class="main-menu-style3-middle">
                                <div class="main-menu-box">
                                    <a href="#" class="mobile-nav__toggler">
                                        <i class="icon-menu"></i>
                                    </a>

                                    <ul class="main-menu__list">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
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

                            <div class="main-menu-style3-right">
                                <?php if( $options->get('show_phone_no_v3') ){?>
                                <div class="phone-number-box-style1">
                                    <div class="icon">
                                        <span class="icon-headphones"></span>
                                    </div>
                                    <h5><?php echo wp_kses($options->get('phone_title_v3'), true); ?></h5>
                                    <h3><a href="tel:<?php echo esc_attr($options->get('phone_v3')); ?>"><?php echo wp_kses($options->get('phone_v3'), true); ?></a></h3>
                                </div>
                                <?php } ?>
								<?php if( $options->get('show_seach_form_v3') ){?>
                                <div class="box-search-style2">
                                    <a href="#" class="search-toggler">
                                        <span class="icon-search"></span>
                                        <?php echo wp_kses($options->get('search_icon_title_v3'), true); ?>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>

        </header>


        <div class="stricky-header stricky-header--style3 stricked-menu main-menu">
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
                <?php if( $options->get('show_mobile_info_v3') ){?>
                <ul class="mobile-nav__contact list-unstyled">
                    <?php if($options->get('mobile_email_v3')){ ?>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:<?php echo esc_attr($options->get('mobile_email_v3')); ?>"><?php echo wp_kses($options->get('mobile_email_v3'), true); ?></a>
                    </li>
                    <?php } ?>
                    <?php if($options->get('mobile_phone_v3')){ ?>
                    <li>
                        <i class="fa fa-phone-alt"></i>
                        <a href="tel:<?php echo esc_attr($options->get('mobile_phone_v3')); ?>"><?php echo wp_kses($options->get('mobile_phone_v3'), true); ?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?php
					if( $options->get('show_msocial_share_v3') ):
					$icons = $options->get( 'mobile_social_share_v3' );
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

		<?php if( $options->get('show_seach_form_v3') ){?>
        <div class="search-popup">
            <div class="search-popup__overlay search-toggler"></div>
            <?php get_template_part('searchform1')?>
        </div>
		<?php } ?>