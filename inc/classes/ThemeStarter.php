<?php
/**
 *  * A My Theme Starter
 * 
 */

    namespace MyTheme\Inc\Classes;

    use MyTheme\Inc\Traits\Singleton;
       

    class ThemeStarter {

        use Singleton;


        protected function __construct() {

            Assets::get_my_class_instance();
            $this->set_my_theme_starter_hooks();
            
           
        }
        

        protected function set_my_theme_starter_hooks() {

            add_action( 'after_setup_theme', [$this, 'my_theme_assets_setup']);
       
            /* -- a može i ovako */
            add_action( 'after_setup_theme', [$this, 'my_theme_title_tag_setup'        ]);
            add_action( 'after_setup_theme', [$this, 'my_theme_custom_logo_setup'      ]);
            add_action( 'after_setup_theme', [$this, 'my_theme_custom_header_setup'    ]);
            add_action( 'after_setup_theme', [$this, 'my_theme_custom_background_setup']);
          

        }
                        //  add_theme_support() features
                        /*   
                            add_theme_support() features
                        
                            'admin-bar'
                          * 'align-wide'
                          * 'automatic-feed-links'
                            'core-block-patterns'
                          * 'custom-background'
                          * 'custom-header'
                            'custom-line-height'
                          * 'custom-logo'
                          * 'customize-selective-refresh-widgets'
                            'custom-spacing'
                            'custom-units'
                            'dark-editor-style'
                            'disable-custom-colors'
                            'disable-custom-font-sizes'
                            'editor-color-palette'
                            'editor-gradient-presets'
                            'editor-font-sizes'
                            'editor-styles'
                            'featured-content'
                          * 'html5'
                            'menus'
                            'post-formats'
                          * 'post-thumbnails'
                            'responsive-embeds'
                            'starter-content'
                          * 'title-tag'
                          * 'wp-block-styles'
                            'widgets'
                            'widgets-block-editor'
                        */

        function my_theme_assets_setup()    {

            add_theme_support('html5',array( 

                'search-form', 
                'comment-list', 
                'comment-form', 
                'gallery',
                'caption',)                                        
                                                                   );
            /**
             * Adding this will allow you to select the featured image on posts and pages.
             *
             * https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support('post-thumbnails'                    );

            add_theme_support('automatic-feed-links'               );

            // Add theme support for selective refresh for widgets.
            /**
             * WordPress 4.5 includes a new Customizer framework called selective refresh
             * Selective refresh is a hybrid preview mechanism that has the performance benefit of not 
             * having to refresh the entire preview window.
             *
             * https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
             */
            add_theme_support('customize-selective-refresh-widgets');

            //Gutenberg assets
            /**
             *  Some blocks in Gutenberg like tables, quotes, separator benefit from structural styles
             *   (margin, padding, border etc…)
             *  Theme Styles.
             *  https://make.wordpress.org/core/2018/06/05/whats-new-in-gutenberg-5th-june/, 
             *  https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles
             */
            add_theme_support('wp-block-styles'                    );

            /**
             * Some blocks such as the image block have the possibility to define
             * a “wide” or “full” alignment by adding the corresponding classname
             * to the block’s wrapper ( alignwide or alignfull ). A theme can opt-in for this feature by calling
             * add_theme_support( 'align-wide' ), like we have done below.
             *
             * Wide Alignment
             * https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
             */
		    add_theme_support( 'align-wide' );
            add_theme_support('align-wide'                         );
            add_theme_support('widgets-block-editor'               );
            
            /**
             *
             * Path to custom editor style.
             * Allows to link a custom stylesheet file to the TinyMCE editor within the post edit screen.
             *
             * Since are not passing any parameter to the function,
             * it will by default, link the editor-style.css file located directly under the current theme directory.
             * In our case since we are passing 'assets/build/css/editor.css' path it will use that.
             * You can change the name of the file or path and replace the path here.             *
             * 
             * Description                                                                          
             * The parameter $stylesheet is the name of the stylesheet, relative to the theme root. It also accepts an array of stylesheets.
             * It is optional and defaults to ‘editor-style.css’.                                                                          
             * This function automatically adds another stylesheet with -rtl prefix, e.g. editor-style-rtl.css.
             * If that file doesn’t exist, it is removed before adding the stylesheet(s) to TinyMCE.
             * If an array of stylesheets is passed to add_editor_style() , RTL is only added for the first stylesheet.                                                                          
             * Since version 3.4 the TinyMCE body has .rtl CSS class.
             * It is a better option to use that class and add any RTL styles to the main stylesheet.                                                                
             * 
             * https://developer.wordpress.org/reference/functions/add_editor_style/
             */
            add_editor_style( 'assets/build/css/editor.css' );

            // Remove the core block patterns
            remove_theme_support( 'core-block-patterns' );


            global $content_with;

            if (! isset($content_with)) {
                $content_with = 1140;
            }           

        }



        /* -- a može i ovako */

        function my_theme_title_tag_setup()    {

            add_theme_support('title-tag');
        }


        function my_theme_custom_logo_setup()    {

            $defaults = array(
                'height'               => 50,
                'width'                => 400,
                'flex-height'          => true,
                'flex-width'           => true,
                'header-text'          => array( 'site-title', 'site-description' ),
                'unlink-homepage-logo' => true, 
            );


            /**
             * Custom logo.
             *
             * Adding custom logo
             * https://developer.wordpress.org/themes/functionality/custom-logo/#adding-custom-logo-support-to-your-theme
             */
            add_theme_support('custom-logo', $defaults);
        }


            /**
             * Enable header setup
             * 
             * Custom headers allow site owners to upload their own “title” image to their site, 
             * which can be placed at the top of certain pages. These can be customized and cropped by the 
             * user through a visual editor in the Appearance > Header section of the admin panel. 
             * You may also place text beneath or on top of the header. 
             * To support fluid layouts and responsive design, these headers may also be flexible. 
             * Headers are placed into a theme using get_custom_header(), 
             * but they must first be added to your functions.php file using add_theme_support(). 
             * Custom headers are optional.
             *
             * https://developer.wordpress.org/themes/functionality/custom-backgrounds/#enable-custom-backgrounds
             */   
        function my_theme_custom_header_setup()    {

            $args = array(
                // Default Header Image to display.
                'default-image'          => get_template_directory_uri() . '/assets/assets/images/headers/default-header.jpg',
                // Display the header text along with the image.
                'header-text'            => false,
                // Header text color default.
                'default-text-color'     => '000',
                // Header image width (in pixels).
                'width'                  => 1920,
                // Header image height (in pixels).
                'height'                 => 1080,
                // Header image random rotation default.
                'random-default'         => false,
                // Enable upload of image file in admin.
                'uploads'                => false,
                // Function to be called in theme head section.
                //'wp-head-callback'       => 'wphead_cb',
                // Function to be called in preview page head section.
                'admin-head-callback'    => 'adminhead_cb',
                // Function to produce preview markup in the admin screen.
                'admin-preview-callback' => 'adminpreview_cb',
                'flex-width'             => true,
		        'flex-height'            => true,
            );


            add_theme_support( 'custom-header', $args );


            register_default_headers( array(

                'default' => array(
                    'url'           => '%s/assets/images/headers/default-header.jpg',
                    'thumbnail_url' => '%s/assets/images/headers/default-header.jpg',
                    'description'   => __( 'Default', 'me-myself-n-i-theme' )
                ),


                'andie' => array(
                    'url'           => '%s/assets/images/headers/andie/Andie MacDowell _001.jpg',
                    'thumbnail_url' => '%s/assets/images/headers/andie/Andie MacDowell _001.jpg',
                    'description'   => __( 'Andie MacDowell', 'me-myself-n-i-theme' )
                ),
                'russo' => array(
                    'url'           => '%s/assets/images/headers/russo/rene-russo_01.jpg',
                    'thumbnail_url' => '%s/assets/images/headers/russo/rene-russo_01.jpg',
                    'description'   => __( 'Rene Russo', 'me-myself-n-i-theme' )
                ),
                'maleficent' => array(
                    'url'           => '%s/assets/images/headers/maleficent/525987.jpg',
                    'thumbnail_url' => '%s/assets/images/headers/maleficent/525987.jpg',
                    'description'   => __( 'Maleficent', 'me-myself-n-i-theme' )
                )
            ) 
            );
             
        }


            /**
             * Adds Custom background panel to customizer.
             *     Enable Custom Backgrounds
             *          Display Custom Backgrounds
             *          Another default example

             *       Custom Backgrounds is a theme feature that provides for customization of the background color and image.
             *       Theme developer needs 2 steps to implement it.

             *          Enable Custom Background – add_theme_support()
             *          Display Custom Background – wp_head() and body_class() 
             *
             * Enable Custom Backgrounds
             * https://developer.wordpress.org/themes/functionality/custom-backgrounds/#enable-custom-backgrounds
             */
        function my_theme_custom_background_setup()    {

            $args = array(

                'default-color'          => '0000ff',
                'default-image'          => get_template_directory_uri() . '/assets/images/background/green_leaves-wallpaper-1920x1080.jpg',
                'default-position-x'     => 'centar',    
                'default-position-y'     => 'centar',  
                'default-repeat'         => 'no-repeat',
                'default-size'           => 'auto',
                'default-attachment'     => 'scroll',
                'wp-head-callback'       => '_custom_background_cb',
                'admin-head-callback'    => '',
                'admin-preview-callback' => ''  
            );


            add_theme_support( 'custom-background', $args );

        }

        

        
           


        

    }

     


       
   