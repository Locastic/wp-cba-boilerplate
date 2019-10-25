<?php 

$function = new Twig_SimpleFunction(
    'limitText',
    function ($text) {
     return $text;
    },
    array('is_safe' => array('html'))
);
