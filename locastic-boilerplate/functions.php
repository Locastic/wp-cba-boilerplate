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

function add_to_context($context)
{
    $context = Timber::get_context();
    $context['menu'] = new TimberMenu('primary-menu');


    $dir = "./wp-content/themes/" . $context['site']->theme->slug . "/dist/";

    if (!file_exists($dir)) {
        echo "
        <style>
            .timber-notice{
                max-width:460px;
                padding: 30px;
                font-size: 17px;
                line-height: 1.35;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                box-shadow: 2px 2px 70px rgba(0,0,0,0.05);
                font-family: sans-serif;
                color: #222;
            }

            .timber-notice h2 {
                margin-top: 0;
            }
        </style>";

        echo "
        <div class='timber-notice'>
        <h2>Dist folder is missing!</h2>
        <p>Run 'npm i' and 'npm run dev' to get started</p>
        </div>
    ";
    } else {

        $files = scandir($dir);

        $context["cssfiles"] = [];

        foreach ($files as $file) {
            if (stristr($file, ".css") && !stristr($file, "critical")) {
                array_push($context["cssfiles"], $file);
            }
        }
    }
    return $context;
}

// set twig locations

if (!function_exists('is_plugin_active')) {
    require_once(ABSPATH . '/wp-admin/includes/plugin.php');
}

if (!is_plugin_active("timber-library/timber.php")) {
    if (is_admin()) {
        echo "
        <style>
            body{
                padding-top: 124px!important;
            }
            #wpadminbar {
                z-index: 10000001!important;
            }
            .timber-notice{
                width: 100%;
                padding: 20px;
                position: fixed;
                z-index: 10000000;
                top: 32px;
                background: #03a0d2;
                left: 0;
                color: white;
                padding-left: 180px;
                border-bottom: 1px solid #000;
                box-shadow: 2px 2px 20px rgba(0,0,0,0.1);
            }
            .timber-notice h2{
                color: white;
            }

            .timber-notice a{
                color: white!important;
            }

        </style>";
    } else {
        echo "
        <style>
            .timber-notice{
                max-width:460px;
                padding: 30px;
                font-size: 17px;
                line-height: 1.35;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                box-shadow: 2px 2px 70px rgba(0,0,0,0.05);
                font-family: sans-serif;
                color: #222;
            }

            .timber-notice h2 {
                margin-top: 0;
            }
        </style>";
    }

    echo "
        <div class='timber-notice'>
        <h2>Thanks for installing the Locastic wordpress theme boilerplate.</h2>
        <p>Please install and activate the <a target='_blank' href='https://wordpress.org/plugins/timber-library/'>Timber plugin</a> so the theme can work properly.</p>
        </div>
    ";

}


if (!is_admin() && is_plugin_active("timber-library/timber.php")) {
    Timber::$dirname = array('pattern-lab', 'partials', 'layouts', 'views');
}

function get_siblings($post)
{
    wp_list_pages(array(
        'child_of' => $post->post_parent,
        'exclude' => $post->ID
    ));
}
