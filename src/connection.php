<?php


session_start();

require_once (dirname(__FILE__) . '/config.php');
require_once (dirname(__FILE__) . '/User.php');
require_once (dirname(__FILE__) . '/Product.php');

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbBaseName);

if($conn->connect_errno){//wypisuje nr bledu
    die("Db connection not initialized properly" . $conn->connect_error);
}


$user1 = User::RegisterUser("Ela23", "ela23@gmail.com", "ela23", "ela23", "cebertowicza", 15, '80-800', 'gdansk');

