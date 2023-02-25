<?php
/**
 * 
 */

 
    namespace MyTheme\Inc\Classes;

    use MyTheme\Inc\Traits\Singleton;

    class MetaBox {

        use Singleton;
        

        protected function __construct() {
            
            $this->set_my_assets_hooks();
            
        }
        

        protected function set_my_assets_hooks() {

            add_action( 'add_meta_boxes', [$this, 'my_add_custom_box_func'     ] );
            add_action( 'save_post'     , [$this, 'my_set_custom_meta_box_html_form_func'] );            
        }

        


        
        public function my_add_custom_box_func() {

            $screens = [ 'post', 'another_post_type' ];
            foreach ( $screens as $screen ) {
                add_meta_box(
                    'page_title_meta',                    // Unique ID
                    __( 'Hide page title', 'my-theme' ),  // Box title
                    [ $this, 'my_get_custom_meta_box_html_form_func' ],  // Content callback, must be of type callable
                    $screen,                              // Post type  
                    'side', // does not work for some reason
                    'core', // does not work for some reason                
                );                
            }
        }


        public function my_get_custom_meta_box_html_form_func( $post )  {

            $value = get_post_meta( $post->ID, 'my_hide_page_title_meta_key', true );
            
            wp_nonce_field( 'my_meta_box_nonce_action_' . $post->ID, 'my_meta_box_nonce_field_name');?>

            
            
            <label for="title_meta_field"></label>
            <select name="title_meta_field" id="title_meta_field" class="postbox">

                <!-- option No 00 -->
                <option value="">
                    <?php esc_html_e( 'Select', 'my-theme' )?></option>
                <!-- option No 01 -->
                <option value="yes" <?php selected( $value, 'Yes' ); ?>>
                    <?php esc_html_e( 'Yes', 'my-theme' )?></option>
                <!-- option No 02 -->    
                <option value="no" <?php selected( $value, 'No' ); ?>>
                    <?php esc_html_e( 'No', 'my-theme' )?></option>

            </select>
            <?php            
        }


        public function my_set_custom_meta_box_html_form_func( $post_id ) {

            
             if ( ! current_user_can( 'edit_post', $post_id ) )  {

                    // echo '<pre>';
                    // print_r('message');
                    // wp_die();
                return;
            }

                       
            if ( ! isset( $_POST['my_meta_box_nonce_field_name'] ) || 
                 ! wp_verify_nonce( $_POST['my_meta_box_nonce_field_name'], 'my_meta_box_nonce_action_' . $post_id)  ) {
                    
                    // echo '<pre>';
                    // print_r('message');
                    // wp_die();
                return;
            
            }
            

                 if ( array_key_exists( 'title_meta_field', $_POST ) ) {

                update_post_meta(
                    $post_id,
                    'my_hide_page_title_meta_key',
                    $_POST[ 'title_meta_field' ]
                );
            }
        }

        

        
        

    }


    