<?php

/**
 * Navbar
 *
 * @package My Theme
 */

    $menu_class_instance = MyTheme\Inc\Classes\Menus::get_my_class_instance();
    $header_menu_id = $menu_class_instance->my_get_menu_item_func('my-theme-header-menu');

    $header_menu_items = wp_get_nav_menu_items($header_menu_id);

                    //******************/
                    //print_r($header_menu_items);
                    echo'<br>';
                    //print_r($menu_id);
                    //wp_die();
                    //******************/

    if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }
        
?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php 

                if (! empty($header_menu_items) && is_array($header_menu_items)) {

                ?>

                    <ul class="navbar-nav mr-auto">

                        <?php
                            foreach ($header_menu_items as $header_menu_item) {
                                if (! $header_menu_item->menu_item_parent) {                                   

                                $headers_child_menu_items = $menu_class_instance->my_get_child_menu_item_func($header_menu_items, $header_menu_item->ID);

                                            //******************/
                                            //echo'<pre>';
                                            //print_r($headers_child_menu_items);
                                            
                                            //print_r($menu_id);
                                            //wp_die();
                                            //******************/

                                    if (! empty ($headers_child_menu_items) && is_array($headers_child_menu_items))   {
                                        ?>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="<?php echo esc_url($header_menu_item->url) ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <?php echo esc_html($header_menu_item->title)?>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                                    <?php foreach ($headers_child_menu_items as $headers_child_menu_item) {
                                                        ?>
                                                        <a class="dropdown-item" href="<?php echo esc_url($headers_child_menu_item->url) ?>">
                                                            <?php echo esc_html($headers_child_menu_item->title)?></a>
                                                        <?php
                                                    }?>                                                                                                  
                                                </div>
                                            </li>
                                            
                                        <?php
                                        }else{
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?php echo esc_url($header_menu_item->url) ?>">
                                                    <?php echo esc_html($header_menu_item->title)?></a>
                                                </li>
                                            <?php
                                    }                           
                                } 
                            }
                        ?>
                    </ul>

            <?php    }
            
                ?>

            <form class="form-inline my-2 my-lg-0">
                
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

            </form>
        </div>
    </nav>

<?php 

    //wp_nav_menu(
        //array(
        //'theme_location'  => 'my-theme-another-menu',
        //'container_class' => 'my_extra_menu_class' , 
        //'menu' => 'primary',
        // do not fall back to first non-empty menu
        //'theme_location' => '__no_such_location',
        // do not fall back to wp_page_menu()
        //'fallback_cb' => false
       // )
    //);


    

?>
