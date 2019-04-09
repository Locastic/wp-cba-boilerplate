<?php 

    function async_scripts($url){
        if ( strpos( $url, '#asyncload') === false )
            return $url;
        else if ( is_admin() )
            return str_replace( '#asyncload', '', $url );
        else
        return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
    add_filter( 'clean_url', 'async_scripts', 11, 1 );

    $scripts = [];

    function addScript($scriptName){
        global $scripts;

        $dist = new DirectoryIterator(get_stylesheet_directory() . '/dist/');

        foreach ($dist as $file) {

            if (pathinfo($file, PATHINFO_EXTENSION) === 'js') {
                $fullName = basename($file);   
                $name = substr(basename($fullName), 0, strpos(basename($fullName), '.')); 

                if ($name == $scriptName) {
                    if(!in_array($fullName, $scripts)){
                        array_push($scripts, $fullName);
                        wp_enqueue_script( $name, get_stylesheet_directory_uri() . '/dist/' . $fullName . '#asyncload', '', '1.0', true);
                    }
                }
            }
        }
    }