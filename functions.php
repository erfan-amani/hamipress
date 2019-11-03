<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('HAMIPRESS_VERSION', '0.1');
define('HAMIPRESS_TEXTDOMAIN', 'hamipress');

if ( ! function_exists( 'hamipress_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hamipress_setup(){

		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change HAMIPRESS_TEXTDOMAIN to the name of your theme in all the template files.
		 */
		load_theme_textdomain( HAMIPRESS_TEXTDOMAIN , get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 750, 9999 );

		/**
		 * wp_nav_menu() used locations.
		 */
		register_nav_menus(
			array(
				'primary-menu'      => __( 'Primary menu',      HAMIPRESS_TEXTDOMAIN ),
				'action-bar-menu'   => __( 'Action bar menu',   HAMIPRESS_TEXTDOMAIN ),
				'footer-menu'       => __( 'Footer menu',       HAMIPRESS_TEXTDOMAIN ),
			)
		);

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 128,
				'width'       => 128,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', HAMIPRESS_TEXTDOMAIN ),
					'shortName' => __( 'S',     HAMIPRESS_TEXTDOMAIN ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', HAMIPRESS_TEXTDOMAIN ),
					'shortName' => __( 'M',      HAMIPRESS_TEXTDOMAIN ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', HAMIPRESS_TEXTDOMAIN ),
					'shortName' => __( 'L',     HAMIPRESS_TEXTDOMAIN ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', HAMIPRESS_TEXTDOMAIN ),
					'shortName' => __( 'XL',   HAMIPRESS_TEXTDOMAIN ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', HAMIPRESS_TEXTDOMAIN ),
					'slug'  => 'primary',
					'color' => hamipress_hsl_to_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', HAMIPRESS_TEXTDOMAIN ),
					'slug'  => 'secondary',
					'color' => hamipress_hsl_to_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', HAMIPRESS_TEXTDOMAIN ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', HAMIPRESS_TEXTDOMAIN ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', HAMIPRESS_TEXTDOMAIN ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'hamipress_setup' );


/**
 * Register widget area.
 */
function hamipress_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Sidebar', HAMIPRESS_TEXTDOMAIN ),
			'id'            => 'sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', HAMIPRESS_TEXTDOMAIN ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer', HAMIPRESS_TEXTDOMAIN ),
			'id'            => 'footer',
			'description'   => __( 'Add widgets here to appear above your footer.', HAMIPRESS_TEXTDOMAIN ),
			'before_widget' => '<section id="%1$s" class="widget %2$s col-sm-3">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

}
add_action( 'widgets_init', 'hamipress_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function hamipress_scripts() {
	wp_enqueue_style( 'hamipress-style',    get_stylesheet_uri(), array(), HAMIPRESS_VERSION );
	wp_enqueue_style( 'hamipress-all-styles',    get_template_directory_uri() . '/css/styles.css', array(), HAMIPRESS_VERSION );
	// prettify printing view
//	wp_enqueue_style( 'hamipress-print-style', get_template_directory_uri() . '/print.css', array(), HAMIPRESS_VERSION, 'print' );


	wp_enqueue_script( 'hamipress-script',     get_template_directory_uri() . '/js/hamipress-script.js', array(), HAMIPRESS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'hamipress_scripts' );




/**
 *
 * Include other files
 *
 */


/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-hamipress-walker-comment.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-hamipress-svg-handler.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Helper functions
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';