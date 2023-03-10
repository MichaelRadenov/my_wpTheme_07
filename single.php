<?php

/**
 * Index template file.
 *
 * @    My Theme
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
                                         <h1 class="page-title"><?php single_post_title(); ?>_...From single.php file ... _</h1>
                                    </header>
                            
                            <?php endif;
                                          
                            while(have_posts()) : the_post(); 
                           
                                  get_template_part('template-parts/content');

                            endwhile; ?>                                                                   
                                            
                    <?php endif ?>                    
            </main>
        </div><!-- class="primary" -->
    </div><!-- class="container" -->
</section>


<?php get_footer();

