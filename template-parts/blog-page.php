<?php 
/**
 * The default blo template for displaying blog content
 * 
 *                     for now!
 * 
 */

global $index;
global $number_of_columns;

if ($index % $number_of_columns == 0) { ?>
                    
    <div class="row">
    
        <?php }  ?>
        
            <div class="col-lg-<?php echo 12/$number_of_columns?> col-md-6 col-sm-12">
                <?php echo 'rendering order number: ' . $index+1 . '<br> from blog-page.php file ... <br>';
                get_template_part('template-parts/blog/post-entery-header');
                get_template_part('template-parts/blog/post-entery-content');
                get_template_part('template-parts/blog/post-entery-footer');                
                get_template_part('template-parts/blog/post-entery-meta');  ?>
            </div>                                                                             
            
            <?php $index ++;

            if ($index != 0 && $index % $number_of_columns == 0) { ?>
        
    </div><!-- class="row" -->                                  
        <?php }