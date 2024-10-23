<?php
/**
 * Big Bob functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Big_Media
 */

if ( ! defined( 'BIG_MEDIA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$theme_data = wp_get_theme();
	define( 'BIG_MEDIA_VERSION', $theme_data->get( 'Version' ) );
}

if ( ! function_exists( 'big_bob_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function big_bob_setup() {

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
				'menu-1' => esc_html__( 'Navbar', 'big-media' ),
				'menu-2' => esc_html__( 'Main Sidebar', 'big-media' ),
				'menu-3' => esc_html__( 'Footer', 'big-media' ),
				'menu-4' => esc_html__( 'Page Sidebar', 'big-media' ),
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

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 88,
				'width'       => 191,
				'flex-width'  => true,
				'flex-height' => false,
			)
		);

		add_theme_support('header_text');
		add_theme_support('align-wide');
	}
endif;
add_action( 'after_setup_theme', 'big_bob_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function big_bob_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'big_bob_content_width', 640 );
}
add_action( 'after_setup_theme', 'big_bob_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function big_bob_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar 1', 'big-media' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'This will serve widgets (blocks) to the top sidebar of any non-page areas of your website.
			This includes any section of your site that is not explicitly built as a page (posts, 404, search, etc.).
			This sidebar includes a sticky feature that can be toggled on and off in the Navigation section of the 
			customizer.  If you add a Main Sidebar 2, then this sidebar will remain static, and sidebar 2 will
			become sticky.  If a main sidebar menu is used, then the widgets (blocks) for this area will be 
			featured below it.', 'big-media' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar 2', 'big-media' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Please read the description for Main Sidebar 1 before reading this 
			description.  This will only be displayed if Main Sidebar 1 is displayed.  This sidebar includes a 
			sticky feature that can be toggled on and off in the Navigation section of the customizer.
			This will be set below the first sidebar.', 'big-media' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar 1', 'big-media' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'This will serve widgets (blocks) to the top sidebar of a page built
			using pages (not posts).  This sidebar includes a sticky feature that can be toggled on and off in the 
			Navigation section of the customizer.  You can also remove this sidebar from pages by using the control
			in the Layout section of the customizer, or you can select the No Sidebar Template in the block editor.
			Note that you may need to publish the page before you can see the No Sidebar Template take effect.
			If a main sidebar menu is used, then the widgets (blocks) for this area will be featured below it.', 'big-media' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar 2', 'big-media' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Please read the description for Page Sidebar 1 before reading this 
			description.  This will only be displayed if Page Sidebar 1 is displayed.  This sidebar includes a 
			sticky feature that can be toggled on and off in the Navigation section of the customizer.
			This will be set below the first sidebar.', 'big-media' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'big-media' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'These widgets (blocks) will be entered into the footer at the bottom of the page.', 'big-media' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'big_bob_widgets_init' );

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
add_editor_style( get_stylesheet_uri() );

/**
 * Enqueue scripts and styles.
 */
function big_bob_scripts() {
	wp_enqueue_style( 'big-media-style', get_stylesheet_uri(), array(), BIG_MEDIA_VERSION );
	wp_style_add_data( 'big-media-style', 'rtl', 'replace' );
    $big_bob_prev_font_1 = "";
    $big_bob_prev_font_2 = "";
    $big_bob_prev_font_3 = "";
    if (get_theme_mod('big_bob_fonts_title', 'Playfair Display') != "") {
        $big_bob_font = get_theme_mod('big_bob_fonts_title', 'Playfair Display');
        $big_bob_font = trim($big_bob_font);
        $big_bob_font = str_replace(' ', '+', $big_bob_font);
        $big_bob_url = 'https://fonts.googleapis.com/css?family=';
        $big_bob_url .= $big_bob_font;
        wp_enqueue_style('big-media-google-fonts', esc_url($big_bob_url), false);
        $big_bob_prev_font_1 = $big_bob_url;
    }
	if (get_theme_mod('big_bob_fonts_main_title', 'Alfa Slab One') != "") {
        $big_bob_font = get_theme_mod('big_bob_fonts_main_title', 'Alfa Slab One');
        $big_bob_font = trim($big_bob_font);
        $big_bob_font = str_replace(' ', '+', $big_bob_font);
        $big_bob_url = 'https://fonts.googleapis.com/css?family=';
        $big_bob_url .= $big_bob_font;
        if ($big_bob_url != $big_bob_prev_font_1) {
            wp_enqueue_style('big-media-google-fonts-2', esc_url($big_bob_url), false);
        }
		$big_bob_prev_font_2 = $big_bob_url;
    }
    if (get_theme_mod('big_bob_fonts_paragraph', "Playfair Display") != "") {
        $big_bob_font = get_theme_mod('big_bob_fonts_paragraph', "Playfair Display");
        $big_bob_font = trim($big_bob_font);
        $big_bob_font = str_replace(' ', '+', $big_bob_font);
        $big_bob_url = 'https://fonts.googleapis.com/css?family=';
        $big_bob_url .= $big_bob_font;
        if (($big_bob_url != $big_bob_prev_font_1) && ($big_bob_url != $big_bob_prev_font_2)) {
            wp_enqueue_style('big-media-google-fonts-3', esc_url($big_bob_url), false);
        }
		$big_bob_prev_font_3 = $big_bob_url;
    }
    if (get_theme_mod('big_bob_fonts_misc', 'Titillium Web') != "") {
        $big_bob_font = get_theme_mod('big_bob_fonts_misc', 'Titillium Web');
        $big_bob_font = trim($big_bob_font);
        $big_bob_font = str_replace(' ', '+', $big_bob_font);
        $big_bob_url = 'https://fonts.googleapis.com/css?family=';
        $big_bob_url .= $big_bob_font;
        if (($big_bob_url != $big_bob_prev_font_1) && ($big_bob_url != $big_bob_prev_font_2) && ($big_bob_url != $big_bob_prev_font_3)) {
            wp_enqueue_style('big-media-google-fonts-4', esc_url($big_bob_url), false);
        }
    }
	wp_enqueue_style('big-media-font-awesome', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css');
	wp_enqueue_script( 'big-media-scripts-js', get_template_directory_uri() . '/js/big-media-scripts.js?v=0.3', array('jquery'), '20160909', true );

	wp_enqueue_script( 'big-media-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), BIG_MEDIA_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'big_bob_scripts' );

/*block extensions*/
function big_bob_guten_enqueue() {
    wp_enqueue_script(
        'big-media-guten-script',
        get_template_directory_uri() . '/js/big-media-guten.js?v=0.2',
		array( 'wp-blocks' )
    );
}
add_action( 'enqueue_block_editor_assets', 'big_bob_guten_enqueue' );//has to be added to block editor assets

/*block variations*/
function prefix_editor_assets() {
	wp_enqueue_script(
		'prefix-block-variations',
		get_template_directory_uri() . '/js/block-variation.js',
		array( 'wp-blocks' )
		);
	}
add_action( 'enqueue_block_editor_assets', 'prefix_editor_assets' );


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


