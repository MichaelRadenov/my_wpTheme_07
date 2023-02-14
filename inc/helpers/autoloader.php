<?php
    /**
     * Autoloader file for theme.
     *
     * This is an insanely, unnecessarily complicated autoloader, 
     * with only one purpose ... 
     * ... to force you naming classes against all classes naming conventions
     * 14.01.2023.
    */


    namespace MyTheme\Inc\Helpers;

    /**
     * Auto loader function.
     *
     * @param string $resource Source namespace.
     *
     * @return void
     */
    function autoloader( $resource = '' ) {
        $resource_path  = false;
        $namespace_root = 'MyTheme\\';
        $resource       = trim( $resource, '\\' );

                    //**************** */
                    //echo '<pre>';
                    //print_r('resource name:' . $resource);
                    //wp_die();
                    //**************** */


        if ( empty( $resource ) || strpos( $resource, '\\' ) === false || strpos( $resource, $namespace_root ) !== 0 ) {
            // Not my namespace, bail out.
            return;
        }

        // Remove my root namespace.
        $resource = str_replace( $namespace_root, '', $resource );

        $path = explode(
            '\\',
            str_replace( '_', '-', $resource )

        );

                    //**************** */
                    //echo '<pre>';
                    //print_r($path);
                    //wp_die();
                    //**************** */

        /**
         * Time to determine which type of resource path it is,
         * so that I can deduce the correct file path for it.
         */
        if ( empty( $path[0] ) || empty( $path[1] ) ) {
            return;
        }

                    //**************** */
                    //echo '<pre>';
                    //print_r($resource);
                    //wp_die();
                    //**************** */


        $directory = '';
        $file_name = '';

        if ( 'Inc' === $path[0] ) {

            switch ( $path[1] ) {
                case 'traits':
                    $directory = 'traits';
                    $file_name = sprintf( 'trait-%s', trim( strtolower( $path[2] ) ) );
                    break;

                case 'widgets':
                case 'blocks': // phpcs:ignore PSR2.ControlStructures.SwitchDeclaration.TerminatingComment
                    /**
                     * If there is class name provided for specific directory then load that.
                     * otherwise find in inc/ directory.
                     */
                    if ( ! empty( $path[2] ) ) {
                        $directory = sprintf( 'classes/%s', $path[1] );
                        $file_name = sprintf( 'class-%s', trim( strtolower( $path[2] ) ) );
                        break;
                    }
                default:
                    $directory = 'classes';
                    $file_name = sprintf(trim( $path[2] ) );
                    break;
            }

            $resource_path = sprintf( '%s/inc/%s/%s.php', untrailingslashit( MY_THEME_DIR_PATH ), $directory, $file_name );

        }

        /**
         * If $is_valid_file has 0 means valid path or 2 means the file path contains a Windows drive path.
         */
        $is_valid_file = validate_file( $resource_path );

        if ( ! empty( $resource_path ) && file_exists( $resource_path ) && ( 0 === $is_valid_file || 2 === $is_valid_file ) ) {
            // We already making sure that file is exists and valid.
            require_once( $resource_path ); // phpcs:ignore
        }

                    //**************** */
                    //require_once( MY_THEME_DIR_PATH . '/inc/classes/ThemeStarter.php' ); 
                    //echo '<pre>';
                    //print_r('resource name:' . $resource);
                    //echo '<pre>';
                    //print_r('dir name:' . $directory);
                    //echo '<pre>';
                    //print_r('flename:' . $file_name );
                    //echo '<pre>';
                    //print_r('resource path name:                 ' . $resource_path );
                    //echo '<pre>';
                    //print_r('my require_once resource path name: ' . MY_THEME_DIR_PATH . '/inc/classes/ThemeStarter.php');
                    //wp_die();


    }

    spl_autoload_register( '\MyTheme\Inc\Helpers\autoloader' );
