<?php
/**
 * portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package portfolio
 */

if ( ! function_exists( 'portfolio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function portfolio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on portfolio, use a find and replace
		 * to change 'portfolio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'portfolio', get_template_directory() . '/languages' );

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
		add_image_size( 'category-thumb', 300, 300 ); // 300 pixels wide and 300 pixel high
		add_image_size( 'profile-thumb', 220, 180 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'portfolio' ),
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
		add_theme_support( 'custom-background', apply_filters( 'portfolio_custom_background_args', array(
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

		/**
		 * Remove word "category" from category pages
		 *
		 * @link https://catchthemes.com/support-forum/topic/remove-word-category-from-category-pages/
		 */
		add_filter( 'get_the_archive_title', function ( $title ) {
			if( is_category() ) {
				$title = single_cat_title( '', false );
			}
			return $title;
		});

		
	}
endif;
add_action( 'after_setup_theme', 'portfolio_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portfolio_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'portfolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'portfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    /* Register the 'sidebar-2' sidebar for resume. */
    register_sidebar(
        array(
			'name'          => esc_html__( 'Resume Widget Area', 'portfolio' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'portfolio' ),
			'before_widget' => '<div class="sidebar-box">',
    		'after_widget' => '</div></div>',
			'before_title'  => '<div class="title">',
			'after_title'   => '</div><div class="content-side-resume">',
        )
	);
}

add_action( 'widgets_init', 'portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function portfolio_scripts() {
	wp_enqueue_style( 'portfolio-style', get_stylesheet_uri() );

	// Load SlickNav
	wp_enqueue_script( 'mobilenav-slickjs', get_template_directory_uri() . '/SlickNav-master/jquery.slicknav.js', array('jquery') );

	wp_register_style( 'slicknav-css', get_stylesheet_directory_uri() . '/SlickNav-master/scss/slicknav.scss');
	wp_enqueue_style( 'slicknav-css' );

	// JS
	wp_enqueue_script('jquery');
	// Load Custom JS File
	wp_register_script('siteJs', get_template_directory_uri().'/js/site.js', array('jquery'), '', false );
    wp_enqueue_script('siteJs');

	//wp_enqueue_script( 'portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'portfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );

/**
 * manually set is_home to true via pre_get_posts
 */
add_action( 'pre_get_posts', function ( $q )
{
    if ( true === $q->get( 'wpse_is_home' ) ) 
        $q->is_home = true;
});



add_action( 'init', 'codex_course_init' );

/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_course_init() {
	$labels = array(
		'name'               => _x( 'Course', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Course', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Course', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Course', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'course', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Course', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Course', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Course', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Course', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Courses', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Course', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Courses:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No courses found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No courses found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'exclude_from_search'=> true,
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'course' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'page-attributes', 'custom-fields'),
		'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'course', $args );
	
}



add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
    if ( is_page_template( 'category-work.php' ) ) {
        $classes[] = 'work';
    }
    return $classes;
}


function get_the_top_ancestor_id() {
	global $post;
	if ( $post->post_parent ) {
		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
		return $ancestors[0];
	} else {
		return $post->ID;
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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

