<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'finbank' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'finbank' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'finbank' ),
				'e' => esc_html__( 'Elementor', 'finbank' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'finbank' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'finbank' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'finbank' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'finbank' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'finbank' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'finbank' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style 3', 'finbank' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v3.png',
			    ),
				'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style 4', 'finbank' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v4.png',
			    ),
				'header_v5'  => array(
				    'alt' => esc_html__( 'Header Style OnePager One', 'finbank' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v5.png',
			    ),
				'header_v6'  => array(
				    'alt' => esc_html__( 'Header Style OnePager Two', 'finbank' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v6.png',
			    ),
				'header_v7'  => array(
				    'alt' => esc_html__( 'Header Style OnePager Three', 'finbank' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v7.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'finbank' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		//Top Header Switcher
		array(
            'id' => 'show_topbar_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		
		//Email Info
		array(
            'id' => 'show_email_info',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Email Info', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'email_info_v1',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'show_email_info', '=', true ),
		),
		
		//Find Location Switcher
		array(
            'id' => 'show_find_location_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Branch Location', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'find_location_v1',
			'type'    => 'text',
			'title'   => __( 'Branch Location', 'finbank' ),
			'required' => array( 'show_find_location_v1', '=', true ),
		),
		array(
			'id'      => 'find_location_link_v1',
			'type'    => 'text',
			'title'   => __( 'Branch Location Link', 'finbank' ),
			'required' => array( 'show_find_location_v1', '=', true ),
		),
		
		//Top Header Menu Switcher
		array(
            'id' => 'show_top_menu_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Menu', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v1', '=', true ),
        ),
		
		//Top Search Icon Switcher
		array(
            'id' => 'show_seach_form_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon Box', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'search_icon_title_v1',
			'type'    => 'text',
			'title'   => __( 'Search Icon Title', 'finbank' ),
			'required' => array( 'show_seach_form_v1', '=', true ),
		),
		
		//Login Button Switcher
		array(
            'id' => 'show_login_btn_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'login_btn_title_v1',
			'type'    => 'text',
			'title'   => __( 'Login Button Title', 'finbank' ),
			'required' => array( 'show_login_btn_v1', '=', true ),
		),
		array(
			'id'      => 'login_btn_link_v1',
			'type'    => 'text',
			'title'   => __( 'Login Button Link', 'finbank' ),
			'required' => array( 'show_login_btn_v1', '=', true ),
		),
		
		//Account Button Switcher
		array(
            'id' => 'show_account_btn_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Account Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'account_btn_title_v1',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_account_btn_v1', '=', true ),
		),
		array(
			'id'      => 'account_btn_link_v1',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'finbank' ),
			'required' => array( 'show_account_btn_v1', '=', true ),
		),
		
		//Bottom Header Info Switcher
		array(
            'id' => 'show_bottombar_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Bottom Header Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'update_title_v1',
			'type'    => 'text',
			'title'   => __( 'Update Title', 'finbank' ),
			'required' => array( 'show_bottombar_v1', '=', true ),
		),
		array(
			'id'      => 'update_text_v1',
			'type'    => 'textarea',
			'title'   => __( 'Update Text', 'finbank' ),
			'required' => array( 'show_bottombar_v1', '=', true ),
		),
		array(
			'id'      => 'btn_title_v1',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_bottombar_v1', '=', true ),
		),
		array(
			'id'      => 'btn_link_v1',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'finbank' ),
			'required' => array( 'show_bottombar_v1', '=', true ),
		),
		array(
            'id' => 'show_customer_text_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Bottom Bar Right Info', 'finbank'),
            'default' => true,
            'required' => array( 'show_bottombar_v1', '=', true ),
        ),
		array(
			'id'      => 'customer_text_v1',
			'type'    => 'textarea',
			'title'   => __( 'Update Text', 'finbank' ),
			'required' => array( 'show_customer_text_v1', '=', true ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_mobile_info_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'mobile_email_v1',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'show_mobile_info_v1', '=', true ),
		),
		array(
			'id'      => 'mobile_phone_v1',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'show_mobile_info_v1', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
            'required' => array( 'show_mobile_info_v1', '=', true ),
        ),
		array(
            'id'    => 'mobile_social_share_v1',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'finbank' ),
            'required' => array( 'show_msocial_share_v1', '=', true ),
        ),
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'finbank' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		//Top Header Switcher
		array(
            'id' => 'show_topbar_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),		
		
		//Notification Switcher
		array(
            'id' => 'show_notify_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Notification Text', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'notify_text_v2',
			'type'    => 'textarea',
			'title'   => __( 'Notification Text', 'finbank' ),
			'required' => array( 'show_notify_v2', '=', true ),
		),
		array(
			'id'      => 'notify_link_v2',
			'type'    => 'text',
			'title'   => __( 'Notification Link', 'finbank' ),
			'required' => array( 'show_notify_v2', '=', true ),
		),
		
		//Top Header Menu Switcher
		array(
            'id' => 'show_top_menu_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Menu', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v2', '=', true ),
        ),
		
		//Top Search Icon Switcher
		array(
            'id' => 'show_seach_form_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon Box', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'search_icon_title_v2',
			'type'    => 'text',
			'title'   => __( 'Search Icon Title', 'finbank' ),
			'required' => array( 'show_seach_form_v2', '=', true ),
		),
		
		//Address Info
		array(
            'id' => 'show_address_info_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Address', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'address_v2',
			'type'    => 'text',
			'title'   => __( 'Enter Address', 'finbank' ),
			'required' => array( 'show_address_info_v2', '=', true ),
		),
		
		//Account Button Switcher
		array(
            'id' => 'show_account_btn_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'account_btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_account_btn_v2', '=', true ),
		),
		array(
			'id'      => 'account_btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'finbank' ),
			'required' => array( 'show_account_btn_v2', '=', true ),
		),
		
		//Login Button Switcher
		array(
            'id' => 'show_login_btn_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'login_btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Login Button Title', 'finbank' ),
			'required' => array( 'show_login_btn_v2', '=', true ),
		),
		array(
			'id'      => 'login_btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Login Button Link', 'finbank' ),
			'required' => array( 'show_login_btn_v2', '=', true ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_mobile_info_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'mobile_email_v2',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'show_mobile_info_v2', '=', true ),
		),
		array(
			'id'      => 'mobile_phone_v2',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'show_mobile_info_v2', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
            'required' => array( 'show_mobile_info_v2', '=', true ),
        ),
		array(
            'id'    => 'mobile_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'finbank' ),
            'required' => array( 'show_msocial_share_v2', '=', true ),
        ),
        /***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Three Settings', 'finbank' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		//Top Header Switcher
		array(
            'id' => 'show_topbar_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),		
		
		//Button Switcher
		array(
            'id' => 'show_pay_btn_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v3', '=', true ),
        ),
		array(
			'id'      => 'pay_btn_title_v3',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_pay_btn_v3', '=', true ),
		),
		array(
			'id'      => 'pay_btn_link_v3',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'finbank' ),
			'required' => array( 'show_pay_btn_v3', '=', true ),
		),
		
		//Top Header Menu Switcher
		array(
            'id' => 'show_top_menu_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Menu', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v3', '=', true ),
        ),
		
		//Top Header Address Switcher
		array(
            'id' => 'show_top_address_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Address', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v3', '=', true ),
        ),
		array(
			'id'      => 'address_v3',
			'type'    => 'text',
			'title'   => __( 'Address', 'finbank' ),
			'required' => array( 'show_top_address_v3', '=', true ),
		),
		
		//Top Header Working Hours Switcher
		array(
            'id' => 'show_top_whours_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Working Time', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v3', '=', true ),
        ),
		array(
			'id'      => 'whours_v3',
			'type'    => 'text',
			'title'   => __( 'Working Hours', 'finbank' ),
			'required' => array( 'show_top_whours_v3', '=', true ),
		),
		
		//Top Social Media Switcher
		array(
            'id' => 'show_social_share_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v3', '=', true ),
        ),
		array(
            'id'    => 'social_share_v3',
            'type'  => 'social_media',
            'title' => esc_html__( 'Top Header Social Media', 'finbank' ),
            'required' => array( 'show_social_share_v3', '=', true ),
        ),
		
		//Login Button Switcher
		array(
            'id' => 'show_login_btn_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'login_btn_title_v3',
			'type'    => 'text',
			'title'   => __( 'Login Button Title', 'finbank' ),
			'required' => array( 'show_login_btn_v3', '=', true ),
		),
		array(
			'id'      => 'login_btn_link_v3',
			'type'    => 'text',
			'title'   => __( 'Login Button Link', 'finbank' ),
			'required' => array( 'show_login_btn_v3', '=', true ),
		),
		
		//Phone Number Switcher
		array(
            'id' => 'show_phone_no_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Contact Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'phone_title_v3',
			'type'    => 'text',
			'title'   => __( 'Phone Title', 'finbank' ),
			'required' => array( 'show_phone_no_v3', '=', true ),
		),
		array(
			'id'      => 'phone_v3',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'show_phone_no_v3', '=', true ),
		),
		
		//Top Search Icon Switcher
		array(
            'id' => 'show_seach_form_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon Box', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'search_icon_title_v3',
			'type'    => 'text',
			'title'   => __( 'Search Icon Title', 'finbank' ),
			'required' => array( 'show_seach_form_v3', '=', true ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_mobile_info_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'mobile_email_v3',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'show_mobile_info_v3', '=', true ),
		),
		array(
			'id'      => 'mobile_phone_v3',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'show_mobile_info_v3', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
            'required' => array( 'show_mobile_info_v3', '=', true ),
        ),
		array(
            'id'    => 'mobile_social_share_v3',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'finbank' ),
            'required' => array( 'show_msocial_share_v3', '=', true ),
        ),
		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Four Settings', 'finbank' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		//Top Header Switcher
		array(
            'id' => 'show_topbar_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		
		//Email Info
		array(
            'id' => 'show_email_info_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Email Info', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v4', '=', true ),
        ),
		array(
			'id'      => 'email_info_v4',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'show_email_info_v4', '=', true ),
		),
		
		//Find Location Switcher
		array(
            'id' => 'show_find_location_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Branch Location', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v4', '=', true ),
        ),
		array(
			'id'      => 'find_location_v4',
			'type'    => 'text',
			'title'   => __( 'Branch Location', 'finbank' ),
			'required' => array( 'show_find_location_v4', '=', true ),
		),
		array(
			'id'      => 'find_location_link_v4',
			'type'    => 'text',
			'title'   => __( 'Branch Location Link', 'finbank' ),
			'required' => array( 'show_find_location_v4', '=', true ),
		),
		
		//Top Header Menu Switcher
		array(
            'id' => 'show_top_menu_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Menu', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v4', '=', true ),
        ),
		
		//Top Search Icon Switcher
		array(
            'id' => 'show_seach_form_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon Box', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v4', '=', true ),
        ),
		array(
			'id'      => 'search_icon_title_v4',
			'type'    => 'text',
			'title'   => __( 'Search Icon Title', 'finbank' ),
			'required' => array( 'show_seach_form_v4', '=', true ),
		),
		
		//Login Button Switcher
		array(
            'id' => 'show_login_btn_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'login_btn_title_v4',
			'type'    => 'text',
			'title'   => __( 'Login Button Title', 'finbank' ),
			'required' => array( 'show_login_btn_v4', '=', true ),
		),
		array(
			'id'      => 'login_btn_link_v4',
			'type'    => 'text',
			'title'   => __( 'Login Button Link', 'finbank' ),
			'required' => array( 'show_login_btn_v4', '=', true ),
		),
		
		//Account Button Switcher
		array(
            'id' => 'show_account_btn_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Account Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'account_btn_title_v4',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_account_btn_v4', '=', true ),
		),
		array(
			'id'      => 'account_btn_link_v4',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'finbank' ),
			'required' => array( 'show_account_btn_v4', '=', true ),
		),
		
		//Bottom Header Info Switcher
		array(
            'id' => 'show_bottombar_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Bottom Header Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'update_title_v4',
			'type'    => 'text',
			'title'   => __( 'Update Title', 'finbank' ),
			'required' => array( 'show_bottombar_v4', '=', true ),
		),
		array(
			'id'      => 'update_text_v4',
			'type'    => 'textarea',
			'title'   => __( 'Update Text', 'finbank' ),
			'required' => array( 'show_bottombar_v4', '=', true ),
		),
		array(
			'id'      => 'btn_title_v4',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_bottombar_v4', '=', true ),
		),
		array(
			'id'      => 'btn_link_v4',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'finbank' ),
			'required' => array( 'show_bottombar_v4', '=', true ),
		),
		array(
            'id' => 'show_customer_text_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Bottom Bar Right Info', 'finbank'),
            'default' => true,
            'required' => array( 'show_bottombar_v4', '=', true ),
        ),
		array(
			'id'      => 'customer_text_v4',
			'type'    => 'textarea',
			'title'   => __( 'Update Text', 'finbank' ),
			'required' => array( 'show_customer_text_v4', '=', true ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_mobile_info_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'mobile_email_v4',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'show_mobile_info_v4', '=', true ),
		),
		array(
			'id'      => 'mobile_phone_v4',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'show_mobile_info_v4', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
            'required' => array( 'show_mobile_info_v4', '=', true ),
        ),
		array(
            'id'    => 'mobile_social_share_v4',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'finbank' ),
            'required' => array( 'show_msocial_share_v4', '=', true ),
        ),
		/***********************************************************************
								Header Version OnePager 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header OnePager Style One Settings', 'finbank' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		//Top Header Switcher
		array(
            'id' => 'show_topbar_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		
		//Email Info
		array(
            'id' => 'show_email_info_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Email Info', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v5', '=', true ),
        ),
		array(
			'id'      => 'email_info_v5',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'show_email_info_v5', '=', true ),
		),
		
		//Find Location Switcher
		array(
            'id' => 'show_find_location_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Branch Location', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v5', '=', true ),
        ),
		array(
			'id'      => 'find_location_v5',
			'type'    => 'text',
			'title'   => __( 'Branch Location', 'finbank' ),
			'required' => array( 'show_find_location_v5', '=', true ),
		),
		array(
			'id'      => 'find_location_link_v5',
			'type'    => 'text',
			'title'   => __( 'Branch Location Link', 'finbank' ),
			'required' => array( 'show_find_location_v5', '=', true ),
		),
		
		//Top Header Menu Switcher
		array(
            'id' => 'show_top_menu_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Menu', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v5', '=', true ),
        ),
		
		//Top Search Icon Switcher
		array(
            'id' => 'show_seach_form_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon Box', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v5', '=', true ),
        ),
		array(
			'id'      => 'search_icon_title_v5',
			'type'    => 'text',
			'title'   => __( 'Search Icon Title', 'finbank' ),
			'required' => array( 'show_seach_form_v5', '=', true ),
		),
		
		//Login Button Switcher
		array(
            'id' => 'show_login_btn_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
			'id'      => 'login_btn_title_v5',
			'type'    => 'text',
			'title'   => __( 'Login Button Title', 'finbank' ),
			'required' => array( 'show_login_btn_v5', '=', true ),
		),
		array(
			'id'      => 'login_btn_link_v5',
			'type'    => 'text',
			'title'   => __( 'Login Button Link', 'finbank' ),
			'required' => array( 'show_login_btn_v5', '=', true ),
		),
		
		//Account Button Switcher
		array(
            'id' => 'show_account_btn_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Account Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
			'id'      => 'account_btn_title_v5',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_account_btn_v5', '=', true ),
		),
		array(
			'id'      => 'account_btn_link_v5',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'finbank' ),
			'required' => array( 'show_account_btn_v5', '=', true ),
		),
		
		//Bottom Header Info Switcher
		array(
            'id' => 'show_bottombar_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Bottom Header Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
			'id'      => 'update_title_v5',
			'type'    => 'text',
			'title'   => __( 'Update Title', 'finbank' ),
			'required' => array( 'show_bottombar_v5', '=', true ),
		),
		array(
			'id'      => 'update_text_v5',
			'type'    => 'textarea',
			'title'   => __( 'Update Text', 'finbank' ),
			'required' => array( 'show_bottombar_v5', '=', true ),
		),
		array(
			'id'      => 'btn_title_v5',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_bottombar_v5', '=', true ),
		),
		array(
			'id'      => 'btn_link_v5',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'finbank' ),
			'required' => array( 'show_bottombar_v5', '=', true ),
		),
		array(
            'id' => 'show_customer_text_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Bottom Bar Right Info', 'finbank'),
            'default' => true,
            'required' => array( 'show_bottombar_v5', '=', true ),
        ),
		array(
			'id'      => 'customer_text_v5',
			'type'    => 'textarea',
			'title'   => __( 'Update Text', 'finbank' ),
			'required' => array( 'show_customer_text_v5', '=', true ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_mobile_info_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v5' ),
        ),
		array(
			'id'      => 'mobile_email_v5',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'show_mobile_info_v5', '=', true ),
		),
		array(
			'id'      => 'mobile_phone_v5',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'show_mobile_info_v5', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v5',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
            'required' => array( 'show_mobile_info_v5', '=', true ),
        ),
		array(
            'id'    => 'mobile_social_share_v5',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'finbank' ),
            'required' => array( 'show_msocial_share_v5', '=', true ),
        ),	
		/***********************************************************************
								Header Version OnePager 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v6_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header OnePager Style Two Settings', 'finbank' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		//Top Header Switcher
		array(
            'id' => 'show_topbar_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),		
		
		//Notification Switcher
		array(
            'id' => 'show_notify_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Notification Text', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v6', '=', true ),
        ),
		array(
			'id'      => 'notify_text_v6',
			'type'    => 'textarea',
			'title'   => __( 'Notification Text', 'finbank' ),
			'required' => array( 'show_notify_v6', '=', true ),
		),
		array(
			'id'      => 'notify_link_v6',
			'type'    => 'text',
			'title'   => __( 'Notification Link', 'finbank' ),
			'required' => array( 'show_notify_v6', '=', true ),
		),
		
		//Top Header Menu Switcher
		array(
            'id' => 'show_top_menu_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Menu', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v6', '=', true ),
        ),
		
		//Top Search Icon Switcher
		array(
            'id' => 'show_seach_form_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon Box', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v6', '=', true ),
        ),
		array(
			'id'      => 'search_icon_title_v6',
			'type'    => 'text',
			'title'   => __( 'Search Icon Title', 'finbank' ),
			'required' => array( 'show_seach_form_v6', '=', true ),
		),
		
		//Address Info
		array(
            'id' => 'show_address_info_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Address Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		array(
			'id'      => 'address_v6',
			'type'    => 'text',
			'title'   => __( 'Enter Address', 'finbank' ),
			'required' => array( 'show_address_info_v6', '=', true ),
		),
		
		//Account Button Switcher
		array(
            'id' => 'show_account_btn_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		array(
			'id'      => 'account_btn_title_v6',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_account_btn_v6', '=', true ),
		),
		array(
			'id'      => 'account_btn_link_v6',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'finbank' ),
			'required' => array( 'show_account_btn_v6', '=', true ),
		),
		
		//Login Button Switcher
		array(
            'id' => 'show_login_btn_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		array(
			'id'      => 'login_btn_title_v6',
			'type'    => 'text',
			'title'   => __( 'Login Button Title', 'finbank' ),
			'required' => array( 'show_login_btn_v6', '=', true ),
		),
		array(
			'id'      => 'login_btn_link_v6',
			'type'    => 'text',
			'title'   => __( 'Login Button Link', 'finbank' ),
			'required' => array( 'show_login_btn_v6', '=', true ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_mobile_info_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v6' ),
        ),
		array(
			'id'      => 'mobile_email_v6',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'show_mobile_info_v6', '=', true ),
		),
		array(
			'id'      => 'mobile_phone_v6',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'show_mobile_info_v6', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v6',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
            'required' => array( 'show_mobile_info_v6', '=', true ),
        ),
		array(
            'id'    => 'mobile_social_share_v6',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'finbank' ),
            'required' => array( 'show_msocial_share_v6', '=', true ),
        ),	
		/***********************************************************************
								Header Version OnePager 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v7_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header OnePager Style Three Settings', 'finbank' ),
			'required' => array( 'header_style_settings', '=', 'header_v7' ),
		),
		//Top Header Switcher
		array(
            'id' => 'show_topbar_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),		
		
		//Button Switcher
		array(
            'id' => 'show_pay_btn_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v7', '=', true ),
        ),
		array(
			'id'      => 'pay_btn_title_v7',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_pay_btn_v7', '=', true ),
		),
		array(
			'id'      => 'pay_btn_link_v7',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'finbank' ),
			'required' => array( 'show_pay_btn_v7', '=', true ),
		),
		
		//Top Header Menu Switcher
		array(
            'id' => 'show_top_menu_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Menu', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v7', '=', true ),
        ),
		
		//Top Header Address Switcher
		array(
            'id' => 'show_top_address_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Address', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v7', '=', true ),
        ),
		array(
			'id'      => 'address_v7',
			'type'    => 'text',
			'title'   => __( 'Address', 'finbank' ),
			'required' => array( 'show_top_address_v7', '=', true ),
		),
		
		//Top Header Working Hours Switcher
		array(
            'id' => 'show_top_whours_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Top Header Working Time', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v7', '=', true ),
        ),
		array(
			'id'      => 'whours_v7',
			'type'    => 'text',
			'title'   => __( 'Working Hours', 'finbank' ),
			'required' => array( 'show_top_whours_v7', '=', true ),
		),
		
		//Top Social Media Switcher
		array(
            'id' => 'show_social_share_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
            'required' => array( 'show_topbar_v7', '=', true ),
        ),
		array(
            'id'    => 'social_share_v7',
            'type'  => 'social_media',
            'title' => esc_html__( 'Top Header Social Media', 'finbank' ),
            'required' => array( 'show_social_share_v7', '=', true ),
        ),
		
		//Login Button Switcher
		array(
            'id' => 'show_login_btn_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Button', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		array(
			'id'      => 'login_btn_title_v7',
			'type'    => 'text',
			'title'   => __( 'Login Button Title', 'finbank' ),
			'required' => array( 'show_login_btn_v7', '=', true ),
		),
		array(
			'id'      => 'login_btn_link_v7',
			'type'    => 'text',
			'title'   => __( 'Login Button Link', 'finbank' ),
			'required' => array( 'show_login_btn_v7', '=', true ),
		),
		
		//Phone Number Switcher
		array(
            'id' => 'show_phone_no_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Contact Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		array(
			'id'      => 'phone_title_v7',
			'type'    => 'text',
			'title'   => __( 'Phone Title', 'finbank' ),
			'required' => array( 'show_phone_no_v7', '=', true ),
		),
		array(
			'id'      => 'phone_v7',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'show_phone_no_v7', '=', true ),
		),
		
		//Top Search Icon Switcher
		array(
            'id' => 'show_seach_form_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon Box', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		array(
			'id'      => 'search_icon_title_v7',
			'type'    => 'text',
			'title'   => __( 'Search Icon Title', 'finbank' ),
			'required' => array( 'show_seach_form_v7', '=', true ),
		),
		
		//Mobile Info
		array(
            'id' => 'show_mobile_info_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Moblie Info', 'finbank'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v7' ),
        ),
		array(
			'id'      => 'mobile_email_v7',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'show_mobile_info_v7', '=', true ),
		),
		array(
			'id'      => 'mobile_phone_v7',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'show_mobile_info_v7', '=', true ),
		),
		array(
            'id' => 'show_msocial_share_v7',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
            'required' => array( 'show_mobile_info_v7', '=', true ),
        ),
		array(
            'id'    => 'mobile_social_share_v7',
            'type'  => 'social_media',
            'title' => esc_html__( 'Mobile View Social Media', 'finbank' ),
            'required' => array( 'show_msocial_share_v7', '=', true ),
        ),
				
		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
