<?php
    /**
     *  functions file
     * 
     * @    My Theme
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
    function my_get_the_post_custom_thumbnail_func( $post_id, $size = 'featured-thumbnail', $additional_attributes = [])    {

        $custom_thumbnail = [];

        if ( $post_id === 0 )  {
            $post_id = get_the_ID();
        } 

        if(has_post_thumbnail( $post_id ))    {

            $default_attribute = [
                'loading' => 'lazy'
            ];

            $attributes = array_merge( $default_attribute, $additional_attributes );

            $custom_thumbnail = wp_get_attachment_image(

                get_post_thumbnail_id( $post_id ),
                $size,
                false,
                $attributes

            );

            echo $custom_thumbnail;
            // or return $custom_thumbnail, than use next function
        }           
    }
    

     /**
     * Renders Custom Thumbnail with Lazy Load.
     *
     * @param int    $post_id               Post ID.
     * @param string $size                  The registered image size.
     * @param array  $additional_attributes Additional attributes.
     * xxxxxxxxxxxxxxxxxnot out of order xxxxxxxxxxxxxxxxxxxxxxxxxxx
     */ 
    function my_render_post_custom_thumbnail_func( $post_id, $size = 'featured-thumbnail', $additional_attributes )  {

        echo my_get_the_post_custom_thumbnail_func( $post_id, $size, $additional_attributes );

    }


        /**
     * Prints HTML with meta information for the current post-date/time.
     *
     * @return void
     */
    function my_tmeplate_tag_posted_on_func() {

        $year                        = get_the_date( 'Y' );
        $month                       = get_the_date( 'n' );
        $day                         = get_the_date( 'j' );
        $post_date_archive_permalink = get_day_link( $year, $month, $day );

        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        // Post is modified ( when post published time is not equal to post modified time )
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>
                            <time class="updated" datetime="%3$s">%4$s</time>';  // some SEO BullShit ... looks agly ... shoould tur it off with CSS property                       
                                                                                 
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_attr( get_the_date() ),
            // some SEO BullShit ... looks agly... shoould tur it off with CSS property
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_attr( get_the_modified_date() )
        );

        $posted_on = sprintf(
            esc_html_x( 'Posted on %s', 'post date', 'my-theme' ),
            '<a href="' . esc_url( $post_date_archive_permalink ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';
    }


    /**
     * Prints HTML with meta information for the current author.
     *
     * @return void
     */
    function my_template_tag_posted_by_func() {
        $byline = sprintf(
            esc_html_x( ' by %s', 'post author', 'my-theme' ),
            '<span class="author vcard"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="byline text-secondary">' . $byline . '</span>';
    }


    function my_theme_except_func( $character_count = 0 )   {

        if( ! has_excerpt() || $character_count === 0 )  {
            the_excerpt();
            return;
        }

        $excerpt = wp_strip_all_tags( get_the_excerpt() );
        $excerpt = substr( $excerpt, 0, $character_count );
        $excerpt = substr( $excerpt, 0, strpos($excerpt, '') ); /** <-- Strips out the last word ... doe not break word a half*/

        echo $excerpt . ' [...]';
    }


    /**
     * rdea_more Button
     *
     * @param string $more "Read more" excerpt string.
     *
     * @return string (Maybe) modified "read more" excerpt string.
     */
    function my_theme_excerpt_read_more( $read_more = '' ) {

        if ( ! is_single() ) {
            $read_more = sprintf( '<a class="my-theme-read-more text-white mt-3 btn btn-info" href="%1$s">%2$s</a>',
                get_permalink( get_the_ID() ),
                __( 'Read more', 'my-theme' )
            );
        }

        echo $read_more;
    }


    function my_tneme_pagination_func()   {

        wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aquila' ),
				'after'  => '</div>',
			]
		);

        echo('I exist ... ( my_tneme_pagination_func() )');
    }