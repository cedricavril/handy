<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'finbank_setup_theme' );
add_action( 'after_setup_theme', 'finbank_load_default_hooks' );


function finbank_setup_theme() {

	load_theme_textdomain( 'finbank', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post', 'page-attributes' );
    
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'finbank_340x350', 340, 350, true ); //finbank_340x350 Our Services
	add_image_size( 'finbank_250x270', 250, 270, true ); //finbank_250x270 Our Services V2
	add_image_size( 'finbank_350x370', 350, 370, true ); //finbank_350x370 Our Services V3
	add_image_size( 'finbank_350x270', 350, 270, true ); //finbank_350x270 Latest News
	add_image_size( 'finbank_50x50', 50, 50, true ); //finbank_50x50 Testimonials
	add_image_size( 'finbank_540x330', 540, 330, true ); //finbank_540x330 Latest News V2
	add_image_size( 'finbank_270x350', 270, 350, true ); //finbank_270x350 Our Team
	add_image_size( 'finbank_120x120', 120, 120, true ); //finbank_120x120 Our Team Widget
	add_image_size( 'finbank_1170x500', 1170, 500, true ); //finbank_1170x500 Blog Classic
	add_image_size( 'finbank_270x120', 270, 120, true ); //finbank_270x120 Popular Post Widget
	
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'finbank' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'finbank' ),
		'top_menu' => esc_html__( 'Top Header Menu', 'finbank' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'finbank' ),
		'footer_about_menu' => esc_html__( 'Footer Widget Menu', 'finbank' ),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'finbank_admin_init', 2000000 );
}

/**
 * [finbank_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function finbank_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [finbank_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function finbank_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'finbank' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'finbank' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'finbank' ),
		'before_widget' => '<div id="%1$s" class="widget single-sidebar-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title"><div class="dot-box"></div><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'finbank'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'finbank'),
		'before_widget'=>'<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 single-widget"><div id="%1$s" class="footer-widget single-footer-widget single-footer-widget--link-box %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Three', 'finbank'),
		'id' => 'footer-sidebar-3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'finbank'),
		'before_widget'=>'<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 single-widget"><div id="%1$s" class="footer-widget single-footer-widget single-footer-widget--link-box %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>'
	));	
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'finbank'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'finbank'),
		'before_widget'=>'<div id="%1$s" class="service-widget sidebar-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="sidebar-title"><div class="dot-box"></div><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Career Widget', 'finbank'),
		'id' => 'career-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Career Area.', 'finbank'),
		'before_widget'=>'<div id="%1$s" class="career-widget career-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="sidebar-title"><div class="dot-box"></div><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'finbank' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'finbank' ),
	  'before_widget'=>'<div id="%1$s" class="widget single-sidebar-box %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><div class="dot-box"></div><h3>',
	  'after_title' => '</h3></div>'
	));
	}
	if ( ! is_object( finbank_WSH() ) ) {
		return;
	}

	$sidebars = finbank_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( finbank_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget single-sidebar-box">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar-title"><div class="dot-box"></div><h3>',
			'after_title'   => '</h3></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'finbank_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function finbank_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'finbank' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'finbank' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'finbank' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'finbank' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'finbank' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'finbank' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'finbank' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'finbank' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'finbank' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'finbank_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function finbank_enqueue_scripts() {
	$options = finbank_WSH()->option();
	$header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
	$header_option = $options->get( 'header_style_settings' );
	$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
    //styles
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/vendors/animate/animate.min.css' );
	wp_enqueue_style( 'custom-animate', get_template_directory_uri() . '/assets/vendors/animate/custom-animate.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendors/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'jquery-bxslider', get_template_directory_uri() . '/assets/vendors/bxslider/jquery.bxslider.css' );
	wp_enqueue_style( 'finbank-font-awesome-all', get_template_directory_uri() . '/assets/vendors/fontawesome/css/font-awesome-all.css' );
	wp_enqueue_style( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css' );
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/vendors/nice-select/nice-select.css' );
	wp_enqueue_style( 'odometer', get_template_directory_uri() . '/assets/vendors/odometer/odometer.min.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/vendors/owl-carousel/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/assets/vendors/owl-carousel/owl.theme.default.min.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/vendors/swiper/swiper.min.css' );
	wp_enqueue_style( 'vegas', get_template_directory_uri() . '/assets/vendors/vegas/vegas.min.css' );
	wp_enqueue_style( 'finbank-icon-style', get_template_directory_uri() . '/assets/vendors/thm-icons/style.css' );
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/vendors/aos/aos.css' );
	wp_enqueue_style( 'finbank-header-section', get_template_directory_uri() . '/assets/css/module-css/01-header-section.css' );
	wp_enqueue_style( 'finbank-banner-section', get_template_directory_uri() . '/assets/css/module-css/02-banner-section.css' );
	wp_enqueue_style( 'finbank-about-section', get_template_directory_uri() . '/assets/css/module-css/03-about-section.css' );
	wp_enqueue_style( 'finbank-fact-counter-section', get_template_directory_uri() . '/assets/css/module-css/04-fact-counter-section.css' );
	wp_enqueue_style( 'finbank-testimonial-section', get_template_directory_uri() . '/assets/css/module-css/05-testimonial-section.css' );
	wp_enqueue_style( 'finbank-partner-section', get_template_directory_uri() . '/assets/css/module-css/06-partner-section.css' );
	wp_enqueue_style( 'finbank-footer-section', get_template_directory_uri() . '/assets/css/module-css/07-footer-section.css' );
	wp_enqueue_style( 'finbank-blog-section', get_template_directory_uri() . '/assets/css/module-css/08-blog-section.css' );
	wp_enqueue_style( 'finbank-breadcrumb-section', get_template_directory_uri() . '/assets/css/module-css/09-breadcrumb-section.css' );
	wp_enqueue_style( 'finbank-contact', get_template_directory_uri() . '/assets/css/module-css/10-contact.css' );
	wp_enqueue_style( 'finbank-main', get_stylesheet_uri() );
	wp_enqueue_style( 'finbank-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	if( $header == 'header_v2'){
	wp_enqueue_style( 'color-1', get_template_directory_uri() . '/assets/css/color-1.css' );
	}
	elseif( $header == 'header_v3'){
	wp_enqueue_style( 'color-2', get_template_directory_uri() . '/assets/css/color-2.css' );
	}
	elseif( $header == 'header_v4'){
	wp_enqueue_style( 'dark', get_template_directory_uri() . '/assets/css/dark.css' );
	}
	elseif( $header == 'header_v6'){
	wp_enqueue_style( 'color-1', get_template_directory_uri() . '/assets/css/color-1.css' );
	}
	elseif( $header == 'header_v7'){
	wp_enqueue_style( 'color-2', get_template_directory_uri() . '/assets/css/color-2.css' );
	}
	wp_enqueue_style( 'finbank-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'finbank-tut', get_template_directory_uri() . '/assets/css/tut.css' );
	wp_enqueue_style( 'finbank-gutenberg', get_template_directory_uri() . '/assets/css/gutenberg.css' );
	wp_enqueue_style( 'finbank-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri().'/assets/vendors/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-bxslider', get_template_directory_uri().'/assets/vendors/bxslider/jquery.bxslider.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-circletype', get_template_directory_uri().'/assets/vendors/circleType/jquery.circleType.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-lettering', get_template_directory_uri().'/assets/vendors/circleType/jquery.lettering.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/vendors/isotope/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-appear', get_template_directory_uri().'/assets/vendors/jquery-appear/jquery.appear.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri().'/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-migrate', get_template_directory_uri().'/assets/vendors/jquery-migrate/jquery-migrate.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'odometer', get_template_directory_uri().'/assets/vendors/odometer/odometer.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/vendors/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri().'/assets/vendors/swiper/swiper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'vegas', get_template_directory_uri().'/assets/vendors/vegas/vegas.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wnumb', get_template_directory_uri().'/assets/vendors/wnumb/wNumb.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/vendors/wow/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-paroller', get_template_directory_uri().'/assets/vendors/extra-scripts/jquery.paroller.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'aos', get_template_directory_uri().'/assets/vendors/aos/aos.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'pagenav', get_template_directory_uri().'/assets/vendors/extra-scripts/pagenav.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'knob', get_template_directory_uri().'/assets/vendors/round-progress-bar/knob.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'finbank-main-custom', get_template_directory_uri().'/assets/js/custom.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'finbank_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function finbank_fonts_url() {
	
	$fonts_url = '';
	
		
		$font_families['Manrope']      = 'Manrope:wght@0,300,0,400,0,500,0,600,0,700,0,800&display=swap';
		$font_families['DM+Sans']      = 'DM Sans:ital,wght@0,400,0,500,0,700,1,400,1,500,1,700&display=swap';

		$font_families = apply_filters( 'FINBANK/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function finbank_theme_styles() {
    wp_enqueue_style( 'finbank-theme-fonts', finbank_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'finbank_theme_styles' );
add_action( 'admin_enqueue_scripts', 'finbank_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) finbank_set function

/**
 * [finbank_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'finbank_set' ) ) {
	function finbank_set( $var, $key, $def = '' ) {

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) finbank_add_editor_styles function

function finbank_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'finbank_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = finbank_WSH()->option(); 
if( finbank_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}
