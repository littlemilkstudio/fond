<?php
/**
 * fond functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fond
 */

if ( ! function_exists( 'fond_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fond_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fond, use a find and replace
	 * to change 'fond' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fond', get_template_directory() . '/languages' );

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
		'primaryleft' => esc_html__( 'Primary Menu Left', 'fond' ),
		'primaryright' => esc_html__( 'Primary Menu Right', 'fond' ),
	) );

	// register_nav_menus( array(
	// 	'primary' => esc_html__( 'Primary Menu', 'stoneturngroup' ),
	// 	'mobile' => esc_html__( 'Mobile Menu', 'stoneturngroup' ),
	// 	'flyoutupper' => esc_html__( 'Fly Out Upper', 'stoneturngroup' ),
	// 	'flyoutlower' => esc_html__( 'Fly Out Lower', 'stoneturngroup' ),
	// 	'footer' => esc_html__( 'Footer Menu', 'stoneturngroup' ),
	// ) );

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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fond_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // fond_setup
add_action( 'after_setup_theme', 'fond_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fond_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fond_content_width', 640 );
}
add_action( 'after_setup_theme', 'fond_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fond_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fond' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fond_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fond_scripts() {

	// wp_enqueue_style( 'fond-style', get_stylesheet_uri() );

	// wp_register_style('site-styles', get_template_directory_uri() . '/css/screen.css', array(), '1.0', 'all');
 //    wp_enqueue_style('site-styles'); // Enqueue it!

 //  //Fancy box for Modals
 //  wp_register_script('fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array(), '1.0');
 //  wp_enqueue_script('fancybox'); // Enqueue it!

 //  //SwiperSlider
 //  wp_register_script('swiperslider', get_template_directory_uri() . '/js/swiperslider/swiper.jquery.min.js', array(), '1.0');
 //  wp_enqueue_script('swiperslider'); // Enqueue it!  

	 //App
	 // wp_register_script('appjs', get_template_directory_uri() . '/dist/app.bundle.js', '1.0');
	 // wp_enqueue_script('appjs'); // Enqueue it! 

	 // //App
	 // wp_register_script('vendorjs', get_template_directory_uri() . '/dist/vendor.bundle.js', '1.0');
	 // wp_enqueue_script('vendorjs'); // Enqueue it! 

 //  //jquery for the site
 //  wp_register_script('sitejs', get_template_directory_uri() . '/js/site.js', array(), '1.0');
 //  wp_enqueue_script('sitejs'); // Enqueue it!

	// wp_enqueue_script( 'fond-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	// wp_enqueue_script( 'fond-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fond_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**********************
 * Add SVG capabilities
***********************/
function fond_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'fond_svg_mime_type' );



// ACF theme settings
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Global Theme Settings');
	//acf_add_options_page('More Theme Settings');
}




