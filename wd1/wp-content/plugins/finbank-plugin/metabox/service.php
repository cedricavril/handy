<?php
return array(
	'title'      => 'Finbank Service Setting',
	'id'         => 'finbank_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'service' ),
	'sections'   => array(
		array(
			'id'     => 'finbank_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'finbank' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'description',
					'type'  => 'text',
					'title' => esc_html__( 'Type Description', 'finbank' ),
				),
				array(
					'id'    => 'features_list2',
					'type'  => 'textarea',
					'title' => esc_html__( 'Enter Feature List', 'finbank' ),
				),
				array(
					'id'    => 'service_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'finbank' ),
				),
			),
		),
	),
);