<?php
return array(
	'title'      => 'Finbank Team Setting',
	'id'         => 'finbank_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'team' ),
	'sections'   => array(
		array(
			'id'     => 'finbank_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'finbank' ),
				),
				array(
					'id'    => 'team_phone',
					'type'  => 'text',
					'title' => esc_html__( 'Phone Number', 'finbank' ),
				),
				array(
					'id'    => 'team_email',
					'type'  => 'text',
					'title' => esc_html__( 'Email Address', 'finbank' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'finbank' ),
				),
			),
		),
	),
);