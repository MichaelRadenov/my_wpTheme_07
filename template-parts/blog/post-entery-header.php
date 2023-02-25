<?php
    /**
     * Template for post entry header
     *
     * @package Aquila
     */

    $the_post_id = get_the_ID();
    $hide_title  = get_post_meta( $the_post_id, '_hide_page_title_meta_key', true ) ;
    // echo '<pre>';
    // print_r($hide_title);
    // wp_die();

    $hide_title  = get_post_meta( $the_post_id, '_hide_page_title', true );
    //$heading_class = ( ! empty( $hide_title ) && 'yes' === $hide_title ) ? 'hide d-none' : '';

    $has_post_thumbnail = get_the_post_thumbnail( $the_post_id );

    ?>
    <header class="entry-header">
        <?php
        // Featured image
        if ( $has_post_thumbnail ) { ?>
            
            <div class="entry-image mb-3">
                <a class="d-block" href="<?php echo esc_url( get_permalink() ); ?>">

                    <figure class="img-container">
                        header file works
                        
                        <?php 
                        //my_render_post_custom_thumbnail_func(
                          my_get_the_post_custom_thumbnail_func (
                                $the_post_id,                           
                                [
                                    'sizes' => '(max-width: 350px) 350px, 233px',
                                    'class' => 'attachment-featured-large size-featured-image'
                                ],
                                'featured-thumbnail',
                        ) ?>
                       
                    </figure>
                </a>
            </div>
           
    <?php }