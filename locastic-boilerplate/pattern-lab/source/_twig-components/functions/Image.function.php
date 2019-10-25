<?php 

$function = new Twig_SimpleFunction(
    'Image',
    function ($title, $url, $attributes) {
     return "https://picsum.photos/1400/900";
    },
    array('is_safe' => array('html'))
);
