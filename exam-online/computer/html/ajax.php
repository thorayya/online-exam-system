<?php

//session 

$match = '';
$id = $_POST['id'];
$match = $_POST['data'];

$array = ["0"=>$match,"1"=>$match,"2"=>$match,"3"=>$match,"4"=>$match,"5"=>$match,"6"=>$match,"7"=>$match,"8"=>$match,"9"=>$match,
"10"=>$match,"11"=>$match,"12"=>$match,"13"=>$match,"14"=>$match,"15"=>$match,"16"=>$match,"17"=>$match,"18"=>$match,"19"=>$match];


echo $id ;
echo $array[$id] = $match;





?>