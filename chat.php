<?php
require __DIR__ . '/vendor/autoload.php';

class chat {
    private $db;
    private int $ID;
    private $pusher;

    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=chat", "root", "");
        $this->ID = $_SESSION["ID"];

        $this->pusher = new Pusher\Pusher(
            "68f57aa5e3617bb4abe6",
            "914344821ddc1802f0c3",
            "1340534",
            array('cluster' => 'eu')
        );


    }

    public function send(int $targetID, string $message) {
        $sql = "INSERT INTO messages VALUES (DEFAULT, :senderID, :receiverID, :message, DEFAULT)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":senderID", $this->ID);
        $stmt->bindParam(":receiverID", $targetID);
        $stmt->bindParam(":message", $essage);
        $stmt->execute();

        $this->pusher->trigger('chatterbox', "user{$targetID}", array('message' => $message));
    }

    public function pingMessage() {

    }
}