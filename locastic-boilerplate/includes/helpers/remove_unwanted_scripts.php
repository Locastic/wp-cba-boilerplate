<?php


    function remove_unwanted_scripts(){
        wp_dequeue_script('wp-embed');
        wp_deregister_script('wp-embed');
    }

    add_action('wp_print_styles', 'remove_unwanted_scripts', 200);
    
    remove_action('wp_head', 'print_emoji_detection_script', 7);
