<?php
ob_start();

require_once ('src/connection.php');

unset ($_SESSION['userId']);
unset ($_SESSION['userType']);
header('Location: panelMain.php');

ob_end_flush();