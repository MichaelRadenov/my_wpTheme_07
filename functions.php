<?php

/**
 * the Theme functions file
 * 
 * @package My Theme
 */


if (!defined('MY_THEME_DIR_PATH')) {
    define('MY_THEME_DIR_PATH', untrailingslashit(get_template_directory()));
}


require MY_THEME_DIR_PATH . '/inc/helpers/autoloader.php';

//print_r(MY_THEME_DIR_PATH);
//wp_die();


function my_enqueue_script_func() {
    
    // regestring styles & scripts
    wp_register_style ('main-css'     , get_stylesheet_uri()                                                          , [        ], filemtime(get_template_directory() . '/style.css'     ), 'all');
    wp_register_style ('bootstrap-css', get_stylesheet_directory_uri()   . '/assets/src/library/css/bootstrap.min.css', [        ],           false                                        , 'all');

    wp_register_script('main-js'      , get_template_directory_uri()     . '/assets/main.js'                          , [        ], filemtime(get_template_directory() . '/assets/main.js'),  true);
    wp_register_script('bootstrap-js' , get_template_directory_uri()     . '/assets/src/library/js/bootstrap.min.js'  , ['jquery'],           false                                        ,  true);
 

    // enqueueing styles & scripts
    wp_enqueue_style('main-css'     );
    wp_enqueue_style('bootstrap-css');

    wp_enqueue_script('main-js'     );
    wp_enqueue_script('bootstrap-js');

}

add_action('wp_enqueue_scripts', 'my_enqueue_script_func');






