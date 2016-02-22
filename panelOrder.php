<?php

require_once ('panelHeader.php');

if($_SESSION['userType'] === 'admin'){
    //TODO: Funkcje dla zalogowanego admina ORDER
    echo 'Jesteś zalogowany na admina';
}