<?php
/*
 *  Author: Ben Harrop
 *  URL: blowmedia.co.uk
 *  Custom functions, support, custom post types and more.
 */

/**
 * Removed WP jquery if on normal page
 */
function header_scripts()
{
    if (!is_admin() && !is_login_page()) wp_deregister_script('jquery'); // Deregister WordPress jQuery
}

/**
 * Determines whether or not the current page is the login page
 */
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

/**
 * Scripts for production environment
 */
function production_enqueue_assets(){

    header_scripts();

    wp_register_script('jquery', get_template_directory_uri() . '/js/min/plugins.js');
    wp_enqueue_script('jquery'); // Enqueue it!

    wp_register_script('min', get_template_directory_uri() . '/js/min/main.js', 'jquery');
    wp_enqueue_script('min'); // Enqueue it!

    wp_register_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('style'); // Enqueue it!
}

/**
 * Assets for development environment
 */
function development_enqueue_assets(){

    header_scripts();

    wp_register_script('jquery', get_template_directory_uri() . '/js/plugins/jquery-1.11.0.js');
    wp_enqueue_script('jquery'); // Enqueue it!

    wp_register_script('placeholder-second', get_template_directory_uri() . '/js/gf.placeholders.js', 'jquery');
    wp_enqueue_script('placeholder-second'); // Enqueue it!

    wp_register_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', 'jquery');
    wp_enqueue_script('fancybox'); // Enqueue it!

    wp_register_script('caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel.js', 'jquery');
    wp_enqueue_script('caroufredsel'); // Enqueue it!

    wp_register_script('foundation', get_template_directory_uri() . '/js/plugins/foundation.js', 'jquery');
    wp_enqueue_script('foundation'); // Enqueue it!


    wp_register_script('nivoslider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', 'jquery');
    wp_enqueue_script('nivoslider'); // Enqueue it!

    // Use this to include other foundation JS
    // Remember to update the gruntfile
    // wp_register_script('foundation-tab', get_template_directory_uri() . '/foundation/bower_components/foundation/js/foundation.tab.js', 'foundation');
    // wp_enqueue_script('foundation-tab'); // Enqueue it!

    wp_register_script('script', get_template_directory_uri() . '/js/scripts.js', 'jquery');
    wp_enqueue_script('script'); // Enqueue it!

    wp_register_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('style'); // Enqueue it!

    wp_register_script('livereload', '//localhost:35729/livereload.js');
    wp_enqueue_script('livereload'); // Enqueue it!
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Custom Excerpts
function windmill_index($length) // Create 20 Word Callback for Index page Excerpts
{
    return 20;
}

// Create the Custom Excerpts callback
function windmill_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function windmill_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}


/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/


switch(WP_ENV){
    case 'development':
        add_action( 'wp_enqueue_scripts', 'development_enqueue_assets');
        break;

    case 'production':
    case 'staging':
        add_action( 'wp_enqueue_scripts', 'development_enqueue_assets');
        break;

    default:
        die('Environment not specified');
}

/**
 * Removes scripts from head
 */
function custom_clean_head() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
}

add_action('wp_enqueue_scripts', 'custom_clean_head');

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar

// menu adition to backend

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

/* featured images */

add_theme_support( 'post-thumbnails' ); 

/* end */

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name' => 'Home right sidebar',
        'id' => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );

     register_sidebar( array(
        'name' => 'Twitter sidebar',
        'id' => 'twitter_sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

//Custom post type featured testimonials//
add_action( 'init', 'create_featured_testimonial_type' );
function create_featured_testimonial_type() {
    register_post_type( 'featured_testimonial',
        array(
            'labels' => array(
                'name' => __( 'featured testimonial' ),
                'singular_name' => __( 'featured testimonial' )
            ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'post'),
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
        )
    );
}

//Custom post type featured testimonials//
add_action( 'init', 'create_testimonials_type' );
function create_testimonials_type() {
    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'testimonials' ),
                'singular_name' => __( 'testimonial' )
            ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'post'),
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
        )
    );
}
?>