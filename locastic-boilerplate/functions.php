<?php

// helpers

// require_once(get_template_directory() . '/includes/helpers/print_scripts_styles.php');
require_once(get_template_directory() . '/includes/helpers/remove_unwanted_styles.php');
require_once(get_template_directory() . '/includes/helpers/remove_unwanted_scripts.php');
require_once(get_template_directory() . '/includes/helpers/load_scripts.php');

// theme support



add_theme_support('post-thumbnails');

// global context

function register_menu(){
    register_nav_menu('primary-menu', __('Primary Menu'));
}
add_filter('timber/context', 'add_to_context');

add_action('init', 'register_menu');
 
function add_to_context($context){
    $context = Timber::get_context();
    $context['menu'] = new TimberMenu('primary-menu');

    //  ======================== add variable link


    $dir    = "./wp-content/themes/boilerplate/dist/";
    $files = scandir($dir);

    $context["cssfiles"] = [];

    foreach($files as $file){
        if (stristr($file, ".css") && !stristr($file, "critical") ) {
            array_push($context["cssfiles"],$file);
        }
    }

    return $context;
}

// set twig locations

Timber::$dirname = array( 'pattern-lab', 'partials', 'layouts', 'views' );
