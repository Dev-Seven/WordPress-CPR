<?php
/**
 * cpr functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cpr
 */
?>
<?php
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'cpr_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cpr_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cpr, use a find and replace
		 * to change 'cpr' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cpr', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'cpr' ),
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
				'cpr_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
endif;
add_action( 'after_setup_theme', 'cpr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cpr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cpr_content_width', 640 );
}
add_action( 'after_setup_theme', 'cpr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cpr_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cpr' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cpr' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
register_sidebar( array(
'name' => 'Footer Sidebar 1',
'id' => 'footer-sidebar-1',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 2',
'id' => 'footer-sidebar-2',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 3',
'id' => 'footer-sidebar-3',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 4',
'id' => 'footer-sidebar-4',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
	'name' => 'Header Search',
	'id' => 'header-search',
	'description' => 'Appears in the header area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'cpr_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function cpr_scripts() {
	wp_enqueue_style( 'cpr-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'cpr-style', 'rtl', 'replace' );

	wp_enqueue_script( 'cpr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
        /* Amol code */

    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/script.js', array('jquery') );    
    wp_localize_script( 'ajax-script', 'ajax_url', admin_url('admin-ajax.php') );
    
    /* amol code end */

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cpr_scripts' );

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

// Jobs Custom Post Type
function jobs_init() {
    // set up Researchinitiatives labels
    $labels1 = array(
        'name' => 'Jobs',
        'singular_name' => 'Jobs',
        'add_new' => 'Add New Jobs',
        'add_new_item' => 'Add New Jobs',
        'edit_item' => 'Edit Jobs',
        'new_item' => 'New Jobs',
        'all_items' => 'All Jobs',
        'view_item' => 'View Jobs',
        'search_items' => 'Search Jobs',
        'not_found' =>  'No Jobs Found',
        'not_found_in_trash' => 'No Jobs found in Trash', 
        'parent_item_colon' => 'Jobs',
        'menu_name' => 'Jobs',
    );
    
    // register post type
    $args1 = array(
        'labels' => $labels1,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'jobs'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',
			'post-attributes'
        )
    );
    register_post_type( 'jobs', $args1 );   
	
}
add_action( 'init', 'jobs_init' );

// Researchinitiatives Custom Post Type
function research_init() {
    // set up Researchinitiatives labels
    $labels1 = array(
        'name' => 'Research Initiatives',
        'singular_name' => 'Research Initiatives',
        'add_new' => 'Add New Research Initiatives',
        'add_new_item' => 'Add New Research Initiatives',
        'edit_item' => 'Edit Research Initiatives',
        'new_item' => 'New Research Initiatives',
        'all_items' => 'All Research Initiatives',
        'view_item' => 'View Research Initiatives',
        'search_items' => 'Search Research Initiatives',
        'not_found' =>  'No Research Initiatives Found',
        'not_found_in_trash' => 'No Research Initiatives found in Trash', 
        'parent_item_colon' => 'Research Initiatives',
        'menu_name' => 'Research Initiatives',
    );
    
    // register post type
    $args1 = array(
        'labels' => $labels1,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'research'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',
			'post-attributes'
        )
    );
    register_post_type( 'research', $args1 );   
	
}
add_action( 'init', 'research_init' );


// People Custom Post Type
function people_init() {
    // set up Researchinitiatives labels
    $peoplep = array(
        'name' => 'People',
        'singular_name' => 'People',
        'add_new' => 'Add New People',
        'add_new_item' => 'Add New People',
        'edit_item' => 'Edit People',
        'new_item' => 'New People',
        'all_items' => 'All People',
        'view_item' => 'View People',
        'search_items' => 'Search People',
        'not_found' =>  'No People Found',
        'not_found_in_trash' => 'No People found in Trash', 
        'parent_item_colon' => 'People',
        'menu_name' => 'People',
    );
    
    // register post type
    $people = array(
        'labels' => $peoplep,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
		'exclude_from_search' => true,
        'rewrite' => array('slug' => 'people'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        )
    );
    register_post_type( 'people', $people );   
	
   register_taxonomy('people_category', 'people', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'people-category' )));
	
}
add_action( 'init', 'people_init' );

// Books Custom Post Type
function books_init() {
    // set up Books labels
    $labels = array(
        'name' => 'Books',
        'singular_name' => 'Books',
        'add_new' => 'Add New Books',
        'add_new_item' => 'Add New Books',
        'edit_item' => 'Edit Books',
        'new_item' => 'New Books',
        'all_items' => 'All Books',
        'view_item' => 'View Books',
        'search_items' => 'Search Books',
        'not_found' =>  'No Books Found',
        'not_found_in_trash' => 'No Books found in Trash', 
        'parent_item_colon' => 'Books',
        'menu_name' => 'Books',
		'attributes' => 'Post Attributes',
		'exclude_from_search' => true,
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'books'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
			'post-attributes',
            'page-attributes'
        )
    );
    register_post_type( 'books', $args );

}
add_action( 'init', 'books_init' );

// Book Chapters Custom Post Type
function bookchapters_init() {
    // set up Book Chapters labels
    $labels = array(
        'name' => 'Book Chapters',
        'singular_name' => 'Book Chapters',
        'add_new' => 'Add New Book Chapters',
        'add_new_item' => 'Add New Book Chapters',
        'edit_item' => 'Edit Book Chapters',
        'new_item' => 'New Book Chapters',
        'all_items' => 'All Book Chapters',
        'view_item' => 'View Book Chapters',
        'search_items' => 'Search Book Chapters',
        'not_found' =>  'No Book Chapters Found',
        'not_found_in_trash' => 'No Book Chapters found in Trash', 
        'parent_item_colon' => 'Book Chapters',
        'menu_name' => 'Book Chapters',
		'attributes' => 'Post Attributes'
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'bookchapters'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
			'post-attributes',
            'page-attributes'
        )
    );
    register_post_type( 'bookchapters', $args );

}
add_action( 'init', 'bookchapters_init' );

// Opinions Custom Post Type
function opinions_init() {
    // set up Opinions labels
    $labels = array(
        'name' => 'Opinions And Commentary',
        'singular_name' => 'Opinions And Commentary',
        'add_new' => 'Add New Opinions And Commentary',
        'add_new_item' => 'Add New Opinions And Commentary',
        'edit_item' => 'Edit Opinions And Commentary',
        'new_item' => 'New Opinions And Commentary',
        'all_items' => 'All Opinions And Commentary',
        'view_item' => 'View Opinions And Commentary',
        'search_items' => 'Search Opinions And Commentary',
        'not_found' =>  'No Opinions And Commentary Found',
        'not_found_in_trash' => 'No Opinions And Commentary found in Trash', 
        'parent_item_colon' => 'Opinions And Commentary',
        'menu_name' => 'Opinion And Commentary',
		'attributes' => 'Post Attributes'
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'opinions'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
			'post-attributes',
            'page-attributes'
        )
    );
    register_post_type( 'opinions', $args );

}
add_action( 'init', 'opinions_init' );

// Journal Articles Custom Post Type
function journalarticles_init() {
    // set up Journal Articles labels
    $labels = array(
        'name' => 'Journal Articles',
        'singular_name' => 'Journal Articles',
        'add_new' => 'Add New Journal Articles',
        'add_new_item' => 'Add New Journal Articles',
        'edit_item' => 'Edit Journal Articles',
        'new_item' => 'New Journal Articles',
        'all_items' => 'All Journal Articles',
        'view_item' => 'View Journal Articles',
        'search_items' => 'Search Journal Articles',
        'not_found' =>  'No Journal Articles Found',
        'not_found_in_trash' => 'No Journal Articles found in Trash', 
        'parent_item_colon' => 'Journal Articles',
        'menu_name' => 'Journal Articles',
		'attributes' => 'Post Attributes'
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'journalarticles'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
			'post-attributes',
            'page-attributes'
        )
    );
    register_post_type( 'journalarticles', $args );

}
add_action( 'init', 'journalarticles_init' );

	// Briefs Reports Custom Post Type
function briefsreports_init() {
    // set up Briefs Reports labels
    $labels = array(
        'name' => 'Briefs Reports',
        'singular_name' => 'Briefs Reports',
        'add_new' => 'Add New Briefs Reports',
        'add_new_item' => 'Add New Briefs Reports',
        'edit_item' => 'Edit Briefs Reports',
        'new_item' => 'New Briefs Reports',
        'all_items' => 'All Briefs Reports',
        'view_item' => 'View Briefs Reports',
        'search_items' => 'Search Briefs Reports',
        'not_found' =>  'No Briefs Reports Found',
        'not_found_in_trash' => 'No Briefs Reports found in Trash', 
        'parent_item_colon' => 'Briefs Reports',
        'menu_name' => ' Policy Briefs & Reports',
		'attributes' => 'Post Attributes'
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'briefsreports'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
			'post-attributes',
            'page-attributes'
        )
    );
    register_post_type( 'briefsreports', $args );

}
add_action( 'init', 'briefsreports_init' );



// Working Papers Custom Post Type
function workingpapers_init() {
    // set up Working Papers labels
    $labels = array(
        'name' => 'Working Papers',
        'singular_name' => 'Working Papers',
        'add_new' => 'Add New Working Papers',
        'add_new_item' => 'Add New Working Papers',
        'edit_item' => 'Edit Working Papers',
        'new_item' => 'New Working Papers',
        'all_items' => 'All Working Papers',
        'view_item' => 'View Working Papers',
        'search_items' => 'Search Working Papers',
        'not_found' =>  'No Working Papers Found',
        'not_found_in_trash' => 'No Working Papers found in Trash', 
        'parent_item_colon' => 'Working Papers',
        'menu_name' => 'Working Papers',
		'attributes' => 'Post Attributes'
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'workingpapers'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
			'post-attributes',
            'page-attributes'
        )
    );
    register_post_type( 'workingpapers', $args );

}
add_action( 'init', 'workingpapers_init' );

// Project Custom Post Type
function project_init() {
    // set up Project labels
    $labels = array(
        'name' => 'Project',
        'singular_name' => 'Project',
        'add_new' => 'Add New Project',
        'add_new_item' => 'Add New Project',
        'edit_item' => 'Edit Project',
        'new_item' => 'New Project',
        'all_items' => 'All Project',
        'view_item' => 'View Project',
        'search_items' => 'Search Project',
        'not_found' =>  'No Project Found',
        'not_found_in_trash' => 'No Project found in Trash', 
        'parent_item_colon' => 'Project',
        'menu_name' => 'Project',
		'attributes' => 'Post Attributes'
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'project'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
			'post-attributes',
            'page-attributes'
        )
    );
    register_post_type( 'project', $args );

}
add_action( 'init', 'project_init' );


// Project Custom Post Type
function researcharea_init() {
    // set up Project labels
    $labels = array(
        'name' => 'Research Area',
        'singular_name' => 'Research Area',
        'add_new' => 'Add New Research Area',
        'add_new_item' => 'Add New Research Area',
        'edit_item' => 'Edit Research Area',
        'new_item' => 'New Research Area',
        'all_items' => 'All Research Area',
        'view_item' => 'View Research Area',
        'search_items' => 'Search Research Area',
        'not_found' =>  'No Research Area Found',
        'not_found_in_trash' => 'No Research Area found in Trash', 
        'parent_item_colon' => 'Research Area',
        'menu_name' => 'Research Area',
		'attributes' => 'Post Attributes'
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'researcharea'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
			'post-attributes',
            'page-attributes'
        )
    );
    register_post_type( 'researcharea', $args );

}
add_action( 'init', 'researcharea_init' );

// Home Video Custom Post Type
function homevideo_init() {
    // set up Home Video labels
    $labels = array(
        'name' => 'Home Video',
        'singular_name' => 'Home Video',
        'add_new' => 'Add New Home Video',
        'add_new_item' => 'Add New Home Video',
        'edit_item' => 'Edit Home Video',
        'new_item' => 'New Home Video',
        'all_items' => 'All Home Video',
        'view_item' => 'View Home Video',
        'search_items' => 'Search Home Video',
        'not_found' =>  'No Home Video Found',
        'not_found_in_trash' => 'No Home Video found in Trash', 
        'parent_item_colon' => 'Home Video',
        'menu_name' => 'Home Video',
		'attributes' => 'Post Attributes'
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'Home Video'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
			'post-attributes',
            'page-attributes'
        )
    );
    register_post_type( 'homevideo', $args );

}
add_action( 'init', 'homevideo_init' );

function booksd_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=booksdetail', 'booksd_name_bidirectional_acf_update_value', 10, 3);

function book_chapters_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=book_chapters_name', 'book_chapters_name_bidirectional_acf_update_value', 10, 3);

function books_article_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=books_article_name', 'books_article_name_bidirectional_acf_update_value', 10, 3);


function briefs_reports_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=briefs_reports', 'briefs_reports_bidirectional_acf_update_value', 10, 3);

function opinions_detail_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=opinions_detail', 'opinions_detail_bidirectional_acf_update_value', 10, 3);

function project_detail_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=project_detail', 'project_detail_bidirectional_acf_update_value', 10, 3);

function research_detail_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=research_detail', 'research_detail_bidirectional_acf_update_value', 10, 3);

function news_detail_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=news_detail', 'news_detail_bidirectional_acf_update_value', 10, 3);

function working_papers_detail_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=working_papers_detail', 'working_papers_detail_bidirectional_acf_update_value', 10, 3);


function journalarticles_detail_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=journalarticles_detail', 'journalarticles_detail_bidirectional_acf_update_value', 10, 3);


function ja_detail_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=ja_detail', 'ja_detail_bidirectional_acf_update_value', 10, 3);


function research_area_detail_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=research_area_detail', 'research_area_detail_bidirectional_acf_update_value', 10, 3);



function books_research_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=books_research_detail', 'books_research_name_bidirectional_acf_update_value', 10, 3);


function book_chapters_research_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=book_chapters_research_detail', 'book_chapters_research_name_bidirectional_acf_update_value', 10, 3);


function briefs_reports_research_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=briefs_reports_research_detail', 'briefs_reports_research_name_bidirectional_acf_update_value', 10, 3);


function opinions_detail_research_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=opinions_detail_research', 'opinions_detail_research_name_bidirectional_acf_update_value', 10, 3);


function project_detail_research_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=project_detail_research', 'project_detail_research_name_bidirectional_acf_update_value', 10, 3);


function workpapers_detail_research_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=working_papers_detail_research', 'workpapers_detail_research_name_bidirectional_acf_update_value', 10, 3);


function news_detail_research_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=news_detail_research', 'news_detail_research_name_bidirectional_acf_update_value', 10, 3);



function books_research_area_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=books_research_area_detail', 'books_research_area_name_bidirectional_acf_update_value', 10, 3);

function book_chapters_research_area_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=book_chapters_research_area_detail', 'book_chapters_research_area_name_bidirectional_acf_update_value', 10, 3);

function briefs_reports_research_area_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=briefs_reports_research_area_details', 'briefs_reports_research_area_name_bidirectional_acf_update_value', 10, 3);

function journal_article_research_area_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=journal_article_research_area_detail', 'journal_article_research_area_name_bidirectional_acf_update_value', 10, 3);

function opinions_relation_research_area_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=opinions_relation_research_area_details', 'opinions_relation_research_area_name_bidirectional_acf_update_value', 10, 3);

function project_relation_research_area_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=project_relation_research_area', 'project_relation_research_area_name_bidirectional_acf_update_value', 10, 3);

function working_papers_research_area_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=working_papers_research_area_details', 'working_papers_research_area_name_bidirectional_acf_update_value', 10, 3);

function news_relation_research_area_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=news_relation_research_area_details', 'news_relation_research_area_name_bidirectional_acf_update_value', 10, 3);


function project_relation_books_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=project_relation_books_details', 'project_relation_books_name_bidirectional_acf_update_value', 10, 3);

function project_relation_opinion_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=project_relation_opinion_details', 'project_relation_opinion_name_bidirectional_acf_update_value', 10, 3);

function project_relation_bookchapters_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=project_relation_book_chapters_details', 'project_relation_bookchapters_name_bidirectional_acf_update_value', 10, 3);

function project_relation_policybriefsreports_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=project_relation_policy_briefs_reports_details', 'project_relation_policybriefsreports_name_bidirectional_acf_update_value', 10, 3);

function project_relation_journalarticles_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=project_relation_journal_articles_details', 'project_relation_journalarticles_name_bidirectional_acf_update_value', 10, 3);


function project_relation_workingpapers_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=project_relation_working_papers_details', 'project_relation_workingpapers_name_bidirectional_acf_update_value', 10, 3);

function project_relation_news_name_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
		foreach( $value as $post_id2 ) {
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {
				$value2 = array();
			}
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	if( is_array($old_value) ) {	
		foreach( $old_value as $post_id2 ) {
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);
			// bail early if no value
			if( empty($value2) ) continue;
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);
			// remove
			unset( $value2[ $pos] );
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);
		}
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	// return
   return $value;
}
add_filter('acf/update_value/name=project_relation_news_details', 'project_relation_news_name_bidirectional_acf_update_value', 10, 3);



// Home Feature Custom Post Type
function homebanner_init() {
    // set up Researchinitiatives labels
    $labels1 = array(
        'name' => 'Home Banner',
        'singular_name' => 'Home Banner',
        'add_new' => 'Add New Home Banner',
        'add_new_item' => 'Add New Home Banner',
        'edit_item' => 'Edit Home Banner',
        'new_item' => 'New Home Banner',
        'all_items' => 'All Home Banner',
        'view_item' => 'View Home Banner',
        'search_items' => 'Search Home Banner',
        'not_found' =>  'No Home Banner Found',
        'not_found_in_trash' => 'No Home Banner found in Trash', 
        'parent_item_colon' => 'Home Banner',
        'menu_name' => 'Home Banner',
    );
    
    // register post type
    $args1 = array(
        'labels' => $labels1,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'homebanner'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',
			'post-attributes'
        )
    );
    register_post_type( 'homebanner', $args1 );   
	
}
add_action( 'init', 'homebanner_init' );


add_action( 'wp_footer', 'ajax_fetch_opening' );
add_action('wp_ajax_data_fetch_opening' , 'data_fetch_opening');
add_action('wp_ajax_nopriv_data_fetch_opening','data_fetch_opening');
require( get_template_directory() . '/template-parts/vacancies-filter.php' );

add_action( 'wp_footer', 'ajax_fetch' );
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
require( get_template_directory() . '/template-parts/book-filter.php' );

add_action( 'wp_footer', 'ajax_fetch_oc' );
add_action('wp_ajax_data_fetch_oc' , 'data_fetch_oc');
add_action('wp_ajax_nopriv_data_fetch_oc','data_fetch_oc');
require( get_template_directory() . '/template-parts/opinion-commentary-filter.php' );

//news Filter
add_action( 'wp_footer', 'ajax_fetch_news' );
add_action('wp_ajax_data_fetch_news' , 'data_fetch_news');
add_action('wp_ajax_nopriv_data_fetch_news','data_fetch_news');
require( get_template_directory() . '/template-parts/news-filter.php' );


add_action( 'wp_footer', 'ajax_fetch_bc' );
add_action('wp_ajax_data_fetch_bc' , 'data_fetch_bc');
add_action('wp_ajax_nopriv_data_fetch_bc','data_fetch_bc');
require( get_template_directory() . '/template-parts/book-chapters-filter.php' );

add_action( 'wp_footer', 'ajax_fetch_ja' );
add_action('wp_ajax_data_fetch_ja' , 'data_fetch_ja');
add_action('wp_ajax_nopriv_data_fetch_ja','data_fetch_ja');
require( get_template_directory() . '/template-parts/journal-articles-filter.php' );

add_action( 'wp_footer', 'ajax_fetch_pbr' );
add_action('wp_ajax_data_fetch_pbr' , 'data_fetch_pbr');
add_action('wp_ajax_nopriv_data_fetch_pbr','data_fetch_pbr');
require( get_template_directory() . '/template-parts/policy-briefs-reports-filter.php' );

add_action( 'wp_footer', 'ajax_fetch_project' );
add_action('wp_ajax_data_fetch_project' , 'data_fetch_project');
add_action('wp_ajax_nopriv_data_fetch_project','data_fetch_project');
require( get_template_directory() . '/template-parts/projects-filter.php' );

add_action( 'wp_footer', 'ajax_fetch_wp' );
add_action('wp_ajax_data_fetch_wp' , 'data_fetch_wp');
add_action('wp_ajax_nopriv_data_fetch_wp','data_fetch_wp');
require( get_template_directory() . '/template-parts/working-papers-filter.php' );


add_action( 'wp_footer', 'ajax_fetch_pf' );
add_action('wp_ajax_data_fetch_pf' , 'data_fetch_pf');
add_action('wp_ajax_nopriv_data_fetch_pf','data_fetch_pf');

add_action('wp_ajax_data_fetch_pf_name' , 'data_fetch_pf_name');
add_action('wp_ajax_nopriv_data_fetch_pf_name','data_fetch_pf_name');
require( get_template_directory() . '/template-parts/people-faculty-filter.php' );


add_action( 'wp_footer', 'ajax_fetch_pfacultyemeriti' );
add_action('wp_ajax_data_fetch_pfacultyemeriti' , 'data_fetch_pfacultyemeriti');
add_action('wp_ajax_nopriv_data_fetch_pfacultyemeriti','data_fetch_pfacultyemeriti');

add_action('wp_ajax_data_fetch_pfacultyemeriti_name' , 'data_fetch_pfacultyemeriti_name');
add_action('wp_ajax_nopriv_data_fetch_pfacultyemeriti_name','data_fetch_pfacultyemeriti_name');
require( get_template_directory() . '/template-parts/people-faculty-emeriti-filter.php' );


add_action( 'wp_footer', 'ajax_fetch_presearch_staff' );
add_action('wp_ajax_data_fetch_presearch_staff' , 'data_fetch_presearch_staff');
add_action('wp_ajax_nopriv_data_fetch_presearch_staff','data_fetch_presearch_staff');

add_action('wp_ajax_data_fetch_presearch_staff_name' , 'data_fetch_presearch_staff_name');
add_action('wp_ajax_nopriv_data_fetch_presearch_staff_name','data_fetch_presearch_staff_name');
require( get_template_directory() . '/template-parts/people-research-staff-filter.php' );


add_action( 'wp_footer', 'ajax_fetch_staffdirectory' );
add_action('wp_ajax_data_fetch_staffdirectory' , 'data_fetch_staffdirectory');
add_action('wp_ajax_nopriv_data_fetch_staffdirectory','data_fetch_staffdirectory');

add_action('wp_ajax_data_fetch_staffdirectory_name' , 'data_fetch_staffdirectory_name');
add_action('wp_ajax_nopriv_data_fetch_staffdirectory_name','data_fetch_staffdirectory_name');
require( get_template_directory() . '/template-parts/people-staff-directory-filter.php' );

add_action( 'wp_footer', 'ajax_fetch_communications' );
add_action('wp_ajax_data_fetch_communications' , 'data_fetch_communications');
add_action('wp_ajax_nopriv_data_fetch_communications','data_fetch_communications');

add_action('wp_ajax_data_fetch_communications_name' , 'data_fetch_communications_name');
add_action('wp_ajax_nopriv_data_fetch_communications_name','data_fetch_communications_name');
require( get_template_directory() . '/template-parts/people-communications-filter.php' );

add_action( 'wp_footer', 'ajax_fetch_pfinance' );
add_action('wp_ajax_data_fetch_pfinance' , 'data_fetch_pfinance');
add_action('wp_ajax_nopriv_data_fetch_pfinance','data_fetch_pfinance');

add_action('wp_ajax_data_fetch_pfinance_name' , 'data_fetch_pfinance_name');
add_action('wp_ajax_nopriv_data_fetch_pfinance_name','data_fetch_pfinance_name');
require( get_template_directory() . '/template-parts/people-finance-admin-filter.php' );

add_action( 'wp_footer', 'ajax_fetch_farchive' );
add_action('wp_ajax_data_fetch_farchive' , 'data_fetch_farchive');
add_action('wp_ajax_nopriv_data_fetch_farchive','data_fetch_farchive');

add_action('wp_ajax_data_fetch_farchive_name' , 'data_fetch_farchive_name');
add_action('wp_ajax_nopriv_data_fetch_farchive_name','data_fetch_farchive_name');
require( get_template_directory() . '/template-parts/people-faculty-archive-filter.php' );

//event-filter
require( get_template_directory() . '/template-parts/event-list-filter.php' );

//single-researcharea
add_action('wp_footer', 'ajax_fetch_single_researcharea');

add_action('wp_ajax_data_fetch_single_research9' , 'data_fetch_single_research9');
add_action('wp_ajax_nopriv_data_fetch_single_research9','data_fetch_single_research9');

add_action('wp_ajax_data_fetch_single_research8' , 'data_fetch_single_research8');
add_action('wp_ajax_nopriv_data_fetch_single_research8','data_fetch_single_research8');

add_action('wp_ajax_data_fetch_single_research7' , 'data_fetch_single_research7');
add_action('wp_ajax_nopriv_data_fetch_single_research7','data_fetch_single_research7');

add_action('wp_ajax_data_fetch_single_research6' , 'data_fetch_single_research6');
add_action('wp_ajax_nopriv_data_fetch_single_research6','data_fetch_single_research6');

add_action('wp_ajax_data_fetch_single_research5' , 'data_fetch_single_research5');
add_action('wp_ajax_nopriv_data_fetch_single_research5','data_fetch_single_research5');

add_action('wp_ajax_data_fetch_single_research4' , 'data_fetch_single_research4');
add_action('wp_ajax_nopriv_data_fetch_single_research4','data_fetch_single_research4');

add_action('wp_ajax_data_fetch_single_research3' , 'data_fetch_single_research3');
add_action('wp_ajax_nopriv_data_fetch_single_research3','data_fetch_single_research3');

add_action('wp_ajax_data_fetch_single_research2', 'data_fetch_single_research2');
add_action('wp_ajax_nopriv_data_fetch_single_research2','data_fetch_single_research2');
require( get_template_directory() . '/template-parts/single-researcharea-filter.php' );


//single-research
add_action('wp_footer', 'ajax_fetch_single_research');

add_action('wp_ajax_data_fetch_singleresearch9' , 'data_fetch_singleresearch9');
add_action('wp_ajax_nopriv_data_fetch_singleresearch9','data_fetch_singleresearch9');

add_action('wp_ajax_data_fetch_singleresearch8' , 'data_fetch_singleresearch8');
add_action('wp_ajax_nopriv_data_fetch_singleresearch8','data_fetch_singleresearch8');

add_action('wp_ajax_data_fetch_singleresearch7' , 'data_fetch_singleresearch7');
add_action('wp_ajax_nopriv_data_fetch_singleresearch7','data_fetch_singleresearch7');

add_action('wp_ajax_data_fetch_singleresearch6' , 'data_fetch_singleresearch6');
add_action('wp_ajax_nopriv_data_fetch_singleresearch6','data_fetch_singleresearch6');

add_action('wp_ajax_data_fetch_singleresearch5' , 'data_fetch_singleresearch5');
add_action('wp_ajax_nopriv_data_fetch_singleresearch5','data_fetch_singleresearch5');

add_action('wp_ajax_data_fetch_singleresearch4' , 'data_fetch_singleresearch4');
add_action('wp_ajax_nopriv_data_fetch_singleresearch4','data_fetch_singleresearch4');

add_action('wp_ajax_data_fetch_singleresearch3' , 'data_fetch_singleresearch3');
add_action('wp_ajax_nopriv_data_fetch_singleresearch3','data_fetch_singleresearch3');

add_action('wp_ajax_data_fetch_singleresearch2', 'data_fetch_singleresearch2');
add_action('wp_ajax_nopriv_data_fetch_singleresearch2','data_fetch_singleresearch2');
require( get_template_directory() . '/template-parts/single-research-filter.php' );


//single-people
add_action('wp_footer', 'ajax_fetch_singlepeople');

add_action('wp_ajax_data_fetch_singlepeople9' , 'data_fetch_singlepeople9');
add_action('wp_ajax_nopriv_data_fetch_singlepeople9','data_fetch_singlepeople9');

add_action('wp_ajax_data_fetch_singlepeople8' , 'data_fetch_singlepeople8');
add_action('wp_ajax_nopriv_data_fetch_singlepeople8','data_fetch_singlepeople8');

add_action('wp_ajax_data_fetch_singlepeople7' , 'data_fetch_singlepeople7');
add_action('wp_ajax_nopriv_data_fetch_singlepeople7','data_fetch_singlepeople7');

add_action('wp_ajax_data_fetch_singlepeople6' , 'data_fetch_singlepeople6');
add_action('wp_ajax_nopriv_data_fetch_singlepeople6','data_fetch_singlepeople6');

add_action('wp_ajax_data_fetch_singlepeople5' , 'data_fetch_singlepeople5');
add_action('wp_ajax_nopriv_data_fetch_singlepeople5','data_fetch_singlepeople5');

add_action('wp_ajax_data_fetch_singlepeople4' , 'data_fetch_singlepeople4');
add_action('wp_ajax_nopriv_data_fetch_singlepeople4','data_fetch_singlepeople4');

add_action('wp_ajax_data_fetch_singlepeople3' , 'data_fetch_singlepeople3');
add_action('wp_ajax_nopriv_data_fetch_singlepeople3','data_fetch_singlepeople3');

add_action('wp_ajax_data_fetch_singlepeople2', 'data_fetch_singlepeople2');
add_action('wp_ajax_nopriv_data_fetch_singlepeople2','data_fetch_singlepeople2');

require( get_template_directory() . '/template-parts/single-people-filter.php' );



//single-project
add_action('wp_footer', 'ajax_fetch_single_project');

add_action('wp_ajax_data_fetch_singleproject9' , 'data_fetch_singleproject9');
add_action('wp_ajax_nopriv_data_fetch_singleproject9','data_fetch_singleproject9');

add_action('wp_ajax_data_fetch_singleproject8' , 'data_fetch_singleproject8');
add_action('wp_ajax_nopriv_data_fetch_singleproject8','data_fetch_singleproject8');

add_action('wp_ajax_data_fetch_singleproject7' , 'data_fetch_singleproject7');
add_action('wp_ajax_nopriv_data_fetch_singleproject7','data_fetch_singleproject7');

add_action('wp_ajax_data_fetch_singleproject6' , 'data_fetch_singleproject6');
add_action('wp_ajax_nopriv_data_fetch_singleproject6','data_fetch_singleproject6');

add_action('wp_ajax_data_fetch_singleproject5' , 'data_fetch_singleproject5');
add_action('wp_ajax_nopriv_data_fetch_singleproject5','data_fetch_singleproject5');

add_action('wp_ajax_data_fetch_singleproject4' , 'data_fetch_singleproject4');
add_action('wp_ajax_nopriv_data_fetch_singleproject4','data_fetch_singleproject4');

add_action('wp_ajax_data_fetch_singleproject3' , 'data_fetch_singleproject3');
add_action('wp_ajax_nopriv_data_fetch_singleproject3','data_fetch_singleproject3');

add_action('wp_ajax_data_fetch_singleproject2', 'data_fetch_singleproject2');
add_action('wp_ajax_nopriv_data_fetch_singleproject2','data_fetch_singleproject2');
require( get_template_directory() . '/template-parts/single-project-filter.php' );



/*
 * Faculty
 */
function script_load_more($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more($args);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}

add_shortcode('ajax_posts', 'script_load_more');
add_action('wp_ajax_nopriv_ajax_script_load_more', 'ajax_script_load_more');
add_action('wp_ajax_ajax_script_load_more', 'ajax_script_load_more');

function script_load_more_pfacultyemeriti($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_pfacultyemeriti($args);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}

add_shortcode('ajax_posts_pfacultyemeriti', 'script_load_more_pfacultyemeriti');
add_action('wp_ajax_nopriv_ajax_script_load_more_pfacultyemeriti', 'ajax_script_load_more_pfacultyemeriti');
add_action('wp_ajax_ajax_script_load_more_pfacultyemeriti', 'ajax_script_load_more_pfacultyemeriti');

function script_load_more_presearch_staff($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_presearch_staff($args);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}

add_shortcode('ajax_posts_presearch_staff', 'script_load_more_presearch_staff');
add_action('wp_ajax_nopriv_ajax_script_load_more_presearch_staff', 'ajax_script_load_more_presearch_staff');
add_action('wp_ajax_ajax_script_load_more_presearch_staff', 'ajax_script_load_more_presearch_staff');

function script_load_more_staffdirectory($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_staffdirectory($args);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}

add_shortcode('ajax_posts_staffdirectory', 'script_load_more_staffdirectory');
add_action('wp_ajax_nopriv_ajax_script_load_more_staffdirectory', 'ajax_script_load_more_staffdirectory');
add_action('wp_ajax_ajax_script_load_more_staffdirectory', 'ajax_script_load_more_staffdirectory');

function script_load_more_communications($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_communications($args);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}

add_shortcode('ajax_posts_communications', 'script_load_more_communications');
add_action('wp_ajax_nopriv_ajax_script_load_more_communications', 'ajax_script_load_more_communications');
add_action('wp_ajax_ajax_script_load_more_communications', 'ajax_script_load_more_communications');

function script_load_more_pfinance($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_pfinance($args);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}

add_shortcode('ajax_posts_pfinance', 'script_load_more_pfinance');
add_action('wp_ajax_nopriv_ajax_script_load_more_pfinance', 'ajax_script_load_more_pfinance');
add_action('wp_ajax_ajax_script_load_more_pfinance', 'ajax_script_load_more_pfinance');

function script_load_more_farchive($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_farchive($args);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}

add_shortcode('ajax_posts_farchive', 'script_load_more_farchive');
add_action('wp_ajax_nopriv_ajax_script_load_more_farchive', 'ajax_script_load_more_farchive');
add_action('wp_ajax_ajax_script_load_more_farchive', 'ajax_script_load_more_farchive');


function script_load_more_op($arg = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_op($arg);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}


add_shortcode('ajax_posts_op', 'script_load_more_op');
add_action('wp_ajax_nopriv_ajax_script_load_more_op', 'ajax_script_load_more_op');
add_action('wp_ajax_ajax_script_load_more_op', 'ajax_script_load_more_op'); 


function script_load_more_pbr($arg = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_pbr($arg);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}


add_shortcode('ajax_posts_pbr', 'script_load_more_pbr');
add_action('wp_ajax_nopriv_ajax_script_load_more_pbr', 'ajax_script_load_more_pbr');
add_action('wp_ajax_ajax_script_load_more_pbr', 'ajax_script_load_more_pbr'); 


function script_load_more_ja($arg = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_ja($arg);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}


add_shortcode('ajax_posts_ja', 'script_load_more_ja');
add_action('wp_ajax_nopriv_ajax_script_load_more_ja', 'ajax_script_load_more_ja');
add_action('wp_ajax_ajax_script_load_more_ja', 'ajax_script_load_more_ja'); 


function script_load_more_project($arg = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_project($arg);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}


add_shortcode('ajax_posts_project', 'script_load_more_project');
add_action('wp_ajax_nopriv_ajax_script_load_more_project', 'ajax_script_load_more_project');
add_action('wp_ajax_ajax_script_load_more_project', 'ajax_script_load_more_project'); 

function script_load_more_wp($arg = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_wp($arg);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}

add_shortcode('ajax_posts_wp', 'script_load_more_wp');
add_action('wp_ajax_nopriv_ajax_script_load_more_wp', 'ajax_script_load_more_wp');
add_action('wp_ajax_ajax_script_load_more_wp', 'ajax_script_load_more_wp'); 

function script_load_more_books($arg = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_books($arg);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}


add_shortcode('ajax_posts_books', 'script_load_more_books');
add_action('wp_ajax_nopriv_ajax_script_load_more_books', 'ajax_script_load_more_books');
add_action('wp_ajax_ajax_script_load_more_books', 'ajax_script_load_more_books'); 

function script_load_more_books_chapters($arg = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_books_chapters($arg);
        echo '</div>';
        echo '<a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ></a>';
    echo '</div>';
}


add_shortcode('ajax_posts_books_chapters', 'script_load_more_books_chapters');
add_action('wp_ajax_nopriv_ajax_script_load_more_books_chapters', 'ajax_script_load_more_books_chapters');
add_action('wp_ajax_ajax_script_load_more_books_chapters', 'ajax_script_load_more_books_chapters');
?>
<?php function njengah_number_pagination() {

global $wp_query;
$big = 9999999; // need an unlikely integer
  echo paginate_links( array(
   'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
   'format' => '?paged=%#%',
	  'prev_text' => '&laquo',
		  'next_text' => '&raquo;',
	  'mid_size' => 4,
   'current' => max( 1, get_query_var('paged') ),
   'total' => $wp_query->max_num_pages) );
}

function pagination($pages = '', $range = 16)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages);
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}


/**
 * ACF Load More Repeater
*/

// add action for logged in users
add_action('wp_ajax_my_repeater_show_more', 'my_repeater_show_more');
// add action for non logged in users
add_action('wp_ajax_nopriv_my_repeater_show_more', 'my_repeater_show_more');

function my_repeater_show_more() {
	// validate the nonce
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'my_repeater_field_nonce')) {
		exit;
	}
	// make sure we have the other values
	if (!isset($_POST['post_id']) || !isset($_POST['offset'])) {
		return;
	}
	$show = 9; // how many more to show
	$start = $_POST['offset'];
	$end = $start+$show;
	$post_id = $_POST['post_id'];
	// use an object buffer to capture the html output
	// alternately you could create a varaible like $html
	// and add the content to this string, but I find
	// object buffers make the code easier to work with
	ob_start();
	if (have_rows('podcastlist', $post_id)) {
		$total = count(get_field('podcastlist', $post_id));
		$count = 0;
		while (have_rows('podcastlist', $post_id)) {
			the_row();
		  $podcasturl = get_sub_field( 'podcasturl' );
			if ($count < $start) {
				// we have not gotten to where
				// we need to start showing
				// increment count and continue
				$count++;
				continue;
			}
			?>
			<div class="col-md-12">
			 <a href="<?php echo $podcasturl; ?>" target="_blank">
        <iframe height="200px" width="100%" frameborder="no" scrolling="no" seamless src="<?php echo $podcasturl; ?>"></iframe>
				   </a>
      </div> 
			<?php 
			$count++;
			if ($count == $end) {
				// we have shown the number, break out of loop
				break;
			}
		} // end while have rows
	} // end if have rows
	
	
	
	
	$content = ob_get_clean();
	// check to see if we have shown the last item
	$more = false;
	if ($total > $count) {
		$more = true;
	}
	// output our 3 values as a json encoded array
	echo json_encode(array('content' => $content, 'more' => $more, 'offset' => $end));
	exit;
} // end function my_repeater_show_more


function search_template_chooser($template) {
  global $wp_query;
 
  // Check if we are on search page && if post_type-filter is selected
  if( $wp_query->is_search && isset( $_GET['post_type-filter'] ) ) {
    return locate_template('search.php');  //  redirect to custom-search.php
  }
  return $template;
}
add_filter('template_include', 'search_template_chooser');

function search_filter($query) {
 
  // Get post type value
  if ( isset( $_GET['post_type-filter'] ) ):
    $filter_by = $_GET['post_type-filter'];
 
    if ( !is_admin() && $query->is_main_query() ) {
      if ($query->is_search) {
        $query->set('post_type', $filter_by );
      }
    }
 
  endif;
}
 
add_action('pre_get_posts','search_filter');
function all_post_types() {
  // Get all post types
  $post_types = get_post_types();
 
  // Post types to exclude
  $exclude = array( 'attachment', 'revision', 'nav_menu_item', 'acf' );
 
  // Filter out all unwanted post types
  foreach ( $post_types as $key => $value ) {
 
    if ( in_array( $key, $exclude ) ) {
      unset( $post_types[$key] );
    }
  }
 
  if( is_array( $post_types ) ):
 
    // Return post types as options for select menu
    foreach ( $post_types as $key => $value ): ?>
      <input type="checkbox" checked="checked" value="<?php echo $key; ?>" name="post_type-filter[]"> <label> <?php echo $value; ?></label><br />
    <?php
    endforeach;
  endif;
}


/** start Amol code */
add_action( 'wp_ajax_nopriv_get_data', 'my_ajax_handler' );
add_action( 'wp_ajax_get_data', 'my_ajax_handler' );

function my_ajax_handler() {
    header('Content-Type: application/json; charset=UTF8');
    //Header('Content-Type: application/json; charset=UTF8');

   
    $researcharea_id = $_GET['researcharea_id'];
    $posttype = $_GET['posttype'];
    $metaquery_key = $_GET['metaquery_key'];
    $peoplekey = $_GET['peoplekey'];

    $field_pub_name = $_GET['field_pub_name'];
    $field_auther_name = $_GET['field_auther_name'];
    $field_pub_date = $_GET['field_pub_date'];
    $page = $_GET['page'];
        
    $journal_help_args = array(                 
        'meta_key' => 'published_date',
        'orderby' => 'meta_value',
        'order' => 'DESC',
    );
    $books_help_args = array(
        'orderby' => "id",
        'order' => 'ASC',       
    );  
    $bookchapters_help_args = array(
        'meta_key' => 'published_date',
        'orderby' => 'meta_value',
        'order' => 'DESC',
    );
    $briefsreports_help_args = array(
        'meta_key' => 'briefs_reports_published_date',
        'orderby' => 'meta_value',
        'order' => 'DESC',
    );
    $workingpapers_help_args = array(
        // 'orderby' => "id",
        // 'order' => 'ASC',
        'meta_key' => 'published_date',
        'orderby' => 'meta_value',
        'order' => 'DESC',
    );
    $post_help_args = array(
        // 'orderby' => "id",
        // 'order' => 'ASC',
        'meta_key' => 'published_date',
        'orderby' => 'meta_value',
        'order' => 'DESC',
    );

    $main_args = array(
        'post_type' => $posttype,                                   
        'posts_per_page'=>-1,
        'meta_query' => array(
        array(
            'key' => $metaquery_key, // name of custom field
            'value' => '"' . $researcharea_id . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
        )
    ));
    
    $args;
    $total_args;
    switch ($posttype) {

        case "journalarticles":
            $total_args = array_merge( $main_args, $journal_help_args);
        break;
        case "books":
            $total_args = array_merge( $main_args, $books_help_args);
        break;      
        case "bookchapters":
            $total_args = array_merge( $main_args, $bookchapters_help_args);
        break;
        case "briefsreports":
            $total_args = array_merge( $main_args, $briefsreports_help_args);
        break;
        case "workingpapers":
            $total_args = array_merge( $main_args, $workingpapers_help_args);
        break;
        case "project":
            $total_args =  array(
                'orderby' => "id",
                'order' => 'DESC',
                'post_type' => $posttype,                                   
                'posts_per_page'=>-1,
                'meta_query' => array(
                array(
                    'key' => $metaquery_key,
                    'value' => '"' . $researcharea_id . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'       => 'project_status',
                    'compare'   => '=',
                    'value'     => 'active',
                )
            ));

        //$total_args = array_merge( $project_args, $post_help_args);
        break;
        case "post":
            $total_args = array_merge( $main_args, $post_help_args);
        break;              
        default:        
        $total_args = array(
            'post_type' => 'opinions',
            'orderby' => "id",
            // 'order' => 'ASC',                 
            'meta_key' => 'opinion_published_date',
            'orderby' => "meta_value",
            'orderby' => 'meta_value_num',
            'meta_type' => 'DATE',
            'order' => 'DESC', 

            'posts_per_page'=> 10,
            'paged'=> $page,
            'meta_query' => array(
                array(
                'key' => 'opinions_relation_research_area_details', // name of custom field
                'value' => '"' .  $researcharea_id  . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                'compare' => 'LIKE'
                )
            ));            
        }       
    
        
        $args = new WP_Query($total_args);        
        $author_name = array();
        $publisher_name = array();
        $jatitle;
        $published_date = array();  
        $permalink = array();
        $str_title = array();
        $data = array();    
        $authorname;
        $atag_link;
        $atag_data;    
        $j=0;
        
        while ( $args->have_posts() ): $args->the_post();
        $author_name[] = get_field( $field_auther_name ) ? get_field( $field_auther_name ) : "";
        $publisher_name[] = get_field( $field_pub_name );
        $published_date[] = get_field( $field_pub_date );
        $jatitle = get_the_title();
        $permalink[] = get_permalink();
        $str_title[] = mb_strimwidth($jatitle, 0, 60, "...");

        $documents = get_posts( array(
            'post_type' => 'people',
            'meta_query' => array(
                array(
                    'key' => $peoplekey, 
                    'value' => '"' . get_the_ID() . '"', 
                    'compare' => 'LIKE'
                )
            )
        ));
        
        $i = 0;
        foreach( $documents as $key=>$document):            
            $authorname[$j][$i] = get_the_title ( $document->ID );
            $atag_link[$j][$i] = get_permalink( $document->ID );                
            $atag_data[$j][$i] = mb_strimwidth($authorname[$j][$i], 0, 110, "...");
            $i++;
        endforeach;
        $j++;
    endwhile;

    $data = array(
        $field_auther_name   => $author_name,
        "permalink"      => $permalink,
        $field_pub_name  => $publisher_name,
        $field_pub_date  => $published_date,
        "str_title"      => $str_title,
        "jatitle"        => $jatitle,  
        "atag_link"      => $atag_link,
        "atag_data"      => $atag_data,       
        "authorname"     => $authorname,        
    );
        
    echo json_encode($data);
    wp_reset_postdata();
    wp_die();
}
/** end Amol code */




