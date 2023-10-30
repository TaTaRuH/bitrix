<?php

if (!function_exists('dd')){
    function dd (...$args){
        return Kint::dump(...$args);
    }
    Kint::$aliases[] = 'dd';
}
//dd('TEST');

?>