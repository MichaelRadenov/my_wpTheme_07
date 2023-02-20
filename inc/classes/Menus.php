<?php
/**
 * Registers Menus
 * 
 * My Theme
 */

 
    namespace MyTheme\Inc\Classes;

    use MyTheme\Inc\Traits\Singleton;

    class Menus {

        use Singleton;
        

        protected function __construct() {
            
            $this->set_menus_hooks();
            
        }
        

        protected function set_menus_hooks() {

        
            add_action('init', [$this, 'my_register_menus_func' ]);
            

        }


        function my_register_menus_func() {

            register_nav_menus([
                'my-theme-header-menu'  => esc_html__( 'Header Menu'  , 'my-theme'),
                'my-theme-side-menu'    => esc_html__( 'Side Menu'    , 'my-theme'),
                'my-theme-another-menu' => esc_html__( 'Another Menu' , 'my-theme'),
               ]
             );

           }


        public function  my_get_menu_item_func($location) {

            $locations = get_nav_menu_locations();

                     //******************/
                     //echo'<pre>';
                     //******************/

            $menu_id = $locations[$location];

                    //******************/                 
                    //echo'<pre>';
                    //print_r($menu_id);
                    //print_r($locations);
                    //wp_die();
                    //******************/

            return ! empty ($menu_id) ? $menu_id : '';
            
        }   


        public function my_get_child_menu_item_func($menu_items, $item_parent_id_value)   {

            $child_menu_items = [];

            if (! empty($menu_items) && is_array($menu_items)) {

                foreach ($menu_items as $menu) {
                    if (intval($menu->menu_item_parent) === $item_parent_id_value)    {
                        array_push($child_menu_items, $menu);
                    }
                }

            }

            return $child_menu_items;

        }


    }