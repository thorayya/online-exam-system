<?php

$serverName = 'localhost';
$userName = 'root';
$password = '';
$dataBase = "register";

try{
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION , PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
    $connection = new PDO("mysql:host=$serverName;dbname=$dataBase",$userName,$password,$options);
}
catch(PDOException $e){
    echo 'errors' . $e -> getMessage();
}
?>