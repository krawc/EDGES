<?php
/**
 * EDGES functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EDGES
 */

if ( ! function_exists( 'edges_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function edges_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on EDGES, use a find and replace
		 * to change 'edges' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'edges', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'edges' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'edges_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'edges_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edges_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'edges_content_width', 640 );
}
add_action( 'after_setup_theme', 'edges_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function edges_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'edges' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'edges' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'edges_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function edges_scripts() {
	wp_enqueue_style( 'edges-style', get_stylesheet_uri() );

	wp_enqueue_style( 'edges-slick-css', get_template_directory_uri() . '/slick/slick.css' );

	wp_enqueue_script( 'edges-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '20151215', true );

	wp_enqueue_script( 'edges-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'edges-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'edges-slick', get_template_directory_uri() . '/slick/slick.min.js', array(), '20151215', true );

	wp_enqueue_script( 'edges-settings', get_template_directory_uri() . '/js/settings.js', array(), '20151215', true );

	wp_enqueue_script( 'edges-slick-myloadmore', get_template_directory_uri() . '/js/myloadmore.js', array(), '20151215', true );

	wp_enqueue_script( 'edges-slick-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), '20151215', true );

	wp_enqueue_script( 'edges-slick-infinite', get_template_directory_uri() . '/js/infinite.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'edges_scripts' );

/**
 * Enqueue Google Fonts. (main default: Roboto)
 */

function google_fonts() {
	$query_args = array(
		'family' => 'Roboto:100,300,400,700,900',
		'subset' => 'latin,latin-ext',
	);
	wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
add_action('wp_enqueue_scripts', 'google_fonts');

function ion_icons() {
	wp_enqueue_style( 'ion_icons', 'http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), null );
}
add_action('wp_enqueue_scripts', 'ion_icons');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
/**
 * Load Unyson framework
 */
if (defined('FW')):
    // the framework was already included in another place, so this version will be inactive/ignored
else:
    require get_template_directory() . '/framework/bootstrap.php';
endif;

function edges_social(){

	$fb = get_theme_mod('sm-link-fb');
	$tt = get_theme_mod('sm-link-tt');
	$ig = get_theme_mod('sm-link-ig');
	$pi = get_theme_mod('sm-link-pi');
	$li = get_theme_mod('sm-link-li');
	$wa = get_theme_mod('sm-link-wa');
	$sc = get_theme_mod('sm-link-sc');


	$output = '';
	$output .= '<ul class="social">';
	if ( !empty($fb) ){
		$output .= '<li class="social-single"><a class="social-single--link" href="'.$fb.'"><i class="ion ion-social-facebook"></i></a></li>';
	}
	if ( !empty($tt) ){
		$output .= '<li class="social-single"><a class="social-single--link" href="'.$tt.'"><i class="ion ion-social-twitter"></i></a></li>';
	}
	if ( !empty($ig) ){
		$output .= '<li class="social-single"><a class="social-single--link" href="'.$ig.'"><i class="ion ion-social-instagram"></i></a></li>';
	}
	if ( !empty($pi) ){
		$output .= '<li class="social-single"><a class="social-single--link" href="'.$pi.'"><i class="ion ion-social-pinterest"></i></a></li>';
	}
	if ( !empty($li) ){
		$output .= '<li class="social-single"><a class="social-single--link" href="'.$li.'"><i class="ion ion-social-linkedin"></i></a></li>';
	}
	if ( !empty($wa) ){
		$output .= '<li class="social-single"><a class="social-single--link" href="'.$wa.'"><i class="ion ion-social-whatsapp"></i></a></li>';
	}
	if ( !empty($sc) ){
		$output .= '<li class="social-single"><a class="social-single--link" href="'.$sc.'"><i class="ion ion-social-snapchat"></i></a></li>';
	}
	$output .= '</ul>';
	echo $output;
}

/**
 * Retrieve the archive title based on the queried object.
 *
 * @since 4.1.0
 *
 * @return string Archive title.
 */
function edges_get_the_archive_title() {
	if ( is_category() ) {
		/* translators: Category archive title. 1: Category name */
		$title = sprintf( __( '%s' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		/* translators: Tag archive title. 1: Tag name */
		$title = sprintf( __( '%s' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		/* translators: Author archive title. 1: Author name */
		$title = sprintf( __( '%s' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		/* translators: Yearly archive title. 1: Year */
		$title = sprintf( __( '%s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
	} elseif ( is_month() ) {
		/* translators: Monthly archive title. 1: Month name and year */
		$title = sprintf( __( '%s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
	} elseif ( is_day() ) {
		/* translators: Daily archive title. 1: Date */
		$title = sprintf( __( '%s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title' );
		}
	} elseif ( is_post_type_archive() ) {
		/* translators: Post type archive title. 1: Post type name */
		$title = sprintf( __( '%s' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives' );
	}

	/**
	 * Filters the archive title.
	 *
	 * @since 4.1.0
	 *
	 * @param string $title Archive title to be displayed.
	 */
	return apply_filters( 'edges_get_the_archive_title', $title );
}

add_action( 'customize_register', 'starter_customize_register');

function starter_customize_register( $wp_customize )
{
	//SECTIONS:
	$wp_customize->add_section( 'footer_new_section_name' , array(
	        'title'    => __( 'Footer & Social Media', 'listify-child' ),
	) );

	$wp_customize->add_setting( 'sm-link-fb' );
	$wp_customize->add_setting( 'sm-link-tt' );
	$wp_customize->add_setting( 'sm-link-ig' );
	$wp_customize->add_setting( 'sm-link-pi' );
	$wp_customize->add_setting( 'sm-link-li' );
	$wp_customize->add_setting( 'sm-link-wa' );
	$wp_customize->add_setting( 'sm-link-sc' );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sm-link-fb', array(
	        'label'    => __( 'Add Facebook link', 'edges' ),
	        'section'  => 'footer_new_section_name',
	        'settings' => 'sm-link-fb'
	    ) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sm-link-tt', array(
	        'label'    => __( 'Add Twitter link', 'edges' ),
	        'section'  => 'footer_new_section_name',
	        'settings' => 'sm-link-tt'
	    ) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sm-link-ig', array(
	        'label'    => __( 'Add Instagram link', 'edges' ),
	        'section'  => 'footer_new_section_name',
	        'settings' => 'sm-link-ig'
	    ) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sm-link-pi', array(
	        'label'    => __( 'Add Pinterest link', 'edges' ),
	        'section'  => 'footer_new_section_name',
	        'settings' => 'sm-link-pi'
	    ) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sm-link-li', array(
	        'label'    => __( 'Add LinkedIn link', 'edges' ),
	        'section'  => 'footer_new_section_name',
	        'settings' => 'sm-link-li'
	    ) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sm-link-wa', array(
	        'label'    => __( 'Add WhatsApp link', 'edges' ),
	        'section'  => 'footer_new_section_name',
	        'settings' => 'sm-link-wa'
	    ) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sm-link-sc', array(
	        'label'    => __( 'Add Snapchat link', 'edges' ),
	        'section'  => 'footer_new_section_name',
	        'settings' => 'sm-link-sc'
	    ) ) );

}
