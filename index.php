<?php

require_once ('src/connection.php');
require_once ('header.php');

?>

<ul class="nav nav-pills">
    <li class="active"><a href="login.php">Login</a></li>
    <li class="active"><a href="register.php">Register</a></li>
    <li class="active"><a href="showBasket.php">Pokaz koszyk</a></li>
</ul>
<hr>

<?php

echo 'Lista wszystkich produktow: <br>';
foreach (Product::LoadAllProducts() as $product) {
    echo '<a href="showProduct.php?productId=' . $product->getId() . '">'. $product->getName().'</a><br>';
}