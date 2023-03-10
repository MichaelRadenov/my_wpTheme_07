<?php

/**
 * Index template file.
 *
 * @My Theme
 * 
 * The main template file
*/

get_header();
?>

<!-- index.php-->
<section id="section" class="section site-content"> 
    <div class="container">
        <div id="primary">
            <main id="main" class="site-main mt-5" role="main">
                    
                    <?php if(have_posts()) : ?>
                
                            <?php if ( is_home() && ! is_front_page() ) : ?>
                                    
                                    <header class="mt-5">
                                        <h1 class="page-title">From page.php file_<?php single_post_title(); ?></h1>
                                    </header>
                            
                            <?php endif;
                                          
                            while(have_posts()) : the_post();                                                       ?>                            
                            
                                <h1> <?php the_title();?></h1>                                
                                <div><?php the_content();?></div>                                   

                           <?php endwhile; ?>                                                                   
                                            
                    <?php endif ?>                    
            </main>
        </div><!-- class="primary" -->
    </div><!-- class="container" -->
</section>


<?php get_footer();

