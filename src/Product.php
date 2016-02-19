<?php

/*

CREATE TABLE Product(
    id int AUTO_INCREMENT,
    name varchar(255),
    description varchar(255),
    price float,
    PRIMARY KEY (id)
    );

 */

class Product {

    private $id;
    private $name;
    private $itemDesc;
    private $price;

    static private $connection;

    static public function SetConnection(mysqli $newConnection) {
        Product::$connection = $newConnection;
    }

    public function __construct($newId, $newName,$newItemDesc, $newPrice) {
        $this->id = intval($newId);
        $this->setName($newName);
        $this->setItemDesc($newItemDesc);
        $this->setPrice($newPrice);
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

    public function setName($newName) {
        $this->name = $newName;
    }

    public function setItemDesc($newItemDesc) {
        $this->itemDesc = $newItemDesc;
    }

    public function setPrice($newPrice) {
        $this->price = $newPrice;
    }

}