<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'finbank' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'finbank' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'finbank' ),
				'e' => esc_html__( 'Elementor', 'finbank' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'finbank' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'finbank' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'finbank' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'finbank' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'finbank' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'finbank' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'finbank' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'finbank' ),
			'default'  => '',
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'    => '404_page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Page Heading', 'finbank' ),
			'desc'  => esc_html__( 'Enter 404 section Page Heading that you want to show', 'finbank' ),
		),
		array(
			'id'    => '404_page_text',
			'type'  => 'text',
			'title' => esc_html__( '404 Page Description', 'finbank' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'finbank' ),
		),
		array(
			'id'    => '404_page_text2',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'finbank' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'finbank' ),
		),
		array(
			'id'    => '404_search_form',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Search Form', 'finbank' ),
			'desc'  => esc_html__( 'Enable to show Search Form.', 'finbank' ),
			'default'  => true,
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'finbank' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'finbank' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'finbank' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'finbank' ),
			'default'  => esc_html__( 'Back To Home', 'finbank' ),
			'required' => array( 'back_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);