<?php
/**
 * varyag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package varyag
 */

if(session_status() === PHP_SESSION_NONE) session_start();

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function varyag_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on varyag, use a find and replace
		* to change 'varyag' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'varyag', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'varyag' ),
			'menu-information' => esc_html__( 'Information', 'varyag' ),
			'menu-services' => esc_html__( 'Services', 'varyag' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'varyag_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'woocommerce' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'varyag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function varyag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'varyag_content_width', 640 );
}
add_action( 'after_setup_theme', 'varyag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function varyag_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'varyag' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'varyag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar Shop Filter', 'varyag' ),
            'id'            => 'sidebar-filter',
            'description'   => esc_html__( 'Add widgets here.', 'varyag' ),
            'before_widget' => '<div id="%1$s" class="accordion-block widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Card', 'varyag' ),
            'id'            => 'card_section',
            'description'   => esc_html__( 'Add widgets here.', 'varyag' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'varyag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function varyag_scripts() {
    wp_enqueue_style( 'varyag-main-style', get_template_directory_uri() . '/css/style.bundle.css', array(), _S_VERSION );
	wp_enqueue_script( 'varyag-bundle', get_template_directory_uri() . '/js/bundle.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'varyag-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_style( 'varyag-style', get_stylesheet_uri(), array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'varyag_scripts' );

add_action('wp_ajax_alx_send_mail', 'callback_alx_send_mail');
add_action('wp_ajax_nopriv_alx_send_mail', 'callback_alx_send_mail');
function callback_alx_send_mail()
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $subject = "Хочу записаться на пробное занятие";
    $message = 'Привет. Меня зовут ' . $name . '.  Хочу записаться на пробное занятие. tel:' .$phone;

    if ($name) {
        $to      = 'varyagclub-pd@yandex.ru';
        $headers = 'From: tyler145688887@gmail.com' . "\r\n" .
            'Reply-To: serhdmc96@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        wp_mail($to, $subject, $message, $headers);
        echo json_encode(['status' => 1, 'message' => 'Сообщение успешно отправлено!']);

    } else {
        echo json_encode(array('status' => 0, 'message' => 'Произощла ошибка сообщение не отправлено'));
    }
}

add_action('wp_ajax_alx_send_review_and_rating', 'alx_send_review_and_rating');
add_action('wp_ajax_nopriv_alx_send_review_and_rating', 'alx_send_review_and_rating');

function alx_send_review_and_rating()
{
    $mark = (int) $_POST["mark"];
    $name = strip_tags(trim($_POST["name"]));
    $email = strip_tags(trim($_POST["email"]));
    $message = strip_tags(trim($_POST["text"]));
    $subject = "Оценка товара " . $email . " пользователем";
    $message .= " Оценка товара " . $mark;

    if ($name) {
        $to      = 'varyagclub-pd@yandex.ru';
        $headers = 'From: tyler145688887@gmail.com' . "\r\n" .
            'Reply-To: serhdmc96@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        wp_mail($to, $subject, $message, $headers);
        echo json_encode(['status' => 1, 'message' => 'Сообщение успешно отправлено!']);

    } else {
        echo json_encode(array('status' => 0, 'message' => 'Произощла ошибка сообщение не отправлено'));
    }
}

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
require get_template_directory() . '/inc/woocommerce-hooks.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/cpt-functions.php';

require get_template_directory() . '/shortcodes/custom_shortcodes.php';

require get_template_directory() . '/inc/classes/OptionPage.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

