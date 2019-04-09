<?php

    function lakewood_print_scripts_scripts() {
        global $wp_scripts;
        foreach( $wp_scripts->queue as $handle ) :
            echo '<div style="margin: 5px 3%; border: 1px solid #eee; padding: 20px; background-color: #e0e0e0;">Style <br />';
            echo "Handle: " . $handle . '<br />';
            echo "URL: " . $wp_scripts->registered[$handle]->src;
            echo '</div>';
        endforeach;
    }
    add_action( 'wp_print_scripts', 'lakewood_print_scripts_scripts', 101 ); 
