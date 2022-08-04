<?php
/**
 * Default Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Default Theme
 */

if ( ! function_exists( 'default_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function default_theme_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Default Theme, use a find and replace
         * to change 'default_theme' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'default_theme', get_template_directory() . '/languages' );

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
            'menu-1' => esc_html__( 'Primary', 'default_theme' ),
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
add_action( 'after_setup_theme', 'default_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function default_theme_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'default_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'default_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function default_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'default_theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'default_theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

// add_action( 'widgets_init', 'default_theme_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function default_theme_scripts() {
    wp_enqueue_style( 'default_theme-style', get_template_directory_uri() . '/style.css', array(), '20151218');

    wp_enqueue_script( 'default_theme-custom', get_template_directory_uri() . '/js/main.min.js', array(), '20151218', true );

    // Remove Gutenberg styles
    wp_deregister_style('wp-block-library');


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'default_theme_scripts' );

// add_action( 'get_header', 'css_in_head', 99);
function css_in_head( $name ){
    $css_content = file_get_contents(get_stylesheet_directory_uri() . '/style.min.css');
    $css_content_one_line = str_replace(array("\r", "\n"), '', $css_content);

    echo '<style>' . $css_content . '</style>';
}


/**
 * Clear phone
 */
function clear_phone( $phone_str ) {
    $phone_str = str_replace( array( ' ', '(', ')', '-' ), array( '', '', '', '' ), $phone_str );

    return $phone_str;
}

add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Advance images size
 */
// add_image_size( 'medium-2', 400, 290 );

/**
 * Remove useless scripts and styles
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Turn off [...] form the end of the post
 */
function new_excerpt_more($more) {
    return '...';
}

// add_filter('excerpt_more', 'new_excerpt_more');

/**
 * New Excerpt Length
 */
function new_excerpt_length($length) {
    return 10;
}

// add_filter('excerpt_length', 'new_excerpt_length');

/**
 * Shortcods
 */
function site_year(){
    return date('Y');
}

add_shortcode('year', 'site_year');

/**
 *  Shortcode exemple
 */
function shortcode( $atts ) {
    $params = shortcode_atts( array(
            'param_1' => '#',
            'param_2' => '#',
            'param_3' => '#%'
    ), $atts );

    return '<div>'. $params['param_1'] .'</div>';
}

// add_shortcode( 'shortcode', 'shortcode' );

/**
 * Styles and scripts in admin
 */
function admin_styles_and_scripts() {
    ?>
        <style>
            /*  Write here your stylesheets  */
        </style>

        <script>
            /*  Write here your scripts  */
        </script>
    <?php
}
// add_action('admin_head', 'admin_styles_and_scripts');

// Media uploads permissions
if(get_option('upload_path')=='content/uploads' || get_option('upload_path')==null) {
    update_option('upload_path',WP_CONTENT_DIR.'/uploads');
}

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
 * Unyson page settings FW.
 */
// require get_template_directory() . '/inc/unyson-fw-settings.php';

add_action('fw_init', '_action_theme_test_fw_settings_form');
function _action_theme_test_fw_settings_form() {
    if (class_exists('FW_Settings_Form')) {
        require_once dirname(__FILE__) . '/inc/class-fw-settings-form-main.php';
        new FW_Settings_Form_Main('test');
    }
}

/**
 * Remove WP-editor
 */
function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'page-home.php':
            // the below removes 'editor' support for 'pages'
            // if you want to remove for posts or custom post types as well
            // add this line for posts:
            // remove_post_type_support('post', 'editor');
            // add this line for custom post types and replace 
            // custom-post-type-name with the name of post type:
            // remove_post_type_support('custom-post-type-name', 'editor');
            remove_post_type_support('page', 'editor');
            break;
            default :
            // Don't remove any other template.
            break;
        }
    }
}
add_action('init', 'remove_editor');

/**
 * Remove unnecessary
 * SEO optimization
 */

// Remove shortlink /?p=
remove_action('wp_head', 'wp_shortlink_wp_head');


/*
*  WP SECURITY
*/

// Убираем показ лишней информации
add_filter('login_errors',create_function('$a', "return null;"));


/*
  Plugin Name: Block Bad Queries
  Plugin URI: perishablepress.com/press/2009/12/22/protect-wordpress-against-malicious-url-requests
  Description: Protect WordPress Against Malicious URL Requests
  Author URI: perishablepress.com
  Author: Perishable Press
  Version: 1.0
*/

if( !is_admin() ) {
    if (
        // strlen($_SERVER['REQUEST_URI']) > 255 ||
        strpos($_SERVER['REQUEST_URI'], "eval(") ||
        strpos($_SERVER['REQUEST_URI'], "CONCAT") ||
        strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
        strpos($_SERVER['REQUEST_URI'], "base64")
    ) {
        @header("HTTP/1.1 414 Request-URI Too Long");
        @header("Status: 414 Request-URI Too Long");
        @header("Connection: Close");
        @exit;
    }
}


/*
* Удалить ненужные теги в шапке
*/
// remove favicon site
remove_action('wp_head', 'wp_site_icon', 99 );
// remove dns-prefetch
remove_action( 'wp_head', 'wp_resource_hints', 2 );
// Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links_extra', 3 );
// Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'feed_links', 2 );
// Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'rsd_link' );
// Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'wlwmanifest_link' );
// index link
remove_action( 'wp_head', 'index_rel_link' );
// prev link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
// start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
// Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );

@ini_set( ‘upload_max_size’ , ‘256M’ );
@ini_set( ‘post_max_size’, ‘200M’);
@ini_set( ‘max_execution_time’, ‘300’ );