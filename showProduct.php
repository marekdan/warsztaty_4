<?php

require_once ('src/connection.php');
require_once ('header.php');

$product = Product::GetProductById($_GET['productId']);

echo'
<h1>'.$product->getName().'</h1>
<h4>Ilość na stanie: '. $product->getQuantity() .'</h4>
';