<?php
/**
 * reidcompton functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package reidcompton
 */

if ( ! function_exists( 'reidcompton_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function reidcompton_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on reidcompton, use a find and replace
	 * to change 'reidcompton' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'reidcompton', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'reidcompton' ),
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
	add_theme_support( 'custom-background', apply_filters( 'reidcompton_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'reidcompton_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function reidcompton_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'reidcompton_content_width', 640 );
}
add_action( 'after_setup_theme', 'reidcompton_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function reidcompton_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'reidcompton' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'reidcompton_widgets_init' );

function code_taxonomy_init() {
    // create a new taxonomy
    register_taxonomy(  
        'code_taxonomy',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'code',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Code Taxonomy',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'themes', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}
add_action( 'init', 'code_taxonomy_init' );


/**
 * Enqueue scripts and styles.
 */
function reidcompton_scripts() {
	wp_enqueue_style( 'reidcompton-style', get_stylesheet_uri() );

//	wp_enqueue_script( 'reidcompton-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'reidcompton-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'reidcompton_scripts' );

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


add_filter('images_cpt','my_image_cpt');
function my_image_cpt(){
    $cpts = array('photography', 'code');
    return $cpts;
}

add_filter('list_images','my_list_images');
function my_list_images(){
    //I only need two pictures
    $picts = array(
        'image1' => '_image1',
        'image2' => '_image2',
        'image3' => '_image3',
        'image4' => '_image4',
        'image5' => '_image5',
        'image6' => '_image6',
        'image7' => '_image7',
        'image8' => '_image8',
        'image9' => '_image9',
        'image10' => '_image10',
        'image11' => '_image11',
        'image12' => '_image12',
        'image13' => '_image13',
        'image14' => '_image14',
        'image15' => '_image15',
        'image16' => '_image16',
        'image17' => '_image17',
        'image18' => '_image18',
        'image19' => '_image19',
        'image20' => '_image20',
        'image21' => '_image21',
        'image22' => '_image22',
        'image23' => '_image23',
    );
    return $picts;
}

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function is_ipad() {
	$is_ipad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
	if ($is_ipad)
		return true;
	else return false;
}
function is_iphone() {
	$cn_is_iphone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
	if ($cn_is_iphone)
		return true;
	else return false;
}