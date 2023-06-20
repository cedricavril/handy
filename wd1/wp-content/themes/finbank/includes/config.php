<?php
/**
 * Theme config file.
 *
 * @package FINBANK
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['finbank_main_header'][] 	= array( 'finbank_main_header_area', 99 );

$config['default']['finbank_main_footer'][] 	= array( 'finbank_main_footer_area', 99 );

$config['default']['finbank_sidebar'][] 	    = array( 'finbank_sidebar', 99 );

$config['default']['finbank_banner'][] 	    = array( 'finbank_banner', 99 );


return $config;
