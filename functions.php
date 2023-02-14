<?php

    /**
     * the Theme functions.php file
     * 
     * @ My Theme
     */

     use  \MyTheme\Inc\Classes\ThemeStarter;
     use  \MyTheme\Inc\Classes\AnotherClass;


    if (! defined('MY_THEME_DIR_PATH')) {
        define ('MY_THEME_DIR_PATH', untrailingslashit(get_template_directory()));
    }

    if(! defined('MY_THEME_DIR_URI')) {
        define('MY_THEME_DIR_URI', untrailingslashit(get_template_directory_uri()));
    }

                //**************** */
                //require_once MY_THEME_DIR_PATH . '/inc/classes/ThemeStarter.php';
    require_once MY_THEME_DIR_PATH . '/inc/helpers/autoloader.php';


    function function_that_gets_my_theme_class_instances() {

        
        ThemeStarter::get_my_instances();
        AnotherClass::my_test_function();
        
    }

   
    function_that_gets_my_theme_class_instances();
    
                //**************** */
                //print_r(filemtime(get_template_directory() . '/assets/main.js'));
                //wp_die();
                //**************** */
