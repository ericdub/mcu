<?php
//Start session for PQ application
function register_prequalify_session()
{
  if (is_page(1182)) {
      if( !session_id() )
      {
        session_start();
      }
  }
}

add_action('init', 'register_prequalify_session');
remove_filter('template_redirect','redirect_canonical');
/**
 * MCU functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package MCU
 */
if (function_exists('header_remove')) {
    header_remove('X-Powered-By');
}

//remove CF7 scripts and styles
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );


if ( ! function_exists( 'mcu_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mcu_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MCU, use a find and replace
	 * to change 'mcu' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mcu', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'mcu' ),
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
	add_theme_support( 'custom-background', apply_filters( 'mcu_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // mcu_setup
add_action( 'after_setup_theme', 'mcu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mcu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mcu_content_width', 640 );
}
add_action( 'after_setup_theme', 'mcu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mcu_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mcu' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mcu_widgets_init' );

/* Register template redirect action callback */
add_action('template_redirect', 'remove_wp_archives');


// make root relative
add_action( 'template_redirect', 'rw_relative_urls' );
function rw_relative_urls() {
    // Don't do anything if:
    // - In feed
    // - In sitemap by WordPress SEO plugin
    if ( is_feed() || get_query_var( 'sitemap' ) )
        return;
    $filters = array(
        'post_link',
        'post_type_link',
        'page_link',
        'attachment_link',
        'get_shortlink',
        'post_type_archive_link',
        'get_pagenum_link',
        'get_comments_pagenum_link',
        'term_link',
        'search_link',
        'day_link',
        'month_link',
        'year_link',
    );
    foreach ( $filters as $filter )
    {
        add_filter( $filter, 'wp_make_link_relative' );
    }
}

/*Widget content filter
add_filter('widget_content', 'basic_widget_content_filter');
function basic_widget_content_filter($content='foo') {
	 return $content."<PRE>THIS APPEARS AFTER EVERY WIDGET</PRE>";
 }
*/
/* Remove archives */
function remove_wp_archives(){
  //If we are on category or tag or date or author archive
  if( is_category() || is_tag() || is_date() || is_author() ) {
    global $wp_query;
    $wp_query->set_404(); //set to 404 not found page
  }
}

/*
 * Force realtive URLs in srcset attributes.
 *
 */
function ssl_srcset( $sources ) {
  foreach ( $sources as &$source ) {
    $source['url'] = set_url_scheme( $source['url'], 'relative' );
  }

  return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'ssl_srcset' );

/*Remove Un-needed Feeds*/
function my_remove_feeds() {
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
}
add_action( 'after_setup_theme', 'my_remove_feeds' );

//Set up custom query variables for autos
add_filter( 'query_vars', 'addnew_query_vars', 10, 1 );
function addnew_query_vars($vars)
{
    $vars[0] = 'autoyear'; // var1 is the name of variable you want to add
    $vars[1] = 'make'; // var1 is the name of variable you want to add
    $vars[2] = 'model'; // var1 is the name of variable you want to add
    $vars[3] = 'price'; // var1 is the name of variable you want to add
    return $vars;
}


/**
 * Enqueue scripts and styles.
 */
function mcu_scripts() {

	wp_enqueue_style( 'mcu-style', get_stylesheet_uri() );
	/**
	 * Enqueue scripts and styles for loan apps & calcualtors.
	 */
  if (is_page( array (22,155,482,536,182,165,147)) || in_category('forms')) {

    //recaptcha on user forms
		if (is_page( array (22,155,482,536,1186,1235))) {
			wp_register_script('nocaptcha', 'https://www.google.com/recaptcha/api.js', false, '1.0', true );
			wp_enqueue_script('nocaptcha');

		}

		remove_filter ('the_content',  'wpautop');
    wp_enqueue_style( 'form-styles', get_template_directory_uri() . '/forms.css' );
		wp_register_script('popup-js', get_template_directory_uri() . '/js/popup.js', false, '1.0', true );
		wp_enqueue_script('popup-js');
		wp_register_script('validate-js', get_template_directory_uri() . '/js/jquery.validate.min.js', false, '1.0', true );
		wp_enqueue_script('validate-js');



	}
	if (is_page(147)) {
		remove_filter ('the_content',  'wpautop');
    wp_enqueue_style( 'form-styles', get_template_directory_uri() . '/forms.css' );
    if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        wpcf7_enqueue_scripts();
    }

    if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
        wpcf7_enqueue_styles();
    }


	}

  if (is_page(122)){
	wp_register_script('rvr-js', get_template_directory_uri() . '/js/rvrcalc.js', false, '1.0', true );
	wp_enqueue_style( 'rvr-styles', get_template_directory_uri() . '/forms.css' );
	wp_enqueue_script('rvr-js');
  }




	/**
	 * END
	 */

   wp_deregister_script('jquery');
   wp_register_script('jquery', '/wp-includes/js/jquery/jquery-3.1.0.min.js', FALSE, '3.1.0', TRUE);
   wp_enqueue_script('jquery');

   wp_deregister_script('jquery-migrate');
   wp_register_script('jquery-migrate', '/wp-includes/js/jquery/jquery-migrate.min.js', FALSE, '1.4.1', TRUE);
   wp_enqueue_script('jquery-migrate');

   wp_register_script('mcu-bgpos-js', get_template_directory_uri() . '/js/bgpos.js', false, '1.0', true );
 	 wp_enqueue_script('mcu-bgpos-js');

 	 wp_register_script('mcu-global-js', get_template_directory_uri() . '/js/global.js', false, '1.0', true );
 	 wp_enqueue_script('mcu-global-js');

   wp_register_script('mcu-carousel-js', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', 'mcu-jq-js', '1.0', true );
   wp_enqueue_script('mcu-carousel-js');



   wp_enqueue_script( 'mcu-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

  //Trozolo CMS
	//wp_register_script('mcu-jq-js', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', false, '1.0', true );
	//wp_enqueue_script('mcu-jq-js');
  //Trozolo CMS
	//wp_register_script('mcu-main-js', get_template_directory_uri() . '/js/main.js', false, '1.0', true );
	//wp_enqueue_script('mcu-main-js');

  //Trozolo CMS
	//wp_register_script('mcu-jqui-js', get_template_directory_uri() . '/js/jquery-ui-1.10.3.custom.js', 'mcu-jq-js', '1.0', true );
	//wp_enqueue_script('mcu-jqui-js');


	wp_enqueue_script( 'mcu-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mcu_scripts' );

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

//Remove shortlinks from wp_head
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
