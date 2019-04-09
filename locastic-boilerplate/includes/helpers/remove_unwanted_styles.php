<?php
    function remove_unwanted_styles(){
        wp_dequeue_style("wp-block-library");
        wp_deregister_style("wp-block-library");

        wp_dequeue_style("wp-components");
        wp_deregister_style("wp-components");
    
        wp_dequeue_style("wp-editor");
        wp_deregister_style("wp-editor");

        if(!is_user_logged_in()){
            wp_dequeue_style("dashicons");
            wp_deregister_style("dashicons");
        }
    }

    add_action('wp_print_styles', 'remove_unwanted_styles', 200);