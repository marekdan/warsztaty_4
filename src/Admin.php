<?php

/*

CREATE TABLE Admin(
    id int AUTO_INCREMENT,
    email varchar(255),
    password char(60),
    PRIMARY KEY (id)
);

*/

class Admin{

    static private $connection;

    static public function SetConnection(mysqli $newConnection) {
        Admin::$connection = $newConnection;
    }

}