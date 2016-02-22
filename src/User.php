
<?php

/*

CREATE TABLE Users(
    id int AUTO_INCREMENT,
    name varchar(60),
    email varchar(60) UNIQUE,
    password char(60),
    street_name char(60),
    house_number int,
    post_code char,
    city char,
    PRIMARY KEY(id)
 );


Panel użytkownika: Strona ta ma mieć informacje o użytkowniku, dawać opcje zmiany tych informacji,
pokazywać wszystkie poprzednie zakupy tego użytkownika.  Powinna być możliwość zobaczenia tylko swojej własnej strony!

/^Dodaj do klasy User funkcję zwracające jego koszyk i wszystkie zamówienie (poza koszykiem). */


class User {

    private $id;
    private $name;
    private $email;
    private $streetName;
    private $houseNumber;
    private $postCode;
    private $city;

    static private $connection;

    static public function SetConnection(mysqli $newConnection){
        User::$connection = $newConnection;
    }

    static public function RegisterUser($newName, $newEmail, $password1, $password2, $newStreetName, $newHouseNumber,
        $newPostCode, $newCity){
        if($password1 !== $password2){
            return false;
        }

        $options = [
            'cost'=>11,
            'salt'=>mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];
        $hashedPassword = password_hash($password1, PASSWORD_BCRYPT, $options);

        $sql = "INSERT INTO Users(name, email, password, street_name, house_number, post_code, city)
                VALUES('$newName','$newEmail', '$hashedPassword', '$newStreetName', '$newHouseNumber', '$newPostCode' , '$newCity')";

        $result = self::$connection->query($sql);
        if($result === TRUE) {
            $newUser = new User(self::$connection->insert_id, $newName, $newEmail, $newStreetName, $newHouseNumber, $newPostCode ,
                $newCity);
            return $newUser;
        }
        return false;

    }

    static public function LogInUser($email, $password){
        $sql = "SELECT * FROM Users WHERE email like '$email'";
        $result = self::$connection->query($sql);

        if($result !== FALSE){
            if($result->num_rows === 1){
                $row = $result->fetch_assoc();

                $isPasswordOk = password_verify($password, $row["password"]);

                if($isPasswordOk === true){
                    $user = new User($row["id"], $row["name"], $row["email"], $row["streetName"], $row["houseNumber"],
                    $row["postCode"], $row["city"]);
                    return $user;
                }
            }
        }
        return false;
    }

    static public function GetUserById($idToLoad){
        $sql = "SELECT * FROM Users WHERE id= $idToLoad";

        $result = self::$connection->query($sql);
        if($result !== FALSE) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $user = new User($row["id"], $row["name"], $row["email"], $row["streetName"], $row["houseNumber"],
                    $row["postCode"], $row["city"]);
                return $user;
            }
        }
        return false;

    }

    public function __construct($newId, $newName, $newEmail, $newStreetName, $newHouseNumber, $newPostCode, $newCity){
        $this->id = intval($newId);
        $this->name = $newName;
        $this->email = $newEmail;
        $this->setStreetName($newStreetName);
        $this->setHouseNumber($newHouseNumber);
        $this->setPostCode($newPostCode);
        $this->setCity($newCity);
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

    public function getStreetName()
    {
        return $this->streetName;
    }

    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    }

    public function getHouseNumber()
    {
        return $this->houseNumber;
    }


    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }


    public function getPostCode()
    {
        return $this->postCode;
    }

    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    //Changing address
    public function saveTODBstreetName(){
        $sql= "UPDATE Users SET streetName='$this->streetName' WHERE id= $this->id";


        $result = User::$connection->query($sql);
        if($result === TRUE){
            return TRUE;
        }
        return FALSE;
    }

    public function saveTODBhouseNumber(){
        $sql= "UPDATE Users SET houseNumber='$this->houseNumber' WHERE id= $this->id";


        $result = User::$connection->query($sql);
        if($result === TRUE){
            return TRUE;
        }
        return FALSE;
    }

    public function saveTODBpostCode(){
        $sql= "UPDATE Users SET postCode='$this->postCode' WHERE id= $this->id";


        $result = User::$connection->query($sql);
        if($result === TRUE){
            return TRUE;
        }
        return FALSE;
    }

    public function saveTODBcity(){
        $sql= "UPDATE Users SET city='$this->city' WHERE id= $this->id";


        $result = User::$connection->query($sql);
        if($result === TRUE){
            return TRUE;
        }
        return FALSE;
    }

    public function loadAllOrders(){
        $ret = [];
        $sql = "SELECT * FROM Orders WHERE user_id = ($this->id)";
        $result = self::$connection->query($sql);
        if($result !== false) {
            if($result->num_rows>0) {
                while($row = $result->fetch_assoc()){
                    $order= new Order($row['id'], $row['user_id'], $row['orderStatus']);
                    $ret[] = $order;
                }
            }
        }
        return $ret;
    }

}


