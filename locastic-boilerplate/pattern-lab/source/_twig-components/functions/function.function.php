<?php 


if(!function_exists(limitText)){
    function limitText($text){
      die();
        return $text;
    }
  }

$function = new Twig_SimpleFunction('function', function ($function, $arguments = null) {
    $function($arguments);
}); 
