<?php

/* 	Simplify Theme's Header
	Copyright: 2012-2021, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Simplify 1.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >
 	<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>
  	<div id="site-container">	
      <div id ="header">
      <div id ="header-content">
		<!-- Site Titele and Description Goes Here -->
      	<a class="logotitle" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if (get_header_image() ): ?><img class="site-logo" src="<?php header_image(); ?>"/><h1 class="site-title-hidden"><?php bloginfo( 'name' ); ?></h1><?php else: ?><h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>        
		<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>                
        
        <!-- Site Main Menu Goes Here -->
        <div id="mainmenu">
        	<div id="mobile-menu"><span class="mobilefirst">&#9776;</span></div>
        	<nav id="main-menu-con">
				<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu' )); else: wp_page_menu(); endif; ?>
        	</nav>
        </div>
      
      </div><!-- header-content -->
      </div><!-- header -->