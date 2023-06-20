<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'finbank'), $val);
}

return  array(
    'title'      => esc_html__( 'General Setting', 'finbank' ),
    'id'         => 'general_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        array(
            'id' => 'theme_preloader',
            'type' => 'switch',
            'title' => esc_html__('Enable Preloader', 'finbank'),
            'default' => false,
        ),
		array(
			'id'      => 'preloader_text',
			'type'    => 'textarea',
			'title'   => __( 'Preloader Text', 'finbank' ),
			'desc'    => esc_html__( 'Enter the Preloader Text', 'finbank' ),
			'default' => 'Finbank',
			'required' => array( 'theme_preloader', '=', true ),
		),
    ),
);
