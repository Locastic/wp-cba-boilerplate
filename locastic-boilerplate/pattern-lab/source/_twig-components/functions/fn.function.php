<?php

if(!function_exists(wp_head)){
    function wp_head(){
       
    }
}

if(!function_exists(wp_footer)){
    function wp_footer(){
       echo "<script src='http://192.168.19.50/wp-content/themes/boilerplate/dist/index.js'>";
    }
}


$function = new Twig_SimpleFunction('fn', function ($function, $arguments = null) {

    return eval($function($arguments));
});
