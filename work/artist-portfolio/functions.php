<?php
/**
 * Henri Bowen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Henri_Bowen
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'henri_bowen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function henri_bowen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Henri Bowen, use a find and replace
		 * to change 'henri-bowen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'henri-bowen', get_template_directory() . '/languages' );

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
		add_image_size( 'links-imgs', 350, 330, true );
		add_image_size( 'series-thumbs', 568, 656, true );
		add_image_size( 'mason-thumbs', 568, 0, true );
		add_image_size( 'featured-works', 350, 300, true );
		add_image_size( 'latest-event', 300, 200, true );
		add_image_size( 'single-event', 900, 450, true);
		add_image_size( 'event', 530, 330, true);


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header' => esc_html__( 'Header Menu Location', 'hb' ),
				'social' => esc_html__( 'Social Menu Location', 'hb' ),
			)
		);

		/*
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
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'henri_bowen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function henri_bowen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'henri_bowen_content_width', 640 );
}
add_action( 'after_setup_theme', 'henri_bowen_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function henri_bowen_scripts() {
	wp_enqueue_style( 'hb-google-fonts', 
	'https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Open+Sans:wght@700&family=Josefin+Sans:wght@600;700&display=swap',
	array(),
	null);

	wp_enqueue_style( 'henri-bowen-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'henri-bowen-style', 'rtl', 'replace' );

	wp_enqueue_script( 'henri-bowen-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	if (is_singular('hb-gallery')):
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'imageloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), false, true);
		wp_enqueue_script( 'henri-bowen-modal-js', get_template_directory_uri() . '/js/modal.js', array('jquery', 'isotope', 'imageloaded'), false, true );
	endif;
	
	if (is_page(27)):
		wp_enqueue_script( 'henri-bowen-gmap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCM47l5maTLVVQoTdh74hswHK0JHRTmoWI', array(), _S_VERSION, true );
		wp_enqueue_script( 'henri-bowen-gmap-settings', get_template_directory_uri() . '/js/googlemap.js', array('jquery'), _S_VERSION, true );
	endif;	
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'henri_bowen_scripts' );

// Google Maps

function gmap_init() {	
	acf_update_setting('google_api_key', 'AIzaSyCM47l5maTLVVQoTdh74hswHK0JHRTmoWI');
}
add_action('acf/init', 'gmap_init');


/**
 * Lower Yoast SEO Metabox location
 */
function yoast_to_bottom(){
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );



function my_toolbars( $toolbars )
{
	$toolbars['Very Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'underline', 'link' );

	// return $toolbars - IMPORTANT!
	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );

function wporg_remove_all_dashboard_metaboxes() {
    // Remove Welcome panel
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    // Remove the rest of the dashboard widgets
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
}
add_action( 'wp_dashboard_setup', 'wporg_remove_all_dashboard_metaboxes' );

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
 function wporg_add_dashboard_widgets() {
    wp_add_dashboard_widget(
        'wporg_tutorial_widget',                        
        esc_html__( 'WordPress Tutorial', 'wporg' ), 
		'wporg_tutorial_widget_render',                      
	); 

	wp_add_dashboard_widget(
        'example 2',                        
        esc_html__( 'Welcome!', 'wporg' ), 
		'wporg_dashboard_widget_render',                      
	); 
}
add_action( 'wp_dashboard_setup', 'wporg_add_dashboard_widgets' );
 
/**
 * Create the function to output the content of our Dashboard Widget.
 */
function wporg_tutorial_widget_render() {
	esc_html_e( "Download the PDF file below to use your new WordPRess website!", "wporg" );
	echo '<p><a href="https://henribowen.bcitwebdeveloper.ca/wp-content/uploads/2020/11/Copy-of-Capstone-Tutorial-Website-Manual.pdf" download>Download PDF Tutorial</a></p>';
}

function wporg_dashboard_widget_render() {
	echo '<p>This is Henri Bowen\'s Artist Portfolio.</p>';
}

function RemoveAddMediaButtonsForNonAdmins(){
    if ( !current_user_can( 'manage_options' ) ) {
        remove_action( 'media_buttons', 'media_buttons' );
    }
}
add_action('admin_head', 'RemoveAddMediaButtonsForNonAdmins');

/**
 * Remove the 'Add Form' WPForms TinyMCE button.
 *
 * In the function below we disable displaying the 'Add Form' button
 * on pages and posts. You can replace 'page' and 'post' with your desired post type.
 *
 * @link   https://wpforms.com/developers/remove-add-form-button-from-tinymce-editor/
 *
 * @param  bool $display
 * @return bool
 */
 function wpf_dev_remove_media_button( $display ) {
 
    $screen = get_current_screen();
 
    if ( 'page' == $screen->post_type || 'post' == $screen->post_type ) {
        return false;
 
    } 
    return $display;
}
add_filter( 'wpforms_display_media_button', 'wpf_dev_remove_media_button' );


// Remove admin menu links for non-Administrator accounts
function twd_remove_admin_links() {
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'edit.php' );           // Remove Posts link
    	remove_menu_page( 'edit-comments.php' );   // Remove Comments link
	}
}
add_action( 'admin_menu', 'twd_remove_admin_links' );

// Customize the WordPress Admin Menu
function twd_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    // Modify the following array to reorder the menu
    // Add links, remove links, reorder links
    return array(
        'index.php',               // Dashboard
        'separator1',              // First separator
        'upload.php',              // Media
		'edit.php?post_type=page', // Pages
		'edit.php?post_type=hb-gallery', // Gallery
		'edit.php?post_type=hb-events', // Events
		'edit.php?post_type=hb-links', // Links
		'edit.php?post_type=acf-field-group', // ACF
		'separator2',              // Second separator
        'themes.php',              // Appearance
        'plugins.php',             // Plugins
        'users.php',               // Users
        'tools.php',               // Tools
        'options-general.php',     // Settings
        'separator-last',          // Last separator
    );
}
add_filter( 'custom_menu_order', 'twd_custom_menu_order', 14, 1 );
add_filter( 'menu_order', 'twd_custom_menu_order', 14, 1 );

add_editor_style();
add_theme_support( 'editor-styles' );

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/hb-logo.png);
		height:100px;
		width:100px;
		background-size: 100px 100px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function ms_post_filter( $use_block_editor, $post ) {
	if ( 19 === $post->ID || 23 === $post->ID || 21 === $post->ID || 17 === $post->ID || 25 === $post->ID || 160 === $post->ID ) {
		return false;
	}
	return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'ms_post_filter', 10, 2 );


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
* Custom Post Types & Taxonomies
*/
require get_template_directory () . '/inc/cpt-taxonomy.php';