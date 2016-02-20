<?php

require_once('panelHeader.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $admin = Admin::LogInAdmin($_POST['email'], $_POST['password']);
    if ($admin !== false) {
        $_SESSION['userId'] = $admin->getId();
        $_SESSION['userType'] = 'admin'; //określa typ zalogowanego użytkownika, przyda się przy sprawdzeniu kto jest zalogowany
    }
}

//na konto administratora można się zalogować tylko jeżeli nie jest zalogownay inny admin
if (($_SESSION['userType']) == 'admin'):
    echo 'Zalogowano na konto administratora, aby zalogwać się na inne wyloguj się';
else:
    ?>
    <form method="POST">
        <label>
            Email:
            <input type="email" name="email">
        </label>
        <br>
        <label>
            Hasło:
            <input type="password" name="password">
        </label>
        <br>
        <input type="submit" value="Zaloguj">
    </form>
    <?php
endif;
