<?php
return array(
	'title'      => esc_html__( 'Header 3 Setting', 'finbank' ),
	'id'         => 'header3_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'logo_type3',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Logo Style', 'finbank' ),
			'desc'    => esc_html__( 'Select anyone logo style to show in header', 'finbank' ),
			'options' => array(
				'image' => esc_html__( 'Image Logo', 'finbank' ),
				'text'  => esc_html__( 'Text Logo', 'finbank' ),
			),
			'default' => 'image',
		),
		array(
			'id'       => 'image_logo3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'finbank' ),
			'subtitle' => esc_html__( 'Insert site logo image with adjustable size for the logo section', 'finbank' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/logo.png' ),
			'required' => array( array( 'logo_type3', 'equals', 'image' ) ),
		),
		array(
			'id'       => 'logo_dimension3',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Dimentions', 'finbank' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'finbank' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array(
				array( 'logo_type3', 'equals', 'image' ),
			),
		),
		array(
			'id'       => 'logo_text3',
			'type'     => 'text',
			'title'    => esc_html__( 'Logo Text', 'finbank' ),
			'subtitle' => esc_html__( 'Enter Logo Text', 'finbank' ),
			'required' => array(
				array( 'logo_type3', 'equals', 'text' ),
			),
		),
		array(
			'id'          => 'logo_typography3',
			'type'        => 'typography',
			'title'       => esc_html__( 'Typography', 'finbank' ),
			'google'      => true,
			'font-backup' => false,
			'text-align'  => false,
			'line-height' => false,
			'output'      => array( 'h3.site-description' ),
			'units'       => 'px',
			'subtitle'    => esc_html__( 'Select Styles for text logo', 'finbank' ),
			'default'     => array(
				'color'       => '#333',
				'font-style'  => '700',
				'font-family' => 'Abel',
				'google'      => true,
				'font-size'   => '33px',
			),
			'required'    => array(
				array( 'logo_type3', 'equals', 'text' ),
			),
		),

		array(
			'id'    => 'header_social_share3',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'finbank' ),
			'desc'  => esc_html__( 'Click an icon to activate social profile icons in header.', 'finbank' ),
		),
	),
);
