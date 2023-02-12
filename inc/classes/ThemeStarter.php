<?php
/**
 * a template starter 
 * @ My Theme
 */
namespace MyTheme\Inc\Classes;

use MyTheme\Inc\Traits\Singleton;



    class ThemeStarter {

        use Singleton;

        protected function __construct() {
            wp_die('hallo');
            $this->set_my_hooks();
        }
        

        protected function set_my_hooks() {

        }



    }



