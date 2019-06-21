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
			'menu-2' => esc_html__( 'Social-resume', 'portfolio'  ),
			'menu-3' => esc_html__( 'Social-bar', 'portfolio'  ),
		) );


		
		/**
		 * Generate custom search form
		 *
		 * @param string $form Form HTML.
		 * @return string Modified form HTML.
		 */
		// function wpdocs_my_search_form( $form ) {
		// 	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
		// 	<div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
		// 	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
		// 	<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
		// 	</div>
		// 	</form>';
		
		// 	return $form;
		// }
		// add_filter( 'get_search_form', 'wpdocs_my_search_form' );

	

		
		add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
		function add_search_form($items, $args) {
		if( $args->theme_location == 'menu-1' )
				$searchform = '<li class="search-mobile"><form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
				<div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
				<input type="text" value="' . get_search_query() . '" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
				</div>
				</form></li>';
				$items = $items .$searchform;
				return $items;
		}


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
			'height'      => 466.4,
			'width'       => 426,
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


	wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );




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
 * Register custom post types
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

add_action('init', 'all_custom_post_types');


function all_custom_post_types() {

	$types = array(

		// Courses
		array('the_type' => 'courses', 
					'single' => 'Course', 
					'plural' => 'Courses',
					'exclude_from_search' => true), 

		// Careers
		array('the_type' => 'jobs', 
					'single' => 'Job', 
					'plural' => 'Jobs',
					'exclude_from_search' => true), 

		// Interests
		array('the_type' => 'interests', 
					'single' => 'Interest', 
					'plural' => 'Interests',
					'exclude_from_search' => true), 

		// Articles
		array('the_type' => 'articles', 
					'single' => 'Article', 
					'plural' => 'Articles',
					'exclude_from_search' => false), 

		

		// My Work
		array('the_type' => 'mywork', 
					'single' => 'Work', 
					'plural' => 'Work',
					'exclude_from_search' => false), 
					

	);

foreach ($types as $type) {

	$the_type = $type['the_type'];
	  $single = $type['single'];
	  $plural = $type['plural'];
	  $exclude_from_search = $type['exclude_from_search'];

	$labels = array(
		'name' => _x($plural, 'post type general name'),
		'singular_name' => _x($single, 'post type singular name'),
		'add_new' => _x('Add New', $single),
		'add_new_item' => __('Add New '. $single),
		'edit_item' => __('Edit '.$single),
		'new_item' => __('New '.$single),
		'view_item' => __('View '.$single),
		'search_items' => __('Search '.$plural),
		'not_found' =>  __('No '.$plural.' found'),
		'not_found_in_trash' => __('No '.$plural.' found in Trash'),
		'parent_item_colon' => '',
	
		
	  );





	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search'  => $exclude_from_search,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'show_in_rest' => true,
		'taxonomies'  => array( 'category' ),
		'supports' => array('title','editor','thumbnail','custom-fields', 'page-attributes')
	  );

	  register_post_type($the_type, $args);

}

}

function theme_prefix_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'theme_prefix_rewrite_flush' );

// Add the custom columns to the Courses post type:

function portfolio_courses_custom_columns ($columns) {
	unset($columns['date']);
	$cols = array(
		$columns['university'] = __( 'University or School', 'portfolio' ),
		$columns['period'] = __( 'Period of study', 'portfolio' ),
		$columns['city'] = __( 'City', 'portfolio' ),
	);




	$new = array();

    foreach($columns as $key => $title) {
        if ($key=='title') 
        $new['course-of-study'] = 'Course of study'; // Our New Colomn Name
        $new[$key] = $title;
    }

		unset($new['title']);
		// unset($columns['date']);
		
		
	return $new;
	return $columns;
}


add_filter( 'manage_courses_posts_columns', 'portfolio_courses_custom_columns' );


// Add the data to the custom columns for the book post type:

function custom_course_column( $column, $post_id ) {
	switch ( $column ) {

		case 'period' :
			echo get_post_meta( $post_id, 'period_of_study', true );
			break;

		case 'university' :
			echo get_post_meta( $post_id , 'university_or_school' , true ); 
			break;

		case 'city' :
			echo get_post_meta( $post_id, 'City', true );
			break;

		case 'course-of-study' :
			$oldtitle = get_the_title();
			$newtitle = str_replace(array("<span class='sub-title'>", "</span>"), array("", ""),$oldtitle);
			$title = esc_attr($newtitle); 
			echo $title; 
			break;
	}
}


add_action( 'manage_courses_posts_custom_column' , 'custom_course_column', 10, 2 );


// Add the custom columns to the jobs post type:

function portfolio_jobs_custom_columns ($columns) {
	unset($columns['date']);
	$cols = array(
		$columns['city'] = __( 'City', 'portfolio' ),
		$columns['employer'] = __( 'Employer', 'portfolio' ),
		$columns['period-of-work'] = __( 'Period of work', 'portfolio' ),
		$columns['key-achievements'] = __( 'Period of work', 'portfolio' ),
	);




	$new = array();

    foreach($columns as $key => $title) {
        if ($key=='title') 
        $new['job-title'] = 'Job Title'; // Our New Colomn Name
        $new[$key] = $title;
    }

		unset($new['title']);
		
		
		
	return $new;
	return $columns;
}


add_filter( 'manage_jobs_posts_columns', 'portfolio_jobs_custom_columns' );


// Add the data to the custom columns for the jobs post type:

function custom_job_column( $column, $post_id ) {
	switch ( $column ) {

		case 'city' :
			echo get_post_meta( $post_id, 'City', true );
			break;

		case 'employer' :
			echo get_post_meta( $post_id , 'employer' , true ); 
			break;

		case 'period-of-work' :
			echo get_post_meta( $post_id, 'period_of_work', true );
			break;

		case 'key-achievements' :
			echo get_post_meta( $post_id, 'key_achievements', true );
			break;

		case 'job-title' :
			$oldtitle = get_the_title();
			$newtitle = str_replace(array("<span class='sub-title'>", "</span>"), array("", ""),$oldtitle);
			$title = esc_attr($newtitle); 
			echo $title; 
			break;
	}
}


add_action( 'manage_jobs_posts_custom_column' , 'custom_job_column', 10, 2 );





// Modifying search query to exclude posts not intented for front-end and limit results to 10 per page on front end only

function searchfilter($query) {
 
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('post'));
    }
 
return $query;
}
 

function change_wp_search_size($query) {
    if ( $query->is_search && !is_admin() ) {
        	//Exclude posts by ID
		$post_ids = array(900,903,685,8,746,748,750,3);
		$query->set('post__not_in', $post_ids);
		$query->set( 'posts_per_page', 10 );
    }

    return $query;
}

add_filter('pre_get_posts', 'change_wp_search_size');

//////////////////////

// add a class work for the category-work.php file

// add_filter( 'body_class', 'custom_class' );
// function custom_class( $classes ) {
//     if ( is_page_template( 'category-work.php' ) ) {
//         $classes[] = 'work';
//     }
//     return $classes;
// }




// **
//  * Display category list
//  */
function portfolio_the_category_list() {
	/* Space inserted between categories */
	$categories_list = get_the_category_list( esc_html__( ' ', 'portfolio' ) );
	printf( '<span class="cat-links">' . esc_html__( '%1$s', 'portfolio' ) . '</span>', $categories_list );
}

// Control Excerpt Length
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


// **
//  * Filter the excerpt "read more" string.
//  *
//  * @param string $more "Read more" excerpt string.
//  * @return string (Maybe) modified "read more" excerpt string.
//  */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


// Enable menu descriptions for social nav resume


function add_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'menu-2' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . esc_html( $item->description ) . '</div>' . $args->link_after . '</a>', $item_output );
	}
	
	return $item_output;
	}
add_filter( 'walker_nav_menu_start_el', 'add_nav_description', 10, 4 );





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

