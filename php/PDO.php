<?php
class database {
    private $PDO;

    public function __construct($dbname) {
        $this->PDO = new PDO("mysql:host=localhost;dbname=$dbname", "root", "");
    }

    public function getConn() {
        return $this->PDO;
    }
}