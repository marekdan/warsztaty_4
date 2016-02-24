<?php

/*

CREATE TABLE Messages(
    id int AUTO_INCREMENT,
    message_text varchar(255),
    receiver_id int NOT NULL,
    message_date datetime,
    PRIMARY KEY (id),
    FOREIGN KEY (receiver_id) REFERENCES Users(id)
    ON DELETE CASCADE
);

*/

class Messages {

    private $id;
    private $messageText;
    private $receiver;
    private $date;

    static private $connection;

    static public function SetConnection(mysqli $newConnection) {
        Messages::$connection = $newConnection;
    }

    static private function SendMessage($newMessage, $receiverId){
        $newDate = date('Y-m-d G:i:s');
        $sql = "INSERT INTO Messages (message_text, receiver_id, message_date) VALUES ('$receiverId', '$newMessage', '$newDate')";
        $result = self::$connection->query($sql);
        if ($result !== false) {
            echo 'Wiadomość wysłana';
        }
        else {
            echo 'Wystąpił problem z wysłaniem wiadomości';
        }
    }

    public function loadAllReceivedMessages($userId) {
        $ret = [];
        $sql = "SELECT * FROM Messages WHERE receiver_id='$userId' ORDER BY message_date desc";
        $result = self::$connection->query($sql);
        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
                $message = new Messages($row['id'], $row['message_text'], $row['receiver_id'], $row['message_date']);
                $ret[] = $message;
            }

            return $ret;
        }

        return false;
    }

    public function __construct($newId, $newMessage, $newReceiverId, $newDate) {
        $this->id = $newId;
        $this->setMessageText($newMessage);
        $this->setReceiver($newReceiverId);
        $this->setDate($newDate);
    }

    public function getId() {
        return $this->id;
    }

    public function getMessageText() {
        return $this->messageText;
    }

    public function getReceiver() {
        return $this->receiver;
    }

    public function getDate() {
        return $this->date;
    }

    public function setMessageText($messageText) {
        $this->messageText = $messageText;
    }

    public function setReceiver($receiver) {
        $this->receiver = $receiver;
    }

    public function setDate($date) {
        $this->date = $date;
    }

}