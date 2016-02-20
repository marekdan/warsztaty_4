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

class Order{

    static private $connection;

    static public function SetConnection(mysqli $newConnection) {
        Order::$connection = $newConnection;
    }

}