<?php

require_once ('src/connection.php');

unset ($_SESSION['userId']);
unset ($_SESSION['userType']);
header('Location: panelMain.php');