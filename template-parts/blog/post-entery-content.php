<?php
 /**
  * 
  *  This is used in the loop
  * 
  * 
  */
?>

   <div class="entery-content">
        <?php
        
        if( is_single() ) {

            the_content(
                sprintf(
                    wp_kses(
                        __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'my-theme' ),
                        [
                            'span'=> [
                                'class'=> []
                            ]
                        ]
                    ),
                    the_title('<span class="screan-reader-text">"', '"</span>', false)
                )
            ); 

        }else{

            my_theme_except_func( 10 );

        }

        ?>
   </div>