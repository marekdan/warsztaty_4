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
    private $email;

    static private $connection;

    static public function SetConnection(mysqli $newConnection) {
        Admin::$connection = $newConnection;
    }

    static public function RegisterAdmin($newEmail, $password1, $password2) {

        if ($password1 !== $password2) {
            return false;
        }

        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];

        $hashedPassword = password_hash($password1, PASSWORD_BCRYPT, $options);

        $sql = "INSERT INTO Admin(email, password) VALUES('$newEmail', '$hashedPassword')";

        $result = self::$connection->query($sql);
        if ($result === true) {
            $newAdmin = new Admin(self::$connection->insert_id, $newEmail);

            return $newAdmin;
        }

        return false;

    }

    static public function LogInAdmin($email, $password) {
        $sql = "SELECT * FROM Admin WHERE email like '$email'";
        $result = self::$connection->query($sql);

        if ($result !== false) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();

                $isPasswordOk = password_verify($password, $row["password"]);

                if ($isPasswordOk === true) {
                    $admin = new Admin($row["id"], $row["email"]);

                    return $admin;
                }
            }
        }

        return false;
    }

    public function __construct($newId, $newEmail) {
        $this->id = intval($newId);
        $this->setEmail($newEmail);
    }

    public function setEmail($newEmail) {
        $this->email = $newEmail;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }
}