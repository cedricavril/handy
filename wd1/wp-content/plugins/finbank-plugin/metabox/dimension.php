<?php
	return array(
		'title'      => 'finbank post Setting',
		'id'         => 'finbank_post',
		'icon'       => 'el el-cogs',
		'position'   => 'normal',
		'priority'   => 'core',
		'post_types' => array( 'post' ),
		'sections'   => array(
			array(
				'fields' => array(
					array(
						'id'    => 'video_link',
						'type'  => 'text',
						'title' => esc_html__('Video Link', 'finbank'),
					),
				),
			),
		),
	);


?>