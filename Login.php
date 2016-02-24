<?php
ob_start();
?>
<html>
<head>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

<ul class="nav nav-pills">
    <li  class"active"><a href="index.php">Main</a></li>

</ul>
</body>
</html>
<?php

require_once("./src/connection.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = User::LogInUser($_POST['email'], $_POST['password']);

    if ($user !== False) {

        $_SESSION['userId'] = $user->getId();
        header("Location: showUser.php");
    }

    else {
        echo('Zle dane logowania');
    }
}

?>

<form action="login.php" method="post">

    <label>
        Email:
        <input type="email" name="email">
    </label>
    <br>

    <label>
        Password:
        <input type="password" name="password">
    </label>
    <br>
    <input type="submit" value="login">
</form>
<?php
ob_end_flush();
?>
