<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'sahaja_setup' ) ) {
	add_action( 'after_setup_theme', 'sahaja_setup' );
	// Sets up theme defaults and registers support for various WordPress features.
	function sahaja_setup() {
		
		add_editor_style( 'style.css' );
		
	}
}

// Overwrite parent theme background defaults and registers support for WordPress features.
add_action( 'after_setup_theme', 'martanda_background_setup' );
function martanda_background_setup() {
	add_theme_support( "custom-background",
		array(
			'default-color' 		 => 'eeebe2',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'center',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);
}

// Replace default fonts from parent theme
function martanda_get_font_face_styles() {
	return "
	@font-face{
		font-family: 'Figtree';
		font-weight: 100;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Figtree.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Figtree';
		font-weight: 200;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Figtree.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Figtree';
		font-weight: 300;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Figtree.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Figtree';
		font-weight: 400;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Figtree.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Figtree';
		font-weight: 500;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Figtree.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Figtree';
		font-weight: 600;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Figtree.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Figtree';
		font-weight: 700;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Figtree.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Figtree';
		font-weight: 800;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Figtree.woff2') format('woff2');
	}
	@font-face{
		font-family: 'Figtree';
		font-weight: 900;
		font-style: normal;
		font-stretch: normal;
		font-display: swap;
		src: url('" . get_stylesheet_directory_uri() . "/fonts/Figtree.woff2') format('woff2');
	}
	";
}

function martanda_font_family_css() {
	// Get our settings
	$martanda_settings = wp_parse_args(
		get_option( 'martanda_settings', array() ),
		martanda_get_defaults()
	);

	// Initiate our class
	$css = new martanda_css;
	
	$og_defaults = martanda_get_defaults( false );
	
	$bodyclass = 'body';
	if ( is_admin() ) {
		$bodyclass = '.editor-styles-wrapper';
	}
	
	$bodyfont = $martanda_settings[ 'font_body' ];
	if ( $bodyfont == 'inherit' ) { $bodyfont = 'Figtree'; }
	
	$font_site_title = $martanda_settings[ 'font_site_title' ];
	if ( $font_site_title == 'inherit' ) { $font_site_title = 'Figtree'; }
	$font_navigation = $martanda_settings[ 'font_navigation' ];
	if ( $font_navigation == 'inherit' ) { $font_navigation = 'Figtree'; }
	$font_buttons = $martanda_settings[ 'font_buttons' ];
	if ( $font_buttons == 'inherit' ) { $font_buttons = 'Figtree'; }
	$font_heading_1 = $martanda_settings[ 'font_heading_1' ];
	if ( $font_heading_1 == 'inherit' ) { $font_heading_1 = 'Figtree'; }
	$font_heading_2 = $martanda_settings[ 'font_heading_2' ];
	if ( $font_heading_2 == 'inherit' ) { $font_heading_2 = 'Figtree'; }
	$font_heading_3 = $martanda_settings[ 'font_heading_3' ];
	if ( $font_heading_3 == 'inherit' ) { $font_heading_3 = 'Figtree'; }
	$font_heading_4 = $martanda_settings[ 'font_heading_4' ];
	if ( $font_heading_4 == 'inherit' ) { $font_heading_4 = 'Figtree'; }
	$font_heading_5 = $martanda_settings[ 'font_heading_5' ];
	if ( $font_heading_5 == 'inherit' ) { $font_heading_5 = 'Figtree'; }
	$font_heading_6 = $martanda_settings[ 'font_heading_6' ];
	if ( $font_heading_6 == 'inherit' ) { $font_heading_6 = 'Figtree'; }
	$font_footer = $martanda_settings[ 'font_footer' ];
	if ( $font_footer == 'inherit' ) { $font_footer = 'Figtree'; }
	$font_fixed_side = $martanda_settings[ 'font_fixed_side' ];
	if ( $font_fixed_side == 'inherit' ) { $font_fixed_side = 'Figtree'; }
	
	$css->set_selector( $bodyclass );
	$css->add_property( '--martanda--font-body', esc_attr( $bodyfont ) );
	$css->add_property( '--martanda--font-site-title', esc_attr( $font_site_title ) );
	$css->add_property( '--martanda--font-navigation', esc_attr( $font_navigation ) );
	$css->add_property( '--martanda--font-buttons', esc_attr( $font_buttons ) );
	$css->add_property( '--martanda--font-heading-1', esc_attr( $font_heading_1 ) );
	$css->add_property( '--martanda--font-heading-2', esc_attr( $font_heading_2 ) );
	$css->add_property( '--martanda--font-heading-3', esc_attr( $font_heading_3 ) );
	$css->add_property( '--martanda--font-heading-4', esc_attr( $font_heading_4 ) );
	$css->add_property( '--martanda--font-heading-5', esc_attr( $font_heading_5 ) );
	$css->add_property( '--martanda--font-heading-6', esc_attr( $font_heading_6 ) );
	$css->add_property( '--martanda--font-footer', esc_attr( $font_footer ) );
	$css->add_property( '--martanda--font-fixed-side', esc_attr( $font_fixed_side ) );
	
	$css->set_selector( '.editor-styles-wrapper .top-bar-socials button' );
	$css->add_property( 'background-color', 'inherit' );
	
	// Allow us to hook CSS into our output
	do_action( 'martanda_font_family_css', $css );

	return apply_filters( 'martanda_font_family_css_output', $css->css_output() );
}

// Overwrite theme URL
function martanda_theme_uri_link() {
	return 'https://wpkoi.com/sahaja-wpkoi-wordpress-theme/';
}

// Extra cutomizer functions
if ( ! function_exists( 'sahaja_customize_register' ) ) {
	add_action( 'customize_register', 'sahaja_customize_register' );
	function sahaja_customize_register( $wp_customize ) {
				
		// Add Sahaja customizer section
		$wp_customize->add_section(
			'sahaja_layout_effects',
			array(
				'title' => __( 'Navigation effect', 'sahaja' ),
				'priority' => 24,
			)
		);
		
		// Navigation effect
		$wp_customize->add_setting(
			'sahaja_settings[nav_effect]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'sahaja_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'sahaja_settings[nav_effect]',
			array(
				'type' => 'select',
				'label' => __( 'Navigation effect', 'sahaja' ),
				'choices' => array(
					'enable' => __( 'Enable', 'sahaja' ),
					'disable' => __( 'Disable', 'sahaja' )
				),
				'settings' => 'sahaja_settings[nav_effect]',
				'section' => 'sahaja_layout_effects',
				'priority' => 30
			)
		);
		
	}
}

//Sanitize choices.
if ( ! function_exists( 'sahaja_sanitize_choices' ) ) {
	function sahaja_sanitize_choices( $input, $setting ) {
		// Ensure input is a slug
		$input = sanitize_key( $input );

		// Get list of choices from the control
		// associated with the setting
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it;
		// otherwise, return the default
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

//Adds custom classes to the array of body classes.
if ( ! function_exists( 'sahaja_body_classes' ) ) {
	add_filter( 'body_class', 'sahaja_body_classes' );
	function sahaja_body_classes( $classes ) {
		// Get Customizer settings
		$sahaja_settings = get_option( 'sahaja_settings' );
		
		$nav_effect     = 'enable';
		
		if ( isset( $sahaja_settings['nav_effect'] ) ) {
			$nav_effect = $sahaja_settings['nav_effect'];
		}
		
		// Navigation effect
		if ( $nav_effect != 'disable' ) {
			$classes[] = 'sahaja-nav-effect';
		}
		
		return $classes;
	}
}
