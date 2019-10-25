<?php

    if(!function_exists(wp_head)){
        function wp_head(){
        }
    }

    if(!function_exists(wp_footer)){
        function wp_footer(){
        }
    }


    if(!function_exists(addScript)){
        function addScript($src){
        echo "<script src=" . $src- ">";
        }
    }

    if(!function_exists(limitText)){
    function limitText($text){
        return $text;
    }
    }

    if(!function_exists(get_search_query)){
        function get_search_query(){
            return "";
        }
    }

    $function = new Twig_SimpleFunction('fn', function ($function, $arguments = null) {
        $function($arguments);
    });