<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'finbank' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'finbank' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'finbank' ),
				'e' => esc_html__( 'Elementor', 'finbank' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'finbank' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'finbank' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'finbank' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'finbank' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'finbank' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v1.png',
			    ),
				'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'finbank' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v2.png',
			    ),
				'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style 3', 'finbank' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v3.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		//BG Image
		array(
            'id' => 'show_footer_v1_bg_image',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Footer BG Image', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		array(
			'id'       => 'footer_bg_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'finbank' ),
			'subtitle' => esc_html__( 'Insert Background Image', 'finbank' ),
			'required' => array( 'show_footer_v1_bg_image', '=', true ),
		),
		//Logo Image
		array(
            'id' => 'show_footer_v1_logo_image',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Footer Logo', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		array(
			'id'       => 'footer_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'finbank' ),
			'subtitle' => esc_html__( 'Insert footer logo image', 'finbank' ),
			'required' => array( 'show_footer_v1_logo_image', '=', true ),
		),
		//Copy Right Text
		array(
            'id' => 'show_footer_v1_copyright_text',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Copy Right', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),	
		array(
			'id'      => 'footer_v1_copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copy Right Text', 'finbank' ),
			'required' => array( 'show_footer_v1_copyright_text', '=', true ),
		),			
		//Phone Number
		array(
            'id' => 'show_contact_info',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Phone Number', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		array(
			'id'      => 'footer_phone_title',
			'type'    => 'text',
			'title'   => __( 'Phone Title', 'finbank' ),
			'required' => array( 'show_contact_info', '=', true ),
		),
		array(
			'id'      => 'footer_phone_no',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'show_contact_info', '=', true ),
		),		
		//Working Hours
		array(
            'id' => 'show_contact_info2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Working Time', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		array(
			'id'      => 'footer_whours_title',
			'type'    => 'text',
			'title'   => __( 'Working Title', 'finbank' ),
			'required' => array( 'show_contact_info2', '=', true ),
		),
		array(
			'id'      => 'footer_whours',
			'type'    => 'text',
			'title'   => __( 'Working Hours', 'finbank' ),
			'required' => array( 'show_contact_info2', '=', true ),
		),		
		//Buttons Info
		array(
            'id' => 'show_button_info',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Buttons', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		array(
			'id'      => 'footer_btn_title',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_button_info', '=', true ),
		),
		array(
			'id'      => 'footer_btn_link',
			'type'    => 'text',
			'title'   => __( 'Button Url', 'finbank' ),
			'required' => array( 'show_button_info', '=', true ),
		),
		array(
			'id'      => 'footer_btn_title2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'show_button_info', '=', true ),
		),
		array(
			'id'      => 'footer_btn_link2',
			'type'    => 'text',
			'title'   => __( 'Button Url', 'finbank' ),
			'required' => array( 'show_button_info', '=', true ),
		),		
		//Footer Menu
		array(
            'id' => 'show_footer_menu',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Footer Menu', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),				
		//Social Media
		array(
            'id' => 'show_social_icons_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		array(
            'id'    => 'footer_v1_social_share',
            'type'  => 'social_media',
            'title' => esc_html__( 'Footer Social Media', 'finbank' ),
            'required' => array( 'show_social_icons_v1', '=', true ),
        ),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		//Logo Image
		array(
            'id' => 'show_footer_v2_logo_image',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Footer Logo', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		array(
			'id'       => 'footer_logo_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'finbank' ),
			'subtitle' => esc_html__( 'Insert footer logo image', 'finbank' ),
			'required' => array( 'show_footer_v2_logo_image', '=', true ),
		),
		array(
			'id'      => 'footer_description_v2',
			'type'    => 'textarea',
			'title'   => __( 'Description', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Button Url', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),	
		array(
			'id'      => 'footer_branch_title_v2',
			'type'    => 'text',
			'title'   => __( 'Branch Title', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_branch_address_v2',
			'type'    => 'textarea',
			'title'   => __( 'Branch Address', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_help_desk_title_v2',
			'type'    => 'text',
			'title'   => __( 'Heading/Title', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_phone_no_v2',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_email_address_v2',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_zip_code_address_v2',
			'type'    => 'textarea',
			'title'   => __( 'Zipcode Address', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_zip_code_form_v2',
			'type'    => 'textarea',
			'title'   => __( 'Contact Form 7 url', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),	
		//Footer Menu
		array(
            'id' => 'show_footer_menu_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Footer Bottom Menu', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		//Back To Top
		array(
            'id' => 'show_footer_backtotop_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Back To Top Button', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Three Settings', 'finbank' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		//Footer Menu
		array(
            'id' => 'show_footer_menu_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Footer Menu', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		//Social Media
		array(
            'id' => 'show_social_icons_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Order Social Icons', 'finbank'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
        ),
		array(
            'id'    => 'footer_v3_social_share',
            'type'  => 'social_media',
            'title' => esc_html__( 'Footer Social Media', 'finbank' ),
            'required' => array( 'show_social_icons_v3', '=', true ),
        ),
		
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
