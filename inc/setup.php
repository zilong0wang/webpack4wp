<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function custom_theme_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change 'twentyseventeen' to the name of your theme in all the template files.
     */
     load_theme_textdomain( 'webpack4wp-theme' );

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

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'main'    => __( 'Main Menu', 'webpack4wp-theme' ),
        'footer' => __( 'Footer Menu', 'webpack4wp-theme' )
    ) );

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

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function Webpack4WP_scripts()
{
	// add styles
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'main_style', get_template_directory_uri() . '/dist/css/main.css', array('style'));

	// add scripts
	wp_enqueue_script( 'runtime', get_template_directory_uri() . '/dist/runtime.bundle.js', array('jquery'), '1.0.0', false );
	wp_enqueue_script( 'vendor', get_template_directory_uri() . '/dist/vendor.bundle.js', array('runtime'), '1.0.0', false );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/dist/main.bundle.js', array('vendor'), '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'Webpack4WP_scripts' );

function custom_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer 1', 'webpack4wp-theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'webpack4wp-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'webpack4wp-theme' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'webpack4wp-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'webpack4wp-theme' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'webpack4wp-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'webpack4wp-theme' ),
        'id'            => 'sidebar-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'webpack4wp-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'custom_widgets_init' );
