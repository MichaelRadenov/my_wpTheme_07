<?php
    /**
     * Template for post entry header
     *
     * @          My Theme      
     */

    $the_post_id = get_the_ID();
    $hide_title  = get_post_meta( $the_post_id, '_hide_page_title_meta_key', true ) ;
    $hide_title  = get_post_meta( $the_post_id, '_hide_page_title', true );
    $heading_class = ( ! empty( $hide_title ) &&  $hide_title === 'yes' ) ? 'hide title' : '';
    $has_post_thumbnail = get_the_post_thumbnail( $the_post_id );

    ?>
    <header class="entry-header">
        <?php
        // Featured image
        if ( $has_post_thumbnail ) { ?>
            
            <div class="entry-image mb-3">
                <a class="d-block" href="<?php echo esc_url( get_permalink() ); ?>">

                    <figure class="img-container">
                       
                        <?php 
                        //my_render_post_custom_thumbnail_func(
                          my_get_the_post_custom_thumbnail_func (
                                $the_post_id,
                                'featured-thumbnail',                           
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

    if (is_single() || is_page())   {

        printf(
            '<h1 class="page-title text-dark %1$s">%2$s</h1>',
            esc_attr( $heading_class ),
            wp_kses_post( get_the_title() ),
        );

    }else{

        printf(
            '<h2 class="entry-title post-card-title mb-3"><a class="text-dark" href="%1$s">%2$s</a></h2>',
            esc_url( get_the_permalink() ),
            wp_kses_post( get_the_title() ),
        );

    }