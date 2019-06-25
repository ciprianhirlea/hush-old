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

    wp_register_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', 'jquery');
    wp_enqueue_script('fancybox'); // Enqueue it!

    wp_register_script('caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel.js', 'jquery');
    wp_enqueue_script('caroufredsel'); // Enqueue it!

    wp_register_script('foundation', get_template_directory_uri() . '/js/plugins/foundation.js', 'jquery');
    wp_enqueue_script('foundation'); // Enqueue it!

    wp_register_script('cycle', get_template_directory_uri() . '/js/cycle.js', 'jquery');
    wp_enqueue_script('cycle'); // Enqueue it!

    wp_register_script('nivoslider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', 'jquery');
    wp_enqueue_script('nivoslider'); // Enqueue it!

    wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', 'jquery');
    wp_enqueue_script('modernizr'); // Enqueue it!

 //wp_register_script('placeholder-second', get_template_directory_uri() . '/js/gf.placeholders.js', 'jquery');
    //wp_enqueue_script('placeholder-second'); // Enqueue it!

    // Use this to include other foundation JS
    // Remember to update the gruntfile
    // wp_register_script('foundation-tab', get_template_directory_uri() . '/foundation/bower_components/foundation/js/foundation.tab.js', 'foundation');
    // wp_enqueue_script('foundation-tab'); // Enqueue it!

    wp_register_script('script', get_template_directory_uri() . '/js/scripts.js', 'jquery');
    wp_enqueue_script('script'); // Enqueue it!

    wp_register_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('style'); // Enqueue it!

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
        add_action( 'wp_enqueue_scripts', 'development_enqueue_assets');
        break;
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
                'name' => __( 'Featured testimonials' ),
                'singular_name' => __( 'Featured testimonial' )
            ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'post'),
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array('category', 'post_tag'), // this is IMPORTANT
		'menu_icon' => 'dashicons-id'
        )
    );
}

//Custom post type featured testimonials//
add_action( 'init', 'create_testimonials_type' );
function create_testimonials_type() {
    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'post'),
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array('category', 'post_tag'), // this is IMPORTANT
		'menu_icon' => 'dashicons-smiley'
        )
    );
}

//pagination
function site_pagination() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="pagination"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('<') );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('>') );

    echo '</ul></div>' . "\n";

}

?>