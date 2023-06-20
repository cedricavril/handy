<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'finbank' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'finbank' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'finbank' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.png' ),
		),
		//Hoem One Logo
		array(
            'id' => 'normal_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Home One Logo', 'finbank'),
            'default' => true,
        ),
		array(
			'id'       => 'light_color_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Home One Logo Image', 'finbank' ),
			'subtitle' => esc_html__( 'Insert site Home One logo image', 'finbank' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
			'id'       => 'light_color_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Home One Logo Dimentions', 'finbank' ),
			'subtitle' => esc_html__( 'Select Home One Logo Dimentions', 'finbank' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		//Home Two Logo
		array(
            'id' => 'normal_logo_show2',
            'type' => 'switch',
            'title' => esc_html__('Enable Home Two Logo', 'finbank'),
            'default' => true,
        ),
		array(
			'id'       => 'light_color_logo2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Home Two Logo Image', 'finbank' ),
			'subtitle' => esc_html__( 'Insert site Home Two logo image', 'finbank' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		array(
			'id'       => 'light_color_logo_dimension2',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Home Two Logo Dimentions', 'finbank' ),
			'subtitle' => esc_html__( 'Select Home Two Logo Dimentions', 'finbank' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		//Home Three Logo
		array(
            'id' => 'normal_logo_show3',
            'type' => 'switch',
            'title' => esc_html__('Enable Home Three Logo', 'finbank'),
            'default' => true,
        ),
		array(
			'id'       => 'light_color_logo3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Home Three Logo Image', 'finbank' ),
			'subtitle' => esc_html__( 'Insert site Home Three logo image', 'finbank' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		array(
			'id'       => 'light_color_logo_dimension3',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Home Three Logo Dimentions', 'finbank' ),
			'subtitle' => esc_html__( 'Select Home Three Logo Dimentions', 'finbank' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		//Mobile View Logo
		array(
            'id' => 'normal_logo_show4',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile View Logo', 'finbank'),
            'default' => true,
        ),
		array(
			'id'       => 'light_color_logo4',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mobile View Logo Image', 'finbank' ),
			'subtitle' => esc_html__( 'Insert site Mobile View logo image', 'finbank' ),
			'required' => array( 'normal_logo_show4', '=', true ),
		),
		array(
			'id'       => 'light_color_logo_dimension4',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Mobile View Logo Dimentions', 'finbank' ),
			'subtitle' => esc_html__( 'Select Mobile View Logo Dimentions', 'finbank' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show4', '=', true ),
		),
		
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
