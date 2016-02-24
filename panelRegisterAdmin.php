<?php

require_once('panelHeader.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = Admin::RegisterAdmin($_POST['email'], $_POST['password1'], $_POST['password2']);
    if ($admin !== false) {
        $_SESSION['userId'] = $admin->getId();
        $_SESSION['userType'] = 'admin'; //określa typ zalogowanego użytkownika
    }
    else {
        echo 'Złe dane rejestracji';
    }
}

?>

<form method="POST">
    <label>
        Email:
        <input type="email" name="email">
    </label>
    <br>
    <label>
        Hasło:
        <input type="password" name="password1">
    </label>
    <br>
    <label>
        Hasło 2:
        <input type="password" name="password2">
    </label>
    <br>
    <input type="submit" value="Zarejestruj">
</form>
