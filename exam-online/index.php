<?php

session_start();

define("BASE_URL","http://localhost/exam-online/");

function redirect($url){
    header('Location: '. trim(BASE_URL, '/ ') . '/' . trim($url, '/ '));
    exit;
}
// redirect('panel/category');

function url($url){
    return trim(BASE_URL , "/ "). "/".trim($url , "/ ");
    exit;
}

function asset($file){
    return trim(BASE_URL , "/ "). "/".trim($file , "/ ");
    exit;
}

function dd($var){
    echo "<pre>";
    var_dump($var);
    exit;
}

?>