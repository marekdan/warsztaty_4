<?php

/*
CREATE TABLE Users(
    id int AUTO_INCREMENT,
    name varchar(255),
    email varchar(255) UNIQUE,
    password char(60),
    address char(60),
    PRIMARY KEY(id)
 );
 */

/*Panel użytkownika: Strona ta ma mieć informacje o użytkowniku, dawać opcje zmiany tych informacji,
pokazywać wszystkie poprzednie zakupy tego użytkownika.  Powinna być możliwość zobaczenia tylko swojej własnej strony!*/

class User {
    static private $connection;

    static public function SetConnection(mysqli $newConnection){//z duzej litery funkcja bo jest statyczna
        User::$connection = $newConnection;
    }

    static public function RegisterUser($newName, $newEmail, $password1, $password2, $newAddress){
        if($password1 !== $password2){
            return false;
        }

        $options = [
            'cost'=>11,
            'salt'=>mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];
        $hashedPassword = password_hash($password1, PASSWORD_BCRYPT, $options);

        $sql = "INSERT INTO Users(name, email, password, address)
                VALUES('$newName','$newEmail', '$hashedPassword', '$newAddress')";

        $result = self::$connection->query($sql);
        if($result === TRUE) {
            $newUser = new User(self::$connection->insert_id, $newName, $newEmail, $newAddress);
            return $newUser;
        }
        return false;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
    private $id;
    private $name;
    private $email;
    private $address;

}

