<?php


require get_theme_file_path('/inc/api-route.php');
/**
 * Custom metaboxes generated using the CMB2 library.
 */
require get_theme_file_path('/inc/metaboxes.php');
/**
 * Custom functions that act independently of the theme templates.
 */
require get_theme_file_path('/inc/extras.php');

//Adds script and stylesheets
function inhabitant_files() {
    wp_enqueue_style('inhabitant_styles', get_stylesheet_uri('/build/css/style.min.css'), NULL, microtime());
    wp_enqueue_style('fonts', "https://fonts.googleapis.com/css?family=Lato&display=swap");

    wp_enqueue_script('qod_api', get_template_directory_uri() . '/js/api.js', array('jquery'), microtime(), true);
    
    wp_localize_script('qod_api', 'qod_data', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ) );
}

add_action('wp_enqueue_scripts', 'inhabitant_files');

//Adds theme support - ex: title tag
function inhabitant_features() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'inhabitant_features');

//filter posts on front page
function qod_filter_home($query) {
    if ( is_home() && $query->is_main_query() ) :
        $query->set('orderby', 'rand');
        $query->set('posts_per_page', 1);
    endif;
}
add_action('pre_get_posts', 'qod_filter_home');


?>