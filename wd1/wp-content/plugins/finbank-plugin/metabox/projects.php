<?php
return array(
	'title'      => 'Finbank Project Setting',
	'id'         => 'finbank_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'project' ),
	'sections'   => array(
		array(
			'id'     => 'finbank_projects_meta_setting',
			'fields' => array(
				array(
					'id'    => 'project_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'finbank' ),
				),
				array(
					'id'    => 'project_dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Extra height', 'finbank' ),
					'options'  => array(
						'normal_height' => esc_html__( 'Normal Height', 'finbank' ),
						'extra_height' => esc_html__( 'Extra Height', 'finbank' ),
						'extra_width' => esc_html__( 'Extra Width', 'finbank' ),
					),
					'default'  => 'normal_height',
				),
			),
		),
	),
);