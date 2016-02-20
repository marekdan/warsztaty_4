<?php

require_once ('panelHeader.php');

if($_SESSION['userType'] === 'admin'){
    //TODO: Funkcje dla zalogowanego admina USER
    echo 'Jesteś zalogowany na admina';
}