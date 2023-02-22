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
                <?php echo $n = 'rendering order number: ' . $index+1;?>
                <h1> <?php the_title();?></h1>
                <div><?php the_excerpt();?></div> 
            </div>                                                                             
            
            <?php $index ++;

            if ($index != 0 && $index % $number_of_columns == 0) { ?>
        
    </div><!-- class="row" -->                                  
        <?php }