<?php

require_once('src/connection.php');

?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>
        Panel Zarządzania
    </title>
</head>
<body>
<div>
    <a href="panelMain.php">
        <div>
            Panel główny
        </div>
    </a>
    <a href="panelProduct.php">
        <div>
            Zarządzanie przedmiotami
        </div>
    </a>

    <a href="panelUser.php">
        <div>
            Zarządzanie użytkownikami
        </div>
    </a>
    <a href="panelOrder.php">
        <div>
            Zarządzanie zamównieniami
        </div>
    </a>

    <a href="panelLogoutAdmin.php">
        <div>
            Wyloguj
        </div>
    </a>
    <hr>
</div>
</body>
</html>