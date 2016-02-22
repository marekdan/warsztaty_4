<?php

/*
<<<<<<< HEAD
=======

>>>>>>> ef37e1c4102a5a3f8e1d59418cb2ba96b971c6eb
CREATE TABLE Orders(
    id int AUTO_INCREMENT,
    user_id int NOT NULL,
    order_status int,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES Users (id)
    ON DELETE CASCADE
);

<<<<<<< HEAD
//Moim zdaniem order powinien miec post date jak tak dluzej sie zastanowilam



Stwórz klasę da zamówienia. Ma ona posiadać relacje 1-wiele z użytkownikiem i wiele-wiele z przedmiotami.
Poza tym ma mieć swój stan (niezłożone, złożone, opłacone, zrealizowane).
Dodaj do klasy User funkcję zwracające jego koszyk i wszystkie zamówienie (poza koszykiem). */

class Order
{

    private $id;
    private $userId;
    private $orderStatus;

    static private $connection;

    static public function SetConnection(mysqli $newConnection)
    {
        Order::$connection = $newConnection;
    }

    public function __construct($newId, $newUserId, $orderStatus)
    {
        $this->id = intval($newId);
        $this->userId = $newUserId;
        $this->setOrderStatus($orderStatus);

    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }

}

