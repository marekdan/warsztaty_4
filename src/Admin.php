<?php

/*

CREATE TABLE Admin(
    id int AUTO_INCREMENT,
    email varchar(255),
    password char(60),
    PRIMARY KEY (id)
);

*/

class Admin {

    private $id;
    private $name;
    private $email;
    private $password;

    static private $connection;

    static public function SetConnection(mysqli $newConnection) {
        Admin::$connection = $newConnection;
    }

    static public function RegisterAdmin($newEmail, $password1, $password2){

        if($password1 !== $password2){
            return false;
        }

        $options = [
            'cost'=>11,
            'salt'=>mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];
        $hashedPassword = password_hash($password1, PASSWORD_BCRYPT, $options);

        $sql = "INSERT INTO Users(email, password) VALUES('$newEmail', '$hashedPassword')";

        $result = self::$connection->query($sql);
        if($result === TRUE) {
            $newUser = new User(self::$connection->insert_id, $newEmail);
            return $newUser;
        }
        return false;

    }

    static public function LogInAdmin($email, $password) {
        $sql = "SELECT * FROM Users WHERE email like '$email'";
        $result = self::$connection->query($sql);

        if ($result !== false) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();

                $isPasswordOk = password_verify($password, $row["password"]);

                if ($isPasswordOk === true) {
                    $user = new User($row["id"], $row["name"], $row["email"], $row["streetNumber"], $row["houseNumber"],
                        $row["postCode"], $row["city"]);

                    return $user;
                }
            }
        }

        return false;
    }

}