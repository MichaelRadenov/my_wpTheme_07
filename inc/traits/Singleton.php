<?php
    /**
     * Singleton
     * @package My Theme
     */

    namespace MyTheme\Inc\Traits;

    trait Singleton {

        protected function __construct() {
        }

        /**
         * Prevent object cloning
         */
        final protected function __clone() {
        }

        /**
         *
         * @return object Singleton instance of the class.
         */
        final public static function get_my_class_instance() {

            /**
             * Collection of instances.
             *
             * @var array
             */
            static $instance = [];

            
            $class_called = get_called_class();

            if ( ! isset( $instance[ $class_called ] ) ) {

                $instance[ $class_called ] = new $class_called();

            
                //do_action( sprintf( 'aquila_theme_singleton_init_%s', $class_called ) );

            }

            return $instance[ $class_called ];

        }

    }