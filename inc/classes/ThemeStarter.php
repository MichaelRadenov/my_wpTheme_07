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

            Assets::get_my_instances();
            
           
        }
        

      protected function set_my_hooks() {

        
          

        }


           

    }


       
   