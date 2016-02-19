<?php

/*

CREATE TABLE Orders(
    id int AUTO_INCREMENT,
    user_id int NOT NULL,
    order_status int,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES Users (id)
    ON DELETE CASCADE
);

 */

class Order{

    static private $connection;

    static public function SetConnection(mysqli $newConnection) {
        Order::$connection = $newConnection;
    }

}