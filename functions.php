<?php
/**
 * kinderfoundation functions and definitions
 *
 * @package kinderfoundation
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'kinderfoundation_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kinderfoundation_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kinderfoundation, use a find and replace
	 * to change 'kinderfoundation' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kinderfoundation', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(400, 300, true);
	add_image_size('header-background', 1000, 400, true);
	add_image_size('homepage', 1400, 1400, false);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kinderfoundation' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	/*
add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
*/

	add_theme_support( 'post-formats', array('link') );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kinderfoundation_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // kinderfoundation_setup
add_action( 'after_setup_theme', 'kinderfoundation_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kinderfoundation_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kinderfoundation' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kinderfoundation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kinderfoundation_scripts() {
  wp_enqueue_style( 'kinder-owl-css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css');
  wp_enqueue_style( 'kinder-owl-theme-css', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css');
  wp_enqueue_style( 'kinderfoundation-style', get_stylesheet_uri(), array(), '18.5.24' );

	/* wp_enqueue_script( 'kinderfoundation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true ); */
  wp_enqueue_script('jquery');
	wp_enqueue_script( 'kinderfoundation-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'kinder-slippry', get_template_directory_uri() . '/js/slippry.min.js', array(), null, true );
  wp_enqueue_script( 'kinder-owl', get_template_directory_uri() . '/js/owl.carousel.min.js');
	wp_enqueue_script( 'kinder-main', get_template_directory_uri() . '/js/main.js', array(), null, true );
	wp_enqueue_script( 'respond-js', get_template_directory_uri() . '/js/respond.js', array(), null, false);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( ! is_admin() && is_page('financials') ) {
  	wp_enqueue_script( 'responsive-tabs', get_template_directory_uri() . '/js/easyResponsiveTabs.js', array(), null, true );
/*     wp_enqueue_style('responsive-tabs-css', get_template_directory_uri() . '/css/easy-responsive-tabs.css'); */
	}

}
add_action( 'wp_enqueue_scripts', 'kinderfoundation_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

// Register Gift Category Taxonomy
function gift_category_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Gift Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Gift Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Gift Category', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'gift_category', array( 'post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'gift_category_taxonomy', 0 );


// Register Organization Taxonomy
function organization_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Organizations', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Organization', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Organization', 'text_domain' ),
		'all_items'                  => __( 'All Organizations', 'text_domain' ),
		'parent_item'                => __( 'Parent Organization', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Organization:', 'text_domain' ),
		'new_item_name'              => __( 'New Organization name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Organization', 'text_domain' ),
		'edit_item'                  => __( 'Edit Oranization', 'text_domain' ),
		'update_item'                => __( 'Update Organization', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate organizations with commas', 'text_domain' ),
		'search_items'               => __( 'Search Organizations', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove organizations', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used organizations', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'organization', array( 'post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'organization_taxonomy', 0 );


// Custom function to check if the current page is the child of a specified page

function is_child($page_id) {
  global $post;
  if( is_page() && ($post->post_parent == $page_id) ) {
    return true;
  } else {
    return false;
  }
}

function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) {
    return true;   // we're at the page or at a sub page
	} else {
    return false;  // we're elsewhere
  }
}

// My function to modify the main query object
function my_modify_main_query( $query ) {
  if ( $query->is_main_query() && $query->is_archive() ) { // Run only on category pages and not category query in widgets
    $query->query_vars['posts_per_page'] = -1; // Show all posts only on category pages
  }
}
// Hook my above function to the pre_get_posts action
add_action( 'pre_get_posts', 'my_modify_main_query' );


// Load Home Page Posts( reviews and news )
function search_home_posts( $query ) {
    if( $query->is_home() && $query->is_main_query() && !is_admin() ) {
        $query->set( 'post_type', array( 'blog' ) );
    }
}
add_action( 'pre_get_posts', 'search_home_posts' );


if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
   'page_title'   => 'Page Headings',
   'menu_title'   => 'Page Headings',
   'menu_slug'    => 'page-headings',
   'position'     => 21
  ));
  acf_add_options_page(array(
   'page_title'   => 'Social Media',
   'menu_title'   => 'Social Media',
   'menu_slug'    => 'Social Media',
   'position'     => 22
  ));
}

// Register Custom Post Type
function blog_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Blog Posts', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Blog Post', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Blog Posts', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Posts', 'text_domain' ),
		'view_item'           => __( 'View Post', 'text_domain' ),
		'add_new_item'        => __( 'Add New Post', 'text_domain' ),
		'add_new'             => __( 'Add New Post', 'text_domain' ),
		'edit_item'           => __( 'Edit Post', 'text_domain' ),
		'update_item'         => __( 'Update Post', 'text_domain' ),
		'search_items'        => __( 'Search Posts', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'blog',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'blog', 'text_domain' ),
		'description'         => __( 'Blog Post Type', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag', 'gift_category', 'organization' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'blog', $args );

}

// Hook into the 'init' action
add_action( 'init', 'blog_custom_post_type', 0 );

function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post' || $posttype == 'blog')  ) ? true : false ;
}
