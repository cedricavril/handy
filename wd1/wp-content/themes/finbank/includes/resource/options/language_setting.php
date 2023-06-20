<?php

return array(

	'title'         => esc_html__( 'Language Settings', 'finbank' ),
    'id'            => 'language_settings',
    'desc'          => '',
    'icon'			=> 'el el-globe',
    'fields'        => array(          
		array(
			'id' => 'optLanguage',
			'type' => 'language',
			'desc' => esc_html__('Please upload .mo language file', 'finbank'),
			)
	),
);
