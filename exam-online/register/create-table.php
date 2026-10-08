<?php


$serverName = 'localhost';
$userName = 'root';
$password = '';
$dataBase = "register";

try{

    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    $connection = new PDO("mysql:host=$serverName;dbname=$dataBase",$userName,$password,$options);
    $sql = "CREATE TABLE users(
        id int(11) NOT NULL AUTO_INCREMENT,
        code int(11) NOT NULL,
        fname varchar(255) NOT NULL,
        lname varchar(255) NOT NULL,
        tel int(11),
        email varchar(255) NOT NULL,
        stat varchar(255),
        PRIMARY KEY (id)
    )";
    $connection->exec($sql);
    echo "ok";

}
catch(PDOException $e){
   echo 'errors' . $e -> getMessage();
}


?>