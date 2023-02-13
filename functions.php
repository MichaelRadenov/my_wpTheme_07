<?php

    /**
     * the Theme functions.php file
     * 
     * @ My Theme
     */

     use  \MyTheme\Inc\Classes\ThemeStarter;
     use   \MyTheme\Inc\Classes\AnotherClass;


    if (! defined('MY_THEME_DIR_PATH')) {
        define ('MY_THEME_DIR_PATH', untrailingslashit(get_template_directory()));
    }

    if(! defined('MY_THEME_DIR_URI')) {
        define('MY_THEME_DIR_URI', untrailingslashit(get_template_directory_uri()));
    }


    require_once MY_THEME_DIR_PATH . '/inc/classes/ThemeStarter.php';
    require_once MY_THEME_DIR_PATH . '/inc/helpers/autoloader.php';


    function function_that_gets_my_theme_class_instances() {

        //AnotherClass::my_test_function();
        ThemeStarter::get_my_instances();
        
    }

   
    function_that_gets_my_theme_class_instances();
    
    //print_r(filemtime(get_template_directory() . '/assets/main.js'));
    //wp_die();

/* 
    function my_enqueue_script_func() {
        
        // regestring styles & scripts
        wp_register_style ('main-css'     , get_stylesheet_uri()                                                          , [        ], filemtime(MY_THEME_DIR_PATH . '/style.css'     ), 'all');
        wp_register_style ('bootstrap-css', MY_THEME_DIR_URI     . '/assets/src/library/css/bootstrap.min.css'            , [        ],           false                                 , 'all');

        wp_register_script('main-js'      , MY_THEME_DIR_URI     . '/assets/main.js'                                      , [        ], filemtime(MY_THEME_DIR_PATH . '/assets/main.js'),  true);
        wp_register_script('bootstrap-js' , MY_THEME_DIR_URI     . '/assets/src/library/js/bootstrap.min.js'              , ['jquery'],           false                                 ,  true);
    

        // enqueueing styles & scripts
        wp_enqueue_style('main-css'     );
        wp_enqueue_style('bootstrap-css');

        wp_enqueue_script('main-js'     );
        wp_enqueue_script('bootstrap-js');

    }

    add_action('wp_enqueue_scripts', 'my_enqueue_script_func');

*/




