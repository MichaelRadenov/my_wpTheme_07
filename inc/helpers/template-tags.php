<?php
    /**
     *  functions file
     * 
     *@    My Theme
    *  
    */

    /**
     * Gets the thumbnail with Lazy Load.
     * Should be called in the WordPress Loop.
     *
     * @param int|null $post_id               Post ID.
     * @param string   $size                  The registered image size.
     * @param array    $additional_attributes Additional attributes.
     *
     * @return string
     */
    function my_get_the_post_custom_thumbnail_func($post_id, $additional_attributes, $size = 'featured-thumbnail')    {

        $custom_thumbnail = [];

        if ($post_id === 0)  {
            $post_id = get_the_ID();
        } 

        if(has_post_thumbnail($post_id))    {

            $default_attribute = [
                'loading' => 'lazy'
            ];

            $attributes = array_merge($default_attribute, $additional_attributes);

            $custom_thumbnail = wp_get_attachment_image(

                get_post_thumbnail_id($post_id),
                $size,
                false,
                $attributes

            );

            echo $custom_thumbnail;

        }           
    }
    

     /**
     * Renders Custom Thumbnail with Lazy Load.
     *
     * @param int    $post_id               Post ID.
     * @param string $size                  The registered image size.
     * @param array  $additional_attributes Additional attributes.
     */
    function my_render_post_custom_thumbnail_func($post_id, $additional_attributes, $size = 'featured-thumbnail')  {

        echo my_get_the_post_custom_thumbnail_func($post_id, $additional_attributes, $size);

    }