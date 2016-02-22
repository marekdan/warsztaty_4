<?php

session_start();

require_once(dirname(__FILE__) . '/config.php');

require_once(dirname(__FILE__) . '/User.php');
require_once(dirname(__FILE__) . '/Product.php');
require_once(dirname(__FILE__) . '/Admin.php');
require_once(dirname(__FILE__) . '/Message.php');

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbBaseName);
$conn->set_charset('utf8');

if($conn->connect_errno){
    die('db connection not initialized properly' . $conn->connect_errno);
}

Admin::SetConnection($conn);
Product::SetConnection($conn);
Messages::SetConnection($conn);

