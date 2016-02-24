<?php
ob_start();
require_once("./src/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = User::RegisterUser($_POST['name'], $_POST['email'], $_POST['password1'], $_POST['password2'],
        $_POST['streetName'], $_POST['houseNumber'], $_POST['postCode'], $_POST['city']);


    if ($user !== false) {

        $_SESSION['userId'] = $user->getId();
        header("Location: showUser.php");
    }
    else {
        echo('Wrong data');
    }
}
ob_end_flush();
?>

<html>
<head>

    <link rel="stylesheet" href="css/main.css">

</head>

<body>

<ul class="nav nav-pills">
    <li class
    "active"><a href="index.php">Main</a></li>
</ul>

</body>


<form action="register.php" method="post">
    <label>
        Email:
        <input type="email" name="email">
    </label>
    <br>
    <label>
        Name:
        <input type="text" name="name">
    </label>
    <br>
    <label>
        Password:
        <input type="password" name="password1">
    </label>
    <br>
    <label>
        Repeat password:
        <input type="password" name="password2">
    </label>
    <br>
    <label>
        Street name
        <input type="text" name="streetName">
    </label>
    <br>
    <label>
        House number
        <input type="text" name="houseNumber">
    </label>
    <br>
    <label>
        Postcode
        <input type="text" name="postCode">
    </label>
    <br>
    <label>
        City
        <input type="text" name="city">
    </label>
    <input type="submit" name="submit">

</form>



