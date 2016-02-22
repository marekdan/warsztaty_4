<?php

require_once ('panelHeader.php');

if($_SESSION['userType'] === 'admin'):

?>

<form method="POST">
    <input type="hidden" name="actionType" value="addProduct">
    <label>
        Nazwa produktu:
        <input type="text" name="name">
    </label>
    <br>
    <label>
        Opis Produktu:
        <input type="text" name="itemDesc">
    </label>
    <br>
    <label>
        Cena:
        <input type="text" name="price">
    </label>
    <br>
    <input type="submit" value="Dodaj produkt">
</form>

<?php
else:
    echo 'Aby móc dodać przedmiot zaloguj się na konto administratora';
endif;

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['actionType'] == 'addProduct'){
    Product::AddProduct($_POST['name'], $_POST['itemDesc'], $_POST['price']);
}

echo 'Lista wszystkich produktów: <br>';

foreach(Product::LoadAllProducts() as $product){
    echo 'Nazwa produktu to: ' . $product->getName() . ' Cena produktu: ' . $product->getPrice() . ' Opis produktu: ' . $product->getItemDesc() . '<br>';
}