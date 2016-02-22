<?php

/*

CREATE TABLE Images(
    id int AUTO_INCREMENT,
    product_id int NOT NULL,
    path varchar(255),
    PRIMARY KEY (id),
    FOREIGN KEY (product_id) REFERENCES Product (id)
    ON DELETE CASCADE
);

 */


class Images{

<<<<<<< HEAD
=======
    static private $connection;

    static public function SetConnection(mysqli $newConnection) {
        Images::$connection = $newConnection;
    }

>>>>>>> ef37e1c4102a5a3f8e1d59418cb2ba96b971c6eb
}