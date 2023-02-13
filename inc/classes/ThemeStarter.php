<?php
/**
 * 
 */
namespace MyTheme\Inc\Classes;

use MyTheme\Inc\Traits\Singleton;

require_once MY_THEME_DIR_PATH . '/inc/traits/Singleton.php';

    class ThemeStarter {

        use Singleton;

        protected function __construct() {
            
            $this->set_my_hooks();
            
        }
        

        protected function set_my_hooks() {

        
            add_action('wp_enqueue_scripts', [$this, 'my_enqueue_styles_func' ]);
            add_action('wp_enqueue_scripts', [$this, 'my_enqueue_scripts_func']);

        }




        // Enqueuing Style & Script files

        function my_enqueue_styles_func() {
        
            // regestring styles 
            wp_register_style ('main-css'     , get_stylesheet_uri()                                                          , [        ], filemtime(MY_THEME_DIR_PATH . '/style.css'     ), 'all');
            wp_register_style ('bootstrap-css', MY_THEME_DIR_URI   . '/assets/src/library/css/bootstrap.min.css', [        ],           false                                        , 'all');
    
                    
            // enqueueing styles
            wp_enqueue_style('main-css'     );
            wp_enqueue_style('bootstrap-css');
                  
        }
    
        function my_enqueue_scripts_func() {

            // regestring scripts
            wp_register_script('main-js'      , MY_THEME_DIR_URI     . '/assets/main.js'                          , [        ], filemtime(MY_THEME_DIR_PATH . '/assets/main.js'),  true);
            wp_register_script('bootstrap-js' , MY_THEME_DIR_URI     . '/assets/src/library/js/bootstrap.min.js'  , ['jquery'],           false                                        ,  true);

            // enqueueing scripts   
            wp_enqueue_script('main-js'     );
            wp_enqueue_script('bootstrap-js');

        }

     
         

    }


       
   