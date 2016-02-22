<?php

/*

CREATE TABLE Product(
    id int AUTO_INCREMENT,
    name varchar(255),
    description varchar(255),
    price float,
    quantity int,
    PRIMARY KEY (id)
);

CREATE TABLE ProductOrder(
    id int AUTO_INCREMENT,
    product_id int NOT NULL,
    order_id int NOT NULL,
    quantity int,
    PRIMARY KEY (id),
    UNIQUE KEY (product_id, order_id),
    FOREIGN KEY (product_id) REFERENCES Product(id)
    ON DELETE CASCADE,
    FOREIGN KEY (order_id) REFERENCES Orders (id)
    ON DELETE CASCADE
);

 */

class Product {

    private $id;
    private $name;
    private $itemDesc;
    private $price;
    private $quantity;
    
    static private $connection;

    static public function SetConnection(mysqli $newConnection) {
        Product::$connection = $newConnection;
    }

    static public function AddProduct($newName, $newDesc, $newPrice) {
        $sql = "INSERT INTO Product (name, description, price) VALUES ('$newName', '$newDesc', '$newPrice')";
        $result = self::$connection->query($sql);
        if ($result === true) {
            return true;
        }

        return false;
    }

    static public function LoadAllProducts() {
        $ret = [];
        $sql = "SELECT * FROM Product";
        $result = self::$connection->query($sql);
        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product($row['id'], $row['name'], $row['description'], $row['price'], $row['quantity']);
                $ret[] = $product;
            }

            return $ret;
        }

        return false;
    }

    public function __construct($newId, $newName, $newItemDesc, $newPrice, $newQuantity) {
        $this->id = intval($newId);
        $this->setName($newName);
        $this->setItemDesc($newItemDesc);
        $this->setPrice($newPrice);
        $this->setQuantity($newQuantity);
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getItemDesc() {
        return $this->itemDesc;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setName($newName) {
        $this->name = $newName;
    }

    public function setItemDesc($newItemDesc) {
        $this->itemDesc = $newItemDesc;
    }

    public function setPrice($newPrice) {
        $this->price = $newPrice;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

}