<?php


session_start();
require_once(dirname(__FILE__)."/config.php");//dirname zawsze sie odwoluje do poprawnego pliku
require_once(dirname(__FILE__)."/User.php");


$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbBaseName);

if($conn->connect_errno){//wypisuje nr bledu
    die("Db connection not initialized properly" . $conn->connect_error);
}


$user1 = User::RegisterUser("Ela23", "ela23@gmail.com", "ela23", "ela23", "gdansk");
var_dump($user1);